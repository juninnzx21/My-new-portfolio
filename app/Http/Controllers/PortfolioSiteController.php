<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;

class PortfolioSiteController extends Controller
{
    public function home()
    {
        return view('portifolio', [
            'portfolioItems' => PortfolioItem::publicPortfolioItems(),
        ]);
    }

    public function detail(PortfolioItem $portfolioItem)
    {
        return view('portfolio-detail-dynamic', [
            'portfolioItem' => $portfolioItem,
        ]);
    }

    public function detailByPath(string $detailPath)
    {
        $detailPath = trim($detailPath, '/');

        if (! Schema::hasTable('portfolio_items')) {
            throw (new ModelNotFoundException())->setModel(PortfolioItem::class);
        }

        $portfolioItem = PortfolioItem::query()
            ->where('details_url', $detailPath)
            ->orWhere('details_url', '/'.$detailPath)
            ->firstOrFail();

        return redirect()->route('portfolio.detail', $portfolioItem);
    }
}
