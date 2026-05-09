<x-layouts.admin title="Startups">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Startups</h1>
        <a href="{{ route('admin.startups.create') }}" class="btn-primary text-sm">+ New Startup</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Industry</th>
                    <th class="px-3 py-2">Stage</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items ?? [] as $startup)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            <div class="font-medium text-white">{{ $startup->name }}</div>
                        </td>
                        <td class="px-3 py-3 text-slate-400">{{ $startup->industry ?? '—' }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $startup->stage ?? '—' }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-slate-700 text-slate-400">Active</span>
                        </td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.startups.edit', $startup) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.startups.destroy', $startup) }}" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No startups found. Click "+ New Startup" to add one.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
