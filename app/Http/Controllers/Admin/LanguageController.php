<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Languages',
            'items' => Language::query()->orderBy('sort_order')->paginate(20),
            'columns' => ['ID' => 'id', 'Name' => 'name', 'Code' => 'code', 'Default' => 'is_default', 'Active' => 'is_active'],
            'createRoute' => route('admin.languages.create'),
            'editRouteName' => 'admin.languages.edit',
            'destroyRouteName' => 'admin.languages.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Language',
            'action' => route('admin.languages.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'name', 'label' => 'Name'],
                ['name' => 'native_name', 'label' => 'Native Name'],
                ['name' => 'code', 'label' => 'Code'],
                ['name' => 'locale', 'label' => 'Locale'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number'],
                ['name' => 'is_default', 'label' => 'Default', 'type' => 'checkbox'],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'native_name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:5', 'unique:languages,code'],
            'locale' => ['required', 'string', 'max:10', 'unique:languages,locale'],
            'sort_order' => ['nullable', 'integer'],
        ]);
        $data['is_default'] = $request->boolean('is_default');
        $data['is_active'] = $request->boolean('is_active');
        Language::create($data);
        return redirect()->route('admin.languages.index')->with('status', 'Language created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.languages.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $language = Language::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Language',
            'action' => route('admin.languages.update', $language->id),
            'method' => 'PUT',
            'item' => $language,
            'fields' => [
                ['name' => 'name', 'label' => 'Name'],
                ['name' => 'native_name', 'label' => 'Native Name'],
                ['name' => 'code', 'label' => 'Code'],
                ['name' => 'locale', 'label' => 'Locale'],
                ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number'],
                ['name' => 'is_default', 'label' => 'Default', 'type' => 'checkbox'],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $language = Language::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'native_name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:5', 'unique:languages,code,' . $language->id],
            'locale' => ['required', 'string', 'max:10', 'unique:languages,locale,' . $language->id],
            'sort_order' => ['nullable', 'integer'],
        ]);
        $data['is_default'] = $request->boolean('is_default');
        $data['is_active'] = $request->boolean('is_active');
        $language->update($data);
        return redirect()->route('admin.languages.index')->with('status', 'Language updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Language::findOrFail($id)->delete();
        return redirect()->route('admin.languages.index')->with('status', 'Language deleted.');
    }
}
