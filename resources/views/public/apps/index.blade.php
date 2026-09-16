@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'Apps'">
    <x-hero :title="$lang === 'ar' ? 'تطبيقات HOPn' : ($lang === 'de' ? 'HOPn Apps' : 'HOPn Apps')"
            :subtitle="$lang === 'ar' ? 'أدوات وتطبيقات مصممة لدعم النظام البيئي للابتكار.' : ($lang === 'de' ? 'Tools und Apps für das Innovationsökosystem.' : 'Tools and apps built to support the HOPn innovation ecosystem.')" />

    <section class="container-shell mt-8 hopn-reveal" style="padding-bottom:100px;">
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @forelse($apps as $app)
            @php
                $name = $lang==='de' ? ($app->name_de ?: $app->name_en) : ($lang==='ar' ? ($app->name_ar ?: $app->name_en) : $app->name_en);
                $tagline = $lang==='de' ? ($app->tagline_de ?: $app->tagline_en) : ($lang==='ar' ? ($app->tagline_ar ?: $app->tagline_en) : $app->tagline_en);
                $href = $app->external_url ?: route('apps.show', ['lang'=>$lang, 'slug'=>$app->slug]);
            @endphp
            <a href="{{ $href }}" @if($app->external_url) target="_blank" @endif data-tilt class="card-panel"
               style="display:block; padding:26px; text-decoration:none;">
                @if($app->logo_url)
                <img loading="lazy" decoding="async" src="{{ $app->logo_url }}" alt="{{ $name }}" style="width:44px; height:44px; border-radius:12px; object-fit:cover; margin-bottom:14px;">
                @else
                <div style="width:44px; height:44px; border-radius:12px; background:rgba(139,92,246,0.15); border:1px solid rgba(139,92,246,0.3); display:flex; align-items:center; justify-content:center; font-weight:800; color:#A78BFA; margin-bottom:14px;">{{ strtoupper(substr($name,0,1)) }}</div>
                @endif
                <h3 style="color:white; font-size:16px; font-weight:700; margin:0 0 8px;">{{ $name }}</h3>
                @if($tagline)<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0;">{{ $tagline }}</p>@endif
            </a>
            @empty
            <div class="card-panel" style="grid-column:1/-1; padding:40px; text-align:center;">
                <p style="color:#94A3B8; font-size:14px; margin:0;">
                    @if($lang==='ar') لا توجد تطبيقات منشورة بعد. @elseif($lang==='de') Noch keine Apps veröffentlicht. @else No apps published yet — add them from Admin → Apps. @endif
                </p>
            </div>
            @endforelse
        </div>
    </section>
</x-layouts.public>
