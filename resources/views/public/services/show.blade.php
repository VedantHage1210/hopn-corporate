@php
    $lang = request()->route('lang', 'en');
    $svcName = $lang==='ar' && $service->name_ar ? $service->name_ar : ($lang==='de' && $service->name_de ? $service->name_de : $service->name);
    $svcMetaTitle = $lang==='ar' && $service->meta_title_ar ? $service->meta_title_ar : ($lang==='de' && $service->meta_title_de ? $service->meta_title_de : ($service->meta_title ?: $svcName));
    $svcMetaDesc = $lang==='ar' && $service->meta_description_ar ? $service->meta_description_ar : ($lang==='de' && $service->meta_description_de ? $service->meta_description_de : ($service->meta_description ?: null));
@endphp
<x-layouts.public :title="$svcMetaTitle ?? 'Service'" :description="$svcMetaDesc">
    <style>
        @media (max-width:760px) { .hopn-service-detail-hero { grid-template-columns:1fr !important; gap:28px !important; } .hopn-service-detail-hero > div:last-child { height:230px !important; } }
    </style>

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
                <div class="container-shell hopn-reveal hopn-service-detail-hero" style="position:relative; z-index:10; display:grid; grid-template-columns:minmax(0,1fr) minmax(320px,.82fr); gap:48px; align-items:center;">
                    <div>
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#CBD5E1; text-decoration:none; margin-bottom:24px;">
                ← @if($lang === 'ar') العودة إلى الخدمات @elseif($lang === 'de') Zurück zu Leistungen @else Back to Services @endif
            </a>
            @if($service->category)
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:4px 14px; margin-bottom:20px; margin-left:12px;">
                <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#818CF8;">{{ $lang==='ar' && $service->category->name_ar ? $service->category->name_ar : ($lang==='de' && $service->category->name_de ? $service->category->name_de : $service->category->name) }}</span>
            </div>
            @endif
            <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 0 20px;">
                @if($lang === 'de' && $service->name_de) {{ $service->name_de }}
                @elseif($lang === 'ar' && $service->name_ar) {{ $service->name_ar }}
                @else {{ $service->name }}
                @endif
            </h1>
            @if($service->summary)
            <p style="font-size:clamp(15px,2vw,18px); color:#CBD5E1; max-width:640px; line-height:1.7;">
                @if($lang === 'de' && $service->summary_de) {{ $service->summary_de }}
                @elseif($lang === 'ar' && $service->summary_ar) {{ $service->summary_ar }}
                @else {{ $service->summary }}
                @endif
            </p>
            @endif
          </div>
          @if($service->hero_image)
          <div style="height:320px; overflow:hidden; border:1px solid rgba(255,255,255,.16); border-radius:12px; background:#111827;">
              <img loading="eager" decoding="async" src="{{ $service->hero_image }}" alt="{{ $svcName }}" style="width:100%; height:100%; display:block; object-fit:cover;">
          </div>
          @endif
        </div>
    </section>

    {{-- Body --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell hopn-reveal">
            <div style="max-width:800px; margin:0 auto;">
                @if($service->body || $service->body_de || $service->body_ar)
                <div style="font-size:16px; color:#CBD5E1; line-height:1.8;">
                    @if($lang === 'de' && $service->body_de) {!! nl2br(e($service->body_de)) !!}
                    @elseif($lang === 'ar' && $service->body_ar) {!! nl2br(e($service->body_ar)) !!}
                    @else {!! nl2br(e($service->body)) !!}
                    @endif
                </div>
                @else
                <p style="color:#CBD5E1;">@if($lang === 'ar') سيتم نشر التفاصيل قريباً. @elseif($lang === 'de') Details werden in Kürze veröffentlicht. @else Details will be published soon. @endif</p>
                @endif

                <div style="margin-top:48px; padding-top:32px; border-top:1px solid rgba(255,255,255,0.07);">
                    <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hopn-btn-primary"
                       style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                        @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch →  @endif
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>