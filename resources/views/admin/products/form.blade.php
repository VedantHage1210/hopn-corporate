<x-layouts.admin :title="isset($item->id) ? 'Edit Product' : 'New Product'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit Product' : 'New Product' }}</h1>
        <a href="{{ route('admin.products.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <form method="POST"
          action="{{ isset($item->id) ? route('admin.products.update', $item) : route('admin.products.store') }}"
          class="space-y-6">
        @csrf
        @if(isset($item->id)) @method('PUT') @endif

        {{-- Content --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Title & Tagline</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Title (EN) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}" required
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (EN)</label>
                        <input type="text" name="tagline_en" value="{{ old('tagline_en', $item->tagline_en ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (EN)</label>
                        <textarea name="summary_en" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_en', $item->summary_en ?? '') }}</textarea>
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
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (DE)</label>
                        <input type="text" name="tagline_de" value="{{ old('tagline_de', $item->tagline_de ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (DE)</label>
                        <textarea name="summary_de" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('summary_de', $item->summary_de ?? '') }}</textarea>
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
                        <label class="mb-1 block text-sm font-medium text-slate-200">Tagline (AR)</label>
                        <input type="text" name="tagline_ar" value="{{ old('tagline_ar', $item->tagline_ar ?? '') }}"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Summary (AR)</label>
                        <textarea name="summary_ar" rows="3" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('summary_ar', $item->summary_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Problem & Solution --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Problem & Solution</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Problem (EN)</label>
                        <textarea name="problem_en" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('problem_en', $item->problem_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution (EN)</label>
                        <textarea name="solution_en" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('solution_en', $item->solution_en ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Problem (DE)</label>
                        <textarea name="problem_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('problem_de', $item->problem_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution (DE)</label>
                        <textarea name="solution_de" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('solution_de', $item->solution_de ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Problem (AR)</label>
                        <textarea name="problem_ar" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('problem_ar', $item->problem_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Solution (AR)</label>
                        <textarea name="solution_ar" rows="4" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('solution_ar', $item->solution_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Features & Use Cases --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Features & Use Cases</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-indigo-300">en English</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Features (EN)</label>
                        <textarea name="features_en" rows="4" placeholder="One feature per line"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('features_en', $item->features_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Use Cases (EN)</label>
                        <textarea name="use_cases_en" rows="4" placeholder="One use case per line"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('use_cases_en', $item->use_cases_en ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-yellow-400">de Deutsch</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Features (DE)</label>
                        <textarea name="features_de" rows="4"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('features_de', $item->features_de ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Use Cases (DE)</label>
                        <textarea name="use_cases_de" rows="4"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('use_cases_de', $item->use_cases_de ?? '') }}</textarea>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-xs font-bold uppercase text-green-400">ar العربية</p>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Features (AR)</label>
                        <textarea name="features_ar" rows="4"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('features_ar', $item->features_ar ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">Use Cases (AR)</label>
                        <textarea name="use_cases_ar" rows="4"
                            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white" dir="rtl">{{ old('use_cases_ar', $item->use_cases_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

       {{-- Industries & Services --}}
<div class="card-panel p-6">
    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Industries & Related Services</h2>
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-medium text-slate-200">Industries</label>
            <div class="rounded border border-slate-700 bg-slate-900 p-3 space-y-2 max-h-52 overflow-y-auto">
                @foreach($industries as $industry)
                <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer hover:text-white">
                    <input type="checkbox" name="industry_ids[]" value="{{ $industry->id }}"
                        @checked(in_array($industry->id, old('industry_ids', $item->industry_ids ?? [])))
                        class="rounded border-slate-600">
                    {{ $industry->name }}
                </label>
                @endforeach
                @if($industries->isEmpty())
                <p class="text-xs text-slate-500">No industries found. Add from Industries module.</p>
                @endif
            </div>
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-slate-200">Related Services</label>
            <div class="rounded border border-slate-700 bg-slate-900 p-3 space-y-2 max-h-52 overflow-y-auto">
                @foreach($services as $service)
                <label class="flex items-center gap-2 text-sm text-slate-300 cursor-pointer hover:text-white">
                    <input type="checkbox" name="service_ids[]" value="{{ $service->id }}"
                        @checked(in_array($service->id, old('service_ids', $item->service_ids ?? [])))
                        class="rounded border-slate-600">
                    {{ $service->name }}
                </label>
                @endforeach
                @if($services->isEmpty())
                <p class="text-xs text-slate-500">No services found. Add from Services module.</p>
                @endif
            </div>
        </div>
    </div>
</div>

        {{-- Settings --}}
        <div class="card-panel p-6">
            <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Settings</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                        placeholder="auto-generated"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white font-mono">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">Target Audience</label>
                    <input type="text" name="target_audience" value="{{ old('target_audience', $item->target_audience ?? '') }}"
                        placeholder="e.g. Enterprises, CTOs"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">CTA Label (EN)</label>
                    <input type="text" name="cta_label_en" value="{{ old('cta_label_en', $item->cta_label_en ?? '') }}"
                        placeholder="e.g. Request Demo"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">CTA URL</label>
                    <input type="url" name="cta_url" value="{{ old('cta_url', $item->cta_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                </div>
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-200">Hero Image URL</label>
                    <input type="url" name="hero_image_url" value="{{ old('hero_image_url', $item->hero_image_url ?? '') }}"
                        placeholder="https://example.com/image.jpg"
                        class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                    <p class="mt-1 text-xs text-slate-500">Paste image URL from Cloudinary, ImgBB, etc.</p>
                    @if(!empty($item->hero_image_url))
                    <div style="margin-top:8px;">
                        <img src="{{ $item->hero_image_url }}" style="height:60px; border-radius:6px; object-fit:cover;">
                    </div>
                    @endif
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
            <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update Product' : 'Create Product' }}</button>
            <a href="{{ route('admin.products.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
        </div>
    </form>
</x-layouts.admin>
