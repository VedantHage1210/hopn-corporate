@php
    $lang = request()->route('lang', 'en');
    $heroEyebrow = $lang==='de' ? ($hero->hero_eyebrow_de ?: $hero->hero_eyebrow_en) : ($lang==='ar' ? ($hero->hero_eyebrow_ar ?: $hero->hero_eyebrow_en) : $hero->hero_eyebrow_en);
    $heroTitle = $lang==='de' ? ($hero->hero_title_de ?: $hero->hero_title_en) : ($lang==='ar' ? ($hero->hero_title_ar ?: $hero->hero_title_en) : $hero->hero_title_en);
    $heroSubtitle = $lang==='de' ? ($hero->hero_subtitle_de ?: $hero->hero_subtitle_en) : ($lang==='ar' ? ($hero->hero_subtitle_ar ?: $hero->hero_subtitle_en) : $hero->hero_subtitle_en);
    $heroTags = $lang==='de' ? ($hero->hero_tags_de ?: $hero->hero_tags_en) : ($lang==='ar' ? ($hero->hero_tags_ar ?: $hero->hero_tags_en) : $hero->hero_tags_en);
@endphp
<x-layouts.public :title="'HOPn Labs'">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(139,92,246,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(139,92,246,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#A78BFA;">{{ $heroEyebrow }}</span>
        <h1 style="font-size:clamp(32px,5vw,56px); font-weight:900; color:white; margin:16px 0 20px; max-width:800px; margin-left:auto; margin-right:auto;">{{ $heroTitle }}</h1>
        @if($heroSubtitle)
        <p style="font-size:17px; color:#CBD5E1; max-width:640px; margin:0 auto 24px;">{{ $heroSubtitle }}</p>
        @endif
        @if(!empty($heroTags))
        <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
            @foreach($heroTags as $tag)
            <span style="padding:6px 16px; border-radius:999px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); color:#A78BFA; font-size:12px; font-weight:600;">{{ $tag }}</span>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- KEY FOCUS AREAS --}}
@if($focusAreas->count())
<section style="background:#030712; padding:20px 0 80px;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') مجالات التركيز الرئيسية @elseif($lang==='de') Wichtige Schwerpunkte @else Key Focus Areas @endif
            </span>
            <h2 style="font-size:28px; font-weight:900; color:white; margin:12px 0 0;">
                @if($lang==='ar') بحث تطبيقي وتفكير في المنتج @elseif($lang==='de') Angewandte Forschung und Produktdenken @else Applied research and product thinking @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @foreach($focusAreas as $item)
            @php
                $title = $lang==='de' ? ($item->title_de ?: $item->title_en) : ($lang==='ar' ? ($item->title_ar ?: $item->title_en) : $item->title_en);
                $desc  = $lang==='de' ? ($item->description_de ?: $item->description_en) : ($lang==='ar' ? ($item->description_ar ?: $item->description_en) : $item->description_en);
                $tags  = $lang==='de' ? ($item->tags_de ?: $item->tags_en) : ($lang==='ar' ? ($item->tags_ar ?: $item->tags_en) : $item->tags_en);
                $cta   = $lang==='de' ? ($item->cta_label_de ?: $item->cta_label_en) : ($lang==='ar' ? ($item->cta_label_ar ?: $item->cta_label_en) : $item->cta_label_en);
                $color = $item->accent_color ?: '#8B5CF6';
            @endphp
            <div data-tilt class="card-panel" style="padding:26px;">
                <h3 style="color:white; font-size:17px; font-weight:800; margin:0 0 10px;">{{ $title }}</h3>
                @if($desc)<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0 0 16px;">{{ $desc }}</p>@endif
                @if(!empty($tags))
                <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:18px;">
                    @foreach($tags as $tag)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $color }}15; border:1px solid {{ $color }}30; color:{{ $color }};">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                @if($item->cta_url)
                <a href="{{ $item->cta_url }}" style="font-size:13px; font-weight:700; color:{{ $color }}; text-decoration:none;">{{ $cta ?: 'Explore' }} →</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- HOW WE WORK --}}
@if($steps->count())
<section style="background:#050A14; padding:80px 0;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#06B6D4;">HOPn Labs</span>
            <h2 style="font-size:28px; font-weight:900; color:white; margin:12px 0 8px;">
                @if($lang==='ar') كيف نعمل @elseif($lang==='de') Wie wir arbeiten @else How We Work @endif
            </h2>
            <p style="color:#94A3B8; font-size:15px;">
                @if($lang==='ar') طريقة قابلة للتكرار للتعلم بسرعة وتقليل المخاطر وتحقيق النتائج.
                @elseif($lang==='de') Ein wiederholbarer Weg, um schnell zu lernen, Risiken zu reduzieren und Ergebnisse zu liefern.
                @else A repeatable way to learn fast, reduce risk, and ship outcomes. @endif
            </p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:24px;">
            @foreach($steps as $step)
            @php
                $sTitle = $lang==='de' ? ($step->title_de ?: $step->title_en) : ($lang==='ar' ? ($step->title_ar ?: $step->title_en) : $step->title_en);
                $sDesc  = $lang==='de' ? ($step->description_de ?: $step->description_en) : ($lang==='ar' ? ($step->description_ar ?: $step->description_en) : $step->description_en);
            @endphp
            <div>
                <div style="font-size:32px; font-weight:900; color:rgba(6,182,212,0.35); margin-bottom:10px;">{{ str_pad($step->step_number, 2, '0', STR_PAD_LEFT) }}</div>
                <h3 style="color:white; font-size:16px; font-weight:800; margin:0 0 8px;">{{ $sTitle }}</h3>
                @if($sDesc)<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0;">{{ $sDesc }}</p>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- PROGRAMS & INITIATIVES --}}
@if($programs->count())
<section style="background:#030712; padding:80px 0;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#10B981;">HOPn Labs</span>
            <h2 style="font-size:28px; font-weight:900; color:white; margin:12px 0 8px;">
                @if($lang==='ar') البرامج والمبادرات @elseif($lang==='de') Programme & Initiativen @else Programs & Initiatives @endif
            </h2>
            <p style="color:#94A3B8; font-size:15px;">
                @if($lang==='ar') تعلم وابنِ وتعاون من خلال برامج عملية ومشاريع مجتمعية.
                @elseif($lang==='de') Lerne, baue und arbeite durch praktische Programme und Community-Projekte zusammen.
                @else Learn, build, and collaborate through hands-on programs and community projects. @endif
            </p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @foreach($programs as $item)
            @php
                $title = $lang==='de' ? ($item->title_de ?: $item->title_en) : ($lang==='ar' ? ($item->title_ar ?: $item->title_en) : $item->title_en);
                $desc  = $lang==='de' ? ($item->description_de ?: $item->description_en) : ($lang==='ar' ? ($item->description_ar ?: $item->description_en) : $item->description_en);
                $tags  = $lang==='de' ? ($item->tags_de ?: $item->tags_en) : ($lang==='ar' ? ($item->tags_ar ?: $item->tags_en) : $item->tags_en);
                $cta   = $lang==='de' ? ($item->cta_label_de ?: $item->cta_label_en) : ($lang==='ar' ? ($item->cta_label_ar ?: $item->cta_label_en) : $item->cta_label_en);
                $color = $item->accent_color ?: '#10B981';
            @endphp
            <div data-tilt class="card-panel" style="padding:26px;">
                <h3 style="color:white; font-size:17px; font-weight:800; margin:0 0 10px;">{{ $title }}</h3>
                @if($desc)<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0 0 16px;">{{ $desc }}</p>@endif
                @if(!empty($tags))
                <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:18px;">
                    @foreach($tags as $tag)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $color }}15; border:1px solid {{ $color }}30; color:{{ $color }};">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                @if($item->cta_url)
                <a href="{{ $item->cta_url }}" style="font-size:13px; font-weight:700; color:{{ $color }}; text-decoration:none;">{{ $cta ?: 'Explore' }} →</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- TESTIMONIALS --}}
@if($testimonials->count())
<section style="background:#050A14; padding:80px 0;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#F59E0B;">HOPn Labs</span>
            <h2 style="font-size:28px; font-weight:900; color:white; margin:12px 0 0;">
                @if($lang==='ar') ماذا يقول الناس @elseif($lang==='de') Was Leute sagen @else What People Say @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @foreach($testimonials as $testimonial)
            <x-testimonial :testimonial="$testimonial" />
            @endforeach
        </div>
    </div>
</section>
@endif

</x-layouts.public>
