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
        $lang     = request()->route('lang', 'en');
        $category = $request->get('category', 'all');

        $query = BlogPost::with('category')
                         ->where('is_published', true)
                         ->latest('published_at');

        // Category filter — blog_category slug se match karo
        if ($category && $category !== 'all') {
            $query->whereHas('category', fn($q) => $q->where('slug', $category));
        }

        $posts = $query->paginate(12)->withQueryString();

        return view('public.insights.index', compact('posts', 'lang', 'category'));
    }

    public function show(string $lang, string $slug)
    {
        $post = BlogPost::with('category')
                        ->where('slug', $slug)
                        ->where('is_published', true)
                        ->firstOrFail();

        return view('public.insights.show', compact('post', 'lang'));
    }

    public function category(string $lang, string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts    = BlogPost::where('blog_category_id', $category->id)
                            ->where('is_published', true)
                            ->latest('published_at')
                            ->paginate(12);

        return view('public.insights.category', compact('category', 'posts', 'lang'));
    }
}
