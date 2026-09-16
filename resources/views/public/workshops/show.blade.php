@php
    $lang  = request()->route('lang', 'en');
    $title = $lang==='de' ? ($workshop->title_de ?: $workshop->title_en) : ($lang==='ar' ? ($workshop->title_ar ?: $workshop->title_en) : $workshop->title_en);
    $summary = $lang==='de' ? ($workshop->summary_de ?: $workshop->summary_en) : ($lang==='ar' ? ($workshop->summary_ar ?: $workshop->summary_en) : $workshop->summary_en);
    $description = $lang==='de' ? ($workshop->description_de ?: $workshop->description_en) : ($lang==='ar' ? ($workshop->description_ar ?: $workshop->description_en) : $workshop->description_en);
    $outcomes = $lang==='de' ? ($workshop->outcomes_de ?: $workshop->outcomes_en) : ($lang==='ar' ? ($workshop->outcomes_ar ?: $workshop->outcomes_en) : $workshop->outcomes_en);
@endphp
<style>
    .hopn-workshop-detail-grid { display:grid; gap:32px; grid-template-columns:1.4fr 1fr; }
    @media (max-width: 768px) {
        .hopn-workshop-detail-grid { grid-template-columns:1fr; }
    }
</style>
<x-layouts.public :title="$title">

<section style="background:#030712; padding:80px 0 60px;">
    <div class="container-shell" style="max-width:900px; margin:0 auto;">
        <span style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#A78BFA;">{{ $workshop->category ?? 'Workshop' }} · {{ str_replace('_',' ',$workshop->format) }}</span>
        <h1 style="font-size:clamp(32px,5vw,52px); font-weight:900; color:white; line-height:1.1; margin:16px 0 20px;">{{ $title }}</h1>
        <p style="font-size:18px; color:#CBD5E1; line-height:1.7; max-width:700px;">{{ $summary }}</p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; margin-top:32px;">
            <a href="{{ route('workshops.book', ['lang'=>$lang, 'slug'=>$workshop->slug]) }}" class="hopn-lift-btn"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(139,92,246,0.4);">
                @if($lang==='ar') احجز الآن @elseif($lang==='de') Jetzt buchen @else Book this workshop @endif →
            </a>
            <span style="display:inline-flex; align-items:center; gap:8px; padding:14px 24px; color:#94A3B8; font-size:14px;">
                {{ $workshop->duration_label_en ?? '' }}
                @if($workshop->price_on_request) · @if($lang==='ar') السعر عند الطلب @elseif($lang==='de') Preis auf Anfrage @else Price on request @endif
                @elseif($workshop->price) · {{ $workshop->currency }} {{ number_format($workshop->price, 0) }}
                @endif
            </span>
        </div>
    </div>
</section>

@if($description || !empty($outcomes))
<section style="background:#030712; padding:0 0 80px;">
    <div class="container-shell hopn-workshop-detail-grid" style="max-width:900px; margin:0 auto; {{ !empty($outcomes) && $description ? '' : 'grid-template-columns:1fr;' }}">
        @if($description)
        <div class="card-panel" style="padding:32px;">
            <h2 style="font-size:16px; font-weight:800; color:white; margin:0 0 16px;">
                @if($lang==='ar') نظرة عامة @elseif($lang==='de') Überblick @else Overview @endif
            </h2>
            <div style="color:#94A3B8; font-size:15px; line-height:1.8; white-space:pre-line;">{{ $description }}</div>
        </div>
        @endif
        @if(!empty($outcomes))
        <div class="card-panel" style="padding:32px;">
            <h2 style="font-size:16px; font-weight:800; color:white; margin:0 0 16px;">
                @if($lang==='ar') ماذا ستتعلم @elseif($lang==='de') Lernziele @else What you'll learn @endif
            </h2>
            <ul style="margin:0; padding:0; list-style:none; display:grid; gap:12px;">
                @foreach($outcomes as $point)
                <li style="display:flex; gap:10px; color:#CBD5E1; font-size:14px; line-height:1.6;">
                    <span style="color:#8B5CF6; flex-shrink:0;">✓</span>{{ $point }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</section>
@endif

@if($workshop->instructor_name)
<section style="background:#030712; padding:0 0 80px;">
    <div class="container-shell" style="max-width:900px; margin:0 auto;">
        <div class="card-panel" style="padding:28px; display:flex; gap:16px; align-items:center;">
            <div style="width:52px; height:52px; border-radius:50%; background:linear-gradient(135deg,#8B5CF6,#4F6EF7); flex-shrink:0;"></div>
            <div>
                <div style="color:white; font-weight:700; font-size:15px;">{{ $workshop->instructor_name }}</div>
                @if($workshop->instructor_bio)<div style="color:#94A3B8; font-size:13px; margin-top:2px;">{{ $workshop->instructor_bio }}</div>@endif
            </div>
        </div>
    </div>
</section>
@endif

@if($related->count())
<section style="background:#030712; padding:0 0 100px;">
    <div class="container-shell">
        <h2 style="font-size:20px; font-weight:800; color:white; margin:0 0 24px; text-align:center;">
            @if($lang==='ar') قد يعجبك أيضًا @elseif($lang==='de') Das könnte dich auch interessieren @else You might also like @endif
        </h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @foreach($related as $r)
            <a href="{{ route('workshops.show', ['lang'=>$lang, 'slug'=>$r->slug]) }}" class="card-panel" style="display:block; padding:22px; text-decoration:none;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin:0 0 8px;">{{ $r->title_en }}</h3>
                <p style="font-size:13px; color:#94A3B8; margin:0;">{{ \Illuminate\Support\Str::limit($r->summary_en, 80) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

</x-layouts.public>
