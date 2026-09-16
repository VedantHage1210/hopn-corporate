@php
    $typeLabels = ['capability'=>'Capabilities', 'usecase'=>'Use Cases', 'industry'=>'Industries', 'deliverable'=>'Deliverables'];
@endphp
<x-layouts.admin :title="$typeLabels[$type].' — '.($page->nav_label_en ?: $page->hero_title_en)">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-white">{{ $typeLabels[$type] }} — {{ ($page->nav_label_en ?: $page->hero_title_en) }}</h1>
            <div class="mt-1 flex gap-3 text-xs">
                @foreach($typeLabels as $t => $label)
                <a href="{{ route('admin.solution-blocks.index', ['page'=>$page->id, 'type'=>$t]) }}" class="{{ $type===$t ? 'text-indigo-300 font-semibold' : 'text-slate-500' }}">{{ $label }}</a>
                @endforeach
                <a href="{{ route('admin.solution-pages.edit', $page->id) }}" class="text-slate-500">Hero &amp; Sections</a>
            </div>
        </div>
        <a href="{{ route('admin.solution-blocks.create', ['page'=>$page->id, 'type'=>$type]) }}" class="btn-primary text-sm">+ New</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr>
                @if($type === 'capability')<th class="px-3 py-2">#</th>@endif
                <th class="px-3 py-2">Title</th><th class="px-3 py-2">Status</th><th class="px-3 py-2">Actions</th>
            </tr></thead>
            <tbody>
                @forelse($items as $item)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    @if($type === 'capability')<td class="px-3 py-3 text-slate-400">{{ str_pad($item->number ?? 0, 2, '0', STR_PAD_LEFT) }}</td>@endif
                    <td class="px-3 py-3 text-white">{{ $item->title_en }}</td>
                    <td class="px-3 py-3"><span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $item->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">{{ $item->is_visible ? 'Visible' : 'Hidden' }}</span></td>
                    <td class="px-3 py-3">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.solution-blocks.edit', [$page->id, $item->id]) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.solution-blocks.destroy', [$page->id, $item->id]) }}" class="inline-block">@csrf @method('DELETE')<button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200">Delete</button></form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-3 py-6 text-center text-slate-500">Nothing here yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
