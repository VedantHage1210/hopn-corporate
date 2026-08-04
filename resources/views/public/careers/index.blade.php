@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'وظائف':($lang==='de'?'Karriere':'Careers')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(245,158,11,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(245,158,11,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; left:-100px; width:400px; height:400px; background:radial-gradient(circle, rgba(79,110,247,0.06) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.3); background:rgba(245,158,11,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#F59E0B; display:inline-block; box-shadow:0 0 8px #F59E0B;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B;">
                @if($lang==='ar') انضم لفريقنا @elseif($lang==='de') Werde Teil des Teams @else Join Our Team @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">وظائف في</span>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn</span>
            @elseif($lang==='de')
                <span style="color:white;">Karriere bei</span>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn</span>
            @else
                <span style="color:white;">Careers at</span>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') انضم إلى فريقنا من خبراء الذكاء الاصطناعي والبيانات والروبوتيكا والابتكار.
            @elseif($lang==='de') Werden Sie Teil unseres Teams aus KI-, Daten- und Innovationsexperten.
            @else Join our team of AI, data, robotics, and innovation experts building the future. @endif
        </p>

        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:600px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>$jobs->total(),'label'=>$lang==='ar'?'وظيفة متاحة':($lang==='de'?'Offene Stellen':'Open Positions')],
                ['num'=>'Remote','label'=>$lang==='ar'?'خيارات عمل':($lang==='de'?'Arbeitsoptionen':'Work Options')],
                ['num'=>'EU','label'=>$lang==='ar'?'موقع':($lang==='de'?'Standort':'Location')],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 16px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:26px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:11px; color:#94A3B8; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WHY JOIN --}}
<section style="padding:80px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B; margin-bottom:16px;">
                @if($lang==='ar') لماذا HOPn @elseif($lang==='de') Warum HOPn @else Why HOPn @endif
            </span>
            <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') لماذا تنضم إلينا @elseif($lang==='de') Warum zu uns @else Why Join Us @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:16px;">
            @php
            $perks=[
                ['icon'=>'🤖','color'=>'#4F6EF7','en'=>'Cutting-Edge Tech','de'=>'Modernste Technologie','ar'=>'تكنولوجيا متطورة','desc_en'=>'Work with AI, robotics, digital twins, and data platforms.','desc_de'=>'Arbeiten mit KI, Robotik, digitalen Zwillingen und Datenplattformen.','desc_ar'=>'العمل مع الذكاء الاصطناعي والروبوتيكا والتوائم الرقمية.'],
                ['icon'=>'🌍','color'=>'#10B981','en'=>'Global Impact','de'=>'Globale Wirkung','ar'=>'تأثير عالمي','desc_en'=>'Build solutions used across Europe, MENA, and beyond.','desc_de'=>'Lösungen für Europa, MENA und darüber hinaus entwickeln.','desc_ar'=>'بناء حلول تُستخدم في أوروبا والشرق الأوسط وما وراءها.'],
                ['icon'=>'🎓','color'=>'#8B5CF6','en'=>'Learning Culture','de'=>'Lernkultur','ar'=>'ثقافة التعلم','desc_en'=>'Continuous learning, research, and innovation encouraged.','desc_de'=>'Kontinuierliches Lernen, Forschen und Innovieren wird gefördert.','desc_ar'=>'التعلم المستمر والبحث والابتكار مشجَّع.'],
                ['icon'=>'🚀','color'=>'#F59E0B','en'=>'Startup Energy','de'=>'Startup-Energie','ar'=>'طاقة الشركات الناشئة','desc_en'=>'Fast-moving environment with real ownership and impact.','desc_de'=>'Schnelles Umfeld mit echtem Ownership und Wirkung.','desc_ar'=>'بيئة سريعة مع ملكية حقيقية وتأثير فعلي.'],
            ];
            @endphp
            @foreach($perks as $p)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $p['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $p['color'] }}15; border:1px solid {{ $p['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $p['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $p[$lang] ?? $p['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $p['desc_'.$lang] ?? $p['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- OPEN POSITIONS --}}
<section style="padding:80px 0 100px; background:#030712;">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:40px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">
                    @if($lang==='ar') الوظائف المتاحة @elseif($lang==='de') Offene Stellen @else Open Positions @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') فرص العمل الحالية @elseif($lang==='de') Aktuelle Stellen @else Current Opportunities @endif
                </h2>
            </div>
        </div>

        @forelse($jobs as $job)
        @php $types=['full-time'=>'#10B981','full_time'=>'#10B981','part-time'=>'#F59E0B','part_time'=>'#F59E0B','contract'=>'#8B5CF6','internship'=>'#06B6D4','remote'=>'#4F6EF7']; $tc=$types[strtolower(str_replace(' ','-',$job->type??''))]??'#F59E0B'; @endphp
        <div class="hopn-lift-card-nobg" style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:14px; padding:20px 28px; margin-bottom:12px; transition:all 0.25s; position:relative; overflow:hidden;">
            <div style="position:absolute; left:0; top:0; bottom:0; width:3px; background:{{ $tc }};"></div>
            <div style="padding-left:8px;">
                <h3 style="font-size:17px; font-weight:700; color:white; margin-bottom:8px;">{{ $job->title }}</h3>
                <div style="display:flex; flex-wrap:wrap; gap:8px; align-items:center;">
                    @if($job->location)
                    <span style="font-size:12px; color:#94A3B8;">📍 {{ $job->location }}</span>
                    @endif
                    @if($job->department)
                    <span style="font-size:11px; font-weight:600; padding:2px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8;">{{ $job->department }}</span>
                    @endif
                    @if($job->type)
                    <span style="font-size:11px; font-weight:700; padding:2px 10px; border-radius:999px; background:{{ $tc }}15; border:1px solid {{ $tc }}30; color:{{ $tc }}; text-transform:uppercase; letter-spacing:0.06em;">{{ ucfirst(str_replace('_',' ',$job->type)) }}</span>
                    @endif
                    @if($job->seniority)
                    <span style="font-size:11px; color:#64748B;">{{ $job->seniority }}</span>
                    @endif
                </div>
            </div>
            <a href="{{ route('careers.show', ['lang'=>$lang,'slug'=>$job->slug]) }}"
               class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:10px 24px; border-radius:8px; background:#F59E0B; color:white; font-size:14px; font-weight:600; text-decoration:none; white-space:nowrap; flex-shrink:0; transition:all 0.2s; box-shadow:0 0 20px rgba(245,158,11,0.3);">
                @if($lang==='ar') تقدم الآن @elseif($lang==='de') Bewerben @else Apply Now @endif →
            </a>
        </div>
        @empty
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div style="font-size:48px; margin-bottom:16px;">💼</div>
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') لا توجد وظائف متاحة حالياً @elseif($lang==='de') Derzeit keine offenen Stellen @else No Open Positions Right Now @endif
            </h3>
            <p style="font-size:14px; color:#64748B;">
                @if($lang==='ar') تحقق مرة أخرى قريباً @elseif($lang==='de') Schauen Sie bald wieder vorbei @else Check back soon! @endif
            </p>
        </div>
        @endforelse

        @if($jobs->hasPages())
        <div style="margin-top:40px; display:flex; justify-content:center;">{{ $jobs->links() }}</div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#050A14; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:700px; height:350px; background:radial-gradient(ellipse, rgba(245,158,11,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') لم تجد وظيفتك؟ @elseif($lang==='de') Keine passende Stelle? @else Don't See Your Role? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') أرسل لنا سيرتك الذاتية وسنضعك في الاعتبار لفرص مستقبلية.
            @elseif($lang==='de') Senden Sie uns Ihren Lebenslauf für zukünftige Möglichkeiten.
            @else Send us your CV and we'll keep you in mind for future opportunities. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#F59E0B; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(245,158,11,0.3); transition:all 0.2s;">
            @if($lang==='ar') أرسل سيرتك الذاتية @elseif($lang==='de') Lebenslauf senden @else Send Your CV @endif →
        </a>
    </div>
</section>

</x-layouts.public>
