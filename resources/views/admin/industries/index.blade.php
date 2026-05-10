<x-layouts.admin title="Industries">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Industries</h1>
        <a href="{{ route('admin.industries.create') }}" class="btn-primary text-sm">+ New Industry</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Icon</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Slug</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $industry)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3 text-2xl">{{ $industry->icon }}</td>
                        <td class="px-3 py-3">
                            <div class="font-medium text-white">{{ $industry->name }}</div>
                            <div class="text-xs text-slate-400">{{ $industry->name_de }}</div>
                        </td>
                        <td class="px-3 py-3 font-mono text-xs text-indigo-300">{{ $industry->slug }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $industry->is_published ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                                {{ $industry->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.industries.edit', $industry) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.industries.destroy', $industry) }}" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No industries found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
