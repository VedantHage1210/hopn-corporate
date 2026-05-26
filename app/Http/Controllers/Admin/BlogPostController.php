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
        $post       = new BlogPost();
        $authors    = Author::orderBy('name')->get();
        $categories = BlogCategory::orderBy('name_en')->get();
        return view('admin.blog-posts.create', compact('post', 'authors', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en'         => 'required|string|max:255',
            'title_de'         => 'nullable|string|max:255',
            'title_ar'         => 'nullable|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt_en'       => 'nullable|string',
            'excerpt_de'       => 'nullable|string',
            'excerpt_ar'       => 'nullable|string',
            'body_en'          => 'nullable|string',
            'body_de'          => 'nullable|string',
            'body_ar'          => 'nullable|string',
            'author_id'        => 'nullable|exists:authors,id',
            'category_id'      => 'nullable|exists:blog_categories,id',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'cover_image'      => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['title']        = $request->title_en;
        $data['excerpt']      = $request->excerpt_en;
        $data['body']         = $request->body_en;
        $data['slug']         = $data['slug'] ?: Str::slug($request->title_en);
        $data['is_published'] = $request->boolean('is_published');

       if ($request->filled('cover_image_url')) {
    $data['cover_image'] = $request->cover_image_url;
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
        $post       = BlogPost::findOrFail($id);
        $authors    = Author::orderBy('name')->get();
        $categories = BlogCategory::orderBy('name_en')->get();
        return view('admin.blog-posts.edit', compact('post', 'authors', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $post = BlogPost::findOrFail($id);

        $data = $request->validate([
            'title_en'         => 'required|string|max:255',
            'title_de'         => 'nullable|string|max:255',
            'title_ar'         => 'nullable|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:blog_posts,slug,'.$post->id,
            'excerpt_en'       => 'nullable|string',
            'excerpt_de'       => 'nullable|string',
            'excerpt_ar'       => 'nullable|string',
            'body_en'          => 'nullable|string',
            'body_de'          => 'nullable|string',
            'body_ar'          => 'nullable|string',
            'author_id'        => 'nullable|exists:authors,id',
            'category_id'      => 'nullable|exists:blog_categories,id',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'cover_image'      => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['title']        = $request->title_en;
        $data['excerpt']      = $request->excerpt_en;
        $data['body']         = $request->body_en;
        $data['slug']         = $data['slug'] ?: Str::slug($request->title_en);
        $data['is_published'] = $request->boolean('is_published');

     if ($request->filled('cover_image_url')) {
    $data['cover_image'] = $request->cover_image_url;
} else {
    unset($data['cover_image']);
}

        $post->update($data);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post updated.');
    }

    public function destroy(string $id)
    {
        $post = BlogPost::findOrFail($id);
        if ($post->cover_image) Storage::disk('public')->delete($post->cover_image);
        $post->delete();
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post deleted.');
    }
}
