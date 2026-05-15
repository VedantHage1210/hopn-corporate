<x-layouts.admin title="New Event">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">New Event</h1>
        <a href="{{ route('admin.events.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.events.store') }}">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">

                {{-- Basic Info --}}
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN) *</label>
                    <input type="text" name="title" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (DE)</label>
                    <input type="text" name="title_de" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (AR)</label>
                    <input type="text" name="title_ar" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        <option value="conference">Conference</option>
                        <option value="workshop">Workshop</option>
                        <option value="webinar">Webinar</option>
                        <option value="hackathon">Hackathon</option>
                        <option value="startup">Startup Event</option>
                        <option value="networking">Networking</option>
                        <option value="research">Research Event</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Date</label>
                    <input type="date" name="date" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Location</label>
                    <input type="text" name="location" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="Berlin, Germany / Online">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Max Attendees</label>
                    <input type="number" name="max_attendees" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Registration URL</label>
                    <input type="url" name="registration_url" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Image URL</label>
                    <input type="url" name="image_url" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_published" checked> Published
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="registration_open" checked> Registration Open
                    </label>
                </div>

                {{-- Speakers & Sponsors --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Speakers & Sponsors</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Speakers (comma separated)</label>
                    <input type="text" name="speaker_names" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="John Doe, Jane Smith">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sponsors (comma separated)</label>
                    <input type="text" name="sponsor_names" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" placeholder="Company A, Company B">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white"></textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Save Event</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
