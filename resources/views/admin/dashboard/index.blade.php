<x-layouts.admin :title="'Dashboard'">
    <div class="grid gap-4 md:grid-cols-5">
        <div class="card-panel p-4"><p class="text-xs text-slate-400">New Leads</p><p class="mt-1 text-2xl font-bold">{{ $stats['new_leads'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Today Leads</p><p class="mt-1 text-2xl font-bold">{{ $stats['today_leads'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Draft Posts</p><p class="mt-1 text-2xl font-bold">{{ $stats['draft_posts'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Active Jobs</p><p class="mt-1 text-2xl font-bold">{{ $stats['active_jobs'] }}</p></div>
        <a href="{{ route('admin.applicants.index', ['status' => 'new']) }}" class="card-panel p-4 block"><p class="text-xs text-slate-400">New Applicants</p><p class="mt-1 text-2xl font-bold">{{ $stats['new_applicants'] }}</p></a>
    </div>

    <div class="card-panel mt-6 p-4">
        <h2 class="text-lg font-semibold text-white">Recent Leads</h2>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full text-sm text-slate-300">
                <thead class="text-left text-xs uppercase text-slate-400">
                    <tr><th class="px-2 py-2">Name</th><th class="px-2 py-2">Email</th><th class="px-2 py-2">Type</th><th class="px-2 py-2">Status</th></tr>
                </thead>
                <tbody>
                    @foreach($recentLeads as $lead)
                        <tr class="border-t border-slate-800">
                            <td class="px-2 py-2">{{ $lead->name }}</td>
                            <td class="px-2 py-2">{{ $lead->email }}</td>
                            <td class="px-2 py-2">{{ $lead->type }}</td>
                            <td class="px-2 py-2">{{ $lead->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-panel mt-6 p-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Recent Applicants</h2>
            <a href="{{ route('admin.applicants.index') }}" class="text-sm text-indigo-300 hover:text-indigo-200">View all →</a>
        </div>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full text-sm text-slate-300">
                <thead class="text-left text-xs uppercase text-slate-400">
                    <tr><th class="px-2 py-2">Name</th><th class="px-2 py-2">Email</th><th class="px-2 py-2">Applied for</th><th class="px-2 py-2">Status</th><th class="px-2 py-2">CV</th></tr>
                </thead>
                <tbody>
                    @forelse($recentApplicants as $applicant)
                        <tr class="border-t border-slate-800">
                            <td class="px-2 py-2"><a href="{{ route('admin.applicants.show', $applicant) }}" class="text-white hover:text-indigo-300">{{ $applicant->full_name }}</a></td>
                            <td class="px-2 py-2">{{ $applicant->email }}</td>
                            <td class="px-2 py-2">{{ $applicant->is_general ? 'General application' . ($applicant->interest ? ' · ' . $applicant->interest : '') : ($applicant->job?->title ?? '—') }}</td>
                            <td class="px-2 py-2">{{ $applicant->status }}</td>
                            <td class="px-2 py-2">@if($applicant->cv_url)<a href="{{ $applicant->cv_url }}" target="_blank" rel="noopener" class="text-indigo-300 hover:text-indigo-200">Download</a>@else — @endif</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-2 py-4 text-center text-slate-500">No applicants yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
