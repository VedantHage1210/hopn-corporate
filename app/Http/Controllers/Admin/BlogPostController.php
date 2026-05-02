<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Author;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $items = BlogPost::with('author', 'category')->latest()->paginate(config('hopn.pagination.default', 15));
        return view('admin.blog-posts.index', compact('items'));
    }

    public function create()
    {
        $item = new BlogPost();
        return view('admin.blog-posts.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'title_de'         => ['nullable', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug'],
            'excerpt'          => ['nullable', 'string'],
            'excerpt_de'       => ['nullable', 'string'],
            'body'             => ['nullable', 'string'],
            'body_de'          => ['nullable', 'string'],
            'author_id'        => ['nullable', 'exists:authors,id'],
            'blog_category_id' => ['nullable', 'exists:blog_categories,id'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'cover_image'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }

        BlogPost::create($data);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.blog-posts.edit', $id);
    }

    public function edit(string $id)
    {
        $item = BlogPost::findOrFail($id);
        return view('admin.blog-posts.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $post = BlogPost::findOrFail($id);
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'title_de'         => ['nullable', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug,' . $post->id],
            'excerpt'          => ['nullable', 'string'],
            'excerpt_de'       => ['nullable', 'string'],
            'body'             => ['nullable', 'string'],
            'body_de'          => ['nullable', 'string'],
            'author_id'        => ['nullable', 'exists:authors,id'],
            'blog_category_id' => ['nullable', 'exists:blog_categories,id'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'cover_image'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) Storage::disk('public')->delete($post->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }

        $post->update($data);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post updated.');
    }

    public function destroy(string $id)
    {
        BlogPost::findOrFail($id)->delete();
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post deleted.');
    }
}
