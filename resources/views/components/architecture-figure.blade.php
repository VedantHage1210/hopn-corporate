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
    .hopn-figure-steps { display:grid; grid-template-columns:1fr 32px 1fr 32px 1fr; align-items:stretch; gap:0; }
    .hopn-figure-step { border:1px solid var(--fig-line); background:var(--fig-bg); border-radius:12px; padding:20px 22px; }
    .hopn-figure-step .num { display:block; font-size:12px; font-weight:700; letter-spacing:0.12em; color:var(--fig-muted); margin-bottom:6px; }
    .hopn-figure-step .name { display:block; font-size:20px; font-weight:700; color:var(--fig-ink); }
    .hopn-figure-arrow { display:flex; align-items:center; justify-content:center; color:var(--fig-muted); }
    html[dir="rtl"] .hopn-figure-arrow svg { transform:scaleX(-1); }
    .hopn-figure-groups { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:24px; margin-top:28px; }
    .hopn-figure-group { border-top:1.5px solid var(--fig-line); padding-top:14px; }
    .hopn-figure-group .gl { display:block; font-size:12px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:var(--fig-muted); margin-bottom:12px; }
    .hopn-figure-group ul { list-style:none; margin:0; padding:0; display:flex; flex-wrap:wrap; gap:10px; }
    .hopn-figure-group li { border:1px solid var(--fig-line); background:var(--fig-bg); border-radius:8px; padding:8px 14px; font-size:15px; font-weight:600; color:var(--fig-ink); }
    @media (max-width:760px) {
        .hopn-figure-steps { grid-template-columns:1fr; gap:0; }
        .hopn-figure-arrow { height:28px; transform:rotate(90deg); }
        html[dir="rtl"] .hopn-figure-arrow svg { transform:none; }
        .hopn-figure-groups { grid-template-columns:1fr; }
    }
</style>
<figure class="hopn-figure" style="margin-left:auto; margin-right:auto;">
    <div class="hopn-figure-steps" role="list" aria-label="{{ $t('How we work', 'Wie wir arbeiten', 'كيف نعمل') }}">
        @foreach($stages as $stage)
            <div class="hopn-figure-step" role="listitem">
                <span class="num">{{ $stage['n'] }}</span>
                <span class="name">{{ $stage['label'] }}</span>
            </div>
            @if(! $loop->last)
            <div class="hopn-figure-arrow" aria-hidden="true">
                <svg width="24" height="12" viewBox="0 0 24 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M1 6h21M17 1l5 5-5 5"/></svg>
            </div>
            @endif
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
