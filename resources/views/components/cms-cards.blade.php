@props(['block', 'lang' => 'en', 'compact' => false])
@php
    $bc = $block->contentFor($lang);
    $bTitle = $block->publicTitleFor($lang);
    $items = $bc['items'] ?? [];
    $safeUrl = function ($url) {
        $url = trim((string) $url);
        if ($url === '') return null;
        return preg_match('~^(https?://|mailto:|tel:|/|#)~i', $url) ? $url : null;
    };
    $isExternal = fn ($url) => (bool) preg_match('~^https?://~i', (string) $url)
        && strcasecmp((string) parse_url($url, PHP_URL_HOST), request()->getHost()) !== 0;
    $open = $lang === 'ar' ? 'فتح' : ($lang === 'de' ? 'Öffnen' : 'Open');
@endphp
@if(!empty($items))
<div class="hopn-cms-cardgroup">
    @if($bTitle)<h2 class="{{ $compact ? 'is-compact' : '' }}">{{ $bTitle }}</h2>@endif
    <div class="hopn-cms-cards">
        @foreach($items as $card)
            @php
                $cTitle = trim((string) ($card['title'] ?? ''));
                $cDesc  = trim((string) ($card['description'] ?? ''));
                $cUrl   = $safeUrl($card['url'] ?? '');
                $cExt   = $cUrl && $isExternal($cUrl);
                // A line written without "Title | Description" is a sentence, not a title: show it as body text.
                $bodyOnly = $cDesc === '' && mb_strlen($cTitle) > 80;
            @endphp
            @if($cUrl)
            <a class="hopn-cms-card" href="{{ $cUrl }}" @if($cExt) target="_blank" rel="noopener noreferrer" @endif>
            @else
            <div class="hopn-cms-card">
            @endif
                @if($bodyOnly)
                    <p class="body-only">{{ $cTitle }}</p>
                @else
                    @if($cTitle !== '')<h3>{{ $cTitle }}</h3>@endif
                    @if($cDesc !== '')<p>{{ $cDesc }}</p>@endif
                @endif
                @if($cUrl)<span class="more">{{ $open }} {{ $cExt ? '↗' : '→' }}</span>@endif
            @if($cUrl)
            </a>
            @else
            </div>
            @endif
        @endforeach
    </div>
</div>
@endif
