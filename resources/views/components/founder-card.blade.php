@props(['lang' => 'en'])
@php
    $t = fn ($en, $de, $ar) => $lang === 'ar' ? $ar : ($lang === 'de' ? $de : $en);

    // Default content (founder's own biography). If a founder is maintained in the admin panel
    // (Team members, "founder" ticked) with a photo and a real biography, that record is used instead,
    // so the card can be edited without touching code.
    $isDefault = true;
    $founder = [
        'name'  => 'Prof. Dr.-Ing. Ahmed Ebada',
        'photo' => asset('images/founder-ahmed-ebada.jpg'),
        'linkedin' => null,
        'role'  => $t(
            'Founder of HOPn. Founder and conference chair of MunichTech EXPO.',
            'Gründer von HOPn. Gründer und Konferenzleiter der MunichTech EXPO.',
            'مؤسس <bdi>HOPn</bdi>. مؤسس ورئيس مؤتمر <bdi>MunichTech EXPO</bdi>.'
        ),
        'bio'   => $t(
            'Ahmed Ebada is a professor of artificial intelligence and computer science. For more than ten years he has worked on applied AI, digital twins and data-driven decision systems in industry and research, with a focus on anomaly detection, monitoring and explainable machine learning. He has held senior product and programme management roles in large industrial companies.',
            'Ahmed Ebada ist Professor für Künstliche Intelligenz und Informatik. Seit mehr als zehn Jahren arbeitet er in Industrie und Forschung an angewandter KI, digitalen Zwillingen und datengetriebenen Entscheidungssystemen, mit Schwerpunkt auf Anomalieerkennung, Monitoring und erklärbarem maschinellem Lernen. Er hatte leitende Positionen im Produkt- und Programmmanagement in großen Industrieunternehmen inne.',
            'أحمد عبادة أستاذ في الذكاء الاصطناعي وعلوم الحاسوب. على مدى أكثر من عشر سنوات عمل في الصناعة والبحث على الذكاء الاصطناعي التطبيقي والتوائم الرقمية وأنظمة القرار المعتمدة على البيانات، مع التركيز على اكتشاف الشذوذ والمراقبة والتعلّم الآلي القابل للتفسير. وقد شغل مناصب عليا في إدارة المنتجات والبرامج في شركات صناعية كبرى.'
        ),
    ];
    try {
        $dbFounder = \App\Models\TeamMember::where('visible', true)->where('is_founder', true)->orderBy('sort_order')->first();
        if ($dbFounder && !empty($dbFounder->photo) && mb_strlen((string) $dbFounder->bio_en) >= 80) {
            $dbRole = $lang === 'de' ? $dbFounder->role_de : ($lang === 'ar' ? $dbFounder->role_ar : $dbFounder->role_en);
            $dbBio  = $lang === 'de' ? $dbFounder->bio_de  : ($lang === 'ar' ? $dbFounder->bio_ar  : $dbFounder->bio_en);
            $isDefault = false;
            $founder = [
                'name'  => $dbFounder->name,
                'photo' => $dbFounder->photo,
                'linkedin' => $dbFounder->linkedin ?: null,
                'role'  => $dbRole ?: $dbFounder->role_en,
                'bio'   => $dbBio ?: $dbFounder->bio_en,
            ];
        }
    } catch (\Throwable $e) {
        // keep the default content if the team table is unavailable
    }
@endphp
<style>
    .hopn-founder { --f-line:rgba(255,255,255,0.14); --f-ink:#F1F5F9; --f-muted:#CBD5E1; --f-bg:rgba(255,255,255,0.03); --f-link:#8FB8CC; --f-tag:#94A3B8;
        border:1px solid var(--f-line); background:var(--f-bg); border-radius:16px; overflow:hidden; width:100%; max-width:420px; margin-inline:auto; text-align:start; }
    html[data-theme="light"] .hopn-founder { --f-line:#D7DEE3; --f-ink:#172331; --f-muted:#43515F; --f-bg:#FFFFFF; --f-link:#245B78; --f-tag:#526170; }
    .hopn-founder-photo { display:block; width:100%; aspect-ratio:1 / 0.66; object-fit:cover; object-position:50% 16%; background:#0B1B3A; }
    .hopn-founder-body { padding:22px 24px 24px; }
    .hopn-founder-tag { display:block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:var(--f-tag); margin-bottom:10px; }
    .hopn-founder-name { font-size:21px; font-weight:800; line-height:1.25; letter-spacing:-0.3px; color:var(--f-ink); margin:0 0 6px; }
    .hopn-founder-role { font-size:13.5px; line-height:1.5; color:var(--f-muted); margin:0 0 12px; }
    .hopn-founder-bio { font-size:14px; line-height:1.65; color:var(--f-muted); margin:0 0 16px; }
    .hopn-founder-links { display:flex; flex-wrap:wrap; gap:8px 20px; }
    .hopn-founder-links a { font-size:14px; font-weight:700; color:var(--f-link) !important; text-decoration:none; }
    .hopn-founder-links a:hover { text-decoration:underline; }
    @media (max-width:1079px) { .hopn-founder-photo { aspect-ratio:1 / 0.72; } }
    @media (max-width:520px) { .hopn-founder-body { padding:20px 20px 22px; } .hopn-founder-name { font-size:19px; } }
</style>
<aside class="hopn-founder" aria-label="{{ $t('Founder', 'Gründer', 'المؤسس') }}">
    <picture>
        @if($isDefault)<source type="image/webp" srcset="{{ asset('images/founder-ahmed-ebada.webp') }}">@endif
        <img class="hopn-founder-photo" src="{{ $founder['photo'] }}" alt="{{ $founder['name'] }}" width="547" height="361" decoding="async" fetchpriority="high">
    </picture>
    <div class="hopn-founder-body">
        <span class="hopn-founder-tag">{{ $t('Founder', 'Gründer', 'المؤسس') }}</span>
        <h2 class="hopn-founder-name">{{ $founder['name'] }}</h2>
        @if(!empty($founder['role']))<p class="hopn-founder-role">{!! $isDefault ? $founder['role'] : e($founder['role']) !!}</p>@endif
        <p class="hopn-founder-bio">{{ $founder['bio'] }}</p>
        <div class="hopn-founder-links">
            <a href="{{ route('team.index', ['lang' => $lang]) }}">{{ $t('Team page', 'Zur Teamseite', 'صفحة الفريق') }} →</a>
            @if(!empty($founder['linkedin']))
            <a href="{{ $founder['linkedin'] }}" target="_blank" rel="noopener noreferrer">LinkedIn →</a>
            @endif
        </div>
    </div>
</aside>
