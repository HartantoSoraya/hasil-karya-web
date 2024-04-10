<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.app.about');
    }
}
