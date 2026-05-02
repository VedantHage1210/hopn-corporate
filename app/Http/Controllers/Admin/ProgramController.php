<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Programs',
            'items' => Program::query()->latest()->paginate(15),
            'columns' => ['ID' => 'id', 'Title' => 'title_en', 'Slug' => 'slug', 'Published' => 'is_published'],
            'createRoute' => route('admin.programs.create'),
            'editRouteName' => 'admin.programs.edit',
            'destroyRouteName' => 'admin.programs.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Program',
            'action' => route('admin.programs.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'summary_en', 'label' => 'Summary (EN)', 'type' => 'textarea'],
                ['name' => 'audience_en', 'label' => 'Audience (EN)', 'type' => 'textarea'],
                ['name' => 'duration_weeks', 'label' => 'Duration Weeks', 'type' => 'number'],
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
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:programs,slug'],
            'summary_en' => ['nullable', 'string'],
            'audience_en' => ['nullable', 'string'],
            'duration_weeks' => ['nullable', 'integer'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        Program::create($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.programs.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);

        return view('admin.shared.form', [
            'title' => 'Edit Program',
            'action' => route('admin.programs.update', $program->id),
            'method' => 'PUT',
            'item' => $program,
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'summary_en', 'label' => 'Summary (EN)', 'type' => 'textarea'],
                ['name' => 'audience_en', 'label' => 'Audience (EN)', 'type' => 'textarea'],
                ['name' => 'duration_weeks', 'label' => 'Duration Weeks', 'type' => 'number'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = Program::findOrFail($id);
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:programs,slug,' . $program->id],
            'summary_en' => ['nullable', 'string'],
            'audience_en' => ['nullable', 'string'],
            'duration_weeks' => ['nullable', 'integer'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        $program->update($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Program::findOrFail($id)->delete();
        return redirect()->route('admin.programs.index')->with('status', 'Program deleted.');
    }
}
