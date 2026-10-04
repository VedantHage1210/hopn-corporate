<x-layouts.public :title="'Research'">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Header --}}
<section style="padding:80px 0 40px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell hopn-reveal" style="text-align:center; max-width:700px;">
        <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
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
@if($publications->count() > 0)
<section style="padding:20px 0 80px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell">
        <div style="display:grid; gap:16px; max-width:820px; margin:0 auto;">
            @foreach($publications as $pub)
            @php
                $pubTitle = $lang==='ar' && !empty($pub->title_ar) ? $pub->title_ar : ($lang==='de' && !empty($pub->title_de) ? $pub->title_de : $pub->title_en);
                $pubSummary = $lang==='ar' && !empty($pub->summary_ar) ? $pub->summary_ar : ($lang==='de' && !empty($pub->summary_de) ? $pub->summary_de : $pub->summary_en);
            @endphp
            <div class="hopn-reveal" style="border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:16px; padding:28px;">
                @if($pub->project)
                <span style="display:inline-block; font-size:10px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:#4F6EF7; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.25); border-radius:999px; padding:3px 10px; margin-bottom:12px;">
                    {{ $pub->project }}
                </span>
                @endif
                <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:6px;">{{ $pubTitle }}</h3>
                @if($pub->authors || $pub->published_on)
                <p style="font-size:12.5px; color:#64748B; margin-bottom:12px;">
                    {{ $pub->authors }}{{ $pub->authors && $pub->published_on ? ' · ' : '' }}{{ $pub->published_on?->format('M Y') }}
                </p>
                @endif
                @if(!empty($pubSummary))
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7; margin-bottom:14px;">{{ $pubSummary }}</p>
                @endif
                <div style="display:flex; gap:16px;">
                    @if($pub->pdf_url)
                    <a href="{{ $pub->pdf_url }}" target="_blank" rel="noopener" style="font-size:13px; font-weight:600; color:#4F6EF7; text-decoration:none;">
                        @if($lang==='ar') تحميل PDF @elseif($lang==='de') PDF herunterladen @else Download PDF @endif →
                    </a>
                    @endif
                    @if($pub->external_url)
                    <a href="{{ $pub->external_url }}" target="_blank" rel="noopener" style="font-size:13px; font-weight:600; color:#94A3B8; text-decoration:none;">
                        @if($lang==='ar') رابط خارجي @elseif($lang==='de') Externer Link @else External Link @endif →
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ACADEMIC PARTNERS --}}
@if($academicPartners->count() > 0)
<section style="padding:0 0 100px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell" style="text-align:center;">
        <h2 style="font-size:clamp(20px,3vw,28px); font-weight:800; color:white; margin-bottom:36px;">
            @if($lang==='ar') شركاء أكاديميون @elseif($lang==='de') Akademische Partner @else Academic Partners @endif
        </h2>
        <div style="display:flex; flex-wrap:wrap; gap:36px; justify-content:center; align-items:center;">
            @foreach($academicPartners as $partner)
            <a href="{{ $partner->website_url ?: '#' }}" @if($partner->website_url) target="_blank" rel="noopener" @endif
               style="display:flex; align-items:center; gap:10px; text-decoration:none; opacity:0.85;">
                @if($partner->logo_url)
                <img loading="lazy" decoding="async" src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" style="height:32px; width:auto; object-fit:contain; filter:brightness(0.9);">
                @else
                <span style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $partner->name }}</span>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($publications->count() === 0 && $academicPartners->count() === 0)
<section style="padding:100px 0; background:#050A14; text-align:center;">
    <div class="container-shell" style="max-width:500px;">
        <p style="color:#64748B; font-size:15px;">
            @if($lang==='ar') سيتم نشر الأبحاث هنا قريبًا.
            @elseif($lang==='de') Forschungsinhalte werden hier in Kürze veröffentlicht.
            @else Research content will be published here soon. @endif
        </p>
    </div>
</section>
@endif

</x-layouts.public>
