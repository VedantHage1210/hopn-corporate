<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        $items = Page::whereIn('slug', ['impressum', 'privacy-policy', 'cookie-policy'])
                     ->latest()->paginate(20);
        return view('admin.legal.index', compact('items'));
    }

    public function create()
    {
        $item = new Page();
        return view('admin.legal.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug',
            'content_en' => 'nullable|string',
            'content_de' => 'nullable|string',
            'content_ar' => 'nullable|string',
        ]);

        Page::create([
            'title'        => $request->title,
            'title_de'     => $request->title_de,
            'title_ar'     => $request->title_ar,
            'slug'         => $request->slug,
            'excerpt'      => $request->content_en,
            'excerpt_de'   => $request->content_de,
            'excerpt_ar'   => $request->content_ar,
            'is_visible'   => true,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.legal.index')->with('status', 'Legal page created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.legal.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Page::findOrFail($id);
        return view('admin.legal.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content_en' => 'nullable|string',
            'content_de' => 'nullable|string',
            'content_ar' => 'nullable|string',
        ]);

        $page->update([
            'title'        => $request->title,
            'title_de'     => $request->title_de,
            'title_ar'     => $request->title_ar,
            'slug'         => $request->slug,
            'excerpt'      => $request->content_en,
            'excerpt_de'   => $request->content_de,
            'excerpt_ar'   => $request->content_ar,
            'is_visible'   => true,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.legal.index')->with('status', 'Legal page updated.');
    }

    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.legal.index')->with('status', 'Legal page deleted.');
    }
}
