<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Author;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $request->validate([
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
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'cover_image_url'  => 'nullable|string|max:500',
        ]);

        BlogPost::create([
            'title'               => $request->title_en,
            'title_de'            => $request->title_de,
            'slug'                => $request->slug ?: Str::slug($request->title_en),
            'excerpt'             => $request->excerpt_en,
            'excerpt_de'          => $request->excerpt_de,
            'content'             => $request->body_en,
            'content_de'          => $request->body_de,
            'author_id'           => $request->author_id,
            'blog_category_id'    => $request->blog_category_id,
            'published_at'        => $request->published_at,
            'is_published'        => $request->boolean('is_published'),
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'featured_image_path' => $request->cover_image_url,
        ]);

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

        $request->validate([
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
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'cover_image_url'  => 'nullable|string|max:500',
        ]);

        $post->update([
            'title'               => $request->title_en,
            'title_de'            => $request->title_de,
            'slug'                => $request->slug ?: Str::slug($request->title_en),
            'excerpt'             => $request->excerpt_en,
            'excerpt_de'          => $request->excerpt_de,
            'content'             => $request->body_en,
            'content_de'          => $request->body_de,
            'author_id'           => $request->author_id,
            'blog_category_id'    => $request->blog_category_id,
            'published_at'        => $request->published_at,
            'is_published'        => $request->boolean('is_published'),
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'featured_image_path' => $request->cover_image_url ?: $post->featured_image_path,
        ]);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Post updated.');
    }

    public function destroy(string $id)
    {
        BlogPost::findOrFail($id)->delete();
        return redirect()->route('admin.blog-posts.index')->with('status', 'Post deleted.');
    }
}
