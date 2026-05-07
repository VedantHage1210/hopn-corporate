@props(['caseStudy'])
@php($lang = request()->route('lang', 'en'))
<article class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-5 shadow-md transition duration-300 hover:border-violet-500/50 hover:bg-slate-800 hover:shadow-violet-500/10 hover:shadow-xl h-full">
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-violet-500 to-indigo-500 opacity-0 transition duration-300 group-hover:opacity-100 rounded-t-xl"></div>
    @if(!empty($caseStudy->industry))
        <span class="mb-3 inline-flex w-fit items-center rounded-full bg-violet-500/10 border border-violet-500/20 px-2.5 py-0.5 text-xs font-medium text-violet-300">
            {{ $caseStudy->industry }}
        </span>
    @endif
    <h3 class="text-base font-semibold text-white leading-snug">{{ $lang === 'de' && $caseStudy->title_de ? $caseStudy->title_de : $caseStudy->title }}</h3>
    <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-400 line-clamp-3">{{ $lang === 'de' && $caseStudy->challenge_de ? $caseStudy->challenge_de : ($caseStudy->challenge ?? '') }}</p>
    @if(!empty($caseStudy->slug))
        <a href="{{ route('case-studies.show', ['lang' => $lang, 'slug' => $caseStudy->slug]) }}"
           class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-violet-400 transition hover:text-violet-300">
            {{ $lang === 'de' ? 'Fallstudie lesen' : 'Read case study' }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</article>
