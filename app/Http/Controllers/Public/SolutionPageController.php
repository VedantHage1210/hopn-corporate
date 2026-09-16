<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SolutionPage;

class SolutionPageController extends Controller
{
    public function show(string $lang, string $slug)
    {
        $page = SolutionPage::visible()->where('slug', $slug)->firstOrFail();
        $page->load('blocks');

        return view('public.solutions.show', compact('page'));
    }
}
