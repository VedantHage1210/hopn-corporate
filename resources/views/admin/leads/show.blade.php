<x-layouts.admin title="Lead Details">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Lead: {{ $lead->name }}</h1>
        <a href="{{ route('admin.leads.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Leads</a>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Lead details --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">Submission Details</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Form Type</dt>
                        <dd><span class="rounded bg-slate-800 px-2 py-0.5 text-xs capitalize">{{ str_replace('-', ' ', $lead->type) }}</span></dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Name</dt>
                        <dd class="text-white font-medium">{{ $lead->name }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Email</dt>
                        <dd><a href="mailto:{{ $lead->email }}" class="text-indigo-300 hover:text-indigo-200">{{ $lead->email }}</a></dd>
                    </div>
                    @if($lead->phone)
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Phone</dt>
                        <dd class="text-white">{{ $lead->phone }}</dd>
                    </div>
                    @endif
                    @if($lead->company)
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Company</dt>
                        <dd class="text-white">{{ $lead->company }}</dd>
                    </div>
                    @endif
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Received</dt>
                        <dd class="text-white">{{ $lead->created_at->format('d M Y, H:i') }}</dd>
                    </div>
                </dl>
            </div>

            @if($lead->message)
            <div class="card-panel p-6">
                <h2 class="mb-3 text-sm font-semibold uppercase tracking-wider text-slate-400">Message</h2>
                <p class="whitespace-pre-line text-sm leading-relaxed text-slate-300">{{ $lead->message }}</p>
            </div>
            @endif

            <div class="card-panel p-6">
                <h2 class="mb-3 text-sm font-semibold uppercase tracking-wider text-slate-400">Tracking</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">Source URL</dt>
                        <dd class="text-slate-300 font-mono text-xs truncate">{{ $lead->source_url ?? '—' }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">UTM Source</dt>
                        <dd class="text-slate-300">{{ $lead->utm_source ?? '—' }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">UTM Medium</dt>
                        <dd class="text-slate-300">{{ $lead->utm_medium ?? '—' }}</dd>
                    </div>
                    <div class="flex gap-4">
                        <dt class="w-36 shrink-0 text-slate-400">UTM Campaign</dt>
                        <dd class="text-slate-300">{{ $lead->utm_campaign ?? '—' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="card-panel p-6">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-400">CRM Actions</h2>
                <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="space-y-4">
                    @csrf @method('PUT')

                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Status</label>
                        <select name="status" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                            @foreach(config('hopn.lead_statuses') as $key => $label)
                                <option value="{{ $key }}" @selected($lead->status === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Assign To</label>
                        <select name="assigned_to" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                            <option value="">— Unassigned —</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected($lead->assigned_to == $user->id)>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium text-slate-300">Notes</label>
                        <textarea name="notes" rows="5" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('notes', $lead->notes) }}</textarea>
                    </div>

                    <button type="submit" class="btn-primary w-full text-sm">Save Changes</button>
                </form>

                @if(session('status'))
                    <div class="mt-3 rounded bg-green-900/40 border border-green-700 px-3 py-2 text-xs text-green-300">{{ session('status') }}</div>
                @endif
            </div>

            <div class="card-panel p-4 text-center">
                <a href="mailto:{{ $lead->email }}" class="block w-full rounded bg-indigo-700 hover:bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition">
                    Reply via Email →
                </a>
            </div>
        </div>
    </div>
</x-layouts.admin>
