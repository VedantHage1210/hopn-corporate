<x-layouts.public :title="'Innovation Domains'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.35); background:rgba(139,92,246,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#8B5CF6; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8B5CF6;">Innovation</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') مجالات الابتكار
                @elseif($lang === 'de') Innovationsdomänen
                @else Innovation Domains
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') HOPn يقود الابتكار في مجالات التكنولوجيا المتقدمة.
                @elseif($lang === 'de') HOPn treibt Innovation in fortschrittlichen Technologiebereichen voran.
                @else HOPn leads innovation across AI, robotics, data, and deep-tech domains.
                @endif
            </p>
        </div>
    </section>

    {{-- Domains Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($domains->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach($domains as $domain)
                <a href="{{ route('innovation.show', ['lang' => $lang, 'slug' => $domain->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='rgba(139,92,246,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="font-size:36px; margin-bottom:16px;">{{ $domain->icon }}</div>
                    <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:10px;">
                        @if($lang === 'de' && $domain->name_de) {{ $domain->name_de }}
                        @elseif($lang === 'ar' && $domain->name_ar) {{ $domain->name_ar }}
                        @else {{ $domain->name }}
                        @endif
                    </h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">
                        @if($lang === 'de' && $domain->description_de) {{ $domain->description_de }}
                        @elseif($lang === 'ar' && $domain->description_ar) {{ $domain->description_ar }}
                        @else {{ $domain->description }}
                        @endif
                    </p>
                    <div style="margin-top:16px; display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:#8B5CF6;">
                        @if($lang === 'ar') اعرف المزيد @elseif($lang === 'de') Mehr erfahren @else Learn More @endif →
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px; color:#64748B;">
                <p style="font-size:16px;">No innovation domains found. Add from admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:rgba(139,92,246,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد الابتكار مع HOPn؟
                    @elseif($lang === 'de') Möchten Sie mit HOPn innovieren?
                    @else Ready to Innovate with HOPn?
                    @endif
                </h2>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(139,92,246,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
