<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Logo;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::where('visible', true)->orderBy('sort_order')->paginate(24);
        $logos    = Logo::where('visible', true)->orderBy('sort_order')->get();
        return view('public.partners.index', compact('partners', 'logos'));
    }
}
