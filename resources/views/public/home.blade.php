@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'HOPn — Innovation Ecosystem Platform'">

<style>
@keyframes heroFadeUp { from{opacity:0; transform:translateY(18px);} to{opacity:1; transform:translateY(0);} }

.hopn-hero-in { opacity:0; animation:heroFadeUp 0.8s cubic-bezier(0.16,1,0.3,1) forwards; }
.hopn-hero-in-1 { animation-delay:0.05s; }
.hopn-hero-in-2 { animation-delay:0.16s; }
.hopn-hero-in-3 { animation-delay:0.27s; }
.hopn-hero-in-4 { animation-delay:0.38s; }
.hopn-hero-in-5 { animation-delay:0.49s; }

.hopn-link-fade { transition:opacity 0.25s ease; opacity:1; }
.hopn-link-fade:hover { opacity:0.7; }
.hopn-link-fade-in { transition:opacity 0.25s ease; opacity:0.7; }
.hopn-link-fade-in:hover { opacity:1; }

.hopn-lift-card { transition:background 0.35s cubic-bezier(0.16,1,0.3,1), border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1); }
.hopn-lift-card:hover { background:#0D1425; transform:translateY(-3px); border-color:rgba(255,255,255,0.14); }
.hopn-lift-card-nobg { transition:border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1); }
.hopn-lift-card-nobg:hover { transform:translateY(-3px); border-color:rgba(255,255,255,0.14); }

.hopn-btn-outline-amber { transition:background 0.3s ease; }
.hopn-btn-outline-amber:hover { background:rgba(245,158,11,0.08); }
.hopn-btn-outline-neutral { transition:color 0.25s ease, border-color 0.25s ease; }
.hopn-btn-outline-neutral:hover { color:white; border-color:rgba(255,255,255,0.2); }
.hopn-btn-outline-neutral2 { transition:background 0.3s ease; }
.hopn-btn-outline-neutral2:hover { background:rgba(255,255,255,0.08); }

.hopn-btn-primary-green { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s cubic-bezier(0.16,1,0.3,1); }
.hopn-btn-primary-green:hover { background:#1D4D66 !important; }

.hopn-row-hover { transition:background 0.25s ease; }
.hopn-row-hover:hover { background:rgba(255,255,255,0.03); }

.hopn-btn-primary, .hopn-btn-secondary {
    transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s cubic-bezier(0.16,1,0.3,1), background 0.25s ease, border-color 0.25s ease;
}
.hopn-btn-primary:hover { background:#1D4D66 !important; }
.hopn-btn-secondary:hover { transform:translateY(-3px); background:rgba(255,255,255,0.09); border-color:rgba(255,255,255,0.28); }


@media (prefers-reduced-motion: reduce) {
    .hopn-hero-in { animation:none; opacity:1; }
}

.hopn-reveal { opacity:0; transform:translateY(24px); transition:opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1); }
.hopn-reveal.is-visible { opacity:1; transform:translateY(0); }
@media (prefers-reduced-motion: reduce) {
    .hopn-reveal { opacity:1; transform:none; transition:none; }
}

.hopn-btn-outline-blue { transition:background 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-btn-outline-blue:hover { background:rgba(143,184,204,0.1); }

.hopn-btn-outline-purple { transition:background 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-btn-outline-purple:hover { background:rgba(139,92,246,0.08); transform:translateY(-2px); }

.hopn-industry-card {
    transition:background 0.35s cubic-bezier(0.16,1,0.3,1), border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1);
}
.hopn-industry-card:hover { background:rgba(79,110,247,0.08); border-color:rgba(79,110,247,0.25); transform:translateY(-4px); }

.hopn-partner-card { transition:border-color 0.3s ease, background 0.3s ease; }
.hopn-partner-card:hover { border-color:rgba(255,255,255,0.14); background:rgba(255,255,255,0.045); }
.hopn-partner-card img { transition:filter 0.3s ease; }
.hopn-partner-card:hover img { filter:brightness(1) grayscale(0) !important; }


.hopn-ecosystem-node { transition:background 0.3s ease, border-color 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-ecosystem-node:hover { transform:translateY(-4px); }
.hopn-domain-link { transition:background 0.3s ease, border-color 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-domain-link:hover { background:rgba(79,110,247,0.08); border-color:rgba(79,110,247,0.3); transform:translateY(-2px); }

.hopn-link-accent { transition:color 0.25s ease; }
.hopn-link-accent:hover { color:white !important; }

.hopn-strategy-step { background:#0A0F1E; transition:background 0.4s cubic-bezier(0.16,1,0.3,1); position:relative; }
.hopn-strategy-step:hover { background:#0D1425; }

/* 3D tilt-on-hover — hero/feature cards only (Strategy/Build/Scale, HOPn Products) */
[data-tilt] { position:relative; transform-style:preserve-3d; will-change:transform; transition:transform 0.15s ease; }
[data-tilt] .hopn-tilt-glow { position:absolute; inset:0; border-radius:inherit; opacity:0; transition:opacity 0.3s ease; pointer-events:none; background:radial-gradient(220px circle at var(--mx,50%) var(--my,50%), rgba(139,92,246,0.14), transparent 60%); z-index:1; }
[data-tilt]:hover .hopn-tilt-glow, [data-tilt].is-touched .hopn-tilt-glow { opacity:1; }
[data-tilt].is-touched { transform:translateY(-4px) scale(1.02) !important; }
[data-tilt] > * { position:relative; z-index:2; }

.hopn-service-card, .hopn-product-card {
    transition:background 0.35s cubic-bezier(0.16,1,0.3,1), border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1);
}
.hopn-service-card:hover { background:#0A1628; }
.hopn-product-card:hover { border-color:rgba(255,255,255,0.14); background:#0D1425; transform:translateY(-5px); }

/* Calm institute-style homepage surface. Content and actions stay unchanged. */
html[data-theme="light"] .hopn-homepage section { background:#F6F7F4 !important; color:#172331; }
html[data-theme="light"] .hopn-homepage section[style*="background:#030712"],
html[data-theme="light"] .hopn-homepage section[style*="background:#050A14"],
html[data-theme="light"] .hopn-homepage section[style*="background:#080D1A"] { background:#F6F7F4 !important; }
html[data-theme="light"] .hopn-homepage section[style*="background-image"] { background-image:none !important; }
html[data-theme="light"] .hopn-homepage section h1,
html[data-theme="light"] .hopn-homepage section h2,
html[data-theme="light"] .hopn-homepage section h3,
html[data-theme="light"] .hopn-homepage section h4 { color:#172331 !important; }
html[data-theme="light"] .hopn-homepage section h1 span { background-image:none !important; -webkit-text-fill-color:#172331 !important; color:#172331 !important; }
html[data-theme="light"] .hopn-homepage section p { color:#526170 !important; }
html[data-theme="light"] .hopn-homepage section span { color:#526170 !important; }
html[data-theme="light"] .hopn-homepage .hopn-partner-card span,
html[data-theme="light"] .hopn-homepage .hopn-industry-card > div:not([aria-hidden="true"]) { color:#172331 !important; font-weight:700 !important; }
html[data-theme="light"] .hopn-homepage .hopn-partner-card span { text-shadow:none !important; opacity:1 !important; }
html[data-theme="light"] .hopn-homepage .hopn-btn-secondary { color:#245B78 !important; background:#FFFFFF !important; border:1.5px solid #245B78 !important; font-weight:700 !important; }
html[data-theme="light"] .hopn-homepage section a:not(.hopn-btn-primary):not(.hopn-btn-secondary):not(.hopn-btn-primary-green):not([style*="background:#245B78"]):not([style*="background:#4F6EF7"]):not([style*="background:#8B5CF6"]):not([style*="background:#F59E0B"]):not([style*="background:#10B981"]):not([style*="background:#06B6D4"]) { color:#245B78 !important; }
html[data-theme="light"] .hopn-homepage section div[style*="background:#0A0F1E"],
html[data-theme="light"] .hopn-homepage section div[style*="background:#0D1425"],
html[data-theme="light"] .hopn-homepage section div[style*="background:rgba(255,255,255,0.02)"] { background:#FFFFFF !important; border-color:#D7DEE3 !important; }
html[data-theme="light"] .hopn-homepage section div[style*="background:rgba(255,255,255,0.05)"] { background:#E8EDF0 !important; }
html[data-theme="light"] .hopn-homepage section div[style*="radial-gradient"],
html[data-theme="light"] .hopn-homepage .hopn-strategy-step,
html[data-theme="light"] .hopn-homepage .hopn-strategy-step:hover,
html[data-theme="light"] .hopn-homepage .hopn-lift-card,
html[data-theme="light"] .hopn-homepage .hopn-lift-card:hover,
html[data-theme="light"] .hopn-homepage .hopn-service-card,
html[data-theme="light"] .hopn-homepage .hopn-service-card:hover,
html[data-theme="light"] .hopn-homepage .hopn-product-card,
html[data-theme="light"] .hopn-homepage .hopn-product-card:hover { background:#FFFFFF !important; border-color:#D7DEE3 !important; }
html[data-theme="light"] .hopn-homepage .hopn-lift-card:hover,
html[data-theme="light"] .hopn-homepage .hopn-product-card:hover { transform:none; }
html[data-theme="light"] .hopn-homepage .hopn-lift-card h3,
html[data-theme="light"] .hopn-homepage .hopn-lift-card p { color:#172331 !important; }
html[data-theme="light"] .hopn-homepage .hopn-lift-card p { color:#526170 !important; }
html[data-theme="light"] .hopn-homepage .hopn-industry-card { background:#FFFFFF !important; border-color:#D7DEE3 !important; padding:30px 20px !important; min-height:190px; }
html[data-theme="light"] .hopn-homepage .hopn-industry-card img,
html[data-theme="light"] .hopn-homepage .hopn-industry-card > div[aria-hidden="true"] { width:96px !important; height:96px !important; border-radius:14px !important; margin-bottom:16px !important; }
html[data-theme="light"] .hopn-homepage .hopn-partner-card { border-color:#D7DEE3 !important; }
html[data-theme="light"] .hopn-homepage .hopn-hero-in { animation:none; opacity:1; }
@media (max-width:640px) {
    html[data-theme="light"] .hopn-homepage .hopn-industry-card { min-height:165px; padding:24px 14px !important; }
    html[data-theme="light"] .hopn-homepage .hopn-industry-card img,
    html[data-theme="light"] .hopn-homepage .hopn-industry-card > div[aria-hidden="true"] { width:76px !important; height:76px !important; }
}

/* Feature card grids: fixed column counts caused cards to be cut off / partially
   visible on mobile viewports (BUG-010). Make them responsive. */
.hopn-strategy-grid { grid-template-columns:repeat(3,1fr); }
.hopn-ecosystem-grid { grid-template-columns:repeat(7,1fr); }
@media (max-width:900px) {
    .hopn-ecosystem-grid { grid-template-columns:repeat(4,1fr); }
}
@media (max-width:640px) {
    .hopn-strategy-grid { grid-template-columns:1fr; }
    .hopn-ecosystem-grid { grid-template-columns:repeat(2,1fr); }
}
</style>

<div class="hopn-homepage">

{{-- 1. HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:94vh; display:flex; align-items:center;">

    <div class="container-shell" style="position:relative; z-index:10; padding:100px 0 80px; text-align:center;">
        <div class="hopn-hero-in hopn-hero-in-1" style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(143,184,204,0.35); background:rgba(143,184,204,0.08); border-radius:999px; padding:6px 20px; margin-bottom:36px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#8FB8CC;">
                @if($lang==='ar') منصة النظام البيئي الأوروبي للابتكار
                @elseif($lang==='de') Europäische Innovations-Ökosystem-Plattform
                @else Innovation Ecosystem Platform @endif
            </span>
        </div>

        <h1 class="hopn-hero-in hopn-hero-in-2" style="font-size:clamp(38px,6.5vw,84px); font-weight:900; color:white; line-height:1.04; letter-spacing:-2.5px; margin:0 auto 28px; max-width:960px;">
            @if($lang==='ar')
                <span style="color:white;">حيث تتلاقى المؤسسات والشركات الناشئة</span><br>
                <span style="color:#8FB8CC;">ورأس المال لبناء المستقبل</span>
            @elseif($lang==='de')
                <span style="color:white;">Wo Unternehmen, Startups</span><br>
                <span style="color:#8FB8CC;">und Kapital zusammenkommen.</span>
            @else
                <span style="color:white;">Where enterprises, startups,</span><br>
                <span style="color:#8FB8CC;">and capital converge.</span>
            @endif
        </h1>

        <p class="hopn-hero-in hopn-hero-in-3" style="font-size:clamp(16px,2.2vw,20px); color:#CBD5E1; max-width:640px; margin:0 auto 48px; line-height:1.75;">
            @if($lang==='ar') HOPn ينسّق الاستراتيجية والتكنولوجيا والأنظمة البيئية — يربط الشركات الكبرى والمؤسسين والمستثمرين والجامعات في نظام تشغيل ابتكار متكامل.
            @elseif($lang==='de') HOPn orchestriert Strategie, Technologie und Ökosysteme — verbindet Unternehmen, Gründer, Investoren und Universitäten zu einem integrierten Innovationsbetriebssystem.
            @else HOPn orchestrates strategy, technology, and ecosystems — connecting corporates, founders, investors, and universities into one integrated innovation operating system. @endif
        </p>

        <div class="hopn-hero-in hopn-hero-in-4" style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:72px;">
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}" class="hopn-btn-primary"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; background:#245B78; color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') استكشف النظام البيئي @elseif($lang==='de') Ökosystem erkunden @else Explore the Ecosystem @endif
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-btn-secondary"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') احجز استشارة استراتيجية @elseif($lang==='de') Strategiegespräch buchen @else Book a Strategy Call @endif
            </a>
        </div>

        @if($siteSettings['stats_home_top_visible'] ?? false)
        @php
            $homeStats = array_filter([
                [$siteSettings['stat_organizations'] ?? null, $lang==='ar'?'منظمة':($lang==='de'?'Organisationen':'Organizations')],
                [$siteSettings['stat_countries'] ?? null, $lang==='ar'?'دولة':($lang==='de'?'Länder':'Countries')],
                [$siteSettings['stat_universities'] ?? null, $lang==='ar'?'جامعة':($lang==='de'?'Universitäten':'Universities')],
                [$siteSettings['stat_innovation_capital'] ?? null, $lang==='ar'?'رأس مال الابتكار':($lang==='de'?'Innovationskapital':'Innovation Capital')],
            ], fn ($stat) => filled($stat[0]));
        @endphp
        @if(count($homeStats) > 0)
        <div class="hopn-hero-in hopn-hero-in-5" style="display:inline-flex; flex-wrap:wrap; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.02); border-radius:16px; overflow:hidden;">
            @foreach($homeStats as $stat)
            <div style="padding:22px 36px; text-align:center; border-right:1px solid rgba(255,255,255,0.06);">
                <div style="font-size:28px; font-weight:900; color:white;">{{ $stat[0] }}</div>
                <div style="font-size:11px; color:#94A3B8; margin-top:5px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em;">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
        @endif
        @endif

    </div>
</section>

{{-- 2. STRATEGY > BUILD > SCALE --}}
<section class="homepage-secondary" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:64px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#4F6EF7; display:block; margin-bottom:16px;">
                @if($lang==='ar') كيف نعمل @elseif($lang==='de') Wie wir arbeiten @else How We Work @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                @if($lang==='ar') من الاستراتيجية إلى التأثير @elseif($lang==='de') Von der Strategie zur Wirkung @else From strategy to impact. @endif
            </h2>
        </div>
        <div class="hopn-strategy-grid hopn-reveal" style="display:grid; gap:2px; background:rgba(255,255,255,0.05); border-radius:20px; overflow:hidden; position:relative;">
            @foreach([
                ['S','#4F6EF7',
                 $lang==='ar'?'الاستراتيجية':($lang==='de'?'Strategie':'Strategy'),
                 $lang==='ar'?'حدد الرؤية ومحافظ المشاريع وحوكمة الابتكار على نطاق المؤسسة.':($lang==='de'?'Vision, Portfolios und Innovationsgovernance auf Unternehmensebene definieren.':'Define vision, portfolios, and innovation governance at enterprise scale.')],
                ['B','#10B981',
                 $lang==='ar'?'البناء':($lang==='de'?'Aufbau':'Build'),
                 $lang==='ar'?'صمّم ونفّذ بسرعة مؤسسية مع فرق عالمية المستوى.':($lang==='de'?'Entwerfen und liefern mit erstklassigen Teams.':'Design, prototype, and deliver at enterprise velocity with world-class teams.')],
                ['S','#8B5CF6',
                 $lang==='ar'?'التوسع':($lang==='de'?'Skalierung':'Scale'),
                 $lang==='ar'?'حقق التأثير مع المنصات والشراكات والنتائج القابلة للقياس.':($lang==='de'?'Wirkung mit Plattformen und messbaren Ergebnissen operationalisieren.':'Operationalize impact with platforms, partnerships, and measurable outcomes.')],
            ] as $step)
            <div class="hopn-strategy-step" style="padding:48px 40px; text-align:center;">
                <h3 style="font-size:22px; font-weight:800; color:white; margin-bottom:12px; letter-spacing:-0.5px;">{{ $step[2] }}</h3>
                <p style="font-size:14px; color:#94A3B8; line-height:1.75; max-width:280px; margin:0 auto;">{{ $step[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. INNOVATION ECOSYSTEM --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10;">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') المنهجية @elseif($lang==='de') Vorgehen @else Approach @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') كيف نعمل وما نبنيه @elseif($lang==='de') Wie wir arbeiten und was wir entwickeln @else How we work and what we build @endif
            </h2>
            <p style="color:#CBD5E1; max-width:560px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') ثلاث مراحل من البحث إلى التنفيذ. @elseif($lang==='de') Drei Stufen von der Forschung bis zur Umsetzung. @else Three stages from research to implementation. @endif
            </p>
        </div>

        <div class="hopn-reveal" style="margin:0 auto 64px;">
            <x-architecture-figure :lang="$lang" />
        </div>

        @if($homeDomains->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:12px; max-width:1000px; margin:0 auto 40px;">
            @foreach($homeDomains as $domain)
            <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$domain->slug]) }}" class="hopn-domain-link"
               style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:12px; padding:20px 16px; text-decoration:none; display:flex; align-items:center; gap:12px;">
                <span style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $domain->name }}</span>
            </a>
            @endforeach
        </div>
        @endif

        <div class="hopn-reveal" style="text-align:center;">
            <a href="{{ route('innovation.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-blue"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(143,184,204,0.4); color:#8FB8CC; font-size:14px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') استكشف مجالات الابتكار @elseif($lang==='de') Innovationsdomänen erkunden @else Explore Innovation Domains @endif →
            </a>
        </div>
    </div>
</section>

{{-- 4. CORE SERVICES --}}
@if($services->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang==='ar') ماذا نفعل @elseif($lang==='de') Was wir tun @else What We Do @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') خدماتنا الأساسية @elseif($lang==='de') Kernleistungen @else Core Services @endif
                </h2>
            </div>
            <a href="{{ route('services.index', ['lang'=>$lang]) }}" class="hopn-link-accent"
               style="display:inline-flex; align-items:center; gap:6px; font-size:14px; font-weight:600; color:#818CF8; text-decoration:none;">
                @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
            </a>
        </div>
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:20px;">
            @foreach($services as $service)
            @php $colors=['#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}" class="hopn-service-card"
               style="display:flex; flex-direction:column; padding:32px 28px; background:#050A14; border:1px solid rgba(255,255,255,0.08); border-radius:14px; text-decoration:none; position:relative; overflow:hidden; min-height:200px;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px; line-height:1.3;">
                    @if($lang==='ar'&&$service->name_ar) {{ $service->name_ar }}
                    @elseif($lang==='de'&&$service->name_de) {{ $service->name_de }}
                    @else {{ $service->name }} @endif
                </h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.6; margin-bottom:16px; flex:1;">{{ Str::limit($lang==='ar'&&$service->summary_ar?$service->summary_ar:($lang==='de'&&$service->summary_de?$service->summary_de:$service->summary)??'', 80) }}</p>
                <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr lesen @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 5. HOPN PRODUCTS --}}
@if($homeProducts->count() > 0)
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10;">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') منصاتنا @elseif($lang==='de') Unsere Plattformen @else Our Platforms @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') منتجات HOPn @elseif($lang==='de') HOPn Produkte @else HOPn Products @endif
            </h2>
            <p style="color:#CBD5E1; max-width:500px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') منصات ذكية مبنية لمستقبل الأعمال والتعليم
                @elseif($lang==='de') Intelligente Plattformen für die Zukunft von Wirtschaft und Bildung
                @else Intelligent platforms built for the future of business and education @endif
            </p>
        </div>
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($homeProducts as $product)
            @php
                $colors=['#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC','#8FB8CC'];
                $c=$colors[$loop->index%6];
                $title=$lang==='ar'&&$product->title_ar?$product->title_ar:($lang==='de'&&$product->title_de?$product->title_de:$product->title_en);
                $summary=$lang==='ar'&&$product->summary_ar?$product->summary_ar:($lang==='de'&&$product->summary_de?$product->summary_de:($product->summary_en??''));
                $categories=['Innovation Project Management','AI-Powered Fintech Platform','AI Tools & Certification','AI Governance & Compliance','Sports Performance Analytics','Education–Industry Bridge'];
                $cat=$categories[$loop->index] ?? 'Platform';
            @endphp
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}" class="hopn-product-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:0; text-decoration:none; position:relative; overflow:hidden;">
                @if(!empty($product->hero_image_url))
                <div style="height:180px; overflow:hidden;">
                    <img loading="lazy" decoding="async" src="{{ $product->hero_image_url }}" alt="{{ $title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @endif
                <span class="hopn-status-badge" style="position:absolute; z-index:2; top:14px; right:14px; font-size:10px; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; padding:3px 10px; border-radius:999px; background:{{ $product->statusColor() }}; color:#0A0F1E;">
                    {{ $product->statusLabel($lang) }}
                </span>
                <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; color:{{ $c }}; margin-bottom:12px; opacity:0.85;">{{ $cat }}</div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    <div style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.5px;">{{ $title }}</div>
                </div>
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($summary,100) }}</p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="hopn-reveal" style="text-align:center; margin-top:40px;">
            <a href="{{ route('products.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-purple"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(139,92,246,0.3); color:#A78BFA; font-size:15px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') عرض جميع المنتجات @elseif($lang==='de') Alle Produkte anzeigen @else View All Products @endif →
            </a>
        </div>
    </div>
</section>
@endif

{{-- 6. INDUSTRIES --}}
@if($homeIndustries->count() > 0)
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') القطاعات @elseif($lang==='de') Branchen @else Industries @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') القطاعات التي نخدمها @elseif($lang==='de') Branchen, die wir bedienen @else Industries We Serve @endif
            </h2>
        </div>
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
            @foreach($homeIndustries as $industry)
              <a href="{{ route('industries.show', ['lang'=>$lang,'slug'=>$industry->slug]) }}" class="hopn-industry-card"
                style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:14px; padding:24px 16px; text-align:center; text-decoration:none;">
                @if($industry->image_url)
                <img loading="lazy" decoding="async" src="{{ $industry->image_url }}" alt="{{ $industry->name }}"
                     style="width:96px; height:96px; margin:0 auto 16px; border-radius:14px; object-fit:cover; background:#FFFFFF;">
                @endif
                <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $industry->name }}</div>
            </a>
            @endforeach
        </div>
        <div class="hopn-reveal" style="text-align:center; margin-top:36px;">
            <a href="{{ route('industries.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-blue"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(143,184,204,0.4); color:#8FB8CC; font-size:14px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') عرض جميع القطاعات @elseif($lang==='de') Alle Branchen @else View All Industries @endif →
            </a>
        </div>
    </div>
</section>
@endif

{{-- 7. PARTNERS: moving card carousel (original spec: "Carousel + grid, admin-controlled").
        Shows partners marked "Verified" in the admin panel. While none is verified yet, all visible partners are shown,
        so the section is never empty on a fresh install. Pauses on hover and stops moving when the visitor prefers reduced motion. --}}
@php
    $stripPartners = $partners->where('verified', true);
    if ($stripPartners->isEmpty()) { $stripPartners = $partners; }
    $stripPartners = $stripPartners->values();
    $stripReps = $stripPartners->count() > 0 ? max(1, (int) ceil(8 / $stripPartners->count())) : 1;
@endphp
@if($stripPartners->count() > 0)
<style>
    .hopn-partners { --pt-line:rgba(255,255,255,0.12); --pt-ink:#E2E8F0; --pt-bg:rgba(255,255,255,0.03); }
    html[data-theme="light"] .hopn-partners { --pt-line:#D7DEE3; --pt-ink:#172331; --pt-bg:#FFFFFF; }
    .hopn-partner-marquee { overflow:hidden; }
    .hopn-partner-track { display:flex; width:max-content; gap:16px; padding:4px 0; animation:hopnPartners 45s linear infinite; }
    html[dir="rtl"] .hopn-partner-track { animation-name:hopnPartnersRtl; }
    .hopn-partner-marquee:hover .hopn-partner-track, .hopn-partner-marquee:focus-within .hopn-partner-track { animation-play-state:paused; }
    .hopn-partner-item { display:flex; flex-direction:column; align-items:center; justify-content:center; gap:12px; min-width:220px; padding:22px 28px; border:1px solid var(--pt-line); background:var(--pt-bg); border-radius:12px; flex-shrink:0; }
    .hopn-partner-item img { height:64px; width:auto; max-width:180px; object-fit:contain; display:block; }
    .hopn-partner-item span { font-size:14px; font-weight:600; color:var(--pt-ink); text-align:center; }
    @keyframes hopnPartners { from { transform:translateX(0); } to { transform:translateX(calc(-50% - 8px)); } }
    @keyframes hopnPartnersRtl { from { transform:translateX(0); } to { transform:translateX(calc(50% + 8px)); } }
    @media (prefers-reduced-motion: reduce) {
        .hopn-partner-track { animation:none; width:auto; flex-wrap:wrap; justify-content:center; }
        .hopn-partner-track .hopn-partner-copy { display:none; }
    }
    @media (max-width:640px) { .hopn-partner-item { min-width:170px; padding:18px 20px; } .hopn-partner-item img { height:52px; max-width:140px; } }
</style>
<section class="hopn-partners" style="padding:72px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04); border-bottom:1px solid rgba(255,255,255,0.04);">
    <div class="container-shell">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:12px; margin-bottom:28px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#94A3B8; display:block; margin-bottom:10px;">
                    @if($lang==='ar') الشركاء @elseif($lang==='de') Partner @else Partners @endif
                </span>
                <h2 style="font-size:clamp(24px,3vw,34px); font-weight:800; color:white; letter-spacing:-0.5px; margin:0;">
                    @if($lang==='ar') جهات نعمل معها @elseif($lang==='de') Organisationen, mit denen wir arbeiten @else Organisations we work with @endif
                </h2>
            </div>
            <a href="{{ route('partners.index', ['lang'=>$lang]) }}" style="font-size:14px; font-weight:600; color:#8FB8CC; text-decoration:none;">
                @if($lang==='ar') جميع الشركاء @elseif($lang==='de') Alle Partner @else All partners @endif →
            </a>
        </div>
    </div>
    <div class="hopn-partner-marquee">
        <div class="hopn-partner-track">
            @foreach([0, 1] as $copy)
                @for($rep = 0; $rep < $stripReps; $rep++)
                    @foreach($stripPartners as $partner)
                    <div class="hopn-partner-item {{ $copy === 1 ? 'hopn-partner-copy' : '' }}" @if($copy === 1) aria-hidden="true" @endif>
                        @if($partner->logo)
                        <img loading="lazy" decoding="async" src="{{ $partner->logo }}" alt="{{ $copy === 1 ? '' : $partner->name }}">
                        @endif
                        <span>{{ $partner->name }}</span>
                    </div>
                    @endforeach
                @endfor
            @endforeach
        </div>
    </div>
</section>
@endif

@if($featuredStartups->count() > 0 || $featuredInvestors->count() > 0)
{{-- STARTUP & INVESTOR ECOSYSTEM --}}
<section class="homepage-secondary" style="padding:100px 0; background:#050A14; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10;">
        <div style="text-align:center; margin-bottom:56px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') الشركات الناشئة والمستثمرون @elseif($lang==='de') Startups &amp; Investoren @else Startups &amp; Investors @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') القوى الدافعة لنظام الابتكار
                @elseif($lang==='de') Die treibenden Kräfte unseres Ökosystems
                @else The Ventures &amp; Capital Driving Our Ecosystem @endif
            </h2>
            <p style="color:#CBD5E1; max-width:560px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') نربط الشركات الناشئة الواعدة بالمستثمرين الاستراتيجيين عبر أوروبا
                @elseif($lang==='de') Wir verbinden vielversprechende Startups mit strategischen Investoren in ganz Europa
                @else We connect promising startups with strategic investors across Europe @endif
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:32px;">

            @if($featuredStartups->count() > 0)
            <div style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:20px; padding:32px;">
                <div class="hopn-reveal" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
                    <h3 style="font-size:18px; font-weight:700; color:white; margin:0;">
                        @if($lang==='ar') شركات ناشئة مميزة @elseif($lang==='de') Ausgewählte Startups @else Featured Startups @endif
                    </h3>
                </div>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach($featuredStartups as $startup)
                    <div class="hopn-row-hover" style="display:flex; align-items:center; gap:14px; padding:12px; border-radius:12px;">
                        @if($startup->logo)
                        <img loading="lazy" decoding="async" src="{{ $startup->logo }}" alt="{{ $startup->name }}" style="width:40px; height:40px; border-radius:10px; object-fit:cover; background:white; flex-shrink:0;">
                        @endif
                        <div style="flex:1; min-width:0;">
                            <div style="font-size:14px; font-weight:700; color:white; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $startup->name }}</div>
                            <div style="font-size:12px; color:#CBD5E1;">{{ $startup->industry }}</div>
                        </div>
                        @if($startup->stage)
                        <span style="font-size:11px; font-weight:600; color:#EF4444; background:rgba(239,68,68,0.1); padding:4px 10px; border-radius:20px; white-space:nowrap;">{{ $startup->stage }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('startups.index', ['lang'=>$lang]) }}"
                   style="display:inline-flex; align-items:center; gap:6px; margin-top:20px; color:#818CF8; font-size:13px; font-weight:600; text-decoration:none;">
                    @if($lang==='ar') عرض جميع الشركات الناشئة @elseif($lang==='de') Alle Startups ansehen @else View all startups @endif →
                </a>
            </div>
            @endif

            @if($featuredInvestors->count() > 0)
            <div class="hopn-reveal" style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:20px; padding:32px;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
                    <h3 style="font-size:18px; font-weight:700; color:white; margin:0;">
                        @if($lang==='ar') مستثمرون رئيسيون @elseif($lang==='de') Wichtige Investoren @else Key Investors @endif
                    </h3>
                </div>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach($featuredInvestors as $investor)
                    <div class="hopn-row-hover" style="display:flex; align-items:center; gap:14px; padding:12px; border-radius:12px;">
                        @if($investor->logo)
                        <img loading="lazy" decoding="async" src="{{ $investor->logo }}" alt="{{ $investor->name }}" style="width:40px; height:40px; border-radius:10px; object-fit:cover; background:white; flex-shrink:0;">
                        @endif
                        <div style="flex:1; min-width:0;">
                            <div style="font-size:14px; font-weight:700; color:white; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $investor->name }}</div>
                            <div style="font-size:12px; color:#CBD5E1;">{{ $investor->type }}</div>
                        </div>
                        @if($investor->region)
                        <span style="font-size:11px; font-weight:600; color:#06B6D4; background:rgba(6,182,212,0.1); padding:4px 10px; border-radius:20px; white-space:nowrap;">{{ $investor->region }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('investors.index', ['lang'=>$lang]) }}"
                   style="display:inline-flex; align-items:center; gap:6px; margin-top:20px; color:#818CF8; font-size:13px; font-weight:600; text-decoration:none;">
                    @if($lang==='ar') عرض جميع المستثمرين @elseif($lang==='de') Alle Investoren ansehen @else View all investors @endif →
                </a>
            </div>
            @endif

        </div>
    </div>
</section>
@endif

{{-- 8. CONSULTING EXPERTS --}}
@if(isset($experts) && $experts->count() > 0)
<section id="consulting-experts" class="homepage-secondary" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#10B981; display:block; margin-bottom:14px;">Consulting</span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:10px;">
                    @if($lang==='ar') احجز خبيراً @elseif($lang==='de') Einen Experten buchen @else Book an Expert @endif
                </h2>
                <p style="color:#CBD5E1; font-size:15px; max-width:480px; line-height:1.7; margin:0;">
                    @if($lang==='ar') استفد من استراتيجيي HOPn في الذكاء الاصطناعي والتوائم الرقمية وتسويق الأبحاث واستراتيجية المواهب.
                    @elseif($lang==='de') Zugang zu HOPn-Strategen in KI, digitalen Zwillingen, Forschungskommerzialisierung und Talentstrategie.
                    @else Access HOPn strategists in AI, digital twins, research commercialization, and talent strategy. @endif
                </p>
            </div>
            <a href="{{ route('consulting.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#10B981; text-decoration:none;">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in touch @endif →
            </a>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @foreach($experts as $expert)
            @php $c = $expert->accent_color ?? '#8FB8CC'; @endphp
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    @if($expert->photo_url)
                        <img loading="lazy" decoding="async" src="{{ $expert->photo_url }}" alt="{{ $expert->name }}"
                             style="width:48px; height:48px; border-radius:12px; object-fit:cover; flex-shrink:0;">
                    @else
                        <div style="width:48px; height:48px; border-radius:12px; background:{{ $c }}20; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:800; color:{{ $c }}; flex-shrink:0;">
                            {{ $expert->initials ?? strtoupper(substr($expert->name,0,2)) }}
                        </div>
                    @endif
                    <div style="flex:1;">
                        <div style="font-size:15px; font-weight:700; color:white;">{{ $expert->name }}</div>
                        <div style="font-size:12px; color:#CBD5E1; margin-top:2px;">
                            @if($lang==='ar'&&$expert->specialization_ar) {{ $expert->specialization_ar }}
                            @elseif($lang==='de'&&$expert->specialization_de) {{ $expert->specialization_de }}
                            @else {{ $expert->specialization_en ?? '' }} @endif
                        </div>
                    </div>
                    @if($expert->hourly_rate)
                    <div style="font-size:15px; font-weight:800; color:{{ $c }}; white-space:nowrap;">€{{ $expert->hourly_rate }}{{ str_contains($expert->hourly_rate, '/') ? '' : '/hr' }}</div>
                    @endif
                </div>
                @if($expert->tags && count($expert->tags) > 0)
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                    @foreach($expert->tags as $tag)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $c }}12; border:1px solid {{ $c }}25; color:{{ $c }};">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                <a href="{{ route('consulting.book', ['lang'=>$lang, 'id'=>$expert->id]) }}"
                   style="display:block; text-align:center; margin-top:16px; padding:12px; border-radius:10px; background:#8B5CF6; color:white; font-size:14px; font-weight:700; text-decoration:none;">
                    @if($lang==='ar') احجز هذا الخبير @elseif($lang==='de') Diesen Experten buchen @else Book this expert @endif
                </a>
                @if($expert->linkedin_url)
                <a href="{{ $expert->linkedin_url }}" target="_blank"
                   class="hopn-link-fade-in"
                   style="display:inline-block; margin-top:10px; font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none;">LinkedIn →</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 9. WORKSHOPS --}}
@php
    $homeWorkshops = \App\Models\Workshop::published()->orderBy('sort_order')->limit(3)->get();
    $wsColors = ['#8FB8CC','#8FB8CC','#8FB8CC'];
@endphp
@if($homeWorkshops->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#F59E0B; display:block; margin-bottom:14px;">Training & Workshops</span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:10px;">
                    @if($lang==='ar') رفع كفاءة الفرق لعصر الذكاء الاصطناعي @elseif($lang==='de') Teams für das KI-Zeitalter qualifizieren @else Upskill teams for the AI era @endif
                </h2>
                <p style="color:#CBD5E1; font-size:15px; max-width:520px; line-height:1.7; margin:0;">
                    @if($lang==='ar') ورش عمل يقودها خبراء — مصممة لسد الفجوة بين طموح الابتكار والقدرة التشغيلية.
                    @elseif($lang==='de') Expertengeführte Workshops — konzipiert, um die Lücke zwischen Innovationsambition und operativer Fähigkeit zu schließen.
                    @else Expert-led workshops — designed to close the gap between innovation ambition and operational capability. @endif
                </p>
            </div>
            <a href="{{ route('workshops.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#F59E0B; text-decoration:none;">
                @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($homeWorkshops as $ws)
            <a href="{{ route('workshops.show', ['lang'=>$lang, 'slug'=>$ws->slug]) }}" class="hopn-lift-card" style="display:block; text-decoration:none; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; flex-wrap:wrap; gap:8px;">
                    <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $wsColors[$loop->index % 3] }}15; color:{{ $wsColors[$loop->index % 3] }}; border:1px solid {{ $wsColors[$loop->index % 3] }}30;">{{ $ws->duration_label_en ?? $ws->format }}</span>
                    <span style="font-size:11px; color:#64748B; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $ws->category }}</span>
                </div>
                <h3 style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.3px; margin:0 0 10px; line-height:1.3;">{{ $ws->title_en }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7; margin:0 0 20px;">{{ \Illuminate\Support\Str::limit($ws->summary_en, 100) }}</p>
                <span style="font-size:13px; font-weight:600; color:{{ $wsColors[$loop->index % 3] }};">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
        <div style="display:flex; gap:14px; margin-top:32px; flex-wrap:wrap;">
            <a href="{{ route('workshops.index', ['lang'=>$lang]) }}"
               class="hopn-btn-outline-amber"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(245,158,11,0.3); color:#F59E0B; font-size:14px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') عرض جميع ورش العمل @elseif($lang==='de') Alle Workshops @else View All Workshops @endif
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-btn-outline-neutral"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.1); color:#CBD5E1; font-size:14px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') احجز ورشة عمل @elseif($lang==='de') Workshop buchen @else Book a Workshop @endif
            </a>
        </div>
    </div>
</section>
@endif

{{-- 10. EVENTS --}}
@if($upcomingEvents->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">
                    @if($lang==='ar') الفعاليات والورش @elseif($lang==='de') Events & Workshops @else Events & Workshops @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') الفعاليات القادمة @elseif($lang==='de') Kommende Events @else Upcoming Events @endif
                </h2>
            </div>
            <a href="{{ route('events.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#F59E0B; text-decoration:none;">
                @if($lang==='ar') جميع الفعاليات @elseif($lang==='de') Alle Events @else All Events @endif →
            </a>
        </div>
        @if($upcomingEvents->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($upcomingEvents as $event)
            @php $typeColors=['conference'=>'#8FB8CC','workshop'=>'#8FB8CC','webinar'=>'#8FB8CC','hackathon'=>'#8FB8CC','startup'=>'#8FB8CC','networking'=>'#8FB8CC','research'=>'#A855F7']; $c=$typeColors[$event->type]??'#8FB8CC'; @endphp
            <div class="hopn-lift-card-nobg" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; overflow:hidden;">
                <div style="padding:24px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                        <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase;">{{ ucfirst($event->type) }}</span>
                        @if($event->date)<span style="font-size:12px; color:#94A3B8;">{{ $event->date->format('d M Y') }}</span>@endif
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">{{ $event->title }}</h3>
                    @if($event->location)<div style="font-size:13px; color:#94A3B8; margin-bottom:16px;">{{ $event->location }}</div>@endif
                    <a href="{{ route('events.index', ['lang'=>$lang]) }}"
                       style="font-size:13px; font-weight:600; color:{{ $c }}; text-decoration:none;">
                        @if($lang==='ar') سجّل الآن @elseif($lang==='de') Jetzt anmelden @else Register Now @endif →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endif

{{-- 11. NEWSROOM --}}
@if($latestPosts->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:48px;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang==='ar') غرفة الأخبار @elseif($lang==='de') Newsroom @else Newsroom @endif
                </span>
                <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                    @if($lang==='ar') آخر الأخبار من HOPn @elseif($lang==='de') Aktuelles von HOPn @else Latest from HOPn @endif
                </h2>
            </div>
            <a href="{{ route('newsroom.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#818CF8; text-decoration:none;">
                @if($lang==='ar') جميع الأخبار @elseif($lang==='de') Alle Neuigkeiten @else All News @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($latestPosts as $post)
            @php $c=['#8FB8CC','#8FB8CC','#8FB8CC'][$loop->index%3]; @endphp
            <a href="{{ route('insights.show', ['lang'=>$lang,'slug'=>$post->slug]) }}"
               class="hopn-lift-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none;">
                @if($post->category)
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; border:1px solid {{ $c }}30; color:{{ $c }}; margin-bottom:16px; width:fit-content;">
                    {{ $post->category->name ?? 'News' }}
                </span>
                @endif
                <h3 style="font-size:17px; font-weight:700; color:white; line-height:1.4; margin-bottom:12px; flex:1;">{{ $post->title }}</h3>
                @if($post->excerpt)
                <p style="font-size:13px; color:#94A3B8; line-height:1.6; margin-bottom:16px;">{{ Str::limit($post->excerpt,100) }}</p>
                @endif
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <span style="font-size:12px; color:#64748B;">{{ $post->published_at?->format('d M Y') }}</span>
                    <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                        @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Lesen @else Read more @endif →
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 12. TESTIMONIALS --}}
@if($testimonials->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') أصوات العملاء @elseif($lang==='de') Kundenstimmen @else Client Voice @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ما يقوله عملاؤنا @elseif($lang==='de') Was unsere Kunden sagen @else What Our Clients Say @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($testimonials as $testimonial)
                <x-testimonial :testimonial="$testimonial" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 13. TALENT --}}
<section class="homepage-secondary" style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10;">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') المواهب والتوظيف @elseif($lang==='de') Talente & Einstellung @else Talent & Hiring @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') ابنِ فريق أحلامك @elseif($lang==='de') Bauen Sie Ihr Traumteam @else Build Your Dream Team @endif
            </h2>
            <p style="color:#CBD5E1; max-width:500px; margin:0 auto; font-size:17px;">
                @if($lang==='ar') الوصول إلى أفضل المواهب التقنية في أوروبا وما وراءها
                @elseif($lang==='de') Zugang zu erstklassigen technischen Talenten in Europa
                @else Access top-tier technical talent across Europe and beyond @endif
            </p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px; margin-bottom:48px;">
            @php
            $talentItems = [
                ['mark'=>'R','title'=>$lang==='ar'?'فرق عن بُعد':($lang==='de'?'Remote-Teams':'Remote Teams'),'desc'=>$lang==='ar'?'فرق مُدارة بالكامل من المهندسين وعلماء البيانات':($lang==='de'?'Vollständig verwaltete Remote-Teams':'Fully managed remote teams of engineers'),'color'=>'#8FB8CC'],
                ['mark'=>'L','title'=>$lang==='ar'?'التوظيف المحلي':($lang==='de'?'Lokale Einstellung':'Local Hiring'),'desc'=>$lang==='ar'?'توظيف في الموقع عبر ألمانيا وأوروبا':($lang==='de'?'Vor-Ort-Talente in Deutschland':'On-site talent across Germany'),'color'=>'#8FB8CC'],
                ['mark'=>'E','title'=>$lang==='ar'?'خبراء تقنيون':($lang==='de'?'Tech-Experten':'Technical Experts'),'desc'=>$lang==='ar'?'متخصصون في الذكاء الاصطناعي والبيانات والروبوتيكا':($lang==='de'?'KI-, Daten- und Robotik-Spezialisten':'AI, data, and robotics specialists'),'color'=>'#8FB8CC'],
                ['mark'=>'D','title'=>$lang==='ar'?'فرق مخصصة':($lang==='de'?'Dedizierte Teams':'Dedicated Teams'),'desc'=>$lang==='ar'?'فرق تطوير طويلة الأجل مدمجة في مؤسستك':($lang==='de'?'Langfristige Teams in Ihrer Organisation':'Long-term teams in your organization'),'color'=>'#8FB8CC'],
            ];
            @endphp
            @foreach($talentItems as $item)
            <div class="hopn-lift-card hopn-talent-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item['title'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;">
            <a href="{{ route('careers.index', ['lang'=>$lang]) }}"
               class="hopn-btn-primary-green"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 36px; border-radius:10px; background:#245B78; color:white; font-size:15px; font-weight:700; text-decoration:none;">
                @if($lang==='ar') عرض الوظائف المفتوحة @elseif($lang==='de') Offene Stellen ansehen @else View Open Positions @endif →
            </a>
        </div>
    </div>
</section>

{{-- 14. FINAL CTA --}}
<section style="padding:120px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(32px,5vw,64px); font-weight:900; color:white; letter-spacing:-2px; margin-bottom:20px; line-height:1.1;">
            @if($lang==='ar') هل أنت مستعد لتنسيق اختراقك التالي؟
            @elseif($lang==='de') Bereit, Ihren nächsten Durchbruch zu orchestrieren?
            @else Ready to orchestrate your next breakthrough? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:18px; max-width:540px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') تواصل مع استراتيجيي HOPn لتحديد نطاق مبادرتك الابتكارية.
            @elseif($lang==='de') Verbinden Sie sich mit HOPn-Strategen, um Ihre Innovationsinitiative zu gestalten.
            @else Connect with HOPn strategists to scope your innovation initiative — from AI governance to ecosystem partnerships. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-btn-primary"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#245B78; color:white; font-size:16px; font-weight:700; text-decoration:none;">
                @if($lang==='ar') احجز مكالمة استراتيجية @elseif($lang==='de') Strategiegespräch buchen @else Book a Strategy Call @endif
            </a>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               class="hopn-btn-outline-neutral2"
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none;">
                @if($lang==='ar') استكشف الكتالوج @elseif($lang==='de') HOPn kontaktieren @else Explore the Catalog @endif
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var revealEls = document.querySelectorAll('.hopn-reveal');
    if (!('IntersectionObserver' in window) || revealEls.length === 0) {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(function (el) { observer.observe(el); });
});

document.addEventListener('DOMContentLoaded', function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    document.querySelectorAll('[data-tilt]').forEach(function (card) {
        var glow = document.createElement('div');
        glow.className = 'hopn-tilt-glow';
        card.appendChild(glow);
        if (reduceMotion) return;
        if (supportsHover) {
            card.addEventListener('mousemove', function (e) {
                var r = card.getBoundingClientRect();
                var x = e.clientX - r.left, y = e.clientY - r.top;
                var px = (x / r.width) - 0.5, py = (y / r.height) - 0.5;
                card.style.transform = 'perspective(700px) rotateY(' + (px * 10) + 'deg) rotateX(' + (-py * 10) + 'deg) translateY(-4px)';
                glow.style.setProperty('--mx', (x / r.width * 100) + '%');
                glow.style.setProperty('--my', (y / r.height * 100) + '%');
            });
            card.addEventListener('mouseleave', function () { card.style.transform = ''; });
        } else {
            card.addEventListener('touchstart', function () {
                card.classList.add('is-touched');
                setTimeout(function () { card.classList.remove('is-touched'); }, 900);
            }, { passive: true });
        }
    });
});
</script>
@endpush

</div>

</x-layouts.public>