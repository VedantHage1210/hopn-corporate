<x-layouts.admin title="Investors">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Investors & Funds</h1>
        <a href="{{ route('admin.investors.create') }}" class="btn-primary text-sm">+ New Investor</a>
    </div>
    @if(session('status'))
    <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Logo</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Region</th>
                    <th class="px-3 py-2">Focus</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $investor)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $investor->id }}</td>
                    <td class="px-3 py-3">
                        @if($investor->logo)
                            <img src="{{ $investor->logo }}" alt="{{ $investor->name }}"
                                 class="h-8 w-8 rounded object-contain bg-slate-700 p-1">
                        @else
                            <div class="h-8 w-8 rounded bg-green-900 flex items-center justify-center text-xs font-bold text-green-300">
                                {{ strtoupper(substr($investor->name, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td class="px-3 py-3 font-medium text-white">{{ $investor->name }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ ucfirst($investor->type ?? '—') }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $investor->region ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ Str::limit($investor->focus ?? '—', 30) }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $investor->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $investor->is_visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.investors.edit', $investor) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <a href="{{ route('investors.index', ['lang'=>'en']) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.investors.destroy', $investor) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="px-3 py-6 text-center text-slate-500">No investors found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
