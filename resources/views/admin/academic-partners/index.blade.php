<x-layouts.admin title="Academic Partners">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Academic Partners</h1>
        <a href="{{ route('admin.academic-partners.create') }}" class="btn-primary text-sm">+ New Academic Partner</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ $item->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $item->name }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $item->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $item->is_visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.academic-partners.edit', $item) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form action="{{ route('admin.academic-partners.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this academic partner?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-3 py-6 text-center text-slate-500">No academic partners yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
