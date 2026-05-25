<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index()
    {
        // Yahan tumhara custom index.blade.php use hoga
        return view('admin.case-studies.index', [
            'items' => CaseStudy::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        // Yahan tumhara custom form.blade.php use hoga
        return view('admin.case-studies.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:case_studies,slug'],
            'title_de' => ['nullable', 'string'],
            'title_ar' => ['nullable', 'string'],
            'client_name_en' => ['nullable', 'string'],
            'client_name_de' => ['nullable', 'string'],
            'client_name_ar' => ['nullable', 'string'],
            'challenge_en' => ['nullable', 'string'],
            'challenge_de' => ['nullable', 'string'],
            'challenge_ar' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
            'solution_de' => ['nullable', 'string'],
            'solution_ar' => ['nullable', 'string'],
            'outcomes_en' => ['nullable', 'string'],
            'outcomes_de' => ['nullable', 'string'],
            'outcomes_ar' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url'],
            'pdf_url' => ['nullable', 'url'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        CaseStudy::create($data);

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study created successfully.');
    }

    public function edit(string $id)
    {
        $item = CaseStudy::findOrFail($id);
        return view('admin.case-studies.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:case_studies,slug,' . $caseStudy->id],
            'title_de' => ['nullable', 'string'],
            'title_ar' => ['nullable', 'string'],
            'client_name_en' => ['nullable', 'string'],
            'client_name_de' => ['nullable', 'string'],
            'client_name_ar' => ['nullable', 'string'],
            'challenge_en' => ['nullable', 'string'],
            'challenge_de' => ['nullable', 'string'],
            'challenge_ar' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
            'solution_de' => ['nullable', 'string'],
            'solution_ar' => ['nullable', 'string'],
            'outcomes_en' => ['nullable', 'string'],
            'outcomes_de' => ['nullable', 'string'],
            'outcomes_ar' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url'],
            'pdf_url' => ['nullable', 'url'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $caseStudy->update($data);

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study updated successfully.');
    }

    public function destroy(string $id)
    {
        CaseStudy::findOrFail($id)->delete();
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study deleted.');
    }
}
