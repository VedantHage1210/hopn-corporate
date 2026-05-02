<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Redirects',
            'items' => Redirect::query()->latest()->paginate(20),
            'columns' => ['ID' => 'id', 'From' => 'from_url', 'To' => 'to_url', 'Code' => 'http_status'],
            'createRoute' => route('admin.redirects.create'),
            'editRouteName' => 'admin.redirects.edit',
            'destroyRouteName' => 'admin.redirects.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Redirect',
            'action' => route('admin.redirects.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'from_url', 'label' => 'From URL'],
                ['name' => 'to_url', 'label' => 'To URL'],
                ['name' => 'http_status', 'label' => 'HTTP Status', 'type' => 'select', 'options' => [301 => '301', 302 => '302']],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'from_url' => ['required', 'string', 'max:255'],
            'to_url' => ['required', 'string', 'max:255'],
            'http_status' => ['required', 'integer'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        Redirect::create($data);
        return redirect()->route('admin.redirects.index')->with('status', 'Redirect created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.redirects.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $redirect = Redirect::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Redirect',
            'action' => route('admin.redirects.update', $redirect->id),
            'method' => 'PUT',
            'item' => $redirect,
            'fields' => [
                ['name' => 'from_url', 'label' => 'From URL'],
                ['name' => 'to_url', 'label' => 'To URL'],
                ['name' => 'http_status', 'label' => 'HTTP Status', 'type' => 'select', 'options' => [301 => '301', 302 => '302']],
                ['name' => 'is_active', 'label' => 'Active', 'type' => 'checkbox'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $redirect = Redirect::findOrFail($id);
        $data = $request->validate([
            'from_url' => ['required', 'string', 'max:255'],
            'to_url' => ['required', 'string', 'max:255'],
            'http_status' => ['required', 'integer'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $redirect->update($data);
        return redirect()->route('admin.redirects.index')->with('status', 'Redirect updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Redirect::findOrFail($id)->delete();
        return redirect()->route('admin.redirects.index')->with('status', 'Redirect deleted.');
    }
}
