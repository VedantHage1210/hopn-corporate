<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Startup;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function index()
    {
        $items = Startup::latest()->paginate(20);
        return view('admin.startups.index', compact('items'));
    }

    public function create()
    {
        return view('admin.startups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
        ]);

        Startup::create([
            'name'           => $request->name,
            'name_de'        => $request->name_de,
            'name_ar'        => $request->name_ar,
            'logo'           => $request->logo,
            'industry'       => $request->industry,
            'industry_de'    => $request->industry_de,
            'industry_ar'    => $request->industry_ar,
            'stage'          => $request->stage,
            'website'        => $request->website,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'is_visible'     => $request->boolean('is_visible', true),
        ]);

        return redirect()->route('admin.startups.index')->with('status', 'Startup created.');
    }

    public function show($id)
    {
        return redirect()->route('admin.startups.edit', $id);
    }

    public function edit($id)
    {
        $startup = Startup::findOrFail($id);
        return view('admin.startups.edit', compact('startup'));
    }

    public function update(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'logo'    => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
        ]);

        $startup->update([
            'name'           => $request->name,
            'name_de'        => $request->name_de,
            'name_ar'        => $request->name_ar,
            'logo'           => $request->logo ?: $startup->logo,
            'industry'       => $request->industry,
            'industry_de'    => $request->industry_de,
            'industry_ar'    => $request->industry_ar,
            'stage'          => $request->stage,
            'website'        => $request->website,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'is_visible'     => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.startups.index')->with('status', 'Startup updated.');
    }

    public function destroy($id)
    {
        Startup::findOrFail($id)->delete();
        return redirect()->route('admin.startups.index')->with('status', 'Startup deleted.');
    }
}
