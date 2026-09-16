@php
    $lang = request()->route('lang', 'en');
    $capabilities = $page->blocks->where('block_type', 'capability')->where('is_visible', true)->sortBy('sort_order');
    $useCases = $page->blocks->where('block_type', 'usecase')->where('is_visible', true)->sortBy('sort_order');
    $industries = $page->blocks->where('block_type', 'industry')->where('is_visible', true)->sortBy('sort_order');
    $deliverables = $page->blocks->where('block_type', 'deliverable')->where('is_visible', true)->sortBy('sort_order');
@endphp
<x-layouts.public :title="$page->t('hero_title', $lang)">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10;">
        @if($page->t('hero_eyebrow', $lang))
        <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">{{ $page->t('hero_eyebrow', $lang) }}</span>
        @endif
        <h1 style="font-size:clamp(30px,4.5vw,48px); font-weight:900; color:white; line-height:1.15; margin:16px 0 20px; max-width:800px;">{{ $page->t('hero_title', $lang) }}</h1>
        @if($page->t('hero_subtitle', $lang))
        <p style="font-size:16px; color:#CBD5E1; max-width:700px; line-height:1.7; margin:0 0 12px;">{{ $page->t('hero_subtitle', $lang) }}</p>
        @endif
        @if($page->t('hero_note', $lang))
        <p style="font-size:13px; color:#64748B; max-width:700px; line-height:1.6; margin:0 0 28px;">{{ $page->t('hero_note', $lang) }}</p>
        @endif
        <div style="display:flex; flex-wrap:wrap; gap:14px;">
            @if($page->t('cta1_label', $lang))
            <a href="{{ $page->cta1_url ?: route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; padding:13px 28px; border-radius:10px; background:#4F6EF7; color:white; font-weight:700; font-size:14px; text-decoration:none;">
                {{ $page->t('cta1_label', $lang) }}
            </a>
            @endif
            @if($page->t('cta2_label', $lang))
            <a href="{{ $page->cta2_url ?: route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; padding:13px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); color:#CBD5E1; font-weight:600; font-size:14px; text-decoration:none;">
                {{ $page->t('cta2_label', $lang) }} →
            </a>
            @endif
        </div>
    </div>
</section>

{{-- CAPABILITIES --}}
@if($capabilities->count())
<section style="background:#030712; padding:20px 0 80px;">
    <div class="container-shell">
        <div style="margin-bottom:40px; max-width:700px;">
            @if($page->t('capabilities_eyebrow', $lang))<span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#818CF8;">{{ $page->t('capabilities_eyebrow', $lang) }}</span>@endif
            <h2 style="font-size:26px; font-weight:900; color:white; margin:12px 0 10px;">{{ $page->t('capabilities_title', $lang) }}</h2>
            @if($page->t('capabilities_subtitle', $lang))<p style="color:#94A3B8; font-size:15px; line-height:1.7;">{{ $page->t('capabilities_subtitle', $lang) }}</p>@endif
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px;">
            @foreach($capabilities as $cap)
            <div data-tilt class="card-panel" style="padding:26px;">
                @if($cap->number)<div style="font-size:12px; font-weight:800; color:#4F6EF7; margin-bottom:10px;">{{ str_pad($cap->number, 2, '0', STR_PAD_LEFT) }}</div>@endif
                <h3 style="color:white; font-size:16px; font-weight:800; margin:0 0 10px;">{{ $cap->titleFor($lang) }}</h3>
                @if($cap->descriptionFor($lang))<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0 0 14px;">{{ $cap->descriptionFor($lang) }}</p>@endif
                @if(!empty($cap->bulletsFor($lang)))
                <ul style="margin:0; padding:0; list-style:none; display:grid; gap:8px;">
                    @foreach($cap->bulletsFor($lang) as $bullet)
                    <li style="display:flex; gap:8px; color:#CBD5E1; font-size:12px; line-height:1.5;"><span style="color:#4F6EF7; flex-shrink:0;">•</span>{{ $bullet }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- USE CASES --}}
@if($useCases->count())
<section style="background:#050A14; padding:80px 0;">
    <div class="container-shell">
        <div style="margin-bottom:32px;">
            @if($page->t('usecases_eyebrow', $lang))<span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#A78BFA;">{{ $page->t('usecases_eyebrow', $lang) }}</span>@endif
            <h2 style="font-size:24px; font-weight:900; color:white; margin:12px 0 0;">{{ $page->t('usecases_title', $lang) }}</h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:16px;">
            @foreach($useCases as $uc)
            <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:14px; padding:22px;">
                <h3 style="color:white; font-size:15px; font-weight:700; margin:0 0 8px;">{{ $uc->titleFor($lang) }}</h3>
                @if($uc->descriptionFor($lang))<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0;">{{ $uc->descriptionFor($lang) }}</p>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- INDUSTRIES + DELIVERABLES --}}
@if($industries->count() || $deliverables->count())
<section style="background:#030712; padding:80px 0;">
    <div class="container-shell" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:40px;">
        @if($industries->count())
        <div>
            @if($page->t('industries_eyebrow', $lang))<span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#06B6D4;">{{ $page->t('industries_eyebrow', $lang) }}</span>@endif
            <h2 style="font-size:24px; font-weight:900; color:white; margin:12px 0 10px;">{{ $page->t('industries_title', $lang) }}</h2>
            @if($page->t('industries_subtitle', $lang))<p style="color:#94A3B8; font-size:14px; line-height:1.7; margin:0 0 20px;">{{ $page->t('industries_subtitle', $lang) }}</p>@endif
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:10px;">
                @foreach($industries as $ind)
                <div style="display:flex; align-items:center; gap:8px; border:1px solid rgba(255,255,255,0.08); border-radius:8px; padding:10px 12px;">
                    <span style="color:#4F6EF7;">•</span><span style="color:#CBD5E1; font-size:13px;">{{ $ind->titleFor($lang) }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @if($deliverables->count())
        <div>
            <h2 style="font-size:20px; font-weight:900; color:white; margin:0 0 20px;">{{ $page->t('deliverables_title', $lang) }}</h2>
            <ul style="margin:0; padding:0; list-style:none; display:grid; gap:12px;">
                @foreach($deliverables as $d)
                <li style="display:flex; gap:10px; align-items:flex-start; border:1px solid rgba(255,255,255,0.07); border-radius:8px; padding:12px 14px;">
                    <span style="color:#10B981; flex-shrink:0;">✓</span><span style="color:#CBD5E1; font-size:13px; line-height:1.5;">{{ $d->titleFor($lang) }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</section>
@endif

{{-- FINAL CTA --}}
@if($page->t('final_title', $lang))
<section style="background:#030712; padding:0 0 100px;">
    <div class="container-shell" style="max-width:800px; margin:0 auto; text-align:center; border:1px solid rgba(255,255,255,0.08); background:#111827; border-radius:20px; padding:56px 32px;">
        @if($page->t('final_eyebrow', $lang))<span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#818CF8;">{{ $page->t('final_eyebrow', $lang) }}</span>@endif
        <h2 style="font-size:26px; font-weight:900; color:white; margin:14px 0 12px;">{{ $page->t('final_title', $lang) }}</h2>
        @if($page->t('final_subtitle', $lang))<p style="color:#94A3B8; font-size:14px; line-height:1.7; max-width:600px; margin:0 auto 28px;">{{ $page->t('final_subtitle', $lang) }}</p>@endif
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            @if($page->t('final_cta1_label', $lang))
            <a href="{{ $page->final_cta1_url ?: route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; padding:13px 28px; border-radius:10px; background:#4F6EF7; color:white; font-weight:700; font-size:14px; text-decoration:none;">
                {{ $page->t('final_cta1_label', $lang) }}
            </a>
            @endif
            @if($page->t('final_cta2_label', $lang))
            <a href="{{ $page->final_cta2_url ?: route('contact.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; align-items:center; padding:13px 28px; color:#CBD5E1; font-weight:600; font-size:14px; text-decoration:none;">
                {{ $page->t('final_cta2_label', $lang) }}
            </a>
            @endif
        </div>
    </div>
</section>
@endif

</x-layouts.public>
