<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
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
        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* RTL support */
        [dir="rtl"] body {
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
        }
    </style>
</head>
<body>
    <x-nav />
    <main class="min-h-[70vh]">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @stack('scripts')
    <script>
        // Scroll reveal
        document.addEventListener('DOMContentLoaded', function() {
            var reveals = document.querySelectorAll('section');
            reveals.forEach(function(el) {
                el.classList.add('reveal');
            });
            function checkReveal() {
                reveals.forEach(function(el) {
                    var top = el.getBoundingClientRect().top;
                    if (top < window.innerHeight - 80) {
                        el.classList.add('visible');
                    }
                });
            }
            checkReveal();
            window.addEventListener('scroll', checkReveal, { passive: true });
        });
    </script>
</body>
</html>
