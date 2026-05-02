<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Products',
            'items' => Product::query()->latest()->paginate(15),
            'columns' => ['ID' => 'id', 'Title' => 'title_en', 'Slug' => 'slug', 'Published' => 'is_published'],
            'createRoute' => route('admin.products.create'),
            'editRouteName' => 'admin.products.edit',
            'destroyRouteName' => 'admin.products.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Product',
            'action' => route('admin.products.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'summary_en', 'label' => 'Summary (EN)', 'type' => 'textarea'],
                ['name' => 'problem_en', 'label' => 'Problem (EN)', 'type' => 'textarea'],
                ['name' => 'solution_en', 'label' => 'Solution (EN)', 'type' => 'textarea'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'summary_en' => ['nullable', 'string'],
            'problem_en' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        Product::create($data);
        return redirect()->route('admin.products.index')->with('status', 'Product created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.products.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Product',
            'action' => route('admin.products.update', $product->id),
            'method' => 'PUT',
            'item' => $product,
            'fields' => [
                ['name' => 'title_en', 'label' => 'Title (EN)'],
                ['name' => 'title_de', 'label' => 'Title (DE)'],
                ['name' => 'slug', 'label' => 'Slug'],
                ['name' => 'summary_en', 'label' => 'Summary (EN)', 'type' => 'textarea'],
                ['name' => 'problem_en', 'label' => 'Problem (EN)', 'type' => 'textarea'],
                ['name' => 'solution_en', 'label' => 'Solution (EN)', 'type' => 'textarea'],
                ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_de' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'summary_en' => ['nullable', 'string'],
            'problem_en' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
        ]);
        $data['is_published'] = $request->boolean('is_published');
        $product->update($data);
        return redirect()->route('admin.products.index')->with('status', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('status', 'Product deleted.');
    }
}
