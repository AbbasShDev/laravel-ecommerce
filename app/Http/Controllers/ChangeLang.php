<?php

namespace App\Http\Controllers;

class ChangeLang extends Controller
{

    public function switch()
    {
        $locle = request()->locale;

        $segments = request()->create(url()->previous())->segments();
        $segments[0] = $locle;

        $redirectURL = implode('/', $segments);

        return redirect()->to($redirectURL);
    }
}
