@props(['caseStudy'])
@php($lang = request()->route('lang', 'en'))
<article class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-4 shadow-md transition-all duration-300 hover:border-violet-500/70 hover:bg-slate-800 hover:shadow-lg hover:shadow-violet-500/20 hover:-translate-y-1 cursor-pointer">
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-violet-500 to-indigo-500 opacity-0 transition-all duration-300 group-hover:opacity-100 rounded-t-xl"></div>
    @if(!empty($caseStudy->industry))
        <span class="mb-2 inline-flex w-fit items-center rounded-full bg-violet-500/10 border border-violet-500/20 px-2 py-0.5 text-xs font-medium text-violet-300 transition-all duration-300 group-hover:bg-violet-500/20">
            {{ $caseStudy->industry }}
        </span>
    @endif
    <h3 class="text-sm font-semibold text-white leading-snug transition-colors duration-300 group-hover:text-violet-300">{{ $lang === 'de' && $caseStudy->title_de ? $caseStudy->title_de : $caseStudy->title }}</h3>
    <p class="mt-1 flex-1 text-xs leading-relaxed text-slate-400 line-clamp-3">{{ $lang === 'de' && $caseStudy->challenge_de ? $caseStudy->challenge_de : ($caseStudy->challenge ?? '') }}</p>
    @if(!empty($caseStudy->slug))
        <a href="{{ route('case-studies.show', ['lang' => $lang, 'slug' => $caseStudy->slug]) }}"
           class="mt-3 inline-flex items-center gap-1 text-xs font-medium text-violet-400 transition-all duration-300 hover:text-violet-300 group-hover:gap-2">
            {{ $lang === 'de' ? 'Fallstudie lesen' : 'Read case study' }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</article>
