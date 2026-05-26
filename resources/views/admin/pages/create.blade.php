<x-layouts.admin title="Create Page">
    <div class="max-w-4xl mx-auto p-6 bg-slate-900 rounded-lg border border-slate-800">
        <h1 class="text-2xl font-bold mb-6 text-white">Create New Page</h1>
        
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @include('admin.pages._form')
            
            <button type="submit" class="mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-bold transition">
                Save Page
            </button>
        </form>
    </div>
</x-layouts.admin>
