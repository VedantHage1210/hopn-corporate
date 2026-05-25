<x-layouts.admin :title="isset($item->id) ? 'Edit Case Study' : 'New Case Study'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Case Study' : 'New Case Study' }}</h1>
        <a href="{{ route('admin.case-studies.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.case-studies.update', $item) : route('admin.case-studies.store') }}"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Title & Client Info --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Title & Client Info</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}" required
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Client Name / Label (EN)</label>
                        <input type="text" name="client_name_en" value="{{ old('client_name_en', $item->client_name_en ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" placeholder="e.g. Leading European Bank">
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (DE)</label>
                        <input type="text" name="title_de" value="{{ old('title_de', $item->title_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Client Name / Label (DE)</label>
                        <input type="text" name="client_name_de" value="{{ old('client_name_de', $item->client_name_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (AR)</label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', $item->title_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Client Name / Label (AR)</label>
                        <input type="text" name="client_name_ar" value="{{ old('client_name_ar', $item->client_name_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                </div>
            </div>
        </div>

        {{-- Challenge, Solution & Outcomes --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Challenge, Solution & Outcomes</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Challenge (Problem)</label>
                        <textarea name="challenge_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('challenge_en', $item->challenge_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution</label>
                        <textarea name="solution_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('solution_en', $item->solution_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Outcomes & Metrics</label>
                        <textarea name="outcomes_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('outcomes_en', $item->outcomes_en ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Challenge (Problem)</label>
                        <textarea name="challenge_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('challenge_de', $item->challenge_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution</label>
                        <textarea name="solution_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('solution_de', $item->solution_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Outcomes & Metrics</label>
                        <textarea name="outcomes_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('outcomes_de', $item->outcomes_de ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Challenge (Problem)</label>
                        <textarea name="challenge_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('challenge_ar', $item->challenge_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution</label>
                        <textarea name="solution_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('solution_ar', $item->solution_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Outcomes & Metrics</label>
                        <textarea name="outcomes_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('outcomes_ar', $item->outcomes_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Industries & Services --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Relations & Connections</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-200">Industries</label>
                    <div class="rounded border border-slate-700 bg-slate-900 p-3 space-y-2 max-h-52 overflow-y-auto">
                        @foreach($industries ?? [] as $industry)
                        <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer hover:text-white">
                            <input type="checkbox" name="industry_ids[]" value="{{ $industry->id }}"
                                @checked(in_array($industry->id, old('industry_ids', $item->industry_ids ?? [])))
                                class="rounded border-slate-600">
                            {{ $industry->name }}
                        </label>
                        @endforeach
                        @if(empty($industries) || count($industries) === 0)
                        <p class="text-xs text-slate-500">No industries found. Add from Industries module.</p>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-200">Related Services</label>
                    <div class="rounded border border-slate-700 bg-slate-900 p-3 space-y-2 max-h-52 overflow-y-auto">
                        @foreach($services ?? [] as $service)
                        <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer hover:text-white">
                            <input type="checkbox" name="service_ids[]" value="{{ $service->id }}"
                                @checked(in_array($service->id, old('service_ids', $item->service_ids ?? [])))
                                class="rounded border-slate-600">
                            {{ $service->name }}
                        </label>
                        @endforeach
                        @if(empty($services) || count($services) === 0)
                        <p class="text-xs text-slate-500">No services found. Add from Services module.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Settings & Media --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Settings & Media</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        placeholder="auto-generated"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Tech Stack (Comma separated)</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', $item->tech_stack ?? '') }}"
                        placeholder="e.g. Laravel, Python, AWS"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Featured Image URL</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $item->image_url ?? '') }}"
                        placeholder="https://example.com/image.jpg"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    @if(!empty($item->image_url))
                    <div style="margin-top:8px;">
                        <img src="{{ $item->image_url }}" style="height:60px; border-radius:6px; object-fit:cover;">
                    </div>
                    @endif
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">PDF Attachment URL (Optional)</label>
                    <input type="url" name="pdf_url" value="{{ old('pdf_url', $item->pdf_url ?? '') }}"
                        placeholder="https://example.com/case-study.pdf"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
            </div>
            <div class="mt-4">
                <label class="flex items-center gap-2 text-sm text-slate-300">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $item->is_published ?? false))>
                    Published
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Case Study' : 'Create Case Study' }}</button>
            <a href="{{ route('admin.case-studies.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
