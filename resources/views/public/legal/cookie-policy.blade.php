<x-layouts.public :title="'Cookie Policy'">
@php $lang = request()->route('lang', 'en'); @endphp

<section style="padding:60px 0; background:#080D1A;">
    <div class="container-shell hopn-reveal" style="max-width:800px;">

        <div style="margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7;">
                {{ $lang === 'ar' ? 'قانوني' : 'Legal' }}
            </span>
            <h1 style="font-size:clamp(28px,4vw,42px); font-weight:800; color:white; margin-top:8px;">
                {{ $lang === 'ar' ? 'سياسة الكوكيز' : ($lang === 'de' ? 'Cookie-Richtlinie' : 'Cookie Policy') }}
            </h1>
            <p style="color:#CBD5E1; font-size:13px; margin-top:8px;">
                {{ $lang === 'ar' ? 'آخر تحديث: يناير 2025' : ($lang === 'de' ? 'Letzte Aktualisierung: Januar 2025' : 'Last updated: January 2025') }}
            </p>
        </div>

        <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:40px; color:#CBD5E1; line-height:1.8; font-size:15px; display:flex; flex-direction:column; gap:28px;" @if($lang === 'ar') dir="rtl" @endif>

            {{-- Section 1 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '1. ما هي الكوكيز؟' : ($lang === 'de' ? '1. Was sind Cookies?' : '1. What are Cookies?') }}
                </h2>
                <p style="color:#CBD5E1;">
                    @if($lang === 'ar')
                        الكوكيز هي ملفات نصية صغيرة تُخزَّن على جهازك عند زيارة موقعنا. تساعدنا في تحسين تجربتك وتذكر تفضيلاتك.
                    @elseif($lang === 'de')
                        Cookies sind kleine Textdateien, die beim Besuch unserer Website auf Ihrem Gerät gespeichert werden. Sie helfen uns, Ihre Erfahrung zu verbessern und Ihre Einstellungen zu speichern.
                    @else
                        Cookies are small text files stored on your device when you visit our website. They help us improve your experience and remember your preferences.
                    @endif
                </p>
            </div>

            {{-- Section 2 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '2. أنواع الكوكيز التي نستخدمها' : ($lang === 'de' ? '2. Arten von Cookies' : '2. Types of Cookies We Use') }}
                </h2>
                <div style="display:flex; flex-direction:column; gap:16px;">
                    @foreach([
                        ['label_en' => 'Essential Cookies', 'label_de' => 'Notwendige Cookies', 'label_ar' => 'الكوكيز الأساسية', 'color' => '#10B981',
                         'desc_en' => 'Required for the website to function. Cannot be disabled.', 'desc_de' => 'Für den Betrieb der Website erforderlich. Können nicht deaktiviert werden.', 'desc_ar' => 'مطلوبة لتشغيل الموقع. لا يمكن تعطيلها.'],
                        ['label_en' => 'Analytics Cookies', 'label_de' => 'Analyse-Cookies', 'label_ar' => 'كوكيز التحليل', 'color' => '#4F6EF7',
                         'desc_en' => 'Help us understand how visitors interact with our website. Used with consent only.', 'desc_de' => 'Helfen uns zu verstehen, wie Besucher mit unserer Website interagieren. Nur mit Zustimmung.', 'desc_ar' => 'تساعدنا على فهم كيفية تفاعل الزوار مع موقعنا. تُستخدم بموافقتك فقط.'],
                        ['label_en' => 'Preference Cookies', 'label_de' => 'Präferenz-Cookies', 'label_ar' => 'كوكيز التفضيلات', 'color' => '#8B5CF6',
                         'desc_en' => 'Remember your language and display preferences across visits.', 'desc_de' => 'Speichern Ihre Sprach- und Anzeigeeinstellungen.', 'desc_ar' => 'تتذكر تفضيلات اللغة والعرض الخاصة بك.'],
                    ] as $cookie)
                    <div style="border:1px solid rgba(255,255,255,0.07); border-radius:10px; padding:16px 20px;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;">
                            <span style="width:8px; height:8px; border-radius:50%; background:{{ $cookie['color'] }}; display:inline-block;"></span>
                            <span style="font-weight:600; color:white; font-size:14px;">
                                {{ $lang === 'ar' ? $cookie['label_ar'] : ($lang === 'de' ? $cookie['label_de'] : $cookie['label_en']) }}
                            </span>
                        </div>
                        <p style="color:#CBD5E1; font-size:13px; margin:0;">
                            {{ $lang === 'ar' ? $cookie['desc_ar'] : ($lang === 'de' ? $cookie['desc_de'] : $cookie['desc_en']) }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Section 3 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '3. كيفية التحكم في الكوكيز' : ($lang === 'de' ? '3. Cookie-Verwaltung' : '3. Managing Cookies') }}
                </h2>
                <p style="color:#CBD5E1;">
                    @if($lang === 'ar')
                        يمكنك التحكم في الكوكيز من خلال إعدادات متصفحك أو من خلال لافتة الكوكيز عند زيارة موقعنا لأول مرة. يرجى ملاحظة أن تعطيل بعض الكوكيز قد يؤثر على وظائف الموقع.
                    @elseif($lang === 'de')
                        Sie können Cookies über Ihre Browsereinstellungen oder über das Cookie-Banner beim ersten Besuch unserer Website verwalten. Bitte beachten Sie, dass das Deaktivieren bestimmter Cookies die Funktionalität der Website beeinträchtigen kann.
                    @else
                        You can manage cookies via your browser settings or through the cookie banner when you first visit our site. Please note that disabling certain cookies may affect website functionality.
                    @endif
                </p>
            </div>

            {{-- Section 4 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '4. التواصل' : ($lang === 'de' ? '4. Kontakt' : '4. Contact') }}
                </h2>
                <p style="color:#CBD5E1;">
                    {{ $lang === 'ar' ? 'لأي استفسارات بشأن سياسة الكوكيز:' : ($lang === 'de' ? 'Bei Fragen zu unserer Cookie-Richtlinie:' : 'For questions about our cookie policy:') }}<br>
                    Email: <a href="mailto:privacy@hopn.eu" style="color:#4F6EF7;">privacy@hopn.eu</a>
                </p>
            </div>

        </div>

        <div style="margin-top:32px;">
            <a href="{{ route('home', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="font-size:13px; color:#4F6EF7; text-decoration:none;">
                ← {{ $lang === 'ar' ? 'العودة للرئيسية' : ($lang === 'de' ? 'Zurück zur Startseite' : 'Back to Home') }}
            </a>
        </div>
    </div>
</section>
</x-layouts.public>
