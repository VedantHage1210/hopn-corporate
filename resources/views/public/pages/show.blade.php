<x-layouts.public :title="$page->title_ar && $lang === 'ar' ? $page->title_ar : ($page->title_de && $lang === 'de' ? $page->title_de : ($page->title ?? ''))">
@php
    $title = $lang === 'ar' && !empty($page->title_ar) ? $page->title_ar
           : ($lang === 'de' && !empty($page->title_de) ? $page->title_de
           : ($page->title ?? ''));

   $content = $lang === 'ar' && !empty($page->content_ar) ? $page->content_ar
         : ($lang === 'de' && !empty($page->content_de) ? $page->content_de
         : ($page->content_en ?? $page->excerpt ?? ''));

   $visibleBlocks = $page->blocks->where('is_visible', true);
@endphp

@if(!empty($isPreview))
<div style="background:#F59E0B; color:#022C22; text-align:center; padding:10px; font-size:13px; font-weight:700;">
    PREVIEW MODE — this page is {{ strtoupper($page->status) }} and not publicly visible yet. This link expires in 24 hours.
</div>
@endif

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; pointer-events:none;
        background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
        background-size: 48px 48px;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.08); filter:blur(80px);"></div>

    <div class="container-shell" style="position:relative; z-index:10;" @if($lang === 'ar') dir="rtl" @endif>

        {{-- Breadcrumb --}}
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:24px; font-size:13px; color:#94A3B8;">
            <a href="{{ route('home', ['lang' => $lang]) }}" style="color:#94A3B8; text-decoration:none; hover:color:white;">
                {{ $lang === 'ar' ? 'الرئيسية' : ($lang === 'de' ? 'Startseite' : 'Home') }}
            </a>
            <span>→</span>
            <span style="color:#CBD5E1;">{{ $title }}</span>
        </div>

        <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin-bottom:20px;">
            {{ $title }}
        </h1>
    </div>
</section>

{{-- Content --}}
<section style="padding:60px 0 80px; background:#080D1A;">
    <div class="container-shell" style="max-width:800px;" @if($lang === 'ar') dir="rtl" @endif>
        <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:40px;">
            @if(!empty($content))
                <div style="color:#CBD5E1; line-height:1.9; font-size:15px; white-space:pre-line;">{{ $content }}</div>
            @else
                <p style="color:#94A3B8; font-size:15px;">
                    {{ $lang === 'ar' ? 'المحتوى قادم قريباً.' : ($lang === 'de' ? 'Inhalt kommt bald.' : 'Content coming soon.') }}
                </p>
            @endif
        </div>

        {{-- Back --}}
        <div style="margin-top:32px;">
            <a href="{{ route('home', ['lang' => $lang]) }}"
               style="font-size:13px; color:#4F6EF7; text-decoration:none;">
                ← {{ $lang === 'ar' ? 'العودة للرئيسية' : ($lang === 'de' ? 'Zurück zur Startseite' : 'Back to Home') }}
            </a>
        </div>
    </div>
</section>

{{-- Page Builder Blocks --}}
@if($visibleBlocks->count())
<section style="padding:0 0 80px; background:#080D1A;">
    <div class="container-shell" style="max-width:800px; display:flex; flex-direction:column; gap:24px;" @if($lang === 'ar') dir="rtl" @endif>
        @foreach($visibleBlocks as $block)
        @php $bc = $block->contentFor($lang); $bTitle = $block->titleFor($lang); @endphp

        @if($block->block_type === 'text')
            <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:32px;">
                @if($bTitle)<h3 style="color:white; font-size:18px; font-weight:800; margin:0 0 12px;">{{ $bTitle }}</h3>@endif
                <div style="color:#CBD5E1; line-height:1.9; font-size:15px; white-space:pre-line;">{{ $bc['body'] ?? '' }}</div>
            </div>
        @elseif($block->block_type === 'hero')
            <div style="text-align:center; padding:20px 0;">
                <h2 style="color:white; font-size:28px; font-weight:900; margin:0 0 10px;">{{ $bc['heading'] ?? '' }}</h2>
                @if(!empty($bc['subheading']))<p style="color:#94A3B8; font-size:15px;">{{ $bc['subheading'] }}</p>@endif
            </div>
        @elseif($block->block_type === 'image')
            @if(!empty($bc['url']))
            <figure style="margin:0;">
                <img loading="lazy" decoding="async" src="{{ $bc['url'] }}" alt="{{ $bc['caption'] ?? $bTitle }}" style="width:100%; border-radius:16px;">
                @if(!empty($bc['caption']))<figcaption style="color:#64748B; font-size:13px; margin-top:8px; text-align:center;">{{ $bc['caption'] }}</figcaption>@endif
            </figure>
            @endif
        @elseif($block->block_type === 'cta')
            <div style="text-align:center; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.06); border-radius:16px; padding:40px;">
                @if(!empty($bc['heading']))<h3 style="color:white; font-size:20px; font-weight:800; margin:0 0 20px;">{{ $bc['heading'] }}</h3>@endif
                @if(!empty($bc['button_url']))
                <a href="{{ $bc['button_url'] }}" style="display:inline-flex; padding:12px 28px; border-radius:10px; background:#4F6EF7; color:white; font-weight:700; font-size:14px; text-decoration:none;">{{ $bc['button_label'] ?? 'Learn more' }}</a>
                @endif
            </div>
        @elseif($block->block_type === 'quote')
            <blockquote style="border-left:3px solid #8B5CF6; padding-left:20px; margin:0;">
                <p style="color:#CBD5E1; font-size:17px; font-style:italic; line-height:1.7; margin:0 0 10px;">"{{ $bc['quote'] ?? '' }}"</p>
                @if(!empty($bc['author']))<cite style="color:#64748B; font-size:13px;">— {{ $bc['author'] }}</cite>@endif
            </blockquote>
        @elseif($block->block_type === 'cards')
            <div>
                @if($bTitle)<h3 style="color:white; font-size:18px; font-weight:800; margin:0 0 16px;">{{ $bTitle }}</h3>@endif
                <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:16px;">
                    @foreach($bc['items'] ?? [] as $card)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:20px;">
                        <h4 style="color:white; font-size:15px; font-weight:700; margin:0 0 8px;">{{ $card['title'] ?? '' }}</h4>
                        <p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0;">{{ $card['description'] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
        @endforeach
    </div>
</section>
@endif

</x-layouts.public>
