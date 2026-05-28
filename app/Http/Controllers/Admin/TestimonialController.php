<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
        return view('admin.testimonials.create', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote_en'    => 'required|string',
            'quote_de'    => 'nullable|string',
            'quote_ar'    => 'nullable|string',
            'author_name' => 'required|string|max:120',
            'author_role' => 'nullable|string|max:120',
            'company'     => 'nullable|string|max:120',
            'avatar_url'  => 'nullable|string|max:500',
            'sort_order'  => 'nullable|integer',
        ]);

        Testimonial::create([
            'quote_en'    => $request->quote_en,
            'quote_de'    => $request->quote_de,
            'quote_ar'    => $request->quote_ar,
            'author_name' => $request->author_name,
            'author_role' => $request->author_role,
            'company'     => $request->company,
            'avatar'      => $request->avatar_url,
            'sort_order'  => $request->sort_order ?? 0,
            'visible'     => $request->boolean('visible', true),
        ]);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.testimonials.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'quote_en'    => 'required|string',
            'quote_de'    => 'nullable|string',
            'quote_ar'    => 'nullable|string',
            'author_name' => 'required|string|max:120',
            'author_role' => 'nullable|string|max:120',
            'company'     => 'nullable|string|max:120',
            'avatar_url'  => 'nullable|string|max:500',
            'sort_order'  => 'nullable|integer',
        ]);

        $testimonial->update([
            'quote_en'    => $request->quote_en,
            'quote_de'    => $request->quote_de,
            'quote_ar'    => $request->quote_ar,
            'author_name' => $request->author_name,
            'author_role' => $request->author_role,
            'company'     => $request->company,
            'avatar'      => $request->avatar_url ?: $testimonial->avatar,
            'sort_order'  => $request->sort_order ?? 0,
            'visible'     => $request->boolean('visible'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(string $id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }
}
