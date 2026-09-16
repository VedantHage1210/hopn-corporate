<x-layouts.admin :title="'Bookings — '.$item->title_en">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Bookings — {{ $item->title_en }}</h1>
        <a href="{{ route('admin.workshops.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Workshops</a>
    </div>
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Participants</th>
                    <th class="px-3 py-2">Preferred date</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-white">{{ $booking->name }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $booking->email }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $booking->participants }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ optional($booking->preferred_date)->format('d M Y') ?? '—' }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full bg-slate-700 px-2 py-0.5 text-xs font-semibold text-slate-200">{{ ucfirst($booking->status) }}</span>
                    </td>
                    <td class="px-3 py-3 text-slate-500 text-xs">{{ $booking->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No bookings yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $bookings->links() }}</div>
    </div>
</x-layouts.admin>
