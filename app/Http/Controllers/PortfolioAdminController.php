<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PortfolioAdminController extends Controller
{
    public function index()
    {
        if (Schema::hasTable('portfolio_items')) {
            PortfolioItem::syncDefaults();
            $portfolioItems = PortfolioItem::query()->orderBy('display_order')->get();
        } else {
            $portfolioItems = new Collection(PortfolioItem::defaultItems());
        }

        return view('portfolio-admin.index', [
            'portfolioItems' => $portfolioItems,
            'adminEmail' => config('portfolio.admin_email'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatePortfolioItem($request);
        $data['slug'] = $this->resolveSlug($request->input('slug'), $data['title']);
        $data['is_visible'] = $request->boolean('is_visible');
        $data['detail_images'] = $this->extractDetailImages($request);

        $data['image_path'] = $this->handleImageUpload(
            $request,
            $data['slug'],
            $data['image_path'] ?? null,
        );

        PortfolioItem::query()->create($data);

        return redirect()->route('portfolio-admin.index')->with('message', [
            'type' => 'success',
            'text' => 'New portfolio item created successfully.',
        ]);
    }

    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $data = $this->validatePortfolioItem($request, $portfolioItem);

        $data['is_visible'] = $request->boolean('is_visible');
        $data['slug'] = $portfolioItem->slug;
        $data['detail_images'] = $this->extractDetailImages($request, $portfolioItem);

        $data['image_path'] = $this->handleImageUpload(
            $request,
            $portfolioItem->slug,
            $data['image_path'] ?? null,
        );

        $portfolioItem->update($data);

        return redirect()->route('portfolio-admin.index')->with('message', [
            'type' => 'success',
            'text' => 'Portfolio item updated successfully.',
        ]);
    }

    protected function validatePortfolioItem(Request $request, ?PortfolioItem $portfolioItem = null): array
    {
        return $request->validate([
            'slug' => [
                Rule::requiredIf($portfolioItem === null),
                'nullable',
                'string',
                'max:255',
                Rule::unique('portfolio_items', 'slug')->ignore($portfolioItem?->id),
            ],
            'eyebrow' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'live_url' => ['required', 'url', 'max:2048'],
            'details_url' => ['required', 'string', 'max:2048'],
            'detail_category' => ['nullable', 'string', 'max:255'],
            'detail_client' => ['nullable', 'string', 'max:255'],
            'detail_project_date' => ['nullable', 'string', 'max:255'],
            'detail_heading' => ['nullable', 'string', 'max:255'],
            'detail_body' => ['nullable', 'string'],
            'detail_images_text' => ['nullable', 'string'],
            'existing_detail_images' => ['nullable', 'array'],
            'existing_detail_images.*' => ['string', 'max:2048'],
            'detail_image_files' => ['nullable', 'array'],
            'detail_image_files.*' => ['image', 'max:5120'],
            'display_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
            'image_path' => ['nullable', 'string', 'max:2048'],
            'image_file' => ['nullable', 'image', 'max:5120'],
        ]);
    }

    protected function resolveSlug(?string $slug, string $title): string
    {
        $baseSlug = Str::of($slug ?: $title)->slug('-')->value();

        if ($baseSlug === '') {
            $baseSlug = 'portfolio-item';
        }

        $candidate = $baseSlug;
        $counter = 1;

        while (PortfolioItem::query()->where('slug', $candidate)->exists()) {
            $candidate = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $candidate;
    }

    protected function handleImageUpload(Request $request, string $slug, ?string $currentImagePath): ?string
    {
        if (! $request->hasFile('image_file')) {
            return $currentImagePath;
        }

        $directory = public_path('assets/img/portfolio/custom');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image_file');
        $filename = $slug.'-'.time().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'assets/img/portfolio/custom/'.$filename;
    }

    protected function extractDetailImages(Request $request, ?PortfolioItem $portfolioItem = null): array
    {
        $selectedExistingImages = collect($request->input('existing_detail_images', []))
            ->map(fn (string $path) => trim($path))
            ->filter()
            ->values();

        if ($request->hasFile('detail_image_files')) {
            $directory = public_path('assets/img/portfolio/custom/details');
            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $baseSlug = $portfolioItem?->slug ?: Str::slug((string) $request->input('slug', 'portfolio-item'));

            $uploadedImages = collect($request->file('detail_image_files'))
                ->filter()
                ->map(function ($file, int $index) use ($directory, $baseSlug) {
                    $filename = $baseSlug.'-detail-'.time().'-'.$index.'.'.$file->getClientOriginalExtension();
                    $file->move($directory, $filename);

                    return 'assets/img/portfolio/custom/details/'.$filename;
                })
                ->values();

            return $selectedExistingImages
                ->concat($uploadedImages)
                ->values()
                ->all();
        }

        $raw = preg_split('/\r\n|\r|\n/', (string) $request->input('detail_images_text', ''));
        $detailImages = collect($raw)
            ->map(fn (string $path) => trim($path))
            ->filter()
            ->values()
            ->all();

        if ($detailImages !== []) {
            return $detailImages;
        }

        if ($selectedExistingImages->isNotEmpty()) {
            return $selectedExistingImages->all();
        }

        return Arr::wrap($portfolioItem?->detail_images ?: $request->input('image_path'));
    }
}
