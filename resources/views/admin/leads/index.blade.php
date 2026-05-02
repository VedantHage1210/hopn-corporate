<x-layouts.admin title="Leads / CRM">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-xl font-semibold text-white">Leads &amp; Inquiries</h1>
        <a href="{{ route('admin.leads.export', request()->query()) }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">
            ↓ Export CSV
        </a>
    </div>

    @if(session('status'))
        <div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif

    {{-- Filters --}}
    <form method="GET" class="mb-6 flex flex-wrap gap-3 items-end">
        <div>
            <label class="mb-1 block text-xs text-slate-400">Type</label>
            <select name="type" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                <option value="">All Types</option>
                <option value="contact" @selected(request('type') === 'contact')>Contact</option>
                <option value="proposal" @selected(request('type') === 'proposal')>Proposal</option>
                <option value="partner-inquiry" @selected(request('type') === 'partner-inquiry')>Partner Inquiry</option>
                <option value="training-application" @selected(request('type') === 'training-application')>Training</option>
            </select>
        </div>
        <div>
            <label class="mb-1 block text-xs text-slate-400">Status</label>
            <select name="status" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                <option value="">All Statuses</option>
                @foreach(config('hopn.lead_statuses') as $key => $label)
                    <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="mb-1 block text-xs text-slate-400">From</label>
            <input type="date" name="from" value="{{ request('from') }}" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        </div>
        <div>
            <label class="mb-1 block text-xs text-slate-400">To</label>
            <input type="date" name="to" value="{{ request('to') }}" class="rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        </div>
        <button type="submit" class="btn-primary text-sm h-[38px]">Filter</button>
        <a href="{{ route('admin.leads.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white h-[38px] flex items-center">Reset</a>
    </form>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400">
                <tr>
                    <th class="px-3 py-2">Contact</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Company</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Received</th>
                    <th class="px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    @php
                        $statusColors = [
                            'new'         => 'bg-blue-900 text-blue-200',
                            'contacted'   => 'bg-yellow-900 text-yellow-200',
                            'qualified'   => 'bg-cyan-900 text-cyan-200',
                            'in-progress' => 'bg-purple-900 text-purple-200',
                            'won'         => 'bg-green-900 text-green-200',
                            'lost'        => 'bg-slate-700 text-slate-400',
                            'spam'        => 'bg-rose-900 text-rose-200',
                        ];
                    @endphp
                    <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                        <td class="px-3 py-3">
                            <div class="font-medium text-white">{{ $lead->name }}</div>
                            <div class="text-xs text-slate-400">{{ $lead->email }}</div>
                            @if($lead->phone)
                                <div class="text-xs text-slate-500">{{ $lead->phone }}</div>
                            @endif
                        </td>
                        <td class="px-3 py-3">
                            <span class="rounded bg-slate-800 px-2 py-0.5 text-xs capitalize">{{ str_replace('-', ' ', $lead->type) }}</span>
                        </td>
                        <td class="px-3 py-3 text-slate-400">{{ $lead->company ?? '—' }}</td>
                        <td class="px-3 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs font-semibold {{ $statusColors[$lead->status] ?? 'bg-slate-700 text-slate-300' }}">
                                {{ ucfirst(str_replace('-', ' ', $lead->status)) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-slate-400 text-xs">{{ $lead->created_at->format('d M Y') }}</td>
                        <td class="px-3 py-3">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-indigo-300 hover:text-indigo-200">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-3 py-6 text-center text-slate-500">No leads found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $leads->links() }}</div>
    </div>
</x-layouts.admin>
