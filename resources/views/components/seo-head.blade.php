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
<meta name="keywords" content="HOPn, innovation ecosystem, AI, robotics, digital twins, startups, Europe, Germany">
<meta name="author" content="HOPn UG (haftungsbeschränkt)">
{{--
    Staging/preview environments must never be indexed. Set APP_ENV=staging
    (or STAGING=true) in Railway's environment variables for the staging
    deployment, and this automatically switches to noindex — no code change
    needed when promoting to production.
--}}
<meta name="robots" content="{{ (app()->environment('staging') || env('STAGING')) ? 'noindex, nofollow' : 'index, follow' }}">
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

{{-- Schema.org structured data --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "HOPn",
    "legalName": "HOPn UG (haftungsbeschränkt)",
    "url": "{{ url('/') }}",
    @if(!empty($siteSettings['office_address'] ?? null))
    "address": {!! json_encode(['@type' => 'PostalAddress', 'streetAddress' => $siteSettings['office_address']]) !!},
    @endif
    "sameAs": [
        "https://www.linkedin.com/company/hopn-ug/"
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "HOPn",
    "url": "{{ url('/') }}",
    "inLanguage": ["en", "de", "ar"]
}
</script>
@isset($schemaExtra)
<script type="application/ld+json">{!! $schemaExtra !!}</script>
@endisset

{{-- Favicon --}}
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'><rect width='40' height='40' rx='8' fill='%23030712'/><path d='M20 8 L32 30 L8 30 Z' fill='none' stroke='%238B5CF6' stroke-width='3.4' stroke-linejoin='round'/><circle cx='20' cy='8' r='3.4' fill='%238B5CF6'/><circle cx='8' cy='30' r='3.4' fill='%238B5CF6'/><circle cx='32' cy='30' r='3.4' fill='%238B5CF6'/></svg>">