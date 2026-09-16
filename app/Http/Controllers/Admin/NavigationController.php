<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use App\Models\Page;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    const HEADER_DROPDOWNS = ['solutions', 'products', 'apps', 'ecosystem', 'company'];

    public function index()
    {
        $items = NavigationItem::with('page')->orderBy('menu_location')->orderBy('sort_order')->paginate(30);
        return view('admin.navigation.index', compact('items'));
    }

    public function create()
    {
        $item = new NavigationItem();
        $pages = Page::orderBy('title')->get();
        return view('admin.navigation.form', compact('item', 'pages'));
    }

    protected function rules(): array
    {
        return [
            'menu_location'  => 'required|string|max:40',
            'dropdown_group' => 'nullable|string|in:' . implode(',', self::HEADER_DROPDOWNS),
            'label_en'       => 'required|string|max:255',
            'label_de'       => 'nullable|string|max:255',
            'label_ar'       => 'nullable|string|max:255',
            'link_type'      => 'required|in:page,url',
            'page_id'        => 'nullable|exists:pages,id',
            'url'            => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer',
        ];
    }

    private function payload(Request $request): array
    {
        $isPage = $request->input('link_type') === 'page' && $request->filled('page_id');

        return [
            'menu_location'  => $request->menu_location,
            // dropdown_group only makes sense for header items — clear it
            // otherwise so a stale value can't silently leak an item into a
            // dropdown it was never meant for.
            'dropdown_group' => $request->menu_location === 'header' ? $request->dropdown_group : null,
            'label_en'       => $request->label_en,
            'label_de'       => $request->label_de,
            'label_ar'       => $request->label_ar,
            'page_id'        => $isPage ? $request->page_id : null,
            // Page-linked items don't store a fixed URL — locale-correct
            // hrefs are computed at render time from page_id + current
            // language (see nav.blade.php / footer.blade.php), so the same
            // item works correctly across EN/DE/AR instead of baking one
            // locale's path in permanently.
            'url'            => $isPage ? null : $request->url,
            'sort_order'     => $request->sort_order ?? 0,
            'visible_en'     => $request->boolean('visible_en', true),
            'visible_de'     => $request->boolean('visible_de', true),
            'visible_ar'     => $request->boolean('visible_ar', true),
        ];
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        NavigationItem::create($this->payload($request));
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.navigation.edit', $id);
    }

    public function edit(string $id)
    {
        $item = NavigationItem::findOrFail($id);
        $pages = Page::orderBy('title')->get();
        return view('admin.navigation.form', compact('item', 'pages'));
    }

    public function update(Request $request, string $id)
    {
        $item = NavigationItem::findOrFail($id);
        $request->validate($this->rules());
        $item->update($this->payload($request));
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item updated.');
    }

    public function destroy(string $id)
    {
        NavigationItem::findOrFail($id)->delete();
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item deleted.');
    }
}
