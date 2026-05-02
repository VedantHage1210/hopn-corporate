<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::query()->where('slug', 'about')->first();

        return view('public.pages.about', compact('page'));
    }
}
