<x-layouts.public :title="$lang==='ar'?'الفعاليات':($lang==='de'?'Events':'Events & Workshops')">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Success Toast --}}
@if(session('event_success'))
<div id="success-toast" style="display:flex; position:fixed; top:24px; right:24px; z-index:2000; align-items:center; gap:12px; background:#111827; border:1px solid rgba(16,185,129,0.4); border-radius:12px; padding:16px 20px; box-shadow:0 8px 32px rgba(0,0,0,0.4); max-width:380px;">
    <div style="font-size:24px;">✅</div>
    <div>
        <div style="font-size:14px; font-weight:700; color:white; margin-bottom:4px;">
            @if($lang==='ar') تم التسجيل! @elseif($lang==='de') Registrierung erhalten! @else Registration Received! @endif
        </div>
        <div style="font-size:13px; color:#94A3B8;">{{ session('event_success') }}</div>
    </div>
    <button onclick="document.getElementById('success-toast').style.display='none'"
            style="margin-left:auto; background:none; border:none; color:#94A3B8; cursor:pointer; font-size:18px;">×</button>
</div>
@endif

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:70vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(245,158,11,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-200px; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(245,158,11,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.3); background:rgba(245,158,11,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#F59E0B; display:inline-block; box-shadow:0 0 8px #F59E0B;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B;">
                @if($lang==='ar') فعاليات HOPn @elseif($lang==='de') HOPn Events @else HOPn Events @endif
            </span>
        </div>

        <h1 style="font-size:clamp(36px,6vw,76px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">فعاليات وورش عمل</span><br>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">HOPn</span>
            @elseif($lang==='de')
                <span style="color:white;">Events & Workshops</span><br>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">von HOPn</span>
            @else
                <span style="color:white;">HOPn Events</span><br>
                <span style="background:linear-gradient(135deg,#F59E0B,#EF4444,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">& Workshops</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2vw,20px); color:#94A3B8; max-width:600px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') انضم إلى مؤتمراتنا وورش العمل والويبينار وفعاليات الشركات الناشئة عبر أوروبا وما وراءها.
            @elseif($lang==='de') Nehmen Sie an unseren Konferenzen, Workshops, Webinaren und Startup-Events teil.
            @else Join our conferences, workshops, webinars, hackathons, and startup events across Europe and beyond. @endif
        </p>

        {{-- Event Type Filter --}}
        <div style="display:flex; flex-wrap:wrap; gap:8px; justify-content:center;">
            @php
            $types = [
                ['key'=>'all',        'en'=>'All Events',  'de'=>'Alle',        'ar'=>'الكل',          'color'=>'#F59E0B'],
                ['key'=>'conference', 'en'=>'Conference',  'de'=>'Konferenz',   'ar'=>'مؤتمر',         'color'=>'#4F6EF7'],
                ['key'=>'workshop',   'en'=>'Workshop',    'de'=>'Workshop',    'ar'=>'ورشة عمل',      'color'=>'#10B981'],
                ['key'=>'webinar',    'en'=>'Webinar',     'de'=>'Webinar',     'ar'=>'ويبينار',       'color'=>'#06B6D4'],
                ['key'=>'hackathon',  'en'=>'Hackathon',   'de'=>'Hackathon',   'ar'=>'هاكاثون',       'color'=>'#8B5CF6'],
                ['key'=>'startup',    'en'=>'Startup',     'de'=>'Startup',     'ar'=>'شركات ناشئة',   'color'=>'#EF4444'],
                ['key'=>'research',   'en'=>'Research',    'de'=>'Forschung',   'ar'=>'بحث',           'color'=>'#A855F7'],
            ];
            @endphp
            @foreach($types as $type)
            <button onclick="filterEvents('{{ $type['key'] }}')"
                    id="filter-{{ $type['key'] }}"
                    class="hopn-lift-btn" style="padding:8px 18px; border-radius:999px; font-size:13px; font-weight:600; border:1px solid rgba(255,255,255,0.1); background:{{ $type['key']==='all'?$type['color']:'rgba(255,255,255,0.04)' }}; color:{{ $type['key']==='all'?'white':'#94A3B8' }}; cursor:pointer; transition:all 0.2s;">
                {{ $type[$lang] ?? $type['en'] }}
            </button>
            @endforeach
        </div>
    </div>
</section>

{{-- Events Grid --}}
<section style="padding:80px 0; background:#030712;">
    <div class="container-shell">

        @if($events->count() > 0)
        <div id="events-grid" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:20px;">
            @foreach($events as $event)
            @php
                $typeColors = [
                    'conference'=>'#4F6EF7','workshop'=>'#10B981','webinar'=>'#06B6D4',
                    'hackathon'=>'#8B5CF6','startup'=>'#EF4444','networking'=>'#F59E0B',
                    'research'=>'#A855F7'
                ];
                $c = $typeColors[$event->type] ?? '#F59E0B';
                $title = $lang==='de'&&$event->title_de ? $event->title_de : ($lang==='ar'&&$event->title_ar ? $event->title_ar : $event->title);
                $desc = $lang==='de'&&$event->description_de ? $event->description_de : ($lang==='ar'&&$event->description_ar ? $event->description_ar : $event->description);
            @endphp
            <div class="event-card"
                 data-type="{{ $event->type }}"
                 class="hopn-lift-card" style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; overflow:hidden; transition:all 0.3s;">

                {{-- Top color bar --}}
                <div style="height:3px; background:linear-gradient(90deg,{{ $c }},transparent);"></div>

                {{-- Image --}}
                @if($event->image_url)
                <div style="height:180px; overflow:hidden; background:#0D1425;">
                    <img src="{{ $event->image_url }}" alt="{{ $title }}"
                         class="hopn-link-fade-in" style="width:100%; height:100%; object-fit:cover; opacity:0.8; transition:opacity 0.3s;">
                </div>
                @endif

                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:14px;">

                    {{-- Type + Date --}}
                    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                        <span style="font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase; letter-spacing:0.08em;">
                            {{ ucfirst($event->type ?? 'event') }}
                        </span>
                        @if($event->date)
                        <span style="font-size:12px; color:#64748B; font-weight:500;">
                            📅 {{ $event->date->format('d M Y') }}
                        </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 style="font-size:18px; font-weight:800; color:white; line-height:1.3; margin:0;">{{ $title }}</h3>

                    {{-- Description --}}
                    @if($desc)
                    <p style="font-size:13px; color:#94A3B8; line-height:1.7; margin:0;">{{ Str::limit($desc, 110) }}</p>
                    @endif

                    {{-- Location --}}
                    @if($event->location)
                    <div style="display:flex; align-items:center; gap:6px; font-size:13px; color:#94A3B8;">
                        <span>📍</span> {{ $event->location }}
                    </div>
                    @endif

                    {{-- Speakers --}}
                    @if($event->speaker_names)
                    <div>
                        <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:6px;">
                            @if($lang==='ar') المتحدثون @elseif($lang==='de') Referenten @else Speakers @endif
                        </div>
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            @foreach(explode(',', $event->speaker_names) as $speaker)
                            <span style="font-size:12px; padding:3px 10px; border-radius:999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); color:#94A3B8;">
                                {{ trim($speaker) }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Attendees --}}
                    @if($event->max_attendees)
                    <div style="font-size:12px; color:#64748B;">
                        👥 @if($lang==='ar') حد أقصى @elseif($lang==='de') Max. @else Max @endif {{ number_format($event->max_attendees) }} @if($lang==='ar') مشارك @elseif($lang==='de') Teilnehmer @else attendees @endif
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div style="margin-top:auto; padding-top:16px; border-top:1px solid rgba(255,255,255,0.05);">
                        @if($event->registration_open)
                        <button onclick="openEventForm({{ $event->id }}, '{{ addslashes($title) }}', '{{ $event->type }}', '{{ $event->date ? $event->date->format('d M Y') : '' }}', '{{ addslashes($event->location ?? '') }}')"
                                class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:10px 20px; border-radius:8px; background:{{ $c }}; color:white; font-size:13px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 20px {{ $c }}40; transition:all 0.2s;">
                            @if($lang==='ar') سجل الآن @elseif($lang==='de') Jetzt anmelden @else Register Now @endif →
                        </button>
                        @else
                        <span style="display:inline-flex; align-items:center; padding:10px 20px; border-radius:8px; background:rgba(255,255,255,0.04); color:#64748B; font-size:13px; font-weight:600; border:1px solid rgba(255,255,255,0.06);">
                            @if($lang==='ar') التسجيل مغلق @elseif($lang==='de') Anmeldung geschlossen @else Registration Closed @endif
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:100px 40px; color:#475569;">
            <div style="font-size:64px; margin-bottom:20px;">🎤</div>
            <h3 style="font-size:24px; font-weight:800; color:#64748B; margin-bottom:12px;">
                @if($lang==='ar') لا توجد فعاليات قادمة @elseif($lang==='de') Keine bevorstehenden Events @else No Upcoming Events @endif
            </h3>
            <p style="font-size:16px; color:#475569; max-width:400px; margin:0 auto;">
                @if($lang==='ar') تحقق مرة أخرى قريباً للاطلاع على الفعاليات القادمة.
                @elseif($lang==='de') Schauen Sie bald wieder vorbei für kommende Events.
                @else Check back soon for upcoming events and workshops. @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- Event Types Section --}}
<section style="padding:80px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B; margin-bottom:16px;">
                @if($lang==='ar') أنواع الفعاليات @elseif($lang==='de') Veranstaltungsformate @else Event Formats @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ماذا نقدم @elseif($lang==='de') Was wir anbieten @else What We Offer @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:16px;">
            @php
            $formats = [
                ['icon'=>'🎤','color'=>'#4F6EF7','en'=>'Conferences','de'=>'Konferenzen','ar'=>'المؤتمرات',
                 'desc_en'=>'Large-scale innovation conferences bringing together industry leaders, researchers, and entrepreneurs.',
                 'desc_de'=>'Großformatige Innovationskonferenzen mit Branchenführern und Forschern.',
                 'desc_ar'=>'مؤتمرات الابتكار واسعة النطاق تجمع قادة الصناعة والباحثين.'],
                ['icon'=>'🛠','color'=>'#10B981','en'=>'Workshops','de'=>'Workshops','ar'=>'ورش العمل',
                 'desc_en'=>'Hands-on technical workshops on AI, data, robotics, and digital transformation.',
                 'desc_de'=>'Praktische technische Workshops zu KI, Daten und Robotik.',
                 'desc_ar'=>'ورش عمل تقنية عملية في الذكاء الاصطناعي والبيانات والروبوتيكا.'],
                ['icon'=>'💻','color'=>'#06B6D4','en'=>'Webinars','de'=>'Webinare','ar'=>'الويبينار',
                 'desc_en'=>'Online knowledge sessions with industry experts accessible from anywhere.',
                 'desc_de'=>'Online-Wissenssitzungen mit Branchenexperten von überall zugänglich.',
                 'desc_ar'=>'جلسات معرفية عبر الإنترنت مع خبراء الصناعة من أي مكان.'],
                ['icon'=>'⚡','color'=>'#8B5CF6','en'=>'Hackathons','de'=>'Hackathons','ar'=>'الهاكاثون',
                 'desc_en'=>'Intensive innovation sprints where teams build solutions to real-world challenges.',
                 'desc_de'=>'Intensive Innovations-Sprints, bei denen Teams Lösungen entwickeln.',
                 'desc_ar'=>'سباقات ابتكار مكثفة يبني فيها الفرق حلولاً للتحديات الواقعية.'],
                ['icon'=>'🚀','color'=>'#EF4444','en'=>'Startup Events','de'=>'Startup-Events','ar'=>'فعاليات الشركات الناشئة',
                 'desc_en'=>'Demo days, pitch competitions, and networking events for the startup ecosystem.',
                 'desc_de'=>'Demo Days, Pitch-Wettbewerbe und Networking für das Startup-Ökosystem.',
                 'desc_ar'=>'أيام العرض ومسابقات العروض التقديمية وفعاليات التواصل للشركات الناشئة.'],
                ['icon'=>'🔬','color'=>'#A855F7','en'=>'Research Events','de'=>'Forschungsevents','ar'=>'الفعاليات البحثية',
                 'desc_en'=>'Academic and industry research presentations, paper sessions, and innovation showcases.',
                 'desc_de'=>'Akademische und industrielle Forschungspräsentationen.',
                 'desc_ar'=>'عروض الأبحاث الأكاديمية والصناعية وجلسات الأوراق البحثية.'],
            ];
            @endphp
            @foreach($formats as $format)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $format['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $format['color'] }}15; border:1px solid {{ $format['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $format['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:10px;">{{ $format[$lang] ?? $format['en'] }}</h3>
                <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $format['desc_'.$lang] ?? $format['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Registration Modal --}}
<div id="event-modal" style="display:none; position:fixed; inset:0; z-index:1000; background:rgba(0,0,0,0.8); backdrop-filter:blur(12px); padding:20px; overflow-y:auto;">
    <div style="max-width:860px; margin:40px auto; display:grid; grid-template-columns:1fr 1fr; border-radius:20px; overflow:hidden; border:1px solid rgba(255,255,255,0.1);">

        {{-- Left: Event Info --}}
        <div style="background:#0A0F1E; padding:40px; display:flex; flex-direction:column; gap:20px; border-right:1px solid rgba(255,255,255,0.06);">
            <div>
                <span id="modal-event-type" style="font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:rgba(245,158,11,0.15); color:#F59E0B; border:1px solid rgba(245,158,11,0.3); text-transform:uppercase;"></span>
            </div>
            <div>
                <h2 id="modal-event-title" style="font-size:22px; font-weight:800; color:white; line-height:1.3; margin-bottom:12px;"></h2>
                <div id="modal-event-date" style="font-size:14px; color:#94A3B8; margin-bottom:8px;"></div>
                <div id="modal-event-location" style="font-size:14px; color:#94A3B8;"></div>
            </div>
            <div style="padding:20px; background:rgba(245,158,11,0.06); border:1px solid rgba(245,158,11,0.15); border-radius:12px;">
                <p style="font-size:13px; color:#94A3B8; line-height:1.7; margin:0;">
                    @if($lang==='ar') سجل الآن لتأمين مكانك. الأماكن محدودة.
                    @elseif($lang==='de') Melden Sie sich an, um Ihren Platz zu sichern. Plätze sind begrenzt.
                    @else Register now to secure your spot. Seats are limited. @endif
                </p>
            </div>
            <button onclick="closeEventForm()"
                    class="hopn-link-accent" style="margin-top:auto; display:inline-flex; align-items:center; gap:6px; color:#64748B; font-size:13px; background:none; border:none; cursor:pointer; padding:0;">
                ← @if($lang==='ar') رجوع @elseif($lang==='de') Zurück @else Back to Events @endif
            </button>
        </div>

        {{-- Right: Form --}}
        <div style="background:#0D1425; padding:40px;">
            <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:24px;">
                @if($lang==='ar') تسجيل @elseif($lang==='de') Anmeldung @else Register @endif
            </h3>
            <form method="POST" action="{{ route('leads.event-registration', ['lang'=>$lang]) }}">
                @csrf
                <input type="hidden" name="event_interest" id="modal-event-type-input">
                <input type="hidden" name="event_title" id="modal-event-title-input">
                <div style="display:grid; gap:14px;">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') الاسم الأول @elseif($lang==='de') Vorname @else First Name @endif *
                            </label>
                            <input type="text" name="first_name" required
                                   style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') اسم العائلة @elseif($lang==='de') Nachname @else Last Name @endif *
                            </label>
                            <input type="text" name="last_name" required
                                   style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') البريد الإلكتروني @elseif($lang==='de') E-Mail @else Email Address @endif *
                        </label>
                        <input type="email" name="email" required
                               style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                               onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') الشركة @elseif($lang==='de') Unternehmen @else Company / Organization @endif
                        </label>
                        <input type="text" name="company"
                               style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                               onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') رسالة @elseif($lang==='de') Nachricht @else Message @endif
                        </label>
                        <textarea name="message" rows="3"
                                  style="width:100%; padding:10px 14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical; outline:none;"
                                  onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                                  onblur="this.style.borderColor='rgba(255,255,255,0.08)'"></textarea>
                    </div>
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <input type="checkbox" name="gdpr_consent" id="gdpr_event" required style="margin-top:3px; flex-shrink:0;">
                        <label for="gdpr_event" style="font-size:12px; color:#64748B; line-height:1.6;">
                            @if($lang==='ar') أوافق على سياسة الخصوصية. *
                            @elseif($lang==='de') Ich stimme der Datenschutzerklärung zu. *
                            @else I agree to the Privacy Policy and consent to data processing. * @endif
                        </label>
                    </div>
                    <button type="submit"
                            class="hopn-lift-btn" style="width:100%; padding:14px; border-radius:10px; background:#F59E0B; color:white; font-size:15px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 30px rgba(245,158,11,0.3); transition:all 0.2s;">
                        @if($lang==='ar') سجل الآن @elseif($lang==='de') Jetzt registrieren @else Register Now @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(245,158,11,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,48px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد استضافة فعالية مع HOPn؟ @elseif($lang==='de') Möchten Sie ein Event mit HOPn veranstalten? @else Want to Host an Event with HOPn? @endif
        </h2>
        <p style="color:#94A3B8; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل معنا لمناقشة شراكات الفعاليات.
            @elseif($lang==='de') Kontaktieren Sie uns für Event-Partnerschaften.
            @else Get in touch to discuss event partnerships and sponsorships. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#F59E0B; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(245,158,11,0.3); transition:all 0.2s;">
            @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif →
        </a>
    </div>
</section>

<script>
function filterEvents(type) {
    var cards = document.querySelectorAll('.event-card');
    cards.forEach(function(card) {
        if (type === 'all' || card.dataset.type === type) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });

    // Update filter buttons
    var buttons = document.querySelectorAll('[id^="filter-"]');
    buttons.forEach(function(btn) {
        btn.dataset.active = 'false';
        btn.style.background = 'rgba(255,255,255,0.04)';
        btn.style.color = '#94A3B8';
        btn.style.borderColor = 'rgba(255,255,255,0.1)';
    });
    var activeBtn = document.getElementById('filter-' + type);
    if (activeBtn) {
        activeBtn.dataset.active = 'true';
        activeBtn.style.background = '#F59E0B';
        activeBtn.style.color = 'white';
        activeBtn.style.borderColor = '#F59E0B';
    }
}

function openEventForm(id, title, type, date, location) {
    var colors = {conference:'#4F6EF7',workshop:'#10B981',webinar:'#06B6D4',hackathon:'#8B5CF6',startup:'#EF4444',research:'#A855F7'};
    var c = colors[type] || '#F59E0B';
    var typeEl = document.getElementById('modal-event-type');
    typeEl.textContent = type.charAt(0).toUpperCase() + type.slice(1);
    typeEl.style.background = c + '15';
    typeEl.style.color = c;
    typeEl.style.borderColor = c + '30';
    document.getElementById('modal-event-title').textContent = title;
    document.getElementById('modal-event-date').textContent = date ? '📅 ' + date : '';
    document.getElementById('modal-event-location').textContent = location ? '📍 ' + location : '';
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

</x-layouts.public>
