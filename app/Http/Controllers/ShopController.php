<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();

        return view('shop', compact('products'));
    }

    public function show(Product $product)
    {
        $mightLike = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();

        return view('product', compact('product', 'mightLike'));
    }

}
