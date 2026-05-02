<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Pages',
            'items' => Page::query()->latest()->paginate(20),
            'columns' => ['ID' => 'id', 'Title' => 'title', 'Slug' => 'slug', 'Published' => 'is_published'],
            'createRoute' => route('admin.pages.create'),
            'editRouteName' => 'admin.pages.edit',
            'destroyRouteName' => 'admin.pages.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Page',
            'action' => route('admin.pages.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'title', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'excerpt', 'label' => 'Excerpt (EN)', 'type' => 'textarea'],
                ['name' => 'excerpt_de', 'label' => 'Excerpt (DE)', 'type' => 'textarea'],
                ['name' => 'is_visible', 'label' => 'Visible', 'type' => 'checkbox'],
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
            'title' => ['required', 'string', 'max:255'],
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug'],
            'excerpt' => ['nullable', 'string'],
            'excerpt_de' => ['nullable', 'string'],
        ]);
        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_published'] = $request->boolean('is_published');
        Page::create($data);
        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.pages.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Page',
            'action' => route('admin.pages.update', $page->id),
            'method' => 'PUT',
            'item' => $page,
            'fields' => [
                ['name' => 'title', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'excerpt', 'label' => 'Excerpt (EN)', 'type' => 'textarea'],
                ['name' => 'excerpt_de', 'label' => 'Excerpt (DE)', 'type' => 'textarea'],
                ['name' => 'is_visible', 'label' => 'Visible', 'type' => 'checkbox'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'excerpt' => ['nullable', 'string'],
            'excerpt_de' => ['nullable', 'string'],
        ]);
        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_published'] = $request->boolean('is_published');
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }
}
