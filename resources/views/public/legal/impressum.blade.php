<x-layouts.public :title="'Impressum'">
@php $lang = request()->route('lang', 'en'); @endphp

<section style="padding:60px 0; background:#080D1A;">
    <div class="container-shell hopn-reveal" style="max-width:800px;">

        {{-- Header --}}
        <div style="margin-bottom:40px;">
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7;">
                {{ $lang === 'ar' ? 'قانوني' : 'Legal' }}
            </span>
            <h1 style="font-size:clamp(28px,4vw,42px); font-weight:800; color:white; margin-top:8px;">
                Impressum
            </h1>
            <p style="color:#CBD5E1; font-size:13px; margin-top:8px;">
                {{ $lang === 'ar' ? 'آخر تحديث: يناير 2025' : ($lang === 'de' ? 'Letzte Aktualisierung: Januar 2025' : 'Last updated: January 2025') }}
            </p>
        </div>

        <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:40px; color:#CBD5E1; line-height:1.8; font-size:15px;" @if($lang === 'ar') dir="rtl" @endif>

            <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:16px;">
                {{ $lang === 'ar' ? 'بيانات الناشر' : ($lang === 'de' ? 'Angaben gemäß § 5 TMG' : 'Information pursuant to § 5 TMG') }}
            </h2>
            <p>HOPn Corporate GmbH<br>
            Musterstraße 1<br>
            10115 Berlin<br>
            Germany</p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'ممثل الشركة' : ($lang === 'de' ? 'Vertreten durch' : 'Represented by') }}
            </h2>
            <p>{{ $lang === 'ar' ? 'المدير العام: د. ماكس موستيرمان' : ($lang === 'de' ? 'Geschäftsführer: Dr. Max Mustermann' : 'Managing Director: Dr. Max Mustermann') }}</p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'التواصل' : ($lang === 'de' ? 'Kontakt' : 'Contact') }}
            </h2>
            <p>
                {{ $lang === 'ar' ? 'الهاتف' : ($lang === 'de' ? 'Telefon' : 'Phone') }}: +49 30 123456789<br>
                Email: <a href="mailto:legal@hopn.eu" style="color:#4F6EF7;">legal@hopn.eu</a><br>
                Web: <a href="https://www.hopn.eu" style="color:#4F6EF7;">www.hopn.eu</a>
            </p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'السجل التجاري' : ($lang === 'de' ? 'Registereintrag' : 'Register Entry') }}
            </h2>
            <p>
                {{ $lang === 'ar' ? 'مسجل في:' : ($lang === 'de' ? 'Eingetragen im Handelsregister.' : 'Registered in the Commercial Register.') }}<br>
                {{ $lang === 'ar' ? 'محكمة التسجيل: محكمة برلين' : ($lang === 'de' ? 'Registergericht: Amtsgericht Berlin' : 'Register Court: District Court Berlin') }}<br>
                {{ $lang === 'ar' ? 'رقم التسجيل:' : ($lang === 'de' ? 'Registernummer:' : 'Registration Number:') }} HRB 123456
            </p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'رقم ضريبة المبيعات' : ($lang === 'de' ? 'Umsatzsteuer-ID' : 'VAT ID') }}
            </h2>
            <p>
                {{ $lang === 'ar' ? 'رقم تعريف ضريبة المبيعات وفقاً للمادة 27 أ من قانون ضريبة المبيعات:' : ($lang === 'de' ? 'Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz:' : 'VAT identification number pursuant to § 27 a of the German VAT Act:') }}<br>
                DE 123456789
            </p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'المسؤول عن المحتوى' : ($lang === 'de' ? 'Verantwortlich für den Inhalt' : 'Responsible for Content') }}
            </h2>
            <p>
                {{ $lang === 'ar' ? 'وفقاً للمادة 55 الفقرة 2 من اتفاقية الإذاعة بين الولايات الألمانية:' : ($lang === 'de' ? 'Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:' : 'Responsible for content pursuant to § 55 para. 2 RStV:') }}<br>
                Dr. Max Mustermann<br>
                HOPn Corporate GmbH<br>
                Musterstraße 1, 10115 Berlin
            </p>

            <h2 style="font-size:18px; font-weight:700; color:white; margin:32px 0 16px;">
                {{ $lang === 'ar' ? 'إخلاء المسؤولية' : ($lang === 'de' ? 'Haftungsausschluss' : 'Disclaimer') }}
            </h2>
            <p style="color:#CBD5E1;">
                @if($lang === 'ar')
                    محتوى موقعنا تم إنشاؤه بعناية فائقة. ومع ذلك، لا نتحمل أي مسؤولية عن صحة المحتوى أو اكتماله أو حداثته. وفقاً للمادة 7 الفقرة 1 من قانون التيليميديا الألماني، نحن كمزود خدمة مسؤولون عن المحتوى الخاص بنا على هذه الصفحات وفقاً للقوانين العامة.
                @elseif($lang === 'de')
                    Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. Als Diensteanbieter sind wir gemäß § 7 Abs. 1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich.
                @else
                    The contents of our pages were created with the utmost care. However, we cannot guarantee the accuracy, completeness and timeliness of the content. As a service provider, we are responsible for our own content on these pages in accordance with general laws pursuant to § 7 para. 1 of the German Telemedia Act (TMG).
                @endif
            </p>
        </div>

        {{-- Back --}}
        <div style="margin-top:32px;">
            <a href="{{ route('home', ['lang' => $lang]) }}" class="hopn-link-accent"
               style="font-size:13px; color:#4F6EF7; text-decoration:none;">
                ← {{ $lang === 'ar' ? 'العودة للرئيسية' : ($lang === 'de' ? 'Zurück zur Startseite' : 'Back to Home') }}
            </a>
        </div>
    </div>
</section>
</x-layouts.public>
