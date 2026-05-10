<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $items = Industry::orderBy('sort_order')->paginate(20);
        return view('admin.industries.index', compact('items'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Industry::create([
            'name'           => $request->name,
            'name_de'        => $request->name_de,
            'name_ar'        => $request->name_ar,
            'slug'           => Str::slug($request->name),
            'icon'           => $request->icon,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'challenges'     => $request->challenges,
            'challenges_de'  => $request->challenges_de,
            'challenges_ar'  => $request->challenges_ar,
            'solutions'      => $request->solutions,
            'solutions_de'   => $request->solutions_de,
            'solutions_ar'   => $request->solutions_ar,
            'use_cases'      => $request->use_cases,
            'use_cases_de'   => $request->use_cases_de,
            'use_cases_ar'   => $request->use_cases_ar,
            'is_published'   => $request->has('is_published'),
            'sort_order'     => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.industries.index')->with('status', 'Industry added!');
    }

    public function edit($id)
    {
        $industry = Industry::findOrFail($id);
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, $id)
    {
        $industry = Industry::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $industry->update([
            'name'           => $request->name,
            'name_de'        => $request->name_de,
            'name_ar'        => $request->name_ar,
            'slug'           => Str::slug($request->name),
            'icon'           => $request->icon,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'challenges'     => $request->challenges,
            'challenges_de'  => $request->challenges_de,
            'challenges_ar'  => $request->challenges_ar,
            'solutions'      => $request->solutions,
            'solutions_de'   => $request->solutions_de,
            'solutions_ar'   => $request->solutions_ar,
            'use_cases'      => $request->use_cases,
            'use_cases_de'   => $request->use_cases_de,
            'use_cases_ar'   => $request->use_cases_ar,
            'is_published'   => $request->has('is_published'),
            'sort_order'     => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.industries.index')->with('status', 'Industry updated!');
    }

    public function destroy($id)
    {
        Industry::findOrFail($id)->delete();
        return redirect()->route('admin.industries.index')->with('status', 'Industry deleted.');
    }

    public function show($id)
    {
        return redirect()->route('admin.industries.index');
    }
}
