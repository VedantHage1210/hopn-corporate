<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Roles',
            'items' => Role::query()->latest()->paginate(20),
            'columns' => ['ID' => 'id', 'Name' => 'name', 'Guard' => 'guard_name'],
            'createRoute' => route('admin.roles.create'),
            'editRouteName' => 'admin.roles.edit',
            'destroyRouteName' => 'admin.roles.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Create Role',
            'action' => route('admin.roles.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'name', 'label' => 'Name'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255', 'unique:roles,name']]);
        Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        return redirect()->route('admin.roles.index')->with('status', 'Role created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.roles.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Role',
            'action' => route('admin.roles.update', $role->id),
            'method' => 'PUT',
            'item' => $role,
            'fields' => [
                ['name' => 'name', 'label' => 'Name'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->validate(['name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id]]);
        $role->update(['name' => $data['name']]);
        return redirect()->route('admin.roles.index')->with('status', 'Role updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('admin.roles.index')->with('status', 'Role deleted.');
    }
}
