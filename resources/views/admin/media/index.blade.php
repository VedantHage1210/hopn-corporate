<x-layouts.admin title="Media Library">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Media Library</h1>
        <a href="{{ route('admin.media-assets.create') }}" class="btn-primary text-sm">+ Upload Media</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    {{-- Filter bar --}}
    <form method="GET" class="mb-6 flex flex-wrap gap-3">
        <select name="type" class="rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
            <option value="">All Types</option>
            <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Images</option>
            <option value="pdf" {{ request('type') === 'pdf' ? 'selected' : '' }}>PDFs</option>
            <option value="video" {{ request('type') === 'video' ? 'selected' : '' }}>Videos</option>
        </select>
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Search by filename..."
            class="rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white w-64">
        <button type="submit" class="btn-primary text-sm">Filter</button>
        <a href="{{ route('admin.media-assets.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Reset</a>
    </form>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Preview</th>
                    <th class="px-3 py-2">File Name</th>
                    <th class="px-3 py-2">Title</th>
                    <th class="px-3 py-2">Alt Text</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Size</th>
                    <th class="px-3 py-2">Uploaded</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $asset)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $asset->id }}</td>
                    <td class="px-3 py-3">
                        @if(str_starts_with($asset->mime_type ?? '', 'image/'))
                            <img src="{{ Storage::url($asset->path) }}" alt="{{ $asset->alt_text }}"
                                 class="h-10 w-16 object-cover rounded">
                        @elseif($asset->mime_type === 'application/pdf')
                            <div class="h-10 w-16 rounded bg-rose-900/30 flex items-center justify-center text-xs text-rose-300 font-bold">PDF</div>
                        @elseif(str_starts_with($asset->mime_type ?? '', 'video/'))
                            <div class="h-10 w-16 rounded bg-purple-900/30 flex items-center justify-center text-xs text-purple-300 font-bold">VIDEO</div>
                        @else
                            <div class="h-10 w-16 rounded bg-slate-700 flex items-center justify-center text-xs text-slate-400">FILE</div>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-slate-300 text-xs font-mono">{{ $asset->file_name }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $asset->title ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $asset->alt_text ?? '—' }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs bg-slate-700 text-slate-300">
                            {{ $asset->mime_type ?? '—' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400 text-xs">
                        {{ $asset->size ? number_format($asset->size / 1024, 1) . ' KB' : '—' }}
                    </td>
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ $asset->created_at->format('d M Y') }}</td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ Storage::url($asset->path) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <a href="{{ route('admin.media-assets.edit', $asset) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <form method="POST" action="{{ route('admin.media-assets.destroy', $asset) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this file?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="px-3 py-6 text-center text-slate-500">No media files found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
