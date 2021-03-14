<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function index()
    {
        $featuredProducts = Product::where('featured', true)->inRandomOrder()->take(8)->get();
        $latestProducts = Product::latest()->inRandomOrder()->take(8)->get();

        return view('landing-page', compact('featuredProducts', 'latestProducts'));
    }

}
