<x-layouts.public :title="'Founder & Team'">
@php $lang = request()->route('lang', 'en'); @endphp
<style>
    .hopn-team-feature-card { position:relative; overflow:hidden; }
    .hopn-team-feature-card::before,
    .hopn-team-feature-card::after { content:''; position:absolute; pointer-events:none; border:1px solid #9FB5C0; border-radius:50%; opacity:.45; }
    .hopn-team-feature-card::before { width:125%; height:90%; left:-12%; top:5%; animation:hopnTeamField 18s ease-in-out infinite; }
    .hopn-team-feature-card::after { width:105%; height:125%; left:-3%; top:-12%; animation:hopnTeamField 24s ease-in-out infinite reverse; }
    .hopn-team-feature-card > * { position:relative; z-index:1; }
    @keyframes hopnTeamField { 0%,100% { transform:rotate(-12deg) translate(0,0); } 50% { transform:rotate(-5deg) translate(8px,6px); } }
    @media (prefers-reduced-motion: reduce) { .hopn-team-feature-card::before, .hopn-team-feature-card::after { animation:none; } }
</style>

{{-- Header --}}
<section style="padding:80px 0 40px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell hopn-reveal" style="text-align:center; max-width:700px;">
        <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
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

{{-- FOUNDER & CO-FOUNDER: large cards side by side --}}
@if($founders->count() > 0)
<section style="padding:20px 0 80px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell">
        <div class="hopn-pleaders {{ $founders->count() === 1 ? 'is-single' : '' }}">
            @foreach($founders as $founder)
                <x-leader-card :member="$founder" :lang="$lang" />
            @endforeach
        </div>
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
        <div class="hopn-pgrid">
            @foreach($teamMembers as $member)
                <x-member-card :member="$member" :lang="$lang" />
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
