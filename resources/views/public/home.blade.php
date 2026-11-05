@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'HOPn — Applied Research and Engineering'">

<style>
@keyframes heroFadeUp { from{opacity:0; transform:translateY(18px);} to{opacity:1; transform:translateY(0);} }

/* Hero: one proposition, one audience, one clear action. */
.hopn-hero-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:56px; align-items:center; text-align:center; max-width:860px; }
.hopn-hero-title { font-size:clamp(38px,6.5vw,84px); margin:0 auto 28px; max-width:960px; }
.hopn-hero-lead { font-size:clamp(16px,2.2vw,20px); max-width:640px; margin:0 auto 48px; }
.hopn-hero-actions { justify-content:center; margin-bottom:72px; }
@media (min-width:1080px) {
    .hopn-hero-grid { text-align:start; padding-top:88px !important; padding-bottom:72px !important; }
    .hopn-hero-title { font-size:clamp(40px,5.6vw,78px); margin:0 0 26px; max-width:900px; letter-spacing:-2px !important; }
    .hopn-hero-lead { max-width:600px; margin:0 0 40px; }
    .hopn-hero-actions { justify-content:flex-start; margin-bottom:48px; }
}
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
html[data-theme="light"] .hopn-homepage .hopn-industry-card > div[aria-hidden="true"] { width:100% !important; height:130px !important; border-radius:10px !important; margin-bottom:18px !important; }
html[data-theme="light"] .hopn-homepage .hopn-industry-card img { width:100% !important; height:130px !important; border-radius:10px !important; margin-bottom:18px !important; }
html[data-theme="light"] .hopn-homepage .hopn-partner-card { border-color:#D7DEE3 !important; }
html[data-theme="light"] .hopn-homepage .hopn-hero-in { animation:none; opacity:1; }
@media (max-width:640px) {
    html[data-theme="light"] .hopn-homepage .hopn-industry-card { min-height:165px; padding:24px 14px !important; }
    html[data-theme="light"] .hopn-homepage .hopn-industry-card img,
    html[data-theme="light"] .hopn-homepage .hopn-industry-card > div[aria-hidden="true"] { width:100% !important; height:100px !important; }
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

/* Public homepage: restrained research institute presentation. */
.hopn-homepage {
    --hopn-ink:#172331;
    --hopn-muted:#526170;
    --hopn-paper:#F7F8F5;
    --hopn-panel:#FFFFFF;
    --hopn-line:#D7DEE3;
    --hopn-accent:#245B78;
    background:var(--hopn-paper);
    color:var(--hopn-ink);
}
html[data-theme="dark"] .hopn-homepage {
    --hopn-ink:#F1F5F9;
    --hopn-muted:#CBD5E1;
    --hopn-paper:#030712;
    --hopn-panel:#0A0F1E;
    --hopn-line:rgba(255,255,255,.12);
    --hopn-accent:#8FB8CC;
}
html[data-theme="dark"] .hopn-homepage section,
html[data-theme="dark"] .hopn-homepage section.homepage-secondary,
html[data-theme="dark"] .hopn-homepage .hopn-partners { background:var(--hopn-paper) !important; color:var(--hopn-ink); }
html[data-theme="dark"] .hopn-homepage [style*="background:#030712"],
html[data-theme="dark"] .hopn-homepage [style*="background:#050A14"] { background:var(--hopn-paper) !important; }
html[data-theme="dark"] .hopn-homepage [style*="background:#0A0F1E"],
html[data-theme="dark"] .hopn-homepage [style*="background:#0D1425"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.02)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.03)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.04)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.05)"] { background:var(--hopn-panel) !important; }
html[data-theme="dark"] .hopn-homepage [style*="color:white"],
html[data-theme="dark"] .hopn-homepage [style*="color:#CBD5E1"],
html[data-theme="dark"] .hopn-homepage [style*="color:#94A3B8"],
html[data-theme="dark"] .hopn-homepage [style*="color:#E2E8F0"] { color:var(--hopn-ink) !important; }
html[data-theme="dark"] .hopn-homepage [style*="color:#64748B"] { color:var(--hopn-muted) !important; }
html[data-theme="dark"] .hopn-homepage .hopn-hero-title span { color:var(--hopn-ink) !important; -webkit-text-fill-color:var(--hopn-ink) !important; }
html[data-theme="dark"] .hopn-homepage .hopn-hero-title span:last-child { color:var(--hopn-accent) !important; -webkit-text-fill-color:var(--hopn-accent) !important; }
html[data-theme="dark"] .hopn-homepage .hopn-btn-secondary,
html[data-theme="dark"] .hopn-homepage .hopn-btn-outline-blue,
html[data-theme="dark"] .hopn-homepage .hopn-btn-outline-purple,
html[data-theme="dark"] .hopn-homepage .hopn-btn-outline-amber,
html[data-theme="dark"] .hopn-homepage .hopn-btn-outline-neutral,
html[data-theme="dark"] .hopn-homepage .hopn-btn-outline-neutral2 { border-color:#8FB8CC !important; color:#8FB8CC !important; }
.hopn-hero-figure { position:relative; min-height:340px; border:1px solid var(--hopn-line); background:var(--hopn-panel); overflow:hidden; padding:28px; }
.hopn-hero-figure::before,
.hopn-hero-figure::after { content:''; position:absolute; border:1px solid #9FB5C0; border-radius:50%; opacity:.55; pointer-events:none; }
.hopn-hero-figure::before { width:145%; height:58%; left:-20%; top:20%; transform:rotate(-18deg); animation:hopnHeroOrbit 20s ease-in-out infinite; }
.hopn-hero-figure::after { width:120%; height:85%; left:-10%; top:8%; transform:rotate(25deg); animation:hopnHeroOrbit 25s ease-in-out infinite reverse; }
.hopn-hero-figure-content { position:relative; z-index:1; height:100%; display:flex; flex-direction:column; justify-content:space-between; }
.hopn-hero-figure-line { height:1px; background:var(--hopn-accent); opacity:.7; }
.hopn-hero-figure-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; align-items:end; height:150px; }
.hopn-hero-figure-grid span { display:block; border:1px solid var(--hopn-line); background:var(--hopn-surface-tint,#EEF3F5); min-height:38px; }
.hopn-hero-figure-grid span:nth-child(2) { min-height:82px; }
.hopn-hero-figure-grid span:nth-child(3) { min-height:120px; background:var(--hopn-accent); opacity:.8; }
@keyframes hopnHeroOrbit { 0%,100% { transform:rotate(-18deg) translate(0,0); } 50% { transform:rotate(-12deg) translate(10px,8px); } }
html[data-theme="dark"] .hopn-hero-figure-grid span { background:#111827; }
html[data-theme="dark"] .hopn-hero-figure-grid span:nth-child(3) { background:#245B78; }
@media (prefers-reduced-motion: reduce) { .hopn-hero-figure::before, .hopn-hero-figure::after { animation:none; } }
.hopn-hero-section { isolation:isolate; }
.hopn-hero-field { position:absolute; z-index:0; width:72vw; height:110%; right:-12vw; top:-8%; pointer-events:none; opacity:.72; transform:rotate(-12deg); }
.hopn-hero-field i { position:absolute; display:block; width:100%; height:58%; left:0; border:1px solid #9FB5C0; border-radius:50%; transform:rotate(18deg); animation:hopnFieldSweep 22s ease-in-out infinite; }
.hopn-hero-field i:nth-child(1) { top:0; }
.hopn-hero-field i:nth-child(2) { top:13%; transform:rotate(21deg) scale(1.05); animation-delay:-5s; }
.hopn-hero-field i:nth-child(3) { top:28%; transform:rotate(24deg) scale(1.12); border-color:#6D9AAE; animation-delay:-10s; }
.hopn-hero-field::before,
.hopn-hero-field::after { content:''; position:absolute; display:block; width:90%; height:48%; left:8%; border:1px solid #B9CBD2; border-radius:50%; transform:rotate(-24deg); }
.hopn-hero-field::before { top:42%; }
.hopn-hero-field::after { top:55%; transform:rotate(-28deg) scale(1.08); }
@keyframes hopnFieldSweep { 0%,100% { translate:0 0; } 50% { translate:-18px 12px; } }
html[data-theme="dark"] .hopn-hero-field { opacity:.42; }
html[data-theme="dark"] .hopn-hero-field i { border-color:#557A89; }
html[data-theme="dark"] .hopn-hero-field i:nth-child(3) { border-color:#8FB8CC; }
html[data-theme="dark"] .hopn-hero-field::before,
html[data-theme="dark"] .hopn-hero-field::after { border-color:#44616D; }
@media (max-width:760px) { .hopn-hero-field { width:125vw; right:-48vw; opacity:.42; } }
@media (prefers-reduced-motion: reduce) { .hopn-hero-field i { animation:none; } }
.hopn-homepage section,
.hopn-homepage section.homepage-secondary,
.hopn-homepage .hopn-partners { background:var(--hopn-paper) !important; color:var(--hopn-ink); }
.hopn-homepage section:first-child { min-height:min(760px, calc(100vh - 60px)) !important; border-bottom:1px solid var(--hopn-line); }
.hopn-homepage section:first-child .container-shell { padding-top:72px !important; padding-bottom:72px !important; }
.hopn-homepage h1,
.hopn-homepage h2,
.hopn-homepage h3,
.hopn-homepage h4 { color:var(--hopn-ink) !important; letter-spacing:-.02em !important; text-shadow:none !important; }
.hopn-homepage h1,
.hopn-homepage h2 { font-family:Georgia,'Times New Roman',serif !important; font-weight:600 !important; }
.hopn-homepage p { color:var(--hopn-muted) !important; }
.hopn-homepage section > .container-shell { position:relative; }
.hopn-homepage section > .container-shell::before { content:''; position:absolute; top:0; left:16px; right:16px; border-top:1px solid var(--hopn-line); opacity:.65; }
.hopn-homepage section:first-child > .container-shell::before { display:none; }
.hopn-homepage [style*="background:#030712"],
.hopn-homepage [style*="background:#050A14"],
.hopn-homepage [style*="background:#0A0F1E"],
.hopn-homepage [style*="background:#0D1425"],
.hopn-homepage [style*="background:rgba(255,255,255,0.02)"],
.hopn-homepage [style*="background:rgba(255,255,255,0.03)"],
.hopn-homepage [style*="background:rgba(255,255,255,0.04)"],
.hopn-homepage [style*="background:rgba(255,255,255,0.05)"] { background:var(--hopn-panel) !important; }
.hopn-homepage [style*="border-color:rgba(255,255,255"],
.hopn-homepage [style*="border:1px solid rgba(255,255,255"],
.hopn-homepage [style*="border-top:1px solid rgba(255,255,255"],
.hopn-homepage [style*="border-bottom:1px solid rgba(255,255,255"] { border-color:var(--hopn-line) !important; }
.hopn-homepage [style*="color:white"],
.hopn-homepage [style*="color:#CBD5E1"],
.hopn-homepage [style*="color:#94A3B8"],
.hopn-homepage [style*="color:#E2E8F0"] { color:var(--hopn-ink) !important; }
.hopn-homepage [style*="color:#64748B"] { color:var(--hopn-muted) !important; }
.hopn-homepage .hopn-lift-card:hover,
.hopn-homepage .hopn-lift-card-nobg:hover,
.hopn-homepage .hopn-product-card:hover,
.hopn-homepage .hopn-service-card:hover,
.hopn-homepage .hopn-industry-card:hover,
.hopn-homepage .hopn-domain-link:hover { transform:translateY(-3px); border-color:#9FB5C0 !important; box-shadow:0 10px 24px rgba(23,35,49,.08); }
.hopn-homepage .hopn-partner-track { animation:none !important; width:auto !important; flex-wrap:wrap; justify-content:center; }
.hopn-homepage .hopn-partner-copy { display:none; }
.hopn-homepage .hopn-partner-item { min-width:180px; border-radius:0; background:var(--hopn-panel) !important; }
.hopn-homepage .hopn-hero-title span { color:var(--hopn-ink) !important; -webkit-text-fill-color:var(--hopn-ink) !important; }
.hopn-homepage .hopn-hero-title span:last-child { color:var(--hopn-accent) !important; -webkit-text-fill-color:var(--hopn-accent) !important; }
.hopn-homepage .hopn-hero-lead { max-width:560px; }
.hopn-homepage .hopn-btn-primary,
.hopn-homepage .hopn-btn-primary-green { border-radius:2px !important; background:var(--hopn-accent) !important; box-shadow:none !important; }
.hopn-homepage .hopn-btn-secondary,
.hopn-homepage .hopn-btn-outline-blue,
.hopn-homepage .hopn-btn-outline-purple,
.hopn-homepage .hopn-btn-outline-amber,
.hopn-homepage .hopn-btn-outline-neutral,
.hopn-homepage .hopn-btn-outline-neutral2 { border-radius:2px !important; background:transparent !important; border-color:var(--hopn-accent) !important; color:var(--hopn-accent) !important; }
.hopn-field-card { position:relative; overflow:hidden; border:1px solid var(--hopn-line); background:var(--hopn-panel); transition:transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.hopn-field-card::before,
.hopn-field-card::after { content:''; position:absolute; pointer-events:none; border:1px solid #B9CBD2; border-radius:50%; opacity:.55; }
.hopn-field-card::before { width:150%; height:86%; left:-25%; top:8%; transform:rotate(-18deg); animation:hopnFieldDrift 18s ease-in-out infinite; }
.hopn-field-card::after { width:125%; height:110%; left:-12%; top:-8%; transform:rotate(26deg); animation:hopnFieldDrift 23s ease-in-out infinite reverse; }
.hopn-field-card:hover { transform:translateY(-4px); border-color:#8FAAB6; box-shadow:0 16px 30px rgba(23,35,49,.09); }
.hopn-field-content { position:relative; z-index:1; }
.hopn-field-photo { width:96px; height:96px; object-fit:cover; border-radius:50%; border:1px solid #9FB5C0; display:block; }
@keyframes hopnFieldDrift { 0%,100% { margin-left:0; margin-top:0; } 50% { margin-left:10px; margin-top:7px; } }
@media (prefers-reduced-motion: reduce) {
    .hopn-field-card::before, .hopn-field-card::after { animation:none; }
    .hopn-field-card:hover { transform:none; box-shadow:none; }
}
@media (max-width:700px) {
    .hopn-homepage section:first-child { min-height:auto !important; }
    .hopn-homepage section:first-child .container-shell { padding-top:56px !important; padding-bottom:56px !important; }
}
@media (min-width:1080px) {
    .hopn-hero-grid { grid-template-columns:minmax(0,1.08fr) minmax(320px,.72fr); gap:72px; max-width:1180px; }
}
@media (prefers-reduced-motion: reduce) {
    .hopn-homepage .hopn-lift-card:hover,
    .hopn-homepage .hopn-lift-card-nobg:hover,
    .hopn-homepage .hopn-product-card:hover,
    .hopn-homepage .hopn-service-card:hover,
    .hopn-homepage .hopn-industry-card:hover,
    .hopn-homepage .hopn-domain-link:hover { transform:none; box-shadow:none; }
}
html[data-theme="dark"] .hopn-homepage,
html[data-theme="dark"] .hopn-homepage section,
html[data-theme="dark"] .hopn-homepage section.homepage-secondary,
html[data-theme="dark"] .hopn-homepage .hopn-partners { background:#030712 !important; color:#F1F5F9 !important; }
html[data-theme="dark"] .hopn-homepage [style*="background:#0A0F1E"],
html[data-theme="dark"] .hopn-homepage [style*="background:#0D1425"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.02)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.03)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.04)"],
html[data-theme="dark"] .hopn-homepage [style*="background:rgba(255,255,255,0.05)"] { background:#0A0F1E !important; }
html[data-theme="dark"] .hopn-homepage h1,
html[data-theme="dark"] .hopn-homepage h2,
html[data-theme="dark"] .hopn-homepage h3,
html[data-theme="dark"] .hopn-homepage h4,
html[data-theme="dark"] .hopn-homepage [style*="color:white"],
html[data-theme="dark"] .hopn-homepage [style*="color:#CBD5E1"],
html[data-theme="dark"] .hopn-homepage [style*="color:#94A3B8"] { color:#F1F5F9 !important; }
html[data-theme="dark"] .hopn-homepage p { color:#CBD5E1 !important; }
html[data-theme="dark"] .hopn-homepage .hopn-hero-title span { color:#F1F5F9 !important; -webkit-text-fill-color:#F1F5F9 !important; }
html[data-theme="dark"] .hopn-homepage .hopn-hero-title span:last-child { color:#8FB8CC !important; -webkit-text-fill-color:#8FB8CC !important; }
.hopn-strategy-card { position:relative; min-height:390px; overflow:hidden; background:var(--hopn-panel); border:1px solid var(--hopn-line); transition:transform .35s ease, box-shadow .35s ease, border-color .35s ease; }
.hopn-strategy-card:hover { transform:translateY(-8px); border-color:#8FAAB6; box-shadow:0 20px 36px rgba(23,35,49,.14); }
.hopn-strategy-media { height:168px; position:relative; overflow:hidden; background:#EEF3F5; }
.hopn-strategy-media::after { content:''; position:absolute; top:-20%; bottom:-20%; left:18%; width:2px; background:#245B78; opacity:.5; transform:translateX(-80px) rotate(16deg); transition:transform .8s ease; }
.hopn-strategy-card:hover .hopn-strategy-media::after { transform:translateX(220px) rotate(16deg); }
.hopn-strategy-media img { width:100%; height:100%; object-fit:cover; display:block; filter:saturate(.75) contrast(1.02); transition:transform .6s ease, filter .6s ease; }
.hopn-strategy-card:hover .hopn-strategy-media img { transform:scale(1.06); filter:saturate(.95) contrast(1.04); }
.hopn-strategy-card:hover .hopn-strategy-rule { transform:scaleX(1.18); }
.hopn-strategy-fallback { position:absolute; inset:18px; border:1px solid rgba(36,91,120,.25); }
.hopn-strategy-fallback::before,
.hopn-strategy-fallback::after { content:''; position:absolute; border:1px solid rgba(36,91,120,.3); border-radius:50%; }
.hopn-strategy-fallback::before { width:125%; height:65%; left:-12%; top:14%; transform:rotate(-15deg); }
.hopn-strategy-fallback::after { width:110%; height:85%; left:-5%; top:0; transform:rotate(18deg); }
html[data-theme="dark"] .hopn-strategy-media { background:#111827; }
html[data-theme="dark"] .hopn-strategy-fallback { border-color:rgba(143,184,204,.3); }
html[data-theme="dark"] .hopn-strategy-fallback::before,
html[data-theme="dark"] .hopn-strategy-fallback::after { border-color:rgba(143,184,204,.35); }
@media (prefers-reduced-motion: reduce) { .hopn-strategy-card:hover { transform:none; box-shadow:none; } .hopn-strategy-card:hover .hopn-strategy-media img { transform:none; } .hopn-strategy-media::after { display:none; } }
.hopn-architecture-stage { position:relative; border:1px solid var(--hopn-line); padding:28px; background:var(--hopn-panel); overflow:hidden; }
.hopn-architecture-stage::before,
.hopn-architecture-stage::after { content:''; position:absolute; border:1px solid #B9CBD2; border-radius:50%; pointer-events:none; opacity:.42; }
.hopn-architecture-stage::before { width:125%; height:58%; left:-12%; top:20%; transform:rotate(-9deg); animation:hopnStageDrift 24s ease-in-out infinite; }
.hopn-architecture-stage::after { width:112%; height:76%; left:-6%; top:8%; transform:rotate(14deg); animation:hopnStageDrift 30s ease-in-out infinite reverse; }
.hopn-architecture-stage > * { position:relative; z-index:1; }
@keyframes hopnStageDrift { 0%,100% { translate:0 0; } 50% { translate:10px 6px; } }
html[data-theme="dark"] .hopn-architecture-stage { background:#0A0F1E; }
@media (prefers-reduced-motion: reduce) { .hopn-architecture-stage::before, .hopn-architecture-stage::after { animation:none; } }
.hopn-homepage .homepage-secondary,
.hopn-homepage .hopn-partners { position:relative; overflow:hidden; }
.hopn-homepage > section:not(:first-child) { position:relative; overflow:hidden; }
.hopn-homepage > section:not(:first-child)::after { content:''; position:absolute; width:58vw; height:26vw; right:-20vw; bottom:-12vw; border:1px solid rgba(159,181,192,.35); border-radius:50%; transform:rotate(-18deg); pointer-events:none; animation:hopnSectionContour 26s ease-in-out infinite; }
.hopn-homepage .homepage-secondary > .container-shell,
.hopn-homepage .hopn-partners > .container-shell,
.hopn-homepage > section:not(:first-child) > .container-shell { position:relative; z-index:1; }
html[data-theme="dark"] .hopn-homepage .homepage-secondary::after,
html[data-theme="dark"] .hopn-homepage > section:not(:first-child)::after { border-color:rgba(143,184,204,.18); }
@keyframes hopnSectionContour { 0%,100% { transform:rotate(-18deg) translate(0,0); } 50% { transform:rotate(-13deg) translate(-18px,-8px); } }
@media (prefers-reduced-motion: reduce) { .hopn-homepage > section:not(:first-child)::after { animation:none; } }
.hopn-expert-book { transition:background-color .25s ease, transform .25s ease, box-shadow .25s ease; }
.hopn-expert-book:hover { background:#1D4D66 !important; transform:translateY(-3px); box-shadow:0 10px 20px rgba(36,91,120,.2); }
</style>

<div class="hopn-homepage">

{{-- 1. HERO --}}
@php
    $hxArt = function ($text, $i = 0) {
        $map = [
            ['/twin|digital/i', 'digital-twin'], ['/robot|automation/i', 'robotics'], ['/\bai\b|artificial|machine|data|intellig/i', 'ai'],
            ['/consult|strateg|govern|advis/i', 'consulting'], ['/research|science|academ|univers/i', 'research'],
            ['/talent|hiring|career|recruit|people/i', 'talent'], ['/train|educat|learn|skill|workshop|course/i', 'education'],
            ['/startup|invest|venture|capital|fund/i', 'startups'], ['/health|medic|pharma|care/i', 'health'],
            ['/energy|utilit|power|grid/i', 'energy'], ['/manufact|industr|engineer|factory|product/i', 'manufacturing'],
            ['/mobil|auto|transport|logist|vehicle/i', 'mobility'], ['/financ|bank|business|insur/i', 'business'],
            ['/lab|innovat/i', 'lab'], ['/event|conference|summit/i', 'events'], ['/news|insight|blog|report/i', 'insights'],
        ];
        $t = (string) $text;
        foreach ($map as $row) { if (preg_match($row[0], $t)) { return $row[1]; } }
        $fallback = ['ai', 'research', 'digital-twin', 'consulting', 'lab', 'business'];
        return $fallback[((int) $i) % count($fallback)];
    };
    $hxPhotos = ['ai'=>'ai','consulting'=>'consulting','business'=>'business','education'=>'education','research'=>'research','talent'=>'talent','lab'=>'innovation-lab','digital-twin'=>'technology','robotics'=>'technical-experts','startups'=>'growth','insights'=>'tablet'];
    $hxImg = function ($key) use ($hxPhotos) {
        return isset($hxPhotos[$key]) ? '/images/photos/' . $hxPhotos[$key] . '.jpg' : '/images/illustrations/' . $key . '.svg';
    };
    $hxVideo = function ($name) {
        return '<video class="hx-bgvideo" autoplay muted loop playsinline preload="auto" poster="/videos/' . $name . '.jpg" aria-hidden="true" tabindex="-1" disablepictureinpicture><source src="/videos/' . $name . '.mp4" type="video/mp4"></video><div class="hx-scrim" aria-hidden="true"></div>';
    };
@endphp
<section class="hx-hero hx-host hopn-hero-section">

    {!! $hxVideo('data-dashboard') !!}
    <div class="hopn-hero-field" aria-hidden="true"><i></i><i></i><i></i></div>

    <div class="container-shell hx-hero-grid">
      <div class="hopn-hero-text">
        <div class="hopn-hero-in hopn-hero-in-1 hx-badge">
            <i aria-hidden="true"></i>
            <span>
                @if($lang==='ar') مركز ابتكار يربط الأعمال والتعليم والبحث
                @elseif($lang==='de') Innovationsplattform für Wirtschaft, Bildung und Forschung
                @else Innovation hub for business, education and research @endif
            </span>
        </div>

        <h1 class="hopn-hero-in hopn-hero-in-2 hx-h1">
            @if($lang==='ar')
                <span>من البحث التطبيقي</span><br>
                <span class="hx-em">إلى أنظمة تعمل في الواقع.</span>
            @elseif($lang==='de')
                <span>Forschung, die in</span><br>
                <span class="hx-em">der Praxis ankommt.</span>
            @else
                <span>Research that becomes</span><br>
                <span class="hx-em">working practice.</span>
            @endif
        </h1>

        <p class="hopn-hero-in hopn-hero-in-3 hx-lead">
            @if($lang==='ar') تعمل HOPn مع المؤسسات في البحث التطبيقي والهندسة والحوكمة والتنفيذ، وتحول الأسئلة التقنية المعقدة إلى برامج وأنظمة عملية.
            @elseif($lang==='de') HOPn arbeitet mit Organisationen an angewandter Forschung, Engineering, Governance und Umsetzung. Aus komplexen technischen Fragen werden klare Programme und funktionierende Systeme.
            @else HOPn works with organisations on applied research, engineering, governance, and implementation. We turn complex technical questions into clear programmes and working systems. @endif
        </p>

        <div class="hopn-hero-in hopn-hero-in-4 hx-actions">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hx-btn hx-btn-solid hopn-btn-primary">
                @if($lang==='ar') احجز مكالمة @elseif($lang==='de') Gespräch buchen @else Book a Call @endif
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('services.index', ['lang'=>$lang]) }}" class="hx-btn hx-btn-ghost hopn-btn-secondary">
                @if($lang==='ar') استكشف أعمالنا @elseif($lang==='de') Unsere Arbeit entdecken @else Explore our work @endif
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
        <div class="hopn-hero-in hopn-hero-in-5 hx-stats">
            @foreach($homeStats as $stat)
            <div>
                <b>{{ $stat[0] }}</b>
                <small>{{ $stat[1] }}</small>
            </div>
            @endforeach
        </div>
        @endif
        @endif
      </div>

      <div class="hx-scene hopn-hero-in hopn-hero-in-4" role="img" aria-label="@if($lang==='ar') طبقات الأعمال والتعليم والبحث متصلة بمنصة واحدة @elseif($lang==='de') Wirtschaft, Bildung und Forschung als verbundene Ebenen einer Plattform @else Business, education and research as connected layers of one platform @endif">
          <div class="hx-stage" aria-hidden="true">
              <div class="hx-plate hx-p1">
                  <svg viewBox="0 0 290 290" fill="none">
                      <g stroke="#9FE0F2" stroke-opacity=".7" stroke-width="1.4"><path d="M40 220 L110 170 L170 205 L250 120"/><path d="M60 80 L110 170 M170 205 L190 250"/></g>
                      <g fill="#fff"><circle cx="40" cy="220" r="6"/><circle cx="110" cy="170" r="7"/><circle cx="170" cy="205" r="6"/><circle cx="250" cy="120" r="7"/><circle cx="60" cy="80" r="5"/><circle cx="190" cy="250" r="5"/></g>
                  </svg>
              </div>
              <div class="hx-plate hx-p2">
                  <svg viewBox="0 0 290 290" fill="none">
                      <g stroke="#fff" stroke-opacity=".55" stroke-width="1.4"><rect x="50" y="60" width="70" height="70" rx="8"/><rect x="160" y="60" width="70" height="70" rx="8"/><rect x="105" y="160" width="80" height="70" rx="8"/><path d="M120 95 H160 M85 130 L120 160 M195 130 L170 160"/></g>
                  </svg>
              </div>
              <div class="hx-plate hx-p3">
                  <svg viewBox="0 0 290 290" fill="none">
                      <g stroke="#fff" stroke-opacity=".7" stroke-width="1.4"><circle cx="145" cy="145" r="52"/><circle cx="145" cy="145" r="96" stroke-dasharray="3 7"/><path d="M145 49 V93 M145 197 V241 M49 145 H93 M197 145 H241"/></g>
                      <g fill="#fff" class="hx-pulse"><circle cx="145" cy="49" r="6"/><circle cx="145" cy="241" r="6"/><circle cx="49" cy="145" r="6"/><circle cx="241" cy="145" r="6"/></g>
                  </svg>
              </div>
              <div class="hx-beam"></div>
              <div class="hx-core"></div>
          </div>
          <div class="hx-chips" aria-hidden="true">
              <div class="hx-chip hx-chip-1"><i></i><span>@if($lang==='ar') البحث @elseif($lang==='de') Forschung @else Research @endif</span></div>
              <div class="hx-chip hx-chip-2"><i></i><span>@if($lang==='ar') التعليم @elseif($lang==='de') Bildung @else Education @endif</span></div>
              <div class="hx-chip hx-chip-3"><i></i><span>@if($lang==='ar') الأعمال @elseif($lang==='de') Wirtschaft @else Business @endif</span></div>
          </div>
      </div>

    </div>
</section>

{{-- 1b. POSITIONING: business / education / research --}}
<section class="hx-sec">
    <div class="container-shell">
        <div class="hx-head hx-split hopn-reveal">
            <div>
                <div class="hx-eyebrow"><span>@if($lang==='ar') من نحن @elseif($lang==='de') Wer wir sind @else Who we are @endif</span></div>
                <h2 class="hx-h2">
                    @if($lang==='ar') منصة ابتكار تقني عميق تربط الأعمال والتعليم والبحث.
                    @elseif($lang==='de') Eine Deep-Tech-Innovationsplattform für Wirtschaft, Bildung und Forschung.
                    @else A deep-tech innovation platform connecting business, education and research. @endif
                </h2>
            </div>
            <p class="hx-sub">
                @if($lang==='ar') نبني ونوسّع حلول الذكاء الاصطناعي ومنتجات البيانات وأنظمة التوأم الرقمي والروبوتات مع المؤسسات والجامعات وشركاء البحث، ونطوّر المواهب ومنظومات الابتكار التي تُبقيها قيد العمل.
                @elseif($lang==='de') Gemeinsam mit Unternehmen, Hochschulen und Forschungspartnern entwickeln und skalieren wir KI-Lösungen, Datenprodukte, Digital-Twin-Systeme und Robotik – und bauen die Talente und Ökosysteme auf, die sie tragen.
                @else We build and scale AI solutions, data products, digital twin systems and robotics with organisations, universities and research partners, and develop the talent and ecosystems that keep them running. @endif
            </p>
        </div>

        <div class="hx-grid-3 hopn-reveal">
            <a class="hx-card" href="{{ route('services.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/business.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <div class="hx-num">01</div>
                    <h3 class="hx-h3">@if($lang==='ar') الأعمال @elseif($lang==='de') Wirtschaft @else Business @endif</h3>
                    <p class="hx-p">
                        @if($lang==='ar') استشارات وتنفيذ للمؤسسات والشركات المتوسطة: الاستراتيجية والمنصات ونتائج تشغيلية قابلة للقياس.
                        @elseif($lang==='de') Beratung und Umsetzung für Konzerne und Mittelstand: Strategie, Plattformen und messbare operative Ergebnisse.
                        @else Consulting and implementation for enterprises and SMEs: strategy, platforms and measurable operational results. @endif
                    </p>
                    <span class="hx-more">@if($lang==='ar') خدماتنا @elseif($lang==='de') Unsere Leistungen @else Our services @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
            <a class="hx-card" href="{{ route('training.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/education.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <div class="hx-num">02</div>
                    <h3 class="hx-h3">@if($lang==='ar') التعليم @elseif($lang==='de') Bildung @else Education @endif</h3>
                    <p class="hx-p">
                        @if($lang==='ar') تدريب وورش عمل وبرامج تنقل الفرق من الوعي إلى قدرة عملية قائمة.
                        @elseif($lang==='de') Trainings, Workshops und Programme, die Teams vom Bewusstsein zur belastbaren Handlungsfähigkeit führen.
                        @else Training, workshops and programmes that move teams from awareness to working capability. @endif
                    </p>
                    <span class="hx-more">@if($lang==='ar') التدريب والبرامج @elseif($lang==='de') Training &amp; Programme @else Training &amp; programmes @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
            <a class="hx-card" href="{{ route('research.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/research.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <div class="hx-num">03</div>
                    <h3 class="hx-h3">@if($lang==='ar') البحث @elseif($lang==='de') Forschung @else Research @endif</h3>
                    <p class="hx-p">
                        @if($lang==='ar') تعاون بحثي تطبيقي مع الجامعات والمعاهد، يتحول إلى نماذج أولية وأنظمة قابلة للنشر.
                        @elseif($lang==='de') Angewandte Forschungskooperationen mit Hochschulen und Instituten, überführt in Prototypen und einsetzbare Systeme.
                        @else Applied research collaboration with universities and institutes, translated into prototypes and deployable systems. @endif
                    </p>
                    <span class="hx-more">@if($lang==='ar') البحث @elseif($lang==='de') Forschung ansehen @else View research @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
        </div>

        <div class="hx-chipset hopn-reveal">
            <span>@if($lang==='ar') حلول الذكاء الاصطناعي @elseif($lang==='de') KI-Lösungen @else AI solutions @endif</span>
            <span>@if($lang==='ar') منتجات البيانات @elseif($lang==='de') Datenprodukte @else Data products @endif</span>
            <span>@if($lang==='ar') أنظمة التوأم الرقمي @elseif($lang==='de') Digital-Twin-Systeme @else Digital twin systems @endif</span>
            <span>@if($lang==='ar') الروبوتات والتقنيات المتقدمة @elseif($lang==='de') Robotik &amp; Spitzentechnologien @else Robotics &amp; advanced technologies @endif</span>
            <span>@if($lang==='ar') المواهب ومنظومات الابتكار @elseif($lang==='de') Talente &amp; Innovationsökosysteme @else Talent &amp; innovation ecosystems @endif</span>
        </div>
    </div>
</section>

{{-- 1c. ONE INTEGRATED PLATFORM --}}
<section class="hx-sec hx-tint">
    <div class="container-shell">
        <div class="hx-head hx-split hopn-reveal">
            <div>
                <div class="hx-eyebrow"><span>@if($lang==='ar') منصة واحدة متكاملة @elseif($lang==='de') Eine integrierte Plattform @else One integrated platform @endif</span></div>
                <h2 class="hx-h2">
                    @if($lang==='ar') استشارات وتقنية ومواهب وتدريب وبحث في منصة واحدة.
                    @elseif($lang==='de') Beratung, Technologie, Talente, Training und Forschung aus einer Hand.
                    @else Consulting, technology, talent, training and research in one platform. @endif
                </h2>
            </div>
            <p class="hx-sub">
                @if($lang==='ar') لا تحتاج المؤسسات إلى خمسة موردين لتحول واحد. تجمع HOPn هذه التخصصات وتبقى مسؤولة من السؤال الأول حتى النظام العامل.
                @elseif($lang==='de') Für eine Transformation braucht es nicht fünf Dienstleister. HOPn verbindet die Disziplinen und bleibt verantwortlich – von der ersten Frage bis zum laufenden System.
                @else An organisation should not need five suppliers for one transformation. HOPn combines the disciplines and stays accountable from the first question to the working system. @endif
            </p>
        </div>

        <div class="hx-grid-2 hopn-reveal">
            <a class="hx-card" href="{{ route('digital-twins.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/technology.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <h3 class="hx-h3">@if($lang==='ar') التقنية والهندسة @elseif($lang==='de') Technologie &amp; Engineering @else Technology &amp; engineering @endif</h3>
                    <p class="hx-p">@if($lang==='ar') حلول ذكاء اصطناعي وتوائم رقمية وأنظمة روبوتية مهندسة للتشغيل الفعلي. @elseif($lang==='de') KI-Lösungen, Digital Twins und Robotiksysteme, ausgelegt für den Produktivbetrieb. @else AI solutions, digital twins and robotic systems engineered for production use. @endif</p>
                    <span class="hx-more">@if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
            <a class="hx-card" href="{{ route('consulting.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/consulting.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <h3 class="hx-h3">@if($lang==='ar') الاستشارات @elseif($lang==='de') Beratung @else Consulting @endif</h3>
                    <p class="hx-p">@if($lang==='ar') استراتيجية وحوكمة وخرائط طريق مع خبراء يعرفون الجانب التقني والتنظيمي. @elseif($lang==='de') Strategie, Governance und Roadmaps mit Expertinnen und Experten, die Technik und Organisation verstehen. @else Strategy, governance and roadmaps with experts who understand both the technology and the organisation. @endif</p>
                    <span class="hx-more">@if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
            <a class="hx-card" href="{{ route('labs.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/innovation-lab.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <h3 class="hx-h3">@if($lang==='ar') مختبر الابتكار @elseif($lang==='de') Innovationslabor @else Innovation lab @endif</h3>
                    <p class="hx-p">@if($lang==='ar') مساحة لاختبار الأفكار مع الشركاء الأكاديميين قبل الالتزام بالتنفيذ الكامل. @elseif($lang==='de') Ein Raum, um Ideen mit akademischen Partnern zu erproben, bevor die volle Umsetzung beginnt. @else A space to test ideas with academic partners before committing to full implementation. @endif</p>
                    <span class="hx-more">@if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
            <a class="hx-card" href="{{ route('careers.index', ['lang'=>$lang]) }}">
                <div class="hx-art"><img src="/images/photos/talent.jpg" alt="" loading="lazy" decoding="async"></div>
                <div class="hx-card-body">
                    <h3 class="hx-h3">@if($lang==='ar') المواهب والتدريب @elseif($lang==='de') Talente &amp; Training @else Talent &amp; training @endif</h3>
                    <p class="hx-p">@if($lang==='ar') توظيف وتأهيل المتخصصين التقنيين وبناء فرق قادرة على تشغيل ما نبنيه معاً. @elseif($lang==='de') Gewinnung und Qualifizierung technischer Fachkräfte und Teams, die betreiben können, was wir gemeinsam aufbauen. @else Sourcing and upskilling technical specialists, and building teams able to run what we build together. @endif</p>
                    <span class="hx-more">@if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </div>
            </a>
        </div>

        <div class="hx-flow hopn-reveal">
            @php
                $hxFlow = [
                    ['1', $lang==='ar'?'الاستشارات':($lang==='de'?'Beratung':'Consulting'), $lang==='ar'?'تحديد المشكلة والنطاق':($lang==='de'?'Fragestellung und Umfang klären':'Frame the problem and scope')],
                    ['2', $lang==='ar'?'التقنية':($lang==='de'?'Technologie':'Technology'), $lang==='ar'?'التصميم والبناء والتحقق':($lang==='de'?'Entwerfen, bauen, validieren':'Design, build, validate')],
                    ['3', $lang==='ar'?'المواهب':($lang==='de'?'Talente':'Talent'), $lang==='ar'?'فرق قادرة على التشغيل':($lang==='de'?'Teams, die betreiben können':'Teams able to operate it')],
                    ['4', $lang==='ar'?'التدريب':($lang==='de'?'Training':'Training'), $lang==='ar'?'نقل المعرفة للمؤسسة':($lang==='de'?'Wissen in die Organisation tragen':'Transfer knowledge in-house')],
                    ['5', $lang==='ar'?'التعاون البحثي':($lang==='de'?'Forschungskooperation':'Research collaboration'), $lang==='ar'?'تطوير الخطوة التالية':($lang==='de'?'Den nächsten Schritt entwickeln':'Develop the next step')],
                ];
            @endphp
            @foreach($hxFlow as $hxStep)
            <div class="hx-step">
                <div class="hx-dot"><span>{{ $hxStep[0] }}</span></div>
                <b>{{ $hxStep[1] }}</b>
                <small>{{ $hxStep[2] }}</small>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 2. STRATEGY > BUILD > SCALE --}}
<section class="homepage-secondary hx-host hx-vidsec" style="padding:100px 0; background:#050A14;">
    {!! $hxVideo('team-whiteboard') !!}
    <div class="container-shell">
        <div class="hopn-reveal hx-vidhead" style="text-align:center; margin-bottom:64px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#4F6EF7; display:block; margin-bottom:16px;">
                @if($lang==='ar') كيف نعمل @elseif($lang==='de') Wie wir arbeiten @else How We Work @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px; margin:0;">
                @if($lang==='ar') من الاستراتيجية إلى التأثير @elseif($lang==='de') Von der Strategie zur Wirkung @else From strategy to impact. @endif
            </h2>
        </div>
        @php
            $strategyImages = $homeProducts->pluck('hero_image_url')->filter()->values();
            $strategySteps = [
                ['S','#4F6EF7',
                 $lang==='ar'?'الاستراتيجية':($lang==='de'?'Strategie':'Strategy'),
                 $lang==='ar'?'حدد الرؤية ومحافظ المشاريع وحوكمة الابتكار على نطاق المؤسسة.':($lang==='de'?'Vision, Portfolios und Innovationsgovernance auf Unternehmensebene definieren.':'Define vision, portfolios, and innovation governance at enterprise scale.')],
                ['B','#10B981',
                 $lang==='ar'?'البناء':($lang==='de'?'Aufbau':'Build'),
                 $lang==='ar'?'صمّم ونفّذ بسرعة مؤسسية مع فرق عالمية المستوى.':($lang==='de'?'Entwerfen und liefern mit erstklassigen Teams.':'Design, prototype, and deliver at enterprise velocity with world-class teams.')],
                ['S','#8B5CF6',
                 $lang==='ar'?'التوسع':($lang==='de'?'Skalierung':'Scale'),
                 $lang==='ar'?'حقق التأثير مع المنصات والشراكات والنتائج القابلة للقياس.':($lang==='de'?'Wirkung mit Plattformen und messbaren Ergebnissen operationalisieren.':'Operationalize impact with platforms, partnerships, and measurable outcomes.')],
            ];
        @endphp
        <div class="hopn-strategy-grid hopn-reveal" style="display:grid; gap:16px; position:relative;">
            @foreach($strategySteps as $stepIndex => $step)
            <article class="hopn-strategy-card">
                <div class="hopn-strategy-media">
                    @if(false && $strategyImages->get($stepIndex))
                    <img loading="lazy" decoding="async" src="{{ $strategyImages->get($stepIndex) }}" alt="{{ $step[2] }}">
                    @else
                    <div class="hx-art" aria-hidden="true">
                        <img loading="lazy" decoding="async" src="/images/photos/{{ ['strategy','build','scale'][$stepIndex % 3] }}.jpg" alt="{{ $step[2] }}">
                    </div>
                    @endif
                    <span style="position:absolute; left:18px; top:16px; z-index:1; font-size:11px; font-weight:800; letter-spacing:.14em; color:#245B78;">0{{ $stepIndex + 1 }}</span>
                </div>
                <div style="padding:28px 30px 32px; text-align:start;">
                    <h3 style="font-size:24px; font-weight:800; color:white; margin:0 0 12px; letter-spacing:-.5px;">{{ $step[2] }}</h3>
                    <p style="font-size:14px; color:#94A3B8; line-height:1.75; margin:0;">{{ $step[3] }}</p>
                    <div style="height:1px; background:#9FB5C0; opacity:.65; margin-top:24px; transform-origin:left; transition:transform .35s ease;" class="hopn-strategy-rule"></div>
                </div>
            </article>
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

        <div class="hopn-reveal hopn-architecture-stage" style="margin:0 auto 64px;">
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
            <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}" class="hopn-service-card hopn-lift-card"
               style="display:flex; flex-direction:column; padding:32px 28px; background:#050A14; border:1px solid rgba(255,255,255,0.08); border-radius:14px; text-decoration:none; position:relative; overflow:hidden; min-height:200px;">
                @if($service->hero_image)
                <div style="height:120px; margin:-32px -28px 24px; overflow:hidden;">
                    <img loading="lazy" decoding="async" src="{{ $service->hero_image }}" alt="{{ $service->name }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @else
                <div class="hx-art" style="height:150px; margin:-32px -28px 24px;">
                    <img loading="lazy" decoding="async" src="{{ $hxImg($hxArt($service->name . ' ' . $service->slug, $loop->index)) }}" alt="">
                </div>
                @endif
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
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}" class="hopn-product-card hopn-lift-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:0; text-decoration:none; position:relative; overflow:hidden;">
                @if(!empty($product->hero_image_url))
                <div style="height:180px; overflow:hidden;">
                    <img loading="lazy" decoding="async" src="{{ $product->hero_image_url }}" alt="{{ $title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @else
                <div class="hx-art" style="height:180px;">
                    <img loading="lazy" decoding="async" src="{{ $hxImg($hxArt($title . ' ' . $cat, $loop->index)) }}" alt="">
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
           <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:20px;">
            @foreach($homeIndustries as $industry)
                <a href="{{ route('industries.show', ['lang'=>$lang,'slug'=>$industry->slug]) }}" class="hopn-industry-card hopn-lift-card"
                 style="display:flex; flex-direction:column; padding:32px 28px; background:#050A14; border:1px solid rgba(255,255,255,0.08); border-radius:14px; text-align:start; text-decoration:none; position:relative; overflow:hidden; min-height:360px;">
                @if($industry->image_url)
                <img loading="lazy" decoding="async" src="{{ $industry->image_url }}" alt="{{ $industry->name }}"
                     style="width:calc(100% + 56px); height:170px; margin:-32px -28px 24px; border-radius:0; object-fit:cover; background:#FFFFFF; display:block;">
                 @else
                 <div class="hx-art" aria-hidden="true">
                     <img loading="lazy" decoding="async" src="{{ $hxImg($hxArt($industry->name . ' ' . $industry->slug, $loop->index)) }}" alt="">
                 </div>
                @endif
                  <div style="font-size:20px; font-weight:700; color:#CBD5E1; margin-bottom:10px;">{{ $industry->name }}</div>
                 @if($industry->description)
                  <p style="font-size:13px; line-height:1.7; color:#94A3B8; margin:0 0 20px; flex:1;">{{ Str::limit($industry->description, 110) }}</p>
                 @endif
                  <span style="font-size:13px; font-weight:700; color:#8FB8CC;">@if($lang==='ar') اعرف المزيد @elseif($lang==='de') Mehr erfahren @else Learn more @endif →</span>
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
    $stripPartners = $stripPartners->values();
@endphp
@if($stripPartners->count() > 0)
<style>
    .hopn-partners { --pt-line:rgba(255,255,255,0.12); --pt-ink:#E2E8F0; --pt-bg:rgba(255,255,255,0.03); }
    html[data-theme="light"] .hopn-partners { --pt-line:#D7DEE3; --pt-ink:#172331; --pt-bg:#FFFFFF; }
    .hopn-partner-marquee { overflow:visible; }
    .hopn-partner-track { display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:20px; padding:4px 0; }
    .hopn-partner-item { display:flex; flex-direction:column; align-items:flex-start; gap:14px; min-width:0; min-height:300px; padding:32px 28px; border:1px solid var(--pt-line); background:var(--pt-bg); border-radius:14px; }
    .hopn-partner-item img { height:150px; width:100%; max-width:none; object-fit:contain; display:block; background:#FFFFFF; border-radius:8px; padding:18px; }
    .hopn-partner-item span { font-size:20px; font-weight:700; color:var(--pt-ink); text-align:start; }
    .hopn-partner-item p { font-size:13px; line-height:1.7; color:var(--pt-ink); opacity:.75; margin:0; }
    .hopn-partner-item a { font-size:13px; font-weight:700; color:#245B78; text-decoration:none; margin-top:auto; }
    @media (max-width:640px) { .hopn-partner-track { grid-template-columns:1fr; } .hopn-partner-item img { height:130px; } }
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
            @foreach($stripPartners as $partner)
                    <div class="hopn-partner-item">
                        @if($partner->logo)
                        <img loading="lazy" decoding="async" src="{{ $partner->logo }}" alt="{{ $partner->name }}">
                        @endif
                        <span>{{ $partner->name }}</span>
                        @php $partnerDescription = $lang==='de' && $partner->description_de ? $partner->description_de : ($lang==='ar' && $partner->description_ar ? $partner->description_ar : $partner->description_en); @endphp
                        @if($partnerDescription)<p>{{ Str::limit($partnerDescription, 105) }}</p>@endif
                        @if($partner->url)<a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer">@if($lang==='ar') الملف @elseif($lang==='de') Profil @else View profile @endif →</a>@endif
                    </div>
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
                        <img loading="lazy" decoding="async" src="{{ $investor->logo }}" alt="{{ $investor->name }}" style="width:104px; height:104px; border-radius:14px; object-fit:cover; background:white; flex-shrink:0; border:1px solid #D7DEE3;">
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
            <div class="hopn-lift-card hopn-expert-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:0; position:relative; overflow:hidden;">
                @if($expert->photo_url)
                <div style="height:190px; overflow:hidden; background:#EEF3F5;">
                    <img loading="lazy" decoding="async" src="{{ $expert->photo_url }}" alt="{{ $expert->name }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @endif
                <div style="padding:28px;">
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    @if($expert->photo_url)
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
                         class="hopn-expert-book"
                         style="display:block; text-align:center; margin-top:16px; padding:12px; border-radius:8px; background:#245B78; color:white; font-size:14px; font-weight:700; text-decoration:none;">
                    @if($lang==='ar') احجز هذا الخبير @elseif($lang==='de') Diesen Experten buchen @else Book this expert @endif
                </a>
                @if($expert->linkedin_url)
                <a href="{{ $expert->linkedin_url }}" target="_blank"
                   class="hopn-link-fade-in"
                   style="display:inline-block; margin-top:10px; font-size:12px; font-weight:600; color:{{ $c }}; text-decoration:none;">LinkedIn →</a>
                @endif
                </div>
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
                @if($ws->hero_image_url)
                <div style="height:150px; margin:-28px -28px 24px; overflow:hidden;">
                    <img loading="lazy" decoding="async" src="{{ $ws->hero_image_url }}" alt="{{ $ws->title_en }}" style="width:100%; height:100%; display:block; object-fit:cover;">
                </div>
                @else
                <div class="hx-art" style="height:150px; margin:-28px -28px 24px;">
                    <img loading="lazy" decoding="async" src="/images/photos/workshop.jpg" alt="">
                </div>
                @endif
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
                @if($event->image_url)
                <div style="height:150px; overflow:hidden;">
                    <img loading="lazy" decoding="async" src="{{ $event->image_url }}" alt="{{ $event->title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @else
                <div class="hx-art" style="height:150px;">
                    <img loading="lazy" decoding="async" src="/images/illustrations/events.svg" alt="">
                </div>
                @endif
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
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:0; text-decoration:none; overflow:hidden;">
                @if($post->featured_image_path)
                <div style="height:190px; overflow:hidden; background:#EEF3F5;">
                    <img loading="lazy" decoding="async" src="{{ $post->featured_image_path }}" alt="{{ $post->title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                </div>
                @else
                <div class="hx-art" style="height:190px;">
                    <img loading="lazy" decoding="async" src="{{ $hxImg($hxArt($post->title, $loop->index + 1)) }}" alt="">
                </div>
                @endif
                <div style="display:flex; flex-direction:column; padding:28px; flex:1;">
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

{{-- 13. PEOPLE --}}
@if(isset($teamMembers) && $teamMembers->count() > 0)
<section class="homepage-secondary" style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div class="hopn-reveal" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:44px;">
            <div>
                <span style="display:block; font-size:11px; font-weight:700; letter-spacing:.15em; text-transform:uppercase; color:#245B78; margin-bottom:12px;">
                    @if($lang==='ar') الأشخاص @elseif($lang==='de') Menschen @else People @endif
                </span>
                <h2 style="font-size:clamp(28px,4vw,48px); margin:0;">
                    @if($lang==='ar') الأشخاص وراء HOPn @elseif($lang==='de') Die Menschen hinter HOPn @else The people behind HOPn @endif
                </h2>
            </div>
            <a href="{{ route('team.index', ['lang'=>$lang]) }}" class="hopn-link-accent" style="font-size:14px; font-weight:700; color:#245B78; text-decoration:none;">
                @if($lang==='ar') الفريق الكامل @elseif($lang==='de') Das gesamte Team @else Meet the full team @endif →
            </a>
        </div>
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:16px;">
            @foreach($teamMembers as $member)
            @php
                $memberRole = $lang==='ar' && $member->role_ar ? $member->role_ar : ($lang==='de' && $member->role_de ? $member->role_de : $member->role_en);
                $memberInitial = strtoupper(substr($member->name, 0, 1));
            @endphp
            <article class="hopn-field-card {{ $member->is_founder ? 'hopn-field-card-founder' : '' }}" style="padding:28px; min-height:250px;">
                <div class="hopn-field-content">
                    @if($member->photo)
                    <img class="hopn-field-photo" loading="lazy" decoding="async" src="{{ $member->photo }}" alt="{{ $member->name }}" style="margin-bottom:20px;">
                    @else
                    <div class="hopn-field-photo" style="display:flex; align-items:center; justify-content:center; color:#245B78; font-size:30px; font-weight:700; margin-bottom:20px;">{{ $memberInitial }}</div>
                    @endif
                    @if($member->is_founder)
                    <span style="display:block; font-size:10px; font-weight:700; letter-spacing:.13em; text-transform:uppercase; color:#526170; margin-bottom:8px;">Founder</span>
                    @endif
                    <h3 style="font-size:20px; margin:0 0 7px;">{{ $member->name }}</h3>
                    @if($memberRole)<p style="font-size:13px; font-weight:700; color:#245B78 !important; margin:0 0 18px;">{{ $memberRole }}</p>@endif
                    @if($member->linkedin)
                    <a href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer" style="font-size:13px; font-weight:700; color:#245B78; text-decoration:none;">LinkedIn →</a>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 14. TALENT --}}
<section class="homepage-secondary hx-host hx-vidsec" style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    {!! $hxVideo('talent-hiring') !!}
    <div class="container-shell" style="position:relative; z-index:10;">
        <div class="hopn-reveal hx-vidhead" style="text-align:center; margin-bottom:64px;">
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
        <div class="hx-grid-2 hx-talent" style="display:grid; gap:16px; margin-bottom:48px;">
            @php
            $talentItems = [
                ['mark'=>'R','photo'=>'remote-team','title'=>$lang==='ar'?'فرق عن بُعد':($lang==='de'?'Remote-Teams':'Remote Teams'),'desc'=>$lang==='ar'?'فرق مُدارة بالكامل من المهندسين وعلماء البيانات':($lang==='de'?'Vollständig verwaltete Remote-Teams':'Fully managed remote teams of engineers'),'color'=>'#8FB8CC'],
                ['mark'=>'L','photo'=>'local-hiring','title'=>$lang==='ar'?'التوظيف المحلي':($lang==='de'?'Lokale Einstellung':'Local Hiring'),'desc'=>$lang==='ar'?'توظيف في الموقع عبر ألمانيا وأوروبا':($lang==='de'?'Vor-Ort-Talente in Deutschland':'On-site talent across Germany'),'color'=>'#8FB8CC'],
                ['mark'=>'E','photo'=>'technical-experts','title'=>$lang==='ar'?'خبراء تقنيون':($lang==='de'?'Tech-Experten':'Technical Experts'),'desc'=>$lang==='ar'?'متخصصون في الذكاء الاصطناعي والبيانات والروبوتيكا':($lang==='de'?'KI-, Daten- und Robotik-Spezialisten':'AI, data, and robotics specialists'),'color'=>'#8FB8CC'],
                ['mark'=>'D','photo'=>'dedicated-teams','title'=>$lang==='ar'?'فرق مخصصة':($lang==='de'?'Dedizierte Teams':'Dedicated Teams'),'desc'=>$lang==='ar'?'فرق تطوير طويلة الأجل مدمجة في مؤسستك':($lang==='de'?'Langfristige Teams in Ihrer Organisation':'Long-term teams in your organization'),'color'=>'#8FB8CC'],
            ];
            @endphp
            @foreach($talentItems as $item)
            <div class="hopn-lift-card hopn-talent-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div class="hx-art" style="height:230px; margin:-28px -28px 22px;">
                    <img loading="lazy" decoding="async" src="/images/photos/{{ $item['photo'] }}.jpg" alt="{{ $item['title'] }}">
                </div>
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

{{-- 15. FINAL CTA --}}
<section class="hx-host hx-vidsec" style="padding:120px 0; background:#030712; position:relative; overflow:hidden;">
    {!! $hxVideo('consulting-team') !!}
    <div class="container-shell hopn-reveal hx-vidhead" style="position:relative; z-index:10; text-align:center;">
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

</script>
@endpush

</div>

</x-layouts.public>