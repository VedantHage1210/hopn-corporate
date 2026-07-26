@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'الخدمات':($lang==='de'?'Leistungen':'Services')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(79,110,247,0.10) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">HOPn Services</span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($activeCategory)
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                    {{ $lang==='de' && $activeCategory->name_de ? $activeCategory->name_de : $activeCategory->name }}
                </span>
            @elseif($lang==='ar')
                <span style="color:white;">خدماتنا</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> الاحترافية</span>
            @elseif($lang==='de')
                <span style="color:white;">Unsere</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> Kernleistungen</span>
            @else
                <span style="color:white;">Our</span>
                <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> Core Services</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#64748B; max-width:600px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') حلول متكاملة للتحول الرقمي من الاستشارة إلى التنفيذ.
            @elseif($lang==='de') Ganzheitliche digitale Transformationsdienstleistungen von der Beratung bis zur Umsetzung.
            @else End-to-end digital transformation services from consulting to implementation. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4); transition:all 0.2s;"
               onmouseover="this.style.transform='translateY(-2px)'"
               onmouseout="this.style.transform='translateY(0)'">
                @if($lang==='ar') احجز مكالمة @elseif($lang==='de') Termin buchen @else Book a Call @endif →
            </a>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'"
               onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                @if($lang==='ar') عرض الكتالوج @elseif($lang==='de') Katalog ansehen @else View Catalog @endif
            </a>
        </div>
    </div>
</section>

{{-- SERVICES GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($services->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:16px;">
            @foreach($services as $service)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s; position:relative; overflow:hidden;"
               onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px; flex-shrink:0;">
                    {{ $service->icon ?? '⚡' }}
                </div>
                <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:10px; line-height:1.3;">{{ $service->title }}</h3>
                <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($service->summary ?? $service->description ?? '',100) }}</p>
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
        <div style="text-align:center; padding:80px; color:#334155;">
            <div style="font-size:48px; margin-bottom:16px;">⚡</div>
            <p style="font-size:16px; color:#475569;">
                @if($lang==='ar') لا توجد خدمات حالياً @elseif($lang==='de') Keine Leistungen gefunden @else No services found @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.07) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد مناقشة مشروعك؟ @elseif($lang==='de') Möchten Sie Ihr Projekt besprechen? @else Ready to Discuss Your Project? @endif
        </h2>
        <p style="color:#64748B; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn اليوم للحصول على استشارة مجانية.
            @elseif($lang==='de') Kontaktieren Sie das HOPn-Team für eine kostenlose Beratung.
            @else Get in touch with HOPn today for a free consultation. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;"
           onmouseover="this.style.transform='translateY(-2px)'"
           onmouseout="this.style.transform='translateY(0)'">
            @if($lang==='ar') طلب اقتراح @elseif($lang==='de') Angebot anfordern @else Request Proposal @endif →
        </a>
    </div>
</section>

</x-layouts.public>