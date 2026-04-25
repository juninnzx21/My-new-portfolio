<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class PortfolioItem extends Model
{
    protected $fillable = [
        'slug',
        'eyebrow',
        'title',
        'image_path',
        'live_url',
        'details_url',
        'detail_category',
        'detail_client',
        'detail_project_date',
        'detail_heading',
        'detail_body',
        'detail_images',
        'display_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'detail_images' => 'array',
    ];

    public static function defaultItems(): array
    {
        return config('portfolio.defaults', []);
    }

    public static function syncDefaults(): void
    {
        if (! Schema::hasTable('portfolio_items')) {
            return;
        }

        foreach (self::defaultItems() as $item) {
            $portfolioItem = self::query()->firstOrNew([
                'slug' => $item['slug'],
            ]);

            if (! $portfolioItem->exists) {
                $portfolioItem->fill($item)->save();
                continue;
            }

            $missingValues = [];

            foreach ($item as $key => $value) {
                $currentValue = $portfolioItem->getAttribute($key);

                if ($currentValue === null || $currentValue === '' || $currentValue === []) {
                    $missingValues[$key] = $value;
                }
            }

            if ($missingValues !== []) {
                $portfolioItem->fill($missingValues)->save();
            }
        }
    }

    public static function publicPortfolioItems(): Collection
    {
        if (! Schema::hasTable('portfolio_items')) {
            return collect(self::defaultItems());
        }

        if (self::query()->count() === 0) {
            self::syncDefaults();
        }

        return self::query()
            ->where('is_visible', true)
            ->orderBy('display_order')
            ->get();
    }

    public function imageUrl(): string
    {
        return $this->normalizeAssetUrl($this->image_path);
    }

    public function detailImageUrls(): array
    {
        $detailImages = $this->detail_images;

        if (! is_array($detailImages) || $detailImages === []) {
            return [$this->imageUrl()];
        }

        return collect($detailImages)
            ->filter()
            ->map(fn (string $path) => $this->normalizeAssetUrl($path))
            ->values()
            ->all();
    }

    public function hasConfiguredDetailImages(): bool
    {
        return is_array($this->detail_images) && collect($this->detail_images)->filter()->isNotEmpty();
    }

    public function shouldRenderLivePreview(): bool
    {
        if ($this->hasConfiguredDetailImages()) {
            return false;
        }

        $liveUrl = (string) $this->live_url;

        return $liveUrl !== ''
            && (str_contains($liveUrl, '.juninnzxtec.com.br') || str_contains($liveUrl, 'juninnzxtec.com.br/'));
    }

    protected function normalizeAssetUrl(?string $path): string
    {
        $path = (string) $path;
        $version = $this->updated_at?->timestamp ?? time();

        if ($path === '') {
            return asset('assets/img/portfolio/portifolio.png').'?v='.$version;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            $separator = str_contains($path, '?') ? '&' : '?';

            return $path.$separator.'v='.$version;
        }

        return asset(ltrim($path, '/')).'?v='.$version;
    }
}
