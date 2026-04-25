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
        'display_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
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
            self::query()->updateOrCreate(
                ['slug' => $item['slug']],
                $item,
            );
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
        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            return $this->image_path;
        }

        return asset(ltrim($this->image_path, '/'));
    }
}
