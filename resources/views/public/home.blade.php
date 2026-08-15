@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'HOPn — Innovation Ecosystem Platform'">

<style>
@keyframes marquee  { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
@keyframes marquee2 { 0%{transform:translateX(-50%)} 100%{transform:translateX(0)} }
@keyframes heroFadeUp { from{opacity:0; transform:translateY(18px);} to{opacity:1; transform:translateY(0);} }
@keyframes heroOrbitSpin { from{transform:rotate(0deg);} to{transform:rotate(360deg);} }
@keyframes heroOrbitSpinReverse { from{transform:rotate(0deg);} to{transform:rotate(-360deg);} }
@keyframes heroGlowFloat { 0%,100%{transform:translate(-50%,0);} 50%{transform:translate(-50%,-24px);} }

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
.hopn-btn-primary-green:hover { transform:translateY(-3px); box-shadow:0 0 60px rgba(16,185,129,0.4); }

.hopn-row-hover { transition:background 0.25s ease; }
.hopn-row-hover:hover { background:rgba(255,255,255,0.03); }

.hopn-btn-primary, .hopn-btn-secondary {
    transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s cubic-bezier(0.16,1,0.3,1), background 0.25s ease, border-color 0.25s ease;
}
.hopn-btn-primary:hover { transform:translateY(-3px); box-shadow:0 0 64px rgba(79,110,247,0.65); }
.hopn-btn-secondary:hover { transform:translateY(-3px); background:rgba(255,255,255,0.09); border-color:rgba(255,255,255,0.28); }

.hopn-hero-orbit { position:absolute; top:50%; left:50%; border:1px solid rgba(79,110,247,0.14); border-radius:50%; pointer-events:none; }
.hopn-hero-orbit-1 { width:560px; height:560px; margin:-280px 0 0 -280px; animation:heroOrbitSpin 46s linear infinite; }
.hopn-hero-orbit-2 { width:820px; height:820px; margin:-410px 0 0 -410px; border-color:rgba(139,92,246,0.10); animation:heroOrbitSpinReverse 64s linear infinite; }
.hopn-hero-orbit-3 { width:1060px; height:1060px; margin:-530px 0 0 -530px; border-color:rgba(6,182,212,0.08); animation:heroOrbitSpin 84s linear infinite; }
.hopn-hero-node { position:absolute; width:8px; height:8px; border-radius:50%; box-shadow:0 0 12px currentColor; }

@media (max-width:900px) {
    .hopn-hero-orbit { transform:translate(-50%,-50%) scale(0.62); }
}
@media (max-width:480px) {
    .hopn-hero-orbit { transform:translate(-50%,-50%) scale(0.4); opacity:0.7; }
}
@media (prefers-reduced-motion: reduce) {
    .hopn-hero-in { animation:none; opacity:1; }
}

.hopn-reveal { opacity:0; transform:translateY(24px); transition:opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1); }
.hopn-reveal.is-visible { opacity:1; transform:translateY(0); }
@media (prefers-reduced-motion: reduce) {
    .hopn-reveal { opacity:1; transform:none; transition:none; }
}

.hopn-btn-outline-blue { transition:background 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-btn-outline-blue:hover { background:rgba(79,110,247,0.08); transform:translateY(-2px); }

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

.hopn-marquee-item { transition:color 0.25s ease; }
.hopn-marquee-item:hover { color:#CBD5E1 !important; }

.hopn-ecosystem-node { transition:background 0.3s ease, border-color 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-ecosystem-node:hover { transform:translateY(-4px); }
.hopn-domain-link { transition:background 0.3s ease, border-color 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
.hopn-domain-link:hover { background:rgba(79,110,247,0.08); border-color:rgba(79,110,247,0.3); transform:translateY(-2px); }

.hopn-link-accent { transition:color 0.25s ease; }
.hopn-link-accent:hover { color:white !important; }

.hopn-strategy-step { background:#0A0F1E; transition:background 0.4s cubic-bezier(0.16,1,0.3,1); position:relative; }
.hopn-strategy-step:hover { background:#0D1425; }
.hopn-strategy-step:hover .hopn-strategy-icon { transform:scale(1.08); }
.hopn-strategy-icon { transition:transform 0.4s cubic-bezier(0.16,1,0.3,1); }

.hopn-service-card, .hopn-product-card {
    transition:background 0.35s cubic-bezier(0.16,1,0.3,1), border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1);
}
.hopn-service-card:hover { background:#0A1628; }
.hopn-product-card:hover { border-color:rgba(255,255,255,0.14); background:#0D1425; transform:translateY(-5px); }
.hopn-product-card:hover .hopn-product-icon { transform:scale(1.08); }
.hopn-product-icon { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1); }

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

{{-- 1. HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:94vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.05) 1px, transparent 1px); background-size:64px 64px; pointer-events:none;"></div>
    <div style="position:absolute; top:-300px; left:50%; width:1000px; height:1000px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.10) 0%, transparent 65%); pointer-events:none; animation:heroGlowFloat 12s ease-in-out infinite;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(139,92,246,0.07) 0%, transparent 70%); pointer-events:none;"></div>

    {{-- Abstract orbiting ecosystem graphic --}}
    <div class="hopn-hero-orbit hopn-hero-orbit-1" aria-hidden="true">
        <span class="hopn-hero-node" style="top:-4px; left:50%; margin-left:-4px; color:#4F6EF7; background:#4F6EF7;"></span>
        <span class="hopn-hero-node" style="bottom:8%; right:6%; color:#06B6D4; background:#06B6D4;"></span>
    </div>
    <div class="hopn-hero-orbit hopn-hero-orbit-2" aria-hidden="true">
        <span class="hopn-hero-node" style="top:14%; left:4%; color:#8B5CF6; background:#8B5CF6;"></span>
        <span class="hopn-hero-node" style="bottom:-4px; left:50%; margin-left:-4px; color:#EC4899; background:#EC4899;"></span>
    </div>
    <div class="hopn-hero-orbit hopn-hero-orbit-3" aria-hidden="true">
        <span class="hopn-hero-node" style="top:50%; right:-4px; margin-top:-4px; color:#F59E0B; background:#F59E0B;"></span>
    </div>

    <div class="container-shell" style="position:relative; z-index:10; padding:100px 0 80px; text-align:center;">
        <div class="hopn-hero-in hopn-hero-in-1" style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.07); border-radius:999px; padding:6px 20px; margin-bottom:36px;">
            <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 10px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') منصة النظام البيئي الأوروبي للابتكار
                @elseif($lang==='de') Europäische Innovations-Ökosystem-Plattform
                @else Innovation Ecosystem Platform @endif
            </span>
        </div>

        <h1 class="hopn-hero-in hopn-hero-in-2" style="font-size:clamp(38px,6.5vw,84px); font-weight:900; color:white; line-height:1.04; letter-spacing:-2.5px; margin:0 auto 28px; max-width:960px;">
            @if($lang==='ar')
                <span style="color:white;">حيث تتلاقى المؤسسات والشركات الناشئة</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">ورأس المال لبناء المستقبل</span>
            @elseif($lang==='de')
                <span style="color:white;">Wo Unternehmen, Startups</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">und Kapital zusammenkommen.</span>
            @else
                <span style="color:white;">Where enterprises, startups,</span><br>
                <span style="background:linear-gradient(135deg,#4F6EF7 0%,#8B5CF6 50%,#06B6D4 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">and capital converge.</span>
            @endif
        </h1>

        <p class="hopn-hero-in hopn-hero-in-3" style="font-size:clamp(16px,2.2vw,20px); color:#CBD5E1; max-width:640px; margin:0 auto 48px; line-height:1.75;">
            @if($lang==='ar') HOPn ينسّق الاستراتيجية والتكنولوجيا والأنظمة البيئية — يربط الشركات الكبرى والمؤسسين والمستثمرين والجامعات في نظام تشغيل ابتكار متكامل.
            @elseif($lang==='de') HOPn orchestriert Strategie, Technologie und Ökosysteme — verbindet Unternehmen, Gründer, Investoren und Universitäten zu einem integrierten Innovationsbetriebssystem.
            @else HOPn orchestrates strategy, technology, and ecosystems — connecting corporates, founders, investors, and universities into one integrated innovation operating system. @endif
        </p>

        <div class="hopn-hero-in hopn-hero-in-4" style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:72px;">
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}" class="hopn-btn-primary"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 48px rgba(79,110,247,0.45);">
                @if($lang==='ar') استكشف النظام البيئي @elseif($lang==='de') Ökosystem erkunden @else Explore the Ecosystem @endif
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-btn-secondary"
               style="display:inline-flex; align-items:center; gap:8px; padding:15px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') احجز استشارة استراتيجية @elseif($lang==='de') Strategiegespräch buchen @else Book a Strategy Call @endif
            </a>
        </div>

        <div class="hopn-hero-in hopn-hero-in-5" style="display:inline-flex; flex-wrap:wrap; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.02); border-radius:16px; overflow:hidden;">
            @foreach([
                ['50+', $lang==='ar'?'منظمة':($lang==='de'?'Organisationen':'Organizations')],
                ['6',   $lang==='ar'?'منتجات':($lang==='de'?'Produkte':'Products')],
                ['12+', $lang==='ar'?'مجالات ابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')],
                ['€500M+', $lang==='ar'?'رأس مال ابتكار':($lang==='de'?'Innovationskapital':'Innovation Capital')],
            ] as $stat)
            <div style="padding:22px 36px; text-align:center; border-right:1px solid rgba(255,255,255,0.06);">
                <div style="font-size:28px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat[0] }}</div>
                <div style="font-size:11px; color:#94A3B8; margin-top:5px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; white-space:nowrap;">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 2. STRATEGY > BUILD > SCALE --}}
<section style="padding:100px 0; background:#050A14;">
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
                <div class="hopn-strategy-icon" style="width:56px; height:56px; border-radius:14px; background:{{ $step[1] }}15; border:1px solid {{ $step[1] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:900; color:{{ $step[1] }}; margin:0 auto 20px;">{{ $step[0] }}</div>
                <h3 style="font-size:22px; font-weight:800; color:white; margin-bottom:12px; letter-spacing:-0.5px;">{{ $step[2] }}</h3>
                <p style="font-size:14px; color:#94A3B8; line-height:1.75; max-width:280px; margin:0 auto;">{{ $step[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. INNOVATION ECOSYSTEM --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); width:600px; height:600px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10;">
        <div class="hopn-reveal" style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#4F6EF7; margin-bottom:16px;">
                @if($lang==='ar') مركز واحد للابتكار @elseif($lang==='de') Ein Hub für Innovation @else One Hub for Innovation @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') حيث يلتقي عالم الأعمال والتعليم والبحث العلمي
                @elseif($lang==='de') Wo Wirtschaft, Bildung &amp; Forschung zusammenkommen
                @else Where Business, Education &amp; Research Meet @endif
            </h2>
            <p style="color:#CBD5E1; max-width:560px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') HOPn يمثل الجسر بين المؤسسات والجامعات والشركات الناشئة والمستثمرين
                @elseif($lang==='de') HOPn verbindet Unternehmen, Universitäten, Startups und Investoren
                @else HOPn bridges enterprises, universities, startups, and investors @endif
            </p>
        </div>

        <div class="hopn-ecosystem-grid hopn-reveal" style="display:grid; gap:12px; max-width:1120px; margin:0 auto 64px;">
            @php
            $ecosystem = [
                ['icon'=>'🏢','label'=>$lang==='ar'?'الأعمال':($lang==='de'?'Wirtschaft':'Business'),'color'=>'#4F6EF7','desc'=>$lang==='ar'?'مؤسسات وشركات':($lang==='de'?'Unternehmen':'Enterprises & Firms')],
                ['icon'=>'🎓','label'=>$lang==='ar'?'التعليم':($lang==='de'?'Bildung':'Education'),'color'=>'#10B981','desc'=>$lang==='ar'?'جامعات وبرامج':($lang==='de'?'Unis & Programme':'Universities & Programs')],
                ['icon'=>'⚡','label'=>'HOPn','color'=>'#8B5CF6','desc'=>$lang==='ar'?'المنصة المحورية':($lang==='de'?'Zentrale Plattform':'Central Platform')],
                ['icon'=>'🔬','label'=>$lang==='ar'?'البحث':($lang==='de'?'Forschung':'Research'),'color'=>'#F59E0B','desc'=>$lang==='ar'?'مراكز البحث والتطوير':($lang==='de'?'F&E-Zentren':'R&D Centers')],
                ['icon'=>'🚀','label'=>$lang==='ar'?'الشركات الناشئة':($lang==='de'?'Startups':'Startups'),'color'=>'#EF4444','desc'=>$lang==='ar'?'ريادة الأعمال':($lang==='de'?'Ventures':'Ventures')],
                ['icon'=>'💰','label'=>$lang==='ar'?'المستثمرون':($lang==='de'?'Investoren':'Investors'),'color'=>'#06B6D4','desc'=>$lang==='ar'?'رأس المال الاستثماري':($lang==='de'?'Kapitalgeber':'Capital & Funds')],
                ['icon'=>'👥','label'=>$lang==='ar'?'المواهب':($lang==='de'?'Talente':'Talent'),'color'=>'#EC4899','desc'=>$lang==='ar'?'خبراء ومحترفون':($lang==='de'?'Experten & Fachkräfte':'Experts & Professionals')],
            ];
            @endphp
            @foreach($ecosystem as $node)
            <div class="hopn-ecosystem-node" style="border:1px solid {{ $node['color'] }}30; background:{{ $node['color'] }}08; border-radius:16px; padding:20px 12px; text-align:center;">
                @if($node['label']==='HOPn')
                <div style="width:48px; height:48px; border-radius:12px; background:#8B5CF6; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:white; box-shadow:0 0 20px rgba(139,92,246,0.4);">H</div>
                @else
                <div style="font-size:28px; margin-bottom:10px;">{{ $node['icon'] }}</div>
                @endif
                <div style="font-size:13px; font-weight:700; color:white; margin-bottom:4px;">{{ $node['label'] }}</div>
                <div style="font-size:11px; color:#94A3B8; line-height:1.4;">{{ $node['desc'] }}</div>
            </div>
            @endforeach
        </div>

        @if($homeDomains->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:12px; max-width:1000px; margin:0 auto 40px;">
            @foreach($homeDomains as $domain)
            <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$domain->slug]) }}" class="hopn-domain-link"
               style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:12px; padding:20px 16px; text-decoration:none; display:flex; align-items:center; gap:12px;">
                <span style="font-size:22px;">{{ $domain->icon ?? '🔬' }}</span>
                <span style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $domain->name }}</span>
            </a>
            @endforeach
        </div>
        @endif

        <div class="hopn-reveal" style="text-align:center;">
            <a href="{{ route('innovation.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-blue"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.3); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') استكشف مجالات الابتكار @elseif($lang==='de') Innovationsdomänen erkunden @else Explore Innovation Domains @endif →
            </a>
        </div>
    </div>
</section>

{{-- 4. CORE SERVICES --}}
<section style="padding:100px 0; background:#050A14;">
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
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:1px; background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.06); border-radius:16px; overflow:hidden;">
            @foreach($services as $service)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}" class="hopn-service-card"
               style="display:block; padding:28px; background:#050A14; text-decoration:none; position:relative; overflow:hidden;">
                <div style="width:40px; height:40px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:18px;">⚡</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px; line-height:1.3;">
                    @if($lang==='ar'&&$service->name_ar) {{ $service->name_ar }}
                    @elseif($lang==='de'&&$service->name_de) {{ $service->name_de }}
                    @else {{ $service->name }} @endif
                </h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.6; margin-bottom:16px;">{{ Str::limit($lang==='ar'&&$service->summary_ar?$service->summary_ar:($lang==='de'&&$service->summary_de?$service->summary_de:$service->summary)??'', 80) }}</p>
                <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr lesen @else Learn more @endif →
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. HOPN PRODUCTS --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; right:0; width:600px; height:600px; background:radial-gradient(circle at top right, rgba(139,92,246,0.08) 0%, transparent 70%); pointer-events:none;"></div>
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
        @if($homeProducts->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($homeProducts as $product)
            @php
                $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                $c=$colors[$loop->index%6];
                $title=$lang==='ar'&&$product->title_ar?$product->title_ar:($lang==='de'&&$product->title_de?$product->title_de:$product->title_en);
                $summary=$lang==='ar'&&$product->summary_ar?$product->summary_ar:($lang==='de'&&$product->summary_de?$product->summary_de:($product->summary_en??''));
                $categories=['Innovation Project Management','AI-Powered Fintech Platform','AI Tools & Certification','AI Governance & Compliance','Sports Performance Analytics','Education–Industry Bridge'];
                $cat=$categories[$loop->index] ?? 'Platform';
            @endphp
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}" class="hopn-product-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; text-decoration:none; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $c }}60, transparent);"></div>
                <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; color:{{ $c }}; margin-bottom:12px; opacity:0.85;">{{ $cat }}</div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    <div class="hopn-product-icon" style="width:44px; height:44px; border-radius:12px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:{{ $c }}; flex-shrink:0;">
                        {{ strtoupper(substr($title,0,1)) }}
                    </div>
                    <div style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.5px;">{{ $title }}</div>
                </div>
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($summary,100) }}</p>
                <span style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $c }};">
                    @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
            @endforeach
        </div>
        @endif
        <div class="hopn-reveal" style="text-align:center; margin-top:40px;">
            <a href="{{ route('products.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-purple"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(139,92,246,0.3); color:#A78BFA; font-size:15px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') عرض جميع المنتجات @elseif($lang==='de') Alle Produkte anzeigen @else View All Products @endif →
            </a>
        </div>
    </div>
</section>

{{-- 6. INDUSTRIES --}}
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
        @if($homeIndustries->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
            @foreach($homeIndustries as $industry)
            <a href="{{ route('industries.show', ['lang'=>$lang,'slug'=>$industry->slug]) }}" class="hopn-industry-card"
               style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:14px; padding:24px 16px; text-align:center; text-decoration:none;">
                <div style="font-size:28px; margin-bottom:10px;">{{ $industry->icon ?? '🏭' }}</div>
                <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $industry->name }}</div>
            </a>
            @endforeach
        </div>
        @else
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
            @foreach([['🚗','Automotive'],['🏥','Healthcare'],['🏭','Manufacturing'],['🛒','E-Commerce'],['🎓','Education'],['💳','Finance'],['🚚','Logistics'],['🔬','Research']] as [$icon,$name])
            <div class="hopn-industry-card" style="border:1px solid rgba(255,255,255,0.06); background:rgba(255,255,255,0.02); border-radius:14px; padding:24px 16px; text-align:center;">
                <div style="font-size:28px; margin-bottom:10px;">{{ $icon }}</div>
                <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $name }}</div>
            </div>
            @endforeach
        </div>
        @endif
        <div class="hopn-reveal" style="text-align:center; margin-top:36px;">
            <a href="{{ route('industries.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-blue"
               style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.3); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none; background:transparent;">
                @if($lang==='ar') عرض جميع القطاعات @elseif($lang==='de') Alle Branchen @else View All Industries @endif →
            </a>
        </div>
    </div>
</section>

{{-- 7. ANIMATED LOGO MARQUEE --}}
<section style="padding:80px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04); border-bottom:1px solid rgba(255,255,255,0.04); overflow:hidden;">
    <div class="container-shell hopn-reveal" style="margin-bottom:48px;">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
            <div>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#64748B; display:block; margin-bottom:10px;">Partners & Trust</span>
                <h2 style="font-size:clamp(22px,3vw,36px); font-weight:800; color:white; letter-spacing:-0.5px; margin:0;">
                    @if($lang==='ar') موثوق به من قادة الصناعة @elseif($lang==='de') Vertrauen von Industrieführern @else Trusted by industry leaders @endif
                </h2>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:28px; align-items:center;">
                @foreach([['50+','Partners'],['12+','Countries'],['15+','Universities'],['€500M+','Innovation Capital']] as $s)
                <div style="text-align:center;">
                    <div style="font-size:20px; font-weight:900; color:white; letter-spacing:-0.5px;">{{ $s[0] }}</div>
                    <div style="font-size:11px; color:#64748B; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $s[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DB partners first if available, otherwise marquee --}}
    @if($partners->count() > 0)
    <div style="margin-bottom:12px;">
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#475569; text-align:center; margin-bottom:14px;">Our Partners</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; align-items:center; animation:marquee {{ max(20, $partners->count() * 4) }}s linear infinite; width:fit-content;">
                @foreach($partners->concat($partners) as $partner)
                <a href="{{ route('partners.index', ['lang'=>$lang]) }}"
                    class="hopn-partner-card" style="min-width:240px; padding:28px 32px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:14px; border-right:1px solid rgba(255,255,255,0.04); text-decoration:none;">
                    @if($partner->logo)
                    <img src="{{ $partner->logo }}" alt="{{ $partner->name }}"
                         style="height:44px; width:auto; max-width:170px; object-fit:contain; filter:brightness(0.75) grayscale(0.25);">
                    @endif
                    <span style="font-size:15px; font-weight:700; color:#E2E8F0; letter-spacing:0.02em; white-space:nowrap;">{{ $partner->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @else
    {{-- Animated marquee fallback --}}
    <div style="margin-bottom:12px;">
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#475569; text-align:center; margin-bottom:14px;">Industry Leaders</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee 30s linear infinite; width:fit-content;">
                @php $b1=['Bosch','BMW Group','Mercedes-Benz','Audi','Volkswagen','Allianz','Deutsche Bahn','Infineon','SAP','Siemens','Continental','Deutsche Telekom']; @endphp
                @foreach(array_merge($b1,$b1) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span class="hopn-marquee-item" style="font-size:14px; font-weight:700; color:#475569; white-space:nowrap;">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="margin-bottom:12px;">
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#475569; text-align:center; margin-bottom:14px;">Technology Partners</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee2 28s linear infinite; width:fit-content;">
                @php $b2=['Microsoft','Google','Google Cloud','AWS','IBM','Intel','NVIDIA','Oracle','Cisco','Lenovo','Neo4j','Datadog']; @endphp
                @foreach(array_merge($b2,$b2) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span class="hopn-marquee-item" style="font-size:14px; font-weight:700; color:#475569; white-space:nowrap;">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <div style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em; color:#475569; text-align:center; margin-bottom:14px;">Research & Academic Excellence</div>
        <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);">
            <div style="display:flex; animation:marquee 35s linear infinite; width:fit-content;">
                @php $b3=['TU München','ETH Zürich','MIT','Stanford','RWTH Aachen','TU Berlin','Fraunhofer','Max Planck','KIT','HU Berlin','LMU München','TU Dresden']; @endphp
                @foreach(array_merge($b3,$b3) as $brand)
                <div style="min-width:190px; padding:16px 20px; display:flex; align-items:center; justify-content:center; border-right:1px solid rgba(255,255,255,0.04);">
                    <span class="hopn-marquee-item" style="font-size:14px; font-weight:700; color:#475569; white-space:nowrap;">{{ $brand }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</section>

@if($featuredStartups->count() > 0 || $featuredInvestors->count() > 0)
{{-- STARTUP & INVESTOR ECOSYSTEM --}}
<section style="padding:100px 0; background:#050A14; position:relative; overflow:hidden;">
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
                    <span style="font-size:24px;">🚀</span>
                </div>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach($featuredStartups as $startup)
                    <div class="hopn-row-hover" style="display:flex; align-items:center; gap:14px; padding:12px; border-radius:12px;">
                        @if($startup->logo)
                        <img src="{{ $startup->logo }}" alt="{{ $startup->name }}" style="width:40px; height:40px; border-radius:10px; object-fit:cover; background:white; flex-shrink:0;">
                        @else
                        <div style="width:40px; height:40px; border-radius:10px; background:rgba(239,68,68,0.12); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:800; color:#EF4444; flex-shrink:0;">
                            {{ strtoupper(substr($startup->name,0,1)) }}
                        </div>
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
                    <span style="font-size:24px;">💰</span>
                </div>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach($featuredInvestors as $investor)
                    <div class="hopn-row-hover" style="display:flex; align-items:center; gap:14px; padding:12px; border-radius:12px;">
                        @if($investor->logo)
                        <img src="{{ $investor->logo }}" alt="{{ $investor->name }}" style="width:40px; height:40px; border-radius:10px; object-fit:cover; background:white; flex-shrink:0;">
                        @else
                        <div style="width:40px; height:40px; border-radius:10px; background:rgba(6,182,212,0.12); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:800; color:#06B6D4; flex-shrink:0;">
                            {{ strtoupper(substr($investor->name,0,1)) }}
                        </div>
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
<section id="consulting-experts" style="padding:100px 0; background:#050A14;">
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
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#10B981; text-decoration:none;">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in touch @endif →
            </a>
        </div>

        @if(isset($experts) && $experts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @foreach($experts as $expert)
            @php $c = $expert->accent_color ?? '#4F6EF7'; @endphp
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}60,transparent);"></div>
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    @if($expert->photo_url)
                        <img src="{{ $expert->photo_url }}" alt="{{ $expert->name }}"
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
                    <div style="font-size:15px; font-weight:800; color:{{ $c }}; white-space:nowrap;">{{ $expert->hourly_rate }}</div>
                    @endif
                </div>
                @if($expert->tags && count($expert->tags) > 0)
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                    @foreach($expert->tags as $tag)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $c }}12; border:1px solid {{ $c }}25; color:{{ $c }};">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                @if($expert->linkedin_url)
                <a href="{{ $expert->linkedin_url }}" target="_blank"
                   class="hopn-link-fade-in"
                   style="display:inline-block; margin-top:14px; font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none;">LinkedIn →</a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:60px; border:1px solid rgba(255,255,255,0.06); border-radius:16px; background:#0A0F1E;">
            <p style="font-size:15px; color:#94A3B8;">
                @if($lang==='ar') أضف خبراء الاستشارة من لوحة الإدارة.
                @elseif($lang==='de') Beratungsexperten über das Admin-Panel hinzufügen.
                @else Add consulting experts from the Admin Panel → Experts. @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- 9. WORKSHOPS --}}
<section style="padding:100px 0; background:#030712;">
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
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}" class="hopn-link-fade"
               style="font-size:14px; font-weight:600; color:#F59E0B; text-decoration:none;">
                @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
            </a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @php
            $workshops=[
                ['1 '.($lang==='ar'?'يوم':($lang==='de'?'Tag':'day')),
                 $lang==='ar'?'تدريب الذكاء الاصطناعي للشركات':($lang==='de'?'KI-Training für Unternehmen':'AI Training for Companies'),
                 $lang==='ar'?'ورشة استراتيجية الذكاء الاصطناعي':($lang==='de'?'KI-Strategie-Workshop':'AI Strategy Workshop'),
                 $lang==='ar'?'تحديد خرائط طريق الذكاء الاصطناعي وأطر الحوكمة وعائد الاستثمار.':($lang==='de'?'KI-Roadmaps, Governance und ROI-Rahmen definieren.':'Define enterprise AI roadmaps, governance frameworks, and ROI.'),
                 '#4F6EF7'],
                ['3 '.($lang==='ar'?'أيام':($lang==='de'?'Tage':'days')),
                 $lang==='ar'?'تدريب تحليل البيانات':($lang==='de'?'Datenanalyse-Training':'Data Analytics Training'),
                 $lang==='ar'?'معسكر تدريب هندسة البيانات':($lang==='de'?'Data Engineering Bootcamp':'Data Engineering Bootcamp'),
                 $lang==='ar'?'خطوط أنابيب عملية، التخزين، وأسس MLOps.':($lang==='de'?'Praktische Pipelines, Warehousing und MLOps-Grundlagen.':'Hands-on pipelines, warehousing, and MLOps foundations.'),
                 '#10B981'],
                ['2 '.($lang==='ar'?'يومان':($lang==='de'?'Tage':'days')),
                 $lang==='ar'?'ورش التوائم الرقمية':($lang==='de'?'Digital-Twin-Workshops':'Digital Twin Workshops'),
                 $lang==='ar'?'التوأم الرقمي للتصنيع':($lang==='de'?'Digital Twin für Produktion':'Digital Twin for Manufacturing'),
                 $lang==='ar'?'من التجريب إلى الإنتاج في بيئة المصنع.':($lang==='de'?'Vom Piloten zur Produktion in der Fabrik.':'From pilot to production on the factory floor.'),
                 '#8B5CF6'],
            ];
            @endphp
            @foreach($workshops as $ws)
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $ws[4] }},transparent);"></div>
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; flex-wrap:wrap; gap:8px;">
                    <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $ws[4] }}15; color:{{ $ws[4] }}; border:1px solid {{ $ws[4] }}30;">{{ $ws[0] }}</span>
                    <span style="font-size:11px; color:#64748B; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $ws[1] }}</span>
                </div>
                <h3 style="font-size:18px; font-weight:800; color:white; letter-spacing:-0.3px; margin:0 0 10px; line-height:1.3;">{{ $ws[2] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7; margin:0 0 20px;">{{ $ws[3] }}</p>
                <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; font-weight:600; color:{{ $ws[4] }}; text-decoration:none;">
                    @if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                </a>
            </div>
            @endforeach
        </div>
        <div style="display:flex; gap:14px; margin-top:32px; flex-wrap:wrap;">
            <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
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

{{-- 10. EVENTS --}}
<section style="padding:100px 0; background:#050A14;">
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
            @php $typeColors=['conference'=>'#4F6EF7','workshop'=>'#10B981','webinar'=>'#06B6D4','hackathon'=>'#8B5CF6','startup'=>'#F59E0B','networking'=>'#EF4444','research'=>'#A855F7']; $c=$typeColors[$event->type]??'#F59E0B'; @endphp
            <div class="hopn-lift-card-nobg" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; overflow:hidden;">
                <div style="height:3px; background:linear-gradient(90deg, {{ $c }}, transparent);"></div>
                <div style="padding:24px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                        <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase;">{{ ucfirst($event->type) }}</span>
                        @if($event->date)<span style="font-size:12px; color:#94A3B8;">{{ $event->date->format('d M Y') }}</span>@endif
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">{{ $event->title }}</h3>
                    @if($event->location)<div style="font-size:13px; color:#94A3B8; margin-bottom:16px;">📍 {{ $event->location }}</div>@endif
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

{{-- 11. NEWSROOM --}}
<section style="padding:100px 0; background:#030712;">
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
        @if($latestPosts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:16px;">
            @foreach($latestPosts as $post)
            @php $c=['#4F6EF7','#10B981','#8B5CF6'][$loop->index%3]; @endphp
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
        @else
        <div style="text-align:center; padding:48px; color:#64748B;">
            <p>@if($lang==='ar') الأخبار قادمة قريباً @elseif($lang==='de') Neuigkeiten folgen in Kürze @else Latest news coming soon @endif</p>
        </div>
        @endif
    </div>
</section>

{{-- 12. TESTIMONIALS --}}
@if($testimonials->count() > 0)
<section style="padding:100px 0; background:#050A14;">
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
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; bottom:0; left:0; width:500px; height:500px; background:radial-gradient(circle, rgba(16,185,129,0.06) 0%, transparent 70%); pointer-events:none;"></div>
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
                ['icon'=>'🌍','title'=>$lang==='ar'?'فرق عن بُعد':($lang==='de'?'Remote-Teams':'Remote Teams'),'desc'=>$lang==='ar'?'فرق مُدارة بالكامل من المهندسين وعلماء البيانات':($lang==='de'?'Vollständig verwaltete Remote-Teams':'Fully managed remote teams of engineers'),'color'=>'#4F6EF7'],
                ['icon'=>'🏢','title'=>$lang==='ar'?'التوظيف المحلي':($lang==='de'?'Lokale Einstellung':'Local Hiring'),'desc'=>$lang==='ar'?'توظيف في الموقع عبر ألمانيا وأوروبا':($lang==='de'?'Vor-Ort-Talente in Deutschland':'On-site talent across Germany'),'color'=>'#10B981'],
                ['icon'=>'🤖','title'=>$lang==='ar'?'خبراء تقنيون':($lang==='de'?'Tech-Experten':'Technical Experts'),'desc'=>$lang==='ar'?'متخصصون في الذكاء الاصطناعي والبيانات والروبوتيكا':($lang==='de'?'KI-, Daten- und Robotik-Spezialisten':'AI, data, and robotics specialists'),'color'=>'#8B5CF6'],
                ['icon'=>'👥','title'=>$lang==='ar'?'فرق مخصصة':($lang==='de'?'Dedizierte Teams':'Dedicated Teams'),'desc'=>$lang==='ar'?'فرق تطوير طويلة الأجل مدمجة في مؤسستك':($lang==='de'?'Langfristige Teams in Ihrer Organisation':'Long-term teams in your organization'),'color'=>'#F59E0B'],
            ];
            @endphp
            @foreach($talentItems as $item)
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg, transparent, {{ $item['color'] }}40, transparent);"></div>
                <div style="font-size:32px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item['title'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;">
            <a href="{{ route('careers.index', ['lang'=>$lang]) }}"
               class="hopn-btn-primary-green"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 36px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(16,185,129,0.3);">
                @if($lang==='ar') عرض الوظائف المفتوحة @elseif($lang==='de') Offene Stellen ansehen @else View Open Positions @endif →
            </a>
        </div>
    </div>
</section>

{{-- 14. FINAL CTA --}}
<section style="padding:120px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>
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
               style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#4F6EF7; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.4);">
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
</script>
@endpush

</x-layouts.public>
