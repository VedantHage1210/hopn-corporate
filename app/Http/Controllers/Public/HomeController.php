<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Industry;
use App\Models\InnovationDomain;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\Logo;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $services        = Service::where('is_published', true)->latest()->take(6)->get();
        $caseStudies     = CaseStudy::where('is_published', true)->latest()->take(3)->get();
        $homeProducts = Product::where('is_published', true)->latest()->take(6)->get();
        $partners        = Partner::where('visible', true)->orderBy('sort_order')->get();
        $logos = Logo::where('visible', true)->orderBy('sort_order')->take(20)->get();
        $testimonials    = Testimonial::where('visible', true)->orderBy('sort_order')->get();
        $upcomingEvents  = Event::where('is_published', true)->orderBy('date')->take(3)->get();
        $homeIndustries  = Industry::where('is_published', true)->orderBy('sort_order')->take(9)->get();
        $homeDomains     = InnovationDomain::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $latestPosts     = BlogPost::latest('published_at')->take(3)->get();

       return view('public.home', compact(
    'services', 'caseStudies', 'partners','logos', 'testimonials',
    'upcomingEvents', 'homeIndustries', 'homeDomains', 'latestPosts', 'homeProducts'
));
    }
}
