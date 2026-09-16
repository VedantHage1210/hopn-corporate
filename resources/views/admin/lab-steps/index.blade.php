<x-layouts.admin title="HOPn Labs — Process Steps">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-white">How We Work — Process Steps</h1>
            <div class="mt-1 flex gap-3 text-xs">
                <a href="{{ route('admin.labs.hero.edit') }}" class="text-slate-500">Hero</a>
                <a href="{{ route('admin.lab-items.index', ['type'=>'focus_area']) }}" class="text-slate-500">Focus Areas</a>
                <a href="{{ route('admin.lab-items.index', ['type'=>'program']) }}" class="text-slate-500">Programs</a>
            </div>
        </div>
        <a href="{{ route('admin.lab-steps.create') }}" class="btn-primary text-sm">+ New Step</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr>
                <th class="px-3 py-2">#</th><th class="px-3 py-2">Title</th><th class="px-3 py-2">Status</th><th class="px-3 py-2">Actions</th>
            </tr></thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-white">{{ str_pad($item->step_number, 2, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-3 py-3 text-white">{{ $item->title_en }}</td>
                    <td class="px-3 py-3"><span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $item->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">{{ $item->is_visible ? 'Visible' : 'Hidden' }}</span></td>
                    <td class="px-3 py-3">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.lab-steps.edit', $item) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.lab-steps.destroy', $item) }}" class="inline-block">@csrf @method('DELETE')<button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button></form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-3 py-6 text-center text-slate-500">No steps yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
