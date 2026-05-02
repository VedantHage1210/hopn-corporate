<x-layouts.admin title="Job Applicants">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Job Applicants</h1>
    </div>

    {{-- Filters --}}
    <form method="GET" class="mb-6 flex flex-wrap gap-3">
        <select name="status" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            <option value="">All Statuses</option>
            @foreach(config('hopn.application_statuses') as $key => $label)
                <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary text-sm">Filter</button>
        <a href="{{ route('admin.applicants.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Reset</a>
    </form>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Applicant</th>
                    <th class="px-3 py-2">Position</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Applied</th>
                    <th class="px-3 py-2">CV</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applicants as $applicant)
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            <div class="font-medium text-white">{{ $applicant->full_name }}</div>
                            <div class="text-xs text-slate-400">{{ $applicant->email }}</div>
                        </td>
                        <td class="px-3 py-3">{{ $applicant->job?->title ?? '—' }}</td>
                        <td class="px-3 py-3">
                            @php
                                $colors = [
                                    'new'       => 'bg-blue-900 text-blue-200',
                                    'reviewed'  => 'bg-yellow-900 text-yellow-200',
                                    'interview' => 'bg-purple-900 text-purple-200',
                                    'offer'     => 'bg-green-900 text-green-200',
                                    'rejected'  => 'bg-rose-900 text-rose-200',
                                ];
                            @endphp
                            <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $colors[$applicant->status] ?? 'bg-slate-700 text-slate-200' }}">
                                {{ ucfirst($applicant->status) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-slate-400">{{ $applicant->created_at->format('d M Y') }}</td>
                        <td class="px-3 py-3">
                            @if($applicant->cv_path)
                                <a href="{{ Storage::url($applicant->cv_path) }}" target="_blank" class="text-indigo-300 hover:text-indigo-200 text-xs">Download CV</a>
                            @else
                                <span class="text-slate-500">—</span>
                            @endif
                        </td>
                        <td class="px-3 py-3">
                            <a href="{{ route('admin.applicants.show', $applicant) }}" class="text-indigo-300 hover:text-indigo-200">Review</a>
                            <form method="POST" action="{{ route('admin.applicants.destroy', $applicant) }}" class="inline-block ml-3">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this applicant?')" class="text-rose-300 hover:text-rose-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No applicants found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $applicants->links() }}</div>
    </div>
</x-layouts.admin>
