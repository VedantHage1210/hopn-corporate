<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $items = Expert::orderBy('sort_order')->paginate(20);
        return view('admin.experts.index', compact('items'));
    }

    public function create()
    {
        $item = new Expert();
        return view('admin.experts.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|max:120',
            'specialization_en'  => 'nullable|string|max:255',
            'specialization_de'  => 'nullable|string|max:255',
            'specialization_ar'  => 'nullable|string|max:255',
            'hourly_rate'        => 'nullable|string|max:50',
            'accent_color'       => 'nullable|string|max:20',
            'sort_order'         => 'nullable|integer',
        ]);

        $tags = array_filter(array_map('trim', explode(',', $request->tags_raw ?? '')));
 
        $photoUrl = $request->photo_url;
if ($photoUrl && str_starts_with($photoUrl, 'data:')) {
    $photoUrl = null;
}
        Expert::create([
            'name'              => $request->name,
            'initials'          => $request->initials,
            'specialization_en' => $request->specialization_en,
            'specialization_de' => $request->specialization_de,
            'specialization_ar' => $request->specialization_ar,
            'hourly_rate'       => $request->hourly_rate,
            'tags'              => $tags ?: null,
            'bio_en'            => $request->bio_en,
            'bio_de'            => $request->bio_de,
            'bio_ar'            => $request->bio_ar,
           'photo_url' => $photoUrl,
            'linkedin_url'      => $request->linkedin_url,
            'accent_color'      => $request->accent_color ?? '#4F6EF7',
            'sort_order'        => $request->sort_order ?? 0,
            'is_visible'        => $request->boolean('is_visible', true),
        ]);

        return redirect()->route('admin.experts.index')->with('status', 'Expert created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.experts.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Expert::findOrFail($id);
        return view('admin.experts.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $expert = Expert::findOrFail($id);

        $request->validate([
            'name'               => 'required|string|max:120',
            'specialization_en'  => 'nullable|string|max:255',
            'specialization_de'  => 'nullable|string|max:255',
            'specialization_ar'  => 'nullable|string|max:255',
            'hourly_rate'        => 'nullable|string|max:50',
            'accent_color'       => 'nullable|string|max:20',
            'sort_order'         => 'nullable|integer',
        ]);

        $tags = array_filter(array_map('trim', explode(',', $request->tags_raw ?? '')));

$photoUrl = $request->photo_url;
if ($photoUrl && str_starts_with($photoUrl, 'data:')) {
    $photoUrl = null;
}
        
        $expert->update([
            'name'              => $request->name,
            'initials'          => $request->initials,
            'specialization_en' => $request->specialization_en,
            'specialization_de' => $request->specialization_de,
            'specialization_ar' => $request->specialization_ar,
            'hourly_rate'       => $request->hourly_rate,
            'tags'              => $tags ?: null,
            'bio_en'            => $request->bio_en,
            'bio_de'            => $request->bio_de,
            'bio_ar'            => $request->bio_ar,
           'photo_url' => $photoUrl, 
            'linkedin_url'      => $request->linkedin_url,
            'accent_color'      => $request->accent_color ?? '#4F6EF7',
            'sort_order'        => $request->sort_order ?? 0,
            'is_visible'        => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.experts.index')->with('status', 'Expert updated.');
    }

    public function destroy(string $id)
    {
        Expert::findOrFail($id)->delete();
        return redirect()->route('admin.experts.index')->with('status', 'Expert deleted.');
    }
}
