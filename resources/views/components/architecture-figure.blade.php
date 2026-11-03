@props(['lang' => 'en'])
@php
    $t = fn ($en, $de, $ar) => $lang === 'ar' ? $ar : ($lang === 'de' ? $de : $en);
    // Names below come from the founder's brief (workstreams, research projects, flagship ventures).
    // Do not add claims, status or metrics here without the founder's confirmation.
    $stages = [
        ['n' => '1', 'label' => $t('Research', 'Forschung', 'البحث')],
        ['n' => '2', 'label' => $t('Innovation', 'Innovation', 'الابتكار')],
        ['n' => '3', 'label' => $t('Implementation', 'Umsetzung', 'التنفيذ')],
    ];
    $groups = [
        ['label' => $t('Research projects', 'Forschungsprojekte', 'المشاريع البحثية'), 'items' => ['SWARMind', 'SAFE-CARE', 'RefereeX AI']],
        ['label' => $t('Flagship ventures', 'Flaggschiff-Ventures', 'المشاريع الرئيسية'), 'items' => ['AI-Pass', 'Sovra AI', 'MunichTech EXPO', 'Eventify']],
    ];
@endphp
<style>
    .hopn-figure { --fig-line:rgba(255,255,255,0.18); --fig-ink:#F1F5F9; --fig-muted:#94A3B8; --fig-bg:rgba(255,255,255,0.03); max-width:1000px; margin:0 auto; }
    html[data-theme="light"] .hopn-figure { --fig-line:#C8D2D8; --fig-ink:#172331; --fig-muted:#526170; --fig-bg:#FFFFFF; }
    .hopn-figure-map { position:relative; display:grid; grid-template-columns:repeat(3,1fr); gap:28px; padding:18px 0 8px; }
    .hopn-figure-map::before { content:''; position:absolute; left:12%; right:12%; top:66px; border-top:1px solid var(--fig-line); }
    .hopn-figure-step { position:relative; z-index:1; text-align:center; }
    .hopn-figure-step .num { display:flex; align-items:center; justify-content:center; width:76px; height:76px; margin:0 auto 18px; border:1px solid var(--fig-line); border-radius:50%; background:var(--fig-bg); font-size:18px; font-weight:700; color:var(--fig-muted); box-shadow:0 0 0 8px var(--fig-bg); }
    .hopn-figure-step .name { display:block; font-size:20px; font-weight:700; color:var(--fig-ink); }
    .hopn-figure-step .descriptor { display:block; margin-top:7px; font-size:12px; line-height:1.5; color:var(--fig-muted); }
    .hopn-figure-groups { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:24px; margin-top:28px; }
    .hopn-figure-group { border-top:1.5px solid var(--fig-line); padding-top:14px; }
    .hopn-figure-group .gl { display:block; font-size:12px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:var(--fig-muted); margin-bottom:12px; }
    .hopn-figure-group ul { list-style:none; margin:0; padding:0; display:flex; flex-wrap:wrap; gap:10px; }
    .hopn-figure-group li { border:1px solid var(--fig-line); background:var(--fig-bg); border-radius:8px; padding:8px 14px; font-size:15px; font-weight:600; color:var(--fig-ink); }
    .hopn-figure-step:nth-child(2) .num { border-color:#8FB8CC; color:var(--fig-ink); }
    .hopn-figure-step:nth-child(3) .num { background:#245B78; border-color:#245B78; color:#FFFFFF; }
    @media (max-width:760px) {
        .hopn-figure-map { grid-template-columns:1fr; gap:22px; padding:0; }
        .hopn-figure-map::before { left:50%; right:auto; top:38px; bottom:38px; border-top:0; border-left:1px solid var(--fig-line); }
        .hopn-figure-groups { grid-template-columns:1fr; }
    }
</style>
<figure class="hopn-figure" style="margin-left:auto; margin-right:auto;">
    <div class="hopn-figure-map" role="list" aria-label="{{ $t('How we work', 'Wie wir arbeiten', 'كيف نعمل') }}">
        @foreach($stages as $stage)
            <div class="hopn-figure-step" role="listitem">
                <span class="num">{{ $stage['n'] }}</span>
                <span class="name">{{ $stage['label'] }}</span>
                <span class="descriptor">{{ $loop->index === 0 ? $t('Evidence and questions', 'Evidenz und Fragen', 'الأدلة والأسئلة') : ($loop->index === 1 ? $t('Models and prototypes', 'Modelle und Prototypen', 'النماذج والأوليات') : $t('Systems in use', 'Systeme im Einsatz', 'أنظمة قيد الاستخدام')) }}</span>
            </div>
        @endforeach
    </div>
    <div class="hopn-figure-groups">
        @foreach($groups as $group)
        <div class="hopn-figure-group">
            <span class="gl">{{ $group['label'] }}</span>
            <ul>
                @foreach($group['items'] as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
    <figcaption style="margin-top:20px; font-size:13px; color:var(--fig-muted); text-align:center;">
        {{ $t('Figure: how HOPn works and what it builds.', 'Abbildung: Wie HOPn arbeitet und was es entwickelt.', 'الشكل: كيف تعمل HOPn وما الذي تبنيه.') }}
    </figcaption>
</figure>
