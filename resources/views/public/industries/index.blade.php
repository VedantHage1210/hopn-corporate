@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'القطاعات':($lang==='de'?'Branchen':'Industries')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(6,182,212,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(6,182,212,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(6,182,212,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; background:radial-gradient(circle, rgba(79,110,247,0.06) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(6,182,212,0.3); background:rgba(6,182,212,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#06B6D4; display:inline-block; box-shadow:0 0 8px #06B6D4;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#06B6D4;">
                @if($lang==='ar') القطاعات @elseif($lang==='de') Branchen @else Industries @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">القطاعات</span>
                <span style="background:linear-gradient(135deg,#06B6D4,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> التي نخدمها</span>
            @elseif($lang==='de')
                <span style="color:white;">Branchen,</span>
                <span style="background:linear-gradient(135deg,#06B6D4,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> die wir bedienen</span>
            @else
                <span style="color:white;">Industries</span>
                <span style="background:linear-gradient(135deg,#06B6D4,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> We Serve</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto; line-height:1.7;">
            @if($lang==='ar') HOPn يقدم حلول مبتكرة في الذكاء الاصطناعي والبيانات لمختلف القطاعات الصناعية.
            @elseif($lang==='de') HOPn liefert innovative KI- und Datenlösungen für verschiedene Branchen.
            @else HOPn delivers innovative AI, data, and digital solutions across key industries. @endif
        </p>
    </div>
</section>

{{-- INDUSTRIES GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($industries->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:16px;">
            @foreach($industries as $industry)
            @php $colors=['#06B6D4','#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('industries.show', ['lang'=>$lang,'slug'=>$industry->slug]) }}" class="hopn-lift-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    <div style="width:48px; height:48px; border-radius:12px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0;">
                        {{ $industry->icon ?? '🏭' }}
                    </div>
                    <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3; margin:0;">
                        @if($lang==='de'&&$industry->name_de) {{ $industry->name_de }}
                        @elseif($lang==='ar'&&$industry->name_ar) {{ $industry->name_ar }}
                        @else {{ $industry->name }} @endif
                    </h3>
                </div>
                <p style="font-size:13px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:20px;">
                    @if($lang==='de'&&$industry->description_de) {{ Str::limit($industry->description_de,100) }}
                    @elseif($lang==='ar'&&$industry->description_ar) {{ Str::limit($industry->description_ar,100) }}
                    @else {{ Str::limit($industry->description,100) }} @endif
                </p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn More @endif
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div style="font-size:48px; margin-bottom:16px;">🏭</div>
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') القطاعات قادمة قريباً @elseif($lang==='de') Branchen folgen @else Industries Coming Soon @endif
            </h3>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:700px; height:350px; background:radial-gradient(ellipse, rgba(6,182,212,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد حلاً مخصصاً لقطاعك؟ @elseif($lang==='de') Maßgeschneiderte Lösung gewünscht? @else Looking for a Tailored Solution? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع HOPn لمناقشة حل مخصص لقطاعك.
            @elseif($lang==='de') Kontaktieren Sie HOPn für eine branchenspezifische Lösung.
            @else Contact HOPn to discuss a tailored solution for your industry. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-lift-btn"
           style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#06B6D4; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(6,182,212,0.3);">
            @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Contact HOPn @endif →
        </a>
    </div>
</section>

</x-layouts.public>
