<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {

        if (! session()->has('success_message')){
            return redirect()->route('landing-page');
        }
        return view('thankyou');
    }

}
