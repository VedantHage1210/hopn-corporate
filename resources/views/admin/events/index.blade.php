<x-layouts.admin title="Events">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Events</h1>
        <a href="{{ route('admin.events.create') }}" class="btn-primary text-sm">+ New Event</a>
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
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Date</th>
                    <th class="px-3 py-2">Location</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $event)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $event->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $event->title }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-indigo-900 text-indigo-200">
                            {{ ucfirst($event->type ?? '—') }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400 text-xs">
                        {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : '—' }}
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $event->location ?? '—' }}</td>
                    <td class="px-3 py-3">
                        @if($event->is_published ?? true)
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-green-900 text-green-200">Published</span>
                        @else
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-slate-700 text-slate-400">Draft</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 flex gap-3">
                        <a href="{{ route('admin.events.edit', $event) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <a href="{{ route('events.index', ['lang' => 'en']) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-3 py-6 text-center text-slate-500">No events found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
