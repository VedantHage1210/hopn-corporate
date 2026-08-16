@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'عن HOPn':($lang==='de'?'Über HOPn':'About HOPn')">
    
{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:70vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-150px; left:-100px; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.10) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') عن HOPn @elseif($lang==='de') Über HOPn @else About HOPn @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">نحن HOPn</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">مركز الابتكار الأوروبي</span>
            @elseif($lang==='de')
                <span style="color:white;">Wir sind HOPn —</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Europäischer Innovationshub</span>
            @else
                <span style="color:white;">We are HOPn —</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">European Innovation Hub</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:640px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') نربط الأعمال والتعليم والبحث لبناء حلول رقمية ذكية عبر أوروبا والشرق الأوسط.
            @elseif($lang==='de') Wir verbinden Business, Bildung und Forschung für intelligente digitale Lösungen.
            @else Connecting business, education, and research to build intelligent digital solutions across Europe and beyond. @endif
        </p>
        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:800px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>'50+',  'label'=>$lang==='ar'?'عميل مؤسسي':($lang==='de'?'Unternehmenskunden':'Enterprise Clients')],
                ['num'=>'10+',  'label'=>$lang==='ar'?'منتج ذكاء اصطناعي':($lang==='de'?'KI-Produkte':'AI Products')],
                ['num'=>'6',    'label'=>$lang==='ar'?'مجالات ابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')],
                ['num'=>'2020', 'label'=>$lang==='ar'?'تأسست':($lang==='de'?'Gegründet':'Founded')],
                ['num'=>'EU',   'label'=>$lang==='ar'?'موثوق':($lang==='de'?'Vertrauenswürdig':'Trusted')],
            ] as $stat)
            <div style="flex:1; min-width:120px; padding:24px 16px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:26px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:11px; color:#94A3B8; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MISSION & VISION --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
            <div style="position:relative; border:1px solid rgba(79,110,247,0.2); background:#0A0F1E; border-radius:20px; padding:40px; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#4F6EF7,#8B5CF6);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:20px;">🎯</div>
                <h2 style="font-size:24px; font-weight:800; color:white; margin-bottom:16px; letter-spacing:-0.5px;">
                    @if($lang==='ar') مهمتنا @elseif($lang==='de') Unsere Mission @else Our Mission @endif
                </h2>
                <p style="font-size:15px; color:#CBD5E1; line-height:1.8;">
                    @if($lang==='ar') تمكين المؤسسات والجامعات والشركات الناشئة من بناء مستقبل رقمي من خلال الذكاء الاصطناعي والبيانات والروبوتات والتوائم الرقمية.
                    @elseif($lang==='de') Unternehmen, Universitäten und Startups zu befähigen, eine digitale Zukunft durch KI, Daten, Robotik und digitale Zwillinge aufzubauen.
                    @else To empower enterprises, universities, and startups to build a digital future through AI, data, robotics, and digital twins — delivering measurable impact across Europe and MENA. @endif
                </p>
            </div>
            <div style="position:relative; border:1px solid rgba(139,92,246,0.2); background:#0A0F1E; border-radius:20px; padding:40px; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#8B5CF6,#06B6D4);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:rgba(139,92,246,0.1); border:1px solid rgba(139,92,246,0.2); display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:20px;">🔭</div>
                <h2 style="font-size:24px; font-weight:800; color:white; margin-bottom:16px; letter-spacing:-0.5px;">
                    @if($lang==='ar') رؤيتنا @elseif($lang==='de') Unsere Vision @else Our Vision @endif
                </h2>
                <p style="font-size:15px; color:#CBD5E1; line-height:1.8;">
                    @if($lang==='ar') أن نكون المنصة الرائدة في أوروبا التي تربط ابتكار الأعمال والبحث الأكاديمي وريادة الأعمال في نظام بيئي متكامل.
                    @elseif($lang==='de') Die führende europäische Plattform zu werden, die Business-Innovation, akademische Forschung und Unternehmertum in einem integrierten Ökosystem verbindet.
                    @else To become the leading European platform that bridges business innovation, academic research, and entrepreneurship — creating a complete innovation ecosystem for the digital age. @endif
                </p>
            </div>
        </div>
    </div>
</section>

{{-- WHO WE ARE --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:center;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                    @if($lang==='ar') من نحن @elseif($lang==='de') Wer wir sind @else Who We Are @endif
                </span>
                <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:24px; line-height:1.2;">
                    @if($lang==='ar') مركز ابتكار متعدد التخصصات
                    @elseif($lang==='de') Ein multidisziplinärer Innovationshub
                    @else A Multidisciplinary Innovation Hub @endif
                </h2>
                <p style="font-size:16px; color:#CBD5E1; line-height:1.8; margin-bottom:20px;">
                    @if($lang==='ar') HOPn هو شريك مؤسسي متعدد التخصصات يجمع الاستشارات والمنتجات الرقمية وبناء القدرات في منظومة ابتكار متكاملة.
                    @elseif($lang==='de') HOPn ist ein multidisziplinärer Unternehmenspartner, der Beratung, digitale Produkte und Kompetenzaufbau in einem integrierten Innovationsökosystem vereint.
                    @else HOPn is a multidisciplinary corporate partner that combines consulting, digital products, and capability building into one integrated innovation ecosystem — serving enterprises, universities, startups, and investors across Europe and MENA. @endif
                </p>
                <p style="font-size:16px; color:#CBD5E1; line-height:1.8;">
                    @if($lang==='ar') نتخصص في الذكاء الاصطناعي والروبوتات والتوائم الرقمية ومنصات البيانات.
                    @elseif($lang==='de') Wir sind spezialisiert auf KI, Robotik, digitale Zwillinge und Datenplattformen.
                    @else We specialize in AI, robotics, swarming systems, digital twins, healthcare technology, and data platforms. @endif
                </p>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                @php
                $domains=[
                    ['icon'=>'🤖','en'=>'Artificial Intelligence','de'=>'Künstliche Intelligenz','ar'=>'الذكاء الاصطناعي','color'=>'#4F6EF7'],
                    ['icon'=>'🦾','en'=>'Robotics','de'=>'Robotik','ar'=>'الروبوتات','color'=>'#10B981'],
                    ['icon'=>'🐝','en'=>'Swarming Systems','de'=>'Schwarmsysteme','ar'=>'أنظمة السرب','color'=>'#8B5CF6'],
                    ['icon'=>'🏭','en'=>'Digital Twins','de'=>'Digitale Zwillinge','ar'=>'التوائم الرقمية','color'=>'#F59E0B'],
                    ['icon'=>'🏥','en'=>'Healthcare Tech','de'=>'Gesundheitstechnologie','ar'=>'تكنولوجيا الصحة','color'=>'#EF4444'],
                    ['icon'=>'📊','en'=>'Data Platforms','de'=>'Datenplattformen','ar'=>'منصات البيانات','color'=>'#06B6D4'],
                ];
                @endphp
                @foreach($domains as $d)
                <div class="hopn-lift-card-nobg" style="border:1px solid {{ $d['color'] }}20; background:{{ $d['color'] }}08; border-radius:12px; padding:16px; display:flex; align-items:center; gap:10px; transition:all 0.25s;">
                    <span style="font-size:20px;">{{ $d['icon'] }}</span>
                    <span style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $d[$lang] ?? $d['en'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- TEAM --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') فريقنا @elseif($lang==='de') Unser Team @else Our Team @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') تعرف على الفريق @elseif($lang==='de') Das Team @else Meet the Team @endif
            </h2>
            <p style="color:#CBD5E1; max-width:500px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') خبراء في الذكاء الاصطناعي والروبوتيكا والبيانات والابتكار الرقمي
                @elseif($lang==='de') Experten für KI, Robotik, Daten und digitale Innovation
                @else Experts in AI, robotics, data, and digital innovation @endif
            </p>
        </div>
        @if($teamMembers->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px;">
            @foreach($teamMembers as $member)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-align:center; transition:all 0.25s; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                @if($member->photo)
                <img loading="lazy" decoding="async" src="{{ $member->photo }}" alt="{{ $member->name }}"
                     style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin:0 auto 16px; display:block; border:2px solid {{ $c }}30;">
                @else
                <div style="width:80px; height:80px; border-radius:50%; background:{{ $c }}15; border:2px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:28px; font-weight:900; color:{{ $c }};">
                    {{ strtoupper(substr($member->name,0,1)) }}
                </div>
                @endif
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:4px;">{{ $member->name }}</h3>
                <p style="font-size:13px; color:{{ $c }}; margin-bottom:8px; font-weight:600;">
                    @if($lang==='ar'&&!empty($member->role_ar)) {{ $member->role_ar }}
                    @elseif($lang==='de'&&!empty($member->role_de)) {{ $member->role_de }}
                    @else {{ $member->role_en ?? '' }} @endif
                </p>
                @php $bio=$lang==='ar'&&!empty($member->bio_ar)?$member->bio_ar:($lang==='de'&&!empty($member->bio_de)?$member->bio_de:($member->bio_en??'')); @endphp
                @if($bio)
                <p style="font-size:12px; color:#94A3B8; line-height:1.6;">{{ Str::limit($bio,80) }}</p>
                @endif
                @if($member->linkedin)
                <a href="{{ $member->linkedin }}" target="_blank"
                   class="hopn-bg-brighten" style="display:inline-block; margin-top:12px; font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none; border:1px solid {{ $c }}30; border-radius:6px; padding:4px 12px;">LinkedIn →</a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:60px; border:1px solid rgba(255,255,255,0.06); border-radius:16px; background:#0A0F1E;">
            <p style="font-size:15px; color:#94A3B8;">
                @if($lang==='ar') الفريق قادم قريباً @elseif($lang==='de') Team folgt in Kürze @else Team members coming soon @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- CORE VALUES --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') قيمنا الأساسية @elseif($lang==='de') Kernwerte @else Core Values @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ما الذي يقودنا @elseif($lang==='de') Was uns antreibt @else What Drives Us @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $values=[
                ['icon'=>'🎯','color'=>'#4F6EF7','en'=>'Impact First','de'=>'Wirkung zuerst','ar'=>'الأثر أولاً','desc_en'=>'Every solution must create measurable, real-world impact.','desc_de'=>'Jede Lösung muss messbare Wirkung erzielen.','desc_ar'=>'كل حل يجب أن يحقق تأثيراً حقيقياً.'],
                ['icon'=>'🔬','color'=>'#10B981','en'=>'Research-Driven','de'=>'Forschungsgetrieben','ar'=>'مدفوع بالبحث','desc_en'=>'We ground our work in academic research and proven methodologies.','desc_de'=>'Wir stützen unsere Arbeit auf akademische Forschung.','desc_ar'=>'نستند إلى البحث الأكاديمي والمنهجيات المثبتة.'],
                ['icon'=>'🤝','color'=>'#8B5CF6','en'=>'Ecosystem Thinking','de'=>'Ökosystem-Denken','ar'=>'التفكير البيئي','desc_en'=>'We believe in collaboration over competition — building together.','desc_de'=>'Zusammenarbeit statt Wettbewerb — gemeinsam aufbauen.','desc_ar'=>'نؤمن بالتعاون على التنافس.'],
                ['icon'=>'⚡','color'=>'#F59E0B','en'=>'Speed & Discipline','de'=>'Geschwindigkeit & Disziplin','ar'=>'السرعة والانضباط','desc_en'=>'Enterprise-grade outcomes with startup-level speed.','desc_de'=>'Unternehmensergebnisse mit Startup-Geschwindigkeit.','desc_ar'=>'نتائج على مستوى المؤسسات بسرعة الشركات الناشئة.'],
                ['icon'=>'🌍','color'=>'#06B6D4','en'=>'European Values','de'=>'Europäische Werte','ar'=>'القيم الأوروبية','desc_en'=>'Privacy, transparency, and ethical AI are non-negotiable.','desc_de'=>'Datenschutz, Transparenz und ethische KI sind nicht verhandelbar.','desc_ar'=>'الخصوصية والشفافية والذكاء الاصطناعي الأخلاقي.'],
                ['icon'=>'🚀','color'=>'#EF4444','en'=>'Continuous Innovation','de'=>'Kontinuierliche Innovation','ar'=>'الابتكار المستمر','desc_en'=>'We never stop learning, experimenting, and pushing boundaries.','desc_de'=>'Wir hören nie auf zu lernen und Grenzen zu erweitern.','desc_ar'=>'لا نتوقف عن التعلم والتجريب.'],
            ];
            @endphp
            @foreach($values as $v)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $v['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $v['color'] }}15; border:1px solid {{ $v['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $v['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $v[$lang] ?? $v['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $v['desc_'.$lang] ?? $v['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- RESEARCH & PARTNERSHIPS --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') البحث والشراكات @elseif($lang==='de') Forschung & Partnerschaften @else Research & Partnerships @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') كيف نتعاون @elseif($lang==='de') Wie wir zusammenarbeiten @else How We Collaborate @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px;">
            @php
            $collab=[
                ['icon'=>'🎓','color'=>'#4F6EF7','en'=>'University Collaboration','de'=>'Universitätszusammenarbeit','ar'=>'التعاون الجامعي','desc_en'=>'Joint research programs, thesis supervision, and industry-academia innovation bridges.','desc_de'=>'Gemeinsame Forschungsprogramme und Industrie-Akademie-Brücken.','desc_ar'=>'برامج بحثية مشتركة وجسور الابتكار.'],
                ['icon'=>'🔬','color'=>'#10B981','en'=>'Applied Research','de'=>'Angewandte Forschung','ar'=>'البحث التطبيقي','desc_en'=>'Turning academic research into real-world products and enterprise solutions.','desc_de'=>'Akademische Forschung in reale Produkte verwandeln.','desc_ar'=>'تحويل البحث الأكاديمي إلى منتجات حقيقية.'],
                ['icon'=>'🤝','color'=>'#8B5CF6','en'=>'Strategic Partnerships','de'=>'Strategische Partnerschaften','ar'=>'الشراكات الاستراتيجية','desc_en'=>'Long-term partnerships with enterprises, investors, and technology companies.','desc_de'=>'Langfristige Partnerschaften mit Unternehmen und Investoren.','desc_ar'=>'شراكات طويلة الأمد مع المؤسسات والمستثمرين.'],
                ['icon'=>'🌍','color'=>'#F59E0B','en'=>'European Network','de'=>'Europäisches Netzwerk','ar'=>'الشبكة الأوروبية','desc_en'=>'Active network across Germany, EU, and MENA with local presence and global reach.','desc_de'=>'Aktives Netzwerk in Deutschland, EU und MENA.','desc_ar'=>'شبكة نشطة في ألمانيا والاتحاد الأوروبي والشرق الأوسط.'],
            ];
            @endphp
            @foreach($collab as $item)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $item['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $item['color'] }}15; border:1px solid {{ $item['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- LOCATIONS --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#06B6D4; margin-bottom:16px;">
                @if($lang==='ar') مواقعنا @elseif($lang==='de') Standorte @else Locations @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') أين نحن @elseif($lang==='de') Wo wir sind @else Where We Are @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px;">
            @foreach([
                ['flag'=>'🇩🇪','city'=>'Berlin','en'=>'Germany','de'=>'Deutschland','ar'=>'ألمانيا','type_en'=>'Headquarters','type_de'=>'Hauptsitz','type_ar'=>'المقر الرئيسي','color'=>'#4F6EF7'],
                ['flag'=>'🇪🇺','city'=>'European Union','en'=>'EU Markets','de'=>'EU-Märkte','ar'=>'أسواق الاتحاد الأوروبي','type_en'=>'Regional Operations','type_de'=>'Regionalbetrieb','type_ar'=>'العمليات الإقليمية','color'=>'#10B981'],
                ['flag'=>'🌍','city'=>'MENA Region','en'=>'Middle East & North Africa','de'=>'Naher Osten & Nordafrika','ar'=>'الشرق الأوسط وشمال أفريقيا','type_en'=>'Partner Network','type_de'=>'Partnernetzwerk','type_ar'=>'شبكة الشركاء','color'=>'#F59E0B'],
            ] as $loc)
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s;">
                <div style="font-size:40px; margin-bottom:16px;">{{ $loc['flag'] }}</div>
                <h3 style="font-size:20px; font-weight:700; color:white; margin-bottom:6px;">{{ $loc['city'] }}</h3>
                <p style="font-size:14px; color:#CBD5E1; margin-bottom:16px;">{{ $loc[$lang] ?? $loc['en'] }}</p>
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:{{ $loc['color'] }}15; color:{{ $loc['color'] }}; border:1px solid {{ $loc['color'] }}30; text-transform:uppercase; letter-spacing:0.06em;">
                    {{ $loc['type_'.$lang] ?? $loc['type_en'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:100px 0; background:#050A14; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.07) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد التعاون مع HOPn؟ @elseif($lang==='de') Mit HOPn zusammenarbeiten? @else Want to Partner with HOPn? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل معنا لمناقشة فرص الشراكة والتعاون.
            @elseif($lang==='de') Kontaktieren Sie uns für Partnerschaftsmöglichkeiten.
            @else Get in touch to discuss partnership, research, or innovation opportunities. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif →
            </a>
            <a href="{{ route('partners.index', ['lang'=>$lang]) }}"
               class="hopn-bg-brighten" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
                @if($lang==='ar') عرض الشركاء @elseif($lang==='de') Partner ansehen @else View Partners @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>
