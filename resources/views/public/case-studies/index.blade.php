@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'دراسات الحالة':($lang==='de'?'Fallstudien':'Case Studies')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') دراسات الحالة @elseif($lang==='de') Fallstudien @else Case Studies @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">نتائج حقيقية</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#10B981); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> لعملاء حقيقيين</span>
            @elseif($lang==='de')
                <span style="color:white;">Echte Ergebnisse</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#10B981); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> für echte Kunden</span>
            @else
                <span style="color:white;">Real Results</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6,#10B981); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> for Real Clients</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
            @if($lang==='ar') اكتشف كيف يساعد HOPn المؤسسات والشركات الناشئة على تحويل أعمالها.
            @elseif($lang==='de') Entdecken Sie, wie HOPn Unternehmen bei der digitalen Transformation unterstützt.
            @else Discover how HOPn helps enterprises and startups transform their operations with AI and data. @endif
        </p>
    </div>
</section>

{{-- CASE STUDIES GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($caseStudies->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(340px,1fr)); gap:20px;">
            @foreach($caseStudies as $caseStudy)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('case-studies.show', ['lang'=>$lang,'slug'=>$caseStudy->slug]) }}"
               class="hopn-lift-card" style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; overflow:hidden; text-decoration:none; transition:all 0.3s; position:relative;">

                {{-- Image --}}
                @if(!empty($caseStudy->image_url))
                <div style="height:200px; overflow:hidden; position:relative;">
                    <img src="{{ $caseStudy->image_url }}" alt="{{ $caseStudy->title }}"
                         class="hopn-lift-btn" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 40%, rgba(10,15,30,0.9));"></div>
                </div>
                @else
                <div style="height:120px; background:linear-gradient(135deg,{{ $c }}20,{{ $c }}05); display:flex; align-items:center; justify-content:center; position:relative;">
                    <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $c }},transparent);"></div>
                    <span style="font-size:48px;">💡</span>
                </div>
                @endif

                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:14px;">
                    {{-- Industry/Category badge --}}
                    @if(!empty($caseStudy->industry))
                    <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; border:1px solid {{ $c }}30; color:{{ $c }}; width:fit-content; text-transform:uppercase; letter-spacing:0.06em;">
                        {{ $caseStudy->industry }}
                    </span>
                    @endif

                    <h3 style="font-size:20px; font-weight:800; color:white; line-height:1.3; letter-spacing:-0.5px; margin:0;">
                        @if($lang==='de'&&!empty($caseStudy->title_de)) {{ $caseStudy->title_de }}
                        @elseif($lang==='ar'&&!empty($caseStudy->title_ar)) {{ $caseStudy->title_ar }}
                        @else {{ $caseStudy->title }} @endif
                    </h3>

                    @if(!empty($caseStudy->summary) || !empty($caseStudy->excerpt))
                    <p style="font-size:14px; color:#94A3B8; line-height:1.7; flex:1; margin:0;">
                        {{ Str::limit($caseStudy->summary ?? $caseStudy->excerpt ?? '', 110) }}
                    </p>
                    @endif

                    {{-- Results/Metrics --}}
                    @if(!empty($caseStudy->results))
                    <div style="display:flex; flex-wrap:wrap; gap:8px;">
                        @foreach(array_slice(explode(',', $caseStudy->results), 0, 2) as $result)
                        <span style="font-size:12px; font-weight:600; padding:4px 10px; border-radius:6px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); color:#10B981;">
                            ✓ {{ trim($result) }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <div style="display:flex; align-items:center; justify-content:space-between; padding-top:16px; border-top:1px solid rgba(255,255,255,0.05);">
                        @if(!empty($caseStudy->client_name))
                        <span style="font-size:12px; color:#64748B; font-weight:500;">{{ $caseStudy->client_name }}</span>
                        @endif
                        <span style="font-size:13px; font-weight:600; color:{{ $c }}; display:flex; align-items:center; gap:6px; margin-left:auto;">
                            @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Lesen @else Read More @endif →
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($caseStudies->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">
            {{ $caseStudies->links() }}
        </div>
        @endif

        @else
        <div style="text-align:center; padding:80px; color:#475569;">
            <div style="font-size:48px; margin-bottom:16px;">💡</div>
            <h3 style="font-size:20px; font-weight:700; color:#64748B; margin-bottom:8px;">
                @if($lang==='ar') دراسات الحالة قادمة قريباً @elseif($lang==='de') Fallstudien folgen in Kürze @else Case Studies Coming Soon @endif
            </h3>
            <p style="font-size:14px; color:#475569;">
                @if($lang==='ar') أضف دراسات الحالة من لوحة الإدارة @elseif($lang==='de') Über das Admin-Panel hinzufügen @else Add from the admin panel @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- STATS --}}
<section style="padding:80px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04);">
    <div class="container-shell">
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; overflow:hidden; max-width:800px; margin:0 auto 64px;">
            @foreach([
                ['num'=>'50+','label'=>$lang==='ar'?'مشروع منجز':($lang==='de'?'Abgeschlossene Projekte':'Projects Delivered')],
                ['num'=>'98%','label'=>$lang==='ar'?'رضا العملاء':($lang==='de'?'Kundenzufriedenheit':'Client Satisfaction')],
                ['num'=>'10+','label'=>$lang==='ar'?'قطاع':($lang==='de'?'Branchen':'Industries')],
                ['num'=>'EU', 'label'=>$lang==='ar'?'نطاق التشغيل':($lang==='de'?'Betriebsgebiet':'Operating Region')],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 16px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:26px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:11px; color:#64748B; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div style="text-align:center;">
            <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') هل تريد نتائج مماثلة؟ @elseif($lang==='de') Möchten Sie ähnliche Ergebnisse? @else Want Similar Results? @endif
            </h2>
            <p style="color:#94A3B8; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
                @if($lang==='ar') تواصل مع HOPn لمناقشة مشروعك.
                @elseif($lang==='de') Kontaktieren Sie HOPn um Ihr Projekt zu besprechen.
                @else Get in touch with HOPn to discuss your project and goals. @endif
            </p>
            <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
                <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
                   class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;">
                    @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif →
                </a>
                <a href="{{ route('services.index', ['lang'=>$lang]) }}"
                   class="hopn-bg-brighten" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
                    @if($lang==='ar') عرض الخدمات @elseif($lang==='de') Leistungen @else View Services @endif
                </a>
            </div>
        </div>
    </div>
</section>

</x-layouts.public>
