<x-layouts.public :title="$page->title_ar && $lang === 'ar' ? $page->title_ar : ($page->title_de && $lang === 'de' ? $page->title_de : ($page->title ?? ''))">
@php
    $title = $lang === 'ar' && !empty($page->title_ar) ? $page->title_ar
           : ($lang === 'de' && !empty($page->title_de) ? $page->title_de
           : ($page->title ?? ''));

    $content = $lang === 'ar' && !empty($page->excerpt_ar) ? $page->excerpt_ar
             : ($lang === 'de' && !empty($page->excerpt_de) ? $page->excerpt_de
             : ($page->excerpt ?? ''));
@endphp

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; pointer-events:none;
        background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
        background-size: 48px 48px;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.08); filter:blur(80px);"></div>

    <div class="container-shell" style="position:relative; z-index:10;" @if($lang === 'ar') dir="rtl" @endif>

        {{-- Breadcrumb --}}
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:24px; font-size:13px; color:#475569;">
            <a href="{{ route('home', ['lang' => $lang]) }}" style="color:#475569; text-decoration:none; hover:color:white;">
                {{ $lang === 'ar' ? 'الرئيسية' : ($lang === 'de' ? 'Startseite' : 'Home') }}
            </a>
            <span>→</span>
            <span style="color:#94A3B8;">{{ $title }}</span>
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
                <p style="color:#475569; font-size:15px;">
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

</x-layouts.public>
