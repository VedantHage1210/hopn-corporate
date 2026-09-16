<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\LabItem;
use App\Models\LabStep;
use App\Models\LabsPageContent;
use App\Models\Testimonial;

class LabsController extends Controller
{
    public function index()
    {
        $hero        = LabsPageContent::singleton();
        $focusAreas  = LabItem::visible()->type('focus_area')->orderBy('sort_order')->get();
        $programs    = LabItem::visible()->type('program')->orderBy('sort_order')->get();
        $steps       = LabStep::visible()->orderBy('sort_order')->orderBy('step_number')->get();
        $testimonials = Testimonial::where('visible', true)->orderBy('sort_order')->limit(3)->get();

        return view('public.labs.index', compact('hero', 'focusAreas', 'programs', 'steps', 'testimonials'));
    }
}
