<x-layouts.admin title="Research Publications">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Research Publications</h1>
        <a href="{{ route('admin.research-publications.create') }}" class="btn-primary text-sm">+ New Publication</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Title</th>
                    <th class="px-3 py-2">Project</th>
                    <th class="px-3 py-2">Published</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ $item->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $item->title_en }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->project ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ $item->published_on?->format('d M Y') ?? '—' }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $item->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $item->is_visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.research-publications.edit', $item) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form action="{{ route('admin.research-publications.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this publication?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No publications yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
</x-layouts.admin>
