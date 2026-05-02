<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::query()->where('is_published', true)->latest()->take(6)->get();
        $caseStudies = CaseStudy::query()->where('is_published', true)->latest()->take(3)->get();
        $partners = Partner::query()->where('visible', true)->orderBy('sort_order')->get();
        $testimonials = Testimonial::query()->where('visible', true)->orderBy('sort_order')->get();

        return view('public.home', compact('services', 'caseStudies', 'partners', 'testimonials'));
    }
}
