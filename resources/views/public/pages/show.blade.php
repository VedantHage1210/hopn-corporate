<x-layouts.public :title="$page->title_en ?? $page->title">
    <section style="padding:80px 0; background:#0A0F1E; min-height:60vh;">
        <div class="container-shell">
            <h1 style="font-size:clamp(28px,5vw,48px); font-weight:800; color:white; margin-bottom:24px;">
                @if($lang === 'ar' && !empty($page->title_ar))
                    {{ $page->title_ar }}
                @elseif($lang === 'de' && !empty($page->title_de))
                    {{ $page->title_de }}
                @else
                    {{ $page->title_en ?? $page->title }}
                @endif
            </h1>
            <div style="color:#94A3B8; line-height:1.8; font-size:16px;">
                @if($lang === 'ar' && !empty($page->excerpt_ar))
                    {{ $page->excerpt_ar }}
                @elseif($lang === 'de' && !empty($page->excerpt_de))
                    {{ $page->excerpt_de }}
                @else
                    {{ $page->excerpt_en ?? $page->excerpt ?? '' }}
                @endif
            </div>
        </div>
    </section>
</x-layouts.public>
