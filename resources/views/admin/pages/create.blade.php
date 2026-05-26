<x-layouts.admin title="Create Page">
    <div class="max-w-4xl mx-auto p-6 bg-slate-900 rounded-lg border border-slate-800">
        <h1 class="text-2xl font-bold mb-6 text-white">Create New Page</h1>
        
        <form action="{{ route('admin.pages.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm text-slate-400 mb-2">Page Slug (URL)</label>
                <input type="text" name="slug" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white" required>
            </div>

            <div x-data="{ tab: 'en' }">
                <div class="flex gap-4 border-b border-slate-800 mb-4">
                    <button type="button" @click="tab = 'en'" :class="tab === 'en' ? 'text-white border-b-2 border-indigo-500' : 'text-slate-500'" class="pb-2">English</button>
                    <button type="button" @click="tab = 'de'" :class="tab === 'de' ? 'text-white border-b-2 border-indigo-500' : 'text-slate-500'" class="pb-2">German</button>
                    <button type="button" @click="tab = 'ar'" :class="tab === 'ar' ? 'text-white border-b-2 border-indigo-500' : 'text-slate-500'" class="pb-2">Arabic</button>
                </div>

                <div x-show="tab === 'en'" class="space-y-4">
                    <input type="text" name="title[en]" placeholder="Title (EN)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white">
                    <textarea name="content[en]" placeholder="Content (EN)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white h-40"></textarea>
                </div>
                <div x-show="tab === 'de'" class="space-y-4">
                    <input type="text" name="title[de]" placeholder="Title (DE)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white">
                    <textarea name="content[de]" placeholder="Content (DE)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white h-40"></textarea>
                </div>
                <div x-show="tab === 'ar'" class="space-y-4">
                    <input type="text" name="title[ar]" placeholder="Title (AR)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white">
                    <textarea name="content[ar]" placeholder="Content (AR)" class="w-full bg-slate-950 border border-slate-700 rounded p-3 text-white h-40"></textarea>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <label class="flex items-center text-slate-300">
                    <input type="checkbox" name="is_published" class="mr-2"> Published
                </label>
            </div>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded">Save Page</button>
        </form>
    </div>
</x-layouts.admin>
