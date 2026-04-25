<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;

class PortfolioSiteController extends Controller
{
    public function home()
    {
        return view('portifolio', [
            'portfolioItems' => PortfolioItem::publicPortfolioItems(),
        ]);
    }
}
