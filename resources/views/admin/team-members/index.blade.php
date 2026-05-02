<x-layouts.admin title="Team Members">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Team Members</h1>
        <a href="{{ route('admin.team-members.create') }}" class="btn-primary text-sm">+ Add Member</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Photo</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Role</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $member)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div class="h-10 w-10 rounded-full bg-indigo-900 flex items-center justify-center text-xs font-bold text-indigo-300">{{ strtoupper(substr($member->name, 0, 2)) }}</div>
                            @endif
                        </td>
                        <td class="px-3 py-3 font-medium text-white">{{ $member->name }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $member->role ?? '—' }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs {{ $member->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                                {{ $member->is_visible ? 'Visible' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No team members found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
