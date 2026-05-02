<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $items = Service::with('category')->latest()->paginate(config('hopn.pagination.default', 15));
        return view('admin.services.index', compact('items'));
    }

    public function create()
    {
        $item = new Service();
        return view('admin.services.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                => ['required', 'string', 'max:255'],
            'name_de'             => ['nullable', 'string', 'max:255'],
            'slug'                => ['nullable', 'string', 'max:255', 'unique:services,slug'],
            'summary'             => ['nullable', 'string'],
            'summary_de'          => ['nullable', 'string'],
            'body'                => ['nullable', 'string'],
            'body_de'             => ['nullable', 'string'],
            'service_category_id' => ['nullable', 'exists:service_categories,id'],
            'meta_title'          => ['nullable', 'string', 'max:255'],
            'meta_description'    => ['nullable', 'string', 'max:500'],
            'hero_image'          => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['name']);
        $data['is_published'] = $request->boolean('is_published');
        $data['is_active']    = $request->boolean('is_active', true);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('status', 'Service created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.services.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Service::findOrFail($id);
        return view('admin.services.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->validate([
            'name'                => ['required', 'string', 'max:255'],
            'name_de'             => ['nullable', 'string', 'max:255'],
            'slug'                => ['nullable', 'string', 'max:255', 'unique:services,slug,' . $service->id],
            'summary'             => ['nullable', 'string'],
            'summary_de'          => ['nullable', 'string'],
            'body'                => ['nullable', 'string'],
            'body_de'             => ['nullable', 'string'],
            'service_category_id' => ['nullable', 'exists:service_categories,id'],
            'meta_title'          => ['nullable', 'string', 'max:255'],
            'meta_description'    => ['nullable', 'string', 'max:500'],
            'hero_image'          => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['name']);
        $data['is_published'] = $request->boolean('is_published');
        $data['is_active']    = $request->boolean('is_active', true);

        if ($request->hasFile('hero_image')) {
            if ($service->hero_image) Storage::disk('public')->delete($service->hero_image);
            $data['hero_image'] = $request->file('hero_image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('status', 'Service updated.');
    }

    public function destroy(string $id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.services.index')->with('status', 'Service deleted.');
    }
}
