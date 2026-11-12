@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'عن HOPn':($lang==='de'?'Über HOPn':'About HOPn')">
<div class="hopn-homepage">
    
{{-- HERO --}}
<section class="hx-about-hero hx-host hx-hasvideo">
    <video class="hx-bgvideo" muted loop playsinline preload="none" poster="/videos/about-team.jpg" data-src="/videos/about-team.mp4" aria-hidden="true" tabindex="-1" disablepictureinpicture></video>
    <div class="hx-scrim" aria-hidden="true"></div>
    <div class="container-shell hopn-reveal">
        <div class="hx-badge"><i aria-hidden="true"></i><span>@if($lang==='ar') عن HOPn @elseif($lang==='de') Über HOPn @else About HOPn @endif</span></div>
        <h1>
            @if($lang==='ar') <span>نحن HOPn،</span><br><span class="hx-em">مركز الابتكار الأوروبي.</span>
            @elseif($lang==='de') <span>Wir sind HOPn,</span><br><span class="hx-em">Europas Innovationshub.</span>
            @else <span>We are HOPn,</span><br><span class="hx-em">a European innovation hub.</span> @endif
        </h1>
        <p class="hx-lead">
            @if($lang==='ar') نربط الأعمال والتعليم والبحث لبناء حلول رقمية ذكية عبر أوروبا والشرق الأوسط.
            @elseif($lang==='de') Wir verbinden Wirtschaft, Bildung und Forschung und bauen daraus intelligente digitale Lösungen für Europa und darüber hinaus.
            @else We connect business, education and research to build and scale intelligent digital solutions across Europe and beyond. @endif
        </p>
        @if(config('hopn.secondary_sections') && ($siteSettings['stats_about_visible'] ?? false))
        <div class="hx-facts">
            @foreach([
                ['num'=>'50+',  'label'=>$lang==='ar'?'عميل مؤسسي':($lang==='de'?'Unternehmenskunden':'Enterprise Clients')],
                ['num'=>'10+',  'label'=>$lang==='ar'?'منتج ذكاء اصطناعي':($lang==='de'?'KI-Produkte':'AI Products')],
                ['num'=>'6',    'label'=>$lang==='ar'?'مجالات ابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains')],
                ['num'=>'2020', 'label'=>$lang==='ar'?'تأسست':($lang==='de'?'Gegründet':'Founded')],
            ] as $stat)
            <div><b>{{ $stat['num'] }}</b><small>{{ $stat['label'] }}</small></div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<style>
.ab-nav{position:sticky;top:64px;z-index:30;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);border-bottom:1px solid rgba(36,91,120,.15)}
.ab-nav ul{display:flex;gap:8px;flex-wrap:wrap;justify-content:center;list-style:none;margin:0;padding:12px 0}
.ab-nav a{display:inline-block;padding:8px 16px;border-radius:999px;border:1.5px solid #245B78;color:#245B78;font-size:14px;font-weight:600;text-decoration:none;background:#fff}
.ab-nav a:hover,.ab-nav a:focus-visible{background:#245B78;color:#fff}
html[data-theme="dark"] .ab-nav{background:rgba(8,13,26,.92)}
html[data-theme="dark"] .ab-nav a{background:transparent;color:#E2E8F0;border-color:rgba(255,255,255,.55)}
html[data-theme="dark"] .ab-nav a:hover{background:#fff;color:#0B3549}
.ab-sec{scroll-margin-top:130px}
.ab-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px;margin-top:8px}
.ab-card{border:1px solid rgba(36,91,120,.18);border-radius:14px;padding:22px;background:rgba(255,255,255,.55)}
html[data-theme="dark"] .ab-card{background:rgba(255,255,255,.04);border-color:rgba(255,255,255,.14)}
.ab-card h3{font-size:17px;font-weight:700;margin:0 0 8px}
.ab-card p{font-size:14px;line-height:1.65;margin:0;opacity:.9}
.ab-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:26px}
.ab-btn{display:inline-flex;align-items:center;gap:6px;padding:12px 24px;border-radius:10px;background:#245B78;color:#fff!important;border:1.5px solid #245B78;font-size:15px;font-weight:650;text-decoration:none;transition:background .2s,transform .2s}
html[data-theme] body main section a.ab-btn{background:#245B78!important;color:#fff!important;border:1.5px solid #245B78!important}
html[data-theme] body main section a.ab-btn:hover,html[data-theme] body main section a.ab-btn:focus-visible{background:#0B3549!important;border-color:#0B3549!important;transform:translateY(-2px)}
html[data-theme="dark"] body main section a.ab-btn{background:#fff!important;color:#0B3549!important;border-color:#fff!important}
html[data-theme="dark"] body main section a.ab-btn:hover{background:#E2F3F9!important}
.ab-soon{text-align:center;margin:24px 0 0;font-size:16px;opacity:.8}
@media(max-width:640px){.ab-nav{top:56px}.ab-nav ul{flex-wrap:nowrap;overflow-x:auto;justify-content:flex-start;padding:10px 4px}.ab-nav a{white-space:nowrap}}
</style>
<nav class="ab-nav" aria-label="@if($lang==='ar')أقسام الصفحة@elseif($lang==='de')Seitenabschnitte@else Page sections @endif">
  <div class="container-shell"><ul>
    <li><a href="#who-we-are">@if($lang==='ar') من نحن @elseif($lang==='de') Wer wir sind @else Who we are @endif</a></li>
    <li><a href="#team">@if($lang==='ar') الفريق @elseif($lang==='de') Team @else Team @endif</a></li>
    <li><a href="#investors">@if($lang==='ar') المستثمرون @elseif($lang==='de') Investoren @else Investors @endif</a></li>
    <li><a href="#partners">@if($lang==='ar') الشركاء @elseif($lang==='de') Partner @else Partners @endif</a></li>
    <li><a href="#careers">@if($lang==='ar') الوظائف @elseif($lang==='de') Karriere @else Careers @endif</a></li>
    <li><a href="#security-trust">@if($lang==='ar') الأمان والثقة @elseif($lang==='de') Sicherheit & Vertrauen @else Security & Trust @endif</a></li>
    <li><a href="#contact">@if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt @else Contact @endif</a></li>
  </ul></div>
</nav>

{{-- WHO WE ARE (mission & vision) --}}
<section class="hx-sec ab-sec" id="who-we-are">
    <div class="container-shell">
        <div class="hx-head hopn-reveal">
            <div class="hx-eyebrow"><span>@if($lang==='ar') من نحن @elseif($lang==='de') Wer wir sind @else Who we are @endif</span></div>
            <h2 class="hx-h2">
                @if($lang==='ar') منصة ابتكار تقني عميق، لا وكالة تقليدية.
                @elseif($lang==='de') Eine Deep-Tech-Innovationsplattform, keine klassische Agentur.
                @else A deep-tech innovation platform, not a simple agency. @endif
            </h2>
        </div>
        <div class="hx-split2 hopn-reveal">
            <div class="hx-mv">
                <img src="/images/photos/consulting.jpg" alt="" loading="lazy" decoding="async">
                <div class="hx-mv-body">
                    <div class="hx-num">01</div>
                    <h3>@if($lang==='ar') مهمتنا @elseif($lang==='de') Unsere Mission @else Our Mission @endif</h3>
                    <p>
                        @if($lang==='ar') تمكين المؤسسات والجامعات والشركات الناشئة من بناء مستقبل رقمي من خلال الذكاء الاصطناعي والبيانات والروبوتات والتوائم الرقمية.
                        @elseif($lang==='de') Organisationen, Hochschulen und Start-ups befähigen, mit KI, Daten, Robotik und Digital Twins ihre digitale Zukunft zu gestalten.
                        @else To help organisations, universities and start-ups build their digital future with AI, data, robotics and digital twins, combining consulting, technology, talent, training and research. @endif
                    </p>
                </div>
            </div>
            <div class="hx-mv">
                <img src="/images/photos/research.jpg" alt="" loading="lazy" decoding="async">
                <div class="hx-mv-body">
                    <div class="hx-num">02</div>
                    <h3>@if($lang==='ar') رؤيتنا @elseif($lang==='de') Unsere Vision @else Our Vision @endif</h3>
                    <p>
                        @if($lang==='ar') أن نكون المنصة الرائدة في أوروبا التي تربط ابتكار الأعمال والبحث الأكاديمي وريادة الأعمال في نظام بيئي متكامل.
                        @elseif($lang==='de') Europas führende Plattform zu sein, die Unternehmensinnovation, akademische Forschung und Gründergeist in einem Ökosystem verbindet.
                        @else To be Europe's leading platform connecting business innovation, academic research and entrepreneurship in one integrated ecosystem. @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TEAM --}}
<section class="hx-sec ab-sec" id="team">
    <div class="container-shell">
        <div class="hx-head hx-split hopn-reveal">
            <div>
                <div class="hx-eyebrow"><span>@if($lang==='ar') فريقنا @elseif($lang==='de') Unser Team @else Our Team @endif</span></div>
                <h2 class="hx-h2">@if($lang==='ar') تعرف على الفريق @elseif($lang==='de') Das Team @else Meet the Team @endif</h2>
            </div>
            <p class="hx-sub">
                @if($lang==='ar') خبراء في الذكاء الاصطناعي والروبوتيكا والبيانات والابتكار الرقمي
                @elseif($lang==='de') Experten für KI, Robotik, Daten und digitale Innovation
                @else Experts in AI, robotics, data, and digital innovation @endif
            </p>
        </div>
        @php
            $aboutLeaders = $teamMembers->filter(fn ($m) => $m->is_founder)->values();
            $teamMembers  = $teamMembers->reject(fn ($m) => $m->is_founder)->values();
        @endphp
        @if($aboutLeaders->count() > 0)
        <div class="hopn-pleaders {{ $aboutLeaders->count() === 1 ? 'is-single' : '' }}" style="margin-bottom:48px;">
            @foreach($aboutLeaders as $leader)
                <x-leader-card :member="$leader" :lang="$lang" />
            @endforeach
        </div>
        @endif
        <div class="hopn-pgrid">
            @foreach($teamMembers as $member)
                <x-member-card :member="$member" :lang="$lang" />
            @endforeach
        </div>
        @if($teamMembers->count() === 0 && $aboutLeaders->count() === 0)
        <p class="ab-soon"><x-coming-soon-text /></p>
        @endif
        <div class="ab-actions"><a href="{{ route('team.index', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') الفريق والمؤسسون @elseif($lang==='de') Gründer & Team @else Founder & Team page @endif →</a></div>
    </div>
</section>

{{-- INVESTORS --}}
<section class="hx-sec ab-sec" id="investors">
    <div class="container-shell">
        <div class="hx-head hopn-reveal">
            <div class="hx-eyebrow"><span>@if($lang==='ar') المستثمرون @elseif($lang==='de') Investoren @else Investors @endif</span></div>
            <h2 class="hx-h2">@if($lang==='ar') دعم منصة ابتكار أوروبية @elseif($lang==='de') Eine europäische Innovationsplattform unterstützen @else Backing a European innovation platform @endif</h2>
        </div>
        <p class="hx-sub" style="max-width:720px;">@if($lang==='ar') نرحب بالحوار مع المستثمرين الذين يشاركوننا التركيز على الذكاء الاصطناعي والبيانات والروبوتات والتوائم الرقمية. تعرّف على نهجنا واطلب عرض المستثمرين. @elseif($lang==='de') Wir freuen uns auf Gespräche mit Investoren, die unseren Fokus auf KI, Daten, Robotik und digitale Zwillinge teilen. Lernen Sie unseren Ansatz kennen und fordern Sie das Investoren-Deck an. @else We welcome conversations with investors who share our focus on AI, data, robotics and digital twins. Learn about our approach and request the investor deck. @endif</p>
        <div class="ab-actions"><a href="{{ route('investors.index', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') معلومات المستثمرين @elseif($lang==='de') Informationen für Investoren @else Investor information @endif →</a></div>
    </div>
</section>

{{-- PARTNERS --}}
<section class="hx-sec ab-sec" id="partners">
    <div class="container-shell">
        <div class="hx-head hopn-reveal">
            <div class="hx-eyebrow"><span>@if($lang==='ar') الشركاء @elseif($lang==='de') Partner @else Partners @endif</span></div>
            <h2 class="hx-h2">@if($lang==='ar') نبني مع شركاء من الصناعة والأوساط الأكاديمية @elseif($lang==='de') Gemeinsam mit Partnern aus Industrie und Wissenschaft @else Building with partners across industry and academia @endif</h2>
        </div>
        @if($aboutPartners->count())
        <div class="ab-grid">
            @foreach($aboutPartners as $partner)
            <div class="ab-card" style="text-align:center;">
                @if($partner->logo)<img src="{{ $partner->logo }}" alt="{{ $partner->name }}" loading="lazy" style="max-height:48px;max-width:100%;margin:0 auto 10px;object-fit:contain;">@endif
                <h3 style="margin:0;">{{ $partner->name }}</h3>
            </div>
            @endforeach
        </div>
        @else
        <p class="hx-sub" style="max-width:720px;">@if($lang==='ar') نتعاون مع الشركات والجامعات والمؤسسات البحثية. وشبكة شركائنا في نمو مستمر. @elseif($lang==='de') Wir arbeiten mit Unternehmen, Hochschulen und Forschungseinrichtungen zusammen. Unser Partnernetzwerk wächst. @else We collaborate with companies, universities and research institutions. Our partner network is growing. @endif</p>
        @endif
        <div class="ab-actions"><a href="{{ route('partners.index', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') جميع الشركاء @elseif($lang==='de') Alle Partner @else All partners @endif →</a> <a href="{{ route('partner-inquiry.index', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') كن شريكًا @elseif($lang==='de') Partner werden @else Become a partner @endif →</a></div>
    </div>
</section>

{{-- CAREERS --}}
<section class="hx-sec ab-sec" id="careers">
    <div class="container-shell">
        <div class="hx-head hopn-reveal">
            <div class="hx-eyebrow"><span>@if($lang==='ar') الوظائف @elseif($lang==='de') Karriere @else Careers @endif</span></div>
            <h2 class="hx-h2">@if($lang==='ar') ابنِ معنا الجيل القادم من الحلول الرقمية @elseif($lang==='de') Gestalten Sie mit uns die nächste Generation digitaler Lösungen @else Build the next generation of digital solutions with us @endif</h2>
        </div>
        <p class="hx-sub" style="max-width:720px;">@if($lang==='ar') انضم إلى فريق يعمل في الذكاء الاصطناعي والبيانات والهندسة والتعليم. @elseif($lang==='de') Werden Sie Teil eines Teams für KI, Daten, Engineering und Bildung. @else Join a team working across AI, data, engineering and education. @endif
        @if($openJobs > 0) <strong>{{ $openJobs }} @if($lang==='ar') وظيفة متاحة @elseif($lang==='de') offene Stelle(n) @else open position(s) @endif</strong>@endif</p>
        <div class="ab-actions"><a href="{{ route('careers.index', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') عرض الوظائف @elseif($lang==='de') Zu den Karrieremöglichkeiten @else View careers @endif →</a> <a href="{{ route('careers.apply.general', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') أرسل سيرتك الذاتية @elseif($lang==='de') Lebenslauf senden @else Send your CV @endif →</a></div>
    </div>
</section>

{{-- SECURITY-TRUST --}}
<section class="hx-sec ab-sec" id="security-trust">
    <div class="container-shell">
        <div class="hx-head hopn-reveal">
            <div class="hx-eyebrow"><span>@if($lang==='ar') الأمان والثقة @elseif($lang==='de') Sicherheit & Vertrauen @else Security & Trust @endif</span></div>
            <h2 class="hx-h2">@if($lang==='ar') الخصوصية والامتثال، بكل شفافية @elseif($lang==='de') Datenschutz und Compliance – ehrlich dargestellt @else Privacy and compliance, stated honestly @endif</h2>
        </div>
        <div class="ab-grid">
            <div class="ab-card"><h3>GDPR</h3><p>@if($lang==='ar') نعالج البيانات الشخصية وفق اللائحة الأوروبية العامة لحماية البيانات. @elseif($lang==='de') Wir verarbeiten personenbezogene Daten im Einklang mit der DSGVO. @else We process personal data in line with the EU General Data Protection Regulation. @endif</p></div>
            <div class="ab-card"><h3>@if($lang==='ar') الاستضافة داخل الاتحاد الأوروبي @elseif($lang==='de') EU-Datenhosting @else EU data hosting @endif</h3><p>@if($lang==='ar') بنيتنا التحتية ومعالجة البيانات لدينا موجّهة نحو الاتحاد الأوروبي. @elseif($lang==='de') Unsere Infrastruktur und Datenverarbeitung sind auf die EU ausgerichtet. @else Our infrastructure and data processing are oriented toward the EU. @endif</p></div>
            <div class="ab-card"><h3>@if($lang==='ar') الجاهزية لقانون الذكاء الاصطناعي الأوروبي @elseif($lang==='de') EU-KI-Verordnung @else EU AI Act readiness @endif</h3><p>@if($lang==='ar') نتابع قانون الذكاء الاصطناعي الأوروبي ونواءم ممارساتنا مع تطبيقه التدريجي. @elseif($lang==='de') Wir verfolgen die EU-KI-Verordnung und passen unsere Praxis schrittweise an. @else We track the EU AI Act and align our practices as it phases in. @endif</p></div>
        </div>
        <div class="ab-actions"><a href="{{ route('legal.security', ['lang'=>$lang]) }}" class="ab-btn hopn-btn-primary">@if($lang==='ar') تفاصيل الأمان والثقة @elseif($lang==='de') Details zu Sicherheit & Vertrauen @else Security & Trust details @endif →</a></div>
    </div>
</section>

{{-- Older sections kept but hidden until the founder confirms their claims (HOPN_SECONDARY_SECTIONS=true shows them) --}}
@if(config('hopn.secondary_sections'))
{{-- WHO WE ARE --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:center;">
            <div>
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
                    @if($lang==='ar') من نحن @elseif($lang==='de') Wer wir sind @else Who We Are @endif
                </span>
                <h2 style="font-size:clamp(28px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:24px; line-height:1.2;">
                    @if($lang==='ar') مركز ابتكار متعدد التخصصات
                    @elseif($lang==='de') Ein multidisziplinärer Innovationshub
                    @else A Multidisciplinary Innovation Hub @endif
                </h2>
                <p style="font-size:16px; color:#CBD5E1; line-height:1.8; margin-bottom:20px;">
                    @if($lang==='ar') HOPn هو شريك مؤسسي متعدد التخصصات يجمع الاستشارات والمنتجات الرقمية وبناء القدرات في منظومة ابتكار متكاملة.
                    @elseif($lang==='de') HOPn ist ein multidisziplinärer Unternehmenspartner, der Beratung, digitale Produkte und Kompetenzaufbau in einem integrierten Innovationsökosystem vereint.
                    @else HOPn is a multidisciplinary corporate partner that combines consulting, digital products, and capability building into one integrated innovation ecosystem — serving enterprises, universities, startups, and investors across Europe and MENA. @endif
                </p>
                <p style="font-size:16px; color:#CBD5E1; line-height:1.8;">
                    @if($lang==='ar') نتخصص في الذكاء الاصطناعي والروبوتات والتوائم الرقمية ومنصات البيانات.
                    @elseif($lang==='de') Wir sind spezialisiert auf KI, Robotik, digitale Zwillinge und Datenplattformen.
                    @else We specialize in AI, robotics, swarming systems, digital twins, healthcare technology, and data platforms. @endif
                </p>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                @php
                $domains=[
                    ['icon'=>'A','en'=>'Artificial Intelligence','de'=>'Künstliche Intelligenz','ar'=>'الذكاء الاصطناعي','color'=>'#8FB8CC'],
                    ['icon'=>'','en'=>'Robotics','de'=>'Robotik','ar'=>'الروبوتات','color'=>'#8FB8CC'],
                    ['icon'=>'','en'=>'Swarming Systems','de'=>'Schwarmsysteme','ar'=>'أنظمة السرب','color'=>'#8FB8CC'],
                    ['icon'=>'D','en'=>'Digital Twins','de'=>'Digitale Zwillinge','ar'=>'التوائم الرقمية','color'=>'#8FB8CC'],
                    ['icon'=>'','en'=>'Healthcare Tech','de'=>'Gesundheitstechnologie','ar'=>'تكنولوجيا الصحة','color'=>'#8FB8CC'],
                    ['icon'=>'','en'=>'Data Platforms','de'=>'Datenplattformen','ar'=>'منصات البيانات','color'=>'#8FB8CC'],
                ];
                @endphp
                @foreach($domains as $d)
                <div class="hopn-lift-card-nobg" style="border:1px solid {{ $d['color'] }}20; background:{{ $d['color'] }}08; border-radius:12px; padding:16px; display:flex; align-items:center; gap:10px; transition:all 0.25s;">
                    <span style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $d[$lang] ?? $d['en'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CORE VALUES --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
                @if($lang==='ar') قيمنا الأساسية @elseif($lang==='de') Kernwerte @else Core Values @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') ما الذي يقودنا @elseif($lang==='de') Was uns antreibt @else What Drives Us @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $values=[
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Impact First','de'=>'Wirkung zuerst','ar'=>'الأثر أولاً','desc_en'=>'Every solution must create measurable, real-world impact.','desc_de'=>'Jede Lösung muss messbare Wirkung erzielen.','desc_ar'=>'كل حل يجب أن يحقق تأثيراً حقيقياً.'],
                ['icon'=>'R','color'=>'#8FB8CC','en'=>'Research-Driven','de'=>'Forschungsgetrieben','ar'=>'مدفوع بالبحث','desc_en'=>'We ground our work in academic research and proven methodologies.','desc_de'=>'Wir stützen unsere Arbeit auf akademische Forschung.','desc_ar'=>'نستند إلى البحث الأكاديمي والمنهجيات المثبتة.'],
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Ecosystem Thinking','de'=>'Ökosystem-Denken','ar'=>'التفكير البيئي','desc_en'=>'We believe in collaboration over competition — building together.','desc_de'=>'Zusammenarbeit statt Wettbewerb — gemeinsam aufbauen.','desc_ar'=>'نؤمن بالتعاون على التنافس.'],
                ['icon'=>'S','color'=>'#8FB8CC','en'=>'Speed & Discipline','de'=>'Geschwindigkeit & Disziplin','ar'=>'السرعة والانضباط','desc_en'=>'Enterprise-grade outcomes with startup-level speed.','desc_de'=>'Unternehmensergebnisse mit Startup-Geschwindigkeit.','desc_ar'=>'نتائج على مستوى المؤسسات بسرعة الشركات الناشئة.'],
                ['icon'=>'E','color'=>'#8FB8CC','en'=>'European Values','de'=>'Europäische Werte','ar'=>'القيم الأوروبية','desc_en'=>'Privacy, transparency, and ethical AI are non-negotiable.','desc_de'=>'Datenschutz, Transparenz und ethische KI sind nicht verhandelbar.','desc_ar'=>'الخصوصية والشفافية والذكاء الاصطناعي الأخلاقي.'],
                ['icon'=>'I','color'=>'#8FB8CC','en'=>'Continuous Innovation','de'=>'Kontinuierliche Innovation','ar'=>'الابتكار المستمر','desc_en'=>'We never stop learning, experimenting, and pushing boundaries.','desc_de'=>'Wir hören nie auf zu lernen und Grenzen zu erweitern.','desc_ar'=>'لا نتوقف عن التعلم والتجريب.'],
            ];
            @endphp
            @foreach($values as $v)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $v[$lang] ?? $v['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $v['desc_'.$lang] ?? $v['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- RESEARCH & PARTNERSHIPS --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
                @if($lang==='ar') البحث والشراكات @elseif($lang==='de') Forschung & Partnerschaften @else Research & Partnerships @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') كيف نتعاون @elseif($lang==='de') Wie wir zusammenarbeiten @else How We Collaborate @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px;">
            @php
            $collab=[
                ['icon'=>'U','color'=>'#8FB8CC','en'=>'University Collaboration','de'=>'Universitätszusammenarbeit','ar'=>'التعاون الجامعي','desc_en'=>'Joint research programs, thesis supervision, and industry-academia innovation bridges.','desc_de'=>'Gemeinsame Forschungsprogramme und Industrie-Akademie-Brücken.','desc_ar'=>'برامج بحثية مشتركة وجسور الابتكار.'],
                ['icon'=>'R','color'=>'#8FB8CC','en'=>'Applied Research','de'=>'Angewandte Forschung','ar'=>'البحث التطبيقي','desc_en'=>'Turning academic research into real-world products and enterprise solutions.','desc_de'=>'Akademische Forschung in reale Produkte verwandeln.','desc_ar'=>'تحويل البحث الأكاديمي إلى منتجات حقيقية.'],
                ['icon'=>'','color'=>'#8FB8CC','en'=>'Strategic Partnerships','de'=>'Strategische Partnerschaften','ar'=>'الشراكات الاستراتيجية','desc_en'=>'Long-term partnerships with enterprises, investors, and technology companies.','desc_de'=>'Langfristige Partnerschaften mit Unternehmen und Investoren.','desc_ar'=>'شراكات طويلة الأمد مع المؤسسات والمستثمرين.'],
                ['icon'=>'N','color'=>'#8FB8CC','en'=>'European Network','de'=>'Europäisches Netzwerk','ar'=>'الشبكة الأوروبية','desc_en'=>'Active network across Germany, EU, and MENA with local presence and global reach.','desc_de'=>'Aktives Netzwerk in Deutschland, EU und MENA.','desc_ar'=>'شبكة نشطة في ألمانيا والاتحاد الأوروبي والشرق الأوسط.'],
            ];
            @endphp
            @foreach($collab as $item)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- LOCATIONS --}}
<section style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#8FB8CC; margin-bottom:16px;">
                @if($lang==='ar') مواقعنا @elseif($lang==='de') Standorte @else Locations @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') أين نحن @elseif($lang==='de') Wo wir sind @else Where We Are @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px;">
            @foreach([
                ['flag'=>'','city'=>$siteSettings['office_address'] ?? 'Germany','en'=>'Germany','de'=>'Deutschland','ar'=>'ألمانيا','type_en'=>'Headquarters','type_de'=>'Hauptsitz','type_ar'=>'المقر الرئيسي','color'=>'#8FB8CC'],
                ['flag'=>'EU','city'=>'European Union','en'=>'EU Markets','de'=>'EU-Märkte','ar'=>'أسواق الاتحاد الأوروبي','type_en'=>'Regional Operations','type_de'=>'Regionalbetrieb','type_ar'=>'العمليات الإقليمية','color'=>'#8FB8CC'],
                ['flag'=>'MENA','city'=>'MENA Region','en'=>'Middle East & North Africa','de'=>'Naher Osten & Nordafrika','ar'=>'الشرق الأوسط وشمال أفريقيا','type_en'=>'Partner Network','type_de'=>'Partnernetzwerk','type_ar'=>'شبكة الشركاء','color'=>'#8FB8CC'],
            ] as $loc)
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s;">
                <h3 style="font-size:20px; font-weight:700; color:white; margin-bottom:6px;">{{ $loc['city'] }}</h3>
                <p style="font-size:14px; color:#CBD5E1; margin-bottom:16px;">{{ $loc[$lang] ?? $loc['en'] }}</p>
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:{{ $loc['color'] }}15; color:{{ $loc['color'] }}; border:1px solid {{ $loc['color'] }}30; text-transform:uppercase; letter-spacing:0.06em;">
                    {{ $loc['type_'.$lang] ?? $loc['type_en'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endif

{{-- CONTACT --}}
<section class="hx-host hx-vidsec ab-sec" id="contact" style="padding:110px 0; position:relative; overflow:hidden;">
    <video class="hx-bgvideo" preload="none" muted loop playsinline poster="/videos/partners-meeting.jpg" aria-hidden="true" tabindex="-1" disablepictureinpicture data-src="/videos/partners-meeting.mp4"></video>
    <div class="hx-scrim" aria-hidden="true"></div>
    <div class="container-shell hopn-reveal hx-vidhead" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(30px,4.4vw,56px); font-weight:800; letter-spacing:-1px; margin:0 0 16px;">@if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt @else Contact @endif</h2>
        <p style="font-size:18px; max-width:540px; margin:0 auto 28px; line-height:1.7;">@if($lang==='ar') تواصل معنا لمناقشة فرص الشراكة والبحث والابتكار. @elseif($lang==='de') Kontaktieren Sie uns für Partnerschaften, Forschung und Innovationsvorhaben. @else Get in touch to discuss partnership, research, or innovation opportunities. @endif</p>
        @if(!empty($siteSettings['contact_email']))
        <p style="margin:0 0 28px; font-size:15px;"><a href="mailto:{{ $siteSettings['contact_email'] }}" style="font-weight:700; color:#9FE0F2; text-decoration:underline;">{{ $siteSettings['contact_email'] }}</a></p>
        @endif
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hx-btn hx-btn-solid hopn-btn-primary">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

</div>
</x-layouts.public>