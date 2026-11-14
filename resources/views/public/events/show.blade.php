<x-layouts.public :title="$lang==='de' && $event->title_de ? $event->title_de : ($lang==='ar' && $event->title_ar ? $event->title_ar : $event->title)">
@php
    $title = $lang==='de' && $event->title_de ? $event->title_de : ($lang==='ar' && $event->title_ar ? $event->title_ar : $event->title);
    $desc  = $lang==='de' && $event->description_de ? $event->description_de : ($lang==='ar' && $event->description_ar ? $event->description_ar : $event->description);
    $dateText = $event->date ? $event->date->locale($lang)->translatedFormat('d F Y') : '';
    $dateShort = $event->date ? $event->date->locale($lang)->translatedFormat('d M Y') : '';
    $siteUrl = $event->registration_url;
    if ($siteUrl && !preg_match('#^https?://#i', $siteUrl)) { $siteUrl = null; }
    $speakers = collect(explode(',', (string) $event->speaker_names))->map(fn ($v) => trim($v))->filter()->values();
    $sponsors = collect(explode(',', (string) $event->sponsor_names))->map(fn ($v) => trim($v))->filter()->values();
    $btnStyle = 'display:inline-flex; align-items:center; gap:10px; padding:13px 28px; border-radius:10px; background:#245B78; color:#FFFFFF; font-size:14px; font-weight:700; text-decoration:none; border:1px solid #245B78; cursor:pointer; line-height:1.2;';
@endphp

<style>
    .hopn-ev-btn { transition:transform .25s ease, box-shadow .25s ease, opacity .25s ease; box-shadow:0 10px 24px -14px rgba(15,34,48,.65); }
    .hopn-ev-btn:hover { transform:translateY(-2px); box-shadow:0 16px 30px -14px rgba(15,34,48,.7); opacity:.95; }
    .hopn-ev-btn svg { width:16px; height:16px; flex:none; transition:transform .25s ease; }
    .hopn-ev-btn:hover svg { transform:translateX(4px); }
    [dir="rtl"] .hopn-ev-btn svg { transform:scaleX(-1); }
    [dir="rtl"] .hopn-ev-btn:hover svg { transform:scaleX(-1) translateX(4px); }
    .hopn-ev-grid { display:grid; grid-template-columns:minmax(0,1.6fr) minmax(0,1fr); gap:32px; align-items:start; }
    .hopn-ev-row { display:flex; gap:14px; align-items:flex-start; padding:14px 0; border-top:1px solid rgba(143,184,204,.18); }
    .hopn-ev-row:first-of-type { border-top:0; padding-top:0; }
    .hopn-ev-label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:#8FB8CC; margin:0 0 4px; }
    .hopn-ev-value { font-size:15px; font-weight:600; color:#F1F5F9; margin:0; line-height:1.5; }
    .hopn-ev-chip { display:inline-block; font-size:12px; font-weight:600; padding:4px 12px; border-radius:999px; background:rgba(143,184,204,.12); border:1px solid rgba(143,184,204,.3); color:#CBD5E1; margin:0 6px 6px 0; }
    html[data-theme="light"] .hopn-ev-label { color:#245B78; }
    html[data-theme="light"] .hopn-ev-value { color:#0F2230; }
    html[data-theme="light"] .hopn-ev-chip { background:#EAF2F5; border-color:#C8D8DE; color:#243746; }
    @media (max-width:900px) { .hopn-ev-grid { grid-template-columns:minmax(0,1fr); } }
    @media (prefers-reduced-motion: reduce) { .hopn-ev-btn, .hopn-ev-btn svg { transition:none; } .hopn-ev-btn:hover, .hopn-ev-btn:hover svg { transform:none; } }
</style>

{{-- Success Toast --}}
@if(session('event_success'))
<div id="success-toast" class="hopn-flash" role="status" style="display:flex; position:fixed; top:24px; right:24px; z-index:2000; align-items:center; gap:12px; background:#111827; border:1px solid rgba(143,184,204,0.4); border-radius:12px; padding:16px 20px; box-shadow:0 8px 32px rgba(0,0,0,0.4); max-width:380px;">
    <svg aria-hidden="true" viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#9FE0F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex:none;"><circle cx="12" cy="12" r="10"/><path d="M7.5 12.5l3 3 6-7"/></svg>
    <div>
        <div style="font-size:14px; font-weight:700; color:white; margin-bottom:4px;">
            @if($lang==='ar') تم التسجيل! @elseif($lang==='de') Registrierung erhalten! @else Registration Received! @endif
        </div>
        <div style="font-size:13px;">{{ session('event_success') }}</div>
    </div>
    <button onclick="document.getElementById('success-toast').style.display='none'"
            style="margin-left:auto; background:none; border:none; color:#CBD5E1; cursor:pointer; font-size:18px;">×</button>
</div>
@endif


{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 90px;" @if($lang==='ar') dir="rtl" @endif>
    <div class="hopn-contours" aria-hidden="true"></div>
    <div class="container-shell hopn-enter" style="position:relative; z-index:10;">
        <a href="{{ route('events.index', ['lang'=>$lang]) }}" class="hopn-link-accent" style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#CBD5E1; text-decoration:none; margin-bottom:24px;">
            ← @if($lang==='ar') رجوع @elseif($lang==='de') Zurück zu Events @else Back to Events @endif
        </a>

        <div style="display:flex; flex-wrap:wrap; gap:10px; align-items:center; margin-bottom:18px;">
            <span style="font-size:11px; font-weight:700; padding:5px 14px; border-radius:999px; background:rgba(143,184,204,.12); color:#8FB8CC; border:1px solid rgba(143,184,204,.3); text-transform:uppercase; letter-spacing:.08em;">{{ ucfirst($event->type ?? 'event') }}</span>
            @if($event->registration_open)
            <span style="font-size:11px; font-weight:700; padding:5px 14px; border-radius:999px; background:rgba(143,184,204,.12); color:#8FB8CC; border:1px solid rgba(143,184,204,.3); text-transform:uppercase; letter-spacing:.08em;">
                @if($lang==='ar') التسجيل مفتوح @elseif($lang==='de') Anmeldung offen @else Registration open @endif
            </span>
            @else
            <span style="font-size:11px; font-weight:700; padding:5px 14px; border-radius:999px; background:rgba(148,163,184,.12); color:#94A3B8; border:1px solid rgba(148,163,184,.3); text-transform:uppercase; letter-spacing:.08em;">
                @if($lang==='ar') التسجيل مغلق @elseif($lang==='de') Anmeldung geschlossen @else Registration closed @endif
            </span>
            @endif
        </div>

        <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:860px; margin:0 0 20px;">{{ $title }}</h1>

        <div style="display:flex; flex-wrap:wrap; gap:10px 24px; font-size:15px; color:#CBD5E1; margin-bottom:32px;">
            @if($dateText)<span>{{ $dateText }}</span>@endif
            @if($event->location)<span>{{ $event->location }}</span>@endif
        </div>

        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center;">
            @if($event->registration_open)
            <button type="button" class="hopn-ev-btn"
                    onclick="openEventForm({{ $event->id }}, '{{ addslashes($title) }}', '{{ $event->type }}', '{{ $dateShort }}', '{{ addslashes($event->location ?? '') }}')"
                    style="{{ $btnStyle }}">
                @if($lang==='ar') سجل الآن @elseif($lang==='de') Jetzt anmelden @else Register Now @endif
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </button>
            @endif
            @if($siteUrl)
            <a href="{{ $siteUrl }}" target="_blank" rel="noopener noreferrer" class="hopn-ev-btn" style="{{ $btnStyle }} border-color:#8FB8CC;">
                @if($lang==='ar') زيارة موقع الفعالية @elseif($lang==='de') Zur Event-Website @else Visit event website @endif
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 17L17 7M9 7h8v8"/></svg>
            </a>
            @endif
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-ev-btn hopn-opacity-btn" style="{{ $btnStyle }}">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt @else Contact Us @endif
            </a>
        </div>
    </div>
</section>

{{-- Details --}}
<section style="padding:70px 0; background:#050A14;" @if($lang==='ar') dir="rtl" @endif>
    <div class="container-shell">
        <div class="hopn-ev-grid">
            <div>
                @if($event->image_url)
                <div class="hopn-media-fit" style="height:340px; border-radius:16px; margin-bottom:32px; border:1px solid rgba(143,184,204,.2);">
                    <img loading="eager" decoding="async" src="{{ $event->image_url }}" alt="{{ $title }}">
                </div>
                @endif
                @if($desc)
                <h2 style="font-size:clamp(22px,3vw,30px); font-weight:800; color:white; margin:0 0 18px;">
                    @if($lang==='ar') عن الفعالية @elseif($lang==='de') Über das Event @else About this event @endif
                </h2>
                <x-doc-body variant="stack" :dir="$lang === 'ar' ? 'rtl' : 'ltr'" :body="$desc" />
                @endif
            </div>

            <aside style="border:1px solid rgba(143,184,204,.2); background:#111827; border-radius:16px; padding:28px;">
                <h3 style="font-size:16px; font-weight:800; color:white; margin:0 0 20px;">
                    @if($lang==='ar') تفاصيل الفعالية @elseif($lang==='de') Event-Details @else Event details @endif
                </h3>
                @if($dateText)
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') التاريخ @elseif($lang==='de') Datum @else Date @endif</p>
                    <p class="hopn-ev-value">{{ $dateText }}</p>
                </div></div>
                @endif
                @if($event->location)
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') الموقع @elseif($lang==='de') Ort @else Location @endif</p>
                    <p class="hopn-ev-value">{{ $event->location }}</p>
                </div></div>
                @endif
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') النوع @elseif($lang==='de') Art @else Type @endif</p>
                    <p class="hopn-ev-value">{{ ucfirst($event->type ?? 'event') }}</p>
                </div></div>
                @if($event->max_attendees)
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') السعة @elseif($lang==='de') Teilnehmerzahl @else Capacity @endif</p>
                    <p class="hopn-ev-value">{{ number_format($event->max_attendees) }} @if($lang==='ar') مشارك @elseif($lang==='de') Teilnehmer @else attendees @endif</p>
                </div></div>
                @endif
                @if($speakers->count())
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') المتحدثون @elseif($lang==='de') Referenten @else Speakers @endif</p>
                    <div>@foreach($speakers as $speaker)<span class="hopn-ev-chip">{{ $speaker }}</span>@endforeach</div>
                </div></div>
                @endif
                @if($sponsors->count())
                <div class="hopn-ev-row"><div>
                    <p class="hopn-ev-label">@if($lang==='ar') الرعاة @elseif($lang==='de') Sponsoren @else Sponsors @endif</p>
                    <div>@foreach($sponsors as $sponsor)<span class="hopn-ev-chip">{{ $sponsor }}</span>@endforeach</div>
                </div></div>
                @endif
            </aside>
        </div>
    </div>
</section>

{{-- Registration Modal --}}
<div id="event-modal" style="display:none; position:fixed; inset:0; z-index:1000; background:rgba(0,0,0,0.8); padding:20px; overflow-y:auto;">
    <div style="max-width:860px; margin:40px auto; display:grid; grid-template-columns:1fr 1fr; border-radius:20px; overflow:hidden; border:1px solid rgba(255,255,255,0.1);">

        {{-- Left: Event Info --}}
        <div style="background:#0A0F1E; padding:40px; display:flex; flex-direction:column; gap:20px; border-right:1px solid rgba(255,255,255,0.06);">
            <div>
                <span id="modal-event-type" style="font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:rgba(143,184,204,0.15); color:#8FB8CC; border:1px solid rgba(143,184,204,0.3); text-transform:uppercase;"></span>
            </div>
            <div>
                <h2 id="modal-event-title" style="font-size:22px; font-weight:800; color:white; line-height:1.3; margin-bottom:12px;"></h2>
                <div id="modal-event-date" style="font-size:14px; color:#CBD5E1; margin-bottom:8px;"></div>
                <div id="modal-event-location" style="font-size:14px; color:#CBD5E1;"></div>
            </div>
            <div style="padding:20px; background:rgba(143,184,204,0.06); border:1px solid rgba(143,184,204,0.15); border-radius:12px;">
                <p style="font-size:13px; color:#CBD5E1; line-height:1.7; margin:0;">
                    @if($lang==='ar') سجل الآن لتأمين مكانك. الأماكن محدودة.
                    @elseif($lang==='de') Melden Sie sich an, um Ihren Platz zu sichern. Plätze sind begrenzt.
                    @else Register now to secure your spot. Seats are limited. @endif
                </p>
            </div>
            <button onclick="closeEventForm()"
                    class="hopn-link-accent" style="margin-top:auto; display:inline-flex; align-items:center; gap:6px; color:#94A3B8; font-size:13px; background:none; border:none; cursor:pointer; padding:0;">
                ← @if($lang==='ar') إغلاق @elseif($lang==='de') Schließen @else Close @endif
            </button>
        </div>

        {{-- Right: Form --}}
        <div style="background:#0D1425; padding:40px;">
            <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:24px;">
                @if($lang==='ar') تسجيل @elseif($lang==='de') Anmeldung @else Register @endif
            </h3>
            <form method="POST" action="{{ route('leads.event-registration', ['lang'=>$lang]) }}">
                @csrf
                <x-turnstile />
                <input type="hidden" name="event_interest" id="modal-event-type-input">
                <input type="hidden" name="event_title" id="modal-event-title-input">
                <div style="display:grid; gap:14px;">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div>
                            <label for="hopn-first-name-18ea91" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') الاسم الأول @elseif($lang==='de') Vorname @else First Name @endif *
                            </label>
                            <input id="hopn-first-name-18ea91" type="text" name="first_name" required
                                   style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(143,184,204,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        </div>
                        <div>
                            <label for="hopn-last-name-18ea92" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') اسم العائلة @elseif($lang==='de') Nachname @else Last Name @endif *
                            </label>
                            <input id="hopn-last-name-18ea92" type="text" name="last_name" required
                                   style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(143,184,204,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        </div>
                    </div>
                    <div>
                        <label for="hopn-email-18ea93" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') البريد الإلكتروني @elseif($lang==='de') E-Mail @else Email Address @endif *
                        </label>
                        <input id="hopn-email-18ea93" type="email" name="email" required
                               style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                               onfocus="this.style.borderColor='rgba(143,184,204,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                    </div>
                    <div>
                        <label for="hopn-company-18ea94" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') الشركة @elseif($lang==='de') Unternehmen @else Company / Organization @endif
                        </label>
                        <input id="hopn-company-18ea94" type="text" name="company"
                               style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                               onfocus="this.style.borderColor='rgba(143,184,204,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                    </div>
                    <div>
                        <label for="hopn-message-18ea95" style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') رسالة @elseif($lang==='de') Nachricht @else Message @endif
                        </label>
                        <textarea id="hopn-message-18ea95" name="message" rows="3"
                                  style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical; outline:none;"
                                  onfocus="this.style.borderColor='rgba(143,184,204,0.5)'"
                                  onblur="this.style.borderColor='rgba(255,255,255,0.08)'"></textarea>
                    </div>
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <input type="checkbox" name="gdpr_consent" id="gdpr_event" required style="margin-top:3px; flex-shrink:0;">
                        <label for="gdpr_event" style="font-size:12px; color:#94A3B8; line-height:1.6;">
                            @if($lang==='ar') أوافق على <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">سياسة الخصوصية</a>. *
                            @elseif($lang==='de') Ich stimme der <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Datenschutzerklärung</a> zu. *
                            @else I agree to the <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Privacy Policy</a> and consent to data processing. * @endif
                        </label>
                    </div>
                    <button type="submit"
                            class="hopn-lift-btn" style="width:100%; padding:14px; border-radius:10px; background:#245B78; color:white; font-size:15px; font-weight:700; border:none; cursor:pointer; transition:all 0.2s;">
                        @if($lang==='ar') سجل الآن @elseif($lang==='de') Jetzt registrieren @else Register Now @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
function openEventForm(id, title, type, date, location) {
    var colors = {conference:'#245B78',workshop:'#245B78',webinar:'#245B78',hackathon:'#245B78',startup:'#8FB8CC',research:'#245B78'};
    var c = colors[type] || '#245B78';
    var typeEl = document.getElementById('modal-event-type');
    typeEl.textContent = type.charAt(0).toUpperCase() + type.slice(1);
    typeEl.style.background = c + '15';
    typeEl.style.color = c;
    typeEl.style.borderColor = c + '30';
    document.getElementById('modal-event-title').textContent = title;
    document.getElementById('modal-event-date').textContent = date || '';
    document.getElementById('modal-event-location').textContent = location || '';
    document.getElementById('modal-event-type-input').value = type;
    document.getElementById('modal-event-title-input').value = title;
    document.getElementById('event-modal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeEventForm() {
    document.getElementById('event-modal').style.display = 'none';
    document.body.style.overflow = '';
}

document.getElementById('event-modal').addEventListener('click', function(e) {
    if (e.target === this) closeEventForm();
});

@if(session('event_success'))
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('event-modal').style.display = 'none';
    document.body.style.overflow = '';
    var toast = document.getElementById('success-toast');
    if (toast) {
        setTimeout(function() {
            toast.style.opacity = '0';
            setTimeout(function() { toast.style.display = 'none'; }, 500);
        }, 5000);
    }
});
@endif
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": {{ json_encode($title) }},
    @if($event->date)
    "startDate": "{{ $event->date->toIso8601String() }}",
    @endif
    @if($event->location)
    "location": { "@type": "Place", "name": {{ json_encode($event->location) }} },
    @endif
    @if(!empty($event->image_url))
    "image": {{ json_encode($event->image_url) }},
    @endif
    "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
    "eventStatus": "https://schema.org/EventScheduled",
    "organizer": { "@type": "Organization", "name": "HOPn", "url": "{{ url('/') }}" }
}
</script>
</x-layouts.public>
