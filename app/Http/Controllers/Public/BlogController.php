<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $lang       = request()->route('lang', 'en');
        $category   = request()->get('category');
        $search     = request()->get('search');

        $query = BlogPost::with('category')->where('is_published', true);

        if ($category) {
            $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $posts      = $query->latest('published_at')->paginate(12);
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->where('is_published', true)])->get();
        $featured   = BlogPost::where('is_published', true)->latest('published_at')->first();

        return view('public.insights.index', compact('posts', 'categories', 'featured', 'lang', 'category', 'search'));
    }

    public function show(string $lang, string $slug)
    {
        $post    = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $related = BlogPost::where('is_published', true)
                           ->where('id', '!=', $post->id)
                           ->where('blog_category_id', $post->blog_category_id)
                           ->latest('published_at')
                           ->take(3)
                           ->get();
        return view('public.insights.show', compact('post', 'related', 'lang'));
    }

    public function category(string $lang, string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts    = BlogPost::with('category')
                            ->where('blog_category_id', $category->id)
                            ->where('is_published', true)
                            ->latest('published_at')
                            ->paginate(12);
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->where('is_published', true)])->get();
        return view('public.insights.category', compact('category', 'posts', 'categories', 'lang'));
    }
}
