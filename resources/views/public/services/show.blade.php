<x-layouts.public :title="$service->name ?? 'Service'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        @if($service->hero_image)
      <div style="position:absolute; inset:0; background:url('{{ $service->hero_image }}') center/cover no-repeat; opacity:0.15;"></div>
        @endif
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div class="container-shell hopn-reveal" style="position:relative; z-index:10;">
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#64748B; text-decoration:none; margin-bottom:24px;">
                ← @if($lang === 'ar') العودة إلى الخدمات @elseif($lang === 'de') Zurück zu Leistungen @else Back to Services @endif
            </a>
            @if($service->category)
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:4px 14px; margin-bottom:20px; margin-left:12px;">
                <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#818CF8;">{{ $service->category->name }}</span>
            </div>
            @endif
            <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 0 20px;">
                @if($lang === 'de' && $service->name_de) {{ $service->name_de }}
                @elseif($lang === 'ar' && $service->name_ar) {{ $service->name_ar }}
                @else {{ $service->name }}
                @endif
            </h1>
            @if($service->summary)
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:640px; line-height:1.7;">
                @if($lang === 'de' && $service->summary_de) {{ $service->summary_de }}
                @elseif($lang === 'ar' && $service->summary_ar) {{ $service->summary_ar }}
                @else {{ $service->summary }}
                @endif
            </p>
            @endif
        </div>
    </section>

    {{-- Body --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell hopn-reveal">
            <div style="max-width:800px; margin:0 auto;">
                @if($service->body || $service->body_de || $service->body_ar)
                <div style="font-size:16px; color:#94A3B8; line-height:1.8;">
                    @if($lang === 'de' && $service->body_de) {!! nl2br(e($service->body_de)) !!}
                    @elseif($lang === 'ar' && $service->body_ar) {!! nl2br(e($service->body_ar)) !!}
                    @else {!! nl2br(e($service->body)) !!}
                    @endif
                </div>
                @else
                <p style="color:#64748B;">Details will be published soon.</p>
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