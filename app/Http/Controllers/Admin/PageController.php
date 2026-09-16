<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ContentVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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

    protected function rules(?Page $page = null): array
    {
        $slugUnique = 'unique:pages,slug' . ($page ? ',' . $page->id : '');
        return [
            'title'           => 'required|string|max:255',
            'title_de'        => 'nullable|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'slug'            => 'required|string|max:255|' . $slugUnique,
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
            'status'          => 'required|in:draft,published,scheduled',
            'scheduled_at'    => 'nullable|date',
        ];
    }

    private function payload(Request $request): array
    {
        return [
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
            'is_visible'      => $request->boolean('is_visible', true),
            'is_landing_page' => $request->boolean('is_landing_page'),
            'status'          => $request->input('status', Page::STATUS_DRAFT),
            'scheduled_at'    => $request->input('status') === 'scheduled' ? $request->input('scheduled_at') : null,
            // Kept in sync automatically so any older code reading
            // is_published directly still behaves correctly.
            'is_published'    => $request->input('status') === 'published',
        ];
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $page = Page::create($this->payload($request));
        $page->saveVersion($request->user()->name ?? 'Admin', 'Initial version');

        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Page created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.pages.edit', $id);
    }

    public function edit(string $id)
    {
        $page = Page::with('blocks')->findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);
        $request->validate($this->rules($page));

        $page->update($this->payload($request));
        $page->saveVersion($request->user()->name ?? 'Admin');

        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Page updated.');
    }

    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }

    /**
     * Generates a temporary signed preview link — works even for a page
     * that's still in Draft, without making it publicly visible.
     */
    public function previewLink(string $id)
    {
        $page = Page::findOrFail($id);
        $url = URL::temporarySignedRoute(
            'pages.preview',
            now()->addHours(24),
            ['lang' => app()->getLocale(), 'slug' => $page->slug]
        );
        return redirect($url);
    }

    public function versions(string $id)
    {
        $page = Page::findOrFail($id);
        $versions = $page->versions()->paginate(20);
        return view('admin.pages.versions', compact('page', 'versions'));
    }

    public function restoreVersion(string $id, string $versionId)
    {
        $page = Page::findOrFail($id);
        $version = ContentVersion::where('versionable_type', Page::class)
            ->where('versionable_id', $page->id)
            ->findOrFail($versionId);

        $page->saveVersion(auth()->user()->name ?? 'Admin', 'Snapshot before restore');
        $page->restoreVersion($version);

        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Restored from version #' . $version->id . '.');
    }
}
