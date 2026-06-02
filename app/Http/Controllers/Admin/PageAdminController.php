<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageAdminController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(config('hopn.pagination.default', 15));
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug',
            'excerpt'    => 'nullable|string',
            'excerpt_de' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
        ]);

        Page::create([
            'title'        => $request->title,
            'title_de'     => $request->title_de,
            'title_ar'     => $request->title_ar,
            'slug'         => $request->slug,
            'excerpt'      => $request->excerpt,
            'excerpt_de'   => $request->excerpt_de,
            'excerpt_ar'   => $request->excerpt_ar,
            'is_visible'   => $request->boolean('is_visible', true),
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    public function show(Page $page)
    {
        return redirect()->route('admin.pages.edit', $page);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'excerpt'    => 'nullable|string',
            'excerpt_de' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
        ]);

        $page->update([
            'title'        => $request->title,
            'title_de'     => $request->title_de,
            'title_ar'     => $request->title_ar,
            'slug'         => $request->slug,
            'excerpt'      => $request->excerpt,
            'excerpt_de'   => $request->excerpt_de,
            'excerpt_ar'   => $request->excerpt_ar,
            'is_visible'   => $request->boolean('is_visible'),
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }
}
