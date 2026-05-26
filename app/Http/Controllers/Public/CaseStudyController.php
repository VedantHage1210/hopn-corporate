<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::query()->where('is_published', true)->latest()->paginate(15);

        return view('public.case-studies.index', compact('caseStudies'));
    }

    public function show(string $lang, string $slug)
{
    // 'with' ka use karke relationships ko load karo
    $caseStudy = CaseStudy::query()
                    ->with(['industries', 'services']) // Yeh line error fix karegi
                    ->where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

    return view('public.case-studies.show', compact('caseStudy'));
}
}
