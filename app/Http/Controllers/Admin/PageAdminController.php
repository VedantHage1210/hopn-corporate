<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    // List all pages
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.create');
    }

    // Store new page
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages',
            'title' => 'required|array',
            'content' => 'required|array',
        ]);
        
        $validated['is_published'] = $request->has('is_published');
        Page::create($validated);
        
        return redirect()->route('admin.pages.index')->with('success', 'Page saved successfully!');
    }

    // Show edit form
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    // Update existing page
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'title' => 'required|array',
            'content' => 'required|array',
        ]);
        
        $validated['is_published'] = $request->has('is_published');
        $page->update($validated);
        
        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully!');
    }

    // Delete page
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Page deleted!');
    }
}
