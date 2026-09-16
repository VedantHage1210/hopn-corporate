<x-layouts.admin :title="'Versions — '.$page->title">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Version History — {{ $page->title }}</h1>
        <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-sm text-slate-400 hover:text-white">← Back to Edit</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr>
                <th class="px-3 py-2">#</th>
                <th class="px-3 py-2">Title at that time</th>
                <th class="px-3 py-2">Blocks</th>
                <th class="px-3 py-2">Edited by</th>
                <th class="px-3 py-2">Note</th>
                <th class="px-3 py-2">When</th>
                <th class="px-3 py-2">Actions</th>
            </tr></thead>
            <tbody>
                @forelse($versions as $version)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">#{{ $version->id }}</td>
                    <td class="px-3 py-3 text-white">{{ $version->data['page']['title'] ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ count($version->data['blocks'] ?? []) }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $version->editor_name ?? 'Unknown' }}</td>
                    <td class="px-3 py-3 text-slate-500 text-xs">{{ $version->note ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-500 text-xs">{{ $version->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-3 py-3">
                        <form method="POST" action="{{ route('admin.pages.versions.restore', [$page->id, $version->id]) }}">
                            @csrf
                            <button type="submit" onclick="return confirm('Restore the page to this version? A snapshot of the current state will be saved first, so nothing is lost.')" class="text-indigo-300 hover:text-indigo-200">Restore</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-3 py-6 text-center text-slate-500">No versions saved yet — one is created automatically every time you save this page.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $versions->links() }}</div>
    </div>
</x-layouts.admin>
