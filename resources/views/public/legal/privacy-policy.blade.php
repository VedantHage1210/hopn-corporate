<x-layouts.public :title="'Privacy Policy'">
@php $lang = request()->route('lang', 'en'); @endphp

<section style="padding:60px 0; background:#080D1A;">
    <div class="container-shell" style="max-width:800px;">

        <div style="margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7;">
                {{ $lang === 'ar' ? 'قانوني' : 'Legal' }}
            </span>
            <h1 style="font-size:clamp(28px,4vw,42px); font-weight:800; color:white; margin-top:8px;">
                {{ $lang === 'ar' ? 'سياسة الخصوصية' : ($lang === 'de' ? 'Datenschutzerklärung' : 'Privacy Policy') }}
            </h1>
            <p style="color:#64748B; font-size:13px; margin-top:8px;">
                {{ $lang === 'ar' ? 'آخر تحديث: يناير 2025' : ($lang === 'de' ? 'Letzte Aktualisierung: Januar 2025' : 'Last updated: January 2025') }}
            </p>
        </div>

        <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:40px; color:#CBD5E1; line-height:1.8; font-size:15px; display:flex; flex-direction:column; gap:28px;" @if($lang === 'ar') dir="rtl" @endif>

            {{-- Section 1 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '1. مسؤول معالجة البيانات' : ($lang === 'de' ? '1. Verantwortlicher' : '1. Data Controller') }}
                </h2>
                <p style="color:#94A3B8;">
                    HOPn Corporate GmbH<br>
                    Musterstraße 1, 10115 Berlin, Germany<br>
                    Email: <a href="mailto:privacy@hopn.eu" style="color:#4F6EF7;">privacy@hopn.eu</a>
                </p>
            </div>

            {{-- Section 2 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '2. البيانات التي نجمعها' : ($lang === 'de' ? '2. Erhobene Daten' : '2. Data We Collect') }}
                </h2>
                <p style="color:#94A3B8;">
                    @if($lang === 'ar')
                        نجمع البيانات التي تقدمها طوعاً عند استخدام نماذج الاتصال أو التسجيل أو التقديم على الوظائف، بما في ذلك: الاسم، البريد الإلكتروني، رقم الهاتف، واسم الشركة. كما نجمع بيانات الاستخدام تلقائياً مثل عنوان IP وبيانات المتصفح.
                    @elseif($lang === 'de')
                        Wir erheben Daten, die Sie freiwillig über Kontakt-, Anmelde- oder Bewerbungsformulare übermitteln, darunter Name, E-Mail, Telefon und Unternehmen. Nutzungsdaten wie IP-Adresse und Browserdaten werden automatisch erfasst.
                    @else
                        We collect data you voluntarily provide via contact, registration, or application forms, including name, email, phone, and company. Usage data such as IP address and browser data is collected automatically.
                    @endif
                </p>
            </div>

            {{-- Section 3 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '3. الغرض من معالجة البيانات' : ($lang === 'de' ? '3. Zweck der Datenverarbeitung' : '3. Purpose of Processing') }}
                </h2>
                <p style="color:#94A3B8;">
                    @if($lang === 'ar')
                        نعالج بياناتك للرد على استفساراتك، ومعالجة طلبات التوظيف، وتحسين خدماتنا، والامتثال للالتزامات القانونية. الأساس القانوني: المادة 6(1)(ب) و(ج) و(و) من اللائحة الأوروبية العامة لحماية البيانات.
                    @elseif($lang === 'de')
                        Wir verarbeiten Ihre Daten zur Beantwortung von Anfragen, Verarbeitung von Bewerbungen, Verbesserung unserer Dienste und Einhaltung rechtlicher Verpflichtungen. Rechtsgrundlage: Art. 6 Abs. 1 lit. b, c, f DSGVO.
                    @else
                        We process your data to respond to inquiries, process job applications, improve our services, and comply with legal obligations. Legal basis: Art. 6(1)(b), (c), (f) GDPR.
                    @endif
                </p>
            </div>

            {{-- Section 4 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '4. حقوقك' : ($lang === 'de' ? '4. Ihre Rechte' : '4. Your Rights') }}
                </h2>
                <p style="color:#94A3B8;">
                    @if($lang === 'ar')
                        وفقاً للائحة GDPR، لديك الحق في: الوصول إلى بياناتك، تصحيحها، حذفها، تقييد معالجتها، نقلها، والاعتراض على معالجتها. للممارسة هذه الحقوق، تواصل معنا على: privacy@hopn.eu
                    @elseif($lang === 'de')
                        Gemäß DSGVO haben Sie das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung, Datenübertragbarkeit und Widerspruch. Kontakt: privacy@hopn.eu
                    @else
                        Under GDPR, you have the right to access, rectify, erase, restrict, port, and object to your data. To exercise these rights, contact: privacy@hopn.eu
                    @endif
                </p>
            </div>

            {{-- Section 5 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '5. الاحتفاظ بالبيانات' : ($lang === 'de' ? '5. Datenspeicherung' : '5. Data Retention') }}
                </h2>
                <p style="color:#94A3B8;">
                    @if($lang === 'ar')
                        نحتفظ ببياناتك فقط للمدة اللازمة للأغراض المذكورة أو وفقاً للمتطلبات القانونية. بيانات الاتصال تُحذف بعد 3 سنوات، وبيانات الوظائف بعد 6 أشهر من انتهاء الإجراءات.
                    @elseif($lang === 'de')
                        Wir speichern Ihre Daten nur so lange wie für die genannten Zwecke erforderlich oder gesetzlich vorgeschrieben. Kontaktdaten werden nach 3 Jahren gelöscht, Bewerberdaten nach 6 Monaten nach Abschluss des Verfahrens.
                    @else
                        We retain your data only as long as necessary for the stated purposes or as required by law. Contact data is deleted after 3 years; applicant data after 6 months following conclusion of the process.
                    @endif
                </p>
            </div>

            {{-- Section 6 --}}
            <div>
                <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                    {{ $lang === 'ar' ? '6. التواصل' : ($lang === 'de' ? '6. Kontakt' : '6. Contact') }}
                </h2>
                <p style="color:#94A3B8;">
                    Email: <a href="mailto:privacy@hopn.eu" style="color:#4F6EF7;">privacy@hopn.eu</a><br>
                    HOPn Corporate GmbH, Musterstraße 1, 10115 Berlin, Germany
                </p>
            </div>

        </div>

        <div style="margin-top:32px;">
            <a href="{{ route('home', ['lang' => $lang]) }}"
               style="font-size:13px; color:#4F6EF7; text-decoration:none;">
                ← {{ $lang === 'ar' ? 'العودة للرئيسية' : ($lang === 'de' ? 'Zurück zur Startseite' : 'Back to Home') }}
            </a>
        </div>
    </div>
</section>
</x-layouts.public>
