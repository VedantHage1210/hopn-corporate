<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

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
        return view('admin.partners.create', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'type'           => 'nullable|string|max:50',
            'url'            => 'nullable|string|max:255',
            'logo_url'       => 'nullable|string|max:500',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'sort_order'     => 'nullable|integer',
        ]);

        Partner::create([
            'name'           => $request->name,
            'type'           => $request->type,
            'url'            => $request->url,
            'logo'           => $request->logo_url,
            'description_en' => $request->description_en,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'sort_order'     => $request->sort_order ?? 0,
            'visible'        => $request->boolean('visible', true),
        ]);

        return redirect()->route('admin.partners.index')->with('status', 'Partner created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.partners.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        $request->validate([
            'name'           => 'required|string|max:255',
            'type'           => 'nullable|string|max:50',
            'url'            => 'nullable|string|max:255',
            'logo_url'       => 'nullable|string|max:500',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'sort_order'     => 'nullable|integer',
        ]);

        $partner->update([
            'name'           => $request->name,
            'type'           => $request->type,
            'url'            => $request->url,
            'logo'           => $request->logo_url ?: $partner->logo,
            'description_en' => $request->description_en,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'sort_order'     => $request->sort_order ?? 0,
            'visible'        => $request->boolean('visible'),
        ]);

        return redirect()->route('admin.partners.index')->with('status', 'Partner updated.');
    }

    public function destroy(string $id)
    {
        Partner::findOrFail($id)->delete();
        return redirect()->route('admin.partners.index')->with('status', 'Partner deleted.');
    }
}
