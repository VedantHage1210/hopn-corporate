@props(['testimonial'])
@php($lang = request()->route('lang', 'en'))
<blockquote class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-6 shadow-md transition duration-300 hover:border-indigo-500/30 hover:bg-slate-800 h-full">
    <svg class="mb-3 h-7 w-7 text-indigo-500/40" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>
    <p class="flex-1 text-sm leading-relaxed text-slate-300 italic">
        "{{ $lang === 'de' && $testimonial->quote_de ? $testimonial->quote_de : $testimonial->quote_en }}"
    </p>
    <footer class="mt-4 flex items-center gap-3 border-t border-slate-700/50 pt-4">
        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600/20 border border-indigo-500/30 text-sm font-bold text-indigo-300">
            {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
        </div>
        <div>
            <p class="text-sm font-semibold text-white">{{ $testimonial->author_name }}</p>
            <p class="text-xs text-slate-400">{{ $testimonial->author_role }} &middot; {{ $testimonial->company }}</p>
        </div>
    </footer>
</blockquote>
