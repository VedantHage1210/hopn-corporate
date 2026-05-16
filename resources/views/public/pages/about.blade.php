<x-layouts.public :title="'About HOPn'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">About HOPn</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') نحن HOPn — مركز الابتكار الأوروبي
                @elseif($lang === 'de') Wir sind HOPn — Europäischer Innovationshub
                @else We are HOPn — European Innovation Hub
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:640px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') نربط الأعمال والتعليم والبحث لبناء حلول رقمية ذكية.
                @elseif($lang === 'de') Wir verbinden Business, Bildung und Forschung für intelligente digitale Lösungen.
                @else Connecting business, education, and research to build intelligent digital solutions across Europe and beyond.
                @endif
            </p>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">

                {{-- Mission --}}
                <div style="position:relative; border:1px solid rgba(79,110,247,0.2); background:#111827; border-radius:20px; padding:40px; overflow:hidden;">
                    <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6);"></div>
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); font-size:22px; margin-bottom:20px;">🎯</div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin-bottom:16px;">
                        @if($lang === 'ar') مهمتنا @elseif($lang === 'de') Unsere Mission @else Our Mission @endif
                    </h2>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">
                        @if($lang === 'ar') تمكين المؤسسات والجامعات والشركات الناشئة من بناء مستقبل رقمي من خلال الذكاء الاصطناعي والبيانات والروبوتات والتوائم الرقمية.
                        @elseif($lang === 'de') Unternehmen, Universitäten und Startups zu befähigen, eine digitale Zukunft durch KI, Daten, Robotik und digitale Zwillinge aufzubauen.
                        @else To empower enterprises, universities, and startups to build a digital future through AI, data, robotics, and digital twins — delivering measurable impact across Europe and the MENA region.
                        @endif
                    </p>
                </div>

                {{-- Vision --}}
                <div style="position:relative; border:1px solid rgba(139,92,246,0.2); background:#111827; border-radius:20px; padding:40px; overflow:hidden;">
                    <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg, #8B5CF6, #06B6D4);"></div>
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:rgba(139,92,246,0.1); border:1px solid rgba(139,92,246,0.2); font-size:22px; margin-bottom:20px;">🔭</div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin-bottom:16px;">
                        @if($lang === 'ar') رؤيتنا @elseif($lang === 'de') Unsere Vision @else Our Vision @endif
                    </h2>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">
                        @if($lang === 'ar') أن نكون المنصة الرائدة في أوروبا التي تربط ابتكار الأعمال والبحث الأكاديمي وريادة الأعمال في نظام بيئي متكامل.
                        @elseif($lang === 'de') Die führende europäische Plattform zu werden, die Business-Innovation, akademische Forschung und Unternehmertum in einem integrierten Ökosystem verbindet.
                        @else To become the leading European platform that bridges business innovation, academic research, and entrepreneurship — creating a complete innovation ecosystem for the digital age.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:16px;">
                @foreach([
                    ['value' => '50+',  'label_en' => 'Enterprise Clients',    'label_de' => 'Unternehmenskunden',    'label_ar' => 'عميل مؤسسي'],
                    ['value' => '10+',  'label_en' => 'AI Products',           'label_de' => 'KI-Produkte',           'label_ar' => 'منتج ذكاء اصطناعي'],
                    ['value' => '6',    'label_en' => 'Innovation Domains',    'label_de' => 'Innovationsdomänen',    'label_ar' => 'مجال ابتكار'],
                    ['value' => '3',    'label_en' => 'Languages Supported',   'label_de' => 'Sprachen',              'label_ar' => 'لغة مدعومة'],
                    ['value' => 'EU',   'label_en' => 'Based & Trusted',       'label_de' => 'Ansässig & Vertraut',   'label_ar' => 'موثوق في أوروبا'],
                    ['value' => '2020', 'label_en' => 'Founded',               'label_de' => 'Gegründet',             'label_ar' => 'تأسست'],
                ] as $stat)
                <div style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.03); border-radius:16px; padding:24px; text-align:center; transition:all 0.25s;"
                     onmouseover="this.style.background='rgba(79,110,247,0.08)'; this.style.borderColor='rgba(79,110,247,0.3)'"
                     onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.07)'">
                    <div style="font-size:32px; font-weight:800; color:white; margin-bottom:6px;">{{ $stat['value'] }}</div>
                    <div style="font-size:12px; color:#64748B;">
                        @if($lang === 'de') {{ $stat['label_de'] }}
                        @elseif($lang === 'ar') {{ $stat['label_ar'] }}
                        @else {{ $stat['label_en'] }}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Who We Are --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">
                <div>
                    <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Who We Are</span>
                    <h2 style="font-size:clamp(24px,4vw,40px); font-weight:800; color:white; margin-bottom:20px; line-height:1.3;">
                        @if($lang === 'ar') مركز ابتكار متعدد التخصصات
                        @elseif($lang === 'de') Ein multidisziplinärer Innovationshub
                        @else A Multidisciplinary Innovation Hub
                        @endif
                    </h2>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8; margin-bottom:20px;">
                        @if($lang === 'ar') HOPn هو شريك مؤسسي متعدد التخصصات يجمع الاستشارات والمنتجات الرقمية وبناء القدرات في منظومة ابتكار متكاملة.
                        @elseif($lang === 'de') HOPn ist ein multidisziplinärer Unternehmenspartner, der Beratung, digitale Produkte und Kompetenzaufbau in einem integrierten Innovationsökosystem vereint.
                        @else HOPn is a multidisciplinary corporate partner that combines consulting, digital products, and capability building into one integrated innovation ecosystem — serving enterprises, universities, startups, and investors across Europe and the MENA region.
                        @endif
                    </p>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">
                        @if($lang === 'ar') نتخصص في الذكاء الاصطناعي والروبوتات وأنظمة السرب والتوائم الرقمية وتقنيات الرعاية الصحية ومنصات البيانات.
                        @elseif($lang === 'de') Wir sind spezialisiert auf KI, Robotik, Schwarmsysteme, digitale Zwillinge, Healthcare-Technologie und Datenplattformen.
                        @else We specialize in AI, robotics, swarming systems, digital twins, healthcare technology, and data platforms — the six core innovation domains that define the future of industry.
                        @endif
                    </p>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    @foreach([
                        ['icon' => '🤖', 'en' => 'Artificial Intelligence', 'de' => 'Künstliche Intelligenz', 'ar' => 'الذكاء الاصطناعي'],
                        ['icon' => '🦾', 'en' => 'Robotics', 'de' => 'Robotik', 'ar' => 'الروبوتات'],
                        ['icon' => '🐝', 'en' => 'Swarming Systems', 'de' => 'Schwarmsysteme', 'ar' => 'أنظمة السرب'],
                        ['icon' => '🏭', 'en' => 'Digital Twins', 'de' => 'Digitale Zwillinge', 'ar' => 'التوائم الرقمية'],
                        ['icon' => '🏥', 'en' => 'Healthcare Tech', 'de' => 'Gesundheitstechnologie', 'ar' => 'تكنولوجيا الصحة'],
                        ['icon' => '📊', 'en' => 'Data Platforms', 'de' => 'Datenplattformen', 'ar' => 'منصات البيانات'],
                    ] as $domain)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px; display:flex; align-items:center; gap:10px; transition:all 0.25s;"
                         onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'"
                         onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
                        <span style="font-size:20px;">{{ $domain['icon'] }}</span>
                        <span style="font-size:13px; font-weight:600; color:#CBD5E1;">
                            @if($lang === 'de') {{ $domain['de'] }}
                            @elseif($lang === 'ar') {{ $domain['ar'] }}
                            @else {{ $domain['en'] }}
                            @endif
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Research & Partnerships --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Research & Partnerships</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') البحث والشراكات @elseif($lang === 'de') Forschung & Partnerschaften @else Research & Partnerships @endif
                </h2>
                <p style="color:#94A3B8; max-width:560px; margin:12px auto 0; font-size:16px; line-height:1.7;">
                    @if($lang === 'ar') HOPn يتعاون مع الجامعات ومراكز البحث والمؤسسات الصناعية.
                    @elseif($lang === 'de') HOPn kooperiert mit Universitäten, Forschungszentren und Industrieunternehmen.
                    @else HOPn collaborates with universities, research centers, and industry partners to drive applied innovation.
                    @endif
                </p>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach([
                    ['icon' => '🎓', 'en_title' => 'University Collaboration', 'de_title' => 'Universitätszusammenarbeit', 'ar_title' => 'التعاون الجامعي',
                     'en_desc' => 'Joint research programs, thesis supervision, and industry-academia innovation bridges.',
                     'de_desc' => 'Gemeinsame Forschungsprogramme und Industrie-Akademie-Brücken.',
                     'ar_desc' => 'برامج بحثية مشتركة وجسور الابتكار بين الصناعة والأكاديمية.'],
                    ['icon' => '🔬', 'en_title' => 'Applied Research', 'de_title' => 'Angewandte Forschung', 'ar_title' => 'البحث التطبيقي',
                     'en_desc' => 'Turning academic research into real-world products and enterprise solutions.',
                     'de_desc' => 'Akademische Forschung in reale Produkte und Unternehmenslösungen verwandeln.',
                     'ar_desc' => 'تحويل البحث الأكاديمي إلى منتجات حقيقية وحلول مؤسسية.'],
                    ['icon' => '🤝', 'en_title' => 'Strategic Partnerships', 'de_title' => 'Strategische Partnerschaften', 'ar_title' => 'الشراكات الاستراتيجية',
                     'en_desc' => 'Long-term partnerships with enterprises, investors, and technology companies.',
                     'de_desc' => 'Langfristige Partnerschaften mit Unternehmen, Investoren und Technologieunternehmen.',
                     'ar_desc' => 'شراكات طويلة الأمد مع المؤسسات والمستثمرين وشركات التكنولوجيا.'],
                    ['icon' => '🌍', 'en_title' => 'European Network', 'de_title' => 'Europäisches Netzwerk', 'ar_title' => 'الشبكة الأوروبية',
                     'en_desc' => 'Active network across Germany, EU, and MENA with local presence and global reach.',
                     'de_desc' => 'Aktives Netzwerk in Deutschland, EU und MENA mit lokaler Präsenz.',
                     'ar_desc' => 'شبكة نشطة في ألمانيا والاتحاد الأوروبي ومنطقة الشرق الأوسط.'],
                ] as $item)
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #10B981, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    <div style="font-size:28px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">
                        @if($lang === 'de') {{ $item['de_title'] }}
                        @elseif($lang === 'ar') {{ $item['ar_title'] }}
                        @else {{ $item['en_title'] }}
                        @endif
                    </h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">
                        @if($lang === 'de') {{ $item['de_desc'] }}
                        @elseif($lang === 'ar') {{ $item['ar_desc'] }}
                        @else {{ $item['en_desc'] }}
                        @endif
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Our Team</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') فريقنا @elseif($lang === 'de') Unser Team @else Meet the Team @endif
                </h2>
                <p style="color:#94A3B8; max-width:500px; margin:12px auto 0; font-size:16px;">
                    @if($lang === 'ar') خبراء متخصصون في الذكاء الاصطناعي والروبوتات والبيانات.
                    @elseif($lang === 'de') Experten für KI, Robotik und Daten.
                    @else Experts in AI, robotics, data, and digital innovation.
                    @endif
                </p>
            </div>
            @php
                $teamMembers = \App\Models\TeamMember::orderBy('sort_order')->get();
            @endphp
            @if($teamMembers->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px;">
                @foreach($teamMembers as $member)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; text-align:center; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    @if($member->avatar_url)
                    <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}"
                         style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin:0 auto 16px; border:2px solid rgba(79,110,247,0.3);">
                    @else
                    <div style="width:80px; height:80px; border-radius:50%; background:rgba(79,110,247,0.1); border:2px solid rgba(79,110,247,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:28px; font-weight:800; color:#818CF8;">
                        {{ strtoupper(substr($member->name, 0, 1)) }}
                    </div>
                    @endif
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:4px;">{{ $member->name }}</h3>
                    <p style="font-size:13px; color:#4F6EF7; margin-bottom:8px;">{{ $member->role }}</p>
                    @if($member->bio)
                    <p style="font-size:12px; color:#64748B; line-height:1.6;">{{ Str::limit($member->bio, 80) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px; border:1px solid rgba(255,255,255,0.07); border-radius:16px; background:#111827;">
                <p style="font-size:16px; color:#64748B;">Team members coming soon. Add from admin panel → Team.</p>
            </div>
            @endif
        </div>
    </section>


{{-- Core Values --}}
<section style="padding:80px 0; background:#0A0F1E;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8B5CF6; margin-bottom:12px;">Core Values</span>
            <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                @if($lang === 'ar') قيمنا الأساسية @elseif($lang === 'de') Unsere Kernwerte @else Our Core Values @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px;">
            @foreach([
                ['icon' => '🎯', 'en' => 'Impact First',        'de' => 'Wirkung zuerst',       'ar' => 'الأثر أولاً',
                 'en_desc' => 'Every solution we build must create measurable, real-world impact.',
                 'de_desc' => 'Jede Lösung muss messbare Wirkung erzielen.',
                 'ar_desc' => 'كل حل نبنيه يجب أن يحقق تأثيراً حقيقياً وقابلاً للقياس.'],
                ['icon' => '🔬', 'en' => 'Research-Driven',     'de' => 'Forschungsgetrieben',   'ar' => 'مدفوع بالبحث',
                 'en_desc' => 'We ground our work in academic research and proven methodologies.',
                 'de_desc' => 'Wir stützen unsere Arbeit auf akademische Forschung.',
                 'ar_desc' => 'نستند في عملنا إلى البحث الأكاديمي والمنهجيات المثبتة.'],
                ['icon' => '🤝', 'en' => 'Ecosystem Thinking',  'de' => 'Ökosystem-Denken',      'ar' => 'التفكير البيئي',
                 'en_desc' => 'We believe in collaboration over competition — building together.',
                 'de_desc' => 'Wir glauben an Zusammenarbeit statt Wettbewerb.',
                 'ar_desc' => 'نؤمن بالتعاون على التنافس — نبني معاً.'],
                ['icon' => '⚡', 'en' => 'Speed & Discipline',  'de' => 'Geschwindigkeit & Disziplin', 'ar' => 'السرعة والانضباط',
                 'en_desc' => 'We deliver enterprise-grade outcomes with startup-level speed.',
                 'de_desc' => 'Wir liefern Unternehmensergebnisse mit Startup-Geschwindigkeit.',
                 'ar_desc' => 'نقدم نتائج على مستوى المؤسسات بسرعة الشركات الناشئة.'],
                ['icon' => '🌍', 'en' => 'European Values',     'de' => 'Europäische Werte',     'ar' => 'القيم الأوروبية',
                 'en_desc' => 'Privacy, transparency, and ethical AI are non-negotiable.',
                 'de_desc' => 'Datenschutz, Transparenz und ethische KI sind nicht verhandelbar.',
                 'ar_desc' => 'الخصوصية والشفافية والذكاء الاصطناعي الأخلاقي غير قابلة للتفاوض.'],
                ['icon' => '🚀', 'en' => 'Continuous Innovation', 'de' => 'Kontinuierliche Innovation', 'ar' => 'الابتكار المستمر',
                 'en_desc' => 'We never stop learning, experimenting, and pushing boundaries.',
                 'de_desc' => 'Wir hören nie auf zu lernen, zu experimentieren und Grenzen zu erweitern.',
                 'ar_desc' => 'لا نتوقف أبداً عن التعلم والتجريب ودفع الحدود.'],
            ] as $value)
            <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
                 onmouseover="this.style.borderColor='rgba(139,92,246,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #8B5CF6, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                <div style="font-size:28px; margin-bottom:16px;">{{ $value['icon'] }}</div>
                <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">
                    @if($lang === 'de') {{ $value['de'] }}
                    @elseif($lang === 'ar') {{ $value['ar'] }}
                    @else {{ $value['en'] }}
                    @endif
                </h3>
                <p style="font-size:13px; color:#64748B; line-height:1.7;">
                    @if($lang === 'de') {{ $value['de_desc'] }}
                    @elseif($lang === 'ar') {{ $value['ar_desc'] }}
                    @else {{ $value['en_desc'] }}
                    @endif
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Office Locations --}}
<section style="padding:80px 0; background:#080D1A;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#06B6D4; margin-bottom:12px;">Locations</span>
            <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                @if($lang === 'ar') مكاتبنا @elseif($lang === 'de') Unsere Standorte @else Where We Are @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
            @foreach([
                ['flag' => '🇩🇪', 'city' => 'Berlin', 'country_en' => 'Germany', 'country_de' => 'Deutschland', 'country_ar' => 'ألمانيا',
                 'type_en' => 'Headquarters', 'type_de' => 'Hauptsitz', 'type_ar' => 'المقر الرئيسي', 'color' => '#4F6EF7'],
                ['flag' => '🇪🇺', 'city' => 'European Union', 'country_en' => 'EU Markets', 'country_de' => 'EU-Märkte', 'country_ar' => 'أسواق الاتحاد الأوروبي',
                 'type_en' => 'Regional Operations', 'type_de' => 'Regionalbetrieb', 'type_ar' => 'العمليات الإقليمية', 'color' => '#10B981'],
                ['flag' => '🌍', 'city' => 'MENA Region', 'country_en' => 'Middle East & North Africa', 'country_de' => 'Naher Osten & Nordafrika', 'country_ar' => 'منطقة الشرق الأوسط وشمال أفريقيا',
                 'type_en' => 'Partner Network', 'type_de' => 'Partnernetzwerk', 'type_ar' => 'شبكة الشركاء', 'color' => '#F59E0B'],
            ] as $location)
            <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='{{ $location['color'] }}40'; this.style.background='#141D2E'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
                <div style="font-size:40px; margin-bottom:16px;">{{ $location['flag'] }}</div>
                <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:6px;">{{ $location['city'] }}</h3>
                <p style="font-size:14px; color:#94A3B8; margin-bottom:12px;">
                    @if($lang === 'de') {{ $location['country_de'] }}
                    @elseif($lang === 'ar') {{ $location['country_ar'] }}
                    @else {{ $location['country_en'] }}
                    @endif
                </p>
                <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 12px; border-radius:999px; background:{{ $location['color'] }}20; color:{{ $location['color'] }}; border:1px solid {{ $location['color'] }}40;">
                    @if($lang === 'de') {{ $location['type_de'] }}
                    @elseif($lang === 'ar') {{ $location['type_ar'] }}
                    @else {{ $location['type_en'] }}
                    @endif
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>




    
    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:640px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد التعاون مع HOPn؟ @elseif($lang === 'de') Möchten Sie mit HOPn zusammenarbeiten? @else Want to Partner with HOPn? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل معنا لمناقشة فرص الشراكة والتعاون.
                    @elseif($lang === 'de') Kontaktieren Sie uns, um Partnerschaftsmöglichkeiten zu besprechen.
                    @else Get in touch to discuss partnership, research collaboration, or innovation opportunities.
                    @endif
                </p>
                <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                    <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                       onmouseover="this.style.opacity='0.88'"
                       onmouseout="this.style.opacity='1'">
                        @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
                    </a>
                    <a href="{{ route('partners.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;"
                       onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        @if($lang === 'ar') عرض الشركاء @elseif($lang === 'de') Partner ansehen @else View Partners @endif
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
