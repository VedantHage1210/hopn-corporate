<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    public function index()
    {
        $tags = BlogTag::withCount('posts')->latest()->paginate(config('hopn.pagination.default', 15));

        return view('admin.blog-tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog-tags.form', ['tag' => new BlogTag()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateTag($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        BlogTag::create($data);

        return redirect()->route('admin.blog-tags.index')->with('status', 'Tag created.');
    }

    public function edit(BlogTag $blogTag)
    {
        return view('admin.blog-tags.form', ['tag' => $blogTag]);
    }

    public function update(Request $request, BlogTag $blogTag)
    {
        $data = $this->validateTag($request, $blogTag->id);

        $blogTag->update($data);

        return redirect()->route('admin.blog-tags.index')->with('status', 'Tag updated.');
    }

    public function destroy(BlogTag $blogTag)
    {
        $blogTag->delete();

        return redirect()->route('admin.blog-tags.index')->with('status', 'Tag deleted.');
    }

    private function validateTag(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'slug' => ['nullable', 'string', 'max:100', 'unique:blog_tags,slug' . ($ignoreId ? ",{$ignoreId}" : '')],
        ]);
    }
}
