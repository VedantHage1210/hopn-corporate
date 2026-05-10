<x-layouts.public :title="'Industry'">
@php($lang = request()->route('lang', 'en'))

@php
$industries = [
    'automotive'    => ['icon' => '🚗', 'en' => 'Automotive',    'de' => 'Automobil',        'ar' => 'السيارات',       'color' => '#4F6EF7',
        'challenges_en' => 'Automotive companies face rapid digitalization, EV transition, and supply chain complexity.',
        'solutions_en'  => 'HOPn provides digital twin simulations, AI quality control, and smart factory solutions.',
        'services_en'   => ['Digital Twin Solutions', 'AI Quality Control', 'Smart Manufacturing', 'Data Analytics']],

    'healthcare'    => ['icon' => '🏥', 'en' => 'Healthcare',    'de' => 'Gesundheitswesen', 'ar' => 'الرعاية الصحية', 'color' => '#10B981',
        'challenges_en' => 'Healthcare organizations need AI diagnostics, eldercare automation, and data compliance.',
        'solutions_en'  => 'HOPn delivers healthcare robotics, AI monitoring systems, and GDPR-compliant data platforms.',
        'services_en'   => ['Healthcare Robotics', 'AI Diagnostics', 'Eldercare Systems', 'Data Compliance']],

    'manufacturing' => ['icon' => '🏭', 'en' => 'Manufacturing', 'de' => 'Fertigung',        'ar' => 'التصنيع',        'color' => '#F59E0B',
        'challenges_en' => 'Manufacturers need smart automation, predictive maintenance, and process optimization.',
        'solutions_en'  => 'HOPn builds industrial digital twins, robotics integration, and AI-driven process automation.',
        'services_en'   => ['Industrial Digital Twins', 'Robotics Integration', 'Predictive Maintenance', 'Process Automation']],

    'ecommerce'     => ['icon' => '🛒', 'en' => 'E-Commerce',    'de' => 'E-Commerce',       'ar' => 'التجارة الإلكترونية', 'color' => '#8B5CF6',
        'challenges_en' => 'E-commerce businesses need personalization, fraud detection, and supply chain optimization.',
        'solutions_en'  => 'HOPn provides AI recommendation engines, fraud detection, and logistics optimization.',
        'services_en'   => ['AI Personalization', 'Fraud Detection', 'Supply Chain AI', 'Data Analytics']],

    'education'     => ['icon' => '🎓', 'en' => 'Education',     'de' => 'Bildung',          'ar' => 'التعليم',        'color' => '#06B6D4',
        'challenges_en' => 'Educational institutions need digital transformation, AI tools, and industry connections.',
        'solutions_en'  => 'HOPn builds EdTech platforms, AI tutoring, and university-industry collaboration programs.',
        'services_en'   => ['EdTech Platforms', 'AI Tutoring', 'Industry Bridge Programs', 'Digital Transformation']],

    'finance'       => ['icon' => '💳', 'en' => 'Finance',       'de' => 'Finanzen',         'ar' => 'المالية',        'color' => '#EF4444',
        'challenges_en' => 'Financial institutions need AI risk management, fraud prevention, and data compliance.',
        'solutions_en'  => 'HOPn delivers FinTech solutions, AI risk engines, and regulatory-compliant data platforms.',
        'services_en'   => ['FinTech Development', 'AI Risk Management', 'Fraud Prevention', 'Data Compliance']],

    'logistics'     => ['icon' => '🚚', 'en' => 'Logistics',     'de' => 'Logistik',         'ar' => 'اللوجستيات',    'color' => '#F97316',
        'challenges_en' => 'Logistics companies need route optimization, warehouse automation, and real-time tracking.',
        'solutions_en'  => 'HOPn provides AI route intelligence, warehouse robotics, and supply chain data platforms.',
        'services_en'   => ['Route Optimization', 'Warehouse Robotics', 'Supply Chain Analytics', 'Real-time Tracking']],

    'research'      => ['icon' => '🔬', 'en' => 'Research',      'de' => 'Forschung',        'ar' => 'البحث العلمي',  'color' => '#A855F7',
        'challenges_en' => 'Research institutions need industry collaboration, funding access, and data infrastructure.',
        'solutions_en'  => 'HOPn connects research labs with enterprises, provides data platforms and innovation funding.',
        'services_en'   => ['Industry Collaboration', 'Research Data Platforms', 'Innovation Funding', 'R&D Consulting']],

    'production'    => ['icon' => '🏗️', 'en' => 'Production',   'de' => 'Produktion',       'ar' => 'الإنتاج',       'color' => '#14B8A6',
        'challenges_en' => 'Production facilities need quality control automation, predictive maintenance, and efficiency.',
        'solutions_en'  => 'HOPn delivers AI quality systems, predictive maintenance platforms, and production analytics.',
        'services_en'   => ['AI Quality Control', 'Predictive Maintenance', 'Production Analytics', 'Process Optimization']],
];

$industry = $industries[$slug] ?? $industries['automotive'];
@endphp

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:{{ $industry['color'] }}20; filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <a href="{{ route('industries.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; color:#64748B; font-size:13px; text-decoration:none; margin-bottom:24px;"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='#64748B'">
                ← @if($lang === 'ar') جميع القطاعات @elseif($lang === 'de') Alle Branchen @else All Industries @endif
            </a>
            <div style="font-size:56px; margin-bottom:20px;">{{ $industry['icon'] }}</div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                {{ $industry[$lang] ?? $industry['en'] }}
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                {{ $industry['challenges_en'] }}
            </p>
        </div>
    </section>

    {{-- Solutions --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:48px; align-items:center;">
                <div>
                    <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:{{ $industry['color'] }}; margin-bottom:12px;">HOPn Solution</span>
                    <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                        @if($lang === 'ar') كيف يساعد HOPn @elseif($lang === 'de') Wie HOPn hilft @else How HOPn Helps @endif
                    </h2>
                    <p style="color:#94A3B8; font-size:16px; line-height:1.7;">
                        {{ $industry['solutions_en'] }}
                    </p>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    @foreach($industry['services_en'] as $service)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px; text-align:center;">
                        <div style="font-size:13px; font-weight:600; color:white;">{{ $service }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid {{ $industry['color'] }}30; background:{{ $industry['color'] }}08; border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد حلاً مخصصاً؟ @elseif($lang === 'de') Maßgeschneiderte Lösung gewünscht? @else Ready for a Custom Solution? @endif
                </h2>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:{{ $industry['color'] }}; color:white; font-size:15px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
