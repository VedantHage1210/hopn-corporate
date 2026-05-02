<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $items = Partner::orderBy('sort_order')->paginate(config('hopn.pagination.default', 20));
        return view('admin.partners.index', compact('items'));
    }

    public function create()
    {
        $item = new Partner();
        return view('admin.partners.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'type'       => ['nullable', 'string', 'max:50'],
            'url'        => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'logo'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        $data['visible'] = $request->boolean('visible', true);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('status', 'Partner created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.partners.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Partner::findOrFail($id);
        return view('admin.partners.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        $data    = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'type'       => ['nullable', 'string', 'max:50'],
            'url'        => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'logo'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        $data['visible'] = $request->boolean('visible');

        if ($request->hasFile('logo')) {
            if ($partner->logo) Storage::disk('public')->delete($partner->logo);
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('status', 'Partner updated.');
    }

    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        if ($partner->logo) Storage::disk('public')->delete($partner->logo);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('status', 'Partner deleted.');
    }
}
