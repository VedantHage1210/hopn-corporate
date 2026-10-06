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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Arabic font --}}
    @if($lang === 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @else
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @endif

    <style>
        /* Font family based on language */
        @if($lang === 'ar')
        * { font-family: 'Cairo', sans-serif !important; }
        @else
        * { font-family: 'Inter', sans-serif !important; }
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

        .hopn-btn-primary { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s cubic-bezier(0.16,1,0.3,1); }
        .hopn-btn-primary:hover { transform:translateY(-3px); box-shadow:0 0 64px rgba(79,110,247,0.65); }
        .hopn-btn-primary-green { transition:transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s cubic-bezier(0.16,1,0.3,1); }
        .hopn-btn-primary-green:hover { transform:translateY(-3px); box-shadow:0 0 60px rgba(16,185,129,0.4); }
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
        html[data-theme="light"] main [class*="card"] a { color:#245B78 !important; opacity:1 !important; }
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
        html[data-theme="light"] main .card-panel a { color:#245B78 !important; opacity:1 !important; }
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
        html[data-theme="light"] main section a:not(.hopn-btn-primary):not(.hopn-btn-secondary):not(.hopn-btn-primary-green):not(.hopn-lift-btn) { color:#245B78 !important; }
        html[data-theme="light"] footer { background:#EAF0F2 !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] footer p, html[data-theme="light"] footer span,
        html[data-theme="light"] footer a, html[data-theme="light"] footer div[style*="color:#CBD5E1"],
        html[data-theme="light"] footer div[style*="color:#94A3B8"] { color:#243746 !important; font-weight:600; opacity:1 !important; }
        html[data-theme="light"] footer a[mailto] { color:#245B78 !important; }
        html[data-theme="light"] footer h1, html[data-theme="light"] footer h2,
        html[data-theme="light"] footer h3, html[data-theme="light"] footer strong { color:#172331 !important; font-weight:800; }
        html[data-theme="light"] .hopn-btn-secondary { background:#245B78 !important; border-color:#245B78 !important; color:#FFFFFF !important; box-shadow:0 8px 22px rgba(36,91,120,.22); font-weight:800; }
        html[data-theme="light"] .hopn-btn-primary { color:#FFFFFF !important; font-weight:800; }
        html[data-theme="light"] .hopn-dropdown-header { color:#526170 !important; border-color:#D7DEE3 !important; }
        html[data-theme="light"] .hopn-theme-toggle { background:#EEF3F5 !important; border-color:#C8D2D8 !important; color:#172331 !important; }
        html[data-theme="dark"] .hopn-theme-toggle { background:#0D1425; border-color:rgba(255,255,255,.14); color:#CBD5E1; }
        .hopn-theme-toggle { display:inline-flex; align-items:center; justify-content:center; width:42px; height:34px; border:1px solid; border-radius:9px; cursor:pointer; }
        .hopn-theme-toggle svg { width:16px; height:16px; }
        html[data-theme="light"] .hopn-theme-toggle .theme-moon { display:none; }
        html[data-theme="dark"] .hopn-theme-toggle .theme-sun { display:none; }
        .hopn-mobile-toggle { display:none !important; }
        @media (max-width:767px) { .hopn-mobile-toggle { display:flex !important; } }
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
    <x-nav />
    <main class="min-h-[70vh] @if($lang !== 'ar') py-10 @endif">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @if(session('status'))
        <div id="hopn-flash-status" data-message="{{ session('status') }}" data-type="success" style="display:none;"></div>
    @endif
    @stack('scripts')
</body>
</html>
