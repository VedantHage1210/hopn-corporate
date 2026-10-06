<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AcademicPartner;
use App\Models\ResearchPublication;

class ResearchController extends Controller
{
    public function index()
    {
        $publications = ResearchPublication::visible()->orderBy('sort_order')->get();
        $academicPartners = AcademicPartner::visible()->orderBy('sort_order')->get();

        return view('public.research.index', compact('publications', 'academicPartners'));
    }

    public function show(string $lang, string $id)
    {
        $publication = ResearchPublication::findOrFail($id);

        return view('public.research.show', compact('publication'));
    }
}
