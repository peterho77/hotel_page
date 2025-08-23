<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function switch($locale)
    {
        if(!in_array($locale, ['en','vi']))
        {
            abort(400);
        }
        session(['locale' => $locale]);
        
        
        return redirect()->back();
    }
}
