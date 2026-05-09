<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        $items = Investor::latest()->paginate(20);
        return view('admin.investors.index', compact('items'));
    }

    public function create()
    {
        return view('admin.investors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Investor::create($request->only(['name', 'type', 'region', 'focus', 'website', 'email', 'description']));
        return redirect()->route('admin.investors.index')->with('status', 'Investor added successfully!');
    }

    public function edit($id)
    {
        $investor = Investor::findOrFail($id);
        return view('admin.investors.edit', compact('investor'));
    }

    public function update(Request $request, $id)
    {
        $investor = Investor::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        $investor->update($request->only(['name', 'type', 'region', 'focus', 'website', 'email', 'description']));
        return redirect()->route('admin.investors.index')->with('status', 'Investor updated successfully!');
    }

    public function destroy($id)
    {
        Investor::findOrFail($id)->delete();
        return redirect()->route('admin.investors.index')->with('status', 'Investor deleted.');
    }

    public function show($id)
    {
        $investor = Investor::findOrFail($id);
        return view('admin.investors.show', compact('investor'));
    }
}
