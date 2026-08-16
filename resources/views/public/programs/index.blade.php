@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'البرامج':($lang==='de'?'Programme':'Programs')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(139,92,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(139,92,246,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(139,92,246,0.10) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#8B5CF6; display:inline-block; box-shadow:0 0 8px #8B5CF6;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') التدريب والبرامج @elseif($lang==='de') Training & Programme @else Training & Programs @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">برامج التدريب</span><br>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">والتحول الرقمي</span>
            @elseif($lang==='de')
                <span style="color:white;">Weiterbildungs-</span><br>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">&amp; Transformationsprogramme</span>
            @else
                <span style="color:white;">Upskilling &amp;</span><br>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Transformation Programs</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') برامج تطوير المهارات والتحول الرقمي لفرق المؤسسات والمتخصصين.
            @elseif($lang==='de') Weiterbildungs- und Transformationsprogramme für Unternehmensteams.
            @else Upskilling and transformation programs for enterprise teams and professionals. @endif
        </p>
        <a href="#apply"
           class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(139,92,246,0.4); transition:all 0.2s;">
            @if($lang==='ar') سجل الآن @elseif($lang==='de') Jetzt anmelden @else Apply Now @endif →
        </a>
    </div>
</section>

{{-- PROGRAMS GRID --}}
<section style="padding:60px 0; background:#050A14;">
    <div class="container-shell">
        @if($programs->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:20px;">
            @foreach($programs as $program)
            @php $colors=['#8B5CF6','#4F6EF7','#10B981','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; $title=$lang==='de'&&$program->title_de?$program->title_de:($lang==='ar'&&$program->title_ar?$program->title_ar:$program->title_en); $summary=$lang==='de'&&$program->summary_de?$program->summary_de:($lang==='ar'&&$program->summary_ar?$program->summary_ar:($program->summary_en??'')); @endphp
            <a href="{{ route('programs.show', ['lang'=>$lang,'slug'=>$program->slug]) }}"
               class="hopn-lift-card" style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; overflow:hidden; text-decoration:none; transition:all 0.3s; position:relative;">

                @if($program->image_url)
                <div style="height:180px; overflow:hidden; position:relative;">
                    <img loading="lazy" decoding="async" src="{{ $program->image_url }}" alt="{{ $title }}"
                         class="hopn-lift-btn" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 50%, rgba(10,15,30,0.8));"></div>
                </div>
                @else
                <div style="height:100px; background:linear-gradient(135deg,{{ $c }}20,{{ $c }}05); display:flex; align-items:center; justify-content:center; position:relative;">
                    <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $c }},transparent);"></div>
                    <div style="width:48px; height:48px; border-radius:14px; background:{{ $c }}20; border:1px solid {{ $c }}40; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:900; color:{{ $c }};">
                        {{ strtoupper(substr($title,0,1)) }}
                    </div>
                </div>
                @endif

                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
                    <h3 style="font-size:20px; font-weight:800; color:white; line-height:1.3; letter-spacing:-0.5px; margin:0;">{{ $title }}</h3>
                    <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin:0;">{{ Str::limit($summary,100) }}</p>
                    <div style="display:flex; align-items:center; justify-content:space-between; padding-top:16px; border-top:1px solid rgba(255,255,255,0.05);">
                        @if($program->duration)
                        <span style="font-size:12px; color:#94A3B8;">🕐 {{ $program->duration }}</span>
                        @endif
                        <span style="font-size:13px; font-weight:600; color:{{ $c }}; display:flex; align-items:center; gap:6px;">
                            @if($lang==='ar') عرض البرنامج @elseif($lang==='de') Programm ansehen @else View Program @endif
                            <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @if($programs->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">{{ $programs->links() }}</div>
        @endif
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div style="font-size:48px; margin-bottom:16px;">🎓</div>
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') البرامج قادمة قريباً @elseif($lang==='de') Programme folgen @else Programs Coming Soon @endif
            </h3>
        </div>
        @endif
    </div>
</section>

{{-- APPLICATION FORM --}}
<section id="apply" style="padding:80px 0 100px; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:48px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8B5CF6; margin-bottom:16px;">
                @if($lang==='ar') قدم الآن @elseif($lang==='de') Jetzt bewerben @else Apply Now @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') سجل في برنامج @elseif($lang==='de') Für ein Programm anmelden @else Apply for a Program @endif
            </h2>
            <p style="color:#CBD5E1; max-width:500px; margin:0 auto; font-size:17px; line-height:1.7;">
                @if($lang==='ar') أرسل طلبك وسنتواصل معك قريباً.
                @elseif($lang==='de') Senden Sie Ihre Bewerbung und wir melden uns bei Ihnen.
                @else Submit your application and we'll get back to you shortly. @endif
            </p>
        </div>

        @if(session('status'))
        <div style="max-width:680px; margin:0 auto 24px; padding:16px 20px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:12px; color:#10B981; font-size:14px; text-align:center;">
            ✅ {{ session('status') }}
        </div>
        @endif

        <div style="max-width:680px; margin:0 auto; position:relative; border:1px solid rgba(139,92,246,0.2); background:#0A0F1E; border-radius:20px; padding:40px; overflow:hidden;">
            <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#8B5CF6,#4F6EF7,#06B6D4);"></div>

            <form action="{{ route('leads.training', ['lang'=>$lang]) }}" method="POST">
                @csrf
                <input type="text" name="honeypot" style="display:none">
                <div style="display:grid; gap:20px;">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') الاسم الكامل @elseif($lang==='de') Name @else Full Name @endif *
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(139,92,246,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                            @error('name')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                                @if($lang==='ar') البريد الإلكتروني @elseif($lang==='de') E-Mail @else Email @endif *
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                                   onfocus="this.style.borderColor='rgba(139,92,246,0.5)'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                            @error('email')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') الهاتف @elseif($lang==='de') Telefon @else Phone @endif
                        </label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;"
                               onfocus="this.style.borderColor='rgba(139,92,246,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') البرنامج المطلوب @elseif($lang==='de') Interessiertes Programm @else Program of Interest @endif
                        </label>
                        <select name="program_of_interest"
                                style="width:100%; padding:12px 16px; background:#0D1425; border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none;">
                            <option value="">
                                @if($lang==='ar') اختر البرنامج @elseif($lang==='de') Bitte wählen @else Select a program @endif
                            </option>
                            @foreach($programs as $prog)
                            @php $pt=$lang==='de'&&$prog->title_de?$prog->title_de:($lang==='ar'&&$prog->title_ar?$prog->title_ar:$prog->title_en); @endphp
                            <option value="{{ $prog->slug }}">{{ $pt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#CBD5E1; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.06em;">
                            @if($lang==='ar') رسالة @elseif($lang==='de') Nachricht @else Message @endif *
                        </label>
                        <textarea name="message" rows="5" required
                                  style="width:100%; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; box-sizing:border-box; outline:none; resize:vertical;"
                                  onfocus="this.style.borderColor='rgba(139,92,246,0.5)'"
                                  onblur="this.style.borderColor='rgba(255,255,255,0.08)'">{{ old('message') }}</textarea>
                        @error('message')<p style="font-size:11px; color:#F87171; margin-top:4px;">{{ $message }}</p>@enderror
                    </div>
                    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <input type="checkbox" name="gdpr" id="gdpr_programs" value="1" required style="margin-top:3px; flex-shrink:0;">
                        <label for="gdpr_programs" style="font-size:12px; color:#94A3B8; line-height:1.6;">
                            @if($lang==='ar') أوافق على سياسة الخصوصية ومعالجة البيانات. *
                            @elseif($lang==='de') Ich stimme der Datenschutzerklärung und Datenverarbeitung zu. *
                            @else I agree to the Privacy Policy and consent to data processing. * @endif
                        </label>
                    </div>
                    @error('gdpr')<p style="font-size:11px; color:#F87171;">{{ $message }}</p>@enderror
                    <button type="submit"
                            class="hopn-lift-btn" style="width:100%; padding:16px; border-radius:10px; background:#8B5CF6; color:white; font-size:16px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 40px rgba(139,92,246,0.3); transition:all 0.2s;">
                        @if($lang==='ar') إرسال الطلب @elseif($lang==='de') Bewerbung absenden @else Submit Application @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

</x-layouts.public>
