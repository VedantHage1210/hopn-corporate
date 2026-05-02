<x-layouts.admin title="Users">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn-primary text-sm">+ New User</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Roles</th>
                    <th class="px-3 py-2">Created</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $user)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3 font-medium text-white">{{ $user->name }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $user->email }}</td>
                        <td class="px-3 py-3">
                            @foreach($user->roles as $role)
                                <span class="inline-block rounded-full bg-indigo-900 px-2 py-0.5 text-xs text-indigo-200 mr-1">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-3 py-3 text-slate-400 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this user?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
