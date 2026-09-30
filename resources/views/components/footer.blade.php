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
    $footerLegal = \App\Models\NavigationItem::where('menu_location', 'footer_legal')
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

<footer style="background:#060B17; border-top:1px solid rgba(255,255,255,0.06); padding-top:64px;" class="hopn-reveal hopn-footer-surface">



    







    
    <div class="container-shell" style="padding-bottom:48px;">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:40px;">

            {{-- Brand Column --}}
            <div style="grid-column: span 2;">
                <a href="{{ route('home', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; text-decoration:none; margin-bottom:16px;">





                 <span class="hopn-logo-3d" style="display:inline-block; width:36px; height:36px; perspective:220px; position:relative;" aria-hidden="true">
    <span style="position:absolute; inset:-6px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.35) 0%, transparent 70%); animation:hopnLogoGlow 2.4s ease-in-out infinite;"></span>
    <span class="hopn-logo-3d-inner" style="display:block; width:100%; height:100%; transform-style:preserve-3d; animation:hopnLogoSpin 7s linear infinite; position:relative;">
        <svg viewBox="0 0 40 40" style="position:absolute; inset:0; width:100%; height:100%; backface-visibility:hidden; filter:drop-shadow(0 0 8px rgba(139,92,246,0.75));">
            <path d="M20 4 L35.5 33 L4.5 33 Z" fill="none" stroke="#A78BFA" stroke-width="3.2" stroke-linejoin="round"/>
            <circle cx="20" cy="4" r="4.2" fill="#8B5CF6"/>
            <circle cx="4.5" cy="33" r="4.2" fill="#8B5CF6"/>
            <circle cx="35.5" cy="33" r="4.2" fill="#8B5CF6"/>
        </svg>
        <svg viewBox="0 0 40 40" style="position:absolute; inset:0; width:100%; height:100%; backface-visibility:hidden; transform:rotateY(180deg); filter:drop-shadow(0 0 8px rgba(79,110,247,0.75));">
            <path d="M20 4 L35.5 33 L4.5 33 Z" fill="none" stroke="#4F6EF7" stroke-width="3.2" stroke-linejoin="round"/>
            <circle cx="20" cy="4" r="4.2" fill="#4F6EF7"/>
            <circle cx="4.5" cy="33" r="4.2" fill="#4F6EF7"/>
            <circle cx="35.5" cy="33" r="4.2" fill="#4F6EF7"/>
        </svg>
    </span>
</span>







                </a>
                <p style="font-size:13px; color:#CBD5E1; line-height:1.7; max-width:220px; margin-bottom:20px;">
                    {{ $lang === 'ar' ? 'مركز الابتكار الأوروبي يربط الأعمال والتعليم والبحث.' : ($lang === 'de' ? 'Europäischer Innovationshub für Business, Bildung und Forschung.' : 'European innovation hub connecting business, education, and research.') }}
                </p>
                <div style="font-size:13px; color:#CBD5E1; margin-bottom:8px;">
                    📧 <a href="mailto:contact@hopn.eu" style="color:#818CF8; text-decoration:none;">contact@hopn.eu</a>
                </div>
                @if(!empty($siteSettings['office_address'] ?? null))
                <div style="font-size:13px; color:#CBD5E1; margin-bottom:24px;">
                    📍 {{ $siteSettings['office_address'] }}
                </div>
                @endif
                <div style="margin-bottom:24px; max-width:340px;">
                    <x-newsletter-subscribe />
                </div>
                <div style="display:flex; gap:10px;">
                    @foreach([
                      ['href' => 'https://www.linkedin.com/company/hopn-ug/', 'label' => 'LinkedIn', 'icon' => '<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/>'],
                    ] as $social)
                    <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}"
                       class="hopn-social-icon"
                       style="display:flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.04); color:#CBD5E1; text-decoration:none;">
                        <svg style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            {!! $social['icon'] !!}
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Solutions --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#CBD5E1; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'الحلول' : ($lang === 'de' ? 'Lösungen' : 'Solutions') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerSolutions->count() > 0)
                        @foreach($footerSolutions as $item)
                        <a href="{{ $item->hrefFor($lang) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultSolutions as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Company --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#CBD5E1; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'الشركة' : ($lang === 'de' ? 'Unternehmen' : 'Company') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerCompany->count() > 0)
                        @foreach($footerCompany as $item)
                        <a href="{{ $item->hrefFor($lang) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultCompany as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Contact --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#CBD5E1; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'تواصل' : ($lang === 'de' ? 'Kontakt' : 'Contact') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @if($footerContact->count() > 0)
                        @foreach($footerContact as $item)
                        <a href="{{ $item->hrefFor($lang) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
                        </a>
                        @endforeach
                    @else
                        @foreach($defaultContact as $link)
                        <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                           class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                            {{ $link[$lang] ?? $link['en'] }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Legal --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#CBD5E1; margin-bottom:16px;">
                    {{ $lang === 'ar' ? 'قانوني' : ($lang === 'de' ? 'Rechtliches' : 'Legal') }}
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    <a href="{{ route('legal.impressum', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                        Impressum
                    </a>
                    <a href="{{ route('legal.privacy', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                        {{ $lang === 'ar' ? 'سياسة الخصوصية' : ($lang === 'de' ? 'Datenschutzerklärung' : 'Privacy Policy') }}
                    </a>
                    <a href="{{ route('legal.cookie', ['lang' => $lang]) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                        {{ $lang === 'ar' ? 'سياسة الكوكيز' : ($lang === 'de' ? 'Cookie-Richtlinie' : 'Cookie Policy') }}
                    </a>
                    @foreach($footerLegal as $item)
                    <a href="{{ $item->hrefFor($lang) }}"
                       class="hopn-link-accent" style="font-size:13px; color:#CBD5E1; text-decoration:none; transition:color 0.2s;">
                        {{ $lang === 'ar' ? ($item->label_ar ?: $item->label_en) : ($lang === 'de' ? ($item->label_de ?: $item->label_en) : $item->label_en) }}
                    </a>
                    @endforeach
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
        <p style="font-size:12px; color:#94A3B8;">© {{ date('Y') }} HOPn UG (haftungsbeschränkt). {{ $lang === 'ar' ? 'جميع الحقوق محفوظة.' : ($lang === 'de' ? 'Alle Rechte vorbehalten.' : 'All rights reserved.') }}</p>
        @if($footerSecondary->count() > 0)
        <div style="display:flex; flex-wrap:wrap; gap:16px;">
            @foreach($footerSecondary as $item)
            <a href="{{ $item->hrefFor($lang) }}"
               class="hopn-link-accent" style="font-size:12px; color:#94A3B8; text-decoration:none; transition:color 0.2s;">
                {{ $lang === 'ar' && $item->label_ar ? $item->label_ar : ($lang === 'de' && $item->label_de ? $item->label_de : $item->label_en) }}
            </a>
            @endforeach
        </div>
        @else
        <p style="font-size:12px; color:#64748B;">Built for enterprise innovation in Europe 🇪🇺</p>
        @endif
    </div>
</div>

</footer>