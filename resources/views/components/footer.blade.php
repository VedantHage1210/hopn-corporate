@php
    $lang = request()->route('lang', 'en');
    
    // CMS footer items fetch karo
    $footerSolutions = \App\Models\NavigationItem::where('menu_location', 'footer_solutions')
                        ->where('visible_' . $lang, true)
                        ->orderBy('sort_order')->get();
    $footerCompany = \App\Models\NavigationItem::where('menu_location', 'footer_company')
                        ->where('visible_' . $lang, true)
                        ->orderBy('sort_order')->get();
    $footerContact = \App\Models\NavigationItem::where('menu_location', 'footer_contact')
                        ->where('visible_' . $lang, true)
                        ->orderBy('sort_order')->get();

    // Fallback hardcoded
    $defaultSolutions = [
        ['route' => 'services.index',     'en' => 'Services',     'de' => 'Leistungen',   'ar' => 'الخدمات'],
        ['route' => 'programs.index',     'en' => 'Programs',     'de' => 'Programme',    'ar' => 'البرامج'],
        ['route' => 'products.index',     'en' => 'Products',     'de' => 'Produkte',     'ar' => 'المنتجات'],
        ['route' => 'case-studies.index', 'en' => 'Case Studies', 'de' => 'Fallstudien',  'ar' => 'دراسات الحالة'],
        ['route' => 'insights.index',     'en' => 'Insights',     'de' => 'Einblicke',    'ar' => 'المقالات'],
       ['route' => 'catalog.index', 'en' => 'Catalog', 'de' => 'Katalog', 'ar' => 'الكتالوج'],
    ];
    $defaultCompany = [
        ['route' => 'about',          'en' => 'About HOPn', 'de' => 'Über Uns',  'ar' => 'من نحن'],
        ['route' => 'partners.index', 'en' => 'Partners',   'de' => 'Partner',   'ar' => 'الشركاء'],
        ['route' => 'careers.index',  'en' => 'Careers',    'de' => 'Karriere',  'ar' => 'وظائف'],
    ];
    $defaultContact = [
        ['route' => 'contact.index',         'en' => 'Contact Us',      'de' => 'Kontakt',           'ar' => 'تواصل معنا'],
        ['route' => 'partner-inquiry.index', 'en' => 'Partner Inquiry', 'de' => 'Partneranfrage',    'ar' => 'استفسار شراكة'],
        ['route' => 'careers.index',         'en' => 'Apply for a Job', 'de' => 'Job bewerben',      'ar' => 'تقدم لوظيفة'],
    ];
@endphp

<footer style="background:#060B17; border-top:1px solid rgba(255,255,255,0.06); padding-top:64px;" class="hopn-reveal">



    







    
    <div class="container-shell" style="padding-bottom:48px;">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:40px;">

            {{-- Brand Column --}}
            <div style="grid-column: span 2;">
                <a href="{{ route('home', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; text-decoration:none; margin-bottom:16px;">
                    <span style="display:flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; background:#4F6EF7; color:white; font-size:14px; font-weight:900;">H</span>
                    <span style="font-size:18px; font-weight:700; color:white;">HOPn</span>
                </a>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7; max-width:220px; margin-bottom:20px;">
                    {{ $lang === 'ar' ? 'مركز الابتكار الأوروبي يربط الأعمال والتعليم والبحث.' : ($lang === 'de' ? 'Europäischer Innovationshub für Business, Bildung und Forschung.' : 'European innovation hub connecting business, education, and research.') }}
                </p>
                <div style="font-size:13px; color:#94A3B8; margin-bottom:8px;">
                    📧 <a href="mailto:contact@hopn.eu" style="color:#818CF8; text-decoration:none;">contact@hopn.eu</a>
                </div>
                <div style="font-size:13px; color:#94A3B8; margin-bottom:24px;">
                    📍 Berlin, Germany
                </div>
                <div style="display:flex; gap:10px;">
                    @foreach([
                      ['href' => 'https://www.linkedin.com/company/hopn-ug/', 'label' => 'LinkedIn', 'icon' => '<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/>'],
                        ['href' => 'https://twitter.com/', 'label' => 'Twitter',  'icon' => '<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>'],
                        ['href' => 'https://github.com/VedantHage1210/hopn-corporate', 'label' => 'GitHub',   'icon' => '<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/>'],
                    ] as $social)
                    <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}"
                       class="hopn-social-icon"
                       style="display:flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.04); color:#94A3B8; text-decoration:none;">
                        <svg style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            {!! $social['icon'] !!}
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Solutions --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'الحلول' : ($lang === 'de' ? 'Lösungen' : 'Solutions') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerSolutions->count() > 0)
                        @foreach($footerSolutions as $item)
                        <a href="{{ $item->url ?? '#' }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultSolutions as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Company --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'الشركة' : ($lang === 'de' ? 'Unternehmen' : 'Company') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerCompany->count() > 0)
                        @foreach($footerCompany as $item)
                        <a href="{{ $item->url ?? '#' }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultCompany as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Contact --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'تواصل' : ($lang === 'de' ? 'Kontakt' : 'Contact') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerContact->count() > 0)
                        @foreach($footerContact as $item)
                        <a href="{{ $item->url ?? '#' }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultContact as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Legal --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'قانوني' : ($lang === 'de' ? 'Rechtliches' : 'Legal') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    <a href="{{ route('legal.impressum', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                        Impressum
                    </a>
                    <a href="{{ route('legal.privacy', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                        {{ $lang === 'ar' ? 'سياسة الخصوصية' : ($lang === 'de' ? 'Datenschutzerklärung' : 'Privacy Policy') }}
                    </a>
                    <a href="{{ route('legal.cookie', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                        {{ $lang === 'ar' ? 'سياسة الكوكيز' : ($lang === 'de' ? 'Cookie-Richtlinie' : 'Cookie Policy') }}
                    </a>
                </div>
            </div>

        </div>
    </div>

   {{-- Bottom Bar --}}
@php
    $footerSecondary = \App\Models\NavigationItem::where('menu_location', 'footer_secondary')
                        ->where('visible_' . $lang, true)
                        ->orderBy('sort_order')->get();
@endphp
<div style="border-top:1px solid rgba(255,255,255,0.05); padding:20px 0;">
    <div class="container-shell" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px;">
        <p style="font-size:12px; color:#64748B;">© {{ date('Y') }} HOPn GmbH. {{ $lang === 'ar' ? 'جميع الحقوق محفوظة.' : ($lang === 'de' ? 'Alle Rechte vorbehalten.' : 'All rights reserved.') }}</p>
        @if($footerSecondary->count() > 0)
        <div style="display:flex; flex-wrap:wrap; gap:16px;">
            @foreach($footerSecondary as $item)
            <a href="{{ $item->url ?? '#' }}"
               class="hopn-link-accent" style="font-size:12px; color:#64748B; text-decoration:none; transition:color 0.2s;">
                {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
            </a>
            @endforeach
        </div>
        @else
        <p style="font-size:12px; color:#475569;">Built for enterprise innovation in Europe 🇪🇺</p>
        @endif
    </div>
</div>

</footer>
