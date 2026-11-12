<x-layouts.public :title="'Research'">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Header --}}
<section style="padding:80px 0 40px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell hopn-reveal" style="text-align:center; max-width:700px;">
        <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
            @if($lang==='ar') البحث @elseif($lang==='de') Forschung @else Research @endif
        </span>
        <h1 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') الأبحاث والمنشورات @elseif($lang==='de') Forschung & Publikationen @else Research & Publications @endif
        </h1>
        <p style="color:#CBD5E1; font-size:17px; line-height:1.7;">
            @if($lang==='ar') العمل البحثي الذي يقوم عليه ما نبنيه، من المفهوم إلى التنفيذ.
            @elseif($lang==='de') Die Forschungsarbeit, auf der unsere Arbeit aufbaut — vom Konzept bis zur Umsetzung.
            @else The research work behind what we build — from concept through to implementation. @endif
        </p>
    </div>
</section>

{{-- PUBLICATIONS --}}
<x-research-theme />
@if($publications->count() > 0)
<section class="rs-sec" style="padding:40px 0 90px;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell">
        <div class="rs-grid">
            @foreach($publications as $pub)
            @php
                $pubTitle = $lang==='ar' && !empty($pub->title_ar) ? $pub->title_ar : ($lang==='de' && !empty($pub->title_de) ? $pub->title_de : $pub->title_en);
                $pubSummary = $lang==='ar' && !empty($pub->summary_ar) ? $pub->summary_ar : ($lang==='de' && !empty($pub->summary_de) ? $pub->summary_de : $pub->summary_en);
            @endphp
            <a href="{{ route('research.publications.show', ['lang' => $lang, 'id' => $pub->id]) }}" class="rs-item hopn-reveal">
                @if($pub->image_url)
                <img class="rs-media" loading="lazy" decoding="async" src="{{ $pub->image_url }}" alt="{{ $pubTitle }}">
                @else
                <x-card-art :seed="$pubTitle" :height="190" style="margin-bottom:18px;" />
                @endif
                @if($pub->project)<span class="rs-chip">{{ $pub->project }}</span>@endif
                <h3 class="rs-title">{{ $pubTitle }}</h3>
                @if($pub->authors || $pub->published_on)
                <p class="rs-meta">{{ $pub->authors }}{{ $pub->authors && $pub->published_on ? ' · ' : '' }}{{ $pub->published_on?->locale(request()->route('lang','en'))->translatedFormat('M Y') }}</p>
                @endif
                @if(!empty($pubSummary))<p class="rs-text">{{ $pubSummary }}</p>@endif
                <span class="rs-more">@if($lang==='ar') اقرأ البحث @elseif($lang==='de') Beitrag öffnen @else Read publication @endif →</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ACADEMIC PARTNERS --}}
@if($academicPartners->count() > 0)
<section class="rs-sec" style="padding:0 0 100px;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell" style="text-align:center;">
        <h2 class="rs-h2">@if($lang==='ar') شركاء أكاديميون @elseif($lang==='de') Akademische Partner @else Academic Partners @endif</h2>
        <div style="display:flex; flex-wrap:wrap; gap:36px; justify-content:center; align-items:center;">
            @foreach($academicPartners as $partner)
            <a href="{{ $partner->website_url ?: '#' }}" @if($partner->website_url) target="_blank" rel="noopener" @endif style="display:flex; align-items:center; gap:10px; text-decoration:none;">
                @if($partner->logo_url)
                <img loading="lazy" decoding="async" src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" style="height:32px; width:auto; object-fit:contain;">
                @else
                <span class="rs-partner">{{ $partner->name }}</span>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($publications->count() === 0 && $academicPartners->count() === 0)
<section class="rs-sec" style="padding:100px 0; text-align:center;">
    <div class="container-shell" style="max-width:500px;">
        <p class="rs-empty">@if($lang==='ar') سيتم نشر الأبحاث هنا قريبًا. @elseif($lang==='de') Forschungsinhalte werden hier in Kürze veröffentlicht. @else Research content will be published here soon. @endif</p>
    </div>
</section>
@endif

</x-layouts.public>
