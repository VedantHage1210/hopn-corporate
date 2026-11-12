@php
    $lang = request()->route('lang', 'en');
    $title = $lang === 'ar' && $publication->title_ar ? $publication->title_ar : ($lang === 'de' && $publication->title_de ? $publication->title_de : $publication->title_en);
    $summary = $lang === 'ar' && $publication->summary_ar ? $publication->summary_ar : ($lang === 'de' && $publication->summary_de ? $publication->summary_de : $publication->summary_en);
@endphp
<x-layouts.public :title="$title">
@push('head')
<script type="application/ld+json">
{!! json_encode(array_filter([
    '@context' => 'https://schema.org',
    '@type' => 'ScholarlyArticle',
    'headline' => $title,
    'description' => $summary,
    'url' => url()->current(),
    'datePublished' => $publication->published_on?->toDateString(),
    'author' => $publication->authors ? array_map(fn ($author) => ['@type' => 'Person', 'name' => trim($author)], explode(',', $publication->authors)) : null,
    'image' => $publication->image_url,
    'isPartOf' => ['@type' => 'WebSite', 'name' => 'HOPn', 'url' => url('/')],
], fn ($value) => $value !== null && $value !== '')) !!}
</script>
@endpush
<x-research-theme />
<article class="rs-sec" style="padding:70px 0 100px;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell" style="max-width:900px;">
        <a class="rs-back" href="{{ route('research.index', ['lang' => $lang]) }}">← @if($lang==='ar') العودة إلى البحث @elseif($lang==='de') Zurück zur Forschung @else Back to research @endif</a>
        @if($publication->image_url)
            <img class="rs-hero-media" src="{{ $publication->image_url }}" alt="{{ $title }}">
        @else
            <x-card-art :seed="$title" :height="260" :radius="16" style="margin:28px 0;" />
        @endif
        @if($publication->project)<div class="rs-project">{{ $publication->project }}</div>@endif
        <h1 class="rs-h1">{{ $title }}</h1>
        <p class="rs-byline">{{ $publication->authors }}{{ $publication->authors && $publication->published_on ? ' · ' : '' }}{{ $publication->published_on?->locale(request()->route('lang','en'))->translatedFormat('F Y') }}</p>
        @if($summary)<div style="margin-top:30px;"><x-doc-body variant="stack" :dir="$lang === 'ar' ? 'rtl' : 'ltr'" :body="$summary" /></div>@endif
        <div class="rs-actions">
            @if($publication->pdf_url)<a class="rs-btn" href="{{ $publication->pdf_url }}" target="_blank" rel="noopener">@if($lang==='ar') تحميل PDF @elseif($lang==='de') PDF herunterladen @else Download PDF @endif</a>@endif
            @if($publication->external_url)<a class="rs-btn rs-btn--ghost" href="{{ $publication->external_url }}" target="_blank" rel="noopener">@if($lang==='ar') المصدر الخارجي @elseif($lang==='de') Externe Quelle @else External source @endif</a>@endif
        </div>
    </div>
</article>
</x-layouts.public>
