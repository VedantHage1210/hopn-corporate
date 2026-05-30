<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

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
        $request->validate([
            'name'       => 'required|string|max:120',
            'role_en'    => 'nullable|string|max:120',
            'role_de'    => 'nullable|string|max:120',
            'role_ar'    => 'nullable|string|max:120',
            'bio_en'     => 'nullable|string',
            'bio_de'     => 'nullable|string',
            'bio_ar'     => 'nullable|string',
            'photo_url'  => 'nullable|string|max:500',
            'linkedin'   => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        TeamMember::create([
            'name'       => $request->name,
            'role_en'    => $request->role_en,
            'role_de'    => $request->role_de,
            'role_ar'    => $request->role_ar,
            'bio_en'     => $request->bio_en,
            'bio_de'     => $request->bio_de,
            'bio_ar'     => $request->bio_ar,
            'photo'      => $request->photo_url,
            'linkedin'   => $request->linkedin,
            'sort_order' => $request->sort_order ?? 0,
            'visible'    => $request->boolean('visible', true),
        ]);

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

        $request->validate([
            'name'       => 'required|string|max:120',
            'role_en'    => 'nullable|string|max:120',
            'role_de'    => 'nullable|string|max:120',
            'role_ar'    => 'nullable|string|max:120',
            'bio_en'     => 'nullable|string',
            'bio_de'     => 'nullable|string',
            'bio_ar'     => 'nullable|string',
            'photo_url'  => 'nullable|string|max:500',
            'linkedin'   => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $member->update([
            'name'       => $request->name,
            'role_en'    => $request->role_en,
            'role_de'    => $request->role_de,
            'role_ar'    => $request->role_ar,
            'bio_en'     => $request->bio_en,
            'bio_de'     => $request->bio_de,
            'bio_ar'     => $request->bio_ar,
            'photo'      => $request->photo_url ?: $member->photo,
            'linkedin'   => $request->linkedin,
            'sort_order' => $request->sort_order ?? 0,
            'visible'    => $request->boolean('visible'),
        ]);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(string $id)
    {
        TeamMember::findOrFail($id)->delete();
        return redirect()->route('admin.team-members.index')->with('status', 'Team member deleted.');
    }
}
