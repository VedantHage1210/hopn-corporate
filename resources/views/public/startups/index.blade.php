<x-layouts.public :title="$lang==='ar'?'الشركات الناشئة':($lang==='de'?'Startups':'Startup Ecosystem')">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:80vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-150px; left:-100px; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.12) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') النظام البيئي للشركات الناشئة @elseif($lang==='de') Startup-Ökosystem @else Startup Ecosystem @endif
            </span>
        </div>

        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">بناء الجيل القادم</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">من الشركات الناشئة</span>
            @elseif($lang==='de')
                <span style="color:white;">Die nächste Generation</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">von Startups aufbauen</span>
            @else
                <span style="color:white;">Building the Next</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Generation of Startups</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2vw,20px); color:#64748B; max-width:600px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') HOPn يدعم رواد الأعمال من خلال التوجيه والتمويل والبنية التحتية التقنية المتعمقة.
            @elseif($lang==='de') HOPn unterstützt Gründer durch Mentoring, Kapitalzugang und Deep-Tech-Infrastruktur.
            @else HOPn supports founders through mentoring, capital access, and deep-tech infrastructure.
            @endif
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:64px;">
            <a href="#apply"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'"
               onmouseout="this.style.transform='translateY(0)'">
                @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Apply Now @endif →
            </a>
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') استكشف البرامج @elseif($lang==='de') Programme erkunden @else Explore Programs @endif
            </a>
        </div>

        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:700px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>'50+', 'label'=>$lang==='ar'?'شركة ناشئة':($lang==='de'?'Startups':'Startups')],
                ['num'=>'€2M+','label'=>$lang==='ar'?'تمويل مُيسَّر':($lang==='de'?'Vermitteltes Kapital':'Capital Facilitated')],
                ['num'=>'12',  'label'=>$lang==='ar'?'دولة':($lang==='de'?'Länder':'Countries')],
                ['num'=>'95%', 'label'=>$lang==='ar'?'معدل النجاح':($lang==='de'?'Erfolgsquote':'Success Rate')],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 16px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:26px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:11px; color:#475569; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WHAT WE OFFER --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') ما نقدمه @elseif($lang==='de') Was wir bieten @else What We Offer @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') دعم شامل للشركات الناشئة @elseif($lang==='de') Vollständige Startup-Unterstützung @else Full-Stack Startup Support @endif
            </h2>
            <p style="color:#64748B; max-width:500px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') كل ما تحتاجه من الفكرة إلى الإطلاق وما بعده
                @elseif($lang==='de') Alles was Sie von der Idee bis zum Launch brauchen
                @else Everything you need from idea to launch and beyond @endif
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $offerings = [
                ['icon'=>'🚀','color'=>'#4F6EF7','en'=>'Venture Building','de'=>'Venture Building','ar'=>'بناء المشاريع','desc_en'=>'Co-build your startup from idea to product with HOPn engineering and design teams.','desc_de'=>'Gemeinsam Ihr Startup von der Idee zum Produkt aufbauen.','desc_ar'=>'بناء مشتركة من الفكرة إلى المنتج مع فرق هندسة HOPn.'],
                ['icon'=>'🧠','color'=>'#8B5CF6','en'=>'Mentoring & Advisory','de'=>'Mentoring & Beratung','ar'=>'الإرشاد والاستشارة','desc_en'=>'Access a network of industry experts, CTOs, and serial entrepreneurs.','desc_de'=>'Zugang zu Branchenexperten, CTOs und Serienunternehmern.','desc_ar'=>'الوصول إلى شبكة من الخبراء والمسؤولين التقنيين.'],
                ['icon'=>'💰','color'=>'#10B981','en'=>'Investor Access','de'=>'Investorenzugang','ar'=>'الوصول للمستثمرين','desc_en'=>'Connect with HOPn investor network and funding partners across Europe.','desc_de'=>'Verbindung zum HOPn-Investorennetzwerk in ganz Europa.','desc_ar'=>'التواصل مع شبكة مستثمري HOPn في أوروبا.'],
                ['icon'=>'🔬','color'=>'#F59E0B','en'=>'Research & Innovation','de'=>'Forschung & Innovation','ar'=>'البحث والابتكار','desc_en'=>'Collaborate with universities and R&D labs to build cutting-edge solutions.','desc_de'=>'Zusammenarbeit mit Universitäten und F&E-Labors.','desc_ar'=>'التعاون مع الجامعات ومختبرات البحث والتطوير.'],
                ['icon'=>'🛠','color'=>'#06B6D4','en'=>'Tech Infrastructure','de'=>'Tech-Infrastruktur','ar'=>'البنية التحتية التقنية','desc_en'=>'AI, data, cloud, and DevOps infrastructure to accelerate your build.','desc_de'=>'KI-, Daten-, Cloud- und DevOps-Infrastruktur für schnellere Entwicklung.','desc_ar'=>'بنية تحتية للذكاء الاصطناعي والبيانات والسحابة.'],
                ['icon'=>'🌍','color'=>'#EF4444','en'=>'Market Access','de'=>'Marktzugang','ar'=>'الوصول للسوق','desc_en'=>'Enter European, MENA, and global markets with HOPn partner network.','desc_de'=>'Eintritt in europäische, MENA- und globale Märkte.','desc_ar'=>'الدخول إلى الأسواق الأوروبية والشرق أوسطية والعالمية.'],
            ];
            @endphp
            @foreach($offerings as $item)
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $item['color'] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $item['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $item['color'] }}15; border:1px solid {{ $item['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:10px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                <p style="font-size:13px; color:#475569; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STARTUPS SHOWCASE --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang==='ar') شركاتنا الناشئة @elseif($lang==='de') Unsere Startups @else Our Startups @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') الشركات الناشئة في النظام البيئي @elseif($lang==='de') Startups im Ökosystem @else Startups in Our Ecosystem @endif
                </h2>
            </div>
        </div>

        @if($startups->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
            @foreach($startups as $startup)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden; display:flex; flex-direction:column; gap:14px;"
                 onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                <div style="display:flex; align-items:center; gap:14px;">
                    @if($startup->logo)
                    <img src="{{ $startup->logo }}" alt="{{ $startup->name }}"
                         style="width:44px; height:44px; border-radius:10px; object-fit:contain; background:rgba(255,255,255,0.05); padding:4px; border:1px solid rgba(255,255,255,0.08);">
                    @else
                    <div style="width:44px; height:44px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:{{ $c }}; flex-shrink:0;">
                        {{ strtoupper(substr($startup->name,0,1)) }}
                    </div>
                    @endif
                    <div>
                        <h3 style="font-size:16px; font-weight:700; color:white; margin:0;">{{ $startup->name }}</h3>
                        @if($startup->industry)
                        <span style="font-size:12px; color:#475569;">{{ $startup->industry }}</span>
                        @endif
                    </div>
                </div>
                @if($startup->description)
                <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1; margin:0;">{{ Str::limit($startup->description,110) }}</p>
                @endif
                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                    @if($startup->stage)
                    <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase;">{{ $startup->stage }}</span>
                    @endif
                    @if($startup->website)
                    <a href="{{ $startup->website }}" target="_blank"
                       style="font-size:13px; font-weight:600; color:{{ $c }}; text-decoration:none;"
                       onmouseover="this.style.opacity='0.7'"
                       onmouseout="this.style.opacity='1'">
                        @if($lang==='ar') زيارة @elseif($lang==='de') Besuchen @else Visit @endif →
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:80px; color:#334155;">
            <div style="font-size:48px; margin-bottom:16px;">🚀</div>
            <h3 style="font-size:20px; font-weight:700; color:#475569; margin-bottom:8px;">
                @if($lang==='ar') الشركات الناشئة قادمة قريباً @elseif($lang==='de') Startups folgen in Kürze @else Startups Coming Soon @endif
            </h3>
            <p style="font-size:14px; color:#334155;">
                @if($lang==='ar') أضف الشركات الناشئة من لوحة الإدارة @elseif($lang==='de') Startups über das Admin-Panel hinzufügen @else Add startups from the admin panel @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- PROGRAMS --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') البرامج @elseif($lang==='de') Programme @else Programs @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') برامج الابتكار @elseif($lang==='de') Innovationsprogramme @else Innovation Programs @endif
            </h2>
        </div>

        @if($programs->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($programs as $program)
            @php $colors=['#4F6EF7','#8B5CF6','#10B981']; $c=$colors[$loop->index%3]; $title=$lang==='de'&&$program->title_de?$program->title_de:$program->title_en; $summary=$lang==='de'&&$program->summary_de?$program->summary_de:($program->summary_en??''); @endphp
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; display:flex; flex-direction:column; gap:16px; overflow:hidden; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $c }},transparent);"></div>
                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                    <h3 style="font-size:18px; font-weight:700; color:white; margin:0;">{{ $title }}</h3>
                    <span style="font-size:10px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase;">
                        @if($lang==='ar') برنامج @elseif($lang==='de') Programm @else Program @endif
                    </span>
                </div>
                <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1;">{{ Str::limit($summary,100) }}</p>
                <a href="{{ route('programs.show', ['lang'=>$lang,'slug'=>$program->slug]) }}"
                   style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }}; text-decoration:none;">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn More @endif →
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach([
                ['name'=>'HOPn Launchpad','desc'=>'12-week intensive program to validate and launch your startup idea.','badge'=>'Applications Open','color'=>'#4F6EF7'],
                ['name'=>'AI Founders Track','desc'=>'Specialized program for AI and data-driven startups with technical mentorship.','badge'=>'Coming Soon','color'=>'#8B5CF6'],
                ['name'=>'Deep Tech Studio','desc'=>'Co-building program for robotics, digital twins, and hardware startups.','badge'=>'Invite Only','color'=>'#10B981'],
            ] as $program)
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; display:flex; flex-direction:column; gap:16px; overflow:hidden; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='{{ $program['color'] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $program['color'] }},transparent);"></div>
                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                    <h3 style="font-size:18px; font-weight:700; color:white; margin:0;">{{ $program['name'] }}</h3>
                    <span style="font-size:10px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $program['color'] }}15; color:{{ $program['color'] }}; border:1px solid {{ $program['color'] }}30; text-transform:uppercase;">{{ $program['badge'] }}</span>
                </div>
                <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1;">{{ $program['desc'] }}</p>
                <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; font-weight:600; color:{{ $program['color'] }}; text-decoration:none;">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn More @endif →
                </a>
            </div>
            @endforeach
        </div>
        @endif

        <div style="text-align:center; margin-top:40px;">
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(139,92,246,0.3); color:#A78BFA; font-size:14px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(139,92,246,0.08)'"
               onmouseout="this.style.background='transparent'">
                @if($lang==='ar') عرض جميع البرامج @elseif($lang==='de') Alle Programme anzeigen @else View All Programs @endif →
            </a>
        </div>
    </div>
</section>

{{-- APPLICATION FORM --}}
<section id="apply" style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="max-width:680px; margin:0 auto;">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                    @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Apply Now @endif
                </span>
                <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                    @if($lang==='ar') قدم شركتك الناشئة @elseif($lang==='de') Startup bewerben @else Apply with Your Startup @endif
                </h2>
                <p style="color:#64748B; font-size:17px; line-height:1.7;">
                    @if($lang==='ar') انضم إلى نظام HOPn البيئي واحصل على الإرشاد والتمويل والبنية التحتية.
                    @elseif($lang==='de') Treten Sie dem HOPn-Ökosystem bei und erhalten Sie Mentoring, Kapital und Infrastruktur.
                    @else Join the HOPn ecosystem and get access to mentoring, funding, and tech infrastructure. @endif
                </p>
            </div>

            <div style="border:1px solid rgba(79,110,247,0.2); background:#0A0F1E; border-radius:20px; padding:40px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#4F6EF7,#8B5CF6,#06B6D4);"></div>

                @if(session('startup_success'))
                <div style="margin-bottom:24px; padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:10px; color:#10B981; font-size:14px;">
                    ✅ {{ session('startup_success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('leads.startup-application', ['lang'=>$lang]) }}">
                    @csrf
                    <div style="display:grid; gap:20px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                    @if($lang==='ar') اسم المؤسس @elseif($lang==='de') Gründername @else Founder Name @endif *
                                </label>
                                <input type="text" name="founder_name" required
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                    @if($lang==='ar') البريد الإلكتروني @elseif($lang==='de') E-Mail @else Email @endif *
                                </label>
                                <input type="email" name="email" required
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') اسم الشركة الناشئة @elseif($lang==='de') Startup-Name @else Startup Name @endif *
                            </label>
                            <input type="text" name="startup_name" required
                                   style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                    @if($lang==='ar') القطاع @elseif($lang==='de') Branche @else Industry @endif
                                </label>
                                <input type="text" name="industry"
                                       placeholder="AI, HealthTech, FinTech..."
                                       style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                       onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                    @if($lang==='ar') المرحلة @elseif($lang==='de') Phase @else Stage @endif
                                </label>
                                <select name="stage"
                                        style="width:100%; padding:12px 16px; background:#0D1425; border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;">
                                    <option value="idea">Idea</option>
                                    <option value="mvp">MVP</option>
                                    <option value="seed">Seed</option>
                                    <option value="series-a">Series A</option>
                                    <option value="growth">Growth</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#64748B; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') رسالة @elseif($lang==='de') Nachricht @else Tell us about your startup @endif
                            </label>
                            <textarea name="message" rows="5"
                                      placeholder="{{ $lang==='ar'?'ما المشكلة التي تحلها؟':($lang==='de'?'Welches Problem lösen Sie?':'What problem are you solving? What stage are you at?') }}"
                                      style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none; resize:vertical;"
                                      onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.08)'"></textarea>
                        </div>
                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr_consent" id="gdpr_startup" required style="margin-top:3px; flex-shrink:0;">
                            <label for="gdpr_startup" style="font-size:12px; color:#475569; line-height:1.6;">
                                @if($lang==='ar') أوافق على سياسة الخصوصية ومعالجة البيانات.
                                @elseif($lang==='de') Ich stimme der Datenschutzerklärung und Datenverarbeitung zu.
                                @else I agree to the Privacy Policy and consent to data processing. * @endif
                            </label>
                        </div>
                        <button type="submit"
                                style="width:100%; padding:16px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 60px rgba(79,110,247,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(79,110,247,0.3)'">
                            @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Submit Application @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- FINAL CTA --}}
<section style="padding:100px 0; background:#050A14; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل أنت مستعد لبناء المستقبل؟ @elseif($lang==='de') Bereit, die Zukunft zu bauen? @else Ready to Build the Future? @endif
        </h2>
        <p style="color:#64748B; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn اليوم.
            @elseif($lang==='de') Kontaktieren Sie das HOPn-Team noch heute.
            @else Get in touch with the HOPn startup team today. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;"
           onmouseover="this.style.transform='translateY(-2px)'"
           onmouseout="this.style.transform='translateY(0)'">
            @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif →
        </a>
    </div>
</section>

</x-layouts.public>
