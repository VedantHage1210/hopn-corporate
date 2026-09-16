<x-layouts.admin :title="'Availability — '.$expert->name">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">Availability — {{ $expert->name }}</h1>
        <a href="{{ route('admin.experts.index') }}" class="text-sm text-slate-400 hover:text-white">← Back to Experts</a>
    </div>
    @if(session('status'))<div class="mb-4 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>@endif

    <form method="POST" action="{{ route('admin.experts.availability.store', $expert) }}" class="card-panel p-6 mb-6 grid gap-4 md:grid-cols-4">
        @csrf
        <div>
            <label class="mb-1 block text-sm text-slate-200">Weekday</label>
            <select name="weekday" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @foreach(\App\Models\ExpertAvailability::WEEKDAYS as $num => $label)<option value="{{ $num }}">{{ $label }}</option>@endforeach
            </select>
        </div>
        <div><label class="mb-1 block text-sm text-slate-200">Start time</label><input type="time" name="start_time" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
        <div><label class="mb-1 block text-sm text-slate-200">End time</label><input type="time" name="end_time" required class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white"></div>
        <div class="flex items-end"><button type="submit" class="btn-primary text-sm">+ Add slot</button></div>
    </form>

    <div class="card-panel overflow-x-auto p-4">
        <table class="min-w-full text-sm text-slate-300">
            <thead class="text-left text-xs uppercase text-slate-400"><tr><th class="px-3 py-2">Weekday</th><th class="px-3 py-2">Time</th><th class="px-3 py-2">Actions</th></tr></thead>
            <tbody>
                @forelse($slots as $slot)
                <tr class="border-t border-slate-800">
                    <td class="px-3 py-3">{{ \App\Models\ExpertAvailability::WEEKDAYS[$slot->weekday] }}</td>
                    <td class="px-3 py-3">{{ \Illuminate\Support\Carbon::parse($slot->start_time)->format('H:i') }}–{{ \Illuminate\Support\Carbon::parse($slot->end_time)->format('H:i') }}</td>
                    <td class="px-3 py-3">
                        <form method="POST" action="{{ route('admin.experts.availability.destroy', [$expert, $slot]) }}">@csrf @method('DELETE')<button type="submit" onclick="return confirm('Remove?')" class="text-rose-300 hover:text-rose-200">Remove</button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="px-3 py-6 text-center text-slate-500">No slots added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
