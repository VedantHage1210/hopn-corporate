<x-layouts.public :title="'Innovation Domain'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.12); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <a href="{{ route('innovation.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; color:#64748B; font-size:13px; text-decoration:none; margin-bottom:24px;"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='#64748B'">
                ← @if($lang === 'ar') جميع المجالات @elseif($lang === 'de') Alle Domänen @else All Domains @endif
            </a>
            <div style="font-size:56px; margin-bottom:20px;">{{ $domain->icon }}</div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'de' && $domain->name_de) {{ $domain->name_de }}
                @elseif($lang === 'ar' && $domain->name_ar) {{ $domain->name_ar }}
                @else {{ $domain->name }}
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'de' && $domain->description_de) {{ $domain->description_de }}
                @elseif($lang === 'ar' && $domain->description_ar) {{ $domain->description_ar }}
                @else {{ $domain->description }}
                @endif
            </p>
        </div>
    </section>

    {{-- Use Cases --}}
    @if($domain->use_cases)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8B5CF6; margin-bottom:12px;">Use Cases</span>
                <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white;">
                    @if($lang === 'ar') حالات الاستخدام @elseif($lang === 'de') Anwendungsfälle @else Use Cases @endif
                </h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:12px; max-width:900px; margin:0 auto;">
                @foreach(explode("\n", trim($domain->use_cases)) as $useCase)
                @if(trim($useCase))
                <div style="border:1px solid rgba(139,92,246,0.2); background:rgba(139,92,246,0.05); border-radius:12px; padding:16px;">
                    <div style="font-size:13px; font-weight:600; color:white;">{{ trim($useCase) }}</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Related Services --}}
    @if($domain->related_services)
    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:40px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Related</span>
                <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white;">
                    @if($lang === 'ar') الخدمات ذات الصلة @elseif($lang === 'de') Verwandte Dienste @else Related Services @endif
                </h2>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                @foreach(explode("\n", trim($domain->related_services)) as $service)
                @if(trim($service))
                <div style="padding:8px 20px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; font-size:13px; font-weight:600; color:#818CF8;">
                    {{ trim($service) }}
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:rgba(139,92,246,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد استكشاف هذا المجال؟
                    @elseif($lang === 'de') Möchten Sie diesen Bereich erkunden?
                    @else Want to Explore This Domain?
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
