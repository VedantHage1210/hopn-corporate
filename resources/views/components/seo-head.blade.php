@php
    $pageTitle = $title ?? config('app.name');
    $description = $description ?? 'HOPn enterprise services and programs.';
@endphp
<meta name="description" content="{{ $description }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:type" content="website">
<link rel="canonical" href="{{ url()->current() }}">
