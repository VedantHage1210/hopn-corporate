<x-layouts.admin title="Edit Page">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Page</h1>
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
            @csrf @method('PUT')
            @include('admin.pages._form', ['page' => $page])
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Page</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
