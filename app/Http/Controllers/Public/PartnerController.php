<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::query()->where('visible', true)->orderBy('sort_order')->paginate(24);

        return view('public.partners.index', compact('partners'));
    }
}
