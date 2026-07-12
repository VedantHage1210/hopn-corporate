<x-layouts.admin :title="$item->name">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ $item->name }}</h1>
        <div class="flex gap-3">
            <a href="{{ route('admin.experts.edit', $item) }}" class="btn-primary text-sm">Edit</a>
            <a href="{{ route('admin.experts.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">← Back</a>
        </div>
    </div>

    <div class="card-panel p-6 mb-4">
        <div class="flex items-center gap-4 mb-6">
            @if($item->photo_url)
                <img src="{{ $item->photo_url }}" class="h-16 w-16 rounded-full object-cover">
            @else
                <div style="width:56px; height:56px; border-radius:12px; background:{{ $item->accent_color ?? '#4F6EF7' }}20; border:1px solid {{ $item->accent_color ?? '#4F6EF7' }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:800; color:{{ $item->accent_color ?? '#4F6EF7' }};">
                    {{ $item->initials ?? strtoupper(substr($item->name,0,2)) }}
                </div>
            @endif
            <div>
                <h2 class="text-lg font-bold text-white">{{ $item->name }}</h2>
                <p class="text-sm text-slate-400">{{ $item->specialization_en }}</p>
                @if($item->hourly_rate)
                    <p class="text-sm font-bold mt-1" style="color:{{ $item->accent_color ?? '#4F6EF7' }}">{{ $item->hourly_rate }}</p>
                @endif
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 text-sm">
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">Specialization EN</span>
                <p class="text-white mt-1">{{ $item->specialization_en ?? '—' }}</p>
            </div>
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">Specialization DE</span>
                <p class="text-white mt-1">{{ $item->specialization_de ?? '—' }}</p>
            </div>
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">Specialization AR</span>
                <p class="text-white mt-1" dir="rtl">{{ $item->specialization_ar ?? '—' }}</p>
            </div>
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">LinkedIn</span>
                <p class="mt-1">
                    @if($item->linkedin_url)
                        <a href="{{ $item->linkedin_url }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $item->linkedin_url }}</a>
                    @else —
                    @endif
                </p>
            </div>
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">Visible</span>
                <p class="mt-1">
                    <span class="rounded-full px-2 py-0.5 text-xs {{ $item->is_visible ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                        {{ $item->is_visible ? 'Visible' : 'Hidden' }}
                    </span>
                </p>
            </div>
            <div>
                <span class="text-slate-500 text-xs uppercase tracking-wider">Sort Order</span>
                <p class="text-white mt-1">{{ $item->sort_order }}</p>
            </div>
        </div>

        @if($item->tags && count($item->tags) > 0)
        <div class="mt-4">
            <span class="text-slate-500 text-xs uppercase tracking-wider">Tags</span>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($item->tags as $tag)
                <span class="rounded-full px-3 py-1 text-xs font-semibold"
                      style="background:{{ $item->accent_color ?? '#4F6EF7' }}20; color:{{ $item->accent_color ?? '#4F6EF7' }}; border:1px solid {{ $item->accent_color ?? '#4F6EF7' }}30;">
                    {{ $tag }}
                </span>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    @if($item->bio_en || $item->bio_de || $item->bio_ar)
    <div class="card-panel p-6">
        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Bio</h3>
        <div class="grid gap-4">
            @if($item->bio_en)
            <div>
                <span class="text-slate-500 text-xs">🇬🇧 EN</span>
                <p class="text-slate-300 text-sm mt-1">{{ $item->bio_en }}</p>
            </div>
            @endif
            @if($item->bio_de)
            <div>
                <span class="text-slate-500 text-xs">🇩🇪 DE</span>
                <p class="text-slate-300 text-sm mt-1">{{ $item->bio_de }}</p>
            </div>
            @endif
            @if($item->bio_ar)
            <div>
                <span class="text-slate-500 text-xs">🇸🇦 AR</span>
                <p class="text-slate-300 text-sm mt-1" dir="rtl">{{ $item->bio_ar }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</x-layouts.admin>
