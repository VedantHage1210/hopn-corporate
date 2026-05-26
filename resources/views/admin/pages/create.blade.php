<x-layouts.admin title="New Page">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Page</h1>
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.pages.store') }}">
            @csrf
            @include('admin.pages._form', ['page' => null])
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Page</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
