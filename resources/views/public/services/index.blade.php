<x-layouts.public :title="'Services'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">HOPn Services</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') خدماتنا الاحترافية
                @elseif($lang === 'de') Unsere Leistungen
                @else Our Core Services
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') حلول متكاملة للتحول الرقمي من الاستشارة إلى التنفيذ.
                @elseif($lang === 'de') Ganzheitliche digitale Transformationsdienstleistungen von der Beratung bis zur Umsetzung.
                @else End-to-end digital transformation services from consulting to implementation.
                @endif
            </p>
            <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') احجز مكالمة @elseif($lang === 'de') Termin buchen @else Book a Call @endif
                </a>
                <a href="{{ route('products.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                   onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                    @if($lang === 'ar') عرض المنتجات @elseif($lang === 'de') Produkte ansehen @else View Products @endif
                </a>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($services->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($services->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">
                {{ $services->links() }}
            </div>
            @endif

            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">⚡</div>
                <p style="font-size:16px;">No services found. Add services from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد مناقشة مشروعك؟
                    @elseif($lang === 'de') Möchten Sie Ihr Projekt besprechen?
                    @else Ready to Discuss Your Project?
                    @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn اليوم للحصول على استشارة مجانية.
                    @elseif($lang === 'de') Kontaktieren Sie das HOPn-Team für eine kostenlose Beratung.
                    @else Get in touch with HOPn today for a free consultation.
                    @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Request Proposal @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
