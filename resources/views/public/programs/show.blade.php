<x-layouts.public :title="$program->title_en ?? 'Program'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div class="hopn-contours" aria-hidden="true"></div>
        <div class="container-shell hopn-enter" style="position:relative; z-index:10;">
            <a href="{{ route('programs.index', ['lang' => $lang]) }}"
               class="hopn-link-accent" style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#CBD5E1; text-decoration:none; margin-bottom:24px;">
                ← @if($lang === 'ar') رجوع @elseif($lang === 'de') Zurück @else Back to Programs @endif
            </a>
            @if($program->image_url)
            <div style="height:300px; margin:8px 0 32px; overflow:hidden; border:1px solid rgba(255,255,255,.16); border-radius:12px; background:#111827;">
                <img loading="eager" decoding="async" src="{{ $program->image_url }}" alt="{{ $program->title_en }}" style="width:100%; height:100%; display:block; object-fit:cover;">
            </div>
            @endif
            <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 0 20px;">
                @if($lang === 'de' && $program->title_de) {{ $program->title_de }}
                @elseif($lang === 'ar' && $program->title_ar) {{ $program->title_ar }}
                @else {{ $program->title_en }}
                @endif
            </h1>
            @if($program->summary_en)
            <p style="font-size:clamp(15px,2vw,18px); color:#CBD5E1; max-width:640px; line-height:1.7; margin-bottom:32px;">
                @if($lang === 'de' && $program->summary_de) {{ $program->summary_de }}
                @elseif($lang === 'ar' && $program->summary_ar) {{ $program->summary_ar }}
                @else {{ $program->summary_en }}
                @endif
            </p>
            @endif
            <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center;">
                @if($program->duration)
                <span style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:999px; border:1px solid rgba(143,184,204,0.3); background:rgba(143,184,204,0.1); color:#8FB8CC; font-size:13px; font-weight:600;">
                    {{ $program->duration }}
                </span>
                @endif
                <a href="#apply"
                   class="hopn-link-fade" style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#245B78; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                    @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Apply Now @endif →
                </a>
            </div>
        </div>
    </section>

    {{-- Audience --}}
    @if($program->audience_en)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:800px; margin:0 auto; border:1px solid rgba(143,184,204,0.2); background:#111827; border-radius:16px; padding:32px; display:flex; gap:20px; align-items:flex-start;">
                <svg aria-hidden="true" viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#8FB8CC" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:2px;"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1" fill="#8FB8CC"/></svg>
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">
                        @if($lang === 'ar') الجمهور المستهدف @elseif($lang === 'de') Zielgruppe @else Target Audience @endif
                    </h3>
                    <p style="font-size:14px; color:#CBD5E1; line-height:1.7;">
                        @if($lang === 'de' && $program->audience_de) {{ $program->audience_de }}
                        @elseif($lang === 'ar' && $program->audience_ar) {{ $program->audience_ar }}
                        @else {{ $program->audience_en }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif


{{-- Duration --}}
@if($program->duration || $program->duration_weeks)
<section style="padding:40px 0; background:#0A0F1E;">
    <div class="container-shell">
        <div style="max-width:800px; margin:0 auto; border:1px solid rgba(143,184,204,0.2); background:#111827; border-radius:16px; padding:32px; display:flex; gap:20px; align-items:flex-start;">
            <div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">
                    @if($lang === 'ar') المدة @elseif($lang === 'de') Dauer @else Duration @endif
                </h3>
                <p style="font-size:14px; color:#CBD5E1; line-height:1.7;">
                    {{ $program->duration ?: ($program->duration_weeks.' weeks') }}
                </p>
            </div>
        </div>
    </div>
</section>
@endif

    

    @php
        // Defensive normaliser: admin data can be plain strings, {text|title|name} objects or {en,de,ar} maps.
        // Anything that is not printable text is dropped instead of crashing the page (500).
        $progText = function ($v) use ($lang) {
            if (is_array($v)) {
                $v = $v[$lang] ?? $v['en'] ?? $v['text'] ?? $v['title'] ?? $v['name'] ?? '';
                if (is_array($v)) { $v = $v[$lang] ?? $v['en'] ?? ''; }
            }
            return is_scalar($v) ? trim((string) $v) : '';
        };
        $progList = function ($raw) {
            if (is_string($raw)) { $dec = json_decode($raw, true); $raw = is_array($dec) ? $dec : [$raw]; }
            return is_array($raw) ? $raw : [];
        };
        $progOutcomes = collect($progList($program->outcomes ?? []))->map(fn ($o) => $progText($o))->filter()->values();
        $progTiers = collect($progList($program->pricing_tiers ?? []))
            ->filter(fn ($t) => is_array($t))
            ->map(fn ($t) => [
                'name'     => $progText($t['name'] ?? $t['title'] ?? ''),
                'price'    => $progText($t['price'] ?? ''),
                'features' => collect($progList($t['features'] ?? []))->map(fn ($f) => $progText($f))->filter()->values()->all(),
            ])
            ->filter(fn ($t) => $t['name'] !== '')
            ->values();
    @endphp
    <style>
        .hopn-prog { --pg-line:rgba(143,184,204,.22); --pg-bg:rgba(255,255,255,.04); --pg-ink:#F1F5F9; --pg-muted:#CBD5E1; --pg-accent:#9FE0F2; --pg-eyebrow:#8FB8CC; }
        html[data-theme="light"] .hopn-prog { --pg-line:#D3DEE2; --pg-bg:#FFFFFF; --pg-ink:#0F2230; --pg-muted:#43515F; --pg-accent:#245B78; --pg-eyebrow:#245B78; }
        .hopn-prog-eyebrow { display:block; font-size:11px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:var(--pg-eyebrow); margin-bottom:12px; }
        .hopn-prog-title { font-size:clamp(24px,3.4vw,38px); font-weight:800; letter-spacing:-.02em; color:var(--pg-ink); margin:0 0 36px; }
        .hopn-prog-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr)); gap:16px; }
        .hopn-prog-item { position:relative; display:flex; gap:14px; align-items:flex-start; padding:20px 22px; border:1px solid var(--pg-line); background:var(--pg-bg); border-radius:14px; color:var(--pg-muted); font-size:15px; line-height:1.6; transition:transform .3s ease, border-color .3s ease; }
        html[data-theme="light"] .hopn-prog-item { box-shadow:0 1px 2px rgba(15,34,48,.05); }
        .hopn-prog-item:hover { transform:translateY(-3px); border-color:#8FB8CC; }
        .hopn-prog-check { flex:none; width:28px; height:28px; border-radius:50%; background:#245B78; color:#fff; display:flex; align-items:center; justify-content:center; margin-top:1px; }
        .hopn-prog-check svg { width:15px; height:15px; fill:none; stroke:currentColor; stroke-width:2.4; stroke-linecap:round; stroke-linejoin:round; }
        .hopn-prog-tier { display:flex; flex-direction:column; padding:28px 26px; border:1px solid var(--pg-line); background:var(--pg-bg); border-radius:18px; transition:transform .3s ease, border-color .3s ease; }
        html[data-theme="light"] .hopn-prog-tier { box-shadow:0 1px 2px rgba(15,34,48,.05), 0 16px 34px -24px rgba(15,34,48,.28); }
        .hopn-prog-tier:hover { transform:translateY(-4px); border-color:#8FB8CC; }
        .hopn-prog-tier-name { font-size:15px; font-weight:700; color:var(--pg-accent); margin:0 0 6px; }
        .hopn-prog-tier-price { font-size:clamp(26px,3vw,34px); font-weight:800; letter-spacing:-.02em; color:var(--pg-ink); margin:0 0 18px; }
        .hopn-prog-tier ul { list-style:none; margin:0 0 24px; padding:0; display:grid; gap:10px; }
        .hopn-prog-tier li { display:flex; gap:10px; align-items:flex-start; font-size:14px; line-height:1.55; color:var(--pg-muted); }
        .hopn-prog-tier li::before { content:""; flex:none; width:7px; height:7px; margin-top:7px; border-radius:50%; background:var(--pg-accent); }
        html:root[data-theme] main .hopn-prog-tier-cta:not(#hx) { margin-top:auto; display:inline-flex; justify-content:center; padding:12px 20px; border-radius:10px; background:#245B78 !important; color:#FFFFFF !important; font-weight:700; font-size:14px; text-decoration:none; }
        html:root[data-theme] main .hopn-prog-tier-cta:not(#hx):hover { background:#1D4D66 !important; }
        html:root[data-theme] main .hopn-prog-tier-price:not(#hx), html:root[data-theme] main .hopn-prog-title:not(#hx) { color:var(--pg-ink) !important; }
        html:root[data-theme] main .hopn-prog-tier-name:not(#hx), html:root[data-theme] main .hopn-prog-eyebrow:not(#hx) { color:var(--pg-accent) !important; }
        html:root[data-theme] main .hopn-prog-item:not(#hx), html:root[data-theme] main .hopn-prog-tier li:not(#hx) { color:var(--pg-muted) !important; }
        @media (prefers-reduced-motion: reduce) { .hopn-prog-item, .hopn-prog-tier { transition:none; } .hopn-prog-item:hover, .hopn-prog-tier:hover { transform:none; } }
    </style>

    {{-- Outcomes --}}
    @if($progOutcomes->count() > 0)
    <section class="hopn-prog" style="padding:70px 0; background:#050A14;" @if($lang === 'ar') dir="rtl" @endif>
        <div class="container-shell" style="max-width:1000px;">
            <span class="hopn-prog-eyebrow">@if($lang === 'ar') النتائج @elseif($lang === 'de') Ergebnisse @else Outcomes @endif</span>
            <h2 class="hopn-prog-title">@if($lang === 'ar') ما ستحققه @elseif($lang === 'de') Was Sie erreichen @else What you will achieve @endif</h2>
            <div class="hopn-prog-grid">
                @foreach($progOutcomes as $outcome)
                <div class="hopn-prog-item hopn-reveal">
                    <span class="hopn-prog-check" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></span>
                    <span>{{ $outcome }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Pricing --}}
    @if($progTiers->count() > 0)
    <section class="hopn-prog" style="padding:70px 0; background:#080D1A;" @if($lang === 'ar') dir="rtl" @endif>
        <div class="container-shell" style="max-width:1000px;">
            <span class="hopn-prog-eyebrow">@if($lang === 'ar') الأسعار @elseif($lang === 'de') Preise @else Pricing @endif</span>
            <h2 class="hopn-prog-title">@if($lang === 'ar') خيارات المشاركة @elseif($lang === 'de') Teilnahmeoptionen @else Ways to take part @endif</h2>
            <div class="hopn-prog-grid">
                @foreach($progTiers as $tier)
                @php $tierFeatures = collect($tier['features']); @endphp
                <div class="hopn-prog-tier hopn-reveal">
                    <h3 class="hopn-prog-tier-name">{{ $tier['name'] }}</h3>
                    @if($tier['price'] !== '')<p class="hopn-prog-tier-price">{{ $tier['price'] }}</p>@endif
                    @if($tierFeatures->count() > 0)
                    <ul>
                        @foreach($tierFeatures as $feature)<li>{{ $feature }}</li>@endforeach
                    </ul>
                    @endif
                    <a href="#apply" class="hopn-prog-tier-cta">@if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Apply now @endif</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Apply Form --}}
    <section style="padding:80px 0; background:#0A0F1E;" id="apply">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                    @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Apply for this Program @endif
                </h2>
            </div>
            @if(session('status'))
            <div class="hopn-flash" style="max-width:600px; margin:0 auto 24px; padding:14px 16px; background:rgba(143,184,204,0.1); border:1px solid rgba(143,184,204,0.3); border-radius:8px; color:#8FB8CC; font-size:14px; text-align:center;">
                {{ session('status') }}
            </div>
            @endif
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(143,184,204,0.2); background:#111827; border-radius:20px; padding:40px;">
                <form action="{{ route('leads.training', ['lang' => $lang]) }}" method="POST">
                    @csrf
                    <x-turnstile />
                    <input type="hidden" name="program_of_interest" value="{{ $program->slug }}">
                    <div style="display:grid; gap:16px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                            <div>
                                <label for="hopn-name-53efd1" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px;">
                                    @if($lang === 'ar') الاسم @elseif($lang === 'de') Name @else Full Name @endif *
                                </label>
                                <input id="hopn-name-53efd1" type="text" name="name" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#245B78'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label for="hopn-email-53efd2" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px;">
                                    @if($lang === 'ar') البريد @elseif($lang === 'de') E-Mail @else Email @endif *
                                </label>
                                <input id="hopn-email-53efd2" type="email" name="email" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#245B78'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                        </div>
                        <div>
                            <label for="hopn-message-53efd3" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px;">
                                @if($lang === 'ar') رسالة @elseif($lang === 'de') Nachricht @else Message @endif *
                            </label>
                            <textarea id="hopn-message-53efd3" name="message" rows="4" required
                                      style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical;"
                                      onfocus="this.style.borderColor='#245B78'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                        </div>
                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr" id="gdpr_show" value="1" required style="margin-top:3px;">
                            <label for="gdpr_show" style="font-size:12px; color:#CBD5E1; line-height:1.5;">
                                @if($lang === 'ar') أوافق على <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">سياسة الخصوصية</a>. *
                                @elseif($lang === 'de') Ich stimme der <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Datenschutzerklärung</a> zu. *
                                @else I agree to the <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Privacy Policy</a>. *
                                @endif
                            </label>
                        </div>
                        <button type="submit"
                                class="hopn-link-fade" style="width:100%; padding:13px; border-radius:10px; background:#245B78; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer;">
                            @if($lang === 'ar') إرسال @elseif($lang === 'de') Absenden @else Submit Application @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.public>
