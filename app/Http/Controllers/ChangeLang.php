<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class ChangeLang extends Controller {

    public function switch()
    {
        $locale = request()->locale;
        $previousURL = url()->previous();

        $URLQuery = Str::contains($previousURL, '?') ? Str::after($previousURL, '?') : null;

        $segments = request()->create($previousURL)->segments();
        $segments[0] = $locale;

        $URL = implode('/', $segments);

        if ($URLQuery) {
            $redirectURL = $URL . '?' . $URLQuery;
        } else {
            $redirectURL = $URL;
        }

        return redirect()->to($redirectURL);
    }
}
