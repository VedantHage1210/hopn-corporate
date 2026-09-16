<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PlatformApp;

class AppsController extends Controller
{
    public function index()
    {
        $apps = PlatformApp::visible()->orderBy('sort_order')->get();
        return view('public.apps.index', compact('apps'));
    }

    public function show(string $lang, string $slug)
    {
        $app = PlatformApp::visible()->where('slug', $slug)->firstOrFail();
        return view('public.apps.show', compact('app'));
    }
}
