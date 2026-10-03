<x-layouts.public :title="'Founder & Team'">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Header --}}
<section style="padding:80px 0 40px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell hopn-reveal" style="text-align:center; max-width:700px;">
        <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
            @if($lang==='ar') القيادة والفريق @elseif($lang==='de') Führung & Team @else Leadership & Team @endif
        </span>
        <h1 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') تعرف على فريقنا @elseif($lang==='de') Lernen Sie unser Team kennen @else Meet the People Behind HOPn @endif
        </h1>
        <p style="color:#CBD5E1; font-size:17px; line-height:1.7;">
            @if($lang==='ar') الأشخاص الذين يقودون أبحاث وهندسة وتنفيذ HOPn.
            @elseif($lang==='de') Die Menschen, die Forschung, Engineering und Umsetzung bei HOPn vorantreiben.
            @else The people driving research, engineering, and implementation at HOPn. @endif
        </p>
    </div>
</section>

{{-- FOUNDER --}}
@if($founders->count() > 0)
<section style="padding:20px 0 80px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell">
        @foreach($founders as $founder)
        <div class="hopn-reveal" style="display:flex; flex-wrap:wrap; gap:40px; align-items:center; max-width:880px; margin:0 auto {{ $loop->last ? '0' : '48px' }}; border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:20px; padding:40px;">
            @if($founder->photo)
            <img loading="lazy" decoding="async" src="{{ $founder->photo }}" alt="{{ $founder->name }}"
                 style="width:160px; height:160px; border-radius:16px; object-fit:cover; flex-shrink:0; border:2px solid rgba(79,110,247,0.3);">
            @else
            <div style="width:160px; height:160px; border-radius:16px; background:rgba(79,110,247,0.1); border:2px solid rgba(79,110,247,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:48px; font-weight:900; color:#4F6EF7;">
                {{ strtoupper(substr($founder->name,0,1)) }}
            </div>
            @endif
            <div style="flex:1; min-width:260px;">
                <span style="display:inline-block; font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#4F6EF7; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.25); border-radius:999px; padding:4px 12px; margin-bottom:12px;">
                    @if($lang==='ar') المؤسس @elseif($lang==='de') Gründer @else Founder @endif
                </span>
                <h2 style="font-size:26px; font-weight:800; color:white; margin-bottom:4px;">{{ $founder->name }}</h2>
                <p style="font-size:15px; color:#818CF8; font-weight:600; margin-bottom:16px;">
                    @if($lang==='ar'&&!empty($founder->role_ar)) {{ $founder->role_ar }}
                    @elseif($lang==='de'&&!empty($founder->role_de)) {{ $founder->role_de }}
                    @else {{ $founder->role_en }}
                    @endif
                </p>
                @php
                    $founderBio = $lang==='ar' && !empty($founder->bio_ar) ? $founder->bio_ar
                                : ($lang==='de' && !empty($founder->bio_de) ? $founder->bio_de : $founder->bio_en);
                @endphp
                @if(!empty($founderBio))
                <p style="font-size:15px; color:#CBD5E1; line-height:1.7; margin-bottom:16px;">{{ $founderBio }}</p>
                @endif
                @if($founder->linkedin)
                <a href="{{ $founder->linkedin }}" target="_blank" rel="noopener"
                   style="display:inline-flex; align-items:center; gap:8px; font-size:13px; font-weight:600; color:#4F6EF7; text-decoration:none;">
                    LinkedIn →
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- TEAM GRID --}}
@if($teamMembers->count() > 0)
<section style="padding:0 0 100px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white; letter-spacing:-0.5px;">
                @if($lang==='ar') الفريق @elseif($lang==='de') Das Team @else The Team @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px;">
            @foreach($teamMembers as $member)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-align:center; transition:all 0.25s; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                @if($member->photo)
                <img loading="lazy" decoding="async" src="{{ $member->photo }}" alt="{{ $member->name }}"
                     style="width:80px; height:80px; border-radius:50%; object-fit:cover; margin:0 auto 16px; display:block; border:2px solid {{ $c }}30;">
                @else
                <div style="width:80px; height:80px; border-radius:50%; background:{{ $c }}15; border:2px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:28px; font-weight:900; color:{{ $c }};">
                    {{ strtoupper(substr($member->name,0,1)) }}
                </div>
                @endif
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:4px;">{{ $member->name }}</h3>
                <p style="font-size:13px; color:{{ $c }}; margin-bottom:8px; font-weight:600;">
                    @if($lang==='ar'&&!empty($member->role_ar)) {{ $member->role_ar }}
                    @elseif($lang==='de'&&!empty($member->role_de)) {{ $member->role_de }}
                    @else {{ $member->role_en }}
                    @endif
                </p>
                @php
                    $memberBio = $lang==='ar' && !empty($member->bio_ar) ? $member->bio_ar
                               : ($lang==='de' && !empty($member->bio_de) ? $member->bio_de : $member->bio_en);
                @endphp
                @if(!empty($memberBio))
                <p style="font-size:12px; color:#94A3B8; line-height:1.6; margin-bottom:10px;">{{ \Illuminate\Support\Str::limit($memberBio, 90) }}</p>
                @endif
                @if($member->linkedin)
                <a href="{{ $member->linkedin }}" target="_blank" rel="noopener" style="font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none;">LinkedIn →</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($founders->count() === 0 && $teamMembers->count() === 0)
<section style="padding:100px 0; background:#050A14; text-align:center;">
    <div class="container-shell" style="max-width:500px;">
        <p style="color:#64748B; font-size:15px;">
            @if($lang==='ar') سيتم عرض الفريق هنا قريبًا.
            @elseif($lang==='de') Das Team wird hier in Kürze angezeigt.
            @else Team details will appear here soon. @endif
        </p>
    </div>
</section>
@endif

</x-layouts.public>
