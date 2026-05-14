<x-layouts.public :title="'Startups'">
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
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">Startup Ecosystem</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') بناء الجيل القادم من الشركات الناشئة
                @elseif($lang === 'de') Die nächste Generation von Startups aufbauen
                @else Building the Next Generation of Startups
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') HOPn يدعم رواد الأعمال من خلال التوجيه والتمويل والتكنولوجيا.
                @elseif($lang === 'de') HOPn unterstützt Gründer durch Mentoring, Kapital und Technologie.
                @else HOPn supports founders through mentoring, capital access, and deep-tech infrastructure.
                @endif
            </p>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
               onmouseover="this.style.opacity='0.88'"
               onmouseout="this.style.opacity='1'">
                @if($lang === 'ar') قدم الآن @elseif($lang === 'de') Jetzt bewerben @else Apply Now @endif
            </a>
        </div>
    </section>

    {{-- Startups Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Our Startups</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') الشركات الناشئة في النظام البيئي
                    @elseif($lang === 'de') Startups im Ökosystem
                    @else Startups in Our Ecosystem
                    @endif
                </h2>
            </div>

            @if($startups->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach($startups as $startup)
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:10px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); font-size:18px; font-weight:800; color:#818CF8;">
                            {{ strtoupper(substr($startup->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 style="font-size:16px; font-weight:700; color:white;">{{ $startup->name }}</h3>
                            @if($startup->industry)
                            <span style="font-size:11px; color:#64748B;">{{ $startup->industry }}</span>
                            @endif
                        </div>
                    </div>

                    @if($startup->description)
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">
                        {{ Str::limit($startup->description, 120) }}
                    </p>
                    @endif

                    @if($startup->stage)
                    <div style="margin-top:16px;">
                        <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8;">
                            {{ ucfirst($startup->stage) }}
                        </span>
                    </div>
                    @endif

                    @if($startup->website)
                    <a href="{{ $startup->website }}" target="_blank"
                       style="display:inline-flex; align-items:center; gap:6px; margin-top:12px; font-size:13px; font-weight:600; color:#4F6EF7; text-decoration:none;">
                        Visit Website →
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🚀</div>
                <p style="font-size:16px;">No startups found. Add startups from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- What We Offer --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">
                    @if($lang === 'ar') ما نقدمه @elseif($lang === 'de') Was wir bieten @else What We Offer @endif
                </span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') دعم كامل للشركات الناشئة @elseif($lang === 'de') Vollständige Startup-Unterstützung @else Full-Stack Startup Support @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach([
                    ['icon' => '🚀', 'en' => 'Venture Building', 'de' => 'Venture Building', 'ar' => 'بناء المشاريع', 'desc' => 'Co-build your startup from idea to product with HOPn engineering and design teams.'],
                    ['icon' => '🧠', 'en' => 'Mentoring & Advisory', 'de' => 'Mentoring & Beratung', 'ar' => 'الإرشاد والاستشارة', 'desc' => 'Access a network of industry experts, CTOs, and serial entrepreneurs.'],
                    ['icon' => '💰', 'en' => 'Investor Access', 'de' => 'Investorenzugang', 'ar' => 'الوصول للمستثمرين', 'desc' => 'Connect with HOPn investor network and funding partners across Europe.'],
                    ['icon' => '🔬', 'en' => 'Research & Innovation', 'de' => 'Forschung & Innovation', 'ar' => 'البحث والابتكار', 'desc' => 'Collaborate with universities and R&D labs to build cutting-edge solutions.'],
                    ['icon' => '🛠', 'en' => 'Tech Infrastructure', 'de' => 'Tech-Infrastruktur', 'ar' => 'البنية التحتية التقنية', 'desc' => 'AI, data, cloud, and DevOps infrastructure to accelerate your build.'],
                    ['icon' => '🌍', 'en' => 'Market Access', 'de' => 'Marktzugang', 'ar' => 'الوصول للسوق', 'desc' => 'Enter European, Middle Eastern, and global markets with HOPn partner network.'],
                ] as $item)
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    <div style="font-size:28px; margin-bottom:12px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Programs --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Programs</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') برامج الابتكار @elseif($lang === 'de') Innovationsprogramme @else Innovation Programs @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px;">
                @foreach([
                    ['name' => 'HOPn Launchpad', 'desc' => '12-week intensive program to validate and launch your startup idea.', 'badge' => 'Applications Open', 'color' => '#4F6EF7'],
                    ['name' => 'AI Founders Track', 'desc' => 'Specialized program for AI and data-driven startups with technical mentorship.', 'badge' => 'Coming Soon', 'color' => '#8B5CF6'],
                    ['name' => 'Deep Tech Studio', 'desc' => 'Co-building program for robotics, digital twins, and hardware startups.', 'badge' => 'Invite Only', 'color' => '#10B981'],
                ] as $program)
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; display:flex; flex-direction:column; gap:16px; overflow:hidden; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                        <h3 style="font-size:17px; font-weight:700; color:white;">{{ $program['name'] }}</h3>
                        <span style="font-size:10px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $program['color'] }}20; color:{{ $program['color'] }}; border:1px solid {{ $program['color'] }}40;">{{ $program['badge'] }}</span>
                    </div>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">{{ $program['desc'] }}</p>
                    <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $program['color'] }}; text-decoration:none;">
                        @if($lang === 'ar') اعرف المزيد @elseif($lang === 'de') Mehr erfahren @else Learn More @endif →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل أنت مستعد لبناء المستقبل؟ @elseif($lang === 'de') Bereit, die Zukunft zu bauen? @else Ready to Build the Future? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn اليوم. @elseif($lang === 'de') Kontaktieren Sie das HOPn-Team noch heute. @else Get in touch with the HOPn startup team today. @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
