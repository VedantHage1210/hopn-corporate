@props(['testimonial'])
@php($lang = request()->route('lang', 'en'))
<blockquote class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/60 p-4 shadow-md transition-all duration-300 hover:border-indigo-500/50 hover:bg-slate-800 hover:shadow-lg hover:shadow-indigo-500/20 hover:-translate-y-1 cursor-pointer">
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 opacity-0 transition-all duration-300 group-hover:opacity-100 rounded-t-xl"></div>
    <svg class="mb-2 h-6 w-6 text-indigo-500/40 transition-all duration-300 group-hover:text-indigo-500/60" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>
    <p class="flex-1 text-xs leading-relaxed text-slate-300 italic">
        "{{ $lang === 'de' && $testimonial->quote_de ? $testimonial->quote_de : $testimonial->quote_en }}"
    </p>
    <footer class="mt-3 flex items-center gap-2 border-t border-slate-700/50 pt-3">
        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600/20 border border-indigo-500/30 text-xs font-bold text-indigo-300 transition-all duration-300 group-hover:bg-indigo-600/40">
            {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
        </div>
        <div>
            <p class="text-xs font-semibold text-white">{{ $testimonial->author_name }}</p>
            <p class="text-xs text-slate-400">{{ $testimonial->author_role }} &middot; {{ $testimonial->company }}</p>
        </div>
    </footer>
</blockquote>
