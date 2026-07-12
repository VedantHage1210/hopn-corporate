<x-layouts.admin title="Consulting Experts">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Consulting Experts</h1>
        <a href="{{ route('admin.experts.create') }}" class="btn-primary text-sm">+ New Expert</a>
    </div>

    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Expert</th>
                    <th class="px-3 py-2">Specialization (EN)</th>
                    <th class="px-3 py-2">Rate</th>
                    <th class="px-3 py-2">Tags</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Order</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $expert)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $expert->id }}</td>
                    <td class="px-3 py-3">
                        <div style="display:flex; align-items:center; gap:10px;">
                            @if($expert->photo_url)
                                <img src="{{ $expert->photo_url }}" alt="{{ $expert->name }}"
                                     class="h-9 w-9 rounded-full object-cover">
                            @else
                                <div style="width:36px; height:36px; border-radius:8px; background:{{ $expert->accent_color ?? '#4F6EF7' }}20; border:1px solid {{ $expert->accent_color ?? '#4F6EF7' }}30; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; color:{{ $expert->accent_color ?? '#4F6EF7' }};">
                                    {{ $expert->initials ?? strtoupper(substr($expert->name,0,2)) }}
                                </div>
                            @endif
                            <div>
                                <div class="font-medium text-white">{{ $expert->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $expert->specialization_en ?? '—' }}</td>
                    <td class="px-3 py-3">
                        @if($expert->hourly_rate)
                            <span style="color:{{ $expert->accent_color ?? '#4F6EF7' }}; font-weight:700;">{{ $expert->hourly_rate }}</span>
                        @else —
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        @if($expert->tags)
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($expert->tags, 0, 3) as $tag)
                                <span class="rounded-full bg-slate-700 px-2 py-0.5 text-xs text-slate-300">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @else —
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $expert->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $expert->is_visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $expert->sort_order }}</td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.experts.edit', $expert) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                       <a href="{{ route('home', ['lang'=>'en']) }}#consulting-experts" target="_blank" class="text-sky-300 hover:text-sky-200">View</a>
                        <form method="POST" action="{{ route('admin.experts.destroy', $expert) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="px-3 py-6 text-center text-slate-500">No experts yet. Add your first consulting expert.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
