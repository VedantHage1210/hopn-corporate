<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $items = Language::orderBy('sort_order')->paginate(20);
        return view('admin.languages.index', compact('items'));
    }

    public function create()
    {
        $item = new Language();
        return view('admin.languages.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'native_name' => 'required|string|max:255',
            'code'        => 'required|string|max:5|unique:languages,code',
            'locale'      => 'required|string|max:10|unique:languages,locale',
            'sort_order'  => 'nullable|integer',
        ]);

        // Agar is_default true hai to baaki sab false karo
        if ($request->boolean('is_default')) {
            Language::where('is_default', true)->update(['is_default' => false]);
        }

        Language::create([
            'name'        => $request->name,
            'native_name' => $request->native_name,
            'code'        => strtolower($request->code),
            'locale'      => $request->locale,
            'sort_order'  => $request->sort_order ?? 0,
            'is_active'   => $request->boolean('is_active', true),
            'is_default'  => $request->boolean('is_default'),
        ]);

        return redirect()->route('admin.languages.index')->with('status', 'Language created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.languages.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Language::findOrFail($id);
        return view('admin.languages.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $language = Language::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'native_name' => 'required|string|max:255',
            'code'        => 'required|string|max:5|unique:languages,code,' . $language->id,
            'locale'      => 'required|string|max:10|unique:languages,locale,' . $language->id,
            'sort_order'  => 'nullable|integer',
        ]);

        // Agar is_default true hai to baaki sab false karo
        if ($request->boolean('is_default')) {
            Language::where('id', '!=', $language->id)
                    ->where('is_default', true)
                    ->update(['is_default' => false]);
        }

        $language->update([
            'name'        => $request->name,
            'native_name' => $request->native_name,
            'code'        => strtolower($request->code),
            'locale'      => $request->locale,
            'sort_order'  => $request->sort_order ?? 0,
            'is_active'   => $request->boolean('is_active'),
            'is_default'  => $request->boolean('is_default'),
        ]);

        return redirect()->route('admin.languages.index')->with('status', 'Language updated.');
    }

    public function destroy(string $id)
    {
        $language = Language::findOrFail($id);

        if ($language->is_default) {
            return back()->with('error', 'Default language cannot be deleted.');
        }

        $language->delete();
        return redirect()->route('admin.languages.index')->with('status', 'Language deleted.');
    }
}
