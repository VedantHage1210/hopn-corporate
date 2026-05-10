<x-layouts.public :title="'Industry'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <a href="{{ route('industries.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; color:#64748B; font-size:13px; text-decoration:none; margin-bottom:24px;"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='#64748B'">
                ← @if($lang === 'ar') جميع القطاعات @elseif($lang === 'de') Alle Branchen @else All Industries @endif
            </a>
            <div style="font-size:56px; margin-bottom:20px;">{{ $industry->icon }}</div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'de' && $industry->name_de) {{ $industry->name_de }}
                @elseif($lang === 'ar' && $industry->name_ar) {{ $industry->name_ar }}
                @else {{ $industry->name }}
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'de' && $industry->description_de) {{ $industry->description_de }}
                @elseif($lang === 'ar' && $industry->description_ar) {{ $industry->description_ar }}
                @else {{ $industry->description }}
                @endif
            </p>
        </div>
    </section>

    {{-- Challenges --}}
    @if($industry->challenges)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:800px; margin:0 auto;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#EF4444; margin-bottom:12px;">Challenges</span>
                <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') التحديات @elseif($lang === 'de') Herausforderungen @else Industry Challenges @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.8;">
                    @if($lang === 'de' && $industry->challenges_de) {{ $industry->challenges_de }}
                    @elseif($lang === 'ar' && $industry->challenges_ar) {{ $industry->challenges_ar }}
                    @else {{ $industry->challenges }}
                    @endif
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- Solutions --}}
    @if($industry->solutions)
    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="max-width:800px; margin:0 auto;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Solutions</span>
                <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') الحلول @elseif($lang === 'de') Lösungen @else HOPn Solutions @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.8;">
                    @if($lang === 'de' && $industry->solutions_de) {{ $industry->solutions_de }}
                    @elseif($lang === 'ar' && $industry->solutions_ar) {{ $industry->solutions_ar }}
                    @else {{ $industry->solutions }}
                    @endif
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- Use Cases --}}
    @if($industry->use_cases)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:800px; margin:0 auto;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Use Cases</span>
                <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') حالات الاستخدام @elseif($lang === 'de') Anwendungsfälle @else Use Cases @endif
                </h2>
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:12px; margin-top:24px;">
                    @foreach(explode("\n", trim($industry->use_cases)) as $useCase)
                    @if(trim($useCase))
                    <div style="border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:12px; padding:16px;">
                        <div style="font-size:13px; font-weight:600; color:white;">{{ trim($useCase) }}</div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد حلاً مخصصاً؟ @elseif($lang === 'de') Maßgeschneiderte Lösung gewünscht? @else Ready for a Custom Solution? @endif
                </h2>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
