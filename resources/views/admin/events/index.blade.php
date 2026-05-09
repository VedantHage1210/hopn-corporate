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
                    <th class="px-3 py-2">Title</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Date</th>
                    <th class="px-3 py-2">Location</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items ?? [] as $event)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            <div class="font-medium text-white">{{ $event->title }}</div>
                        </td>
                        <td class="px-3 py-3 text-slate-400">{{ $event->type ?? '—' }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $event->date ?? '—' }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $event->location ?? '—' }}</td>
                        <td class="px-3 py-3 flex gap-3">
                            <a href="{{ route('admin.events.edit', $event) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No events found. Click "+ New Event" to add one.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
