<?php

// CLI-only content release. Dry run is the default; use --apply after approval.
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$root = getenv('PORTFOLIO_APP_ROOT') ?: dirname(__DIR__);
require $root.'/vendor/autoload.php';
$app = require $root.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$payload = json_decode(file_get_contents(__DIR__.'/content.json'), true, 512, JSON_THROW_ON_ERROR);
$apply = in_array('--apply', $argv, true);
if (! class_exists(App\Models\PortfolioItem::class)) {
    throw new RuntimeException('The deployed PortfolioItem model is required.');
}

$plan = function (bool $lock) use ($payload): array {
    $changes = [];
    foreach ($payload['insert'] as $values) {
        $query = App\Models\PortfolioItem::where('slug', $values['slug']);
        $item = ($lock ? $query->lockForUpdate() : $query)->first();
        if ($item) {
            foreach ($values as $key => $value) {
                if ($item->getAttribute($key) !== $value) {
                    throw new RuntimeException('Existing item differs: '.$values['slug'].' / '.$key);
                }
            }
            continue;
        }
        foreach ($values['detail_images'] as $image) {
            if (! is_file(public_path($image))) {
                throw new RuntimeException('Missing release image: '.$image);
            }
        }
        $changes[] = ['slug' => $values['slug'], 'before' => null, 'after' => $values];
    }
    foreach ($payload['update'] as $patch) {
        $query = App\Models\PortfolioItem::where('slug', $patch['slug']);
        $item = ($lock ? $query->lockForUpdate() : $query)->firstOrFail();
        $after = array_diff_key($patch, ['slug' => true, 'expected' => true]);
        $before = [];
        $alreadyApplied = true;
        foreach ($after as $key => $value) {
            $before[$key] = $item->getAttribute($key);
            if ($before[$key] !== $value) {
                $alreadyApplied = false;
            }
        }
        if ($alreadyApplied) {
            continue;
        }
        if ($before !== $patch['expected']) {
            throw new RuntimeException('Content changed since review: '.$patch['slug']);
        }
        $changes[] = ['slug' => $patch['slug'], 'before' => $before, 'after' => $after];
    }
    return $changes;
};

if (! $apply) {
    $changes = $plan(false);
    echo json_encode(['mode' => 'dry-run', 'changes' => $changes], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL;
    exit;
}

Illuminate\Support\Facades\DB::transaction(function () use ($plan): void {
    $changes = $plan(true);
    if ($changes === []) {
        echo "Already applied; no changes.\n";
        return;
    }
    $directory = storage_path('app/private/portfolio-release-backups');
    if (! is_dir($directory) && ! mkdir($directory, 0700, true)) {
        throw new RuntimeException('Cannot create backup directory.');
    }
    $backup = $directory.'/'.gmdate('Ymd-His').'-'.bin2hex(random_bytes(4)).'.json';
    $json = json_encode($changes, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
    if (file_put_contents($backup, $json, LOCK_EX) !== strlen($json)) {
        throw new RuntimeException('Backup failed; database was not changed.');
    }
    chmod($backup, 0600);
    foreach ($changes as $change) {
        $item = App\Models\PortfolioItem::firstOrNew(['slug' => $change['slug']]);
        $item->fill($change['after'])->save();
    }
    echo 'Applied '.count($changes).' changes. Backup: '.$backup.PHP_EOL;
});
