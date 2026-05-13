<x-layouts.public :title="'Industries'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(6,182,212,0.10); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(6,182,212,0.35); background:rgba(6,182,212,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#06B6D4; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#06B6D4;">Industries</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') القطاعات التي نخدمها
                @elseif($lang === 'de') Branchen, die wir bedienen
                @else Industries We Serve
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto 36px; line-height:1.7;">
                @if($lang === 'ar') HOPn يقدم حلول مبتكرة لمختلف القطاعات الصناعية.
                @elseif($lang === 'de') HOPn liefert innovative Lösungen für verschiedene Branchen.
                @else HOPn delivers innovative AI, data, and digital solutions across key industries.
                @endif
            </p>
        </div>
    </section>

    {{-- Industries Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($industries->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                @foreach($industries as $industry)
                <a href="{{ route('industries.show', ['lang' => $lang, 'slug' => $industry->slug]) }}"
                   style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; text-decoration:none; transition:all 0.25s; overflow:hidden;"
                   onmouseover="this.style.borderColor='rgba(6,182,212,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

                    {{-- Top accent line --}}
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #06B6D4, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

                    {{-- Icon box --}}
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:10px; background:rgba(6,182,212,0.1); border:1px solid rgba(6,182,212,0.2); font-size:22px;">
                            {{ $industry->icon ?? '🏭' }}
                        </div>
                        <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.3;">
                            @if($lang === 'de' && $industry->name_de) {{ $industry->name_de }}
                            @elseif($lang === 'ar' && $industry->name_ar) {{ $industry->name_ar }}
                            @else {{ $industry->name }}
                            @endif
                        </h3>
                    </div>

                    {{-- Description --}}
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">
                        @if($lang === 'de' && $industry->description_de) {{ Str::limit($industry->description_de, 100) }}
                        @elseif($lang === 'ar' && $industry->description_ar) {{ Str::limit($industry->description_ar, 100) }}
                        @else {{ Str::limit($industry->description, 100) }}
                        @endif
                    </p>

                    {{-- Learn More --}}
                    <div style="display:inline-flex; align-items:center; gap:6px; margin-top:16px; font-size:13px; font-weight:600; color:#06B6D4;">
                        @if($lang === 'ar') اعرف المزيد
                        @elseif($lang === 'de') Mehr erfahren
                        @else Learn More
                        @endif
                        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🏭</div>
                <p style="font-size:16px;">No industries found. Add industries from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(6,182,212,0.2); background:rgba(6,182,212,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد حلاً مخصصاً لقطاعك؟
                    @elseif($lang === 'de') Möchten Sie eine maßgeschneiderte Lösung?
                    @else Looking for a Tailored Industry Solution?
                    @endif
                </h2>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#06B6D4; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(6,182,212,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
