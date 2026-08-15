<x-layouts.admin title="Authors">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Authors</h1>
        <a href="{{ route('admin.authors.create') }}" class="btn-primary text-sm">+ New Author</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Author</th>
                    <th class="px-3 py-2">Bio (EN)</th>
                    <th class="px-3 py-2">Links</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $author->id }}</td>
                    <td class="px-3 py-3">
                        <div class="flex items-center gap-3">
                            @if($author->avatar)
                            <img src="{{ Storage::url($author->avatar) }}" alt="{{ $author->name }}" class="h-8 w-8 rounded-full object-cover">
                            @else
                            <div class="h-8 w-8 rounded-full bg-indigo-900 flex items-center justify-center text-xs font-bold text-indigo-300">
                                {{ strtoupper(substr($author->name, 0, 2)) }}
                            </div>
                            @endif
                            <span class="font-medium text-white">{{ $author->name }}</span>
                        </div>
                    </td>
                    <td class="px-3 py-3 max-w-xs truncate text-slate-400">{{ Str::limit($author->bio_en, 80) }}</td>
                    <td class="px-3 py-3">
                        @if($author->linkedin_url)
                        <a href="{{ $author->linkedin_url }}" target="_blank" class="text-indigo-300 text-xs">LinkedIn</a>
                        @else
                        <span class="text-slate-600 text-xs">—</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 flex gap-3">
                        <a href="{{ route('admin.authors.edit', $author) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <a href="{{ url('/en/insights') }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        @can('content.delete')
<form method="POST" action="{{ route('admin.authors.destroy', $author) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this author?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
@endcan
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No authors found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $authors->links() }}</div>
    </div>
</x-layouts.admin>
