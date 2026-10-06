<x-layouts.public :title="'Security & Trust'">
@php
    $lang = request()->route('lang', 'en');
    $securityContent = is_array($siteSettings['security_content'] ?? null)
        ? $siteSettings['security_content']
        : json_decode($siteSettings['security_content'] ?? '{}', true);
    $securityOverride = trim($securityContent[$lang] ?? '');
@endphp

<section style="padding:60px 0; background:#080D1A;">
    <div class="container-shell hopn-reveal" style="max-width:800px;" @if($lang === 'ar') dir="rtl" @endif>

        <div style="margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7;">
                {{ $lang === 'ar' ? 'الأمان والثقة' : ($lang === 'de' ? 'Sicherheit & Vertrauen' : 'Security & Trust') }}
            </span>
            <h1 style="font-size:clamp(28px,4vw,42px); font-weight:800; color:white; margin-top:8px;">
                {{ $lang === 'ar' ? 'الأمان والامتثال' : ($lang === 'de' ? 'Sicherheit & Compliance' : 'Security & Compliance') }}
            </h1>
            <p style="color:#CBD5E1; font-size:15px; margin-top:12px; line-height:1.7;">
                @if($lang === 'de')
                    Wir legen Wert darauf, unseren Compliance-Status genau und ehrlich darzustellen — einschließlich dessen, was noch in Arbeit ist.
                @elseif($lang === 'ar')
                    نحرص على تقديم وضعنا في الامتثال بدقة وصدق — بما في ذلك ما لا يزال قيد التنفيذ.
                @else
                    We aim to represent our compliance status accurately — including what's still in progress.
                @endif
            </p>
        </div>

        @if($securityOverride)
        <div style="color:#CBD5E1; font-size:15px; line-height:1.8; white-space:pre-line;">{{ $securityOverride }}</div>
        @else
        <div style="color:#CBD5E1; font-size:15px; line-height:1.8;">

            <h2 style="font-size:20px; font-weight:700; color:white; margin:32px 0 12px;">GDPR</h2>
            <p>
                @if($lang === 'de')
                    HOPn verarbeitet personenbezogene Daten im Einklang mit der EU-Datenschutz-Grundverordnung (DSGVO). Details zu Rechtsgrundlagen, Speicherfristen und Ihren Rechten finden Sie in unserer <a href="{{ route('legal.privacy', ['lang'=>$lang]) }}" style="color:#4F6EF7;">Datenschutzerklärung</a>.
                @elseif($lang === 'ar')
                    تعالج HOPn البيانات الشخصية وفقًا للائحة العامة لحماية البيانات في الاتحاد الأوروبي (GDPR). للاطلاع على الأساس القانوني ومدد الاحتفاظ بالبيانات وحقوقك، راجع <a href="{{ route('legal.privacy', ['lang'=>$lang]) }}" style="color:#4F6EF7;">سياسة الخصوصية</a>.
                @else
                    HOPn processes personal data in line with the EU General Data Protection Regulation (GDPR). For the legal basis, retention periods, and your rights, see our <a href="{{ route('legal.privacy', ['lang'=>$lang]) }}" style="color:#4F6EF7;">Privacy Policy</a>.
                @endif
            </p>

            <h2 style="font-size:20px; font-weight:700; color:white; margin:32px 0 12px;">
                {{ $lang === 'ar' ? 'استضافة البيانات في الاتحاد الأوروبي' : ($lang === 'de' ? 'EU-Datenhosting' : 'EU Data Hosting') }}
            </h2>
            <p>
                @if($lang === 'de')
                    Unsere Infrastruktur und die damit verbundene Datenverarbeitung sind auf den EU-Raum ausgerichtet, um europäisches Datenschutzrecht einzuhalten.
                @elseif($lang === 'ar')
                    تُستضاف بنيتنا التحتية ومعالجة البيانات المرتبطة بها داخل الاتحاد الأوروبي للامتثال لقوانين حماية البيانات الأوروبية.
                @else
                    Our infrastructure and related data processing are oriented toward the EU, in order to comply with European data protection law.
                @endif
            </p>

            <h2 style="font-size:20px; font-weight:700; color:white; margin:32px 0 12px;">
                {{ $lang === 'ar' ? 'الاستعداد لقانون الذكاء الاصطناعي الأوروبي' : ($lang === 'de' ? 'EU-KI-Verordnung (AI Act)' : 'EU AI Act Readiness') }}
            </h2>
            <p>
                @if($lang === 'de')
                    Wir verfolgen die Anforderungen der EU-KI-Verordnung und richten unsere Arbeitsweise entsprechend aus, während die Verordnung schrittweise in Kraft tritt.
                @elseif($lang === 'ar')
                    نتابع متطلبات قانون الذكاء الاصطناعي الأوروبي ونُكيّف ممارساتنا وفقًا لذلك مع دخول اللائحة حيز التنفيذ تدريجيًا.
                @else
                    We track the requirements of the EU AI Act and are aligning our practices accordingly as the regulation phases in.
                @endif
            </p>

            <h2 style="font-size:20px; font-weight:700; color:white; margin:32px 0 12px;">SOC 2</h2>
            <p>
                <span style="display:inline-block; padding:3px 12px; border-radius:20px; background:rgba(245,158,11,0.15); color:#FBBF24; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; margin-bottom:10px;">
                    {{ $lang === 'ar' ? 'قيد التنفيذ' : ($lang === 'de' ? 'In Arbeit' : 'In Progress') }}
                </span><br>
                @if($lang === 'de')
                    HOPn hat derzeit keine SOC 2-Zertifizierung. Eine entsprechende Bewertung ist für die Zukunft vorgesehen; diese Seite wird aktualisiert, sobald eine Zertifizierung abgeschlossen ist.
                @elseif($lang === 'ar')
                    لا تحمل HOPn حاليًا شهادة SOC 2. من المخطط إجراء تقييم في المستقبل، وسيتم تحديث هذه الصفحة فور الحصول على الشهادة.
                @else
                    HOPn does not currently hold SOC 2 certification. An assessment is planned for the future; this page will be updated once certification is complete.
                @endif
            </p>

            <h2 style="font-size:20px; font-weight:700; color:white; margin:32px 0 12px;">
                {{ $lang === 'ar' ? 'الإبلاغ عن مشكلة أمنية' : ($lang === 'de' ? 'Sicherheitsproblem melden' : 'Reporting a Security Issue') }}
            </h2>
            <p>
                @if($lang === 'de')
                    Wenn Sie eine Sicherheitslücke entdecken, kontaktieren Sie uns bitte unter <a href="mailto:security@hopn.eu" style="color:#4F6EF7;">security@hopn.eu</a>.
                @elseif($lang === 'ar')
                    إذا اكتشفت ثغرة أمنية، يُرجى التواصل معنا عبر <a href="mailto:security@hopn.eu" style="color:#4F6EF7;">security@hopn.eu</a>.
                @else
                    If you discover a security vulnerability, please contact us at <a href="mailto:security@hopn.eu" style="color:#4F6EF7;">security@hopn.eu</a>.
                @endif
            </p>
        </div>
        @endif

        <div style="margin-top:32px;">
            <a href="{{ route('home', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="font-size:13px; color:#4F6EF7; text-decoration:none;">
                ← {{ $lang === 'ar' ? 'العودة للرئيسية' : ($lang === 'de' ? 'Zurück zur Startseite' : 'Back to Home') }}
            </a>
        </div>
    </div>
</section>
</x-layouts.public>