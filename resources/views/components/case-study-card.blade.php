@props(['caseStudy'])
@php($lang = request()->route('lang', 'en'))
<article class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-4 shadow-md transition-all duration-300 hover:border-violet-500/70 hover:bg-slate-800 hover:shadow-lg hover:shadow-violet-500/20 hover:-translate-y-1">
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-violet-500 to-indigo-500 opacity-0 transition-all duration-300 group-hover:opacity-100 rounded-t-xl"></div>
    @if(!empty($caseStudy->industry))
        <span class="mb-2 inline-flex w-fit items-center rounded-full bg-violet-500/10 border border-violet-500/20 px-2 py-0.5 text-xs font-medium text-violet-300">
            {{ $caseStudy->industry }}
        </span>
    @endif
    <h3 class="text-sm font-semibold text-white leading-snug group-hover:text-violet-300 transition-colors">{{ $lang === 'de' && $caseStudy->title_de ? $caseStudy->title_de : $caseStudy->title }}</h3>
    <p class="mt-1 flex-1 text-xs leading-relaxed text-slate-400 line-clamp-2">{{ $lang === 'de' && $caseStudy->challenge_de ? $caseStudy->challenge_de : ($caseStudy->challenge ?? '') }}</p>
    @if(!empty($caseStudy->slug))
        <a href="{{ route('case-studies.show', ['lang' => $lang, 'slug' => $caseStudy->slug]) }}" class="mt-3 text-xs font-medium text-violet-400 hover:text-violet-300">
            {{ $lang === 'de' ? 'Fallstudie lesen' : 'Read case study' }} →
        </a>
    @endif
</article>
