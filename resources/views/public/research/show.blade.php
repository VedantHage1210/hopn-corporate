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
<article style="padding:70px 0 100px; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell" style="max-width:900px;">
        <a href="{{ route('research.index', ['lang' => $lang]) }}" style="color:#94A3B8; text-decoration:none; font-size:13px;">← @if($lang==='ar') العودة إلى البحث @elseif($lang==='de') Zurück zur Forschung @else Back to research @endif</a>
        @if($publication->image_url)
            <img src="{{ $publication->image_url }}" alt="{{ $title }}" style="width:100%; max-height:430px; object-fit:cover; border-radius:16px; margin:28px 0;">
        @endif
        @if($publication->project)<div style="color:#4F6EF7; font-size:11px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; margin-bottom:14px;">{{ $publication->project }}</div>@endif
        <h1 style="color:white; font-size:clamp(30px,5vw,58px); line-height:1.1; margin:0 0 18px;">{{ $title }}</h1>
        <p style="color:#94A3B8; font-size:14px;">{{ $publication->authors }}{{ $publication->authors && $publication->published_on ? ' · ' : '' }}{{ $publication->published_on?->format('F Y') }}</p>
        @if($summary)<div style="margin-top:30px; color:#CBD5E1; font-size:17px; line-height:1.9; white-space:pre-line;">{{ $summary }}</div>@endif
        <div style="display:flex; flex-wrap:wrap; gap:14px; margin-top:32px;">
            @if($publication->pdf_url)<a href="{{ $publication->pdf_url }}" target="_blank" rel="noopener" style="padding:12px 18px; background:#4F6EF7; color:white; border-radius:8px; text-decoration:none; font-weight:700;">Download PDF</a>@endif
            @if($publication->external_url)<a href="{{ $publication->external_url }}" target="_blank" rel="noopener" style="padding:12px 18px; border:1px solid #4F6EF7; color:#A5B4FC; border-radius:8px; text-decoration:none; font-weight:700;">External publication link</a>@endif
        </div>
    </div>
</article>
</x-layouts.public>