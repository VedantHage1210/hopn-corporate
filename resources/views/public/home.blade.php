@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'HOPn — Innovation Ecosystem Platform'">

<style>
@keyframes marquee  { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
@keyframes marquee2 { 0%{transform:translateX(-50%)} 100%{transform:translateX(0)} }
</style>

{{-- 1. HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:94vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.05) 1px, transparent 1px); background-size:64px 64px; pointer-events:none;"></div>
    <div style="position:absolute; top:-300px; left:50%; transform:translateX(-50%); width:1000px; height:1000px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.10) 0%, transparent 65%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.07) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; padding:100px 0 80px; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.07); border-radius:999px; padding:6px 20px; margin-bottom:36px;">
            <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 10px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') منصة النظام البيئي الأوروبي للابتكار
                @elseif($lang==='de') Europäische Innovations-Ökosystem-Plattform
                @else Innovation Ecosystem Platform @endif
            </span>
        </div>

        <h1 style="font-size:clamp(38px,6.5vw,84px); font-weight:900; color:white; line-height:1.04; letter-spacing:-2.5px; margin:0 auto 28px; max-width:960px;">
            @if($lang==='ar')
                <span style="color:white;">حيث تتلاقى المؤسسات والشركات الناشئة</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">ورأس المال لبناء المستقبل</span>
            @elseif($lang==='de')
                <span style="color:white;">Wo Unternehmen, Startups</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">und Kapital zusammenkommen.</span>
            @else
                <span style="color:white;">Where enterprises, startups,</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">and capital converge.</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2.2vw,20px); color:#64748B; max-width:640px; margin:0 auto 48px; line-height:1.75;">
            @if($lang==='ar') HOPn ينسّق الاستراتيجية والتكنولوجيا والأنظمة البيئية — يربط الشركات الكبرى والمؤسسين والمستثمرين والجامعات في نظام تشغيل ابتكار متكامل.
            @elseif($lang==='de') HOPn orchestriert Strategie, Technologie und Ökosysteme — verbindet Unternehmen, Gründer, Investoren und Universitäten zu einem integrierten Innovationsbetriebssystem.
            @else HOPn orchestrates strategy, technology, and ecosystems — connecting corporates, founders, investors, and universities into one integrated innovation operating system. @endif
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:72px;">
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 48px rgba(79,110,247,0.45); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 64px rgba(79,110,247,0.6)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 48px rgba(79,110,247,0.45)'">
                @if($lang==='ar') استكشف النظام البيئي @elseif($lang==='de') Ökosystem erkunden @else Explore the Ecosystem @endif
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.09)'; this.style.borderColor='rgba(255,255,255,0.25)'"
               onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.15)'">
                @if($lang==='ar') احجز استشارة استراتيجية @elseif($lang==='de') Strategiegespräch buchen @else Book a Strategy Call @endif
            </a>
        </div>

        <div style="display:inline-flex; flex-wrap:wrap; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.02); border-radius:16px; overflow:hidden;">
            @foreach([
                ['50+', $lang==='ar'?'منظمة':($lang==='de'?'Organisationen':'Organizations')],
                ['6',   $lang==='ar'?'منتجات':($lang==='de'?'Produkte':'Products')],
                ['12+', $lang==='ar'?'مجالات ابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')],
                ['€500M+', $lang==='ar'?'رأس مال ابتكار':($lang==='de'?'Innovationskapital':'Innovation Capital')],
            ] as $stat)
            <div style="padding:22px 36px; text-align:center; border-right:1px solid rgba(255,255,255,0.06);">
                <div style="font-size:28px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat[0] }}</div>
                <div style="font-size:11px; color:#475569; margin-top:5px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; white-space:nowrap;">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 2. STRATEGY > BUILD > SCALE --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#4F6EF7; display:block; margin-bottom:16px;">
                @if($lang==='ar') كيف نعمل @elseif($lang==='de') Wie wir arbeiten @else How We Work @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                @if($lang==='ar') من الاستراتيجية إلى التأثير @elseif($lang==='de') Von der Strategie zur Wirkung @else From strategy to impact. @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:2px; background:rgba(255,255,255,0.05); border-radius:20px; overflow:hidden;">
            @foreach([
                ['S','#4F6EF7',
                 $lang==='ar'?'الاستراتيجية':($lang==='de'?'Strategie':'Strategy'),
                 $lang==='ar'?'حدد الرؤية ومحافظ المشاريع وحوكمة الابتكار على نطاق المؤسسة.':($lang==='de'?'Vision, Portfolios und Innovationsgovernance auf Unternehmensebene definieren.':'Define vision, portfolios, and innovation governance at enterprise scale.')],
                ['B','#10B981',
                 $lang==='ar'?'البناء':($lang==='de'?'Aufbau':'Build'),
                 $lang==='ar'?'صمّم ونفّذ بسرعة مؤسسية مع فرق عالمية المستوى.':($lang==='de'?'Entwerfen und liefern mit erstklassigen Teams.':'Design, prototype, and deliver at enterprise velocity with world-class teams.')],
                ['S','#8B5CF6',
                 $lang==='ar'?'التوسع':($lang==='de'?'Skalierung':'Scale'),
                 $lang==='ar'?'حقق التأثير مع المنصات والشراكات والنتائج القابلة للقياس.':($lang==='de'?'Wirkung mit Plattformen und messbaren Ergebnissen operationalisieren.':'Operationalize impact with platforms, partnerships, and measurable outcomes.')],
            ] as $step)
            <div style="background:#0A0F1E; padding:48px 40px; text-align:center; transition:background 0.3s;"
                 onmouseover="this.style.background='#0D1425'"
                 onmouseout="this.style.background='#0A0F1E'">
                <div style="width:56px; height:56px; border-radius:14px; background:{{ $step[1] }}15; border:1px solid {{ $step[1] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:900; color:{{ $step[1] }}; margin:0 auto 20px;">{{ $step[0] }}</div>
                <h3 style="font-size:22px; font-weight:800; color:white; margin-bottom:12px; letter-spacing:-0.5px;">{{ $step[2] }}</h3>
                <p style="font-size:14px; color:#475569; line-height:1.75; max-width:280px; margin:0 auto;">{{ $step[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. INNOVATION ECOSYSTEM --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); width:600px; height:600px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10;">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') مركز واحد للابتكار @elseif($lang==='de') Ein Hub für Innovation @else One Hub for Innovation @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') حيث يلتقي عالم الأعمال والتعليم والبحث العلمي
                @elseif($lang==='de') Wo Wirtschaft, Bildung &amp; Forschung zusammenkommen
                @else Where Business, Education &amp; Research Meet @endif
            </h2>
            <p style="color:#64748B; max-width:560px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') HOPn يمثل الجسر بين المؤسسات والجامعات والشركات الناشئة والمستثمرين
                @elseif($lang==='de') HOPn verbindet Unternehmen, Universitäten, Startups und Investoren
                @else HOPn bridges enterprises, universities, startups, and investors @endif
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:12px; max-width:900px; margin:0 auto 64px;">
            @php
            $ecosystem = [
                ['icon'=>'🏢','label'=>$lang==='ar'?'الأعمال':($lang==='de'?'Wirtschaft':'Business'),'color'=>'#4F6EF7','desc'=>$lang==='ar'?'مؤسسات وشركات':($lang==='de'?'Unternehmen':'Enterprises & Firms')],
                ['icon'=>'🎓','label'=>$lang==='ar'?'التعليم':($lang==='de'?'Bildung':'Education'),'color'=>'#10B981','desc'=>$lang==='ar'?'جامعات وبرامج':($lang==='de'?'Unis & Programme':'Universities & Programs')],
                ['icon'=>'⚡','label'=>'HOPn','color'=>'#8B5CF6','desc'=>$lang==='ar'?'المنصة المحورية':($lang==='de'?'Zentrale Plattform':'Central Platform')],
                ['icon'=>'🔬','label'=>$lang==='ar'?'البحث':($lang==='de'?'Forschung':'Research'),'color'=>'#F59E0B','desc'=>$lang==='ar'?'مراكز البحث والتطوير':($lang==='de'?'F&E-Zentren':'R&D Centers')],
                ['icon'=>'🚀','label'=>$lang==='ar'?'الشركات الناشئة':($lang==='de'?'Startups':'Startups'),'color'=>'#EF4444','desc'=>$lang==='ar'?'ريادة الأعمال':($lang==='de'?'Ventures':'Ventures')],
            ];
            @endphp
            @foreach($ecosystem as $node)
            <div style="border:1px solid {{ $node['color'] }}30; background:{{ $node['color'] }}08; border-radius:16px; padding:20px 12px; text-align:center; transition:all 0.3s;"
                 onmouseover="this.style.background='{{ $node['color'] }}15'; this.style.borderColor='{{ $node['color'] }}50'; this.style.transform='translateY(-4px)'"
                 onmouseout="this.style.background='{{ $node['color'] }}08'; this.style.borderColor='{{ $node['color'] }}30'; this.style.transform='translateY(0)'">
                @if($node['label']==='HOPn')
                <div style="width:48px; height:48px; border-radius:12px; background:#8B5CF6; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:white; box-shadow:0 0 20px rgba(139,92,246,0.4);">H</div>
                @else
                <div style="font-size:28px; margin-bottom:10px;">{{ $node['icon'] }}</div>
                @endif
                <div style="font-size:13px; font-weight:700; color:white; margin-bottom:4px;">{{ $node['label'] }}</div>
                <div style="font-size:11px; color:#475569; line-height:1.4;">{{ $node['desc'] }}</div>
            </div>
            @endforeach
        </div>

        @if($homeDomains->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:12px; max-width:1000px; margin:0 auto 40px;">
            @foreach($homeDomains as $domain)
            <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$domain->slug]) }}"
               style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:12px; padding:20px 16px; text-decoration:none; transition:all 0.25s; display:flex; align-items:center; gap:12px;"
               onmouseover="this.style.background='rgba(79,110,247,0.08)'; this.style.borderColor='rgba(79,110,247,0.3)'; this.style.transform='translateY(-2px)'"
               onmouseout="this.style.background='rgba(255,255,255,0.02)'; this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                <span style="font-size:22px;">{{ $domain->icon ?? '🔬' }}</span>
                <span style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $domain->name }}</span>
            </a>
            @endforeach
        </div>
        @endif

        <div style="text-align:center;">
            <a href="{{ route('innovation.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.3); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(79,110,247,0.08)'"
               onmouseout="this.style.background='transparent'">
                @if($lang==='ar') استكشف مجالات الابتكار @elseif($lang==='de') Innovationsdomänen erkunden @else Explore Innovation Domains @endif →
            </a>
        </div>
    </div>
</section>

{{-- 4. CORE SERVICES --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang==='ar') ماذا نفعل @elseif($lang==='de') Was wir tun @else What We Do @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') خدماتنا الأساسية @elseif($lang==='de') Kernleistungen @else Core Services @endif
                </h2>
            </div>
            <a href="{{ route('services.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; font-size:14px; font-weight:600; color:#818CF8; text-decoration:none;"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='#818CF8'">
                @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:1px; background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.06); border-radius:16px; overflow:hidden;">
            @foreach($services as $service)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}"
               style="display:block; padding:28px; background:#050A14; text-decoration:none; transition:all 0.2s; position:relative; overflow:hidden;"
               onmouseover="this.style.background='#0A1628'"
               onmouseout="this.style.background='#050A14'">
                <div style="width:40px; height:40px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:18px;">⚡</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px; line-height:1.3;">
                    @if($lang==='ar'&&$service->name_ar) {{ $service->name_ar }}
                    @elseif($lang==='de'&&$service->name_de) {{ $service->name_de }}
                    @else {{ $service->name }} @endif
                </h3>
                <p style="font-size:13px; color:#475569; line-height:1.6; margin-bottom:16px;">{{ Str::limit($lang==='de'&&$service->summary_de?$service->summary_de:$service->summary??'', 80) }}</p>
                <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr lesen @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. HOPN PRODUCTS --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; right:0; width:600px; height:600px; background:radial-gradient(circle at top right, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10;">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') منصاتنا @elseif($lang==='de') Unsere Plattformen @else Our Platforms @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') منتجات HOPn @elseif($lang==='de') HOPn Produkte @else HOPn Products @endif
            </h2>
            <p style="color:#64748B; max-width:500px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') منصات ذكية مبنية لمستقبل الأعمال والتعليم
                @elseif($lang==='de') Intelligente Plattformen für die Zukunft von Wirtschaft und Bildung
                @else Intelligent platforms built for the future of business and education @endif
            </p>
        </div>
        @if($homeProducts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($homeProducts as $product)
            @php
                $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                $c=$colors[$loop->index%6];
                $title=$lang==='ar'&&$product->title_ar?$product->title_ar:($lang==='de'&&$product->title_de?$product->title_de:$product->title_en);
                $summary=$lang==='ar'&&$product->summary_ar?$product->summary_ar:($lang==='de'&&$product->summary_de?$product->summary_de:($product->summary_en??''));
                $categories=['Innovation Project Management','AI-Powered Fintech Platform','AI Tools & Certification','AI Governance & Compliance','Sports Performance Analytics','Education–Industry Bridge'];
                $cat=$categories[$loop->index] ?? 'Platform';
            @endphp
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.3s; position:relative; overflow:hidden;"
               onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-4px)'"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $c }}60, transparent);"></div>
                <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; color:{{ $c }}; margin-bottom:12px; opacity:0.85;">{{ $cat }}</div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    <div style="width:44px; height:44px; border-radius:12px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:{{ $c }}; flex-shrink:0;">
                        {{ strtoupper(substr($title,0,1)) }}
                    </div>
                    <div style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.5px;">{{ $title }}</div>
                </div>
                <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($summary,100) }}</p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
            @endforeach
        </div>
        @endif
        <div style="text-align:center; margin-top:40px;">
            <a href="{{ route('products.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(139,92,246,0.3); color:#A78BFA; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(139,92,246,0.08)'"
               onmouseout="this.style.background='transparent'">
                @if($lang==='ar') عرض جميع المنتجات @elseif($lang==='de') Alle Produkte anzeigen @else View All Products @endif →
            </a>
        </div>
    </div>
</section>

{{-- 6. INDUSTRIES --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') القطاعات @elseif($lang==='de') Branchen @else Industries @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') القطاعات التي نخدمها @elseif($lang==='de') Branchen, die wir bedienen @else Industries We Serve @endif
            </h2>
        </div>
        @if($homeIndustries->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
            @foreach($homeIndustries as $industry)
            <a href="{{ route('industries.show', ['lang'=>$lang,'slug'=>$industry->slug]) }}"
               style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:14px; padding:24px 16px; text-align:center; text-decoration:none; transition:all 0.25s;"
               onmouseover="this.style.background='rgba(79,110,247,0.08)'; this.style.borderColor='rgba(79,110,247,0.25)'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='rgba(255,255,255,0.02)'; this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                <div style="font-size:28px; margin-bottom:10px;">{{ $industry->icon ?? '🏭' }}</div>
                <div style="font-size:13px; font-weight:600; color:#94A3B8;">{{ $industry->name }}</div>
            </a>
            @endforeach
        </div>
        @else
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
            @foreach([['🚗','Automotive'],['🏥','Healthcare'],['🏭','Manufacturing'],['🛒','E-Commerce'],['🎓','Education'],['💳','Finance'],['🚚','Logistics'],['🔬','Research']] as [$icon,$name])
            <div style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:14px; padding:24px 16px; text-align:center;">
                <div style="font-size:28px; margin-bottom:10px;">{{ $icon }}</div>
                <div style="font-size:13px; font-weight:600; color:#94A3B8;">{{ $name }}</div>
            </div>
            @endforeach
        </div>
        @endif
        <div style="text-align:center; margin-top:36px;">
            <a href="{{ route('industries.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.3); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(79,110,247,0.08)'"
               onmouseout="this.style.background='transparent'">
                @if($lang==='ar') عرض جميع القطاعات @elseif($lang==='de') Alle Branchen @else View All Industries @endif →
            </a>
        </div>
    </div>
</section>

{{-- 7. ANIMATED LOGO MARQUEE --}}
<section style="padding:80px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04); border-bottom:1px solid rgba(255,255,255,0.04); overflow:hidden;">
    <div class="container-shell" style="margin-bottom:48px;">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#334155; display:block; margin-bottom:10px;">Partners & Trust</span>
                <h2 style="font-size:clamp(22px,3vw,36px); font-weight:800; color:white; letter-spacing:-0.5px; margin:0;">
                    @if($lang==='ar') موثوق به من قادة الصناعة @elseif($lang==='de') Vertrauen von Industrieführern @else Trusted by industry leaders @endif
                </h2>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:28px; align-items:center;">
                @foreach([['50+','Partners'],['12+','Countries'],['15+','Universities'],['€500M+','Innovation Capital']] as $s)
                <div style="text-align:center;">
                    <div style="font-size:20px; font-weight:900; color:white; letter-spacing:-0.5px;">{{ $s[0] }}</div>
                    <div style="font-size:11px; color:#334155; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $s[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DB partners first if available, otherwise marquee --}}
    @if($partners->count() > 0)
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:12px;">
            @foreach($partners as $partner)
            <div style="border:1px solid rgba(255,255,255,0.05); background:rgba(255,255,255,0.02); border-radius:12px; padding:20px; display:flex; align-items:center; justify-content:center; min-height:72px; transition:all 0.2s;"
                 onmouseover="this.style.borderColor='rgba(255,255,255,0.12)'; this.style.background='rgba(255,255,255,0.04)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'; this.style.background='rgba(255,255,255,0.02)'">
                @if($partner->logo)
                <img src="{{ $partner->logo }}" alt="{{ $partner->name }}"
                     style="height:28px; width:auto; max-width:120px; object-fit:contain; filter:brightness(0.6) grayscale(0.4);"
                     onmouseover="this.style.filter='brightness(1) grayscale(0)'"
                     onmouseout="this.style.filter='brightness(0.6) grayscale(0.4)'">
                @else
                <span style="font-size:13px; font-weight:700; color:#334155; letter-spacing:0.05em;">{{ $partner->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @else
    {{-- Animated marquee fallback --}}
    <div style="margin-bottom:12px;">
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#1E293B; text-align:center; margin-bottom:14px;">Industry Leaders</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee 30s linear infinite; width:fit-content;">
                @php $b1=['Bosch','BMW Group','Mercedes-Benz','Audi','Volkswagen','Allianz','Deutsche Bahn','Infineon','SAP','Siemens','Continental','Deutsche Telekom']; @endphp
                @foreach(array_merge($b1,$b1) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span style="font-size:14px; font-weight:700; color:#1E293B; white-space:nowrap; transition:color 0.2s;"
                          onmouseover="this.style.color='#64748B'"
                          onmouseout="this.style.color='#1E293B'">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="margin-bottom:12px;">
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#1E293B; text-align:center; margin-bottom:14px;">Technology Partners</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee2 28s linear infinite; width:fit-content;">
                @php $b2=['Microsoft','Google','Google Cloud','AWS','IBM','Intel','NVIDIA','Oracle','Cisco','Lenovo','Neo4j','Datadog']; @endphp
                @foreach(array_merge($b2,$b2) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span style="font-size:14px; font-weight:700; color:#1E293B; white-space:nowrap; transition:color 0.2s;"
                          onmouseover="this.style.color='#64748B'"
                          onmouseout="this.style.color='#1E293B'">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#1E293B; text-align:center; margin-bottom:14px;">Research & Academic Excellence</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee 35s linear infinite; width:fit-content;">
                @php $b3=['TU München','ETH Zürich','MIT','Stanford','RWTH Aachen','TU Berlin','Fraunhofer','Max Planck','KIT','HU Berlin','LMU München','TU Dresden']; @endphp
                @foreach(array_merge($b3,$b3) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span style="font-size:14px; font-weight:700; color:#1E293B; white-space:nowrap; transition:color 0.2s;"
                          onmouseover="this.style.color='#64748B'"
                          onmouseout="this.style.color='#1E293B'">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</section>

{{-- 8. CONSULTING EXPERTS --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#10B981; display:block; margin-bottom:14px;">Consulting</span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:10px;">
                    @if($lang==='ar') احجز خبيراً @elseif($lang==='de') Einen Experten buchen @else Book an Expert @endif
                </h2>
                <p style="color:#64748B; font-size:15px; max-width:480px; line-height:1.7; margin:0;">
                    @if($lang==='ar') استفد من استراتيجيي HOPn في الذكاء الاصطناعي والتوائم الرقمية وتسويق الأبحاث واستراتيجية المواهب.
                    @elseif($lang==='de') Zugang zu HOPn-Strategen in KI, digitalen Zwillingen, Forschungskommerzialisierung und Talentstrategie.
                    @else Access HOPn strategists in AI, digital twins, research commercialization, and talent strategy. @endif
                </p>
            </div>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="font-size:14px; font-weight:600; color:#10B981; text-decoration:none;"
               onmouseover="this.style.opacity='0.7'"
               onmouseout="this.style.opacity='1'">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in touch @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $experts=[
                ['DE','Dr. Elena Richter','AI Strategy & Governance','€450/hr',['AI Governance','MLOps','EU AI Act'],'#4F6EF7'],
                ['MW','Marcus Weber','Digital Twins & IoT','€380/hr',['Digital Twins','Manufacturing','IoT'],'#10B981'],
                ['PS','Prof. Sarah Chen','Research Commercialization','€420/hr',['R&D','University Partnerships','IP Strategy'],'#8B5CF6'],
            ];
            @endphp
            @foreach($experts as $expert)
            <div style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; position:relative; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $expert[5] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $expert[5] }}60,transparent);"></div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    <div style="width:48px; height:48px; border-radius:12px; background:{{ $expert[5] }}20; border:1px solid {{ $expert[5] }}30; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:800; color:{{ $expert[5] }}; flex-shrink:0;">{{ $expert[0] }}</div>
                    <div style="flex:1;">
                        <div style="font-size:15px; font-weight:700; color:white;">{{ $expert[1] }}</div>
                        <div style="font-size:12px; color:#64748B; margin-top:2px;">{{ $expert[2] }}</div>
                    </div>
                    <div style="font-size:15px; font-weight:800; color:{{ $expert[5] }}; white-space:nowrap;">{{ $expert[3] }}</div>
                </div>
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                    @foreach($expert[4] as $tag)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $expert[5] }}12; border:1px solid {{ $expert[5] }}25; color:{{ $expert[5] }};">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 9. WORKSHOPS --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#F59E0B; display:block; margin-bottom:14px;">Training & Workshops</span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:10px;">
                    @if($lang==='ar') رفع كفاءة الفرق لعصر الذكاء الاصطناعي @elseif($lang==='de') Teams für das KI-Zeitalter qualifizieren @else Upskill teams for the AI era @endif
                </h2>
                <p style="color:#64748B; font-size:15px; max-width:520px; line-height:1.7; margin:0;">
                    @if($lang==='ar') ورش عمل يقودها خبراء — مصممة لسد الفجوة بين طموح الابتكار والقدرة التشغيلية.
                    @elseif($lang==='de') Expertengeführte Workshops — konzipiert, um die Lücke zwischen Innovationsambition und operativer Fähigkeit zu schließen.
                    @else Expert-led workshops — designed to close the gap between innovation ambition and operational capability. @endif
                </p>
            </div>
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
               style="font-size:14px; font-weight:600; color:#F59E0B; text-decoration:none;"
               onmouseover="this.style.opacity='0.7'"
               onmouseout="this.style.opacity='1'">
                @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @php
            $workshops=[
                ['1 '.($lang==='ar'?'يوم':($lang==='de'?'Tag':'day')),
                 $lang==='ar'?'تدريب الذكاء الاصطناعي للشركات':($lang==='de'?'KI-Training für Unternehmen':'AI Training for Companies'),
                 $lang==='ar'?'ورشة استراتيجية الذكاء الاصطناعي':($lang==='de'?'KI-Strategie-Workshop':'AI Strategy Workshop'),
                 $lang==='ar'?'تحديد خرائط طريق الذكاء الاصطناعي وأطر الحوكمة وعائد الاستثمار.':($lang==='de'?'KI-Roadmaps, Governance und ROI-Rahmen definieren.':'Define enterprise AI roadmaps, governance frameworks, and ROI.'),
                 '#4F6EF7'],
                ['3 '.($lang==='ar'?'أيام':($lang==='de'?'Tage':'days')),
                 $lang==='ar'?'تدريب تحليل البيانات':($lang==='de'?'Datenanalyse-Training':'Data Analytics Training'),
                 $lang==='ar'?'معسكر تدريب هندسة البيانات':($lang==='de'?'Data Engineering Bootcamp':'Data Engineering Bootcamp'),
                 $lang==='ar'?'خطوط أنابيب عملية، التخزين، وأسس MLOps.':($lang==='de'?'Praktische Pipelines, Warehousing und MLOps-Grundlagen.':'Hands-on pipelines, warehousing, and MLOps foundations.'),
                 '#10B981'],
                ['2 '.($lang==='ar'?'يومان':($lang==='de'?'Tage':'days')),
                 $lang==='ar'?'ورش التوائم الرقمية':($lang==='de'?'Digital-Twin-Workshops':'Digital Twin Workshops'),
                 $lang==='ar'?'التوأم الرقمي للتصنيع':($lang==='de'?'Digital Twin für Produktion':'Digital Twin for Manufacturing'),
                 $lang==='ar'?'من التجريب إلى الإنتاج في بيئة المصنع.':($lang==='de'?'Vom Piloten zur Produktion in der Fabrik.':'From pilot to production on the factory floor.'),
                 '#8B5CF6'],
            ];
            @endphp
            @foreach($workshops as $ws)
            <div style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; position:relative; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $ws[4] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $ws[4] }},transparent);"></div>
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; flex-wrap:wrap; gap:8px;">
                    <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $ws[4] }}15; color:{{ $ws[4] }}; border:1px solid {{ $ws[4] }}30;">{{ $ws[0] }}</span>
                    <span style="font-size:11px; color:#334155; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $ws[1] }}</span>
                </div>
                <h3 style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.3px; margin:0 0 10px; line-height:1.3;">{{ $ws[2] }}</h3>
                <p style="font-size:13px; color:#475569; line-height:1.7; margin:0 0 20px;">{{ $ws[3] }}</p>
                <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; font-weight:600; color:{{ $ws[4] }}; text-decoration:none;">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                </a>
            </div>
            @endforeach
        </div>
        <div style="display:flex; gap:14px; margin-top:32px; flex-wrap:wrap;">
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(245,158,11,0.3); color:#F59E0B; font-size:14px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(245,158,11,0.08)'"
               onmouseout="this.style.background='transparent'">
                @if($lang==='ar') عرض جميع ورش العمل @elseif($lang==='de') Alle Workshops @else View All Workshops @endif
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.1); color:#94A3B8; font-size:14px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.color='white'; this.style.borderColor='rgba(255,255,255,0.2)'"
               onmouseout="this.style.color='#94A3B8'; this.style.borderColor='rgba(255,255,255,0.1)'">
                @if($lang==='ar') احجز ورشة عمل @elseif($lang==='de') Workshop buchen @else Book a Workshop @endif
            </a>
        </div>
    </div>
</section>

{{-- 10. EVENTS --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">
                    @if($lang==='ar') الفعاليات والورش @elseif($lang==='de') Events & Workshops @else Events & Workshops @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') الفعاليات القادمة @elseif($lang==='de') Kommende Events @else Upcoming Events @endif
                </h2>
            </div>
            <a href="{{ route('events.index', ['lang'=>$lang]) }}"
               style="font-size:14px; font-weight:600; color:#F59E0B; text-decoration:none;"
               onmouseover="this.style.opacity='0.7'"
               onmouseout="this.style.opacity='1'">
                @if($lang==='ar') جميع الفعاليات @elseif($lang==='de') Alle Events @else All Events @endif →
            </a>
        </div>
        @if($upcomingEvents->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($upcomingEvents as $event)
            @php $typeColors=['conference'=>'#4F6EF7','workshop'=>'#10B981','webinar'=>'#06B6D4','hackathon'=>'#8B5CF6','startup'=>'#F59E0B','networking'=>'#EF4444','research'=>'#A855F7']; $c=$typeColors[$event->type]??'#F59E0B'; @endphp
            <div style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; overflow:hidden; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='{{ $c }}30'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                <div style="height:3px; background:linear-gradient(90deg, {{ $c }}, transparent);"></div>
                <div style="padding:24px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                        <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase;">{{ ucfirst($event->type) }}</span>
                        @if($event->date)<span style="font-size:12px; color:#475569;">{{ $event->date->format('d M Y') }}</span>@endif
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">{{ $event->title }}</h3>
                    @if($event->location)<div style="font-size:13px; color:#475569; margin-bottom:16px;">📍 {{ $event->location }}</div>@endif
                    <a href="{{ route('events.index', ['lang'=>$lang]) }}"
                       style="font-size:13px; font-weight:600; color:{{ $c }}; text-decoration:none;">
                        @if($lang==='ar') سجّل الآن @elseif($lang==='de') Jetzt anmelden @else Register Now @endif →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- 11. NEWSROOM --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang==='ar') غرفة الأخبار @elseif($lang==='de') Newsroom @else Newsroom @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') آخر الأخبار من HOPn @elseif($lang==='de') Aktuelles von HOPn @else Latest from HOPn @endif
                </h2>
            </div>
            <a href="{{ route('newsroom.index', ['lang'=>$lang]) }}"
               style="font-size:14px; font-weight:600; color:#818CF8; text-decoration:none;"
               onmouseover="this.style.opacity='0.7'"
               onmouseout="this.style.opacity='1'">
                @if($lang==='ar') جميع الأخبار @elseif($lang==='de') Alle Neuigkeiten @else All News @endif →
            </a>
        </div>
        @if($latestPosts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($latestPosts as $post)
            @php $c=['#4F6EF7','#10B981','#8B5CF6'][$loop->index%3]; @endphp
            <a href="{{ route('insights.show', ['lang'=>$lang,'slug'=>$post->slug]) }}"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s;"
               onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                @if($post->category)
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; border:1px solid {{ $c }}30; color:{{ $c }}; margin-bottom:16px; width:fit-content;">
                    {{ $post->category->name ?? 'News' }}
                </span>
                @endif
                <h3 style="font-size:17px; font-weight:700; color:white; line-height:1.4; margin-bottom:12px; flex:1;">{{ $post->title }}</h3>
                @if($post->excerpt)
                <p style="font-size:13px; color:#475569; line-height:1.6; margin-bottom:16px;">{{ Str::limit($post->excerpt,100) }}</p>
                @endif
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <span style="font-size:12px; color:#334155;">{{ $post->published_at?->format('d M Y') }}</span>
                    <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                        @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Lesen @else Read more @endif →
                    </span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:48px; color:#334155;">
            <p>@if($lang==='ar') الأخبار قادمة قريباً @elseif($lang==='de') Neuigkeiten folgen in Kürze @else Latest news coming soon @endif</p>
        </div>
        @endif
    </div>
</section>

{{-- 12. TESTIMONIALS --}}
@if($testimonials->count() > 0)
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') أصوات العملاء @elseif($lang==='de') Kundenstimmen @else Client Voice @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ما يقوله عملاؤنا @elseif($lang==='de') Was unsere Kunden sagen @else What Our Clients Say @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($testimonials as $testimonial)
                <x-testimonial :testimonial="$testimonial" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 13. TALENT --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; bottom:0; left:0; width:500px; height:500px; background:radial-gradient(circle, rgba(16,185,129,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10;">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') المواهب والتوظيف @elseif($lang==='de') Talente & Einstellung @else Talent & Hiring @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') ابنِ فريق أحلامك @elseif($lang==='de') Bauen Sie Ihr Traumteam @else Build Your Dream Team @endif
            </h2>
            <p style="color:#64748B; max-width:500px; margin:0 auto; font-size:17px;">
                @if($lang==='ar') الوصول إلى أفضل المواهب التقنية في أوروبا وما وراءها
                @elseif($lang==='de') Zugang zu erstklassigen technischen Talenten in Europa
                @else Access top-tier technical talent across Europe and beyond @endif
            </p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px; margin-bottom:48px;">
            @php
            $talentItems = [
                ['icon'=>'🌍','title'=>$lang==='ar'?'فرق عن بُعد':($lang==='de'?'Remote-Teams':'Remote Teams'),'desc'=>$lang==='ar'?'فرق مُدارة بالكامل من المهندسين وعلماء البيانات':($lang==='de'?'Vollständig verwaltete Remote-Teams':'Fully managed remote teams of engineers'),'color'=>'#4F6EF7'],
                ['icon'=>'🏢','title'=>$lang==='ar'?'التوظيف المحلي':($lang==='de'?'Lokale Einstellung':'Local Hiring'),'desc'=>$lang==='ar'?'توظيف في الموقع عبر ألمانيا وأوروبا':($lang==='de'?'Vor-Ort-Talente in Deutschland':'On-site talent across Germany'),'color'=>'#10B981'],
                ['icon'=>'🤖','title'=>$lang==='ar'?'خبراء تقنيون':($lang==='de'?'Tech-Experten':'Technical Experts'),'desc'=>$lang==='ar'?'متخصصون في الذكاء الاصطناعي والبيانات والروبوتيكا':($lang==='de'?'KI-, Daten- und Robotik-Spezialisten':'AI, data, and robotics specialists'),'color'=>'#8B5CF6'],
                ['icon'=>'👥','title'=>$lang==='ar'?'فرق مخصصة':($lang==='de'?'Dedizierte Teams':'Dedicated Teams'),'desc'=>$lang==='ar'?'فرق تطوير طويلة الأجل مدمجة في مؤسستك':($lang==='de'?'Langfristige Teams in Ihrer Organisation':'Long-term teams in your organization'),'color'=>'#F59E0B'],
            ];
            @endphp
            @foreach($talentItems as $item)
            <div style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; position:relative; overflow:hidden;"
                 onmouseover="this.style.borderColor='{{ $item['color'] }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $item['color'] }}40, transparent);"></div>
                <div style="font-size:32px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item['title'] }}</h3>
                <p style="font-size:13px; color:#475569; line-height:1.7;">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;">
            <a href="{{ route('careers.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 36px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(16,185,129,0.3); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 60px rgba(16,185,129,0.4)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(16,185,129,0.3)'">
                @if($lang==='ar') عرض الوظائف المفتوحة @elseif($lang==='de') Offene Stellen ansehen @else View Open Positions @endif →
            </a>
        </div>
    </div>
</section>

{{-- 14. FINAL CTA --}}
<section style="padding:120px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(32px,5vw,64px); font-weight:900; color:white; letter-spacing:-2px; margin-bottom:20px; line-height:1.1;">
            @if($lang==='ar') هل أنت مستعد لتنسيق اختراقك التالي؟
            @elseif($lang==='de') Bereit, Ihren nächsten Durchbruch zu orchestrieren?
            @else Ready to orchestrate your next breakthrough? @endif
        </h2>
        <p style="color:#64748B; font-size:18px; max-width:540px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') تواصل مع استراتيجيي HOPn لتحديد نطاق مبادرتك الابتكارية.
            @elseif($lang==='de') Verbinden Sie sich mit HOPn-Strategen, um Ihre Innovationsinitiative zu gestalten.
            @else Connect with HOPn strategists to scope your innovation initiative — from AI governance to ecosystem partnerships. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 60px rgba(79,110,247,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(79,110,247,0.4)'">
                @if($lang==='ar') احجز مكالمة استراتيجية @elseif($lang==='de') Strategiegespräch buchen @else Book a Strategy Call @endif
            </a>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') استكشف الكتالوج @elseif($lang==='de') HOPn kontaktieren @else Explore the Catalog @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>
