<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $items = TeamMember::orderBy('sort_order')->paginate(config('hopn.pagination.default', 15));
        return view('admin.team-members.index', compact('items'));
    }

    public function create()
    {
        $item = new TeamMember();
        return view('admin.team-members.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'role_en'      => ['nullable', 'string', 'max:120'],
            'role_de'      => ['nullable', 'string', 'max:120'],
            'bio'          => ['nullable', 'string'],
            'bio_de'       => ['nullable', 'string'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'sort_order'   => ['nullable', 'integer'],
            'photo'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['is_visible'] = $request->boolean('is_visible', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);
        return redirect()->route('admin.team-members.index')->with('status', 'Team member created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.team-members.edit', $id);
    }

    public function edit(string $id)
    {
        $item = TeamMember::findOrFail($id);
        return view('admin.team-members.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $member = TeamMember::findOrFail($id);
        $data   = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'role_en'      => ['nullable', 'string', 'max:120'],
            'role_de'      => ['nullable', 'string', 'max:120'],
            'bio'          => ['nullable', 'string'],
            'bio_de'       => ['nullable', 'string'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'sort_order'   => ['nullable', 'integer'],
            'photo'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['is_visible'] = $request->boolean('is_visible');

        if ($request->hasFile('photo')) {
            if ($member->photo) Storage::disk('public')->delete($member->photo);
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $member->update($data);
        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(string $id)
    {
        $m = TeamMember::findOrFail($id);
        if ($m->photo) Storage::disk('public')->delete($m->photo);
        $m->delete();
        return redirect()->route('admin.team-members.index')->with('status', 'Team member deleted.');
    }
}
