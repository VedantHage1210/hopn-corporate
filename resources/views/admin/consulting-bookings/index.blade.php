<x-layouts.admin title="Consulting Bookings">
    <h1 class="mb-6 text-xl font-semibold text-white">Consulting Bookings</h1>
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr>
                <th class="px-3 py-2">Name</th><th class="px-3 py-2">Expert</th><th class="px-3 py-2">Package</th><th class="px-3 py-2">Preferred date</th><th class="px-3 py-2">Status</th><th class="px-3 py-2">Received</th>
            </tr></thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-white">{{ $item->name }}<div class="text-xs text-slate-500">{{ $item->email }}</div></td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->expert->name ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $item->package->name_en ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ optional($item->preferred_date)->format('d M Y') ?? '—' }}</td>
                    <td class="px-3 py-3"><span class="rounded-full bg-slate-700 px-2 py-0.5 text-xs font-semibold text-slate-200">{{ ucfirst($item->status) }}</span></td>
                    <td class="px-3 py-3 text-xs text-slate-500">{{ $item->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No consulting bookings yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
