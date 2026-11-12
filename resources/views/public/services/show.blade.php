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
        <div class="hopn-contours" aria-hidden="true"></div>
                <div class="container-shell hopn-enter hopn-service-detail-hero" style="position:relative; z-index:10; display:grid; grid-template-columns:minmax(0,1fr) minmax(320px,.82fr); gap:48px; align-items:center;">
                    <div>
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#CBD5E1; text-decoration:none; margin-bottom:24px;">
                ← @if($lang === 'ar') العودة إلى الخدمات @elseif($lang === 'de') Zurück zu Leistungen @else Back to Services @endif
            </a>
            @if($service->category)
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(143,184,204,0.35); background:rgba(143,184,204,0.1); border-radius:999px; padding:4px 14px; margin-bottom:20px; margin-left:12px;">
                <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#8FB8CC;">{{ $lang==='ar' && $service->category->name_ar ? $service->category->name_ar : ($lang==='de' && $service->category->name_de ? $service->category->name_de : $service->category->name) }}</span>
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
    @php
        $svcBody = $lang === 'de' && $service->body_de ? $service->body_de
                 : ($lang === 'ar' && $service->body_ar ? $service->body_ar : $service->body);
    @endphp
    <section style="padding:72px 0 40px; background:#080D1A;" @if($lang === 'ar') dir="rtl" @endif>
        <div class="container-shell" style="max-width:1040px;">
            @if(!empty(trim((string) $svcBody)))
                <x-doc-body :body="$svcBody" />
            @else
                <p style="color:#CBD5E1;">@if($lang === 'ar') سيتم نشر التفاصيل قريباً. @elseif($lang === 'de') Details werden in Kürze veröffentlicht. @else Details will be published soon. @endif</p>
            @endif
        </div>
    </section>

    {{-- Call to action --}}
    <section style="padding:0 0 96px; background:#080D1A;" @if($lang === 'ar') dir="rtl" @endif>
        <div class="container-shell" style="max-width:1040px;">
            <div class="hopn-reveal hopn-doc-cta">
                <div>
                    <h2>@if($lang === 'ar') هل تريد معرفة المزيد؟ @elseif($lang === 'de') Möchten Sie mehr erfahren? @else Want to see how this fits your organisation? @endif</h2>
                    <p>@if($lang === 'ar') تواصل معنا لمناقشة متطلباتك. @elseif($lang === 'de') Sprechen Sie mit uns über Ihre Anforderungen. @else Talk to us about your requirements and we will come back with a clear plan. @endif</p>
                </div>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hopn-btn-primary hopn-doc-cta-btn">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in touch @endif
                </a>
            </div>
        </div>
    </section>
    <style>
        .hopn-doc-cta { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:24px; padding:36px 40px; border-radius:20px; background:linear-gradient(135deg,#0B3549 0%,#245B78 100%); color:#fff; }
        .hopn-doc-cta h2 { margin:0 0 6px; font-size:clamp(20px,2.4vw,28px); font-weight:800; letter-spacing:-.02em; color:#fff; }
        .hopn-doc-cta p { margin:0; color:#D3E6EE; font-size:15px; max-width:52ch; }
        .hopn-doc-cta-btn { display:inline-flex; align-items:center; padding:13px 28px; border-radius:10px; background:#FFFFFF !important; color:#0B3549 !important; font-size:14px; font-weight:700; text-decoration:none; transition:transform .25s ease, box-shadow .25s ease; }
        .hopn-doc-cta-btn:hover { transform:translateY(-2px); box-shadow:0 14px 28px -12px rgba(0,0,0,.45); }
    </style>

</x-layouts.public>