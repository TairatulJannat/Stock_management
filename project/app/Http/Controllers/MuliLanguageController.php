<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuliLanguageController extends Controller
{
    //
    public function switchLocale(Request $request, $locale){
        session(['APP_LOCALE' => $locale]);
        return redirect()->back();
    }
}
