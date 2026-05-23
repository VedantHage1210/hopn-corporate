<x-layouts.public :title="'Contact'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">Contact HOPn</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') نحن هنا للإجابة على استفساراتك ومناقشة فرص التعاون.
                @elseif($lang === 'de') Wir freuen uns, von Ihnen zu hören.
                @else We would love to hear from you. Reach out for partnerships, projects, or inquiries.
                @endif
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">

            @if(session('status'))
            <div style="margin-bottom:24px; padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px;">
                ✅ {{ session('status') }}
            </div>
            @endif

            {{-- Contact Info Cards --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px; margin-bottom:48px;">
                @foreach([
                    ['icon' => '📧', 'title_en' => 'Email', 'title_de' => 'E-Mail', 'title_ar' => 'البريد الإلكتروني', 'value' => 'contact@hopn.eu', 'link' => 'mailto:contact@hopn.eu'],
                    ['icon' => '📍', 'title_en' => 'Location', 'title_de' => 'Standort', 'title_ar' => 'الموقع', 'value' => 'Berlin, Germany', 'link' => null],
                    ['icon' => '🤝', 'title_en' => 'Partnerships', 'title_de' => 'Partnerschaften', 'title_ar' => 'الشراكات', 'value' => 'Partner Inquiry →', 'link' => route('partner-inquiry.index', ['lang' => $lang])],
                ] as $info)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:14px; padding:24px; text-align:center;">
                    <div style="font-size:28px; margin-bottom:12px;">{{ $info['icon'] }}</div>
                    <div style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:8px;">
                        @if($lang === 'de') {{ $info['title_de'] }} @elseif($lang === 'ar') {{ $info['title_ar'] }} @else {{ $info['title_en'] }} @endif
                    </div>
                    @if($info['link'])
                    <a href="{{ $info['link'] }}" style="font-size:14px; color:#818CF8; text-decoration:none;">{{ $info['value'] }}</a>
                    @else
                    <div style="font-size:14px; color:#94A3B8;">{{ $info['value'] }}</div>
                    @endif
                </div>
                @endforeach
            </div>

            {{-- Forms --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:20px; padding:32px;">
                    <h2 style="font-size:20px; font-weight:700; color:white; margin-bottom:24px;">
                        @if($lang === 'ar') أرسل رسالة @elseif($lang === 'de') Nachricht senden @else Send a Message @endif
                    </h2>
                    <x-forms.contact :lang="$lang" />
                </div>
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:20px; padding:32px;">
                    <h2 style="font-size:20px; font-weight:700; color:white; margin-bottom:24px;">
                        @if($lang === 'ar') طلب عرض @elseif($lang === 'de') Angebot anfordern @else Request a Proposal @endif
                    </h2>
                    <x-forms.proposal :lang="$lang" />
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
