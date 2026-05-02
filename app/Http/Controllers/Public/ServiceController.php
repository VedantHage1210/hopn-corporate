<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->where('is_published', true)->latest()->paginate(15);

        return view('public.services.index', compact('services'));
    }

    public function show(string $lang, string $slug)
    {
        $service = Service::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.services.show', compact('service'));
    }
}
