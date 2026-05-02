@props(['partners' => collect()])
<div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
    @forelse($partners as $partner)
        <div class="card-panel flex h-20 items-center justify-center p-3 text-xs text-slate-300">
            {{ $partner->name }}
        </div>
    @empty
        <p class="text-sm text-slate-400">No partners yet.</p>
    @endforelse
</div>
