<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug',
            'excerpt'    => 'nullable|string',
            'excerpt_de' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
        ]);
        $data['is_visible']   = $request->boolean('is_visible');
        $data['is_published'] = $request->boolean('is_published');
        Page::create($data);
        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        return redirect()->route('admin.pages.edit', $page->id);
    }

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'slug'       => 'required|string|max:255|unique:pages,slug,'.$page->id,
            'excerpt'    => 'nullable|string',
            'excerpt_de' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
        ]);
        $data['is_visible']   = $request->boolean('is_visible');
        $data['is_published'] = $request->boolean('is_published');
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }
}
