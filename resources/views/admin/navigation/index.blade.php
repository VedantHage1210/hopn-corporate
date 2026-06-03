<x-layouts.admin title="Navigation">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Navigation</h1>
        <a href="{{ route('admin.navigation.create') }}" class="btn-primary text-sm">+ New Item</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Label (EN)</th>
                    <th class="px-3 py-2">Label (DE)</th>
                    <th class="px-3 py-2">Label (AR)</th>
                    <th class="px-3 py-2">Location</th>
                    <th class="px-3 py-2">URL</th>
                    <th class="px-3 py-2">Order</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $item->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $item->label_en }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->label_de ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->label_ar ?? '—' }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold
                            {{ $item->menu_location === 'header' ? 'bg-indigo-900 text-indigo-200' : 'bg-slate-700 text-slate-300' }}">
                            {{ ucfirst($item->menu_location) }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400 text-xs font-mono">{{ $item->url ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->sort_order ?? 0 }}</td>
                    <td class="px-3 py-3">
                        <div class="flex gap-1">
                            <span class="rounded px-1.5 py-0.5 text-xs {{ $item->visible_en ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">EN</span>
                            <span class="rounded px-1.5 py-0.5 text-xs {{ $item->visible_de ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">DE</span>
                            <span class="rounded px-1.5 py-0.5 text-xs {{ $item->visible_ar ?? false ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">AR</span>
                        </div>
                    </td>
                   <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.navigation.edit', $item) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        @if($item->url)
                        <a href="{{ $item->url }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        @endif
                        <form method="POST" action="{{ route('admin.navigation.destroy', $item) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="px-3 py-6 text-center text-slate-500">No navigation items found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
