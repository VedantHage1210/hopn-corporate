@php
    $lang        = request()->route('lang', app()->getLocale());
    $pageTitle   = isset($title) ? $title . ' | HOPn' : 'HOPn — European Innovation Ecosystem';
    $pageDesc    = $description ?? 'HOPn is a European innovation ecosystem connecting business, education, research, startups, and investors through AI, data, robotics, and digital twins.';
    $pageImage   = $ogImage ?? asset('images/og-default.png');
    $pageUrl     = url()->current();
    $siteName    = 'HOPn';

    // Language-specific defaults
    if ($lang === 'de' && !isset($description)) {
        $pageDesc = 'HOPn ist ein europäischer Innovations-Hub, der Wirtschaft, Bildung, Forschung, Startups und Investoren verbindet.';
    } elseif ($lang === 'ar' && !isset($description)) {
        $pageDesc = 'HOPn هو مركز الابتكار الأوروبي الذي يربط الأعمال والتعليم والبحث والشركات الناشئة والمستثمرين.';
    }
@endphp

{{-- Basic Meta --}}
<meta name="description" content="{{ $pageDesc }}">
<meta name="keywords" content="HOPn, innovation ecosystem, AI, robotics, digital twins, startups, Europe, Germany, Berlin">
<meta name="author" content="HOPn Corporate GmbH">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $pageUrl }}">

{{-- Language --}}
<meta http-equiv="content-language" content="{{ $lang }}">
@if($lang === 'ar')
<meta name="direction" content="rtl">
@endif

{{-- Open Graph --}}
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDesc }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="{{ $lang === 'de' ? 'de_DE' : ($lang === 'ar' ? 'ar_SA' : 'en_US') }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDesc }}">
<meta name="twitter:image" content="{{ $pageImage }}">

{{-- Alternate Languages --}}
@php $currentPath = request()->getPathInfo(); @endphp
<link rel="alternate" hreflang="en" href="{{ url(preg_replace('#^/(en|de|ar)#', '/en', $currentPath)) }}">
<link rel="alternate" hreflang="de" href="{{ url(preg_replace('#^/(en|de|ar)#', '/de', $currentPath)) }}">
<link rel="alternate" hreflang="ar" href="{{ url(preg_replace('#^/(en|de|ar)#', '/ar', $currentPath)) }}">
<link rel="alternate" hreflang="x-default" href="{{ url(preg_replace('#^/(en|de|ar)#', '/en', $currentPath)) }}">

{{-- Favicon --}}
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%234F6EF7'/><text y='.9em' font-size='80' font-weight='900' fill='white' font-family='Arial'>H</text></svg>">
