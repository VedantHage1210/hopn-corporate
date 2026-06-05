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

        /* Hide Google Translate UI */
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        .goog-te-ftab-frame,
        #goog-gt-tt,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-text-highlight,
        .goog-te-spinner-pos,
        .goog-te-gadget,
        #google_translate_element,
        .skiptranslate {
            display: none !important;
            visibility: hidden !important;
        }
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

    function triggerGoogleTranslate(lang) {
        if (lang === 'en') {
            deleteCookie('googtrans');
            deleteCookie('googtrans', '.hopn-corporate-production-e881.up.railway.app');
            location.reload();
            return;
        }
        setCookie('googtrans', '/en/' + lang, 365);
        setCookie('googtrans', '/en/' + lang, 365, '.hopn-corporate-production-e881.up.railway.app');
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

    document.addEventListener('DOMContentLoaded', function() {
        hideGoogleBar();
        var observer = new MutationObserver(function() {
            hideGoogleBar();
        });
        observer.observe(document.body, { childList: true, subtree: true });
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
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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
