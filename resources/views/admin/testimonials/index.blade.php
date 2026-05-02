<x-layouts.admin title="Testimonials">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary text-sm">+ New Testimonial</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel p-4 space-y-3">
        @forelse($items as $t)
            <div class="flex items-start justify-between rounded-lg bg-slate-900 p-4">
                <div class="flex-1">
                    <p class="text-sm text-slate-300 italic">"{{ Str::limit($t->quote, 120) }}"</p>
                    <p class="mt-2 text-xs font-semibold text-white">{{ $t->author_name }} — {{ $t->author_role }}, {{ $t->company }}</p>
                </div>
                <div class="ml-4 flex gap-3 shrink-0">
                    <span class="text-xs {{ $t->visible ? 'text-green-400' : 'text-slate-500' }}">{{ $t->visible ? 'Visible' : 'Hidden' }}</span>
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-indigo-300 hover:text-indigo-200 text-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" class="inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete?')" class="text-rose-300 hover:text-rose-200 text-sm">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="py-6 text-center text-slate-500">No testimonials found.</p>
        @endforelse
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
