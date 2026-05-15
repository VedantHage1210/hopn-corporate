<x-layouts.public :title="'Events'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(245,158,11,0.10); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.35); background:rgba(245,158,11,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F59E0B; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B;">Events & Workshops</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') فعاليات وورش عمل HOPn
                @elseif($lang === 'de') HOPn Events & Workshops
                @else HOPn Events & Workshops
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') انضم إلى مؤتمراتنا وورش العمل والفعاليات الخاصة بالشركات الناشئة.
                @elseif($lang === 'de') Nehmen Sie an unseren Konferenzen, Workshops und Startup-Events teil.
                @else Join our conferences, workshops, webinars, and startup events across Europe and beyond.
                @endif
            </p>
        </div>
    </section>

    {{-- Events Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">Upcoming</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') الفعاليات القادمة @elseif($lang === 'de') Kommende Veranstaltungen @else Upcoming Events @endif
                </h2>
            </div>

            @if($events->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:20px;">
                @foreach($events as $event)
                @php
                    $typeColors = [
                        'conference' => '#4F6EF7',
                        'workshop'   => '#10B981',
                        'webinar'    => '#06B6D4',
                        'hackathon'  => '#8B5CF6',
                        'startup'    => '#F59E0B',
                        'networking' => '#EF4444',
                        'research'   => '#A855F7',
                    ];
                    $color = $typeColors[$event->type] ?? '#4F6EF7';
                    $title = $lang === 'de' && $event->title_de ? $event->title_de : ($lang === 'ar' && $event->title_ar ? $event->title_ar : $event->title);
                    $desc = $lang === 'de' && $event->description_de ? $event->description_de : ($lang === 'ar' && $event->description_ar ? $event->description_ar : $event->description);
                    $speakers = $event->speaker_names ? explode(',', $event->speaker_names) : [];
                    $sponsors = $event->sponsor_names ? explode(',', $event->sponsor_names) : [];
                @endphp
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; overflow:hidden; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='{{ $color }}40'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">

                    {{-- Top color bar --}}
                    <div style="height:3px; background:{{ $color }};"></div>

                    <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:16px;">

                        {{-- Type + Date --}}
                        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                            <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $color }}20; color:{{ $color }}; border:1px solid {{ $color }}40; text-transform:uppercase; letter-spacing:0.05em;">
                                {{ ucfirst($event->type) }}
                            </span>
                            @if($event->date)
                            <span style="font-size:12px; color:#64748B;">
                                📅 {{ $event->date->format('d M Y') }}
                            </span>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.4;">{{ $title }}</h3>

                        {{-- Description --}}
                        @if($desc)
                        <p style="font-size:13px; color:#64748B; line-height:1.7;">
                            {{ Str::limit($desc, 120) }}
                        </p>
                        @endif

                        {{-- Location --}}
                        @if($event->location)
                        <div style="font-size:13px; color:#94A3B8;">
                            📍 {{ $event->location }}
                        </div>
                        @endif

                        {{-- Speakers --}}
                        @if(count($speakers) > 0)
                        <div>
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:8px;">Speakers</div>
                            <div style="display:flex; flex-wrap:wrap; gap:6px;">
                                @foreach($speakers as $speaker)
                                <span style="font-size:12px; padding:3px 10px; border-radius:999px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.08); color:#94A3B8;">
                                    {{ trim($speaker) }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Sponsors --}}
                        @if(count($sponsors) > 0)
                        <div>
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:8px;">Sponsors</div>
                            <div style="display:flex; flex-wrap:wrap; gap:6px;">
                                @foreach($sponsors as $sponsor)
                                <span style="font-size:12px; padding:3px 10px; border-radius:999px; background:rgba(245,158,11,0.08); border:1px solid rgba(245,158,11,0.2); color:#F59E0B;">
                                    {{ trim($sponsor) }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Max Attendees --}}
                        @if($event->max_attendees)
                        <div style="font-size:12px; color:#64748B;">
                            👥 Max {{ number_format($event->max_attendees) }} attendees
                        </div>
                        @endif

                        {{-- Registration --}}
                        <div style="margin-top:auto; padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
                            @if($event->registration_open)
                                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                                   style="display:inline-flex; align-items:center; gap:8px; padding:10px 20px; border-radius:8px; background:{{ $color }}; color:white; font-size:13px; font-weight:600; text-decoration:none;"
                                   onmouseover="this.style.opacity='0.88'"
                                   onmouseout="this.style.opacity='1'">
                                    @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Register Now @endif →
                                </a>
                            @else
                                <span style="display:inline-flex; align-items:center; gap:8px; padding:10px 20px; border-radius:8px; background:rgba(255,255,255,0.05); color:#64748B; font-size:13px; font-weight:600;">
                                    @if($lang === 'ar') التسجيل مغلق @elseif($lang === 'de') Anmeldung geschlossen @else Registration Closed @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🎤</div>
                <p style="font-size:16px;">No events found. Add events from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Event Registration Form --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="max-width:640px; margin:0 auto;">
                <div style="text-align:center; margin-bottom:40px;">
                    <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">Register</span>
                    <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                        @if($lang === 'ar') سجل في فعالية @elseif($lang === 'de') Für Event anmelden @else Register for an Event @endif
                    </h2>
                </div>

                <div style="border:1px solid rgba(245,158,11,0.2); background:#111827; border-radius:20px; padding:36px;">
                    @if(session('event_success'))
                    <div style="margin-bottom:20px; padding:12px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px;">
                        ✅ {{ session('event_success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('leads.event-registration', ['lang' => $lang]) }}">
                        @csrf
                        <div style="display:grid; gap:16px;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                                <div>
                                    <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                        @if($lang === 'ar') الاسم الأول @elseif($lang === 'de') Vorname @else First Name @endif *
                                    </label>
                                    <input type="text" name="first_name" required
                                           style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                           onfocus="this.style.borderColor='#F59E0B'"
                                           onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                                </div>
                                <div>
                                    <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                        @if($lang === 'ar') اسم العائلة @elseif($lang === 'de') Nachname @else Last Name @endif *
                                    </label>
                                    <input type="text" name="last_name" required
                                           style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                           onfocus="this.style.borderColor='#F59E0B'"
                                           onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                                </div>
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') البريد الإلكتروني @elseif($lang === 'de') E-Mail @else Email Address @endif *
                                </label>
                                <input type="email" name="email" required
                                       style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#F59E0B'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') الشركة @elseif($lang === 'de') Unternehmen @else Company / Organization @endif
                                </label>
                                <input type="text" name="company"
                                       style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#F59E0B'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') الفعالية @elseif($lang === 'de') Veranstaltung @else Event of Interest @endif
                                </label>
                                <select name="event_interest"
                                        style="width:100%; padding:10px 14px; background:#1e293b; border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;">
                                    <option value="">Select an event type</option>
                                    <option value="conference">Conference</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="hackathon">Hackathon</option>
                                    <option value="startup">Startup Event</option>
                                    <option value="networking">Networking</option>
                                    <option value="research">Research Event</option>
                                </select>
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') رسالة @elseif($lang === 'de') Nachricht @else Message (Optional) @endif
                                </label>
                                <textarea name="message" rows="3"
                                          style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical;"
                                          onfocus="this.style.borderColor='#F59E0B'"
                                          onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                            </div>
                            <div style="display:flex; align-items:flex-start; gap:10px;">
                                <input type="checkbox" name="gdpr_consent" id="gdpr_event" required style="margin-top:3px;">
                                <label for="gdpr_event" style="font-size:12px; color:#64748B; line-height:1.5;">
                                    @if($lang === 'ar') أوافق على سياسة الخصوصية ومعالجة بياناتي.
                                    @elseif($lang === 'de') Ich stimme der Datenschutzerklärung zu.
                                    @else I agree to the Privacy Policy and consent to data processing. *
                                    @endif
                                </label>
                            </div>
                            <button type="submit"
                                    style="width:100%; padding:14px; border-radius:10px; background:#F59E0B; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer; transition:opacity 0.2s;"
                                    onmouseover="this.style.opacity='0.88'"
                                    onmouseout="this.style.opacity='1'">
                                @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt registrieren @else Register Now @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
