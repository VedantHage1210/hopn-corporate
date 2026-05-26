<x-layouts.admin title="Pages">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Pages</h1>
        <a href="{{ route('admin.pages.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold">
            + Create Page
        </a>
    </div>

    <div class="bg-[#0B1120] border border-slate-800 rounded-2xl p-6 shadow-xl">
        <table class="w-full text-left text-slate-300">
            <thead>
                <tr class="text-xs uppercase text-slate-500 border-b border-slate-800">
                    <th class="pb-3">ID</th>
                    <th class="pb-3">Title</th>
                    <th class="pb-3">Slug</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr class="border-b border-slate-800">
                    <td class="py-4">{{ $page->id }}</td>
                    <td class="py-4 font-medium text-white">{{ $page->title }}</td>
                    <td class="py-4 text-slate-400">{{ $page->slug }}</td>
                    <td class="py-4">
                        <span class="{{ $page->is_published ? 'bg-green-900/30 text-green-400' : 'bg-slate-800 text-slate-400' }} px-2 py-1 rounded text-xs font-semibold">
                            {{ $page->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="py-4 flex gap-4">
                        <a href="{{ route('pages.show', ['lang' => 'en', 'slug' => $page->slug]) }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">View</a>
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-slate-400 hover:text-white">Edit</a>
                        <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.admin>
