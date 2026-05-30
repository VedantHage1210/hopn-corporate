<x-layouts.admin title="Jobs">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Jobs</h1>
        <a href="{{ route('admin.jobs.create') }}" class="btn-primary text-sm">+ New Job</a>
    </div>
    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Title</th>
                    <th class="px-3 py-2">Location</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Department</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Published</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $job)
                <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                    <td class="px-3 py-3 text-slate-400">{{ $job->id }}</td>
                    <td class="px-3 py-3 font-medium text-white">
                        {{ $job->title }}
                        @if($job->seniority)
                            <div class="text-xs text-slate-400">{{ $job->seniority }}</div>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-slate-400">{{ $job->location ?? '—' }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ ucfirst(str_replace('_', ' ', $job->type ?? '—')) }}</td>
                    <td class="px-3 py-3 text-slate-400">{{ $job->department ?? '—' }}</td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $job->is_active ? 'bg-green-900 text-green-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $job->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-3 py-3">
                        <span class="rounded-full px-2 py-0.5 text-xs {{ $job->is_published ? 'bg-indigo-900 text-indigo-200' : 'bg-slate-700 text-slate-400' }}">
                            {{ $job->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 flex gap-3 items-center">
                        <a href="{{ route('admin.jobs.edit', $job) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                        <a href="{{ route('careers.show', ['lang' => 'en', 'slug' => $job->slug]) }}" target="_blank" class="text-slate-400 hover:text-white">View</a>
                        <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this job?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="px-3 py-6 text-center text-slate-500">No jobs found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
</x-layouts.admin>
