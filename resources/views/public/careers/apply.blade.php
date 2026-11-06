@php
    $lang = request()->route('lang', 'en');
    $L = fn (array $t) => $t[$lang] ?? $t['en'];

    $pageTitle = $L(['en' => 'Send Your CV', 'de' => 'Lebenslauf senden', 'ar' => 'أرسل سيرتك الذاتية']);

    $experience = [
        '0-1'  => $L(['en' => 'Less than 1 year', 'de' => 'Weniger als 1 Jahr',  'ar' => 'أقل من سنة']),
        '1-3'  => $L(['en' => '1–3 years',        'de' => '1–3 Jahre',           'ar' => '١–٣ سنوات']),
        '3-5'  => $L(['en' => '3–5 years',        'de' => '3–5 Jahre',           'ar' => '٣–٥ سنوات']),
        '5-10' => $L(['en' => '5–10 years',       'de' => '5–10 Jahre',          'ar' => '٥–١٠ سنوات']),
        '10+'  => $L(['en' => '10+ years',        'de' => 'Mehr als 10 Jahre',   'ar' => 'أكثر من ١٠ سنوات']),
    ];
    $interests = [
        'Engineering & Software'           => $L(['en' => 'Engineering & Software',           'de' => 'Engineering & Softwareentwicklung', 'ar' => 'الهندسة وتطوير البرمجيات']),
        'AI & Data'                        => $L(['en' => 'AI & Data',                        'de' => 'KI & Daten',                       'ar' => 'الذكاء الاصطناعي والبيانات']),
        'Digital Twins & Industry 4.0'     => $L(['en' => 'Digital Twins & Industry 4.0',     'de' => 'Digitale Zwillinge & Industrie 4.0', 'ar' => 'التوائم الرقمية والصناعة 4.0']),
        'Consulting & Strategy'            => $L(['en' => 'Consulting & Strategy',            'de' => 'Beratung & Strategie',             'ar' => 'الاستشارات والاستراتيجية']),
        'Research & Innovation'            => $L(['en' => 'Research & Innovation',            'de' => 'Forschung & Innovation',           'ar' => 'البحث والابتكار']),
        'Product & Design'                 => $L(['en' => 'Product & Design',                 'de' => 'Produkt & Design',                 'ar' => 'المنتجات والتصميم']),
        'Sales, Partnerships & Operations' => $L(['en' => 'Sales, Partnerships & Operations',  'de' => 'Vertrieb, Partnerschaften & Betrieb', 'ar' => 'المبيعات والشراكات والعمليات']),
        'Other'                            => $L(['en' => 'Other',                            'de' => 'Sonstiges',                        'ar' => 'أخرى']),
    ];
    $field = 'w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white';
    $label = 'mb-1 block text-sm font-medium text-slate-200';
@endphp
<x-layouts.public :title="$pageTitle">

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:72px 0 40px;">
        <div class="container-shell" style="position:relative; z-index:10; text-align:center; max-width:760px;">
            <a href="{{ route('careers.index', ['lang' => $lang]) }}"
               style="display:inline-block; font-size:13px; color:#CBD5E1; text-decoration:none; margin-bottom:20px;">
                {{ $lang === 'ar' ? '→ العودة إلى الوظائف' : ($lang === 'de' ? '← Zurück zu Karriere' : '← Back to Careers') }}
            </a>
            <h1 style="font-size:clamp(28px,4.5vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                {{ $pageTitle }}
            </h1>
            <p style="color:#CBD5E1; font-size:17px; line-height:1.7; margin:0 auto;">
                {{ $L([
                    'en' => "Don't see a role that fits? Tell us about yourself and attach your CV — we'll keep you in mind for future opportunities.",
                    'de' => 'Keine passende Stelle gefunden? Erzählen Sie uns von sich und fügen Sie Ihren Lebenslauf bei – wir melden uns bei passenden Möglichkeiten.',
                    'ar' => 'لم تجد وظيفة مناسبة؟ عرّفنا بنفسك وأرفق سيرتك الذاتية، وسنتواصل معك عند توفر فرصة مناسبة.',
                ]) }}
            </p>
        </div>
    </section>

    <section style="padding:24px 0 80px; background:#080D1A;">
        <div class="container-shell" style="max-width:760px;">

            @if(session('tracking_token'))
            <div role="status" style="padding:20px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:12px; margin-bottom:24px;">
                <div style="font-size:16px; font-weight:700; color:#10B981; margin-bottom:8px;">{{ session('status') }}</div>
                <p style="font-size:14px; color:#CBD5E1; margin-bottom:8px;">
                    {{ $L(['en' => 'Your Application ID:', 'de' => 'Ihre Bewerbungs-ID:', 'ar' => 'رقم طلبك:']) }}
                </p>
                <p style="font-size:20px; font-weight:800; color:#10B981; font-family:monospace; margin-bottom:12px;">{{ session('tracking_token') }}</p>
                <a href="{{ route('careers.track', ['lang' => $lang, 'token' => session('tracking_token')]) }}"
                   style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; background:#10B981; color:white; font-size:13px; font-weight:600; text-decoration:none;">
                    {{ $L(['en' => 'Track My Application', 'de' => 'Meine Bewerbung verfolgen', 'ar' => 'تتبع طلبي']) }} →
                </a>
            </div>
            @endif

            @if($errors->any())
            <div role="alert" style="padding:14px 16px; background:rgba(180,35,24,0.08); border:1px solid rgba(180,35,24,0.35); border-radius:8px; color:#B42318; font-size:14px; margin-bottom:20px;">
                {{ $L(['en' => 'Please check the highlighted fields and try again.', 'de' => 'Bitte prüfen Sie die markierten Felder und versuchen Sie es erneut.', 'ar' => 'يرجى مراجعة الحقول المظللة والمحاولة مرة أخرى.']) }}
            </div>
            @endif

            <form action="{{ route('careers.apply.general.submit', ['lang' => $lang]) }}" method="POST" enctype="multipart/form-data"
                  class="card-panel space-y-4" style="padding:28px; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px;">
                @csrf
                <x-turnstile />
                <input type="text" name="honeypot" tabindex="-1" autocomplete="off" style="display:none" aria-hidden="true">

                <div>
                    <label for="ga-name" class="{{ $label }}">{{ $L(['en' => 'Full Name', 'de' => 'Vollständiger Name', 'ar' => 'الاسم الكامل']) }} *</label>
                    <input id="ga-name" type="text" name="name" value="{{ old('name') }}" required maxlength="120" autocomplete="name" class="{{ $field }}">
                    @error('name')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div>
                        <label for="ga-email" class="{{ $label }}">{{ $L(['en' => 'Email', 'de' => 'E-Mail', 'ar' => 'البريد الإلكتروني']) }} *</label>
                        <input id="ga-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="{{ $field }}">
                        @error('email')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="ga-phone" class="{{ $label }}">{{ $L(['en' => 'Phone', 'de' => 'Telefon', 'ar' => 'الهاتف']) }}</label>
                        <input id="ga-phone" type="text" name="phone" value="{{ old('phone') }}" maxlength="30" autocomplete="tel" class="{{ $field }}">
                        @error('phone')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div>
                        <label for="ga-experience" class="{{ $label }}">{{ $L(['en' => 'Experience', 'de' => 'Berufserfahrung', 'ar' => 'سنوات الخبرة']) }} *</label>
                        <select id="ga-experience" name="experience" required class="{{ $field }}">
                            <option value="">{{ $L(['en' => 'Select…', 'de' => 'Bitte wählen…', 'ar' => 'اختر…']) }}</option>
                            @foreach($experience as $value => $text)
                                <option value="{{ $value }}" @selected(old('experience') === $value)>{{ $text }}</option>
                            @endforeach
                        </select>
                        @error('experience')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="ga-interest" class="{{ $label }}">{{ $L(['en' => 'Area of Interest', 'de' => 'Interessengebiet', 'ar' => 'مجال الاهتمام']) }} *</label>
                        <select id="ga-interest" name="interest" required class="{{ $field }}">
                            <option value="">{{ $L(['en' => 'Select…', 'de' => 'Bitte wählen…', 'ar' => 'اختر…']) }}</option>
                            @foreach($interests as $value => $text)
                                <option value="{{ $value }}" @selected(old('interest') === $value)>{{ $text }}</option>
                            @endforeach
                        </select>
                        @error('interest')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label for="ga-linkedin" class="{{ $label }}">{{ $L(['en' => 'LinkedIn / Portfolio (optional)', 'de' => 'LinkedIn / Portfolio (optional)', 'ar' => 'لينكدإن / معرض الأعمال (اختياري)']) }}</label>
                    <input id="ga-linkedin" type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://" dir="ltr" class="{{ $field }}">
                    @error('linkedin_url')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="ga-message" class="{{ $label }}">{{ $L(['en' => 'Message (optional)', 'de' => 'Nachricht (optional)', 'ar' => 'رسالة (اختياري)']) }}</label>
                    <textarea id="ga-message" name="message" rows="4" maxlength="5000" class="{{ $field }}">{{ old('message') }}</textarea>
                </div>

                <div>
                    <label for="ga-cv" class="{{ $label }}">{{ $L(['en' => 'CV / Resume', 'de' => 'Lebenslauf', 'ar' => 'السيرة الذاتية']) }} * <span class="text-xs text-slate-400">(PDF, DOC, DOCX · max 10 MB)</span></label>
                    <input id="ga-cv" type="file" name="cv" accept=".pdf,.doc,.docx" required class="{{ $field }}">
                    @error('cv')<p class="mt-1 text-xs text-rose-400">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-start gap-2">
                    <input type="checkbox" name="gdpr" id="ga-gdpr" value="1" class="mt-1" required @checked(old('gdpr'))>
                    <label for="ga-gdpr" class="text-xs text-slate-400">
                        {{ $L(['en' => 'I agree to the', 'de' => 'Ich stimme der', 'ar' => 'أوافق على']) }}
                        <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">{{ $L(['en' => 'Privacy Policy', 'de' => 'Datenschutzerklärung', 'ar' => 'سياسة الخصوصية']) }}</a>@if($lang === 'de') zu.@else.@endif
                    </label>
                </div>
                @error('gdpr')<p class="text-xs text-rose-400">{{ $message }}</p>@enderror

                <button type="submit" class="btn-primary w-full" style="padding:12px 20px; border-radius:8px; font-weight:700;">
                    {{ $L(['en' => 'Send CV', 'de' => 'Lebenslauf absenden', 'ar' => 'إرسال السيرة الذاتية']) }}
                </button>
            </form>
        </div>
    </section>
</x-layouts.public>
