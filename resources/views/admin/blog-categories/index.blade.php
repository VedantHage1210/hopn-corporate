<x-layouts.admin title="Blog Categories">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Blog Categories</h1>
        <a href="{{ route('admin.blog-categories.create') }}" class="btn-primary text-sm">+ New Category</a>
    </div>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Name (EN)</th>
                    <th class="px-3 py-2">Name (DE)</th>
                    <th class="px-3 py-2">Slug</th>
                    <th class="px-3 py-2">Posts</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3 font-medium text-white">{{ $category->name_en }}</td>
                        <td class="px-3 py-3 text-slate-400">{{ $category->name_de ?? '—' }}</td>
                        <td class="px-3 py-3 font-mono text-xs text-indigo-300">{{ $category->slug }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full bg-slate-800 px-2 py-0.5 text-xs">{{ $category->posts_count }}</span>
                        </td>
                        <td class="px-3 py-3">
                            <a href="{{ route('admin.blog-categories.edit', $category) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form method="POST" action="{{ route('admin.blog-categories.destroy', $category) }}" class="inline-block ml-3">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this category?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-3 py-6 text-center text-slate-500">No categories found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $categories->links() }}</div>
    </div>
</x-layouts.admin>
