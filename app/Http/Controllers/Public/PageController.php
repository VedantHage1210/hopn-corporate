<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TeamMember;

class PageController extends Controller
{
    public function about()
    {
        $page        = Page::where('slug', 'about')->first();
        $teamMembers = TeamMember::where('visible', true)
                                 ->orderBy('sort_order')
                                 ->get();

        return view('public.pages.about', compact('page', 'teamMembers'));
    }
}
