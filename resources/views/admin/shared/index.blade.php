<x-layouts.admin :title="$title">
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ $title }}</h1>
        @if(!empty($createRoute ?? null))
            <a href="{{ $createRoute }}" class="btn-primary text-sm">Create</a>
        @endif
    </div>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    @foreach($columns as $label => $key)
                        <th class="px-2 py-2">{{ $label }}</th>
                    @endforeach
                    <th class="px-2 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="border-t border-slate-800">
                        @foreach($columns as $label => $key)
                            <td class="px-2 py-2">{{ data_get($item, $key) }}</td>
                        @endforeach
                        <td class="px-2 py-2">
                            @if(!empty($editRouteName ?? null))
                                <a class="text-indigo-300 hover:text-indigo-200" href="{{ route($editRouteName, $item->id) }}">Edit</a>
                            @endif
                            @if(!empty($destroyRouteName ?? null))
                                <form method="POST" action="{{ route($destroyRouteName, $item->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-3 text-rose-300 hover:text-rose-200">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-2 py-4 text-slate-500" colspan="{{ count($columns) + 1 }}">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>
        @if(method_exists($items, 'links'))
            <div class="mt-4">{{ $items->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
