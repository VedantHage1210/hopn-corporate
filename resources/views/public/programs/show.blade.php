<x-layouts.public :title="$program->title_en ?? 'Program'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        @if($program->image_url)
        <div style="position:absolute; inset:0; background:url('{{ $program->image_url }}') center/cover no-repeat; opacity:0.15;"></div>
        @endif
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(139,92,246,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(139,92,246,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.12); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10;">
            <a href="{{ route('programs.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#64748B; text-decoration:none; margin-bottom:24px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='#64748B'">
                ← @if($lang === 'ar') رجوع @elseif($lang === 'de') Zurück @else Back to Programs @endif
            </a>
            <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 0 20px;">
                @if($lang === 'de' && $program->title_de) {{ $program->title_de }}
                @elseif($lang === 'ar' && $program->title_ar) {{ $program->title_ar }}
                @else {{ $program->title_en }}
                @endif
            </h1>
            @if($program->summary_en)
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:640px; line-height:1.7; margin-bottom:32px;">
                @if($lang === 'de' && $program->summary_de) {{ $program->summary_de }}
                @elseif($lang === 'ar' && $program->summary_ar) {{ $program->summary_ar }}
                @else {{ $program->summary_en }}
                @endif
            </p>
            @endif
            <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center;">
                @if($program->duration)
                <span style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:999px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.1); color:#A78BFA; font-size:13px; font-weight:600;">
                    🕐 {{ $program->duration }}
                </span>
                @endif
                <a href="#apply"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#8B5CF6; color:white; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Apply Now @endif →
                </a>
            </div>
        </div>
    </section>

    {{-- Audience --}}
    @if($program->audience_en)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:800px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:#111827; border-radius:16px; padding:32px; display:flex; gap:20px; align-items:flex-start;">
                <div style="font-size:28px; flex-shrink:0;">👥</div>
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">
                        @if($lang === 'ar') الجمهور المستهدف @elseif($lang === 'de') Zielgruppe @else Target Audience @endif
                    </h3>
                    <p style="font-size:14px; color:#94A3B8; line-height:1.7;">
                        @if($lang === 'de' && $program->audience_de) {{ $program->audience_de }}
                        @elseif($lang === 'ar' && $program->audience_ar) {{ $program->audience_ar }}
                        @else {{ $program->audience_en }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Apply Form --}}
    <section style="padding:80px 0; background:#0A0F1E;" id="apply">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                    @if($lang === 'ar') سجل الآن @elseif($lang === 'de') Jetzt anmelden @else Apply for this Program @endif
                </h2>
            </div>
            @if(session('status'))
            <div style="max-width:600px; margin:0 auto 24px; padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px; text-align:center;">
                ✅ {{ session('status') }}
            </div>
            @endif
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(139,92,246,0.2); background:#111827; border-radius:20px; padding:40px;">
                <form action="{{ route('leads.training', ['lang' => $lang]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="program_of_interest" value="{{ $program->slug }}">
                    <div style="display:grid; gap:16px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') الاسم @elseif($lang === 'de') Name @else Full Name @endif *
                                </label>
                                <input type="text" name="name" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                    @if($lang === 'ar') البريد @elseif($lang === 'de') E-Mail @else Email @endif *
                                </label>
                                <input type="email" name="email" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#8B5CF6'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:6px;">
                                @if($lang === 'ar') رسالة @elseif($lang === 'de') Nachricht @else Message @endif *
                            </label>
                            <textarea name="message" rows="4" required
                                      style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical;"
                                      onfocus="this.style.borderColor='#8B5CF6'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                        </div>
                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr" id="gdpr_show" value="1" required style="margin-top:3px;">
                            <label for="gdpr_show" style="font-size:12px; color:#64748B; line-height:1.5;">
                                @if($lang === 'ar') أوافق على سياسة الخصوصية. *
                                @elseif($lang === 'de') Ich stimme der Datenschutzerklärung zu. *
                                @else I agree to the Privacy Policy. *
                                @endif
                            </label>
                        </div>
                        <button type="submit"
                                style="width:100%; padding:13px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer;"
                                onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                            @if($lang === 'ar') إرسال @elseif($lang === 'de') Absenden @else Submit Application @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.public>
