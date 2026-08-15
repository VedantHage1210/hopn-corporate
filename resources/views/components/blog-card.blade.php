@props(['post'])
@php
    $lang = request()->route('lang', 'en');
    $cardTitle = $lang === 'ar' && !empty($post->title_ar) ? $post->title_ar : ($lang === 'de' && !empty($post->title_de) ? $post->title_de : $post->title);
    $cardExcerpt = $lang === 'ar' && !empty($post->excerpt_ar) ? $post->excerpt_ar : ($lang === 'de' && !empty($post->excerpt_de) ? $post->excerpt_de : $post->excerpt);
@endphp
<article class="card-panel p-5">
    @if(!empty($post->featured_image_path))
        <img src="{{ Storage::url($post->featured_image_path) }}" alt="{{ $cardTitle }}" class="mb-3 h-40 w-full rounded object-cover" loading="lazy">
    @endif
    <h3 class="text-lg font-semibold text-white">{{ $cardTitle }}</h3>
    <p class="mt-2 text-sm text-slate-300">{{ $cardExcerpt }}</p>
    <a href="{{ route('insights.show', ['lang' => $lang, 'slug' => $post->slug]) }}" class="mt-4 inline-block text-sm text-indigo-300">{{ $lang === 'ar' ? 'اقرأ المزيد' : ($lang === 'de' ? 'Weiterlesen' : 'Read more') }}</a>
</article>
