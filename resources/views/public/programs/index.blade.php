<x-layouts.public :title="'Programs'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
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

    {{-- Programs Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($programs->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
                @foreach($programs as $program)
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; overflow:hidden; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(139,92,246,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg, #8B5CF6, #4F6EF7); opacity:0; transition:opacity 0.25s; z-index:1;"></div>

                    {{-- Image or Icon --}}
                    @if($program->image_url)
                    <div style="height:160px; overflow:hidden;">
                        <img src="{{ $program->image_url }}" alt="{{ $program->title_en }}"
                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                    @else
                    <div style="height:80px; background:linear-gradient(135deg, rgba(139,92,246,0.2), rgba(79,110,247,0.2)); display:flex; align-items:center; justify-content:center;">
                        <div style="display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:rgba(139,92,246,0.2); border:1px solid rgba(139,92,246,0.3); font-size:18px; font-weight:800; color:#A78BFA;">
                            {{ strtoupper(substr($lang === 'de' && $program->title_de ? $program->title_de : $program->title_en, 0, 1)) }}
                        </div>
                    </div>
                    @endif

                    <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
                        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3;">
                            @if($lang === 'de' && $program->title_de) {{ $program->title_de }}
                            @elseif($lang === 'ar' && $program->title_ar) {{ $program->title_ar }}
                            @else {{ $program->title_en }}
                            @endif
                        </h3>
                        <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1;">
                            @if($lang === 'de' && $program->summary_de) {{ $program->summary_de }}
                            @elseif($lang === 'ar' && $program->summary_ar) {{ $program->summary_ar }}
                            @else {{ $program->summary_en }}
                            @endif
                        </p>
                        @if($program->duration)
                        <div style="display:inline-flex; align-items:center; gap:6px; font-size:12px; color:#64748B;">
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

    {{-- Training Application Form --}}
    <section style="padding:80px 0; background:#0A0F1E;" id="apply">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8B5CF6; margin-bottom:12px;">Apply Now</span>
                <h2 style="font-size:clamp(24px,4vw,40px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') سجل في برنامج @elseif($lang === 'de') Für ein Programm anmelden @else Apply for a Program @endif
                </h2>
                <p style="color:#94A3B8; max-width:500px; margin:0 auto; font-size:16px; line-height:1.7;">
                    @if($lang === 'ar') أرسل طلبك وسنتواصل معك قريباً.
                    @elseif($lang === 'de') Senden Sie Ihre Bewerbung und wir melden uns bei Ihnen.
                    @else Submit your application and we'll get back to you shortly.
                    @endif
                </p>
            </div>

            @if(session('status'))
            <div style="max-width:700px; margin:0 auto 24px; padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px; text-align:center;">
                ✅ {{ session('status') }}
            </div>
            @endif

            <div style="max-width:700px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:#111827; border-radius:20px; padding:40px;">
                <form action="{{ route('leads.training', ['lang' => $lang]) }}" method="POST">
                    @csrf
                    <input type="text" name="honeypot" style="display:none">
                    <div style="display:grid; gap:16px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') الاسم الكامل @elseif($lang === 'de') Name @else Full Name @endif *
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                                @error('name')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') البريد الإلكتروني @elseif($lang === 'de') E-Mail @else Email @endif *
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                                @error('email')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                @if($lang === 'ar') الهاتف @elseif($lang === 'de') Telefon @else Phone @endif
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                   onfocus="this.style.borderColor='#8B5CF6'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                @if($lang === 'ar') البرنامج المطلوب @elseif($lang === 'de') Interessiertes Programm @else Program of Interest @endif
                            </label>
                            <select name="program_of_interest"
                                    style="width:100%; padding:10px 12px; background:#1e293b; border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;">
                                <option value="">
                                    @if($lang === 'ar') اختر البرنامج @elseif($lang === 'de') Bitte wählen @else Select program @endif
                                </option>
                                @foreach($programs as $prog)
                                <option value="{{ $prog->slug }}">
                                    @if($lang === 'de' && $prog->title_de) {{ $prog->title_de }}
                                    @elseif($lang === 'ar' && $prog->title_ar) {{ $prog->title_ar }}
                                    @else {{ $prog->title_en }}
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                @if($lang === 'ar') رسالة @elseif($lang === 'de') Nachricht @else Message @endif *
                            </label>
                            <textarea name="message" rows="4" required
                                      style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical;"
                                      onfocus="this.style.borderColor='#8B5CF6'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.1)'">{{ old('message') }}</textarea>
                            @error('message')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                        </div>
                        <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                        <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                        <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr" id="gdpr_programs" value="1" required style="margin-top:3px;">
                            <label for="gdpr_programs" style="font-size:12px; color:#64748B; line-height:1.5;">
                                @if($lang === 'ar') أوافق على سياسة الخصوصية. *
                                @elseif($lang === 'de') Ich stimme der Datenschutzerklärung zu. *
                                @else I agree to the Privacy Policy and consent to data processing. *
                                @endif
                            </label>
                        </div>
                        @error('gdpr')<p style="font-size:11px; color:#F87171;">{{ $message }}</p>@enderror
                        <button type="submit"
                                style="width:100%; padding:13px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer; box-shadow:0 8px 24px rgba(139,92,246,0.3);"
                                onmouseover="this.style.opacity='0.88'"
                                onmouseout="this.style.opacity='1'">
                            @if($lang === 'ar') إرسال الطلب @elseif($lang === 'de') Bewerbung absenden @else Submit Application @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.public>
