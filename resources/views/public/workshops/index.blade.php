@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'التدريب وورش العمل':($lang==='de'?'Training & Workshops':'Training & Workshops')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(139,92,246,0.10) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#8B5CF6; display:inline-block; box-shadow:0 0 8px #8B5CF6;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') التدريب وورش العمل @elseif($lang==='de') Training & Workshops @else Training & Workshops @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,64px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">ابنِ فريقك من خلال</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> ورش HOPn</span>
            @elseif($lang==='de')
                <span style="color:white;">Team-Skills aufbauen mit</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn Workshops</span>
            @else
                <span style="color:white;">Upskill your team with</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn Workshops</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:640px; margin:0 auto 16px; line-height:1.7;">
            @if($lang==='ar') AI، تحليل البيانات، التحول الرقمي، والتوائم الرقمية — عند الطلب، مباشرة، أو مختلط.
            @elseif($lang==='de') KI, Datenanalyse, digitale Transformation und Digital Twins — remote, vor Ort oder hybrid.
            @else AI, data analytics, digital transformation and digital twin training — on-site, remote, or hybrid. @endif
        </p>
    </div>
</section>

{{-- FILTERS --}}
<section style="background:#030712; padding:0 0 20px;">
    <div class="container-shell" style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
        <a href="{{ route('workshops.index', ['lang'=>$lang]) }}"
           style="padding:8px 16px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; border:1px solid {{ !request('category') ? '#8B5CF6' : 'rgba(148,163,184,0.25)' }}; color:{{ !request('category') ? '#A78BFA' : '#94A3B8' }};">
            @if($lang==='ar') الكل @elseif($lang==='de') Alle @else All @endif
        </a>
        @foreach($categories as $category)
        <a href="{{ route('workshops.index', ['lang'=>$lang, 'category'=>$category]) }}"
           style="padding:8px 16px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; border:1px solid {{ request('category')===$category ? '#8B5CF6' : 'rgba(148,163,184,0.25)' }}; color:{{ request('category')===$category ? '#A78BFA' : '#94A3B8' }};">
            {{ $category }}
        </a>
        @endforeach
    </div>
</section>

{{-- GRID --}}
<section style="background:#030712; padding:20px 0 100px;">
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:24px;">
            @forelse($workshops as $workshop)
            <a href="{{ route('workshops.show', ['lang'=>$lang, 'slug'=>$workshop->slug]) }}"
               class="card-panel" style="display:block; padding:28px; text-decoration:none; transition:transform .2s;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                    <span style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#A78BFA;">{{ $workshop->category ?? 'Workshop' }}</span>
                    <span style="font-size:11px; color:#64748B;">{{ str_replace('_',' ',$workshop->format) }}</span>
                </div>
                <h3 style="font-size:20px; font-weight:800; color:white; margin:0 0 10px;">
                    {{ $lang==='de' ? ($workshop->title_de ?: $workshop->title_en) : ($lang==='ar' ? ($workshop->title_ar ?: $workshop->title_en) : $workshop->title_en) }}
                </h3>
                <p style="font-size:14px; color:#94A3B8; line-height:1.6; margin:0 0 18px;">
                    {{ \Illuminate\Support\Str::limit($lang==='de' ? ($workshop->summary_de ?: $workshop->summary_en) : ($lang==='ar' ? ($workshop->summary_ar ?: $workshop->summary_en) : $workshop->summary_en), 110) }}
                </p>
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px; color:#64748B;">
                    <span>{{ $workshop->duration_label_en ?? '—' }}</span>
                    <span style="color:#A78BFA; font-weight:700;">
                        @if($workshop->price_on_request)
                            @if($lang==='ar') عند الطلب @elseif($lang==='de') Auf Anfrage @else On request @endif
                        @elseif($workshop->price)
                            {{ $workshop->currency }} {{ number_format($workshop->price, 0) }}
                        @endif
                    </span>
                </div>
            </a>
            @empty
            <p style="color:#64748B; grid-column:1/-1; text-align:center; padding:60px 0;">
                @if($lang==='ar') لا توجد ورش منشورة حاليًا. @elseif($lang==='de') Aktuell keine Workshops veröffentlicht. @else No workshops published yet. @endif
            </p>
            @endforelse
        </div>
        <div style="margin-top:40px;">{{ $workshops->links() }}</div>
    </div>
</section>

</x-layouts.public>
