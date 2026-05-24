<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $items = ServiceCategory::latest()->paginate(20);
        return view('admin.service-categories.index', compact('items'));
    }

    public function create()
    {
        $item = new ServiceCategory();
        return view('admin.service-categories.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        ServiceCategory::create([
            'name'        => $request->name,
            'name_de'     => $request->name_de,
            'slug'        => $request->slug ?: Str::slug($request->name),
            'description' => $request->description,
            'is_active'   => $request->boolean('is_active', true),
        ]);
        return redirect()->route('admin.service-categories.index')->with('status', 'Category created!');
    }

    public function show($id)
    {
        return redirect()->route('admin.service-categories.index');
    }

    public function edit($id)
    {
        $item = ServiceCategory::findOrFail($id);
        return view('admin.service-categories.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceCategory::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $item->update([
            'name'        => $request->name,
            'name_de'     => $request->name_de,
            'slug'        => $request->slug ?: Str::slug($request->name),
            'description' => $request->description,
            'is_active'   => $request->boolean('is_active', true),
        ]);
        return redirect()->route('admin.service-categories.index')->with('status', 'Category updated!');
    }

    public function destroy($id)
    {
        ServiceCategory::findOrFail($id)->delete();
        return redirect()->route('admin.service-categories.index')->with('status', 'Category deleted.');
    }
}
