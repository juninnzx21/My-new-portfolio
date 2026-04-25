<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

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

    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $data = $request->validate([
            'eyebrow' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'live_url' => ['required', 'url', 'max:2048'],
            'details_url' => ['required', 'string', 'max:2048'],
            'display_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
            'image_path' => ['nullable', 'string', 'max:2048'],
            'image_file' => ['nullable', 'image', 'max:5120'],
        ]);

        $data['is_visible'] = $request->boolean('is_visible');

        if ($request->hasFile('image_file')) {
            $directory = public_path('assets/img/portfolio/custom');
            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $file = $request->file('image_file');
            $filename = $portfolioItem->slug.'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $data['image_path'] = 'assets/img/portfolio/custom/'.$filename;
        }

        $portfolioItem->update($data);

        return redirect()->route('portfolio-admin.index')->with('message', [
            'type' => 'success',
            'text' => 'Portfolio item updated successfully.',
        ]);
    }
}
