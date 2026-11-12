@props([
    'title'    => 'Connecting Business, Education & Research to Build Intelligent Digital Solutions',
    'subtitle' => 'AI · Data · Digital Twins · Robotics · Talent · Innovation Ecosystems',
    'cta'      => 'Explore Services',
    'ctaUrl'   => null,
])
@php
    $lang = request()->route('lang', app()->getLocale());
    // Stats are now editable from admin panel — no hardcoded values
    $heroStats = array_filter([
        [$siteSettings['stat_organizations'] ?? null, $lang==='ar'?'منظمة':($lang==='de'?'Organisationen':'Organizations')],
        [$siteSettings['stat_countries'] ?? null, $lang==='ar'?'دولة':($lang==='de'?'Länder':'Countries')],
        [$siteSettings['stat_universities'] ?? null, $lang==='ar'?'جامعة':($lang==='de'?'Universitäten':'Universities')],
        [$siteSettings['stat_innovation_capital'] ?? null, $lang==='ar'?'رأس مال الابتكار':($lang==='de'?'Innovationskapital':'Innovation Capital')],
    ], fn ($stat) => filled($stat[0]));
@endphp
<section class="hopn-hero" style="position:relative; overflow:hidden; background:#0A0F1E; padding: 80px 0 100px;">

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">

        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(143,184,204,0.35); background:rgba(143,184,204,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8FB8CC;">
                @if($lang === 'ar') مركز الابتكار الأوروبي @elseif($lang === 'de') Europäisches Innovationszentrum @else European Innovation Hub @endif
            </span>
        </div>

        <h1 style="font-size:clamp(28px, 5vw, 60px); font-weight:800; line-height:1.15; letter-spacing:-0.02em; color:white; max-width:900px; margin:0 auto;">
            {{ $title }}
        </h1>

        @if($subtitle)
        <p style="margin-top:20px; font-size:clamp(15px, 2vw, 20px); color:#CBD5E1; max-width:640px; margin-left:auto; margin-right:auto; line-height:1.6;">
            {{ $subtitle }}
        </p>
        @endif

        <div style="margin-top:36px; display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:12px;">
            @if($cta && $ctaUrl)
            <a href="{{ $ctaUrl }}"
               class="hopn-link-fade hopn-hero-btn hopn-hero-btn--primary"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; background:#245B78; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(143,184,204,0.3);">
                {{ $cta }}
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            @endif

           <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hopn-bg-brighten hopn-hero-btn"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang === 'ar') احجز مكالمة @elseif($lang === 'de') Termin buchen @else Book a Call @endif
            </a>

            <a href="{{ route('products.index', ['lang' => $lang]) }}" class="hopn-bg-brighten hopn-hero-btn"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang === 'ar') عرض المنتجات @elseif($lang === 'de') Produkte ansehen @else View Products @endif
            </a>
        </div>

        @if(($siteSettings['stats_hero_visible'] ?? false) && count($heroStats) > 0)
        <div style="margin-top:60px; display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:700px; margin-left:auto; margin-right:auto;">
            @foreach($heroStats as $stat)
            <div class="hopn-hero-stat" style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.04); border-radius:12px; padding:20px 16px;">
                <div class="hopn-hero-stat-num" style="font-size:28px; font-weight:800; color:white;">{{ $stat[0] }}</div>
                <div class="hopn-hero-stat-label" style="margin-top:4px; font-size:12px; color:#CBD5E1;">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
        @endif

    </div>


</section>