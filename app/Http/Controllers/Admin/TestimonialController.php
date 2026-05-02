<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $items = Testimonial::orderBy('sort_order')->paginate(config('hopn.pagination.default', 15));
        return view('admin.testimonials.index', compact('items'));
    }

    public function create()
    {
        $item = new Testimonial();
        return view('admin.testimonials.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quote_en'    => ['required', 'string'],
            'quote_de'    => ['nullable', 'string'],
            'author_name' => ['required', 'string', 'max:120'],
            'author_role' => ['nullable', 'string', 'max:120'],
            'company'     => ['nullable', 'string', 'max:120'],
            'sort_order'  => ['nullable', 'integer'],
            'avatar'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['visible'] = $request->boolean('visible', true);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.testimonials.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Testimonial::findOrFail($id);
        return view('admin.testimonials.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $data        = $request->validate([
            'quote_en'    => ['required', 'string'],
            'quote_de'    => ['nullable', 'string'],
            'author_name' => ['required', 'string', 'max:120'],
            'author_role' => ['nullable', 'string', 'max:120'],
            'company'     => ['nullable', 'string', 'max:120'],
            'sort_order'  => ['nullable', 'integer'],
            'avatar'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['visible'] = $request->boolean('visible');

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) Storage::disk('public')->delete($testimonial->avatar);
            $data['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(string $id)
    {
        $t = Testimonial::findOrFail($id);
        if ($t->avatar) Storage::disk('public')->delete($t->avatar);
        $t->delete();
        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }
}
