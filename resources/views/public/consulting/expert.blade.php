@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$expert->name">

<section style="background:#030712; padding:80px 0 60px;">
    <div class="container-shell" style="max-width:820px; margin:0 auto;">
        <div style="display:flex; align-items:center; gap:20px; margin-bottom:24px;">
            <div style="width:64px; height:64px; border-radius:50%; background:{{ $expert->accent_color ?? '#8B5CF6' }}22; border:1px solid {{ $expert->accent_color ?? '#8B5CF6' }}55; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:20px; color:{{ $expert->accent_color ?? '#A78BFA' }};">{{ $expert->initials }}</div>
            <div>
                <h1 style="font-size:26px; font-weight:900; color:white; margin:0;">{{ $expert->name }}</h1>
                <p style="color:#94A3B8; font-size:14px; margin:4px 0 0;">{{ $expert->specialization_en }}</p>
            </div>
        </div>
        @if($expert->bio_en)<p style="color:#CBD5E1; font-size:15px; line-height:1.8; max-width:640px;">{{ $expert->bio_en }}</p>@endif

        <a href="{{ route('consulting.book', ['lang'=>$lang, 'id'=>$expert->id]) }}"
           style="display:inline-flex; margin-top:24px; padding:14px 30px; border-radius:10px; background:#10B981; color:#022C22; font-weight:700; font-size:14px; text-decoration:none;">
            @if($lang==='ar') احجز مكالمة @elseif($lang==='de') Anruf buchen @else Book a call → @endif
        </a>
    </div>
</section>

@if($packages->count())
<section style="background:#030712; padding:0 0 80px;">
    <div class="container-shell" style="max-width:820px; margin:0 auto;">
        <h2 style="font-size:16px; font-weight:800; color:white; margin:0 0 20px;">
            @if($lang==='ar') الباقات @elseif($lang==='de') Pakete @else Packages @endif
        </h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px;">
            @foreach($packages as $pkg)
            @php
                $pkgName = $lang==='de' ? ($pkg->name_de ?: $pkg->name_en) : ($lang==='ar' ? ($pkg->name_ar ?: $pkg->name_en) : $pkg->name_en);
                $pkgDesc = $lang==='de' ? ($pkg->description_de ?: $pkg->description_en) : ($lang==='ar' ? ($pkg->description_ar ?: $pkg->description_en) : $pkg->description_en);
                $pkgInclusions = $lang==='de' ? ($pkg->inclusions_de ?: $pkg->inclusions_en) : ($lang==='ar' ? ($pkg->inclusions_ar ?: $pkg->inclusions_en) : $pkg->inclusions_en);
            @endphp
            <div class="card-panel" style="padding:22px;">
                <h3 style="color:white; font-size:15px; font-weight:700; margin:0 0 8px;">{{ $pkgName }}</h3>
                <p style="color:#94A3B8; font-size:12px; margin:0 0 10px;">{{ $pkg->duration_minutes }} min</p>
                @if($pkgDesc)
                <p style="color:#94A3B8; font-size:12px; line-height:1.6; margin:0 0 10px;">{{ $pkgDesc }}</p>
                @endif
                @if(!empty($pkgInclusions))
                <ul style="margin:0 0 10px; padding-left:16px; color:#CBD5E1; font-size:12px; line-height:1.7;">
                    @foreach($pkgInclusions as $point)<li>{{ $point }}</li>@endforeach
                </ul>
                @endif
                <div style="color:#6EE7B7; font-weight:700; font-size:14px;">
                    @if($pkg->price_on_request) On request @elseif($pkg->price) {{ $pkg->currency }} {{ number_format($pkg->price,0) }} @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($availabilities->count())
<section style="background:#030712; padding:0 0 100px;">
    <div class="container-shell" style="max-width:820px; margin:0 auto;">
        <h2 style="font-size:16px; font-weight:800; color:white; margin:0 0 20px;">
            @if($lang==='ar') الأوقات المتاحة @elseif($lang==='de') Verfügbarkeit @else Availability @endif
        </h2>
        <div style="display:flex; flex-wrap:wrap; gap:10px;">
            @foreach($availabilities as $slot)
            <span style="padding:8px 14px; border-radius:999px; border:1px solid rgba(16,185,129,0.3); color:#6EE7B7; font-size:13px;">
                {{ \App\Models\ExpertAvailability::WEEKDAYS[$slot->weekday] }} {{ \Illuminate\Support\Carbon::parse($slot->start_time)->format('H:i') }}–{{ \Illuminate\Support\Carbon::parse($slot->end_time)->format('H:i') }}
            </span>
            @endforeach
        </div>
    </div>
</section>
@endif

</x-layouts.public>
