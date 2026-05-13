<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\InnovationDomain;

class InnovationDomainController extends Controller
{
    public function index()
    {
        $domains = InnovationDomain::where('is_published', true)
            ->orderBy('sort_order')
            ->get();
        return view('public.innovation-domains.index', compact('domains'));
    }

    public function show(string $lang, string $slug)
    {
        $domain = InnovationDomain::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        return view('public.innovation-domains.show', compact('domain'));
    }
}
