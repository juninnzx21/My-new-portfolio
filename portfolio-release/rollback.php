<?php

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
if (count($argv) !== 3 || $argv[1] !== '--restore') {
    fwrite(STDERR, "Usage: php rollback.php --restore /private/backup.json\n");
    exit(1);
}
$root = getenv('PORTFOLIO_APP_ROOT') ?: dirname(__DIR__);
require $root.'/vendor/autoload.php';
$app = require $root.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$changes = json_decode(file_get_contents($argv[2]), true, 512, JSON_THROW_ON_ERROR);
Illuminate\Support\Facades\DB::transaction(function () use ($changes): void {
    foreach ($changes as $change) {
        $item = App\Models\PortfolioItem::where('slug', $change['slug'])->lockForUpdate()->firstOrFail();
        foreach ($change['after'] as $key => $value) {
            if ($item->getAttribute($key) !== $value) {
                throw new RuntimeException('Later edits detected; refusing rollback: '.$change['slug']);
            }
        }
        // Keep the new public project record and image; do not delete user data.
        $item->fill($change['before'] ?? ['is_visible' => false])->save();
    }
});
echo "Restored existing descriptions and hid newly added cards. Images retained.\n";
