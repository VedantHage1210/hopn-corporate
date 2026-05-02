<x-layouts.admin title="Partners">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Partners</h1>
        <a href="{{ route('admin.partners.create') }}" class="btn-primary text-sm">+ New Partner</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Logo</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Order</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $partner)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            @if($partner->logo)
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-8 w-16 object-contain">
                            @else
                                <div class="h-8 w-16 rounded bg-slate-800 flex items-center justify-center text-xs text-slate-500">No logo</div>
                            @endif
                        </td>
                        <td class="px-3 py-3 font-medium text-white">{{ $partner->name }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ ucwords(str_replace('_', ' ', $partner->type ?? '—')) }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs {{ $partner->is_visible ?? $partner->visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                                {{ ($partner->is_visible ?? $partner->visible) ? 'Visible' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-slate-400">{{ $partner->sort_order ?? 0 }}</td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.partners.edit', $partner) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No partners found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
