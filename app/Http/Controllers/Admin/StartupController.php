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
        ]);
        Startup::create($request->only(['name', 'industry', 'stage', 'website', 'description']));
        return redirect()->route('admin.startups.index')->with('status', 'Startup added successfully!');
    }

    public function edit($id)
    {
        $startup = Startup::findOrFail($id);
        return view('admin.startups.edit', compact('startup'));
    }

    public function update(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $startup->update($request->only(['name', 'industry', 'stage', 'website', 'description']));
        return redirect()->route('admin.startups.index')->with('status', 'Startup updated successfully!');
    }

    public function destroy($id)
    {
        Startup::findOrFail($id)->delete();
        return redirect()->route('admin.startups.index')->with('status', 'Startup deleted.');
    }

    public function show($id)
    {
        $startup = Startup::findOrFail($id);
        return view('admin.startups.show', compact('startup'));
    }
}
