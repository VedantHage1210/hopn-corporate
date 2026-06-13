<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $lang     = $request->route('lang', 'en');
        $category = $request->get('category', 'all');
        $search   = $request->get('search', '');

        $query = BlogPost::with('category')
                         ->where('is_published', true)
                         ->latest('published_at');

        if ($category && $category !== 'all') {
            $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $posts      = $query->paginate(12)->withQueryString();
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->where('is_published', true)])
                                  ->having('posts_count', '>', 0)
                                  ->get();
        $featured   = BlogPost::with('category')
                              ->where('is_published', true)
                              ->latest('published_at')
                              ->first();

        return view('public.insights.index', compact(
            'posts', 'lang', 'category', 'search', 'categories', 'featured'
        ));
    }

    public function show(string $lang, string $slug)
    {
        $post    = BlogPost::with('category')
                           ->where('slug', $slug)
                           ->where('is_published', true)
                           ->firstOrFail();
        $related = BlogPost::with('category')
                           ->where('is_published', true)
                           ->where('id', '!=', $post->id)
                           ->when($post->blog_category_id, fn($q) =>
                               $q->where('blog_category_id', $post->blog_category_id)
                           )
                           ->latest('published_at')
                           ->take(3)
                           ->get();

        return view('public.insights.show', compact('post', 'related', 'lang'));
    }

    public function category(string $lang, string $slug)
    {
        $category   = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts      = BlogPost::with('category')
                              ->where('blog_category_id', $category->id)
                              ->where('is_published', true)
                              ->latest('published_at')
                              ->paginate(12);
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->where('is_published', true)])
                                  ->having('posts_count', '>', 0)
                                  ->get();

        return view('public.insights.category', compact('category', 'posts', 'categories', 'lang'));
    }

    // Newsroom — alag method
    public function newsroom(Request $request)
    {
        $lang     = $request->route('lang', 'en');
        $category = $request->get('category', 'all');
        $search   = $request->get('search', '');

        // Newsroom categories — hardcoded slugs ya "newsroom" type
        $newsroomSlugs = ['ai', 'data', 'products', 'startups', 'funding', 'partnerships', 'events', 'research', 'robotics'];

        $query = BlogPost::with('category')
                         ->where('is_published', true)
                         ->latest('published_at');

        if ($category && $category !== 'all') {
            $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $posts      = $query->paginate(12)->withQueryString();
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->where('is_published', true)])
                                  ->having('posts_count', '>', 0)
                                  ->get();
        $featured   = BlogPost::with('category')
                              ->where('is_published', true)
                              ->latest('published_at')
                              ->first();

        return view('public.newsroom.index', compact(
            'posts', 'lang', 'category', 'search', 'categories', 'featured'
        ));
    }
}
