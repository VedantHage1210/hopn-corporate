<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    public function impressum()
    {
        return view('public.legal.impressum');
    }

    public function privacy()
    {
        return view('public.legal.privacy-policy');
    }

    public function cookie()
    {
        return view('public.legal.cookie-policy');
    }
}
