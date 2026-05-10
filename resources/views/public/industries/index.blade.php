<x-layouts.public :title="'Industries'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(6,182,212,0.10); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(6,182,212,0.35); background:rgba(6,182,212,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#06B6D4; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#06B6D4;">Industries</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar')
                    القطاعات التي نخدمها
                @elseif($lang === 'de')
                    Branchen, die wir bedienen
                @else
                    Industries We Serve
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar')
                    HOPn يقدم حلول مبتكرة لمختلف القطاعات الصناعية.
                @elseif($lang === 'de')
                    HOPn liefert innovative Lösungen für verschiedene Branchen.
                @else
                    HOPn delivers innovative AI, data, and digital solutions across key industries.
                @endif
            </p>
        </div>
    </section>

    {{-- Industries Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach([
                    ['icon' => '🚗', 'slug' => 'automotive',     'en' => 'Automotive',      'de' => 'Automobil',          'ar' => 'السيارات',
                     'desc_en' => 'AI, digital twins, and automation solutions for automotive manufacturers and suppliers.',
                     'desc_de' => 'KI-, Digital-Twin- und Automatisierungslösungen für die Automobilindustrie.',
                     'desc_ar' => 'حلول الذكاء الاصطناعي والتوائم الرقمية للصناعة.', 'color' => '#4F6EF7'],

                    ['icon' => '🏥', 'slug' => 'healthcare',     'en' => 'Healthcare',      'de' => 'Gesundheitswesen',   'ar' => 'الرعاية الصحية',
                     'desc_en' => 'Healthcare robotics, AI diagnostics, and eldercare monitoring systems.',
                     'desc_de' => 'Gesundheitsrobotik, KI-Diagnostik und Altenpflegesysteme.',
                     'desc_ar' => 'روبوتات الرعاية الصحية وأنظمة التشخيص بالذكاء الاصطناعي.', 'color' => '#10B981'],

                    ['icon' => '🏭', 'slug' => 'manufacturing',  'en' => 'Manufacturing',   'de' => 'Fertigung',          'ar' => 'التصنيع',
                     'desc_en' => 'Smart manufacturing, industrial digital twins, and process automation.',
                     'desc_de' => 'Intelligente Fertigung, industrielle Digital Twins und Prozessautomatisierung.',
                     'desc_ar' => 'التصنيع الذكي والتوائم الرقمية الصناعية.', 'color' => '#F59E0B'],

                    ['icon' => '🛒', 'slug' => 'ecommerce',      'en' => 'E-Commerce',      'de' => 'E-Commerce',         'ar' => 'التجارة الإلكترونية',
                     'desc_en' => 'AI-powered personalization, data analytics, and supply chain optimization.',
                     'desc_de' => 'KI-gestützte Personalisierung und Lieferkettenoptimierung.',
                     'desc_ar' => 'التخصيص بالذكاء الاصطناعي وتحليلات البيانات.', 'color' => '#8B5CF6'],

                    ['icon' => '🎓', 'slug' => 'education',      'en' => 'Education',       'de' => 'Bildung',            'ar' => 'التعليم',
                     'desc_en' => 'EdTech platforms, AI tutoring systems, and university-industry bridges.',
                     'desc_de' => 'EdTech-Plattformen, KI-Tutoring und Hochschul-Industrie-Brücken.',
                     'desc_ar' => 'منصات التعليم الإلكتروني وأنظمة التدريس بالذكاء الاصطناعي.', 'color' => '#06B6D4'],

                    ['icon' => '💳', 'slug' => 'finance',        'en' => 'Finance',         'de' => 'Finanzen',           'ar' => 'المالية',
                     'desc_en' => 'FinTech solutions, AI risk management, and data-driven financial platforms.',
                     'desc_de' => 'FinTech-Lösungen, KI-Risikomanagement und datengetriebene Finanzplattformen.',
                     'desc_ar' => 'حلول التكنولوجيا المالية وإدارة المخاطر بالذكاء الاصطناعي.', 'color' => '#EF4444'],

                    ['icon' => '🚚', 'slug' => 'logistics',      'en' => 'Logistics',       'de' => 'Logistik',           'ar' => 'اللوجستيات',
                     'desc_en' => 'Supply chain optimization, route intelligence, and warehouse automation.',
                     'desc_de' => 'Lieferkettenoptimierung, Routenintelligenz und Lagerautomatisierung.',
                     'desc_ar' => 'تحسين سلسلة التوريد وأتمتة المستودعات.', 'color' => '#F97316'],

                    ['icon' => '🔬', 'slug' => 'research',       'en' => 'Research',        'de' => 'Forschung',          'ar' => 'البحث العلمي',
                     'desc_en' => 'R&D collaboration, innovation labs, and university-industry research programs.',
                     'desc_de' => 'F&E-Zusammenarbeit, Innovationslabore und Forschungsprogramme.',
                     'desc_ar' => 'التعاون في البحث والتطوير ومختبرات الابتكار.', 'color' => '#A855F7'],

                    ['icon' => '🏗️', 'slug' => 'production',    'en' => 'Production',      'de' => 'Produktion',         'ar' => 'الإنتاج',
                     'desc_en' => 'Production line optimization, quality control AI, and predictive maintenance.',
                     'desc_de' => 'Produktionslinienoptimierung, Qualitätskontrolle und vorausschauende Wartung.',
                     'desc_ar' => 'تحسين خطوط الإنتاج والصيانة التنبؤية.', 'color' => '#14B8A6'],
                ] as $industry)
                <a href="{{ route('industries.show', ['lang' => $lang, 'slug' => $industry['slug']]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $industry['color'] }}40'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="font-size:36px; margin-bottom:16px;">{{ $industry['icon'] }}</div>
                    <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:10px;">{{ $industry[$lang] ?? $industry['en'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">{{ $industry['desc_'.$lang] ?? $industry['desc_en'] }}</p>
                    <div style="margin-top:16px; display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $industry['color'] }};">
                        @if($lang === 'ar') اعرف المزيد @elseif($lang === 'de') Mehr erfahren @else Learn More @endif →
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(6,182,212,0.2); background:rgba(6,182,212,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد حلاً مخصصاً لقطاعك؟ @elseif($lang === 'de') Möchten Sie eine maßgeschneiderte Lösung? @else Looking for a Tailored Industry Solution? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn اليوم. @elseif($lang === 'de') Kontaktieren Sie das HOPn-Team noch heute. @else Get in touch with HOPn to discuss your industry challenges. @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#06B6D4; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(6,182,212,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
