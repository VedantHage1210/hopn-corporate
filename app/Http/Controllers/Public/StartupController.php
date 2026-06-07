<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Startup;
use App\Models\Program;

class StartupController extends Controller
{
    public function index()
    {
        $lang     = request()->route('lang', 'en');
      $startups = Startup::latest()->get();
       $programs = Program::where('is_published', true)->latest()->take(3)->get();

        return view('public.startups.index', compact('startups', 'programs', 'lang'));
    }
}
