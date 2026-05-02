<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Case Studies',
            'items' => CaseStudy::query()->latest()->paginate(20),
            'columns' => ['ID' => 'id', 'Title' => 'title_en', 'Slug' => 'slug', 'Industry' => 'industry'],
            'createRoute' => route('admin.case-studies.create'),
            'editRouteName' => 'admin.case-studies.edit',
            'destroyRouteName' => 'admin.case-studies.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Case Study',
            'action' => route('admin.case-studies.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'industry', 'label' => 'Industry'],
                ['name' => 'client_name', 'label' => 'Client'],
                ['name' => 'challenge_en', 'label' => 'Challenge', 'type' => 'textarea'],
                ['name' => 'solution_en', 'label' => 'Solution', 'type' => 'textarea'],
                ['name' => 'outcomes_en', 'label' => 'Outcomes', 'type' => 'textarea'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:case_studies,slug'],
            'industry' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'challenge_en' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
            'outcomes_en' => ['nullable', 'string'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        CaseStudy::create($data);
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.case-studies.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Case Study',
            'action' => route('admin.case-studies.update', $caseStudy->id),
            'method' => 'PUT',
            'item' => $caseStudy,
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'industry', 'label' => 'Industry'],
                ['name' => 'client_name', 'label' => 'Client'],
                ['name' => 'challenge_en', 'label' => 'Challenge', 'type' => 'textarea'],
                ['name' => 'solution_en', 'label' => 'Solution', 'type' => 'textarea'],
                ['name' => 'outcomes_en', 'label' => 'Outcomes', 'type' => 'textarea'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:case_studies,slug,' . $caseStudy->id],
            'industry' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'challenge_en' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
            'outcomes_en' => ['nullable', 'string'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        $caseStudy->update($data);
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CaseStudy::findOrFail($id)->delete();
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study deleted.');
    }
}
