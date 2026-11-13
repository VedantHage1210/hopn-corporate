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
                $href = route('apps.show', ['lang'=>$lang, 'slug'=>$app->slug]);
            @endphp
            <a href="{{ $href }}" class="card-panel hopn-lift-card"
               style="display:block; padding:0; text-decoration:none; overflow:hidden;">
                @if($app->logo_url)
                <div style="height:180px; background:#EEF3F5; overflow:hidden;"><img loading="lazy" decoding="async" src="{{ $app->logo_url }}" alt="{{ $name }}" style="width:100%; height:100%; border-radius:0; object-fit:cover; display:block;"></div>
                @else
                <div style="height:140px; background:#EEF3F5; overflow:hidden;"><img loading="lazy" decoding="async" src="/images/illustrations/digital-twin.svg" alt="" style="width:100%; height:100%; object-fit:cover; padding:24px;"></div>
                @endif
                <div style="padding:26px;">
                <h3 style="color:white; font-size:16px; font-weight:700; margin:0 0 8px;">{{ $name }}</h3>
                @if($tagline)<p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0;">{{ $tagline }}</p>@endif
                </div>
            </a>
            @empty
            <div class="card-panel" style="grid-column:1/-1; padding:40px; text-align:center;">
                <p style="color:#94A3B8; font-size:14px; margin:0;">
                    @if($lang==='ar') لا توجد تطبيقات منشورة بعد. @elseif($lang==='de') Noch keine Apps veröffentlicht. @else No apps published yet. @endif
                </p>
            </div>
            @endforelse
        </div>
    </section>
</x-layouts.public>