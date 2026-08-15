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
        $request->validate([
            'title'           => 'required|string|max:255',
            'title_de'        => 'nullable|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'slug'            => 'required|string|max:255|unique:pages,slug',
            'featured_image'  => 'nullable|string|max:500',
            'excerpt'         => 'nullable|string',
            'excerpt_de'      => 'nullable|string',
            'excerpt_ar'      => 'nullable|string',
            'content_en'      => 'nullable|string',
            'content_de'      => 'nullable|string',
            'content_ar'      => 'nullable|string',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'is_landing_page' => 'nullable|boolean',
        ]);

        Page::create([
            'title'          => $request->title,
            'title_de'       => $request->title_de,
            'title_ar'       => $request->title_ar,
            'slug'           => $request->slug,
            'featured_image' => $request->featured_image,
            'excerpt'        => $request->excerpt,
            'excerpt_de'     => $request->excerpt_de,
            'excerpt_ar'     => $request->excerpt_ar,
            'content_en'     => $request->content_en,
            'content_de'     => $request->content_de,
            'content_ar'     => $request->content_ar,
            'seo_meta'       => array_filter([
                'title'       => $request->seo_title,
                'description' => $request->seo_description,
            ]),
            'is_visible'     => $request->boolean('is_visible', true),
            'is_landing_page' => $request->boolean('is_landing_page'),
            'is_published'   => $request->boolean('is_published'),
        ]);

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

        $request->validate([
            'title'           => 'required|string|max:255',
            'title_de'        => 'nullable|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'slug'            => 'required|string|max:255|unique:pages,slug,'.$page->id,
            'featured_image'  => 'nullable|string|max:500',
            'excerpt'         => 'nullable|string',
            'excerpt_de'      => 'nullable|string',
            'excerpt_ar'      => 'nullable|string',
            'content_en'      => 'nullable|string',
            'content_de'      => 'nullable|string',
            'content_ar'      => 'nullable|string',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'is_landing_page' => 'nullable|boolean',
        ]);

        $page->update([
            'title'          => $request->title,
            'title_de'       => $request->title_de,
            'title_ar'       => $request->title_ar,
            'slug'           => $request->slug,
            'featured_image' => $request->featured_image,
            'excerpt'        => $request->excerpt,
            'excerpt_de'     => $request->excerpt_de,
            'excerpt_ar'     => $request->excerpt_ar,
            'content_en'     => $request->content_en,
            'content_de'     => $request->content_de,
            'content_ar'     => $request->content_ar,
            'seo_meta'       => array_filter([
                'title'       => $request->seo_title,
                'description' => $request->seo_description,
            ]),
            'is_visible'     => $request->boolean('is_visible'),
            'is_landing_page' => $request->boolean('is_landing_page'),
            'is_published'   => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }
}
