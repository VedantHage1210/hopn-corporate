<x-layouts.admin title="Blog Tags">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Blog Tags</h1>
        <a href="{{ route('admin.blog-tags.create') }}" class="btn-primary text-sm">+ New Tag</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Slug</th>
                    <th class="px-3 py-2">Posts</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $tag->id }}</td>
                    <td class="px-3 py-3">
                        <span class="inline-flex items-center rounded-full bg-indigo-900/50 border border-indigo-700 px-3 py-0.5 text-xs font-medium text-indigo-300">
                            # {{ $tag->name }}
                        </span>
                    </td>
                    <td class="px-3 py-3 font-mono text-xs text-slate-400">{{ $tag->slug }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full bg-slate-800 px-2 py-0.5 text-xs">{{ $tag->posts_count }}</span>
                    </td>
                    <td class="px-3 py-3 flex gap-3">
                        <a href="{{ route('admin.blog-tags.edit', $tag) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <a href="{{ url('/en/insights?tag=' . $tag->slug) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.blog-tags.destroy', $tag) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this tag?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No tags found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $tags->links() }}</div>
    </div>
</x-layouts.admin>
