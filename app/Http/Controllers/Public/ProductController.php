<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('is_published', true)->latest()->paginate(15);

        return view('public.products.index', compact('products'));
    }

    public function show(string $lang, string $slug)
    {
        $product = Product::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.products.show', compact('product'));
    }
}
