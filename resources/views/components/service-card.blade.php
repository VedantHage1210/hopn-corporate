@props(['service'])
@php($lang = request()->route('lang', 'en'))
<article class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-4 shadow-md transition-all duration-300 hover:border-indigo-500/70 hover:bg-slate-800 hover:-translate-y-1">
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 opacity-0 transition-all duration-300 group-hover:opacity-100 rounded-t-xl"></div>
    <div class="mb-2 flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-500/10 border border-indigo-500/20">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
    </div>
    <h3 class="text-sm font-semibold text-white group-hover:text-indigo-300 transition-colors">{{ $lang === 'de' && $service->name_de ? $service->name_de : $service->name }}</h3>
    <p class="mt-1 flex-1 text-xs leading-relaxed text-slate-400">{{ $lang === 'de' && $service->summary_de ? $service->summary_de : $service->summary }}</p>
    @if(!empty($service->slug))
        <a href="{{ route('services.show', ['lang' => $lang, 'slug' => $service->slug]) }}" class="mt-3 text-xs font-medium text-indigo-400 hover:text-indigo-300">
            {{ $lang === 'de' ? 'Mehr lesen' : 'Read more' }} →
        </a>
    @endif
</article>
