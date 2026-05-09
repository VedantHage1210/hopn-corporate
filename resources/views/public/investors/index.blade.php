<x-layouts.public :title="'Investors & Funds'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(16,185,129,0.10); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.35); background:rgba(16,185,129,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#10B981; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981;">Investors & Funds</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar')
                    استثمر في مستقبل الابتكار
                @elseif($lang === 'de')
                    Investieren Sie in die Zukunft der Innovation
                @else
                    Invest in the Future of Innovation
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar')
                    HOPn يربط المستثمرين بأفضل الشركات الناشئة في مجال التكنولوجيا العميقة.
                @elseif($lang === 'de')
                    HOPn verbindet Investoren mit den besten Deep-Tech-Startups in Europa.
                @else
                    HOPn connects investors with the best deep-tech startups and innovation projects across Europe.
                @endif
            </p>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(16,185,129,0.3);"
               onmouseover="this.style.opacity='0.88'"
               onmouseout="this.style.opacity='1'">
                @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
            </a>
        </div>
    </section>

    {{-- Why Invest --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Why HOPn</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') لماذا الاستثمار مع HOPn @elseif($lang === 'de') Warum mit HOPn investieren @else Why Invest with HOPn @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach([
                    ['icon' => '🎯', 'en' => 'Curated Deal Flow',       'de' => 'Kuratierter Deal Flow',         'ar' => 'تدفق صفقات منتقى',        'desc_en' => 'Access pre-vetted startups across AI, robotics, data, and deep-tech verticals.', 'desc_de' => 'Zugang zu vorgeprüften Startups.', 'desc_ar' => 'الوصول إلى شركات ناشئة تم فحصها مسبقاً.'],
                    ['icon' => '🌍', 'en' => 'European Market Access',  'de' => 'Europäischer Marktzugang',      'ar' => 'الوصول للسوق الأوروبية',   'desc_en' => 'HOPn operates across Germany, EU, and MENA regions with strong local networks.', 'desc_de' => 'HOPn ist in Deutschland, EU und MENA aktiv.', 'desc_ar' => 'HOPn يعمل في ألمانيا والاتحاد الأوروبي ومنطقة الشرق الأوسط.'],
                    ['icon' => '🔬', 'en' => 'Deep Tech Focus',         'de' => 'Deep-Tech-Fokus',               'ar' => 'تركيز على التكنولوجيا العميقة', 'desc_en' => 'Specialized in AI, robotics, digital twins, and data platforms.', 'desc_de' => 'Spezialisiert auf KI, Robotik und Datenplattformen.', 'desc_ar' => 'متخصص في الذكاء الاصطناعي والروبوتات.'],
                    ['icon' => '🤝', 'en' => 'Strategic Co-Investment', 'de' => 'Strategische Co-Investition',   'ar' => 'استثمار مشترك استراتيجي',  'desc_en' => 'HOPn co-invests alongside partners to align interests and accelerate growth.', 'desc_de' => 'HOPn investiert gemeinsam mit Partnern.', 'desc_ar' => 'HOPn يستثمر بالتعاون مع الشركاء.'],
                    ['icon' => '📊', 'en' => 'Portfolio Support',       'de' => 'Portfolio-Unterstützung',       'ar' => 'دعم المحفظة الاستثمارية',  'desc_en' => 'Full operational and technical support for portfolio companies.', 'desc_de' => 'Vollständige Unterstützung für Portfoliounternehmen.', 'desc_ar' => 'دعم تشغيلي وتقني كامل لشركات المحفظة.'],
                    ['icon' => '⚡', 'en' => 'Fast Execution',          'de' => 'Schnelle Umsetzung',            'ar' => 'تنفيذ سريع',               'desc_en' => 'HOPn moves fast — from deal sourcing to closing with minimal friction.', 'desc_de' => 'HOPn handelt schnell und effizient.', 'desc_ar' => 'HOPn يتحرك بسرعة من البحث عن الصفقات إلى الإغلاق.'],
                ] as $item)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="font-size:28px; margin-bottom:12px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Investment Areas --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Focus Areas</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') مجالات الاستثمار @elseif($lang === 'de') Investitionsbereiche @else Investment Areas @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:12px;">
                @foreach([
                    ['icon' => '🤖', 'en' => 'Artificial Intelligence', 'de' => 'Künstliche Intelligenz', 'ar' => 'الذكاء الاصطناعي'],
                    ['icon' => '🦾', 'en' => 'Robotics & Automation',   'de' => 'Robotik & Automatisierung', 'ar' => 'الروبوتات والأتمتة'],
                    ['icon' => '📊', 'en' => 'Data Platforms',          'de' => 'Datenplattformen', 'ar' => 'منصات البيانات'],
                    ['icon' => '🏭', 'en' => 'Digital Twins',           'de' => 'Digitale Zwillinge', 'ar' => 'التوائم الرقمية'],
                    ['icon' => '🏥', 'en' => 'Healthcare Tech',         'de' => 'Gesundheitstechnologie', 'ar' => 'تكنولوجيا الصحة'],
                    ['icon' => '🎓', 'en' => 'EdTech',                  'de' => 'EdTech', 'ar' => 'تكنولوجيا التعليم'],
                    ['icon' => '💳', 'en' => 'FinTech',                 'de' => 'FinTech', 'ar' => 'التكنولوجيا المالية'],
                    ['icon' => '🚚', 'en' => 'Logistics & Supply Chain','de' => 'Logistik & Lieferkette', 'ar' => 'الخدمات اللوجستية'],
                ] as $area)
                <div style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; text-align:center; transition:all 0.25s;"
                     onmouseover="this.style.background='rgba(16,185,129,0.08)'; this.style.borderColor='rgba(16,185,129,0.3)'"
                     onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.07)'">
                    <div style="font-size:24px; margin-bottom:8px;">{{ $area['icon'] }}</div>
                    <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $area[$lang] ?? $area['en'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(16,185,129,0.2); background:rgba(16,185,129,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل أنت مستعد للاستثمار؟ @elseif($lang === 'de') Bereit zu investieren? @else Ready to Invest? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn للمستثمرين اليوم. @elseif($lang === 'de') Kontaktieren Sie unser Investorenteam noch heute. @else Get in touch with the HOPn investor relations team today. @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(16,185,129,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact Investor Relations @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
