<x-layouts.admin :title="'Dashboard'">
    <div class="grid gap-4 md:grid-cols-4">
        <div class="card-panel p-4"><p class="text-xs text-slate-400">New Leads</p><p class="mt-1 text-2xl font-bold">{{ $stats['new_leads'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Today Leads</p><p class="mt-1 text-2xl font-bold">{{ $stats['today_leads'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Draft Posts</p><p class="mt-1 text-2xl font-bold">{{ $stats['draft_posts'] }}</p></div>
        <div class="card-panel p-4"><p class="text-xs text-slate-400">Active Jobs</p><p class="mt-1 text-2xl font-bold">{{ $stats['active_jobs'] }}</p></div>
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
</x-layouts.admin>
