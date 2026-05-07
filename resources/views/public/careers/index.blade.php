<x-layouts.public :title="'Careers'">
@php($lang = request()->route('lang', 'en'))
    <x-hero :title="$lang === 'de' ? 'Karriere' : 'Careers'" :subtitle="$lang === 'de' ? 'Offene Stellen bei HOPn.' : 'Open positions at HOPn.'" />
    <section class="container-shell mt-8 space-y-3">
        @forelse($jobs as $job)
            <div class="group relative flex items-center justify-between rounded-xl border border-slate-700/50 bg-slate-800/60 p-4 transition-all duration-300 hover:border-indigo-500/50 hover:bg-slate-800 hover:shadow-lg hover:shadow-indigo-500/10 hover:-translate-y-0.5">
                <div class="flex-1 pr-4">
                    <h3 class="text-sm font-semibold text-white group-hover:text-indigo-300 transition-colors">{{ $job->title }}</h3>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $job->location }} · {{ ucfirst($job->type) }}</p>
                </div>
                <a href="{{ route('careers.show', ['lang' => $lang, 'slug' => $job->slug]) }}"
                   style="display:inline-flex;align-items:center;padding:8px 16px;background:#4f46e5;color:white;border-radius:8px;font-size:12px;font-weight:600;white-space:nowrap;text-decoration:none;transition:background 0.2s;"
                   onmouseover="this.style.background='#4338ca'"
                   onmouseout="this.style.background='#4f46e5'">
                    {{ $lang === 'de' ? 'Mehr erfahren' : 'Learn More' }}
                </a>
            </div>
        @empty
            <p class="text-center text-slate-400">{{ $lang === 'de' ? 'Derzeit keine offenen Stellen.' : 'No open positions at this time.' }}</p>
        @endforelse
    </section>
    <section class="container-shell">
        <x-pagination :paginator="$jobs" />
    </section>
</x-layouts.public>
