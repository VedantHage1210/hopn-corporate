<x-layouts.admin title="Edit Page">
    <div class="max-w-4xl mx-auto p-6 bg-slate-900 rounded-lg border border-slate-800">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Edit Page</h1>
            <a href="{{ route('admin.pages.index') }}" class="text-slate-400 hover:text-white">← Back to List</a>
        </div>
        
        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf 
            @method('PUT')
            @include('admin.pages._form')
            
            <button type="submit" class="mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-bold transition">
                Update Page
            </button>
        </form>
    </div>
</x-layouts.admin>
