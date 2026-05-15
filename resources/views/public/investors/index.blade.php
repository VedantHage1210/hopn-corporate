<x-layouts.public :title="'Investors & Funds'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(16,185,129,0.10); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.35); background:rgba(16,185,129,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#10B981; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981;">Investors & Funds</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') استثمر في مستقبل الابتكار
                @elseif($lang === 'de') Investieren Sie in die Zukunft der Innovation
                @else Invest in the Future of Innovation
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') HOPn يربط المستثمرين بأفضل الشركات الناشئة في مجال التكنولوجيا العميقة.
                @elseif($lang === 'de') HOPn verbindet Investoren mit den besten Deep-Tech-Startups in Europa.
                @else HOPn connects investors with the best deep-tech startups and innovation projects across Europe.
                @endif
            </p>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(16,185,129,0.3);"
               onmouseover="this.style.opacity='0.88'"
               onmouseout="this.style.opacity='1'">
                @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Get in Touch @endif
            </a>
        </div>
    </section>

    {{-- Investors Grid — Admin se dynamic --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Our Network</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') المستثمرون والصناديق
                    @elseif($lang === 'de') Investoren & Fonds
                    @else Investors & Funds
                    @endif
                </h2>
            </div>

            @if($investors->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach($investors as $investor)
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #10B981, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

                    {{-- Icon + Name --}}
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:10px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); font-size:18px; font-weight:800; color:#10B981;">
                            {{ strtoupper(substr($investor->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 style="font-size:16px; font-weight:700; color:white;">{{ $investor->name }}</h3>
                            @if($investor->type)
                            <span style="font-size:11px; color:#64748B;">{{ ucfirst($investor->type) }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($investor->description)
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">
                        {{ Str::limit($investor->description, 120) }}
                    </p>
                    @endif

                    {{-- Region & Focus --}}
                    <div style="display:flex; flex-wrap:wrap; gap:8px; margin-top:16px;">
                        @if($investor->region)
                        <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); color:#10B981;">
                            📍 {{ $investor->region }}
                        </span>
                        @endif
                        @if($investor->focus)
                        <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8;">
                            🎯 {{ Str::limit($investor->focus, 30) }}
                        </span>
                        @endif
                    </div>

                    {{-- Website --}}
                    @if($investor->website)
                    <a href="{{ $investor->website }}" target="_blank"
                       style="display:inline-flex; align-items:center; gap:6px; margin-top:12px; font-size:13px; font-weight:600; color:#10B981; text-decoration:none;">
                        Visit Website →
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">💰</div>
                <p style="font-size:16px;">No investors found. Add investors from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Why Invest --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Why HOPn</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') لماذا الاستثمار مع HOPn @elseif($lang === 'de') Warum mit HOPn investieren @else Why Invest with HOPn @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach([
                    ['icon' => '🎯', 'en' => 'Curated Deal Flow', 'desc' => 'Access pre-vetted startups across AI, robotics, data, and deep-tech verticals.'],
                    ['icon' => '🌍', 'en' => 'European Market Access', 'desc' => 'HOPn operates across Germany, EU, and MENA regions with strong local networks.'],
                    ['icon' => '🔬', 'en' => 'Deep Tech Focus', 'desc' => 'Specialized in AI, robotics, digital twins, and data platforms.'],
                    ['icon' => '🤝', 'en' => 'Strategic Co-Investment', 'desc' => 'HOPn co-invests alongside partners to align interests and accelerate growth.'],
                    ['icon' => '📊', 'en' => 'Portfolio Support', 'desc' => 'Full operational and technical support for portfolio companies.'],
                    ['icon' => '⚡', 'en' => 'Fast Execution', 'desc' => 'HOPn moves fast — from deal sourcing to closing with minimal friction.'],
                ] as $item)
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #10B981, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    <div style="font-size:28px; margin-bottom:12px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">{{ $item['en'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Investment Areas --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Focus Areas</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">
                    @if($lang === 'ar') مجالات الاستثمار @elseif($lang === 'de') Investitionsbereiche @else Investment Areas @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:12px;">
                @foreach([
                    ['icon' => '🤖', 'en' => 'Artificial Intelligence'],
                    ['icon' => '🦾', 'en' => 'Robotics & Automation'],
                    ['icon' => '📊', 'en' => 'Data Platforms'],
                    ['icon' => '🏭', 'en' => 'Digital Twins'],
                    ['icon' => '🏥', 'en' => 'Healthcare Tech'],
                    ['icon' => '🎓', 'en' => 'EdTech'],
                    ['icon' => '💳', 'en' => 'FinTech'],
                    ['icon' => '🚚', 'en' => 'Logistics & Supply Chain'],
                ] as $area)
                <div style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; text-align:center; transition:all 0.25s;"
                     onmouseover="this.style.background='rgba(16,185,129,0.08)'; this.style.borderColor='rgba(16,185,129,0.3)'"
                     onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.07)'">
                    <div style="font-size:24px; margin-bottom:8px;">{{ $area['icon'] }}</div>
                    <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $area['en'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(16,185,129,0.2); background:rgba(16,185,129,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل أنت مستعد للاستثمار؟ @elseif($lang === 'de') Bereit zu investieren? @else Ready to Invest? @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn للمستثمرين اليوم. @elseif($lang === 'de') Kontaktieren Sie unser Investorenteam noch heute. @else Get in touch with the HOPn investor relations team today. @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(16,185,129,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact Investor Relations @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
