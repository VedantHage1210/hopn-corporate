<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Navigation',
            'items' => NavigationItem::query()->orderBy('menu_location')->orderBy('sort_order')->paginate(30),
            'columns' => ['ID' => 'id', 'Label EN' => 'label_en', 'Location' => 'menu_location', 'URL' => 'url'],
            'createRoute' => route('admin.navigation.create'),
            'editRouteName' => 'admin.navigation.edit',
            'destroyRouteName' => 'admin.navigation.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Navigation Item',
            'action' => route('admin.navigation.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'menu_location', 'label' => 'Menu', 'type' => 'select', 'options' => ['header' => 'Header', 'footer' => 'Footer']],
                ['name' => 'label_en', 'label' => 'Label (EN)'],
                ['name' => 'label_de', 'label' => 'Label (DE)'],
                ['name' => 'url', 'label' => 'URL'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number'],
                ['name' => 'visible_en', 'label' => 'Visible EN', 'type' => 'checkbox'],
                ['name' => 'visible_de', 'label' => 'Visible DE', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_location' => ['required', 'string', 'max:40'],
            'label_en' => ['required', 'string', 'max:255'],
            'label_de' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);
        $data['visible_en'] = $request->boolean('visible_en');
        $data['visible_de'] = $request->boolean('visible_de');
        NavigationItem::create($data);
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.navigation.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = NavigationItem::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Navigation Item',
            'action' => route('admin.navigation.update', $item->id),
            'method' => 'PUT',
            'item' => $item,
            'fields' => [
                ['name' => 'menu_location', 'label' => 'Menu', 'type' => 'select', 'options' => ['header' => 'Header', 'footer' => 'Footer']],
                ['name' => 'label_en', 'label' => 'Label (EN)'],
                ['name' => 'label_de', 'label' => 'Label (DE)'],
                ['name' => 'url', 'label' => 'URL'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number'],
                ['name' => 'visible_en', 'label' => 'Visible EN', 'type' => 'checkbox'],
                ['name' => 'visible_de', 'label' => 'Visible DE', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = NavigationItem::findOrFail($id);
        $data = $request->validate([
            'menu_location' => ['required', 'string', 'max:40'],
            'label_en' => ['required', 'string', 'max:255'],
            'label_de' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);
        $data['visible_en'] = $request->boolean('visible_en');
        $data['visible_de'] = $request->boolean('visible_de');
        $item->update($data);
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        NavigationItem::findOrFail($id)->delete();
        return redirect()->route('admin.navigation.index')->with('status', 'Navigation item deleted.');
    }
}
