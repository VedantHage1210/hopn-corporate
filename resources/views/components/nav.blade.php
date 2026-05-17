@php($lang = request()->route('lang', app()->getLocale()))
<header x-data="{ open: false }" class="sticky top-0 z-50"
        style="background: rgba(10,15,30,0.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,0.05);">

    <div class="container-shell flex items-center justify-between" style="height:56px;">

        {{-- Logo --}}
        <a href="{{ route('home', ['lang' => $lang]) }}"
           class="flex items-center"
           style="gap:8px; text-decoration:none;">
            <span style="display:flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:8px; background:#4F6EF7; color:white; font-size:12px; font-weight:900;">H</span>
            <span style="font-size:16px; font-weight:700; color:white; letter-spacing:-0.3px;">HOPn</span>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex" style="gap:4px;">
            @foreach([
                ['route' => 'services.index', 'en' => 'Services',  'de' => 'Leistungen', 'ar' => 'الخدمات'],
            ['route' => 'about', 'en' => 'About', 'de' => 'Über uns', 'ar' => 'من نحن'],
                ['route' => 'industries.index', 'en' => 'Industries', 'de' => 'Branchen', 'ar' => 'القطاعات'],
                ['route' => 'startups.index', 'en' => 'Startups',  'de' => 'Startups',   'ar' => 'الشركات الناشئة'],
                ['route' => 'investors.index', 'en' => 'Investors', 'de' => 'Investoren', 'ar' => 'المستثمرون'], 
                ['route' => 'events.index', 'en' => 'Events', 'de' => 'Events', 'ar' => 'الفعاليات'],
            ['route' => 'innovation.index', 'en' => 'Innovation', 'de' => 'Innovation', 'ar' => 'الابتكار'],
                ['route' => 'programs.index', 'en' => 'Programs',  'de' => 'Programme',  'ar' => 'البرامج'],
                ['route' => 'products.index', 'en' => 'Products',  'de' => 'Produkte',   'ar' => 'المنتجات'],
                ['route' => 'insights.index', 'en' => 'Insights',  'de' => 'Einblicke',  'ar' => 'رؤى'],
                ['route' => 'training.index', 'en' => 'Training',  'de' => 'Training',   'ar' => 'تدريب'],
                ['route' => 'partners.index', 'en' => 'Partners',  'de' => 'Partner',    'ar' => 'الشركاء'],
                ['route' => 'careers.index',  'en' => 'Careers',   'de' => 'Karriere',   'ar' => 'وظائف'],
            ] as $item)
                <a href="{{ route($item['route'], ['lang' => $lang]) }}"
                   style="padding:6px 12px; border-radius:6px; color:#94A3B8; font-size:14px; text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.color='white'; this.style.background='rgba(255,255,255,0.05)'"
                   onmouseout="this.style.color='#94A3B8'; this.style.background='transparent'">
                    {{ $item[$lang] ?? $item['en'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right Side --}}
        <div class="flex items-center" style="gap:12px;">

            {{-- Language Switcher --}}
            <div class="hidden md:flex items-center"
                 style="border:1px solid rgba(255,255,255,0.1); border-radius:8px; padding:2px; background:rgba(255,255,255,0.05);">
                @foreach(['en' => 'EN', 'de' => 'DE', 'ar' => 'AR'] as $code => $label)
                <a href="{{ preg_replace('#^/(en|de|ar)#', '/'.$code, request()->getPathInfo()) }}"
                   style="padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600; text-decoration:none; transition:all 0.2s;
                   {{ $lang === $code ? 'background:#4F6EF7; color:white;' : 'color:#94A3B8;' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>

            {{-- Contact CTA --}}
         href="{{ route('contact.index', ['lang' => $lang]) }}"
               class="hidden md:block"
               style="padding:6px 16px; border-radius:8px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;"
               onmouseover="this.style.opacity='0.85'"
               onmouseout="this.style.opacity='1'">
                {{ $lang === 'de' ? 'Kontakt' : ($lang === 'ar' ? 'اتصل بنا' : 'Contact') }}
            </a>

            {{-- Mobile Button --}}
            <button @click="open = !open"
                    class="md:hidden"
                    style="display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; border:1px solid rgba(255,255,255,0.1); background:rgba(255,255,255,0.05); color:#94A3B8; cursor:pointer;"
                    aria-label="Toggle menu">
                <svg x-show="!open" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" style="width:16px;height:16px;display:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none; border-top:1px solid rgba(255,255,255,0.05); background:rgba(10,15,30,0.98); backdrop-filter:blur(20px);">
        <nav class="container-shell" style="display:flex; flex-direction:column; padding:12px 16px; gap:4px;">
            @foreach([
                ['route' => 'services.index', 'en' => 'Services',  'de' => 'Leistungen', 'ar' => 'الخدمات'],
                ['route' => 'about', 'en' => 'About', 'de' => 'Über uns', 'ar' => 'من نحن'],
                ['route' => 'industries.index', 'en' => 'Industries', 'de' => 'Branchen', 'ar' => 'القطاعات'],
                ['route' => 'startups.index', 'en' => 'Startups',  'de' => 'Startups',   'ar' => 'الشركات الناشئة'],
                ['route' => 'investors.index', 'en' => 'Investors', 'de' => 'Investoren', 'ar' => 'المستثمرون'],
                ['route' => 'events.index', 'en' => 'Events', 'de' => 'Events', 'ar' => 'الفعاليات'],
            ['route' => 'innovation.index', 'en' => 'Innovation', 'de' => 'Innovation', 'ar' => 'الابتكار'],
                ['route' => 'programs.index', 'en' => 'Programs',  'de' => 'Programme',  'ar' => 'البرامج'],
                ['route' => 'products.index', 'en' => 'Products',  'de' => 'Produkte',   'ar' => 'المنتجات'],
                ['route' => 'insights.index', 'en' => 'Insights',  'de' => 'Einblicke',  'ar' => 'رؤى'],
                ['route' => 'training.index', 'en' => 'Training',  'de' => 'Training',   'ar' => 'تدريب'],
                ['route' => 'partners.index', 'en' => 'Partners',  'de' => 'Partner',    'ar' => 'الشركاء'],
                ['route' => 'careers.index',  'en' => 'Careers',   'de' => 'Karriere',   'ar' => 'وظائف'],
                ['route' => 'contact.index',  'en' => 'Contact',   'de' => 'Kontakt',    'ar' => 'اتصل بنا'],
            ] as $item)
                <a href="{{ route($item['route'], ['lang' => $lang]) }}"
                   style="padding:10px 12px; border-radius:8px; color:#94A3B8; font-size:14px; text-decoration:none;"
                   onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'"
                   onmouseout="this.style.background='transparent'; this.style.color='#94A3B8'">
                    {{ $item[$lang] ?? $item['en'] }}
                </a>
            @endforeach

            {{-- Mobile Language Switcher --}}
            <div style="display:flex; align-items:center; gap:8px; margin-top:8px; padding-top:12px; border-top:1px solid rgba(255,255,255,0.05);">
                <span style="font-size:12px; color:#94A3B8;">Language:</span>
                @foreach(['en' => 'EN', 'de' => 'DE', 'ar' => 'AR'] as $code => $label)
                <a href="{{ preg_replace('#^/(en|de|ar)#', '/'.$code, request()->getPathInfo()) }}"
                   style="padding:4px 12px; border-radius:6px; font-size:12px; font-weight:600; text-decoration:none;
                   {{ $lang === $code ? 'background:#4F6EF7; color:white;' : 'color:#94A3B8;' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </nav>
    </div>
</header>
