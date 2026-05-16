<x-layouts.admin title="Logos">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Logos & Partners</h1>
        <a href="{{ route('admin.logos.create') }}" class="btn-primary text-sm">+ New Logo</a>
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
                    <th class="px-3 py-2">Category</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $logo)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3">
                        @if($logo->logo_url)
                        <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}"
                             style="height:32px; width:auto; object-fit:contain; filter:brightness(0.8);">
                        @else
                        <div style="width:40px; height:32px; background:rgba(79,110,247,0.1); border-radius:6px; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#818CF8;">
                            {{ strtoupper(substr($logo->name, 0, 2)) }}
                        </div>
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        <div class="font-medium text-white">{{ $logo->name }}</div>
                        @if($logo->website)
                        <div class="text-xs text-slate-400">{{ $logo->website }}</div>
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-indigo-900 text-indigo-200">
                            {{ ucfirst($logo->category) }}
                        </span>
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $logo->visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $logo->visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 flex gap-3">
                        <a href="{{ route('admin.logos.edit', $logo) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <form method="POST" action="{{ route('admin.logos.destroy', $logo) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No logos found. Click "+ New Logo" to add one.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
