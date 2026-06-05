<x-layouts.public :title="'Startup Ecosystem — HOPn'">
@php($lang = request()->route('lang', 'en'))

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:80vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-200px; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.10) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#8B5CF6; display:inline-block; box-shadow:0 0 8px #8B5CF6;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') نظام HOPn البيئي للشركات الناشئة @elseif($lang==='de') HOPn Startup-Ökosystem @else HOPn Startup Ecosystem @endif
            </span>
        </div>

        <h1 style="font-size:clamp(36px,6vw,76px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">من الفكرة إلى التأثير</span><br>
                <span style="background:linear-gradient(135deg, #8B5CF6, #4F6EF7, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">نبني معك من اليوم الأول</span>
            @elseif($lang==='de')
                <span style="color:white;">Von der Idee zur Wirkung —</span><br>
                <span style="background:linear-gradient(135deg, #8B5CF6, #4F6EF7, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">wir bauen mit Ihnen</span>
            @else
                <span style="color:white;">From Idea to Impact —</span><br>
                <span style="background:linear-gradient(135deg, #8B5CF6, #4F6EF7, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">We Build With You</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2vw,20px); color:#64748B; max-width:600px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') HOPn يدعم رواد الأعمال من خلال التوجيه والتمويل والبنية التحتية التقنية العميقة.
            @elseif($lang==='de') HOPn unterstützt Gründer durch Mentoring, Kapital und Deep-Tech-Infrastruktur.
            @else HOPn supports founders through mentoring, capital access, and deep-tech infrastructure — from day zero to scale. @endif
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:64px;">
            <a href="#apply"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(139,92,246,0.4);"
               onmouseover="this.style.transform='translateY(-2px)'"
               onmouseout="this.style.transform='translateY(0)'">
                @if($lang==='ar') قدم شركتك @elseif($lang==='de') Startup bewerben @else Apply Your Startup @endif →
            </a>
            <a href="#programs"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') استكشف البرامج @elseif($lang==='de') Programme erkunden @else Explore Programs @endif
            </a>
        </div>

        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:700px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>'50+',  'en'=>'Startups Supported',  'de'=>'Unterstützte Startups', 'ar'=>'شركة ناشئة مدعومة'],
                ['num'=>'€2M+', 'en'=>'Funding Facilitated', 'de'=>'Finanzierung vermittelt','ar'=>'تمويل تم تسهيله'],
                ['num'=>'12',   'en'=>'Mentor Network',      'de'=>'Mentor-Netzwerk',       'ar'=>'شبكة المرشدين'],
                ['num'=>'EU',   'en'=>'Market Reach',        'de'=>'Marktreichweite',       'ar'=>'الوصول للسوق'],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 20px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:28px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:12px; color:#475569; margin-top:4px;">{{ $stat[$lang] ?? $stat['en'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Ecosystem Visual --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') كيف يعمل @elseif($lang==='de') Wie es funktioniert @else How It Works @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') رحلة الشركة الناشئة في HOPn @elseif($lang==='de') Die Startup-Reise bei HOPn @else The HOPn Startup Journey @endif
            </h2>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:0; position:relative;">
           @php
$steps = [
    ['num'=>'01','icon'=>'💡','en'=>'Apply','de'=>'Bewerben','ar'=>'التقديم',
     'desc_en'=>'Submit your startup application and tell us about your vision.',
     'desc_de'=>'Bewerben Sie sich und teilen Sie Ihre Vision.',
     'desc_ar'=>'قدم طلبك وأخبرنا عن رؤيتك.','color'=>'#4F6EF7'],
    ['num'=>'02','icon'=>'🔍','en'=>'Review','de'=>'Prüfung','ar'=>'المراجعة',
     'desc_en'=>'Our team reviews your application within 5 business days.',
     'desc_de'=>'Unser Team prüft innerhalb von 5 Werktagen.',
     'desc_ar'=>'فريقنا يراجع طلبك خلال 5 أيام عمل.','color'=>'#8B5CF6'],
    ['num'=>'03','icon'=>'🤝','en'=>'Onboard','de'=>'Aufnahme','ar'=>'الانضمام',
     'desc_en'=>'Join the ecosystem with access to mentors, tools, and network.',
     'desc_de'=>'Treten Sie dem Ökosystem bei.',
     'desc_ar'=>'انضم للنظام البيئي مع الوصول للموارد.','color'=>'#10B981'],
    ['num'=>'04','icon'=>'🚀','en'=>'Scale','de'=>'Skalieren','ar'=>'التوسع',
     'desc_en'=>'Build, validate, and scale with HOPn support at every step.',
     'desc_de'=>'Aufbauen, validieren und skalieren.',
     'desc_ar'=>'ابنِ واتحقق وتوسع مع دعم HOPn.','color'=>'#F59E0B'],
];
@endphp
            @foreach($steps as $i => $step)
            <div style="padding:32px 24px; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; position:relative; transition:all 0.25s; @if(!$loop->last) border-right:none; @endif"
                 onmouseover="this.style.background='#0D1425'; this.style.borderColor='{{ $step['color'] }}30'"
                 onmouseout="this.style.background='#0A0F1E'; this.style.borderColor='rgba(255,255,255,0.06)'">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, {{ $step['color'] }}, transparent);"></div>
                <div style="font-size:11px; font-weight:800; color:{{ $step['color'] }}; letter-spacing:0.1em; margin-bottom:12px;">{{ $step['num'] }}</div>
                <div style="font-size:28px; margin-bottom:12px;">{{ $step['icon'] }}</div>
                <h3 style="font-size:17px; font-weight:700; color:white; margin-bottom:10px;">
                    {{ $step[$lang] ?? $step['en'] }}
                </h3>
                <p style="font-size:13px; color:#475569; line-height:1.7;">
                    {{ $step['desc_'.$lang] ?? $step['desc_en'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- What We Offer --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') ما نقدمه @elseif($lang==='de') Was wir bieten @else What We Offer @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') دعم كامل للشركات الناشئة @elseif($lang==='de') Vollständige Startup-Unterstützung @else Full-Stack Startup Support @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $offers = [
                ['icon'=>'🚀','en'=>'Venture Building','de'=>'Venture Building','ar'=>'بناء المشاريع','color'=>'#8B5CF6',
                 'desc_en'=>'Co-build your startup from idea to product with HOPn engineering and design teams.',
                 'desc_de'=>'Co-Aufbau Ihres Startups von der Idee zum Produkt.',
                 'desc_ar'=>'ابنِ شركتك الناشئة من الفكرة إلى المنتج مع فرق هندسة وتصميم HOPn.'],
                ['icon'=>'🧠','en'=>'Mentoring & Advisory','de'=>'Mentoring & Beratung','ar'=>'الإرشاد والاستشارة','color'=>'#4F6EF7',
                 'desc_en'=>'Access a network of industry experts, CTOs, and serial entrepreneurs.',
                 'desc_de'=>'Zugang zu Branchenexperten, CTOs und Serienunternehmern.',
                 'desc_ar'=>'الوصول إلى شبكة من خبراء الصناعة ورؤساء التكنولوجيا.'],
                ['icon'=>'💰','en'=>'Investor Access','de'=>'Investorenzugang','ar'=>'الوصول للمستثمرين','color'=>'#10B981',
                 'desc_en'=>'Connect with HOPn investor network and funding partners across Europe.',
                 'desc_de'=>'Verbindung mit dem HOPn-Investorennetzwerk in Europa.',
                 'desc_ar'=>'التواصل مع شبكة مستثمري HOPn عبر أوروبا.'],
                ['icon'=>'🔬','en'=>'Research & Innovation','de'=>'Forschung & Innovation','ar'=>'البحث والابتكار','color'=>'#F59E0B',
                 'desc_en'=>'Collaborate with universities and R&D labs to build cutting-edge solutions.',
                 'desc_de'=>'Zusammenarbeit mit Universitäten und F&E-Laboren.',
                 'desc_ar'=>'التعاون مع الجامعات ومختبرات البحث والتطوير.'],
                ['icon'=>'🛠','en'=>'Tech Infrastructure','de'=>'Tech-Infrastruktur','ar'=>'البنية التحتية التقنية','color'=>'#06B6D4',
                 'desc_en'=>'AI, data, cloud, and DevOps infrastructure to accelerate your build.',
                 'desc_de'=>'KI-, Daten-, Cloud- und DevOps-Infrastruktur.',
                 'desc_ar'=>'بنية تحتية للذكاء الاصطناعي والبيانات والسحابة وDevOps.'],
                ['icon'=>'🌍','en'=>'Market Access','de'=>'Marktzugang','ar'=>'الوصول للسوق','color'=>'#EF4444',
                 'desc_en'=>'Enter European, Middle Eastern, and global markets via HOPn partner network.',
                 'desc_de'=>'Eintritt in europäische und globale Märkte.',
                 'desc_ar'=>'دخول الأسواق الأوروبية والشرق أوسطية والعالمية.'],
            ];
            @endphp
            @foreach($offers as $item)
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $item['color'] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-4px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $item['color'] }}50, transparent);"></div>
                <div style="font-size:32px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:10px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                <p style="font-size:13px; color:#475569; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Programs --}}
<section id="programs" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') البرامج @elseif($lang==='de') Programme @else Programs @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') برامج الابتكار @elseif($lang==='de') Innovationsprogramme @else Innovation Programs @endif
            </h2>
            <p style="color:#64748B; max-width:500px; margin:16px auto 0; font-size:16px;">
                @if($lang==='ar') برامج مصممة لتسريع نمو شركتك الناشئة
                @elseif($lang==='de') Programme zur Beschleunigung Ihres Startup-Wachstums
                @else Programs designed to accelerate your startup's growth @endif
            </p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @php
            $programs = [
                ['name'=>'HOPn Launchpad','badge_en'=>'Applications Open','badge_de'=>'Bewerbungen offen','badge_ar'=>'الطلبات مفتوحة',
                 'desc_en'=>'12-week intensive program to validate and launch your startup idea with expert mentorship.',
                 'desc_de'=>'12-wöchiges intensives Programm zur Validierung Ihrer Startup-Idee.',
                 'desc_ar'=>'برنامج مكثف لمدة 12 أسبوعاً للتحقق من فكرتك وإطلاقها.',
                 'features_en'=>['Expert mentorship','Weekly workshops','Demo Day pitch','Investor introductions'],
                 'color'=>'#4F6EF7'],
                ['name'=>'AI Founders Track','badge_en'=>'Coming Soon','badge_de'=>'Demnächst','badge_ar'=>'قريباً',
                 'desc_en'=>'Specialized program for AI and data-driven startups with technical mentorship and compute resources.',
                 'desc_de'=>'Spezialisiertes Programm für KI-Startups.',
                 'desc_ar'=>'برنامج متخصص للشركات الناشئة المدفوعة بالذكاء الاصطناعي والبيانات.',
                 'features_en'=>['AI/ML mentors','Compute credits','Research partnerships','Technical deep dives'],
                 'color'=>'#8B5CF6'],
                ['name'=>'Deep Tech Studio','badge_en'=>'Invite Only','badge_de'=>'Nur auf Einladung','badge_ar'=>'بدعوة فقط',
                 'desc_en'=>'Co-building program for robotics, digital twins, and hardware startups with lab access.',
                 'desc_de'=>'Co-Building-Programm für Robotik und digitale Zwillinge.',
                 'desc_ar'=>'برنامج التطوير المشترك للشركات الناشئة في الروبوتيكا والتوائم الرقمية.',
                 'features_en'=>['Lab access','Hardware prototyping','University partnerships','Enterprise pilots'],
                 'color'=>'#10B981'],
            ];
            @endphp
            @foreach($programs as $program)
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; padding:32px; display:flex; flex-direction:column; overflow:hidden; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='{{ $program['color'] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-4px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, {{ $program['color'] }}, transparent);"></div>
                <div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:16px; flex-wrap:wrap; gap:8px;">
                    <h3 style="font-size:20px; font-weight:800; color:white;">{{ $program['name'] }}</h3>
                    <span style="font-size:10px; font-weight:700; padding:4px 12px; border-radius:999px; background:{{ $program['color'] }}15; color:{{ $program['color'] }}; border:1px solid {{ $program['color'] }}30; white-space:nowrap;">
                        {{ $program['badge_'.$lang] ?? $program['badge_en'] }}
                    </span>
                </div>
                <p style="font-size:14px; color:#64748B; line-height:1.7; margin-bottom:20px; flex:1;">
                    {{ $program['desc_'.$lang] ?? $program['desc_en'] }}
                </p>
                <div style="display:flex; flex-direction:column; gap:8px; margin-bottom:24px;">
                    @foreach($program['features_en'] as $feature)
                    <div style="display:flex; align-items:center; gap:8px; font-size:13px; color:#94A3B8;">
                        <span style="width:6px; height:6px; border-radius:50%; background:{{ $program['color'] }}; flex-shrink:0;"></span>
                        {{ $feature }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
                   style="display:inline-flex; align-items:center; gap:6px; font-size:14px; font-weight:600; color:{{ $program['color'] }}; text-decoration:none;"
                   onmouseover="this.style.opacity='0.7'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn More @endif →
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Startups Grid --}}
@if($startups->count() > 0)
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') شركاتنا الناشئة @elseif($lang==='de') Unsere Startups @else Our Startups @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') الشركات الناشئة في النظام البيئي @elseif($lang==='de') Startups im Ökosystem @else Startups in Our Ecosystem @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
            @foreach($startups as $startup)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-4px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $c }}50, transparent);"></div>

                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="display:flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:{{ $c }}15; border:1px solid {{ $c }}30; font-size:18px; font-weight:800; color:{{ $c }}; flex-shrink:0;">
                        {{ strtoupper(substr($startup->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 style="font-size:16px; font-weight:700; color:white;">{{ $startup->name }}</h3>
                        @if($startup->industry)
                        <span style="font-size:11px; color:#475569;">{{ $startup->industry }}</span>
                        @endif
                    </div>
                </div>

                @if($startup->description)
                <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1; margin-bottom:16px;">
                    {{ Str::limit($startup->description, 100) }}
                </p>
                @endif

                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                    @if($startup->stage)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20;">
                        {{ ucfirst($startup->stage) }}
                    </span>
                    @endif
                    @if($startup->website)
                    <a href="{{ $startup->website }}" target="_blank"
                       style="font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none; opacity:0.8;"
                       onmouseover="this.style.opacity='1'"
                       onmouseout="this.style.opacity='0.8'">Visit →</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Application Form --}}
<section id="apply" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="max-width:680px; margin:0 auto;">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">Apply</span>
                <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px;">
                    @if($lang==='ar') قدم شركتك الناشئة @elseif($lang==='de') Startup bewerben @else Apply with Your Startup @endif
                </h2>
                <p style="color:#64748B; font-size:16px; margin-top:16px; line-height:1.7; max-width:480px; margin-left:auto; margin-right:auto;">
                    @if($lang==='ar') انضم إلى نظام HOPn البيئي للشركات الناشئة واحصل على الموارد والدعم.
                    @elseif($lang==='de') Treten Sie dem HOPn-Startup-Ökosystem bei und erhalten Sie Ressourcen und Unterstützung.
                    @else Join the HOPn startup ecosystem and get access to mentoring, funding, and tech infrastructure. @endif
                </p>
            </div>

            <div style="border:1px solid rgba(139,92,246,0.2); background:#0A0F1E; border-radius:20px; padding:40px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, #8B5CF6, transparent);"></div>

                @if(session('startup_success'))
                <div style="margin-bottom:24px; padding:16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:10px; color:#10B981; font-size:14px;">
                    ✅ {{ session('startup_success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('leads.startup-application', ['lang'=>$lang]) }}">
                    @csrf
                    <div style="display:grid; gap:20px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                    @if($lang==='ar') اسم المؤسس @elseif($lang==='de') Gründername @else Founder Name @endif *
                                </label>
                                <input type="text" name="founder_name" required
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                    @if($lang==='ar') البريد الإلكتروني @elseif($lang==='de') E-Mail @else Email Address @endif *
                                </label>
                                <input type="email" name="email" required
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                @if($lang==='ar') اسم الشركة الناشئة @elseif($lang==='de') Startup-Name @else Startup Name @endif *
                            </label>
                            <input type="text" name="startup_name" required
                                   style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='#8B5CF6'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                    @if($lang==='ar') القطاع @elseif($lang==='de') Branche @else Industry @endif
                                </label>
                                <input type="text" name="industry"
                                       placeholder="AI, Healthcare, FinTech..."
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                    @if($lang==='ar') المرحلة @elseif($lang==='de') Phase @else Stage @endif
                                </label>
                                <select name="stage"
                                        style="width:100%; padding:12px 16px; background:#0D1425; border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;">
                                    <option value="idea">💡 Idea</option>
                                    <option value="mvp">🔧 MVP</option>
                                    <option value="seed">🌱 Seed</option>
                                    <option value="series-a">📈 Series A</option>
                                    <option value="growth">🚀 Growth</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:8px;">
                                @if($lang==='ar') أخبرنا عن شركتك الناشئة @elseif($lang==='de') Erzählen Sie uns von Ihrem Startup @else Tell us about your startup @endif
                            </label>
                            <textarea name="message" rows="5"
                                      placeholder="{{ $lang==='ar'?'ما المشكلة التي تحلها؟':'What problem are you solving? What makes your startup unique?' }}"
                                      style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; resize:vertical; outline:none;"
                                      onfocus="this.style.borderColor='#8B5CF6'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                        </div>

                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr_consent" id="gdpr_startup" required style="margin-top:3px; flex-shrink:0;">
                            <label for="gdpr_startup" style="font-size:12px; color:#64748B; line-height:1.6;">
                                @if($lang==='ar') أوافق على سياسة الخصوصية ومعالجة البيانات. *
                                @elseif($lang==='de') Ich stimme der Datenschutzerklärung und der Datenverarbeitung zu. *
                                @else I agree to the Privacy Policy and consent to data processing. * @endif
                            </label>
                        </div>

                        <button type="submit"
                                style="width:100%; padding:16px; border-radius:10px; background:#8B5CF6; color:white; font-size:16px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 30px rgba(139,92,246,0.3); transition:all 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 40px rgba(139,92,246,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 30px rgba(139,92,246,0.3)'">
                            @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Submit Application @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(139,92,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(139,92,246,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:600px; height:300px; background:radial-gradient(ellipse, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل أنت مستعد لبناء المستقبل؟ @elseif($lang==='de') Bereit, die Zukunft zu bauen? @else Ready to Build the Future? @endif
        </h2>
        <p style="color:#64748B; font-size:17px; max-width:480px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn للشركات الناشئة اليوم.
            @elseif($lang==='de') Kontaktieren Sie das HOPn-Startup-Team heute.
            @else Get in touch with the HOPn startup team today. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="#apply"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 30px rgba(139,92,246,0.3);"
               onmouseover="this.style.transform='translateY(-2px)'"
               onmouseout="this.style.transform='translateY(0)'">
                @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Apply Now @endif →
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Contact Us @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>
