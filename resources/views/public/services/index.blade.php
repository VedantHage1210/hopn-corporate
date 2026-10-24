@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'الخدمات':($lang==='de'?'Leistungen':'Services')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') خدمات HOPn @elseif($lang==='de') HOPn Leistungen @else HOPn Services @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($activeCategory)
                <span style="color:#8FB8CC;">
                    {{ $lang==='ar' && $activeCategory->name_ar ? $activeCategory->name_ar : ($lang==='de' && $activeCategory->name_de ? $activeCategory->name_de : $activeCategory->name) }}
                </span>
            @elseif($lang==='ar')
                <span style="color:white;">خدماتنا</span>
                <span style="color:#8FB8CC;"> الاحترافية</span>
            @elseif($lang==='de')
                <span style="color:white;">Unsere</span>
                <span style="color:#8FB8CC;"> Kernleistungen</span>
            @else
                <span style="color:white;">Our</span>
                <span style="color:#8FB8CC;"> Core Services</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') حلول متكاملة للتحول الرقمي من الاستشارة إلى التنفيذ.
            @elseif($lang==='de') Ganzheitliche digitale Transformationsdienstleistungen von der Beratung bis zur Umsetzung.
            @else End-to-end digital transformation services from consulting to implementation. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-btn-primary"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') احجز مكالمة @elseif($lang==='de') Termin buchen @else Book a Call @endif →
            </a>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}" class="hopn-btn-secondary"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') عرض الكتالوج @elseif($lang==='de') Katalog ansehen @else View Catalog @endif
            </a>
        </div>
    </div>
</section>

{{-- SERVICES GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($services->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:16px;">
            @foreach($services as $service)
            @php
                $colors=['#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC']; $c=$colors[$loop->index%6];
                $svcTitle = $lang==='ar' && $service->name_ar ? $service->name_ar : ($lang==='de' && $service->name_de ? $service->name_de : $service->name);
                $svcSummary = $lang==='ar' && $service->summary_ar ? $service->summary_ar : ($lang==='de' && $service->summary_de ? $service->summary_de : $service->summary);
            @endphp
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}" class="hopn-lift-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; position:relative; overflow:hidden;">
                <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:10px; line-height:1.3;">{{ $svcTitle }}</h3>
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($svcSummary ?? '',100) }}</p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
        @if($services->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">{{ $services->links() }}</div>
        @endif
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div aria-hidden="true" style="font-size:28px; font-weight:800; margin-bottom:16px;">S</div>
            <p style="font-size:16px; color:#94A3B8;">
                @if($lang==='ar') لا توجد خدمات حالياً @elseif($lang==='de') Keine Leistungen gefunden @else No services found @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد مناقشة مشروعك؟ @elseif($lang==='de') Möchten Sie Ihr Projekt besprechen? @else Ready to Discuss Your Project? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn اليوم للحصول على استشارة مجانية.
            @elseif($lang==='de') Kontaktieren Sie das HOPn-Team für eine kostenlose Beratung.
            @else Get in touch with HOPn today for a free consultation. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-btn-primary"
           style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none;">
            @if($lang==='ar') طلب اقتراح @elseif($lang==='de') Angebot anfordern @else Request Proposal @endif →
        </a>
    </div>
</section>

</x-layouts.public>