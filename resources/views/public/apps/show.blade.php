@php
    $lang = request()->route('lang', 'en');
    $name = $lang==='de' ? ($app->name_de ?: $app->name_en) : ($lang==='ar' ? ($app->name_ar ?: $app->name_en) : $app->name_en);
    $tagline = $lang==='de' ? ($app->tagline_de ?: $app->tagline_en) : ($lang==='ar' ? ($app->tagline_ar ?: $app->tagline_en) : $app->tagline_en);
    $description = $lang==='de' ? ($app->description_de ?: $app->description_en) : ($lang==='ar' ? ($app->description_ar ?: $app->description_en) : $app->description_en);
@endphp
<x-layouts.public :title="$name">
    <section style="background:#030712; padding:80px 0 60px;">
        <div class="container-shell" style="max-width:800px; margin:0 auto; text-align:center;">
            @if($app->logo_url)
            <img loading="lazy" decoding="async" src="{{ $app->logo_url }}" alt="{{ $name }}" style="width:72px; height:72px; border-radius:16px; object-fit:cover; margin:0 auto 24px;">
            @endif
            <h1 style="font-size:clamp(30px,5vw,48px); font-weight:900; color:white; margin:0 0 14px;">{{ $name }}</h1>
            @if($tagline)<p style="color:#CBD5E1; font-size:17px; margin:0 0 28px;">{{ $tagline }}</p>@endif
            @if($app->external_url)
            <a href="{{ $app->external_url }}" target="_blank"
               style="display:inline-flex; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-weight:700; font-size:14px; text-decoration:none;">
                {{ ($lang==='de' ? ($app->cta_label_de ?: $app->cta_label_en) : ($lang==='ar' ? ($app->cta_label_ar ?: $app->cta_label_en) : $app->cta_label_en)) ?: 'Open app' }} →
            </a>
            @endif
        </div>
    </section>

    @if($description)
    <section style="background:#030712; padding:0 0 100px;">
        <div class="container-shell card-panel" style="max-width:800px; margin:0 auto; padding:32px;">
            <div style="color:#94A3B8; font-size:15px; line-height:1.8; white-space:pre-line;">{{ $description }}</div>
        </div>
    </section>
    @endif
</x-layouts.public>
