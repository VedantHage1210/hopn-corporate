<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'HOPn') . ' | HOPn' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.seo-head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('head')

    <style>
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

        // Cookie set karo aur page reload — instant translate
        setCookie('googtrans', '/en/' + lang, 365);
        setCookie('googtrans', '/en/' + lang, 365, '.hopn-corporate-production-e881.up.railway.app');
        location.reload();
    }

    // Google bar hamesha hide rakho
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
</head>
<body>
    <div id="google_translate_element" style="display:none; visibility:hidden;"></div>
    <x-nav />
    <main class="min-h-[70vh] py-10">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @stack('scripts')
</body>
</html>
