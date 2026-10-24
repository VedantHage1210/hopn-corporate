@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'مجالات الابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#8B5CF6; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') الابتكار @elseif($lang==='de') Innovation @else Innovation @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">مجالات</span>
                <span style="color:#8FB8CC;"> الابتكار</span>
            @elseif($lang==='de')
                <span style="color:white;">Innovations</span>
                <span style="color:#8FB8CC;">domänen</span>
            @else
                <span style="color:white;">Innovation</span>
                <span style="color:#8FB8CC;"> Domains</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto; line-height:1.7;">
            @if($lang==='ar') HOPn يقود الابتكار في مجالات التكنولوجيا المتقدمة — الذكاء الاصطناعي والروبوتيكا والبيانات.
            @elseif($lang==='de') HOPn treibt Innovation in KI, Robotik, digitalen Zwillingen und Datenplattformen voran.
            @else HOPn leads innovation across AI, robotics, data, and deep-tech domains. @endif
        </p>
    </div>
</section>

{{-- DOMAINS GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($domains->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:16px;">
            @foreach($domains as $domain)
            @php $colors=['#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$domain->slug]) }}"
               class="hopn-lift-card" style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.3s; position:relative; overflow:hidden;">
                <div aria-hidden="true" style="font-size:28px; font-weight:800; margin-bottom:16px;">{{ strtoupper(substr($domain->name, 0, 1)) }}</div>
                <h3 style="font-size:20px; font-weight:800; color:white; margin-bottom:12px; letter-spacing:-0.5px;">
                    @if($lang==='de'&&$domain->name_de) {{ $domain->name_de }}
                    @elseif($lang==='ar'&&$domain->name_ar) {{ $domain->name_ar }}
                    @else {{ $domain->name }} @endif
                </h3>
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:20px;">
                    @if($lang==='de'&&$domain->description_de) {{ Str::limit($domain->description_de,120) }}
                    @elseif($lang==='ar'&&$domain->description_ar) {{ Str::limit($domain->description_ar,120) }}
                    @else {{ Str::limit($domain->description,120) }} @endif
                </p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn More @endif →
                </span>
            </a>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div aria-hidden="true" style="font-size:28px; font-weight:800; margin-bottom:16px;">I</div>
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') المجالات قادمة قريباً @elseif($lang==='de') Domänen folgen @else Domains Coming Soon @endif
            </h3>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد الابتكار مع HOPn؟ @elseif($lang==='de') Mit HOPn innovieren? @else Ready to Innovate with HOPn? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn لمناقشة فرص الابتكار.
            @elseif($lang==='de') Kontaktieren Sie HOPn für Innovationsmöglichkeiten.
            @else Get in touch with HOPn to explore innovation opportunities. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#8B5CF6; color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Contact HOPn @endif →
            </a>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               class="hopn-bg-brighten" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
                @if($lang==='ar') عرض الكتالوج @elseif($lang==='de') Katalog @else View Catalog @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>
