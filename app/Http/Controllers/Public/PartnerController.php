<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::where('visible', true)
                        ->orderBy('sort_order')
                        ->paginate(24);
        
        $lang = request()->route('lang', 'en');
        
        return view('public.partners.index', compact('partners', 'lang'));
    }
}
