@php($lang = request()->route('lang', app()->getLocale()))
<header x-data="{ open: false }" class="sticky top-0 z-50">

    {{-- Glass background --}}
    <div class="absolute inset-0 border-b border-white/5 bg-hopn-primary/80 backdrop-blur-xl"></div>

    <div class="relative container-shell flex h-14 items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home', ['lang' => $lang]) }}" class="flex items-center gap-2 group">
            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-hopn-accent text-xs font-black text-white shadow-lg transition group-hover:opacity-80">H</span>
            <span class="text-base font-bold tracking-tight text-white">HOPn</span>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden gap-1 text-sm md:flex">
            @foreach([
                ['route' => 'services.index', 'en' => 'Services',  'de' => 'Leistungen'],
                ['route' => 'programs.index', 'en' => 'Programs',  'de' => 'Programme'],
                ['route' => 'products.index', 'en' => 'Products',  'de' => 'Produkte'],
                ['route' => 'insights.index', 'en' => 'Insights',  'de' => 'Einblicke'],
                ['route' => 'training.index', 'en' => 'Training',  'de' => 'Training'],
                ['route' => 'partners.index', 'en' => 'Partners',  'de' => 'Partner'],
                ['route' => 'careers.index',  'en' => 'Careers',   'de' => 'Karriere'],
            ] as $item)
                <a href="{{ route($item['route'], ['lang' => $lang]) }}"
                   class="rounded-md px-3 py-1.5 text-hopn-muted transition hover:bg-white/5 hover:text-white">
                    {{ $lang === 'de' ? $item['de'] : $item['en'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right Side --}}
        <div class="flex items-center gap-3">

            {{-- Language Switcher Desktop --}}
            <div class="hidden items-center rounded-lg border border-white/10 bg-white/5 p-0.5 text-xs font-medium md:flex">
                <a href="{{ preg_replace('#^/(en|de)#', '/en', request()->getPathInfo()) }}"
                   class="rounded-md px-2.5 py-1 transition {{ $lang === 'en' ? 'bg-hopn-accent text-white' : 'text-hopn-muted hover:text-white' }}">EN</a>
                <a href="{{ preg_replace('#^/(en|de)#', '/de', request()->getPathInfo()) }}"
                   class="rounded-md px-2.5 py-1 transition {{ $lang === 'de' ? 'bg-hopn-accent text-white' : 'text-hopn-muted hover:text-white' }}">DE</a>
            </div>

            {{-- Contact CTA Button --}}
            <a href="{{ route('contact.index', ['lang' => $lang]) }}"
               class="hidden rounded-lg bg-hopn-accent px-4 py-1.5 text-sm font-semibold text-white transition hover:opacity-90 md:block">
                {{ $lang === 'de' ? 'Kontakt' : 'Contact' }}
            </a>

            {{-- Mobile Hamburger --}}
            <button @click="open = !open"
                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-white/10 bg-white/5 text-hopn-muted transition hover:bg-white/10 hover:text-white md:hidden"
                    aria-label="Toggle menu">
                <svg x-show="!open" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         class="relative border-t border-white/5 bg-hopn-primary/95 backdrop-blur-xl"
         style="display:none">
        <nav class="container-shell flex flex-col px-4 py-3 gap-1 text-sm">
            @foreach([
                ['route' => 'services.index', 'en' => 'Services',  'de' => 'Leistungen'],
                ['route' => 'programs.index', 'en' => 'Programs',  'de' => 'Programme'],
                ['route' => 'products.index', 'en' => 'Products',  'de' => 'Produkte'],
                ['route' => 'insights.index', 'en' => 'Insights',  'de' => 'Einblicke'],
                ['route' => 'training.index', 'en' => 'Training',  'de' => 'Training'],
                ['route' => 'partners.index', 'en' => 'Partners',  'de' => 'Partner'],
                ['route' => 'careers.index',  'en' => 'Careers',   'de' => 'Karriere'],
                ['route' => 'contact.index',  'en' => 'Contact',   'de' => 'Kontakt'],
            ] as $item)
                <a href="{{ route($item['route'], ['lang' => $lang]) }}"
                   class="rounded-lg px-3 py-2.5 text-hopn-muted transition hover:bg-white/5 hover:text-white">
                    {{ $lang === 'de' ? $item['de'] : $item['en'] }}
                </a>
            @endforeach

            {{-- Mobile Language Switcher --}}
            <div class="mt-2 flex items-center gap-2 border-t border-white/5 pt-3">
                <span class="text-xs text-hopn-muted">Language:</span>
                <a href="{{ preg_replace('#^/(en|de)#', '/en', request()->getPathInfo()) }}"
                   class="rounded-md px-3 py-1 text-xs font-medium transition {{ $lang === 'en' ? 'bg-hopn-accent text-white' : 'text-hopn-muted hover:text-white' }}">EN</a>
                <a href="{{ preg_replace('#^/(en|de)#', '/de', request()->getPathInfo()) }}"
                   class="rounded-md px-3 py-1 text-xs font-medium transition {{ $lang === 'de' ? 'bg-hopn-accent text-white' : 'text-hopn-muted hover:text-white' }}">DE</a>
            </div>
        </nav>
    </div>
</header>
