<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::orderBy('id', 'asc')->paginate(15);
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        $item       = new Product();
        $industries = Industry::where('is_published', true)->orderBy('name')->get();
        $services   = Service::where('is_published', true)->orderBy('name')->get();
        return view('admin.products.form', compact('item', 'industries', 'services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en'      => ['required', 'string', 'max:255'],
            'title_de'      => ['nullable', 'string', 'max:255'],
            'title_ar'      => ['nullable', 'string', 'max:255'],
            'tagline_en'    => ['nullable', 'string', 'max:500'],
            'tagline_de'    => ['nullable', 'string', 'max:500'],
            'tagline_ar'    => ['nullable', 'string', 'max:500'],
            'slug'          => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'summary_en'    => ['nullable', 'string'],
            'summary_de'    => ['nullable', 'string'],
            'summary_ar'    => ['nullable', 'string'],
            'problem_en'    => ['nullable', 'string'],
            'problem_de'    => ['nullable', 'string'],
            'problem_ar'    => ['nullable', 'string'],
            'solution_en'   => ['nullable', 'string'],
            'solution_de'   => ['nullable', 'string'],
            'solution_ar'   => ['nullable', 'string'],
            'features_en'   => ['nullable', 'string'],
            'features_de'   => ['nullable', 'string'],
            'features_ar'   => ['nullable', 'string'],
            'use_cases_en'  => ['nullable', 'string'],
            'use_cases_de'  => ['nullable', 'string'],
            'use_cases_ar'  => ['nullable', 'string'],
            'cta_label_en'  => ['nullable', 'string', 'max:255'],
            'cta_url'       => ['nullable', 'url', 'max:500'],
            'hero_image_url'=> ['nullable', 'url', 'max:500'],
            'target_audience'=> ['nullable', 'string', 'max:500'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');
        $data['industry_ids'] = $request->industry_ids ?? [];
        $data['service_ids']  = $request->service_ids ?? [];

        Product::create($data);
        return redirect()->route('admin.products.index')->with('status', 'Product created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.products.edit', $id);
    }

    public function edit(string $id)
    {
        $item       = Product::findOrFail($id);
        $industries = Industry::where('is_published', true)->orderBy('name')->get();
        $services   = Service::where('is_published', true)->orderBy('name')->get();
        return view('admin.products.form', compact('item', 'industries', 'services'));
    }

    public function update(Request $request, string $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->validate([
            'title_en'      => ['required', 'string', 'max:255'],
            'title_de'      => ['nullable', 'string', 'max:255'],
            'title_ar'      => ['nullable', 'string', 'max:255'],
            'tagline_en'    => ['nullable', 'string', 'max:500'],
            'tagline_de'    => ['nullable', 'string', 'max:500'],
            'tagline_ar'    => ['nullable', 'string', 'max:500'],
            'slug'          => ['nullable', 'string', 'max:255', 'unique:products,slug,'.$item->id],
            'summary_en'    => ['nullable', 'string'],
            'summary_de'    => ['nullable', 'string'],
            'summary_ar'    => ['nullable', 'string'],
            'problem_en'    => ['nullable', 'string'],
            'problem_de'    => ['nullable', 'string'],
            'problem_ar'    => ['nullable', 'string'],
            'solution_en'   => ['nullable', 'string'],
            'solution_de'   => ['nullable', 'string'],
            'solution_ar'   => ['nullable', 'string'],
            'features_en'   => ['nullable', 'string'],
            'features_de'   => ['nullable', 'string'],
            'features_ar'   => ['nullable', 'string'],
            'use_cases_en'  => ['nullable', 'string'],
            'use_cases_de'  => ['nullable', 'string'],
            'use_cases_ar'  => ['nullable', 'string'],
            'cta_label_en'  => ['nullable', 'string', 'max:255'],
            'cta_url'       => ['nullable', 'url', 'max:500'],
            'hero_image_url'=> ['nullable', 'url', 'max:500'],
            'target_audience'=> ['nullable', 'string', 'max:500'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');
        $data['industry_ids'] = $request->industry_ids ?? [];
        $data['service_ids']  = $request->service_ids ?? [];

        $item->update($data);
        return redirect()->route('admin.products.index')->with('status', 'Product updated.');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('status', 'Product deleted.');
    }
}
