<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Startup;

class StartupController extends Controller
{
    public function index()
    {
        $lang     = request()->route('lang', 'en');
        $startups = Startup::latest()->get();
        return view('public.startups.index', compact('startups', 'lang'));
    }
}
