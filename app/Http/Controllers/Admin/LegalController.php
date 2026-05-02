<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Page::query()->whereIn('slug', ['impressum', 'privacy-policy', 'cookie-policy'])->paginate(20);
        return view('admin.shared.index', [
            'title' => 'Legal Pages',
            'items' => $items,
            'columns' => ['ID' => 'id', 'Title' => 'title', 'Slug' => 'slug'],
            'createRoute' => route('admin.legal.create'),
            'editRouteName' => 'admin.legal.edit',
            'destroyRouteName' => 'admin.legal.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Legal Page',
            'action' => route('admin.legal.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'title', 'label' => 'Title'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'excerpt', 'label' => 'Content', 'type' => 'textarea'],
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
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug'],
            'excerpt' => ['nullable', 'string'],
        ]);
        $data['is_visible'] = true;
        $data['is_published'] = $request->boolean('is_published');
        Page::create($data);
        return redirect()->route('admin.legal.index')->with('status', 'Legal page created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.legal.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Legal Page',
            'action' => route('admin.legal.update', $page->id),
            'method' => 'PUT',
            'item' => $page,
            'fields' => [
                ['name' => 'title', 'label' => 'Title'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'excerpt', 'label' => 'Content', 'type' => 'textarea'],
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
            'slug' => ['required', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'excerpt' => ['nullable', 'string'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        $data['is_visible'] = true;
        $page->update($data);
        return redirect()->route('admin.legal.index')->with('status', 'Legal page updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.legal.index')->with('status', 'Legal page deleted.');
    }
}
