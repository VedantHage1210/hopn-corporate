<x-layouts.admin title="Digital Twins &amp; Engineering">
    <h1 class="mb-6 text-xl font-semibold text-white">Digital Twins &amp; Engineering — Solution Pages</h1>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif
    <div class="grid gap-4 md:grid-cols-2">
        @foreach($items as $item)
        <div class="card-panel p-6">
            <h2 class="text-lg font-bold text-white">{{ $item->nav_label_en ?: $item->hero_title_en }}</h2>
            <p class="text-sm text-slate-400 mt-2">{{ $item->hero_title_en }}</p>
            <p class="text-xs text-slate-500 mt-1 font-mono">/{{ $item->slug }}</p>
            <div class="mt-4 flex flex-wrap gap-3 text-sm">
                <a href="{{ route('admin.solution-pages.edit', $item->id) }}" class="text-indigo-300 hover:text-indigo-200">Edit Hero &amp; Sections</a>
                <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'capability']) }}" class="text-slate-400 hover:text-white">Capabilities</a>
                <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'usecase']) }}" class="text-slate-400 hover:text-white">Use Cases</a>
                <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'industry']) }}" class="text-slate-400 hover:text-white">Industries</a>
                <a href="{{ route('admin.solution-blocks.index', ['page'=>$item->id, 'type'=>'deliverable']) }}" class="text-slate-400 hover:text-white">Deliverables</a>
                <a href="{{ url('/en/'.($item->slug === 'digital-twins-oems' ? 'digital-twins' : 'engineering')) }}" target="_blank" class="text-slate-400 hover:text-white">View →</a>
            </div>
        </div>
        @endforeach
    </div>
</x-layouts.admin>
