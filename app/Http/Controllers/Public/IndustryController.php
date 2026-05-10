<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::where('is_published', true)
            ->orderBy('sort_order')
            ->get();
        return view('public.industries.index', compact('industries'));
    }

    public function show(string $lang, string $slug)
    {
        $industry = Industry::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        return view('public.industries.show', compact('industry'));
    }
}
