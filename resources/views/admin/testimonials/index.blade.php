<x-layouts.admin title="Testimonials">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary text-sm">+ New Testimonial</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Avatar</th>
                    <th class="px-3 py-2">Author</th>
                    <th class="px-3 py-2">Company</th>
                    <th class="px-3 py-2">Quote (EN)</th>
                    <th class="px-3 py-2">Visible</th>
                    <th class="px-3 py-2">Order</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $t)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $t->id }}</td>
                    <td class="px-3 py-3">
                        @if($t->avatar)
                            <img src="{{ $t->avatar }}" alt="{{ $t->author_name }}"
                                 class="h-9 w-9 rounded-full object-cover">
                        @else
                            <div class="h-9 w-9 rounded-full bg-indigo-900 flex items-center justify-center text-xs font-bold text-indigo-300">
                                {{ strtoupper(substr($t->author_name, 0, 2)) }}
                            </div>
                        @endif
                    </td>
                    <td class="px-3 py-3 font-medium text-white">
                        {{ $t->author_name }}
                        @if($t->author_role)
                            <div class="text-xs text-slate-400">{{ $t->author_role }}</div>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $t->company ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400 max-w-xs">
                        <span class="italic">"{{ Str::limit($t->quote_en, 80) }}"</span>
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $t->visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $t->visible ? 'Visible' : 'Hidden' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $t->sort_order ?? 0 }}</td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                      <a href="{{ route('home', ['lang' => 'en']) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="px-3 py-6 text-center text-slate-500">No testimonials found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
