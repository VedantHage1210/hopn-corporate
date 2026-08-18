@php
    $lang = request()->route('lang', app()->getLocale());
    $activeLang = $lang;

    $groups = [
        [
            'label_en'=>'Solutions', 'label_de'=>'Lösungen', 'label_ar'=>'الحلول',
            'items'=>[
                ['en'=>'Services Overview',        'de'=>'Leistungsübersicht',      'ar'=>'نظرة عامة على الخدمات',   'route'=>'services.index'],
                ['en'=>'AI Solutions',             'de'=>'KI-Lösungen',             'ar'=>'حلول الذكاء الاصطناعي',   'route'=>'services.index', 'params'=>['category'=>'ai-solutions']],
                ['en'=>'Digital Twins',            'de'=>'Digitale Zwillinge',       'ar'=>'التوائم الرقمية',          'route'=>'services.index', 'params'=>['category'=>'digital-twin-solutions']],
                ['en'=>'Tech Consulting',          'de'=>'Tech-Beratung',            'ar'=>'الاستشارات التقنية',       'route'=>'services.index', 'params'=>['category'=>'tech-consulting']],
                ['en'=>'Workshops & Training',     'de'=>'Workshops & Training',     'ar'=>'ورش العمل',               'route'=>'programs.index'],
            ],
        ],
        [
            'label_en'=>'Products', 'label_de'=>'Produkte', 'label_ar'=>'المنتجات',
            'items'=>[
                ['en'=>'All Products',  'de'=>'Alle Produkte',  'ar'=>'جميع المنتجات', 'route'=>'products.index'],
                ['en'=>'Catalog',       'de'=>'Katalog',        'ar'=>'الكتالوج',      'route'=>'catalog.index'],
                ['en'=>'Innovation',    'de'=>'Innovation',     'ar'=>'الابتكار',      'route'=>'innovation.index'],
            ],
        ],
        [
            'label_en'=>'Ecosystem', 'label_de'=>'Ökosystem', 'label_ar'=>'النظام البيئي',
            'items'=>[
                ['en'=>'Industries',        'de'=>'Branchen',           'ar'=>'القطاعات',          'route'=>'industries.index'],
                ['en'=>'Startups',          'de'=>'Startups',           'ar'=>'الشركات الناشئة',   'route'=>'startups.index'],
                ['en'=>'Investors & Funds', 'de'=>'Investoren & Fonds', 'ar'=>'المستثمرون',        'route'=>'investors.index'],
                ['en'=>'Programs',          'de'=>'Programme',          'ar'=>'البرامج',            'route'=>'programs.index'],
                ['en'=>'Events',            'de'=>'Events',             'ar'=>'الفعاليات',         'route'=>'events.index'],
                ['en'=>'Partners',          'de'=>'Partner',            'ar'=>'الشركاء',           'route'=>'partners.index'],
            ],
        ],
        [
            'label_en'=>'Company', 'label_de'=>'Unternehmen', 'label_ar'=>'الشركة',
            'items'=>[
                ['en'=>'About',    'de'=>'Über uns',   'ar'=>'من نحن',       'route'=>'about'],
                ['en'=>'Newsroom', 'de'=>'Newsroom',   'ar'=>'غرفة الأخبار', 'route'=>'newsroom.index'],
                ['en'=>'Insights', 'de'=>'Einblicke',  'ar'=>'المقالات',     'route'=>'insights.index'],
                ['en'=>'Careers',  'de'=>'Karriere',   'ar'=>'وظائف',        'route'=>'careers.index'],
                ['en'=>'Contact',  'de'=>'Kontakt',    'ar'=>'تواصل معنا',   'route'=>'contact.index'],
            ],
        ],
    ];
@endphp

<style>
.hopn-nav-item { position:relative; }
.hopn-dropdown {
    position:absolute; top:100%; left:50%; transform:translateX(-50%);
    margin-top:0; padding:18px 8px 8px 8px; min-width:220px; background:#0D1425; border:1px solid rgba(255,255,255,0.09);
    border-radius:12px; box-shadow:0 24px 48px rgba(0,0,0,0.6);
    background-clip:padding-box;
    opacity:0; pointer-events:none; transition:opacity 0.15s ease, transform 0.15s ease;
    transform:translateX(-50%) translateY(4px); z-index:200;
}
.hopn-nav-item:hover .hopn-dropdown {
    opacity:1; pointer-events:all; transform:translateX(-50%) translateY(0);
}
.hopn-dropdown a {
    display:flex; align-items:center; padding:9px 14px; border-radius:8px;
    color:#CBD5E1; font-size:13px; text-decoration:none; transition:all 0.15s; white-space:nowrap;
}
.hopn-dropdown a:hover { background:rgba(79,110,247,0.1); color:white; }
.hopn-dropdown-header {
    padding:6px 14px 10px; font-size:11px; font-weight:700; text-transform:uppercase;
    letter-spacing:0.1em; color:#64748B; border-bottom:1px solid rgba(255,255,255,0.06); margin-bottom:4px;
}
.hopn-trigger {
    display:inline-flex; align-items:center; gap:4px; padding:6px 10px; border-radius:6px;
    color:#CBD5E1; font-size:13px; font-weight:500; cursor:pointer;
    background:none; border:none; transition:all 0.15s; white-space:nowrap;
}
.hopn-trigger:hover, .hopn-nav-item:hover .hopn-trigger { color:white; background:rgba(255,255,255,0.05); }
.hopn-trigger svg { transition:transform 0.2s; }
.hopn-nav-item:hover .hopn-trigger svg { transform:rotate(180deg); }
.hopn-lang-item { display:block; padding:9px 14px; border-radius:8px; font-size:13px; font-weight:600; color:#CBD5E1; text-decoration:none; transition:all 0.15s; }
.hopn-lang-item:hover { background:rgba(79,110,247,0.1); color:white; }
.hopn-lang-item.active { background:rgba(79,110,247,0.15); color:#818CF8; }
</style>

<header x-data="{ open: false }" class="sticky top-0 z-50"
        style="background:#030712; border-bottom:1px solid rgba(255,255,255,0.06); transform:translateZ(0);">
    <div class="container-shell" style="display:flex; align-items:center; justify-content:space-between; height:60px;">

        {{-- Logo --}}
        <a href="{{ route('home', ['lang'=>$lang]) }}"
           style="display:flex; align-items:center; gap:10px; text-decoration:none; flex-shrink:0;">
            <span style="display:flex; align-items:center; justify-content:center; width:30px; height:30px; border-radius:8px; background:#4F6EF7; color:white; font-size:13px; font-weight:900; box-shadow:0 0 16px rgba(79,110,247,0.4);">H</span>
            <span style="font-size:17px; font-weight:800; color:white; letter-spacing:-0.4px;">HOPn</span>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex" style="align-items:center; gap:2px;">
            <a href="{{ route('home', ['lang'=>$lang]) }}" class="hopn-trigger" style="text-decoration:none;">
                @if($activeLang==='ar') الرئيسية @elseif($activeLang==='de') Startseite @else Home @endif
            </a>
            @foreach($groups as $group)
            <div class="hopn-nav-item">
                <button class="hopn-trigger">
                    {{ $activeLang==='ar'?$group['label_ar']:($activeLang==='de'?$group['label_de']:$group['label_en']) }}
                    <svg style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="hopn-dropdown">
                    <div class="hopn-dropdown-header">{{ $group['label_en'] }}</div>
                    @foreach($group['items'] as $item)
                    <a href="{{ route($item['route'], array_merge(['lang'=>$lang], $item['params'] ?? [])) }}">
                        {{ $activeLang==='ar'?$item['ar']:($activeLang==='de'?$item['de']:$item['en']) }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </nav>

        {{-- Right --}}
        <div style="display:flex; align-items:center; gap:12px;">
            {{-- Language Dropdown --}}
            <div class="hidden md:block" x-data="{ langOpen:false }" @click.away="langOpen=false" style="position:relative;">
                <button type="button" @click="langOpen=!langOpen"
                        style="display:flex; align-items:center; gap:6px; border:1px solid rgba(255,255,255,0.1); border-radius:8px; padding:6px 10px; background:rgba(255,255,255,0.04); color:#CBD5E1; font-size:12px; font-weight:700; cursor:pointer;">
                    {{ strtoupper($activeLang) }}
                    <svg :class="langOpen ? 'rotate-180' : ''" style="width:10px;height:10px;transition:transform 0.2s;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="langOpen" x-transition style="display:none; position:absolute; top:calc(100% + 8px); right:0; min-width:130px; background:#0D1425; border:1px solid rgba(255,255,255,0.09); border-radius:12px; padding:6px; box-shadow:0 24px 48px rgba(0,0,0,0.6); z-index:210;">
                    @foreach(['en'=>'EN','de'=>'DE','ar'=>'AR'] as $code=>$label)
                    <a href="{{ preg_replace('#^/(en|de|ar)#','/'.$code,request()->getPathInfo()) }}"
                       class="hopn-lang-item {{ $activeLang===$code ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- CTA --}}
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hidden md:inline-flex"
               style="align-items:center; gap:6px; padding:8px 20px; border-radius:8px; background:#4F6EF7; color:white; font-size:13px; font-weight:700; text-decoration:none; box-shadow:0 0 20px rgba(79,110,247,0.3); transition:opacity 0.2s; white-space:nowrap;"
               onmouseover="this.style.opacity='0.85'"
               onmouseout="this.style.opacity='1'">
                @if($activeLang==='ar') احجز مكالمة @elseif($activeLang==='de') Termin buchen @else Book a Call @endif
            </a>

            {{-- Mobile toggle --}}
            <button @click="open=!open" class="md:hidden"
                    style="width:38px; height:38px; border-radius:8px; border:1px solid rgba(255,255,255,0.1); background:rgba(255,255,255,0.04); color:#CBD5E1; display:flex; align-items:center; justify-content:center; cursor:pointer;">
                <svg x-show="!open" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" style="width:16px;height:16px;display:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none; border-top:1px solid rgba(255,255,255,0.06); background:rgba(3,7,18,0.98); backdrop-filter:blur(24px); max-height:80vh; overflow-y:auto;">
        <div class="container-shell" style="padding:16px; display:flex; flex-direction:column; gap:2px;">
            <a href="{{ route('home', ['lang'=>$lang]) }}"
               style="display:block; padding:12px 14px; border-radius:8px; color:#CBD5E1; font-size:14px; font-weight:600; text-decoration:none;"
               onmouseover="this.style.background='rgba(255,255,255,0.04)'; this.style.color='white'"
               onmouseout="this.style.background='transparent'; this.style.color='#CBD5E1'">
                @if($activeLang==='ar') الرئيسية @elseif($activeLang==='de') Startseite @else Home @endif
            </a>
            @foreach($groups as $group)
            <div x-data="{sub:false}">
                <button @click="sub=!sub"
                        style="width:100%; display:flex; align-items:center; justify-content:space-between; padding:12px 14px; border-radius:8px; color:#CBD5E1; font-size:14px; font-weight:600; background:none; border:none; cursor:pointer; text-align:left;"
                        onmouseover="this.style.background='rgba(255,255,255,0.04)'; this.style.color='white'"
                        onmouseout="this.style.background='transparent'">
                    {{ $activeLang==='ar'?$group['label_ar']:($activeLang==='de'?$group['label_de']:$group['label_en']) }}
                    <svg :class="sub?'rotate-180':''" style="width:14px;height:14px;transition:transform 0.2s;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="sub" style="padding-left:20px;">
                    @foreach($group['items'] as $item)
                    <a href="{{ route($item['route'], array_merge(['lang'=>$lang], $item['params'] ?? [])) }}"
                       style="display:block; padding:10px 14px; border-radius:8px; color:#CBD5E1; font-size:13px; text-decoration:none;"
                       onmouseover="this.style.color='white'; this.style.background='rgba(255,255,255,0.04)'"
                       onmouseout="this.style.color='#CBD5E1'; this.style.background='transparent'">
                        {{ $activeLang==='ar'?$item['ar']:($activeLang==='de'?$item['de']:$item['en']) }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div x-data="{ mLangOpen:false }" style="padding:12px 14px; border-top:1px solid rgba(255,255,255,0.05); margin-top:8px;">
                <button type="button" @click="mLangOpen=!mLangOpen"
                        style="width:100%; display:flex; align-items:center; justify-content:space-between; background:none; border:none; cursor:pointer; padding:0; color:#CBD5E1; font-size:13px; font-weight:600;">
                    <span style="display:flex; align-items:center; gap:8px;">
                        <span style="font-size:12px; color:#94A3B8;">Language:</span>
                        <span style="color:white;">{{ strtoupper($activeLang) }}</span>
                    </span>
                    <svg :class="mLangOpen ? 'rotate-180' : ''" style="width:12px;height:12px;transition:transform 0.2s;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="mLangOpen" x-transition style="display:none; margin-top:8px; padding-left:4px;">
                    @foreach(['en'=>'EN','de'=>'DE','ar'=>'AR'] as $code=>$label)
                    <a href="{{ preg_replace('#^/(en|de|ar)#','/'.$code,request()->getPathInfo()) }}"
                       class="hopn-lang-item {{ $activeLang===$code ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>
