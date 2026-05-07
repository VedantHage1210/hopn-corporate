@props(['service'])
@php($lang = request()->route('lang', 'en'))
<article class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-5 shadow-md transition duration-300 hover:border-indigo-500/50 hover:bg-slate-800 hover:shadow-indigo-500/10 hover:shadow-xl">
    {{-- Top accent line --}}
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 opacity-0 transition duration-300 group-hover:opacity-100 rounded-t-xl"></div>
 
    <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-500/10 border border-indigo-500/20">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
    </div>
 
    <h3 class="text-base font-semibold text-white">{{ $lang === 'de' && $service->name_de ? $service->name_de : $service->name }}</h3>
    <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-400">{{ $lang === 'de' && $service->summary_de ? $service->summary_de : $service->summary }}</p>
 
    @if(!empty($service->slug))
        <a href="{{ route('services.show', ['lang' => $lang, 'slug' => $service->slug]) }}"
           class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-400 transition hover:text-indigo-300">
            {{ $lang === 'de' ? 'Mehr lesen' : 'Read more' }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</article>
