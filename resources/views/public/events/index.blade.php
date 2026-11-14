<x-layouts.public :title="$lang==='ar'?'الفعاليات':($lang==='de'?'Events':'Events & Workshops')">
<style>
    .hopn-filter { border:1px solid rgba(255,255,255,0.16); background:rgba(255,255,255,0.04); color:#CBD5E1; transition:background-color 0.2s; }
    .hopn-filter:hover { background:rgba(255,255,255,0.09); }
    html[data-theme] .hopn-filter[data-active="true"] { background:#245B78 !important; border-color:#245B78 !important; color:#FFFFFF !important; }
    html[data-theme="light"] .hopn-filter { background:#FFFFFF; border-color:#C8D2D8; color:#243746 !important; }
    html[data-theme="light"] .hopn-filter:hover { background:#EEF3F5; }
</style>

@php $lang = request()->route('lang', 'en'); @endphp

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:70vh; display:flex; align-items:center;">

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(143,184,204,0.3); background:rgba(143,184,204,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#245B78; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC;">
                @if($lang==='ar') فعاليات HOPn @elseif($lang==='de') HOPn Events @else HOPn Events @endif
            </span>
        </div>

        <h1 style="font-size:clamp(36px,6vw,76px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">فعاليات وورش عمل</span><br>
                <span style="color:#8FB8CC;">HOPn</span>
            @elseif($lang==='de')
                <span style="color:white;">Events & Workshops</span><br>
                <span style="color:#8FB8CC;">von HOPn</span>
            @else
                <span style="color:white;">HOPn Events</span><br>
                <span style="color:#8FB8CC;">& Workshops</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') انضم إلى مؤتمراتنا وورش العمل والويبينار وفعاليات الشركات الناشئة عبر أوروبا وما وراءها.
            @elseif($lang==='de') Nehmen Sie an unseren Konferenzen, Workshops, Webinaren und Startup-Events teil.
            @else Join our conferences, workshops, webinars, hackathons, and startup events across Europe and beyond. @endif
        </p>

        {{-- Event Type Filter --}}
        <div style="display:flex; flex-wrap:wrap; gap:8px; justify-content:center;">
            @php
            $types = [
                ['key'=>'all',        'en'=>'All Events',  'de'=>'Alle',        'ar'=>'الكل',          'color'=>'#8FB8CC'],
                ['key'=>'conference', 'en'=>'Conference',  'de'=>'Konferenz',   'ar'=>'مؤتمر',         'color'=>'#8FB8CC'],
                ['key'=>'workshop',   'en'=>'Workshop',    'de'=>'Workshop',    'ar'=>'ورشة عمل',      'color'=>'#8FB8CC'],
                ['key'=>'webinar',    'en'=>'Webinar',     'de'=>'Webinar',     'ar'=>'ويبينار',       'color'=>'#8FB8CC'],
                ['key'=>'hackathon',  'en'=>'Hackathon',   'de'=>'Hackathon',   'ar'=>'هاكاثون',       'color'=>'#8FB8CC'],
                ['key'=>'startup',    'en'=>'Startup',     'de'=>'Startup',     'ar'=>'شركات ناشئة',   'color'=>'#8FB8CC'],
                ['key'=>'research',   'en'=>'Research',    'de'=>'Forschung',   'ar'=>'بحث',           'color'=>'#245B78'],
            ];
            @endphp
            @foreach($types as $type)
            <button type="button" onclick="filterEvents('{{ $type['key'] }}')"
                    id="filter-{{ $type['key'] }}" class="hopn-filter" data-active="{{ $type['key']==='all' ? 'true' : 'false' }}"
                    style="padding:8px 18px; border-radius:999px; font-size:13px; font-weight:600; cursor:pointer;">
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
                    'conference'=>'#245B78','workshop'=>'#245B78','webinar'=>'#245B78',
                    'hackathon'=>'#245B78','startup'=>'#8FB8CC','networking'=>'#245B78',
                    'research'=>'#245B78'
                ];
                $c = $typeColors[$event->type] ?? '#8FB8CC';
                $title = $lang==='de'&&$event->title_de ? $event->title_de : ($lang==='ar'&&$event->title_ar ? $event->title_ar : $event->title);
                $desc = $lang==='de'&&$event->description_de ? $event->description_de : ($lang==='ar'&&$event->description_ar ? $event->description_ar : $event->description);
            @endphp
              <a href="{{ route('events.show', ['lang'=>$lang, 'event'=>$event->url_key]) }}" class="event-card hopn-lift-card"
                  data-type="{{ $event->type }}" style="text-decoration:none; position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:8px; overflow:hidden;">

                {{-- Top color bar --}}
                <div style="height:3px; background:#245B78;"></div>

                {{-- Image --}}
                @if($event->image_url)
                <div class="hopn-media-fit" style="height:180px; overflow:hidden; background:#0D1425;">
                    <img loading="lazy" decoding="async" src="{{ $event->image_url }}" alt="{{ $title }}"
                         style="width:100%; height:100%;">
                </div>
                @else
                <div style="height:140px; overflow:hidden; background:#EEF3F5;"><img loading="lazy" decoding="async" src="/images/illustrations/events.svg" alt="" style="width:100%; height:100%; object-fit:cover; padding:24px;"></div>
                @endif

                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:14px;">

                    {{-- Type + Date --}}
                    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                        <span style="font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:{{ $c }}15; color:{{ $c }}; border:1px solid {{ $c }}30; text-transform:uppercase; letter-spacing:0.08em;">
                            {{ ucfirst($event->type ?? 'event') }}
                        </span>
                        @if($event->date)
                        <span style="font-size:12px; color:#94A3B8; font-weight:500;">
                            {{ $event->date->locale(request()->route('lang','en'))->translatedFormat('d M Y') }}
                        </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h2 style="font-size:18px; font-weight:800; color:white; line-height:1.3; margin:0;">{{ $title }}</h2>

                    {{-- Description --}}
                    @if($desc)
                    <p style="font-size:13px; color:#CBD5E1; line-height:1.7; margin:0;">{{ Str::limit($desc, 110) }}</p>
                    @endif

                    {{-- Location --}}
                    @if($event->location)
                    <div style="display:flex; align-items:center; gap:6px; font-size:13px; color:#CBD5E1;">
                        <span>{{ $event->location }}</span>
                    </div>
                    @endif

                    {{-- Speakers --}}
                    @if($event->speaker_names)
                    <div>
                        <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#64748B; margin-bottom:6px;">
                            @if($lang==='ar') المتحدثون @elseif($lang==='de') Referenten @else Speakers @endif
                        </div>
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            @foreach(explode(',', $event->speaker_names) as $speaker)
                            <span style="font-size:12px; padding:3px 10px; border-radius:999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); color:#CBD5E1;">
                                {{ trim($speaker) }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Attendees --}}
                    @if($event->max_attendees)
                    <div style="font-size:12px; color:#94A3B8;">
                        @if($lang==='ar') حد أقصى @elseif($lang==='de') Max. @else Max @endif {{ number_format($event->max_attendees) }} @if($lang==='ar') مشارك @elseif($lang==='de') Teilnehmer @else attendees @endif
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div style="margin-top:auto; padding-top:16px; border-top:1px solid rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:space-between; gap:10px;">
                        <span style="font-size:13px; font-weight:700; color:#8FB8CC;">
                            @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                        </span>
                        @unless($event->registration_open)
                        <span style="font-size:11px; font-weight:600; color:#94A3B8;">
                            @if($lang==='ar') التسجيل مغلق @elseif($lang==='de') Anmeldung geschlossen @else Registration Closed @endif
                        </span>
                        @endunless
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:100px 40px; color:#64748B;">
            <h2 style="font-size:24px; font-weight:800; color:#94A3B8; margin-bottom:12px;">
                <x-coming-soon-text />
            </h2>
            <p style="font-size:16px; color:#64748B; max-width:400px; margin:0 auto;">
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
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
                @if($lang==='ar') أنواع الفعاليات @elseif($lang==='de') Veranstaltungsformate @else Event Formats @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ماذا نقدم @elseif($lang==='de') Was wir anbieten @else What We Offer @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:16px;">
            @php
            $formats = [
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Conferences','de'=>'Konferenzen','ar'=>'المؤتمرات',
                 'desc_en'=>'Large-scale innovation conferences bringing together industry leaders, researchers, and entrepreneurs.',
                 'desc_de'=>'Großformatige Innovationskonferenzen mit Branchenführern und Forschern.',
                 'desc_ar'=>'مؤتمرات الابتكار واسعة النطاق تجمع قادة الصناعة والباحثين.'],
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Workshops','de'=>'Workshops','ar'=>'ورش العمل',
                 'desc_en'=>'Hands-on technical workshops on AI, data, robotics, and digital transformation.',
                 'desc_de'=>'Praktische technische Workshops zu KI, Daten und Robotik.',
                 'desc_ar'=>'ورش عمل تقنية عملية في الذكاء الاصطناعي والبيانات والروبوتيكا.'],
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Webinars','de'=>'Webinare','ar'=>'الويبينار',
                 'desc_en'=>'Online knowledge sessions with industry experts accessible from anywhere.',
                 'desc_de'=>'Online-Wissenssitzungen mit Branchenexperten von überall zugänglich.',
                 'desc_ar'=>'جلسات معرفية عبر الإنترنت مع خبراء الصناعة من أي مكان.'],
                ['icon'=>'H','color'=>'#8FB8CC','en'=>'Hackathons','de'=>'Hackathons','ar'=>'الهاكاثون',
                 'desc_en'=>'Intensive innovation sprints where teams build solutions to real-world challenges.',
                 'desc_de'=>'Intensive Innovations-Sprints, bei denen Teams Lösungen entwickeln.',
                 'desc_ar'=>'سباقات ابتكار مكثفة يبني فيها الفرق حلولاً للتحديات الواقعية.'],
                ['icon'=>'S','color'=>'#8FB8CC','en'=>'Startup Events','de'=>'Startup-Events','ar'=>'فعاليات الشركات الناشئة',
                 'desc_en'=>'Demo days, pitch competitions, and networking events for the startup ecosystem.',
                 'desc_de'=>'Demo Days, Pitch-Wettbewerbe und Networking für das Startup-Ökosystem.',
                 'desc_ar'=>'أيام العرض ومسابقات العروض التقديمية وفعاليات التواصل للشركات الناشئة.'],
                ['icon'=>'R','color'=>'#245B78','en'=>'Research Events','de'=>'Forschungsevents','ar'=>'الفعاليات البحثية',
                 'desc_en'=>'Academic and industry research presentations, paper sessions, and innovation showcases.',
                 'desc_de'=>'Akademische und industrielle Forschungspräsentationen.',
                 'desc_ar'=>'عروض الأبحاث الأكاديمية والصناعية وجلسات الأوراق البحثية.'],
            ];
            @endphp
            @foreach($formats as $format)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:10px;">{{ $format[$lang] ?? $format['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $format['desc_'.$lang] ?? $format['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,48px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد استضافة فعالية مع HOPn؟ @elseif($lang==='de') Möchten Sie ein Event mit HOPn veranstalten? @else Want to Host an Event with HOPn? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل معنا لمناقشة شراكات الفعاليات.
            @elseif($lang==='de') Kontaktieren Sie uns für Event-Partnerschaften.
            @else Get in touch to discuss event partnerships and sponsorships. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#245B78; color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
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

    // Update filter buttons (look is handled by CSS through data-active, so both themes stay readable)
    var buttons = document.querySelectorAll('[id^="filter-"]');
    buttons.forEach(function(btn) { btn.dataset.active = 'false'; });
    var activeBtn = document.getElementById('filter-' + type);
    if (activeBtn) { activeBtn.dataset.active = 'true'; }
}

</script>

@foreach($events as $event)
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": {{ json_encode($lang==='de'&&$event->title_de ? $event->title_de : ($lang==='ar'&&$event->title_ar ? $event->title_ar : $event->title)) }},
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
@endforeach

</x-layouts.public>