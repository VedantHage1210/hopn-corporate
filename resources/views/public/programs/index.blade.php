<x-layouts.public :title="'Programs'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.12); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.35); background:rgba(139,92,246,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#8B5CF6; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#A78BFA;">Training & Programs</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') برامج التدريب والتحول @elseif($lang === 'de') Weiterbildungsprogramme @else Upskilling & Transformation Programs @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') برامج تطوير المهارات لفرق المؤسسات.
                @elseif($lang === 'de') Weiterbildungs- und Transformationsprogramme für Unternehmensteams.
                @else Upskilling and transformation programs for enterprise teams and professionals.
                @endif
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($programs->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
                @foreach($programs as $program)
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(139,92,246,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg, #8B5CF6, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:rgba(139,92,246,0.1); border:1px solid rgba(139,92,246,0.2); font-size:18px; font-weight:800; color:#A78BFA; margin-bottom:16px;">
                        {{ strtoupper(substr($lang === 'de' && $program->title_de ? $program->title_de : $program->title_en, 0, 1)) }}
                    </div>
                    <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3; margin-bottom:10px;">
                        @if($lang === 'de' && $program->title_de) {{ $program->title_de }}
                        @elseif($lang === 'ar' && $program->title_ar) {{ $program->title_ar }}
                        @else {{ $program->title_en }}
                        @endif
                    </h3>
                    <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1; margin-bottom:20px;">
                        @if($lang === 'de' && $program->summary_de) {{ $program->summary_de }}
                        @elseif($lang === 'ar' && $program->summary_ar) {{ $program->summary_ar }}
                        @else {{ $program->summary_en }}
                        @endif
                    </p>
                    @if($program->duration)
                    <div style="display:inline-flex; align-items:center; gap:6px; font-size:12px; color:#64748B; margin-bottom:16px;">
                        🕐 {{ $program->duration }}
                    </div>
                    @endif
                    <a href="{{ route('programs.show', ['lang' => $lang, 'slug' => $program->slug]) }}"
                       style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:#A78BFA; text-decoration:none; margin-top:auto;"
                       onmouseover="this.style.gap='10px'"
                       onmouseout="this.style.gap='6px'">
                        @if($lang === 'ar') عرض البرنامج @elseif($lang === 'de') Programm ansehen @else View Program @endif
                        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
            @if($programs->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">{{ $programs->links() }}</div>
            @endif
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🎓</div>
                <p>No programs found.</p>
            </div>
            @endif
        </div>
    </section>

    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:rgba(139,92,246,0.05); border-radius:24px; padding:48px 32px;">
                <h2 style="font-size:28px; font-weight:800; color:white; margin-bottom:16px;">Ready to Upskill Your Team?</h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:28px;">Contact us to find the right program for your organization.</p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#8B5CF6; color:white; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    Get in Touch →
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
