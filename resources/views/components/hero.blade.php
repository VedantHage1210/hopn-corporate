@props(['title' => 'Enterprise Solutions', 'subtitle' => null, 'cta' => null, 'ctaUrl' => null])
<section class="container-shell">
    <div class="relative overflow-hidden rounded-2xl border border-slate-700/50 bg-gradient-to-br from-slate-800 via-slate-900 to-indigo-950 p-8 md:p-16 shadow-2xl">
        {{-- Background glow --}}
        <div class="pointer-events-none absolute -top-24 -right-24 h-96 w-96 rounded-full bg-indigo-600/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-violet-600/10 blur-3xl"></div>
 
        <div class="relative z-10">
            <span class="inline-flex items-center gap-2 rounded-full border border-indigo-500/30 bg-indigo-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-indigo-300">
                HOPn Corporate
            </span>
            <h1 class="mt-4 text-3xl font-extrabold leading-tight text-white sm:text-4xl md:text-5xl lg:text-6xl">
                {{ $title }}
            </h1>
            @if($subtitle)
                <p class="mt-4 max-w-2xl text-base text-slate-300 md:text-lg">{{ $subtitle }}</p>
            @endif
            @if($cta && $ctaUrl)
                <a href="{{ $ctaUrl }}"
                   class="mt-8 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:bg-indigo-500 hover:shadow-indigo-500/40 active:scale-95">
                    {{ $cta }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            @endif
        </div>
    </div>
</section>
