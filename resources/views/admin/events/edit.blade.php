<x-layouts.admin title="Edit Event">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Edit Event</h1>
        <a href="{{ route('admin.events.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6">
        <form method="POST" action="{{ route('admin.events.update', $event) }}">
            @csrf @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Basic Info</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (EN) *</label>
                    <input type="text" name="title" value="{{ old('title', $event->title) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (DE)</label>
                    <input type="text" name="title_de" value="{{ old('title_de', $event->title_de) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Title (AR)</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar', $event->title_ar) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Type</label>
                    <select name="type" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                        @foreach(['conference','workshop','webinar','hackathon','startup','networking','research'] as $t)
                        <option value="{{ $t }}" {{ old('type', $event->type) === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Date</label>
                    <input type="date" name="date" value="{{ old('date', $event->date?->format('Y-m-d')) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Location</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Max Attendees</label>
                    <input type="number" name="max_attendees" value="{{ old('max_attendees', $event->max_attendees) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Registration URL</label>
                    <input type="url" name="registration_url" value="{{ old('registration_url', $event->registration_url) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $event->image_url) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $event->sort_order) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="is_published" {{ $event->is_published ? 'checked' : '' }}> Published
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-300">
                        <input type="checkbox" name="registration_open" {{ $event->registration_open ? 'checked' : '' }}> Registration Open
                    </label>
                </div>
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Speakers & Sponsors</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Speakers (comma separated)</label>
                    <input type="text" name="speaker_names" value="{{ old('speaker_names', $event->speaker_names) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sponsors (comma separated)</label>
                    <input type="text" name="sponsor_names" value="{{ old('sponsor_names', $event->sponsor_names) }}" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2 mt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Description</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (EN)</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description', $event->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (DE)</label>
                    <textarea name="description_de" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_de', $event->description_de) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Description (AR)</label>
                    <textarea name="description_ar" rows="4" class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">{{ old('description_ar', $event->description_ar) }}</textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-primary">Update Event</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
