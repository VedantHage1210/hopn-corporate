<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $items = Investor::orderBy('sort_order')->paginate(20);
        return view('admin.investors.index', compact('items'));
    }

    public function create()
    {
        return view('admin.investors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'logo'    => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
            'email'   => 'nullable|email|max:255',
        ]);

        Investor::create([
            'name'           => $request->name,
            'logo'           => $request->logo,
            'type'           => $request->type,
            'region'         => $request->region,
            'focus'          => $request->focus,
            'focus_de'       => $request->focus_de,
            'focus_ar'       => $request->focus_ar,
            'website'        => $request->website,
            'email'          => $request->email,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'sort_order'     => $request->sort_order ?? 0,
            'is_visible'     => $request->boolean('is_visible', true),
        ]);

        return redirect()->route('admin.investors.index')->with('status', 'Investor created.');
    }

    public function show($id)
    {
        return redirect()->route('admin.investors.edit', $id);
    }

    public function edit($id)
    {
        $investor = Investor::findOrFail($id);
        return view('admin.investors.edit', compact('investor'));
    }

    public function update(Request $request, $id)
    {
        $investor = Investor::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'logo'    => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
            'email'   => 'nullable|email|max:255',
        ]);

        $investor->update([
            'name'           => $request->name,
            'logo'           => $request->logo ?: $investor->logo,
            'type'           => $request->type,
            'region'         => $request->region,
            'focus'          => $request->focus,
            'focus_de'       => $request->focus_de,
            'focus_ar'       => $request->focus_ar,
            'website'        => $request->website,
            'email'          => $request->email,
            'description'    => $request->description,
            'description_de' => $request->description_de,
            'description_ar' => $request->description_ar,
            'sort_order'     => $request->sort_order ?? 0,
            'is_visible'     => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.investors.index')->with('status', 'Investor updated.');
    }

    public function destroy($id)
    {
        Investor::findOrFail($id)->delete();
        return redirect()->route('admin.investors.index')->with('status', 'Investor deleted.');
    }
}
