@php
    $lang = request()->route('lang', app()->getLocale());
    $googtrans = $_COOKIE['googtrans'] ?? '';
    $activeLang = $lang;
    if ($googtrans) {
        $parts = explode('/', trim($googtrans, '/'));
        $cookieLang = end($parts);
        if (in_array($cookieLang, ['en', 'de', 'ar'])) {
            $activeLang = $cookieLang;
        }
    }

    $groups = [
        [
            'label_en'=>'Solutions', 'label_de'=>'Lösungen', 'label_ar'=>'الحلول',
            'items'=>[
                ['en'=>'Services Overview',        'de'=>'Leistungsübersicht',      'ar'=>'نظرة عامة على الخدمات',   'route'=>'services.index'],
                ['en'=>'AI Solutions',             'de'=>'KI-Lösungen',             'ar'=>'حلول الذكاء الاصطناعي',   'route'=>'services.index'],
                ['en'=>'Digital Twins',            'de'=>'Digitale Zwillinge',       'ar'=>'التوائم الرقمية',          'route'=>'services.index'],
                ['en'=>'Tech Consulting',          'de'=>'Tech-Beratung',            'ar'=>'الاستشارات التقنية',       'route'=>'services.index'],
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
/* Invisible bridge that fills the gap between the trigger button and the dropdown,
   so the mouse never "leaves" the hoverable area while moving down to the submenu. */
.hopn-nav-item::after {
    content:''; position:absolute; top:100%; left:50%; transform:translateX(-50%);
    width:220px; height:10px; z-index:199;
}
.hopn-dropdown {
    position:absolute; top:100%; left:50%; transform:translateX(-50%);
    margin-top:10px; min-width:220px; background:#0D1425; border:1px solid rgba(255,255,255,0.09);
    border-radius:12px; padding:8px; box-shadow:0 24px 48px rgba(0,0,0,0.6);
    opacity:0; pointer-events:none; transition:opacity 0.15s ease, transform 0.15s ease;
    transform:translateX(-50%) translateY(4px); z-index:200;
}
.hopn-nav-item:hover .hopn-dropdown {
    opacity:1; pointer-events:all; transform:translateX(-50%) translateY(0);
}
.hopn-dropdown a {
    display:flex; align-items:center; padding:9px 14px; border-radius:8px;
    color:#94A3B8; font-size:13px; text-decoration:none; transition:all 0.15s; white-space:nowrap;
}
.hopn-dropdown a:hover { background:rgba(79,110,247,0.1); color:white; }
.hopn-dropdown-header {
    padding:6px 14px 10px; font-size:11px; font-weight:700; text-transform:uppercase;
    letter-spacing:0.1em; color:#334155; border-bottom:1px solid rgba(255,255,255,0.06); margin-bottom:4px;
}
.hopn-trigger {
    display:inline-flex; align-items:center; gap:4px; padding:6px 10px; border-radius:6px;
    color:#94A3B8; font-size:13px; font-weight:500; cursor:pointer;
    background:none; border:none; transition:all 0.15s; white-space:nowrap;
}
.hopn-trigger:hover, .hopn-nav-item:hover .hopn-trigger { color:white; background:rgba(255,255,255,0.05); }
.hopn-trigger svg { transition:transform 0.2s; }
.hopn-nav-item:hover .hopn-trigger svg { transform:rotate(180deg); }
</style>

<header x-data="{ open: false }" class="sticky top-0 z-50"
        style="background:rgba(3,7,18,0.90); backdrop-filter:blur(24px); border-bottom:1px solid rgba(255,255,255,0.06);">

    <div class="container-shell" style="display:flex; align-items:center; justify-content:space-between; height:60px;">

        {{-- Logo --}}
        <a href="{{ route('home', ['lang'=>$lang]) }}"
           style="display:flex; align-items:center; gap:10px; text-decoration:none; flex-shrink:0;">
            <span style="display:flex; align-items:center; justify-content:center; width:30px; height:30px; border-radius:8px; background:#4F6EF7; color:white; font-size:13px; font-weight:900; box-shadow:0 0 16px rgba(79,110,247,0.4);">H</span>
            <span style="font-size:17px; font-weight:800; color:white; letter-spacing:-0.4px;">HOPn</span>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex" style="align-items:center; gap:2px;">
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
                    <a href="{{ route($item['route'], ['lang'=>$lang]) }}">
                        {{ $activeLang==='ar'?$item['ar']:($activeLang==='de'?$item['de']:$item['en']) }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </nav>

        {{-- Right --}}
        <div style="display:flex; align-items:center; gap:12px;">
            {{-- Language --}}
            <div class="hidden md:flex"
                 style="border:1px solid rgba(255,255,255,0.1); border-radius:8px; padding:2px; background:rgba(255,255,255,0.04);">
                @foreach(['en'=>'EN','de'=>'DE','ar'=>'AR'] as $code=>$label)
                <a href="{{ preg_replace('#^/(en|de|ar)#','/'.$code,request()->getPathInfo()) }}"
                   onclick="triggerGoogleTranslate('{{ $code }}'); return false;"
                   style="padding:3px 8px; border-radius:6px; font-size:11px; font-weight:700; text-decoration:none; cursor:pointer; transition:all 0.15s;
                   {{ $activeLang===$code ? 'background:#4F6EF7; color:white;' : 'color:#64748B;' }}">
                    {{ $label }}
                </a>
                @endforeach
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
                    style="width:38px; height:38px; border-radius:8px; border:1px solid rgba(255,255,255,0.1); background:rgba(255,255,255,0.04); color:#94A3B8; display:flex; align-items:center; justify-content:center; cursor:pointer;">
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
            @foreach($groups as $group)
            <div x-data="{sub:false}">
                <button @click="sub=!sub"
                        style="width:100%; display:flex; align-items:center; justify-content:space-between; padding:12px 14px; border-radius:8px; color:#94A3B8; font-size:14px; font-weight:600; background:none; border:none; cursor:pointer; text-align:left;"
                        onmouseover="this.style.background='rgba(255,255,255,0.04)'; this.style.color='white'"
                        onmouseout="this.style.background='transparent'">
                    {{ $activeLang==='ar'?$group['label_ar']:($activeLang==='de'?$group['label_de']:$group['label_en']) }}
                    <svg :class="sub?'rotate-180':''" style="width:14px;height:14px;transition:transform 0.2s;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="sub" style="padding-left:20px;">
                    @foreach($group['items'] as $item)
                    <a href="{{ route($item['route'], ['lang'=>$lang]) }}"
                       style="display:block; padding:10px 14px; border-radius:8px; color:#64748B; font-size:13px; text-decoration:none;"
                       onmouseover="this.style.color='white'; this.style.background='rgba(255,255,255,0.04)'"
                       onmouseout="this.style.color='#64748B'; this.style.background='transparent'">
                        {{ $activeLang==='ar'?$item['ar']:($activeLang==='de'?$item['de']:$item['en']) }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div style="display:flex; align-items:center; gap:8px; padding:12px 14px; border-top:1px solid rgba(255,255,255,0.05); margin-top:8px;">
                <span style="font-size:12px; color:#475569;">Language:</span>
                @foreach(['en'=>'EN','de'=>'DE','ar'=>'AR'] as $code=>$label)
                <a href="{{ preg_replace('#^/(en|de|ar)#','/'.$code,request()->getPathInfo()) }}"
                   onclick="triggerGoogleTranslate('{{ $code }}'); return false;"
                   style="padding:4px 12px; border-radius:6px; font-size:12px; font-weight:700; text-decoration:none; cursor:pointer;
                   {{ $activeLang===$code ? 'background:#4F6EF7; color:white;' : 'color:#64748B;' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</header>
