<x-layouts.admin title="Review Applicant">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Applicant: {{ $applicant->full_name }}</h1>
        <a href="{{ route('admin.applicants.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to list</a>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Main info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Applicant Details</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Name</dt>
                        <dd class="text-white font-medium">{{ $applicant->full_name }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Email</dt>
                        <dd><a href="mailto:{{ $applicant->email }}" class="text-indigo-300 hover:text-indigo-200">{{ $applicant->email }}</a></dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Phone</dt>
                        <dd class="text-white">{{ $applicant->phone ?? '—' }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Position</dt>
                        <dd class="text-white font-medium">{{ $applicant->job?->title ?? '—' }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Applied</dt>
                        <dd class="text-white">{{ $applicant->created_at->format('d M Y, H:i') }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">CV</dt>
                        <dd>
                            @if($applicant->cv_path)
                                <a href="{{ Storage::url($applicant->cv_path) }}" target="_blank" class="btn-primary text-xs py-1 px-3">Download CV</a>
                            @else
                                <span class="text-slate-500">Not uploaded</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>

            @if($applicant->cover_letter)
            <div class="card-panel p-6">
                <h2 class="mb-3 text-sm font-semibold uppercase tracking-wider text-slate-400">Cover Letter</h2>
                <p class="whitespace-pre-line text-sm leading-relaxed text-slate-300">{{ $applicant->cover_letter }}</p>
            </div>
            @endif
        </div>

        {{-- Status sidebar --}}
        <div class="space-y-6">
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Update Status</h2>
                <form method="POST" action="{{ route('admin.applicants.update', $applicant) }}" class="space-y-4">
                    @csrf @method('PATCH')

                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Status</label>
                        <select name="status" class="w-full rounded border-slate-700 bg-slate-900 text-white text-sm px-3 py-2">
                            @foreach(config('hopn.application_statuses') as $key => $label)
                                <option value="{{ $key }}" @selected($applicant->status === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Internal Notes</label>
                        <textarea name="notes" rows="5" class="w-full rounded border-slate-700 bg-slate-900 text-white text-sm px-3 py-2">{{ old('notes', $applicant->notes) }}</textarea>
                    </div>

                    <button type="submit" class="btn-primary w-full text-sm">Save Changes</button>
                </form>
            </div>

            @if(session('status'))
            <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
