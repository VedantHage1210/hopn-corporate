<x-layouts.admin title="Consulting Packages">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Consulting Packages</h1>
        <a href="{{ route('admin.consulting-packages.create') }}" class="btn-primary text-sm">+ New Package</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr>
                <th class="px-3 py-2">Name</th><th class="px-3 py-2">Category</th><th class="px-3 py-2">Duration</th><th class="px-3 py-2">Price</th><th class="px-3 py-2">Actions</th>
            </tr></thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-white">{{ $item->name_en }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->category->name_en ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->duration_minutes }} min</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->price_on_request ? 'On request' : ($item->price ? $item->currency.' '.number_format($item->price,0) : '—') }}</td>
                    <td class="px-3 py-3">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.consulting-packages.edit', $item) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.consulting-packages.destroy', $item) }}" class="inline-block">@csrf @method('DELETE')<button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button></form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No packages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
