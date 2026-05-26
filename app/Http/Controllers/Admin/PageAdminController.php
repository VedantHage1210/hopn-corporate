<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    public function create() 
    {
        return view('admin.pages.create');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages',
            'title' => 'required|array',
            'content' => 'required|array',
        ]);
        
        $validated['is_published'] = $request->has('is_published');
        Page::create($validated);
        
        return back()->with('success', 'Page saved successfully!');
    }
}
