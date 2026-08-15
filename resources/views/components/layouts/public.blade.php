<!DOCTYPE html>
@php $lang = request()->route('lang', app()->getLocale()); @endphp
<html lang="{{ $lang }}" @if($lang === 'ar') dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    </style>

    <script type="text/javascript">
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
    @stack('scripts')
</body>
</html>
