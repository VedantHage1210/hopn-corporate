@php
    $postTitle   = $lang === 'ar' && $post->title_ar ? $post->title_ar : ($lang === 'de' && $post->title_de ? $post->title_de : $post->title);
    $postExcerpt = $lang === 'ar' && $post->excerpt_ar ? $post->excerpt_ar : ($lang === 'de' && $post->excerpt_de ? $post->excerpt_de : $post->excerpt);
    $postContent = $lang === 'ar' && $post->content_ar ? $post->content_ar : ($lang === 'de' && $post->content_de ? $post->content_de : $post->content);
    $postMetaTitle = $lang === 'ar' && $post->meta_title_ar ? $post->meta_title_ar : ($lang === 'de' && $post->meta_title_de ? $post->meta_title_de : ($post->meta_title ?: $postTitle));
    $postMetaDesc  = $lang === 'ar' && $post->meta_description_ar ? $post->meta_description_ar : ($lang === 'de' && $post->meta_description_de ? $post->meta_description_de : ($post->meta_description ?: $postExcerpt));
@endphp
<x-layouts.public :title="$postMetaTitle" :description="$postMetaDesc">
    <x-hero :title="$postTitle" :subtitle="$postExcerpt" />
    <section class="container-shell mt-8 hopn-reveal">
        <a href="{{ route('insights.index', ['lang' => $lang]) }}" class="text-sm text-slate-400 hover:text-white">
            ← @if($lang === 'ar') العودة إلى الرؤى @elseif($lang === 'de') Zurück zu Insights @else Back to Insights @endif
        </a>
        <article class="card-panel p-6 md:p-10 mt-4 text-slate-300 leading-relaxed" @if($lang === 'ar') dir="rtl" @endif>
            {!! nl2br(e($postContent)) !!}
        </article>

        @if($related->count() > 0)
        <div class="mt-12">
            <h2 class="text-xl font-semibold text-white mb-4">
                @if($lang === 'ar') مقالات ذات صلة @elseif($lang === 'de') Ähnliche Artikel @else Related Articles @endif
            </h2>
            <div class="grid gap-4 md:grid-cols-3">
                @foreach($related as $item)
                    <x-blog-card :post="$item" />
                @endforeach
            </div>
        </div>
        @endif
    </section>
</x-layouts.public>
