<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function changeLang($lang)
    {
        app()->setLocale($lang);
        session()->put('locale', $lang);
        return back();
    }
}
