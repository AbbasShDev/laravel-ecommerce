<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class ShopController extends Controller {

    public function index()
    {
        $pagination = 9;
        $categories = Category::all();

        if (request()->category) {
            $products = Product::latest()->with('category')->whereHas('category', function ($query) {
                $query->where('slug', request()->category);
            });

            $categoryName = optional(Category::where('slug', request()->category)->first())->getTranslatedAttribute('name');
        } else {
            $products = Product::where('featured', true);
            $categoryName = __('shop.featured');
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'DESC')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop', compact('products', 'categories', 'categoryName'));
    }

    public function show(Product $product)
    {
        $mightAlsoLike = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();

        $stockLevel = getStockLevel($product->quantity);

        return view('product', compact('product', 'mightAlsoLike', 'stockLevel'));
    }

    public function search()
    {
        return view('search-result');
    }

}
