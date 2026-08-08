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

        /* Hide Google Translate UI - aggressively, including any loading/spinner state */
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        .goog-te-ftab-frame,
        #goog-gt-tt,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-te-spinner-pos,
        .goog-te-gadget,
        .goog-te-gadget-simple,
        .goog-te-menu-value,
        .goog-te-menu-frame,
        #goog-gt-,
        #google_translate_element,
        #google_translate_element2,
        .skiptranslate,
        iframe.skiptranslate,
        iframe[id^="goog-gt"],
        iframe[class*="goog-te"],
        div[id^="goog-gt-"],
        div[class^="goog-te"] {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
            width: 0 !important;
            overflow: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
        /* goog-text-highlight wraps actual translated text (not decoration-only),
           so it must stay visible - just strip the highlight box/background. */
        .goog-text-highlight, .goog-text-highlight * {
            background-color: transparent !important;
            background: none !important;
            box-shadow: none !important;
            border: none !important;
        }
        * { -webkit-tap-highlight-color: transparent; }
        h1, h2, h3, p, span, a, button { user-select: none; -webkit-user-select: none; }
        ::selection { background: transparent; }
        body {
            top: 0 !important;
            position: static !important;
        }
        iframe.goog-te-banner-frame,
        iframe.skiptranslate {
            display: none !important;
        }
        body > .skiptranslate {
            display: none !important;
        }

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
    </style>

    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,de,ar',
            autoDisplay: false,
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }

    function getCookieDomainVariants() {
        var host = window.location.hostname;
        var domains = [host, '.' + host];
        var parts = host.split('.');
        if (parts.length > 2) {
            var parent = parts.slice(-2).join('.');
            domains.push(parent, '.' + parent);
        }
        return domains;
    }

    function clearGoogTransEverywhere() {
        document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        getCookieDomainVariants().forEach(function(d) {
            document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + d + ';';
        });
    }

    function setGoogTransEverywhere(value) {
        var expires = '; max-age=' + (365 * 24 * 60 * 60);
        document.cookie = 'googtrans=' + value + expires + '; path=/;';
        getCookieDomainVariants().forEach(function(d) {
            document.cookie = 'googtrans=' + value + expires + '; path=/; domain=' + d + ';';
        });
    }

    function triggerGoogleTranslate(lang) {
        clearGoogTransEverywhere();
        if (lang === 'en') {
            location.reload();
            return;
        }
        setGoogTransEverywhere('/en/' + lang);
        location.reload();
    }

    function hideGoogleBar() {
        var elements = document.querySelectorAll(
            '.goog-te-banner-frame, .skiptranslate, #goog-gt-tt, .goog-te-balloon-frame'
        );
        elements.forEach(function(el) {
            el.style.display = 'none';
            el.style.visibility = 'hidden';
        });
        document.body.style.top = '0px';
        document.body.style.marginTop = '0px';
    }

    var isStrippingHighlight = false;
    function stripGoogleHighlight() {
        if (isStrippingHighlight) return;
        isStrippingHighlight = true;
        var highlighted = document.querySelectorAll(
            '.goog-text-highlight, font[style*="background-color"], span[style*="background-color"], font[style*="box-shadow"], span[style*="box-shadow"]'
        );
        highlighted.forEach(function(el) {
            if (el.style.backgroundColor !== 'transparent') {
                el.style.setProperty('background-color', 'transparent', 'important');
            }
            if (el.style.background !== 'none') {
                el.style.setProperty('background', 'none', 'important');
            }
            if (el.style.boxShadow !== 'none') {
                el.style.setProperty('box-shadow', 'none', 'important');
            }
            if (el.classList.contains('goog-text-highlight')) {
                el.classList.remove('goog-text-highlight');
            }
        });
        isStrippingHighlight = false;
    }

    document.addEventListener('DOMContentLoaded', function() {
        hideGoogleBar();
        stripGoogleHighlight();
        var observer = new MutationObserver(function() {
            hideGoogleBar();
            stripGoogleHighlight();
        });
        // Watch for new nodes AND style/class attribute changes (Google applies its
        // highlight via inline style/class after click). The equality guards inside
        // stripGoogleHighlight() prevent redundant re-application, so this does not
        // create a feedback loop with our own fix.
        observer.observe(document.body, { childList: true, subtree: true, attributes: true, attributeFilter: ['style', 'class'] });

        // Belt-and-suspenders: Google Translate applies its highlight in direct
        // response to click events. Re-run the strip shortly after every click.
        document.addEventListener('click', function() {
            setTimeout(stripGoogleHighlight, 50);
            setTimeout(stripGoogleHighlight, 200);
        }, true);

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
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async></script>

    @stack('head')
</head>
<body @if($lang === 'ar') style="direction:rtl;" @endif>
    <div id="google_translate_element" style="display:none; visibility:hidden;"></div>
    <x-nav />
    <main class="min-h-[70vh] @if($lang !== 'ar') py-10 @endif">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @stack('scripts')
</body>
</html>