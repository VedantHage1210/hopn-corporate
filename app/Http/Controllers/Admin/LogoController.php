<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $items = Logo::orderBy('sort_order')->paginate(30);
        return view('admin.logos.index', compact('items'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Logo::create([
            'name'        => $request->name,
            'logo_url'    => $request->logo_url,
            'website'     => $request->website,
            'category'    => $request->category ?? 'partner',
            'description' => $request->description,
            'visible'     => $request->has('visible'),
            'sort_order'  => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.logos.index')->with('status', 'Logo added!');
    }

    public function edit($id)
    {
        $logo = Logo::findOrFail($id);
        return view('admin.logos.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $logo = Logo::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $logo->update([
            'name'        => $request->name,
            'logo_url'    => $request->logo_url,
            'website'     => $request->website,
            'category'    => $request->category ?? 'partner',
            'description' => $request->description,
            'visible'     => $request->has('visible'),
            'sort_order'  => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.logos.index')->with('status', 'Logo updated!');
    }

    public function destroy($id)
    {
        Logo::findOrFail($id)->delete();
        return redirect()->route('admin.logos.index')->with('status', 'Logo deleted.');
    }

    public function show($id)
    {
        return redirect()->route('admin.logos.index');
    }
}
