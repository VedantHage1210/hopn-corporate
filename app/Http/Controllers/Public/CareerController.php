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

        $products = Product::where('is_published', true)
            ->when($search, fn($q) => $q->where('title_en', 'like', "%{$search}%")
                ->orWhere('summary_en', 'like', "%{$search}%"))
            ->latest()->get();

        $services = Service::where('is_published', true)
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%")
                ->orWhere('summary', 'like', "%{$search}%"))
            ->latest()->get();

        $programs = Program::where('is_published', true)
            ->when($search, fn($q) => $q->where('title_en', 'like', "%{$search}%")
                ->orWhere('summary_en', 'like', "%{$search}%"))
            ->latest()->get();

        $domains = InnovationDomain::where('is_published', true)
            ->orderBy('sort_order')->get();

        return view('public.catalog.index', compact(
            'products', 'services', 'programs', 'domains',
            'lang', 'search', 'category'
        ));
    }
}
