<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        return view('public.industries.index');
    }

    public function show(string $lang, string $slug)
    {
        return view('public.industries.show', compact('slug'));
    }
}
