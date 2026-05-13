<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\InnovationDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InnovationDomainController extends Controller
{
    public function index()
    {
        $items = InnovationDomain::orderBy('sort_order')->paginate(20);
        return view('admin.innovation-domains.index', compact('items'));
    }

    public function create()
    {
        return view('admin.innovation-domains.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        InnovationDomain::create([
            'name'             => $request->name,
            'name_de'          => $request->name_de,
            'name_ar'          => $request->name_ar,
            'slug'             => Str::slug($request->name),
            'icon'             => $request->icon,
            'description'      => $request->description,
            'description_de'   => $request->description_de,
            'description_ar'   => $request->description_ar,
            'use_cases'        => $request->use_cases,
            'use_cases_de'     => $request->use_cases_de,
            'use_cases_ar'     => $request->use_cases_ar,
            'related_services' => $request->related_services,
            'is_published'     => $request->has('is_published'),
            'sort_order'       => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.innovation-domains.index')->with('status', 'Domain added!');
    }

    public function edit($id)
    {
        $domain = InnovationDomain::findOrFail($id);
        return view('admin.innovation-domains.edit', compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $domain = InnovationDomain::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $domain->update([
            'name'             => $request->name,
            'name_de'          => $request->name_de,
            'name_ar'          => $request->name_ar,
            'slug'             => Str::slug($request->name),
            'icon'             => $request->icon,
            'description'      => $request->description,
            'description_de'   => $request->description_de,
            'description_ar'   => $request->description_ar,
            'use_cases'        => $request->use_cases,
            'use_cases_de'     => $request->use_cases_de,
            'use_cases_ar'     => $request->use_cases_ar,
            'related_services' => $request->related_services,
            'is_published'     => $request->has('is_published'),
            'sort_order'       => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.innovation-domains.index')->with('status', 'Domain updated!');
    }

    public function destroy($id)
    {
        InnovationDomain::findOrFail($id)->delete();
        return redirect()->route('admin.innovation-domains.index')->with('status', 'Domain deleted.');
    }

    public function show($id)
    {
        return redirect()->route('admin.innovation-domains.index');
    }
}
