<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function index()
    {
        $featuredProducts = Product::where('featured', true)->inRandomOrder()->take(8)->get();
        $latestProducts = Product::latest()->take(8)->get();
        $banners = HomeBanner::latest()->get();

        return view('landing-page', compact('featuredProducts', 'latestProducts', 'banners'));
    }

}
