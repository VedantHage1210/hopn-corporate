<x-layouts.admin title="Audit Log Detail">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Audit Log #{{ $log->id }}</h1>
        <a href="{{ route('admin.audit-logs.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2">

        {{-- Log Info --}}
        <div class="card-panel p-6">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Log Info</h2>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">ID</span>
                    <span class="text-xs text-white font-mono">#{{ $log->id }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Action</span>
                    @php
                        $colors = [
                            'created' => 'bg-green-900 text-green-200',
                            'updated' => 'bg-yellow-900 text-yellow-200',
                            'deleted' => 'bg-rose-900 text-rose-200',
                        ];
                    @endphp
                    <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $colors[$log->description] ?? 'bg-slate-700 text-slate-300' }}">
                        {{ ucfirst($log->description) }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Module</span>
                    <span class="text-xs text-white">{{ class_basename($log->subject_type ?? '—') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Subject ID</span>
                    <span class="text-xs text-white font-mono">{{ $log->subject_id ?? '—' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Log Name</span>
                    <span class="text-xs text-slate-300">{{ $log->log_name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Time</span>
                    <span class="text-xs text-slate-300">{{ $log->created_at->format('d M Y, H:i:s') }}</span>
                </div>
            </div>
        </div>

        {{-- User Info --}}
        <div class="card-panel p-6">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">User</h2>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Name</span>
                    <span class="text-xs text-white">{{ $log->causer?->name ?? 'System' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">Email</span>
                    <span class="text-xs text-slate-300">{{ $log->causer?->email ?? '—' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-slate-500">User ID</span>
                    <span class="text-xs text-white font-mono">{{ $log->causer_id ?? '—' }}</span>
                </div>
            </div>
        </div>

        {{-- Properties --}}
        @if($log->properties && $log->properties->count() > 0)
        <div class="card-panel p-6 md:col-span-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Changes</h2>
            @if($log->properties->get('old') || $log->properties->get('attributes'))
            <div class="grid gap-4 md:grid-cols-2">
                @if($log->properties->get('old'))
                <div>
                    <p class="text-xs font-semibold text-rose-400 mb-2">Before</p>
                    <pre class="text-xs text-slate-300 bg-slate-900 rounded-lg p-3 overflow-x-auto">{{ json_encode($log->properties->get('old'), JSON_PRETTY_PRINT) }}</pre>
                </div>
                @endif
                @if($log->properties->get('attributes'))
                <div>
                    <p class="text-xs font-semibold text-green-400 mb-2">After</p>
                    <pre class="text-xs text-slate-300 bg-slate-900 rounded-lg p-3 overflow-x-auto">{{ json_encode($log->properties->get('attributes'), JSON_PRETTY_PRINT) }}</pre>
                </div>
                @endif
            </div>
            @else
            <pre class="text-xs text-slate-300 bg-slate-900 rounded-lg p-3 overflow-x-auto">{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</pre>
            @endif
        </div>
        @endif
    </div>
</x-layouts.admin>
