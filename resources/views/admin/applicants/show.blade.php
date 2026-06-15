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
                        <dt class="w-32 text-slate-400">ID</dt>
                        <dd class="text-white font-mono">#{{ $applicant->id }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Name</dt>
                        <dd class="text-white font-medium">{{ $applicant->full_name }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Email</dt>
                        <dd>
                            <a href="mailto:{{ $applicant->email }}" class="text-indigo-300 hover:text-indigo-200">{{ $applicant->email }}</a>
                        </dd>
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
                                @if(str_starts_with($applicant->cv_path, 'http'))
                                   <a href="{{ str_replace('/raw/upload/', '/raw/upload/fl_attachment/', $applicant->cv_path) }}" target="_blank"
                                       class="btn-primary text-xs py-1 px-3">Download CV</a>
                                @else
                                    <span class="text-slate-500 text-xs">CV uploaded locally — not accessible on Railway</span>
                                @endif
                            @else
                                <span class="text-slate-500">Not uploaded</span>
                            @endif
                        </dd>
                    </div>
                    @if($applicant->tracking_token)
                    <div class="flex gap-4">
                        <dt class="w-32 text-slate-400">Tracking ID</dt>
                        <dd class="text-white font-mono text-xs">{{ $applicant->tracking_token }}</dd>
                    </div>
                    @endif
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
        <div class="space-y-4">
            {{-- Reply via Email --}}
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Quick Actions</h2>
                <a href="mailto:{{ $applicant->email }}?subject=Re: Your Application for {{ $applicant->job?->title ?? 'the position' }} at HOPn&body=Dear {{ $applicant->full_name }},%0D%0A%0D%0AThank you for applying for the {{ $applicant->job?->title ?? 'position' }} at HOPn.%0D%0A%0D%0A"
                   style="display:inline-flex; align-items:center; gap:8px; width:100%; justify-content:center; padding:10px 16px; border-radius:8px; background:#10B981; color:white; font-size:14px; font-weight:600; text-decoration:none; margin-bottom:8px;"
                   onmouseover="this.style.opacity='0.85'"
                   onmouseout="this.style.opacity='1'">
                    ✉ Reply via Email
                </a>
                @if($applicant->phone)
                <a href="tel:{{ $applicant->phone }}"
                   style="display:inline-flex; align-items:center; gap:8px; width:100%; justify-content:center; padding:10px 16px; border-radius:8px; border:1px solid rgba(255,255,255,0.1); color:#94A3B8; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.color='white'"
                   onmouseout="this.style.color='#94A3B8'">
                    📞 {{ $applicant->phone }}
                </a>
                @endif
            </div>

            {{-- Update Status --}}
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Update Status</h2>
                <form method="POST" action="{{ route('admin.applicants.update', $applicant) }}" class="space-y-4">
                    @csrf @method('PATCH')
                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Status</label>
                        <select name="status" class="w-full rounded border-slate-700 bg-slate-900 text-white text-sm px-3 py-2">
                            @foreach(config('hopn.application_statuses', ['new' => 'New', 'reviewed' => 'Reviewed', 'interview' => 'Interview', 'offer' => 'Offer', 'rejected' => 'Rejected']) as $key => $label)
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
