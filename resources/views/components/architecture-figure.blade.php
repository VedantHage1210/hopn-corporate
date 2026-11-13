@props(['lang' => 'en'])
@php
    $t = fn ($en, $de, $ar) => $lang === 'ar' ? $ar : ($lang === 'de' ? $de : $en);
    // Names below come from the founder's brief (workstreams, research projects, flagship ventures).
    // Do not add claims, status or metrics here without the founder's confirmation.
    $stages = [
        ['n' => '1', 'label' => $t('Research', 'Forschung', 'البحث'),
         'desc' => $t('Evidence and questions', 'Evidenz und Fragen', 'الأدلة والأسئلة'),
         'icon' => '<circle cx="11" cy="11" r="6.5"/><path d="M16 16l5 5"/>'],
        ['n' => '2', 'label' => $t('Innovation', 'Innovation', 'الابتكار'),
         'desc' => $t('Models and prototypes', 'Modelle und Prototypen', 'النماذج والأوليات'),
         'icon' => '<path d="M12 3L4 7.5v9L12 21l8-4.5v-9L12 3z"/><path d="M12 12L4 7.5M12 12l8-4.5M12 12v9"/>'],
        ['n' => '3', 'label' => $t('Implementation', 'Umsetzung', 'التنفيذ'),
         'desc' => $t('Systems in use', 'Systeme im Einsatz', 'أنظمة قيد الاستخدام'),
         'icon' => '<circle cx="12" cy="12" r="9"/><path d="M7.5 12.5l3 3 6-7"/>'],
    ];
    $groups = [
        ['label' => $t('Research projects', 'Forschungsprojekte', 'المشاريع البحثية'), 'items' => ['SWARMind', 'SAFE-CARE', 'RefereeX AI']],
        ['label' => $t('Flagship ventures', 'Flaggschiff-Ventures', 'المشاريع الرئيسية'), 'items' => ['AI-Pass', 'Sovra AI', 'MunichTech EXPO', 'Eventify']],
    ];
@endphp
<style>
    .hopn-figure { --fig-line:rgba(159,224,242,.28); --fig-ink:#F1F5F9; --fig-muted:#A8B7C6; --fig-bg:rgba(255,255,255,.045); --fig-icon:#9FE0F2; --fig-dot:#8FB8CC;
        position:relative; max-width:1000px; margin:0 auto; }
    html[data-theme="light"] .hopn-figure { --fig-line:#BCCED7; --fig-ink:#0F2230; --fig-muted:#526170; --fig-bg:#FFFFFF; --fig-icon:#245B78; --fig-dot:#245B78; }

    /* ---- stage pipeline ---- */
    .hopn-figure-map { position:relative; display:grid; grid-template-columns:repeat(3,1fr); gap:28px; padding:18px 0 8px; }
    .hopn-figure-track { position:absolute; left:16.66%; right:16.66%; top:59px; height:2px; background:var(--fig-line); border-radius:2px; }
    .hopn-figure-track::after { content:''; position:absolute; inset:0; border-radius:2px; background:linear-gradient(90deg,#2F7FA6,#9FE0F2); transform-origin:0 50%; transform:scaleX(0); }
    .is-visible .hopn-figure-track::after { animation:figDraw 1.6s cubic-bezier(.16,1,.3,1) .35s forwards; }
    .hopn-figure-track i { position:absolute; top:-3px; left:0; width:8px; height:8px; border-radius:50%; background:#FFFFFF; box-shadow:0 0 12px 3px rgba(159,224,242,.85); opacity:0; }
    .is-visible .hopn-figure-track i { animation:figPulse 4s ease-in-out 2.2s infinite; }
    @keyframes figDraw { to { transform:scaleX(1); } }
    @keyframes figPulse { 0% { left:0; opacity:0; } 10% { opacity:1; } 90% { opacity:1; } 100% { left:calc(100% - 8px); opacity:0; } }

    .hopn-figure-step { position:relative; z-index:1; text-align:center; opacity:0; transform:translateY(14px); }
    .is-visible .hopn-figure-step { animation:figIn .8s cubic-bezier(.16,1,.3,1) forwards; animation-delay:calc(var(--i) * .2s + .1s); }
    @keyframes figIn { to { opacity:1; transform:none; } }
    .hopn-figure-step .num { position:relative; display:flex; align-items:center; justify-content:center; width:84px; height:84px; margin:0 auto 18px; border-radius:50%;
        background:var(--fig-bg); border:1.5px solid var(--fig-line); color:var(--fig-icon); box-shadow:0 14px 28px -16px rgba(11,53,73,.55); transition:transform .35s cubic-bezier(.16,1,.3,1), border-color .3s ease; }
    .hopn-figure-step:hover .num { transform:translateY(-4px) scale(1.04); border-color:#8FB8CC; }
    .hopn-figure-step .num svg { width:32px; height:32px; fill:none; stroke:currentColor; stroke-width:1.7; stroke-linecap:round; stroke-linejoin:round; }
    .hopn-figure-step .num::after { content:''; position:absolute; inset:-8px; border-radius:50%; border:1px solid rgba(143,184,204,.55); opacity:0; }
    .is-visible .hopn-figure-step .num::after { animation:figRing 3.4s ease-out infinite; animation-delay:calc(var(--i) * .6s + 1.2s); }
    @keyframes figRing { 0% { transform:scale(.88); opacity:.7; } 100% { transform:scale(1.28); opacity:0; } }
    .hopn-figure-step .badge { position:absolute; top:-4px; right:-4px; width:26px; height:26px; border-radius:50%; background:#245B78; border:2px solid var(--fig-bg); font-size:12px; font-weight:800; display:flex; align-items:center; justify-content:center; }
    .hopn-figure-step:last-child .num { background:linear-gradient(145deg,#2F7FA6,#0B3549); border-color:#2F7FA6; color:#FFFFFF; box-shadow:0 0 0 6px rgba(47,127,166,.16), 0 18px 34px -14px rgba(11,53,73,.8); }
    .hopn-figure-step .name { display:block; font-size:20px; font-weight:700; color:var(--fig-ink); }
    .hopn-figure-step .descriptor { display:block; margin-top:7px; font-size:13px; line-height:1.5; color:var(--fig-muted); }

    /* ---- connectors from stages to the two groups ---- */
    .hopn-figure-groups { position:relative; display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:22px; margin-top:52px; }
    .hopn-figure-groups::before { content:''; position:absolute; left:25%; right:25%; top:-24px; border-top:1.5px dashed var(--fig-line); }
    .hopn-figure-groups::after { content:''; position:absolute; left:50%; top:-48px; height:24px; border-left:1.5px dashed var(--fig-line); }
    .hopn-figure-group { position:relative; border:1px solid var(--fig-line); background:var(--fig-bg); border-radius:16px; padding:22px 22px 20px; overflow:hidden; transition:border-color .3s ease, transform .35s cubic-bezier(.16,1,.3,1); }
    .hopn-figure-group:hover { border-color:#8FB8CC; transform:translateY(-3px); }
    .hopn-figure-group::before { content:''; position:absolute; left:50%; top:-24px; height:24px; border-left:1.5px dashed var(--fig-line); }
    .hopn-figure-group::after { content:''; position:absolute; inset:0 0 auto 0; height:3px; background:linear-gradient(90deg,#2F7FA6,#9FE0F2); opacity:.85; }
    .hopn-figure-group .gl { display:block; font-size:12px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:var(--fig-muted); margin-bottom:14px; }
    .hopn-figure-group ul { list-style:none; margin:0; padding:0; display:flex; flex-wrap:wrap; gap:10px; }
    .hopn-figure-group li { display:inline-flex; align-items:center; gap:9px; border:1px solid var(--fig-line); background:var(--fig-bg); border-radius:999px; padding:8px 16px 8px 13px; font-size:15px; font-weight:600; color:var(--fig-ink);
        opacity:0; transform:translateY(8px); transition:border-color .25s ease, box-shadow .3s ease, transform .3s ease; }
    .is-visible .hopn-figure-group li { animation:figIn .6s cubic-bezier(.16,1,.3,1) forwards; animation-delay:calc(var(--k) * .08s + .9s); }
    .hopn-figure-group li::before { content:''; width:7px; height:7px; border-radius:50%; background:var(--fig-dot); box-shadow:0 0 0 3px rgba(143,184,204,.2); }
    .hopn-figure-group li:hover { border-color:#8FB8CC; box-shadow:0 8px 20px -10px rgba(47,127,166,.7); }
    .hopn-figure-caption { margin-top:26px; font-size:13px; color:var(--fig-muted); text-align:center; }

    /* keep text readable regardless of the site's light-theme colour rules */
    html:root[data-theme] main .hopn-figure .name:not(#hx), html:root[data-theme] main .hopn-figure li:not(#hx) { color:var(--fig-ink) !important; }
    html:root[data-theme] main .hopn-figure .descriptor:not(#hx), html:root[data-theme] main .hopn-figure .gl:not(#hx), html:root[data-theme] main .hopn-figure-caption:not(#hx) { color:var(--fig-muted) !important; }
    html:root[data-theme] main .hopn-figure .badge:not(#hx), html:root[data-theme] main .hopn-figure-step:last-child .num:not(#hx) { color:#FFFFFF !important; }

    @media (max-width:760px) {
        .hopn-figure-map { grid-template-columns:1fr; gap:26px; padding:0; }
        .hopn-figure-track { left:50%; right:auto; top:42px; bottom:62px; width:2px; height:auto; }
        .hopn-figure-track i { display:none; }
        .hopn-figure-track::after { transform-origin:50% 0; transform:scaleY(0); }
        @keyframes figDraw { to { transform:scaleY(1); } }
        .hopn-figure-groups { grid-template-columns:1fr; margin-top:30px; }
        .hopn-figure-groups::before, .hopn-figure-groups::after, .hopn-figure-group::before { display:none; }
    }
    @media (prefers-reduced-motion: reduce) {
        .hopn-figure-step, .hopn-figure-group li { opacity:1; transform:none; animation:none !important; }
        .hopn-figure-track::after { transform:none; animation:none !important; }
        .hopn-figure-track i, .hopn-figure-step .num::after { display:none; }
    }
</style>
<figure class="hopn-figure" style="margin-left:auto; margin-right:auto;">
    <div class="hopn-figure-map" role="list" aria-label="{{ $t('How we work', 'Wie wir arbeiten', 'كيف نعمل') }}">
        <div class="hopn-figure-track" aria-hidden="true"><i></i></div>
        @foreach($stages as $stage)
            <div class="hopn-figure-step" role="listitem" style="--i:{{ $loop->index }};">
                <span class="num">
                    <svg viewBox="0 0 24 24" aria-hidden="true">{!! $stage['icon'] !!}</svg>
                    <span class="badge">{{ $stage['n'] }}</span>
                </span>
                <span class="name">{{ $stage['label'] }}</span>
                <span class="descriptor">{{ $stage['desc'] }}</span>
            </div>
        @endforeach
    </div>
    <div class="hopn-figure-groups">
        @foreach($groups as $group)
        <div class="hopn-figure-group">
            <span class="gl">{{ $group['label'] }}</span>
            <ul>
                @foreach($group['items'] as $item)
                <li style="--k:{{ $loop->index + ($loop->parent->index * 3) }};">{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
    <figcaption class="hopn-figure-caption">
        {{ $t('Figure: how HOPn works and what it builds.', 'Abbildung: Wie HOPn arbeitet und was es entwickelt.', 'الشكل: كيف تعمل HOPn وما الذي تبنيه.') }}
    </figcaption>
</figure>
