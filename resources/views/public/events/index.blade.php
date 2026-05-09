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
                @if($lang === 'ar')
                    فعاليات وورش عمل HOPn
                @elseif($lang === 'de')
                    HOPn Events & Workshops
                @else
                    HOPn Events & Workshops
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar')
                    انضم إلى مؤتمراتنا وورش العمل والفعاليات الخاصة بالشركات الناشئة.
                @elseif($lang === 'de')
                    Nehmen Sie an unseren Konferenzen, Workshops und Startup-Events teil.
                @else
                    Join our conferences, workshops, webinars, and startup events across Europe and beyond.
                @endif
            </p>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#F59E0B; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(245,158,11,0.3);"
               onmouseover="this.style.opacity='0.88'"
               onmouseout="this.style.opacity='1'">
                @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt registrieren @else Register Now @endif
            </a>
        </div>
    </section>

    {{-- Event Types --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">What We Host</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') أنواع الفعاليات @elseif($lang === 'de') Veranstaltungsarten @else Event Types @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px;">
                @foreach([
                    ['icon' => '🎤', 'en' => 'Conferences',        'de' => 'Konferenzen',      'ar' => 'المؤتمرات',        'desc_en' => 'Annual and regional conferences on AI, data, robotics, and innovation.', 'desc_de' => 'Jährliche Konferenzen zu KI, Daten und Robotik.', 'desc_ar' => 'مؤتمرات سنوية وإقليمية حول الذكاء الاصطناعي.'],
                    ['icon' => '🛠', 'en' => 'Workshops',          'de' => 'Workshops',        'ar' => 'ورش العمل',        'desc_en' => 'Hands-on technical workshops for teams and professionals.', 'desc_de' => 'Praktische technische Workshops für Teams.', 'desc_ar' => 'ورش عمل تقنية عملية للفرق والمهنيين.'],
                    ['icon' => '💻', 'en' => 'Webinars',           'de' => 'Webinare',         'ar' => 'الندوات الإلكترونية', 'desc_en' => 'Online sessions covering the latest trends in tech and innovation.', 'desc_de' => 'Online-Sessions zu neuesten Tech-Trends.', 'desc_ar' => 'جلسات عبر الإنترنت تغطي أحدث اتجاهات التكنولوجيا.'],
                    ['icon' => '🚀', 'en' => 'Startup Events',     'de' => 'Startup-Events',   'ar' => 'فعاليات الشركات الناشئة', 'desc_en' => 'Pitch nights, demo days, and networking for founders and investors.', 'desc_de' => 'Pitch Nights, Demo Days und Networking.', 'desc_ar' => 'ليالي العروض التقديمية وأيام العرض التوضيحي.'],
                    ['icon' => '🔬', 'en' => 'Research Events',    'de' => 'Forschungsevents', 'ar' => 'فعاليات البحث',    'desc_en' => 'Academic and industry research showcases and collaboration sessions.', 'desc_de' => 'Akademische und industrielle Forschungsveranstaltungen.', 'desc_ar' => 'عروض البحث الأكاديمي والصناعي.'],
                    ['icon' => '🤝', 'en' => 'Networking',         'de' => 'Networking',       'ar' => 'التواصل',          'desc_en' => 'Exclusive networking events for HOPn partners, clients, and ecosystem members.', 'desc_de' => 'Exklusive Networking-Events für HOPn-Partner.', 'desc_ar' => 'فعاليات تواصل حصرية لشركاء HOPn.'],
                ] as $item)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(245,158,11,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="font-size:28px; margin-bottom:12px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Upcoming Events --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">Calendar</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') الفعاليات القادمة @elseif($lang === 'de') Kommende Veranstaltungen @else Upcoming Events @endif
                </h2>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; max-width:800px; margin:0 auto;">
                @foreach([
                    ['date' => 'Jun 2026', 'title' => 'HOPn AI Summit 2026',           'type' => 'Conference', 'location' => 'Berlin, Germany',   'color' => '#4F6EF7'],
                    ['date' => 'Jul 2026', 'title' => 'Data & Analytics Workshop',     'type' => 'Workshop',   'location' => 'Online',             'color' => '#10B981'],
                    ['date' => 'Aug 2026', 'title' => 'Startup Pitch Night',           'type' => 'Startup',    'location' => 'Munich, Germany',    'color' => '#F59E0B'],
                    ['date' => 'Sep 2026', 'title' => 'Digital Twin Innovation Forum', 'type' => 'Conference', 'location' => 'Frankfurt, Germany', 'color' => '#8B5CF6'],
                    ['date' => 'Oct 2026', 'title' => 'AI for Healthcare Webinar',     'type' => 'Webinar',    'location' => 'Online',             'color' => '#EF4444'],
                ] as $event)
                <div style="display:flex; align-items:center; gap:20px; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:20px 24px; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(245,158,11,0.3)'; this.style.background='#141D2E'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
                    <div style="min-width:64px; text-align:center; padding:10px; background:{{ $event['color'] }}15; border:1px solid {{ $event['color'] }}30; border-radius:10px;">
                        <div style="font-size:11px; font-weight:700; color:{{ $event['color'] }}; text-transform:uppercase;">{{ explode(' ', $event['date'])[0] }}</div>
                        <div style="font-size:18px; font-weight:800; color:white;">{{ explode(' ', $event['date'])[1] }}</div>
                    </div>
                    <div style="flex:1;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px; flex-wrap:wrap;">
                            <h3 style="font-size:15px; font-weight:700; color:white;">{{ $event['title'] }}</h3>
                            <span style="font-size:10px; font-weight:700; padding:2px 8px; border-radius:999px; background:{{ $event['color'] }}20; color:{{ $event['color'] }}; border:1px solid {{ $event['color'] }}40;">{{ $event['type'] }}</span>
                        </div>
                        <div style="font-size:13px; color:#64748B;">📍 {{ $event['location'] }}</div>
                    </div>
                    <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:#F59E0B; text-decoration:none; white-space:nowrap;"
                       onmouseover="this.style.opacity='0.8'"
                       onmouseout="this.style.opacity='1'">
                        @if($lang === 'ar') سجل @elseif($lang === 'de') Anmelden @else Register @endif →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(245,158,11,0.2); background:rgba(245,158,11,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد استضافة فعالية مع HOPn؟ @elseif($lang === 'de') Möchten Sie eine Veranstaltung mit HOPn organisieren? @else Want to Host an Event with HOPn? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريقنا لمناقشة فرص الشراكة في الفعاليات. @elseif($lang === 'de') Kontaktieren Sie unser Team, um Partnerschaftsmöglichkeiten zu besprechen. @else Get in touch with our team to discuss event partnership opportunities. @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#F59E0B; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(245,158,11,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
