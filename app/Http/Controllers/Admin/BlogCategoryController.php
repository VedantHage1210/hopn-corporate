<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('posts')->latest()->paginate(config('hopn.pagination.default', 15));

        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.form', ['category' => new BlogCategory()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateCategory($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('status', 'Category created.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.form', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $this->validateCategory($request, $blogCategory->id);

        $blogCategory->update($data);

        return redirect()->route('admin.blog-categories.index')->with('status', 'Category updated.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')->with('status', 'Category deleted.');
    }

    private function validateCategory(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'name_en'     => ['required', 'string', 'max:120'],
            'name_de'     => ['nullable', 'string', 'max:120'],
            'slug'        => ['nullable', 'string', 'max:160', 'unique:blog_categories,slug' . ($ignoreId ? ",{$ignoreId}" : '')],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        // Map name_en → name for DB column compatibility
        $data['name'] = $data['name_en'];

        return $data;
    }
}
