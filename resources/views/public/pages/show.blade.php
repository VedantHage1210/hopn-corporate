<x-layouts.public :title="$page->title_ar && $lang === 'ar' ? $page->title_ar : ($page->title_de && $lang === 'de' ? $page->title_de : ($page->title ?? ''))">
@php
    $t = fn ($en, $de, $ar) => $lang === 'ar' ? $ar : ($lang === 'de' ? $de : $en);

    $title = $lang === 'ar' && !empty($page->title_ar) ? $page->title_ar
           : ($lang === 'de' && !empty($page->title_de) ? $page->title_de
           : ($page->title ?? ''));

    $excerpt = $lang === 'ar' && !empty($page->excerpt_ar) ? $page->excerpt_ar
             : ($lang === 'de' && !empty($page->excerpt_de) ? $page->excerpt_de
             : ($page->excerpt ?? ''));

    $content = $lang === 'ar' && !empty($page->content_ar) ? $page->content_ar
             : ($lang === 'de' && !empty($page->content_de) ? $page->content_de
             : ($page->content_en ?? ''));

    $visibleBlocks = $page->blocks->where('is_visible', true);

    // Only http(s), mailto, tel, relative and anchor links are rendered as links.
    $safeUrl = function ($url) {
        $url = trim((string) $url);
        if ($url === '') return null;
        return preg_match('~^(https?://|mailto:|tel:|/|#)~i', $url) ? $url : null;
    };
    $isExternal = fn ($url) => (bool) preg_match('~^https?://~i', (string) $url)
        && strcasecmp((string) parse_url($url, PHP_URL_HOST), request()->getHost()) !== 0;

    $externalUrl  = $safeUrl($page->external_url);
    $externalHost = $externalUrl ? preg_replace('~^www\.~i', '', (string) parse_url($externalUrl, PHP_URL_HOST)) : null;
    $quoteOpen  = $lang === 'de' ? '„' : ($lang === 'ar' ? '«' : '“');
    $quoteClose = $lang === 'de' ? '“' : ($lang === 'ar' ? '»' : '”');
    $hasBody = $visibleBlocks->count() > 0 || !empty($content);

    // Consecutive single-card "cards" blocks are shown side by side in one row instead of stacking one below the other.
    // A cards block with several cards keeps its own grid.
    $blockGroups = [];
    foreach ($visibleBlocks as $b) {
        $last = count($blockGroups) - 1;
        $single = $b->block_type === 'cards' && count($b->contentFor($lang)['items'] ?? []) === 1;
        if ($single && $last >= 0 && $blockGroups[$last]['type'] === 'cardrow') {
            $blockGroups[$last]['blocks'][] = $b;
        } else {
            $blockGroups[] = ['type' => $single ? 'cardrow' : $b->block_type, 'blocks' => [$b]];
        }
    }
@endphp

<style>
    .hopn-cms { --c-ink:#F1F5F9; --c-muted:#CBD5E1; --c-faint:#94A3B8; --c-line:rgba(255,255,255,0.14); --c-panel:rgba(255,255,255,0.04); --c-surface:#030712; --c-surface-alt:#080D1A; --c-accent:#8FB8CC; --c-btn:#245B78; --c-btn-hover:#1D4D66; }
    html[data-theme="light"] .hopn-cms { --c-ink:#172331; --c-muted:#43515F; --c-faint:#526170; --c-line:#D7DEE3; --c-panel:#FFFFFF; --c-surface:#F6F7F4; --c-surface-alt:#F6F7F4; --c-accent:#245B78; }
    .hopn-cms-head { background:var(--c-surface); padding:72px 0 40px; }
    .hopn-cms-body { background:var(--c-surface-alt); padding:24px 0 88px; }
    .hopn-cms .wrap { max-width:1100px; margin:0 auto; }
    .hopn-cms-crumbs { display:flex; align-items:center; gap:8px; flex-wrap:wrap; font-size:13px; color:var(--c-faint); margin-bottom:22px; }
    .hopn-cms-crumbs a { color:var(--c-accent); text-decoration:none; }
    .hopn-cms-crumbs a:hover { text-decoration:underline; }
    .hopn-cms h1 { font-size:clamp(30px,4.6vw,52px); font-weight:800; line-height:1.12; letter-spacing:-1.2px; color:var(--c-ink); margin:0 0 18px; max-width:860px; }
    .hopn-cms-lead { font-size:clamp(16px,2vw,19px); line-height:1.7; color:var(--c-muted); max-width:760px; margin:0 0 26px; }
    .hopn-cms-btn { display:inline-flex; align-items:center; gap:8px; padding:12px 24px; border-radius:8px; background:var(--c-btn); color:#FFFFFF !important; font-size:14px; font-weight:700; text-decoration:none; border:1px solid var(--c-btn); }
    .hopn-cms-btn:hover { background:var(--c-btn-hover); border-color:var(--c-btn-hover); }
    .hopn-cms-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:40px; align-items:start; }
    .hopn-cms-grid.has-aside { grid-template-columns:minmax(0,1fr) minmax(260px,320px); }
    .hopn-cms-main { display:flex; flex-direction:column; gap:28px; min-width:0; }
    .hopn-cms-grid:not(.has-aside) .hopn-cms-main { max-width:880px; width:100%; }
    .hopn-cms-panel { border:1px solid var(--c-line); background:var(--c-panel); border-radius:14px; padding:30px; }
    .hopn-cms h2 { font-size:21px; font-weight:800; line-height:1.3; color:var(--c-ink); margin:0 0 12px; letter-spacing:-0.3px; }
    .hopn-cms h3 { font-size:16px; font-weight:700; line-height:1.35; color:var(--c-ink); margin:0 0 8px; }
    .hopn-cms-text { color:var(--c-muted); font-size:15.5px; line-height:1.85; white-space:pre-line; margin:0; }
    .hopn-cms-hero-block { padding:12px 0; }
    .hopn-cms-hero-block h2 { font-size:clamp(24px,3.4vw,34px); letter-spacing:-0.8px; margin-bottom:10px; }
    .hopn-cms-hero-block p { color:var(--c-muted); font-size:16px; line-height:1.7; margin:0; max-width:680px; }
    .hopn-cms figure { margin:0; }
    .hopn-cms figure img { display:block; width:100%; aspect-ratio:16 / 9; height:auto; max-height:520px; object-fit:cover; object-position:50% 20%; border-radius:14px; border:1px solid var(--c-line); }
    .hopn-cms figcaption { color:var(--c-faint); font-size:13px; margin-top:10px; }
    .hopn-cms-cta { border:1px solid var(--c-line); background:var(--c-panel); border-radius:14px; padding:34px 30px; text-align:center; }
    .hopn-cms-cta h2 { margin-bottom:18px; }
    .hopn-cms-quote { margin:0; padding-inline-start:20px; border-inline-start:3px solid var(--c-accent); }
    .hopn-cms-quote p { color:var(--c-ink); font-size:18px; line-height:1.7; margin:0 0 10px; }
    .hopn-cms-quote cite { color:var(--c-faint); font-size:13px; font-style:normal; }
    .hopn-cms-cardgroup { min-width:0; }
    .hopn-cms-cardgroup h2.is-compact { font-size:18px; }
    .hopn-cms-cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:16px; }
    .hopn-cms-cardrow { display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:24px; align-items:start; }
    .hopn-cms-card { display:flex; flex-direction:column; gap:6px; border:1px solid var(--c-line); background:var(--c-panel); border-radius:12px; padding:24px; text-decoration:none; }
    a.hopn-cms-card:hover { border-color:var(--c-accent); }
    .hopn-cms-card p { color:var(--c-muted); font-size:14.5px; line-height:1.7; margin:0; }
    .hopn-cms-card p.body-only { font-size:15px; line-height:1.8; }
    .hopn-cms-card .more { margin-top:10px; font-size:13px; font-weight:700; color:var(--c-accent); }
    .hopn-cms-facts { border:1px solid var(--c-line); background:var(--c-panel); border-radius:14px; padding:24px 26px; position:sticky; top:96px; }
    .hopn-cms-facts h2 { font-size:12px; letter-spacing:0.14em; text-transform:uppercase; color:var(--c-faint); margin-bottom:6px; }
    .hopn-cms-facts dl { margin:0; }
    .hopn-cms-facts .row { display:grid; grid-template-columns:96px minmax(0,1fr); gap:12px; padding:14px 0; border-top:1px solid var(--c-line); font-size:14px; }
    .hopn-cms-facts dt { color:var(--c-faint); }
    .hopn-cms-facts dd { margin:0; color:var(--c-ink); overflow-wrap:anywhere; }
    .hopn-cms-facts dd a { color:var(--c-accent); font-weight:700; text-decoration:none; }
    .hopn-cms-facts dd a:hover { text-decoration:underline; }
    .hopn-cms-back { margin-top:36px; }
    .hopn-cms-back a { font-size:14px; font-weight:600; color:var(--c-accent); text-decoration:none; }
    .hopn-cms-ext { width:0.9em; height:0.9em; flex-shrink:0; }
    html[dir="rtl"] .hopn-cms-ext { transform:scaleX(-1); }
    @media (max-width:900px) { .hopn-cms-grid.has-aside { grid-template-columns:minmax(0,1fr); } .hopn-cms-facts { position:static; } .hopn-cms-head { padding:48px 0 28px; } }
    @media (max-width:520px) { .hopn-cms-panel, .hopn-cms-cta { padding:22px 20px; } .hopn-cms-facts .row { grid-template-columns:1fr; gap:4px; } }
</style>

@if(!empty($isPreview))
<div style="background:#F59E0B; color:#022C22; text-align:center; padding:10px; font-size:13px; font-weight:700;">
    PREVIEW MODE — this page is {{ strtoupper($page->status) }} and not publicly visible yet. This link expires in 24 hours.
</div>
@endif

<div class="hopn-cms" @if($lang === 'ar') dir="rtl" @endif>

    {{-- Page header --}}
    <section class="hopn-cms-head">
        <div class="container-shell"><div class="wrap">
            <nav class="hopn-cms-crumbs" aria-label="{{ $t('Breadcrumb', 'Brotkrumen', 'مسار التنقل') }}">
                <a href="{{ route('home', ['lang' => $lang]) }}">{{ $t('Home', 'Startseite', 'الرئيسية') }}</a>
                <span aria-hidden="true">/</span>
                <span>{{ $title }}</span>
            </nav>
            <h1>{{ $title }}</h1>
            @if(!empty($excerpt))<p class="hopn-cms-lead">{{ $excerpt }}</p>@endif
            @if($externalUrl)
            <a class="hopn-cms-btn" href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer">
                {{ $t('Visit website', 'Website besuchen', 'زيارة الموقع') }}
                <svg class="hopn-cms-ext" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 3H3v10h10v-3M9 3h4v4M13 3L7 9"/></svg>
            </a>
            @endif
        </div></div>
    </section>

    {{-- Body: page blocks first (in the order set in the admin panel), then the plain content --}}
    <section class="hopn-cms-body">
        <div class="container-shell"><div class="wrap">
            <div class="hopn-cms-grid {{ $externalUrl ? 'has-aside' : '' }}">
                <div class="hopn-cms-main">
                    @foreach($blockGroups as $group)
                    @if($group['type'] === 'cardrow' && count($group['blocks']) > 1)
                        <div class="hopn-cms-cardrow">
                            @foreach($group['blocks'] as $cardBlock)
                                <x-cms-cards :block="$cardBlock" :lang="$lang" :compact="true" />
                            @endforeach
                        </div>
                    @else
                    @foreach($group['blocks'] as $block)
                    @php $bc = $block->contentFor($lang); $bTitle = $block->publicTitleFor($lang); @endphp

                    @if($block->block_type === 'text')
                        @if(!empty($bc['body']))
                        <div class="hopn-cms-panel">
                            @if($bTitle)<h2>{{ $bTitle }}</h2>@endif
                            <p class="hopn-cms-text">{{ $bc['body'] }}</p>
                        </div>
                        @endif

                    @elseif($block->block_type === 'hero')
                        @if(!empty($bc['heading']))
                        <div class="hopn-cms-hero-block">
                            <h2>{{ $bc['heading'] }}</h2>
                            @if(!empty($bc['subheading']))<p>{{ $bc['subheading'] }}</p>@endif
                        </div>
                        @endif

                    @elseif($block->block_type === 'image')
                        @if(!empty($bc['url']))
                        <figure>
                            <img loading="lazy" decoding="async" src="{{ $bc['url'] }}" alt="{{ $bc['caption'] ?? $bTitle ?? '' }}" onerror="this.closest('figure').style.display='none'">
                            @if(!empty($bc['caption']))<figcaption>{{ $bc['caption'] }}</figcaption>@endif
                        </figure>
                        @endif

                    @elseif($block->block_type === 'cta')
                        @php $ctaUrl = $safeUrl($bc['button_url'] ?? ''); $ctaExt = $ctaUrl && $isExternal($ctaUrl); @endphp
                        @if(!empty($bc['heading']) || $ctaUrl)
                        <div class="hopn-cms-cta">
                            @if(!empty($bc['heading']))<h2>{{ $bc['heading'] }}</h2>@endif
                            @if($ctaUrl)
                            <a class="hopn-cms-btn" href="{{ $ctaUrl }}" @if($ctaExt) target="_blank" rel="noopener noreferrer" @endif>
                                {{ $bc['button_label'] ?? $t('Learn more', 'Mehr erfahren', 'اعرف المزيد') }}
                                @if($ctaExt)<svg class="hopn-cms-ext" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 3H3v10h10v-3M9 3h4v4M13 3L7 9"/></svg>@endif
                            </a>
                            @endif
                        </div>
                        @endif

                    @elseif($block->block_type === 'quote')
                        @if(!empty($bc['quote']))
                        <blockquote class="hopn-cms-quote">
                            <p>{{ $quoteOpen }}{{ $bc['quote'] }}{{ $quoteClose }}</p>
                            @if(!empty($bc['author']))<cite>— {{ $bc['author'] }}</cite>@endif
                        </blockquote>
                        @endif

                    @elseif($block->block_type === 'cards')
                        <x-cms-cards :block="$block" :lang="$lang" />
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    @if(!empty($content))
                    <div class="hopn-cms-panel"><p class="hopn-cms-text">{{ $content }}</p></div>
                    @elseif(!$hasBody && !$externalUrl)
                    <div class="hopn-cms-panel"><p class="hopn-cms-text">{{ $t('Content coming soon.', 'Inhalt kommt bald.', 'المحتوى قادم قريباً.') }}</p></div>
                    @endif
                </div>

                @if($externalUrl)
                <aside class="hopn-cms-facts" aria-label="{{ $t('Details', 'Details', 'التفاصيل') }}">
                    <h2>{{ $t('Details', 'Details', 'التفاصيل') }}</h2>
                    <dl>
                        <div class="row">
                            <dt>{{ $t('Website', 'Website', 'الموقع') }}</dt>
                            <dd>
                                <a href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer">{{ $externalHost }}
                                    <svg class="hopn-cms-ext" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 3H3v10h10v-3M9 3h4v4M13 3L7 9"/></svg>
                                </a>
                            </dd>
                        </div>
                    </dl>
                </aside>
                @endif
            </div>

            <div class="hopn-cms-back">
                <a href="{{ route('home', ['lang' => $lang]) }}">{{ $lang === 'ar' ? '→' : '←' }} {{ $t('Back to Home', 'Zurück zur Startseite', 'العودة للرئيسية') }}</a>
            </div>
        </div></div>
    </section>
</div>
</x-layouts.public>
