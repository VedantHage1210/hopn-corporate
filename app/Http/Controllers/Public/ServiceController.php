<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $activeCategory = null;
        $query = Service::query()->where('is_published', true);

        if ($categorySlug = request('category')) {
            $activeCategory = ServiceCategory::where('slug', $categorySlug)->first();
            if ($activeCategory) {
                $query->where('service_category_id', $activeCategory->id);
            }
        }

        $services = $query->latest()->paginate(15);

        return view('public.services.index', compact('services', 'activeCategory'));
    }

    public function show(string $lang, string $slug)
    {
        $service = Service::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.services.show', compact('service'));
    }
}