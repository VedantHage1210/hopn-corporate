<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()->where('is_published', true)->latest()->paginate(15);

        return view('public.insights.index', compact('posts'));
    }

    public function show(string $lang, string $slug)
    {
        $post = BlogPost::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.insights.show', compact('post'));
    }

    public function category(string $lang, string $slug)
    {
        $category = BlogCategory::query()->where('slug', $slug)->firstOrFail();
        $posts = BlogPost::query()
            ->where('blog_category_id', $category->id)
            ->where('is_published', true)
            ->latest()
            ->paginate(15);

        return view('public.insights.category', compact('category', 'posts'));
    }
}
