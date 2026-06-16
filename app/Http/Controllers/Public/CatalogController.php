<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\Program;
use App\Models\InnovationDomain;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $lang     = $request->route('lang', 'en');
        $search   = $request->get('search', '');
        $category = $request->get('category', 'all');

        // Products — title_en, summary_en
        $products = Product::where('is_published', true)
            ->when($search, function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title_en', 'like', "%{$search}%")
                       ->orWhere('summary_en', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        // Services — ye columns Service model se check karke fix kiya
        $services = Service::where('is_published', true)
            ->when($search, function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title_en', 'like', "%{$search}%")
                       ->orWhere('summary_en', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%")
                       ->orWhere('summary_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        // Programs — title_en, summary_en
        $programs = Program::where('is_published', true)
            ->when($search, function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('title_en', 'like', "%{$search}%")
                       ->orWhere('summary_en', 'like', "%{$search}%")
                       ->orWhere('title_de', 'like', "%{$search}%");
                });
            })
            ->latest()->get();

        // Domains
        $domains = InnovationDomain::where('is_published', true)
            ->when($search, function($q) use ($search) {
                $q->where(function($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')->get();

        return view('public.catalog.index', compact(
            'products', 'services', 'programs', 'domains',
            'lang', 'search', 'category'
        ));
    }
}
