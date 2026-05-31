<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $items = NavigationItem::orderBy('menu_location')->orderBy('sort_order')->paginate(30);
        return view('admin.navigation.index', compact('items'));
    }

    public function create()
    {
        $item = new NavigationItem();
        return view('admin.navigation.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_location' => 'required|string|max:40',
            'label_en'      => 'required|string|max:255',
            'label_de'      => 'nullable|string|max:255',
            'label_ar'      => 'nullable|string|max:255',
            'url'           => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
        ]);

        NavigationItem::create([
            'menu_location' => $request->menu_location,
            'label_en'      => $request->label_en,
            'label_de'      => $request->label_de,
            'label_ar'      => $request->label_ar,
            'url'           => $request->url,
            'sort_order'    => $request->sort_order ?? 0,
            'visible_en'    => $request->boolean('visible_en', true),
            'visible_de'    => $request->boolean('visible_de', true),
            'visible_ar'    => $request->boolean('visible_ar', true),
        ]);

        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.navigation.edit', $id);
    }

    public function edit(string $id)
    {
        $item = NavigationItem::findOrFail($id);
        return view('admin.navigation.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = NavigationItem::findOrFail($id);

        $request->validate([
            'menu_location' => 'required|string|max:40',
            'label_en'      => 'required|string|max:255',
            'label_de'      => 'nullable|string|max:255',
            'label_ar'      => 'nullable|string|max:255',
            'url'           => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
        ]);

        $item->update([
            'menu_location' => $request->menu_location,
            'label_en'      => $request->label_en,
            'label_de'      => $request->label_de,
            'label_ar'      => $request->label_ar,
            'url'           => $request->url,
            'sort_order'    => $request->sort_order ?? 0,
            'visible_en'    => $request->boolean('visible_en'),
            'visible_de'    => $request->boolean('visible_de'),
            'visible_ar'    => $request->boolean('visible_ar'),
        ]);

        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item updated.');
    }

    public function destroy(string $id)
    {
        NavigationItem::findOrFail($id)->delete();
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item deleted.');
    }
}
