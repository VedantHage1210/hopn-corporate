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
<script type="text/javascript"> function googleTranslateElementInit() {     new google.translate.TranslateElement({         pageLanguage: "en",         includedLanguages: "en,de,ar,fr,es",         layout: google.translate.TranslateElement.InlineLayout.SIMPLE,         autoDisplay: false     }, "google_translate_element"); } </script> <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> </head>
<body>
    <div id="google_translate_element" style="position:fixed;bottom:20px;right:20px;z-index:9999;background:#1e293b;padding:8px 12px;border-radius:8px;border:1px solid #334155;"></div> <x-nav />
    <main class="min-h-[70vh] py-10">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
    @stack('scripts')
</body>
</html>
