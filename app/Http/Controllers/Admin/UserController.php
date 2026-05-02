<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $items = User::with('roles')->latest()->paginate(config('hopn.pagination.default', 15));
        return view('admin.users.index', compact('items'));
    }

    public function create()
    {
        $item = new User();
        return view('admin.users.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'roles'    => ['nullable', 'array'],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (!empty($data['roles'])) {
            $user->syncRoles($data['roles']);
        }

        return redirect()->route('admin.users.index')->with('status', 'User created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.users.edit', $id);
    }

    public function edit(string $id)
    {
        $item = User::with('roles')->findOrFail($id);
        return view('admin.users.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'roles'    => ['nullable', 'array'],
        ]);

        $update = ['name' => $data['name'], 'email' => $data['email']];
        if (!empty($data['password'])) {
            $update['password'] = Hash::make($data['password']);
        }

        $user->update($update);
        $user->syncRoles($data['roles'] ?? []);

        return redirect()->route('admin.users.index')->with('status', 'User updated.');
    }

    public function destroy(string $id)
    {
        if ((int)$id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('status', 'User deleted.');
    }
}
