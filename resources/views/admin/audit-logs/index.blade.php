<x-layouts.admin title="Audit Logs">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-white">Audit Logs</h1>
        <p class="mt-1 text-sm text-slate-400">Track all changes made in the admin panel.</p>
    </div>

    {{-- Filters --}}
    <form method="GET" class="mb-6 flex flex-wrap gap-3">
        <input type="text" name="causer_id" value="{{ request('causer_id') }}"
            placeholder="Filter by User ID..."
            class="rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white w-48">
        <select name="log_name" class="rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
            <option value="">All Modules</option>
            @foreach(['Partner', 'Job', 'TeamMember', 'Testimonial', 'BlogPost', 'Event', 'Product', 'Program', 'Service', 'User'] as $module)
                <option value="{{ $module }}" {{ request('log_name') === $module ? 'selected' : '' }}>{{ $module }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary text-sm">Filter</button>
        <a href="{{ route('admin.audit-logs.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Reset</a>
    </form>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">When</th>
                    <th class="px-3 py-2">User</th>
                    <th class="px-3 py-2">Action</th>
                    <th class="px-3 py-2">Module</th>
                    <th class="px-3 py-2">Description</th>
                    <th class="px-3 py-2">Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                @php
                    $colors = [
                        'created' => 'bg-green-900 text-green-200',
                        'updated' => 'bg-yellow-900 text-yellow-200',
                        'deleted' => 'bg-rose-900 text-rose-200',
                    ];
                @endphp
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ $log->id }}</td>
                    <td class="px-3 py-3 text-xs text-slate-400">
                        {{ $log->created_at->format('d M Y H:i') }}
                        <div class="text-slate-600">{{ $log->created_at->diffForHumans() }}</div>
                    </td>
                    <td class="px-3 py-3">
                        <span class="text-white text-xs font-medium">{{ $log->causer?->name ?? 'System' }}</span>
                        <div class="text-xs text-slate-500">{{ $log->causer?->email }}</div>
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $colors[$log->description] ?? 'bg-slate-700 text-slate-300' }}">
                            {{ ucfirst($log->description) }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ class_basename($log->subject_type ?? '') }}</td>
                    <td class="px-3 py-3 text-slate-400 text-xs">{{ Str::limit($log->log_name, 40) }}</td>
                    <td class="px-3 py-3">
                        <a href="{{ route('admin.audit-logs.show', $log) }}" class="text-indigo-300 hover:text-indigo-200 text-xs">View</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-3 py-8 text-center text-slate-500">No activity logs found yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $logs->links() }}</div>
    </div>
</x-layouts.admin>
