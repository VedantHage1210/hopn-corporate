<!DOCTYPE html>
@php $lang = request()->route('lang', app()->getLocale()); @endphp
<html lang="{{ $lang }}" @if($lang === 'ar') dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        (function () {
            var theme = localStorage.getItem('hopn_theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        }());
    </script>
    <title>{{ ($title ?? 'HOPn') . ' | HOPn' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.seo-head')
    {{-- Self-hosted fonts (no request to Google): Inter for Latin, Cairo for Arabic --}}
    <link rel="preload" href="/fonts/{{ $lang === 'ar' ? 'cairo-arabic' : 'inter-latin' }}-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/fonts/fonts.css">

    <style>
        /* Font family based on language */
        @if($lang === 'ar')
        * { font-family: 'Cairo', 'Segoe UI', Tahoma, Arial, sans-serif !important; }
        @else
        * { font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif !important; }
        @endif

        /* RTL specific fixes */
        @if($lang === 'ar')
        .container-shell { direction: rtl; }

        /* Flip arrows for RTL */
        [dir="rtl"] svg path[d*="M17 8l4 4m0 0l-4 4m4-4H3"] {
            transform: scaleX(-1);
        }

        /* Nav RTL */
        [dir="rtl"] nav { direction: rtl; }

        /* Footer RTL */
        [dir="rtl"] footer { direction: rtl; }
        @endif

        /* ===== Shared premium design-system utilities (used across all pages) ===== */
        .hopn-reveal { opacity:0; transform:translateY(24px); transition:opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1); }
        .hopn-reveal.is-visible { opacity:1; transform:translateY(0); }
        @media (prefers-reduced-motion: reduce) {
            .hopn-reveal { opacity:1; transform:none; transition:none; }
        }

        .hopn-lift-card { transition:background 0.35s cubic-bezier(0.16,1,0.3,1), border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1); }
        .hopn-lift-card:hover { background:#0D1425; transform:translateY(-4px); border-color:rgba(255,255,255,0.14); }
        .hopn-lift-card-nobg { transition:border-color 0.35s cubic-bezier(0.16,1,0.3,1), transform 0.35s cubic-bezier(0.16,1,0.3,1); }
        .hopn-lift-card-nobg:hover { transform:translateY(-4px); border-color:rgba(255,255,255,0.14); }

        .hopn-link-fade { transition:opacity 0.25s ease; opacity:1; }
        .hopn-link-fade:hover { opacity:0.7; }
        .hopn-link-fade-in { transition:opacity 0.25s ease; opacity:0.7; }
        .hopn-link-fade-in:hover { opacity:1; }
        .hopn-link-accent { transition:color 0.25s ease; }
        .hopn-link-accent:hover { color:white !important; }

        .hopn-btn-primary { transition:background-color 0.2s ease; }
        .hopn-btn-primary:hover { background:#1D4D66 !important; }
        .hopn-btn-primary-green { transition:background-color 0.2s ease; }
        .hopn-btn-primary-green:hover { background:#1D4D66 !important; }
        .hopn-btn-secondary { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), background 0.25s ease, border-color 0.25s ease; }
        .hopn-btn-secondary:hover { transform:translateY(-3px); background:rgba(255,255,255,0.09); border-color:rgba(255,255,255,0.28); }
        .hopn-btn-outline-blue { transition:background 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
        .hopn-btn-outline-blue:hover { background:rgba(79,110,247,0.08); transform:translateY(-2px); }
        .hopn-btn-outline-purple { transition:background 0.3s ease, transform 0.3s cubic-bezier(0.16,1,0.3,1); }
        .hopn-btn-outline-purple:hover { background:rgba(139,92,246,0.08); transform:translateY(-2px); }
        .hopn-btn-outline-amber { transition:background 0.3s ease; }
        .hopn-btn-outline-amber:hover { background:rgba(245,158,11,0.08); }
        .hopn-btn-outline-neutral { transition:color 0.25s ease, border-color 0.25s ease; }
        .hopn-btn-outline-neutral:hover { color:white; border-color:rgba(255,255,255,0.2); }

        .hopn-row-hover { transition:background 0.25s ease; }
        .hopn-row-hover:hover { background:rgba(255,255,255,0.03); }
        .hopn-social-icon { transition:border-color 0.25s ease, color 0.25s ease, background 0.25s ease; }
        .hopn-social-icon:hover { border-color:rgba(79,110,247,0.4); color:#818CF8; background:rgba(79,110,247,0.1); }

        .hopn-lift-btn { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1); }
        .hopn-lift-btn:hover { transform:translateY(-3px); }
        .hopn-bg-brighten { transition:filter 0.3s ease; }
        .hopn-bg-brighten:hover { filter:brightness(1.35); }
        .hopn-lift-card img, .hopn-lift-card-nobg img { transition:transform 0.4s ease, filter 0.4s ease; }
        .hopn-lift-card:hover img { filter:brightness(1) grayscale(0); }
        .hopn-lift-card:hover img, .hopn-lift-card-nobg:hover img { transform:scale(1.05); }

        /* ===== Global mobile responsiveness fixes ===== */
        /* Many page sections use inline 2-column grids (grid-template-columns:1fr 1fr) which
           were not built with mobile in mind. This forces every such grid to stack to a single
           column on small screens, site-wide, without needing to edit every page individually. */
        @media (max-width: 760px) {
            [style*="grid-template-columns:1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
            [style*="grid-template-columns:1fr 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
            /* Sticky sidebars (e.g. application forms next to job details) shouldn't stay
               pinned on mobile - there isn't enough vertical room and it can trap the layout. */
            [style*="position:sticky"] {
                position: static !important;
                top: auto !important;
            }
            /* Prevent large hero/heading font-size clamps and wide fixed paddings from
               overflowing narrow viewports. */
            .container-shell { padding-left: 16px !important; padding-right: 16px !important; }
        }
        @media (max-width: 480px) {
            /* Stat strips and small info grids that use 3-4 columns should drop to 2 on
               very small phones so numbers/labels don't get crushed. */
            [style*="grid-template-columns:repeat(4"],
            [style*="grid-template-columns:repeat(3"] {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }
        /* Prevent horizontal scroll caused by any element wider than the viewport
           (long words, unwrapped tables, fixed-width inline elements, etc.) */
        html, body { max-width: 100%; overflow-x: hidden; }
        img, video { max-width: 100%; height: auto; }
        table { max-width: 100%; display: block; overflow-x: auto; }

        /* Public theme system: light is the default, dark remains available. */
        html[data-theme="light"] body { background:#F6F7F4 !important; color:#172331; }
        html[data-theme="light"] header { background:#FFFFFF !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] header a, html[data-theme="light"] header button { color:#243746 !important; }
        html[data-theme="light"] header .hopn-mobile-menu { background:#FFFFFF !important; border-top-color:#D7DEE3 !important; -webkit-backdrop-filter:none !important; backdrop-filter:none !important; }
        html[data-theme="light"] header .hopn-mobile-menu a,
        html[data-theme="light"] header .hopn-mobile-menu button,
        html[data-theme="light"] header .hopn-mobile-menu span { color:#243746 !important; }
        html[data-theme="light"] header .hopn-mobile-menu a:hover,
        html[data-theme="light"] header .hopn-mobile-menu button:hover { background:#EEF3F5 !important; color:#172331 !important; }
        html[data-theme="light"] header .hopn-mobile-menu [style*="border-top"] { border-top-color:#D7DEE3 !important; }
        html[data-theme="light"] header .hopn-mobile-menu .hopn-lang-item.active { background:#E8EEF2 !important; color:#245B78 !important; }
        html[data-theme="light"] main a[style*="background:#4F6EF7"],
        html[data-theme="light"] main a[style*="background:#245B78"] { background:#245B78 !important; color:#FFFFFF !important; }
        html[data-theme="light"] header .hopn-dropdown,
        html[data-theme="light"] header [x-show="langOpen"] { background:#FFFFFF !important; border-color:#D7DEE3 !important; box-shadow:0 18px 36px rgba(23,35,49,.14) !important; }
        html[data-theme="light"] header .hopn-dropdown a:hover,
        html[data-theme="light"] header .hopn-trigger:hover { background:#EEF3F5 !important; color:#172331 !important; }
        html[data-theme="light"] main section[style*="background:#030712"],
        html[data-theme="light"] main section[style*="background:#050A14"],
        html[data-theme="light"] main section[style*="background:#080D1A"] { background:#F6F7F4 !important; }
        html[data-theme="light"] main section[style*="background:#111827"],
        html[data-theme="light"] main section[style*="background:#0A0F1E"],
        html[data-theme="light"] main section[style*="background:#0D1425"],
        html[data-theme="light"] main div[style*="background:#111827"],
        html[data-theme="light"] main div[style*="background:#0A0F1E"],
        html[data-theme="light"] main div[style*="background:#0D1425"],
        html[data-theme="light"] main [style*="background:#111827"],
        html[data-theme="light"] main [style*="background:#0A0F1E"],
        html[data-theme="light"] main [style*="background:#0D1425"] { background:#FFFFFF !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] main [style*="background-image:linear-gradient"],
        html[data-theme="light"] main [style*="background-image:radial-gradient"],
        html[data-theme="light"] main [style*="background:linear-gradient"],
        html[data-theme="light"] main [style*="background:radial-gradient"] { background-image:none !important; }
        html[data-theme="light"] main [style*="box-shadow:0 0"],
        html[data-theme="light"] main [style*="filter:blur"] { filter:none !important; box-shadow:0 8px 22px rgba(23,35,49,.08) !important; }
        html[data-theme="light"] main section h1,
        html[data-theme="light"] main section h2,
        html[data-theme="light"] main section h3,
        html[data-theme="light"] main section h4,
        html[data-theme="light"] main section h5 { color:#172331 !important; text-shadow:none !important; font-weight:750; }
        html[data-theme="light"] main section h1 span,
        html[data-theme="light"] main section h2 span { -webkit-text-fill-color:#172331 !important; color:#172331 !important; background-image:none !important; }
        html[data-theme="light"] main section p { color:#526170 !important; }
        html[data-theme="light"] main section label,
        html[data-theme="light"] main section small,
        html[data-theme="light"] main section figcaption { color:#526170 !important; }
        html[data-theme="light"] main section span[style*="color:#E2E8F0"],
        html[data-theme="light"] main section span[style*="color:white"],
        html[data-theme="light"] main section span[style*="color:#CBD5E1"],
        html[data-theme="light"] main section span[style*="color:#94A3B8"],
        html[data-theme="light"] main section div[style*="color:#CBD5E1"],
        html[data-theme="light"] main section div[style*="color:#94A3B8"],
        html[data-theme="light"] main section div[style*="color:white"] { color:#243746 !important; opacity:1 !important; font-weight:600; }
        html[data-theme="light"] main form input:not([type="checkbox"]):not([type="radio"]),
        html[data-theme="light"] main form textarea,
        html[data-theme="light"] main form select { background:#FFFFFF !important; color:#172331 !important; border-color:#AEBCC5 !important; caret-color:#172331; }
        html[data-theme="light"] main form input::placeholder,
        html[data-theme="light"] main form textarea::placeholder { color:#607180 !important; opacity:1 !important; }
        html[data-theme="light"] main form input:focus,
        html[data-theme="light"] main form textarea:focus,
        html[data-theme="light"] main form select:focus { border-color:#245B78 !important; box-shadow:0 0 0 3px rgba(36,91,120,.16) !important; outline:none; }
        html[data-theme="light"] main .hopn-lift-card,
        html[data-theme="light"] main [class*="card"],
        html[data-theme="light"] main [class*="panel"] { color:#243746; }
        html[data-theme="light"] main [class*="card"] h1,
        html[data-theme="light"] main [class*="card"] h2,
        html[data-theme="light"] main [class*="card"] h3,
        html[data-theme="light"] main [class*="card"] h4,
        html[data-theme="light"] main [class*="card"] strong { color:#172331 !important; opacity:1 !important; }
        html[data-theme="light"] main [class*="card"] p,
        html[data-theme="light"] main [class*="card"] li,
        html[data-theme="light"] main [class*="card"] span,
        html[data-theme="light"] main [class*="card"] div { color:#526170 !important; opacity:1 !important; }
        html[data-theme="light"] main [class*="card"] a:not([style*="background:#245B78"]):not([style*="background:#4F6EF7"]):not([style*="background:#8B5CF6"]):not([style*="background:#F59E0B"]):not([style*="background:#10B981"]):not([style*="background:#06B6D4"]):not(.hopn-lift-btn) { color:#245B78 !important; opacity:1 !important; }
        html[data-theme="light"] main .card-panel {
            background:#FFFFFF !important;
            border-color:#D7DEE3 !important;
            color:#243746 !important;
            backdrop-filter:none !important;
            opacity:1 !important;
        }
        html[data-theme="light"] main .card-panel h1,
        html[data-theme="light"] main .card-panel h2,
        html[data-theme="light"] main .card-panel h3,
        html[data-theme="light"] main .card-panel h4,
        html[data-theme="light"] main .card-panel strong { color:#172331 !important; opacity:1 !important; }
        html[data-theme="light"] main .card-panel p,
        html[data-theme="light"] main .card-panel li,
        html[data-theme="light"] main .card-panel span,
        html[data-theme="light"] main .card-panel div { color:#526170 !important; opacity:1 !important; }
        html[data-theme="light"] main .card-panel a:not([style*="background:#245B78"]):not([style*="background:#4F6EF7"]):not([style*="background:#8B5CF6"]):not([style*="background:#F59E0B"]):not([style*="background:#10B981"]):not([style*="background:#06B6D4"]):not(.hopn-lift-btn) { color:#245B78 !important; opacity:1 !important; }
        html[data-theme="light"] main [style*="background:#111827"] h1,
        html[data-theme="light"] main [style*="background:#111827"] h2,
        html[data-theme="light"] main [style*="background:#111827"] h3,
        html[data-theme="light"] main [style*="background:#111827"] h4,
        html[data-theme="light"] main [style*="background:#0A0F1E"] h1,
        html[data-theme="light"] main [style*="background:#0A0F1E"] h2,
        html[data-theme="light"] main [style*="background:#0A0F1E"] h3,
        html[data-theme="light"] main [style*="background:#0A0F1E"] h4,
        html[data-theme="light"] main [style*="background:#0D1425"] h1,
        html[data-theme="light"] main [style*="background:#0D1425"] h2,
        html[data-theme="light"] main [style*="background:#0D1425"] h3,
        html[data-theme="light"] main [style*="background:#0D1425"] h4 { color:#172331 !important; opacity:1 !important; }
        html[data-theme="light"] main [style*="background:#111827"] p,
        html[data-theme="light"] main [style*="background:#111827"] span,
        html[data-theme="light"] main [style*="background:#0A0F1E"] p,
        html[data-theme="light"] main [style*="background:#0A0F1E"] span,
        html[data-theme="light"] main [style*="background:#0D1425"] p,
        html[data-theme="light"] main [style*="background:#0D1425"] span { color:#526170 !important; opacity:1 !important; }
        html[data-theme="light"] main section a:not(.hopn-btn-primary):not(.hopn-btn-secondary):not(.hopn-btn-primary-green):not([style*="background:#245B78"]):not([style*="background:#4F6EF7"]):not([style*="background:#8B5CF6"]):not([style*="background:#F59E0B"]):not([style*="background:#10B981"]):not([style*="background:#06B6D4"]):not(.hopn-lift-btn) { color:#245B78 !important; }
        html[data-theme="light"] footer { background:#EAF0F2 !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] footer p, html[data-theme="light"] footer span,
        html[data-theme="light"] footer a, html[data-theme="light"] footer div[style*="color:#CBD5E1"],
        html[data-theme="light"] footer div[style*="color:#94A3B8"] { color:#243746 !important; font-weight:600; opacity:1 !important; }
        html[data-theme="light"] footer a[mailto] { color:#245B78 !important; }
        html[data-theme="light"] footer h1, html[data-theme="light"] footer h2,
        html[data-theme="light"] footer h3, html[data-theme="light"] footer strong { color:#172331 !important; font-weight:800; }
        html[data-theme="light"] .hopn-btn-secondary { background:#FFFFFF !important; border:1.5px solid #245B78 !important; color:#245B78 !important; box-shadow:none !important; font-weight:700; }
        html[data-theme="light"] .hopn-btn-secondary:hover { background:#EEF3F5 !important; transform:none; }
        html[data-theme="light"] .hopn-btn-primary { color:#FFFFFF !important; font-weight:800; }
        html[data-theme="light"] .hopn-dropdown-header { color:#526170 !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] .hopn-theme-toggle { background:#EEF3F5 !important; border-color:#C8D2D8 !important; color:#172331 !important; }
        html[data-theme="dark"] .hopn-theme-toggle { background:#0D1425; border-color:rgba(255,255,255,.14); color:#CBD5E1; }
        .hopn-theme-toggle { display:inline-flex; align-items:center; justify-content:center; width:42px; height:34px; border:1px solid; border-radius:9px; cursor:pointer; }
        .hopn-theme-toggle svg { width:16px; height:16px; }
        html[data-theme="light"] .hopn-theme-toggle .theme-moon { display:none; }
        html[data-theme="dark"] .hopn-theme-toggle .theme-sun { display:none; }
        .hopn-mobile-toggle { display:flex !important; }
        .hopn-nav-desktop { display:none !important; }
        @media (min-width:1024px) {
            .hopn-mobile-toggle, #hopn-mobile-menu { display:none !important; }
            .hopn-nav-desktop-flex { display:flex !important; }
            .hopn-nav-desktop-block { display:block !important; }
            .hopn-nav-desktop-inline { display:inline-flex !important; }
        }

        /* ===== Cookie banner: calm surface, no shadow glow ===== */
        #cookie-banner { box-shadow:none !important; }
        html[data-theme="light"] #cookie-banner { background:#FFFFFF !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] #cookie-banner p { color:#243746 !important; }
        html[data-theme="light"] #cookie-banner a { color:#245B78 !important; }
        html[data-theme="light"] #cookie-banner button { color:#243746 !important; border-color:#B9C4CB !important; background:#FFFFFF !important; }
        html[data-theme="light"] #cookie-banner button:hover { background:#EEF3F5 !important; }
        #cookie-banner #cookie-accept { background:#245B78 !important; color:#FFFFFF !important; border-color:#245B78 !important; }
        #cookie-banner #cookie-accept:hover { background:#1D4D66 !important; }


        /* ===== Contrast (WCAG 2.2 AA): one accent colour, readable on light surfaces ===== */
        html[data-theme="light"] main [style*=" color:#818CF8"],
        html[data-theme="light"] main [style^="color:#818CF8"],
        html[data-theme="light"] main [style*=" color:#A78BFA"],
        html[data-theme="light"] main [style^="color:#A78BFA"],
        html[data-theme="light"] main [style*=" color:#4F6EF7"],
        html[data-theme="light"] main [style^="color:#4F6EF7"],
        html[data-theme="light"] main [style*=" color:#8B5CF6"],
        html[data-theme="light"] main [style^="color:#8B5CF6"],
        html[data-theme="light"] main [style*=" color:#6366F1"],
        html[data-theme="light"] main [style^="color:#6366F1"],
        html[data-theme="light"] main [style*=" color:#10B981"],
        html[data-theme="light"] main [style^="color:#10B981"],
        html[data-theme="light"] main [style*=" color:#34D399"],
        html[data-theme="light"] main [style^="color:#34D399"],
        html[data-theme="light"] main [style*=" color:#06B6D4"],
        html[data-theme="light"] main [style^="color:#06B6D4"],
        html[data-theme="light"] main [style*=" color:#22D3EE"],
        html[data-theme="light"] main [style^="color:#22D3EE"],
        html[data-theme="light"] main [style*=" color:#F59E0B"],
        html[data-theme="light"] main [style^="color:#F59E0B"],
        html[data-theme="light"] main [style*=" color:#FBBF24"],
        html[data-theme="light"] main [style^="color:#FBBF24"],
        html[data-theme="light"] main [style*=" color:#EC4899"],
        html[data-theme="light"] main [style^="color:#EC4899"],
        html[data-theme="light"] main [style*=" color:#F472B6"],
        html[data-theme="light"] main [style^="color:#F472B6"],
        html[data-theme="light"] main [style*=" color:#3B82F6"],
        html[data-theme="light"] main [style^="color:#3B82F6"],
        html[data-theme="light"] main [style*=" color:#60A5FA"],
        html[data-theme="light"] main [style^="color:#60A5FA"],
        html[data-theme="light"] main [style*=" color:#F97316"],
        html[data-theme="light"] main [style^="color:#F97316"],
        html[data-theme="light"] main [style*=" color:#FB923C"],
        html[data-theme="light"] main [style^="color:#FB923C"],
        html[data-theme="light"] main [style*=" color:#A855F7"],
        html[data-theme="light"] main [style^="color:#A855F7"],
        html[data-theme="light"] main [style*=" color:#C084FC"],
        html[data-theme="light"] main [style^="color:#C084FC"],
        html[data-theme="light"] main [style*=" color:#14B8A6"],
        html[data-theme="light"] main [style^="color:#14B8A6"],
        html[data-theme="light"] main [style*=" color:#2DD4BF"],
        html[data-theme="light"] main [style^="color:#2DD4BF"],
        html[data-theme="light"] main [style*=" color:#84CC16"],
        html[data-theme="light"] main [style^="color:#84CC16"],
        html[data-theme="light"] main [style*=" color:#EAB308"],
        html[data-theme="light"] main [style^="color:#EAB308"],
        html[data-theme="light"] main [style*=" color:#38BDF8"],
        html[data-theme="light"] main [style^="color:#38BDF8"],
        html[data-theme="light"] main [style*=" color:#7C3AED"],
        html[data-theme="light"] main [style^="color:#7C3AED"],
        html[data-theme="light"] main [style*=" color:#0EA5E9"],
        html[data-theme="light"] main [style^="color:#0EA5E9"] { color:#245B78 !important; }
        main form label a, main form p a, main form span a, main p a:not([style*="background"]), main li a:not([style*="background"]) { text-decoration:underline; }
        .btn-primary, main .hopn-lift-btn { background:#245B78 !important; background-image:none !important; color:#FFFFFF !important; }
        .btn-primary:hover, main .hopn-lift-btn:hover { background:#1D4D66 !important; }
        html[data-theme="light"] .hopn-status-badge { background:#EEF3F5 !important; color:#243746 !important; border:1px solid #D7DEE3 !important; }
        #cookie-banner a { text-decoration:underline; }


        /* ===== More contrast fixes: one accent colour on buttons, readable muted text ===== */
        main button[style*="background:#10B981"], main a[style*="background:#10B981"],
        main button[style*="background:#8B5CF6"], main a[style*="background:#8B5CF6"],
        main button[style*="background:#06B6D4"], main a[style*="background:#06B6D4"],
        main button[style*="background:#4F6EF7"] { background:#245B78 !important; background-image:none !important; color:#FFFFFF !important; }
        html[data-theme="light"] main [style*=" color:#64748B"], html[data-theme="light"] main [style^="color:#64748B"] { color:#526170 !important; }

        html[data-theme="light"] footer button.hopn-link-accent { color:#243746 !important; text-decoration:underline; }
        html[data-theme="light"] footer button.hopn-link-accent:hover { color:#245B78 !important; }
        #hopn-newsletter-submit { background:#245B78 !important; background-image:none !important; color:#FFFFFF !important; }
        #hopn-newsletter-submit:hover { background:#1D4D66 !important; }

        html[data-theme="light"] header a[data-hopn-event] { color:#FFFFFF !important; }

        html[data-theme="light"] header .hopn-wordmark { color:#172331 !important; }


        /* ===== HOPn design tokens (single source for colour, type, spacing) =====
           See docs/DESIGN-SYSTEM.md. One accent colour, one heading/body family, 4px spacing grid. */
        :root {
            --hopn-accent: #245B78;       --hopn-accent-hover: #1D4D66;  --hopn-accent-soft: #8FB8CC;
            --hopn-ink: #172331;          --hopn-ink-muted: #526170;     --hopn-line: #D7DEE3;
            --hopn-surface: #FFFFFF;      --hopn-surface-alt: #F6F7F4;   --hopn-surface-tint: #EEF3F5;
            --hopn-radius-sm: 6px;        --hopn-radius-md: 8px;         --hopn-radius-lg: 12px;
            --hopn-space-1: 4px;  --hopn-space-2: 8px;  --hopn-space-3: 12px; --hopn-space-4: 16px;
            --hopn-space-6: 24px; --hopn-space-8: 32px; --hopn-space-12: 48px; --hopn-space-16: 64px;
            --hopn-text-sm: 14px; --hopn-text-base: 16px; --hopn-text-lg: 18px;
        }
        /* Typography polish: balanced headings (no one-word last lines), calmer paragraphs, safe wrapping in DE/AR */
        main h1, main h2, main h3 { text-wrap: balance; overflow-wrap: break-word; }
        main p, main li { text-wrap: pretty; overflow-wrap: break-word; }
        html[lang="de"] main p, html[lang="de"] main li { hyphens: auto; }
        body { -webkit-font-smoothing: antialiased; text-rendering: optimizeLegibility; font-variant-numeric: tabular-nums; }

        /* ===== Visible keyboard focus everywhere ===== */
        a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible, summary:focus-visible, [tabindex]:focus-visible {
            outline:3px solid #245B78 !important; outline-offset:2px !important; border-radius:4px;
        }
        html[data-theme="dark"] a:focus-visible, html[data-theme="dark"] button:focus-visible { outline-color:#8FB8CC !important; }
        .hopn-skip-link { position:fixed; top:8px; inset-inline-start:8px; z-index:1000; transform:translateY(-300%); background:#245B78; color:#FFFFFF; padding:10px 16px; border-radius:6px; font-weight:700; text-decoration:none; }
        .hopn-skip-link:focus { transform:none; }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration:0.01ms !important; animation-iteration-count:1 !important; transition-duration:0.01ms !important; scroll-behavior:auto !important; } }


        /* ===== Single accent also in dark theme: purple/indigo/green/amber text becomes the soft accent ===== */
        html[data-theme="dark"] main [style*=" color:#818CF8"],
        html[data-theme="dark"] main [style^="color:#818CF8"],
        html[data-theme="dark"] main [style*=" color:#A78BFA"],
        html[data-theme="dark"] main [style^="color:#A78BFA"],
        html[data-theme="dark"] main [style*=" color:#4F6EF7"],
        html[data-theme="dark"] main [style^="color:#4F6EF7"],
        html[data-theme="dark"] main [style*=" color:#8B5CF6"],
        html[data-theme="dark"] main [style^="color:#8B5CF6"],
        html[data-theme="dark"] main [style*=" color:#6366F1"],
        html[data-theme="dark"] main [style^="color:#6366F1"],
        html[data-theme="dark"] main [style*=" color:#10B981"],
        html[data-theme="dark"] main [style^="color:#10B981"],
        html[data-theme="dark"] main [style*=" color:#34D399"],
        html[data-theme="dark"] main [style^="color:#34D399"],
        html[data-theme="dark"] main [style*=" color:#06B6D4"],
        html[data-theme="dark"] main [style^="color:#06B6D4"],
        html[data-theme="dark"] main [style*=" color:#22D3EE"],
        html[data-theme="dark"] main [style^="color:#22D3EE"],
        html[data-theme="dark"] main [style*=" color:#F59E0B"],
        html[data-theme="dark"] main [style^="color:#F59E0B"],
        html[data-theme="dark"] main [style*=" color:#FBBF24"],
        html[data-theme="dark"] main [style^="color:#FBBF24"],
        html[data-theme="dark"] main [style*=" color:#EC4899"],
        html[data-theme="dark"] main [style^="color:#EC4899"],
        html[data-theme="dark"] main [style*=" color:#F472B6"],
        html[data-theme="dark"] main [style^="color:#F472B6"],
        html[data-theme="dark"] main [style*=" color:#3B82F6"],
        html[data-theme="dark"] main [style^="color:#3B82F6"],
        html[data-theme="dark"] main [style*=" color:#60A5FA"],
        html[data-theme="dark"] main [style^="color:#60A5FA"],
        html[data-theme="dark"] main [style*=" color:#F97316"],
        html[data-theme="dark"] main [style^="color:#F97316"] { color:#8FB8CC !important; }
        /* Tinted chips and hairlines that still carry a rainbow tint use the accent tint instead (both themes) */
        main [style*="rgba(79,110,247"], main [style*="rgba(139,92,246"], main [style*="rgba(99,102,241"], main [style*="rgba(16,185,129"],
        main [style*="rgba(6,182,212"], main [style*="rgba(245,158,11"], main [style*="rgba(236,72,153"] { border-color:rgba(143,184,204,0.35) !important; }
        html[data-theme="light"] main [style*=" color:#8FB8CC"], html[data-theme="light"] main [style^="color:#8FB8CC"] { color:#245B78 !important; }

        main [style*="background:rgba(79,110,247,"],
        main [style*="background:rgba(139,92,246,"],
        main [style*="background:rgba(99,102,241,"],
        main [style*="background:rgba(16,185,129,"],
        main [style*="background:rgba(6,182,212,"],
        main [style*="background:rgba(245,158,11,"],
        main [style*="background:rgba(236,72,153,"] { background-color:rgba(143,184,204,0.10) !important; }
        main span[style*="width:6px"][style*="border-radius:50%"], main span[style*="width:7px"][style*="border-radius:50%"], main span[style*="width:8px"][style*="border-radius:50%"] { background:#8FB8CC !important; box-shadow:none !important; }
        html[data-theme="light"] main span[style*="width:6px"][style*="border-radius:50%"], html[data-theme="light"] main span[style*="width:7px"][style*="border-radius:50%"], html[data-theme="light"] main span[style*="width:8px"][style*="border-radius:50%"] { background:#245B78 !important; }

        /* ===== Filled buttons: always accent background with white text (wins over card/link colour rules) ===== */
        html[data-theme] main a[style*="background:#245B78"],
        html[data-theme] main a[style*="background:#4F6EF7"],
        html[data-theme] main a[style*="background:#8B5CF6"],
        html[data-theme] main a[style*="background:#F59E0B"],
        html[data-theme] main a[style*="background:#10B981"],
        html[data-theme] main a[style*="background:#06B6D4"],
        html[data-theme] main button[style*="background:#245B78"],
        html[data-theme] main button[style*="background:#4F6EF7"],
        html[data-theme] main button[style*="background:#8B5CF6"],
        html[data-theme] main button[style*="background:#F59E0B"],
        html[data-theme] main button[style*="background:#10B981"],
        html[data-theme] main button[style*="background:#06B6D4"],
        html[data-theme] main a.hopn-lift-btn,
        html[data-theme] main .hopn-lift-btn { background:#245B78 !important; background-image:none !important; color:#FFFFFF !important; border-color:#245B78 !important; }
        html[data-theme] main a[style*="background:#245B78"]:hover,
        html[data-theme] main a[style*="background:#4F6EF7"]:hover,
        html[data-theme] main a[style*="background:#8B5CF6"]:hover,
        html[data-theme] main a[style*="background:#F59E0B"]:hover,
        html[data-theme] main a[style*="background:#10B981"]:hover,
        html[data-theme] main a[style*="background:#06B6D4"]:hover,
        html[data-theme] main button[style*="background:#245B78"]:hover,
        html[data-theme] main button[style*="background:#4F6EF7"]:hover,
        html[data-theme] main button[style*="background:#8B5CF6"]:hover,
        html[data-theme] main button[style*="background:#F59E0B"]:hover,
        html[data-theme] main button[style*="background:#10B981"]:hover,
        html[data-theme] main button[style*="background:#06B6D4"]:hover,
        html[data-theme] main a.hopn-lift-btn:hover { background:#1D4D66 !important; color:#FFFFFF !important; }
        html[data-theme="light"] main .hopn-avatar { background:#E3EAEE !important; color:#243746 !important; }
        html[data-theme="light"] footer a[aria-label="HOPn"] svg path { stroke:#245B78 !important; }
        html[data-theme="light"] footer a[aria-label="HOPn"] svg circle { fill:#245B78 !important; }
        /* Required-field asterisks and small red/rose text must stay readable on light surfaces */
        html[data-theme="light"] main .text-rose-400, html[data-theme="light"] main .text-red-400 { color:#B42318 !important; }
    </style>

    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var themeButton = document.getElementById('hopn-theme-toggle');
        if (themeButton) {
            themeButton.addEventListener('click', function() {
                var nextTheme = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', nextTheme);
                localStorage.setItem('hopn_theme', nextTheme);
                themeButton.setAttribute('aria-label', nextTheme === 'light' ? 'Switch to dark theme' : 'Switch to light theme');
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Global scroll-reveal animation (used across all pages via .hopn-reveal)
        var revealEls = document.querySelectorAll('.hopn-reveal');
        if (revealEls.length > 0) {
            if (!('IntersectionObserver' in window)) {
                revealEls.forEach(function (el) { el.classList.add('is-visible'); });
            } else {
                var revealObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
                revealEls.forEach(function (el) { revealObserver.observe(el); });
            }
        }
    });

    function setCookie(name, value, days, domain) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        var domainStr = domain ? '; domain=' + domain : '';
        document.cookie = name + '=' + value + expires + domainStr + '; path=/';
    }

    function getCookie(name) {
        var nameEQ = name + '=';
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function deleteCookie(name, domain) {
        var domainStr = domain ? '; domain=' + domain : '';
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/' + domainStr + ';';
    }
    </script>

    @stack('head')
</head>
<body @if($lang === 'ar') style="direction:rtl;" @endif>
    <a href="#main-content" class="hopn-skip-link">{{ $lang === 'ar' ? 'تخطَّ إلى المحتوى' : ($lang === 'de' ? 'Zum Inhalt springen' : 'Skip to content') }}</a>
    <x-nav />
    <main id="main-content" tabindex="-1" class="min-h-[70vh] @if($lang !== 'ar') py-10 @endif">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    <x-analytics />
    @if(session('status'))
        <div id="hopn-flash-status" data-message="{{ session('status') }}" data-type="success" style="display:none;"></div>
    @endif
    @stack('scripts')
</body>
</html>
