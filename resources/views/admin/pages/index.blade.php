<x-layouts.admin title="Pages">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Pages</h1>
        <a href="{{ route('admin.pages.create') }}" class="btn-primary text-sm">+ New Page</a>
    </div>

    @if(session('status'))
    <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Title</th>
                    <th class="px-3 py-2">Slug</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $page->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">{{ $page->title }}</td>
                    <td class="px-3 py-3 font-mono text-xs text-slate-400">{{ $page->slug }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $page->is_published ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $page->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 flex gap-3">
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                      <a href="{{ route('pages.show', ['lang' => 'en', 'slug' => $page->slug]) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this page?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No pages found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $pages->links() }}</div>
    </div>
</x-layouts.admin>
