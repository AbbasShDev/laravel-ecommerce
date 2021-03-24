<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {

        $categories = Category::latest()->get();
        if (! session()->has('success_message')){
            return redirect()->route('landing-page');
        }
        return view('thankyou', compact('categories'));
    }

}
