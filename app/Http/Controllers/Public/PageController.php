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

    /**
     * Dedicated Founder & Team page (brief item 13) — separate from the
     * About page's team strip, with the founder(s) featured first.
     */
    public function team()
    {
        $founders = TeamMember::where('visible', true)
                               ->where('is_founder', true)
                               ->orderBy('sort_order')
                               ->get();

        $teamMembers = TeamMember::where('visible', true)
                                  ->where('is_founder', false)
                                  ->orderBy('sort_order')
                                  ->get();

        return view('public.pages.team', compact('founders', 'teamMembers'));
    }

    public function show(string $lang, string $slug)
    {
        $page = Page::with('blocks')->where('slug', $slug)
                    ->published()
                    ->firstOrFail();

        if ($page->external_url) {
            return redirect()->away($page->external_url);
        }

        return view('public.pages.show', compact('page', 'lang'));
    }

    /**
     * Signed preview link — same view as the public page, but bypasses
     * the published-only restriction. Only reachable via a valid,
     * time-limited signature (see the 'signed' middleware on this route),
     * so a draft is never guessable/public.
     */
    public function preview(string $lang, string $slug)
    {
        $page = Page::with('blocks')->where('slug', $slug)->firstOrFail();

        if ($page->external_url) {
            return redirect()->away($page->external_url);
        }

        return view('public.pages.show', compact('page', 'lang'))
            ->with('isPreview', true);
    }
}