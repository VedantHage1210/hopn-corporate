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

    {{-- Google Translate tooltip/popup hide --}}
    <style>
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        #goog-gt-tt,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-text-highlight,
        .goog-te-spinner-pos {
            display: none !important;
        }
        body {
            top: 0 !important;
        }
        iframe.goog-te-banner-frame {
            display: none !important;
        }
    </style>

    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: "en",
            includedLanguages: "en,de,ar",
            autoDisplay: false
        }, "google_translate_element");
    }

    window.addEventListener('load', function() {
        var savedLang = getCookie('googtrans');
        if (!savedLang) {
            var pathLang = window.location.pathname.split('/')[1];
            if (pathLang === 'de' || pathLang === 'ar') {
                setTimeout(function() {
                    applyGoogleTranslate(pathLang);
                }, 1000);
            }
        }
    });

    function applyGoogleTranslate(lang) {
        if (lang === 'en') {
            deleteCookie('googtrans');
        } else {
            setCookie('googtrans', '/en/' + lang, 365);
            setCookie('googtrans', '/en/' + lang, 365, '.hopn-corporate-production-e881.up.railway.app');
        }
        function doTranslate() {
            var select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            } else {
                setTimeout(doTranslate, 300);
            }
        }
        doTranslate();
    }

    function triggerGoogleTranslate(lang) {
        applyGoogleTranslate(lang);
    }

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
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function deleteCookie(name) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
    <div id="google_translate_element" style="display:none;"></div>
    <x-nav />
    <main class="min-h-[70vh] py-10">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @stack('scripts')
</body>
</html>
