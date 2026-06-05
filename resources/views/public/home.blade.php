<x-layouts.public :title="'HOPn — Innovation Ecosystem Platform'">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- 1. HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:92vh; display:flex; align-items:center;">
    {{-- Grid background --}}
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    {{-- Glow effects --}}
    <div style="position:absolute; top:-200px; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.12) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        {{-- Badge --}}
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') منصة النظام البيئي للابتكار الأوروبي
                @elseif($lang==='de') Europäischer Innovations-Hub
                @else European Innovation Ecosystem Platform @endif
            </span>
        </div>

        {{-- Headline --}}
        <h1 style="font-size:clamp(36px,6vw,80px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">ربط الأعمال والتعليم والبحث</span><br>
                <span style="background:linear-gradient(135deg, #4F6EF7, #8B5CF6, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">لبناء حلول رقمية ذكية</span>
            @elseif($lang==='de')
                <span style="color:white;">Wirtschaft, Bildung &amp; Forschung</span><br>
                <span style="background:linear-gradient(135deg, #4F6EF7, #8B5CF6, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">intelligent verbinden</span>
            @else
                <span style="color:white;">Connecting Business, Education</span><br>
                <span style="background:linear-gradient(135deg, #4F6EF7, #8B5CF6, #06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">&amp; Research to Build the Future</span>
            @endif
        </h1>

        {{-- Subheadline --}}
        <p style="font-size:clamp(16px,2vw,20px); color:#64748B; max-width:600px; margin:0 auto 40px; line-height:1.7; font-weight:400;">
            @if($lang==='ar') الذكاء الاصطناعي · البيانات · التوائم الرقمية · الروبوتات · المواهب · أنظمة الابتكار
            @elseif($lang==='de') KI · Daten · Digitale Zwillinge · Robotik · Talente · Innovationsökosysteme
            @else AI · Data · Digital Twins · Robotics · Talent · Innovation Ecosystems @endif
        </p>

        {{-- CTAs --}}
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:64px;">
            <a href="{{ route('services.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 60px rgba(79,110,247,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(79,110,247,0.4)'">
                @if($lang==='ar') استكشف الخدمات @elseif($lang==='de') Leistungen entdecken @else Explore Services @endif
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('products.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.borderColor='rgba(255,255,255,0.2)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'; this.style.borderColor='rgba(255,255,255,0.12)'">
                @if($lang==='ar') عرض المنتجات @elseif($lang==='de') Produkte ansehen @else View Products @endif
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(16,185,129,0.3); background:rgba(16,185,129,0.06); color:#10B981; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(16,185,129,0.12)'"
               onmouseout="this.style.background='rgba(16,185,129,0.06)'">
                @if($lang==='ar') احجز مكالمة @elseif($lang==='de') Anruf buchen @else Book a Call @endif
            </a>
        </div>

        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:700px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>'50+', 'label'=> $lang==='ar'?'عملاء المؤسسات':($lang==='de'?'Enterprise-Kunden':'Enterprise Clients')],
                ['num'=>'10+', 'label'=> $lang==='ar'?'منتجات الذكاء الاصطناعي':($lang==='de'?'KI-Produkte':'AI Products')],
                ['num'=>'6',   'label'=> $lang==='ar'?'مجالات الابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')],
                ['num'=>'EU',  'label'=> $lang==='ar'?'موثوق به':($lang==='de'?'Vertrauenswürdig':'Trusted')],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 20px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:28px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:12px; color:#475569; margin-top:4px; font-weight:500;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 2. INNOVATION ECOSYSTEM --}}
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

        {{-- Ecosystem visual --}}
        <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:12px; max-width:900px; margin:0 auto 64px; position:relative;">
            @php
            $ecosystem = [
                ['icon'=>'🏢','label'=>$lang==='ar'?'الأعمال':($lang==='de'?'Wirtschaft':'Business'),'color'=>'#4F6EF7','desc'=>$lang==='ar'?'مؤسسات وشركات':($lang==='de'?'Unternehmen':'Enterprises & Firms')],
                ['icon'=>'🎓','label'=>$lang==='ar'?'التعليم':($lang==='de'?'Bildung':'Education'),'color'=>'#10B981','desc'=>$lang==='ar'?'جامعات وبرامج':($lang==='de'?'Unis & Programme':'Universities & Programs')],
                ['icon'=>'⚡','label'=>'HOPn','color'=>'#8B5CF6','desc'=>$lang==='ar'?'المنصة المحورية':($lang==='de'?'Zentrale Plattform':'Central Platform')],
                ['icon'=>'🔬','label'=>$lang==='ar'?'البحث':($lang==='de'?'Forschung':'Research'),'color'=>'#F59E0B','desc'=>$lang==='ar'?'مراكز البحث والتطوير':($lang==='de'?'F&E-Zentren':'R&D Centers')],
                ['icon'=>'🚀','label'=>$lang==='ar'?'الشركات الناشئة':($lang==='de'?'Startups':'Startups'),'color'=>'#EF4444','desc'=>$lang==='ar'?'ريادة الأعمال':($lang==='de'?'Ventures':'Ventures')],
            ];
            @endphp
            @foreach($ecosystem as $i => $node)
            <div style="border:1px solid {{ $node['color'] }}30; background:{{ $node['color'] }}08; border-radius:16px; padding:20px 12px; text-align:center; transition:all 0.3s; position:relative;"
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

        {{-- Innovation Domains --}}
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

{{-- 3. CORE SERVICES --}}
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
                <div style="width:40px; height:40px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:18px;">
                    {{ $service->icon ?? '⚡' }}
                </div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px; line-height:1.3;">{{ $service->title }}</h3>
                <p style="font-size:13px; color:#475569; line-height:1.6; margin-bottom:16px;">{{ Str::limit($service->summary ?? $service->description ?? '', 80) }}</p>
                <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr lesen @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- 4. HOPN PRODUCTS --}}
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
                $title=$lang==='de'&&$product->title_de?$product->title_de:$product->title_en;
                $summary=$lang==='de'&&$product->summary_de?$product->summary_de:$product->summary_en;
            @endphp
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.3s; position:relative; overflow:hidden;"
               onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-4px)'"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $c }}60, transparent);"></div>
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

{{-- 5. INDUSTRIES --}}
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

{{-- 6. LOGO WALL --}}
<section style="padding:80px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04); border-bottom:1px solid rgba(255,255,255,0.04);">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="font-size:13px; color:#334155; font-weight:600; letter-spacing:0.08em; text-transform:uppercase;">
                @if($lang==='ar') موثوق به من قِبل المنظمات الرائدة
                @elseif($lang==='de') Vertrauen führender Organisationen
                @else Trusted by leading organisations @endif
            </span>
        </div>
        @if($partners->count() > 0)
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
        @endif
    </div>
</section>

{{-- 7. EVENTS --}}
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
                        @if($event->date)
                        <span style="font-size:12px; color:#475569;">{{ $event->date->format('d M Y') }}</span>
                        @endif
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">{{ $event->title }}</h3>
                    @if($event->location)
                    <div style="font-size:13px; color:#475569; margin-bottom:16px;">📍 {{ $event->location }}</div>
                    @endif
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

{{-- 8. NEWSROOM --}}
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
            <a href="{{ route('insights.index', ['lang'=>$lang]) }}"
               style="font-size:14px; font-weight:600; color:#818CF8; text-decoration:none;"
               onmouseover="this.style.opacity='0.7'"
               onmouseout="this.style.opacity='1'">
                @if($lang==='ar') جميع الأخبار @elseif($lang==='de') Alle Neuigkeiten @else All News @endif →
            </a>
        </div>
        @if($latestPosts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($latestPosts as $i => $post)
            <a href="{{ route('insights.show', ['lang'=>$lang,'slug'=>$post->slug]) }}"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s;"
               onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                @if($post->category)
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8; margin-bottom:16px; width:fit-content;">
                    {{ $post->category->name ?? 'News' }}
                </span>
                @endif
                <h3 style="font-size:17px; font-weight:700; color:white; line-height:1.4; margin-bottom:12px; flex:1;">{{ $post->title }}</h3>
                @if($post->excerpt)
                <p style="font-size:13px; color:#475569; line-height:1.6; margin-bottom:16px;">{{ Str::limit($post->excerpt,100) }}</p>
                @endif
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <span style="font-size:12px; color:#334155;">{{ $post->published_at?->format('d M Y') }}</span>
                    <span style="font-size:13px; font-weight:600; color:#4F6EF7;">
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

{{-- 9. TESTIMONIALS --}}
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

{{-- 10. TALENT --}}
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

{{-- 11. FINAL CTA --}}
<section style="padding:120px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(32px,5vw,64px); font-weight:900; color:white; letter-spacing:-2px; margin-bottom:20px; line-height:1.1;">
            @if($lang==='ar') ابنِ المستقبل مع HOPn
            @elseif($lang==='de') Bauen Sie die Zukunft mit HOPn
            @else Build the Future with HOPn @endif
        </h2>
        <p style="color:#64748B; font-size:18px; max-width:540px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') هل أنت مستعد لتحويل مؤسستك بالذكاء الاصطناعي والبيانات والابتكار؟
            @elseif($lang==='de') Bereit, Ihre Organisation mit KI, Daten und Innovation zu transformieren?
            @else Ready to transform your organization with AI, data, and innovation? @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 0 60px rgba(79,110,247,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(79,110,247,0.4)'">
                @if($lang==='ar') طلب اقتراح @elseif($lang==='de') Angebot anfordern @else Request Proposal @endif
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') تواصل مع HOPn @elseif($lang==='de') HOPn kontaktieren @else Contact HOPn @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>
