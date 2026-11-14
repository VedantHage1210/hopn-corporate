<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\Program;
use App\Models\InnovationDomain;
use App\Models\PlatformApp;
use App\Models\Event;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $lang     = $request->route('lang', 'en');
        $search   = trim($request->get('search', ''));
        $category = $request->get('category', 'all');

        $products = Product::where('is_published', true)
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title_en', 'like', "%{$search}%")
                       ->orWhere('summary_en', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        $services = Service::where('is_published', true)
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('name_de', 'like', "%{$search}%")
                       ->orWhere('summary', 'like', "%{$search}%")
                       ->orWhere('summary_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        $programs = Program::where('is_published', true)
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title_en', 'like', "%{$search}%")
                       ->orWhere('summary_en', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        $domains = InnovationDomain::where('is_published', true)
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')->get();

        $apps = PlatformApp::visible()
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('name_en', 'like', "%{$search}%")
                       ->orWhere('name_de', 'like', "%{$search}%")
                       ->orWhere('tagline_en', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')->get();

        $events = Event::where('is_published', true)
            ->when($search !== '', function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%")
                       ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->orderBy('date')->get();

        return view('public.catalog.index', compact(
            'products', 'services', 'programs', 'domains', 'apps', 'events',
            'lang', 'search', 'category'
        ));
    }
}
