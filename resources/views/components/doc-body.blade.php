@props(['body' => '', 'variant' => 'sections'])
@php
    $doc = \App\Support\RichText::sections($body);
@endphp
@once
<style>
    .hopn-doc { --d-ink:#F1F5F9; --d-muted:#CBD5E1; --d-line:rgba(143,184,204,.2); --d-card:rgba(255,255,255,.035); --d-accent:#8FB8CC; --d-num-bg:#245B78; --d-num-ink:#FFFFFF; --d-tint:rgba(143,184,204,.08);
        color:var(--d-muted); font-size:16px; line-height:1.75; }
    html[data-theme="light"] .hopn-doc { --d-ink:#0F2230; --d-muted:#43515F; --d-line:#D3DEE2; --d-card:#FFFFFF; --d-accent:#245B78; --d-tint:#EAF2F5; }
    .hopn-doc a { color:var(--d-accent) !important; text-decoration:underline; text-underline-offset:3px; }
    .hopn-doc strong { color:var(--d-ink); font-weight:700; }
    .hopn-doc p { margin:0 0 14px; }
    .hopn-doc p:last-child { margin-bottom:0; }
    .hopn-doc-lead { font-size:clamp(18px,2vw,21px); line-height:1.65; color:var(--d-ink); padding-bottom:40px; border-bottom:1px solid var(--d-line); }
    .hopn-doc-sec { display:grid; grid-template-columns:minmax(180px,.34fr) minmax(0,1fr); gap:20px 56px; padding:40px 0; border-bottom:1px solid var(--d-line); }
    .hopn-doc-sec:last-child { border-bottom:0; }
    .hopn-doc-sec > h2 { margin:0; font-size:clamp(20px,2.2vw,26px); line-height:1.25; font-weight:800; letter-spacing:-.02em; color:var(--d-ink); position:sticky; top:96px; align-self:start; }

    /* Numbered steps: the content really is a sequence */
    .hopn-doc-sec[data-kind="steps"] ol { list-style:none; margin:0; padding:0; counter-reset:dstep; display:grid; gap:14px; }
    .hopn-doc-sec[data-kind="steps"] ol > li { counter-increment:dstep; position:relative; padding:20px 22px 20px 70px; border:1px solid var(--d-line); background:var(--d-card); border-radius:14px; transition:border-color .25s ease, transform .25s ease; }
    .hopn-doc-sec[data-kind="steps"] ol > li:hover { border-color:var(--d-accent); transform:translateX(3px); }
    .hopn-doc-sec[data-kind="steps"] ol > li::before { content:counter(dstep); position:absolute; left:20px; top:20px; width:34px; height:34px; border-radius:50%; background:var(--d-num-bg); color:var(--d-num-ink); font-weight:800; font-size:15px; display:flex; align-items:center; justify-content:center; }
    .hopn-doc li > strong:first-child { display:block; margin-bottom:2px; font-size:16px; }

    /* Bullet lists */
    .hopn-doc-sec ul { list-style:none; margin:0; padding:0; display:grid; gap:12px; }
    .hopn-doc-sec ul > li { position:relative; padding:16px 18px 16px 44px; border:1px solid var(--d-line); background:var(--d-card); border-radius:12px; }
    .hopn-doc-sec ul > li::before { content:""; position:absolute; left:18px; top:23px; width:10px; height:10px; border-radius:50%; background:var(--d-accent); box-shadow:0 0 0 4px var(--d-tint); }
    .hopn-doc-sec ol:not(:first-child), .hopn-doc-sec ul:not(:first-child) { margin-top:16px; }

    html[dir="rtl"] .hopn-doc-sec[data-kind="steps"] ol > li, .hopn-doc[dir="rtl"] .hopn-doc-sec[data-kind="steps"] ol > li { padding:20px 70px 20px 22px; }
    .hopn-doc[dir="rtl"] .hopn-doc-sec[data-kind="steps"] ol > li::before { left:auto; right:20px; }
    .hopn-doc[dir="rtl"] .hopn-doc-sec ul > li { padding:16px 44px 16px 18px; }
    .hopn-doc[dir="rtl"] .hopn-doc-sec ul > li::before { left:auto; right:18px; }


    /* Stacked variant: for narrow cards, articles and job posts (heading above content) */
    .hopn-doc--stack { font-size:15px; }
    .hopn-doc--stack .hopn-doc-lead { font-size:inherit; color:inherit; padding-bottom:0; border-bottom:0; }
    .hopn-doc--stack .hopn-doc-sec { grid-template-columns:minmax(0,1fr); gap:12px; padding:22px 0 0; border-bottom:0; }
    .hopn-doc--stack .hopn-doc-lead + .hopn-doc-sec, .hopn-doc--stack .hopn-doc-sec:first-child { padding-top:0; }
    .hopn-doc--stack .hopn-doc-sec > h2 { position:static; font-size:17px; letter-spacing:-.01em; }
    .hopn-doc--stack .hopn-doc-sec[data-kind="steps"] ol > li { padding:14px 16px 14px 58px; }
    .hopn-doc--stack .hopn-doc-sec[data-kind="steps"] ol > li::before { left:14px; top:14px; width:30px; height:30px; font-size:14px; }
    .hopn-doc--stack .hopn-doc-sec ul > li { padding:12px 14px 12px 38px; }
    .hopn-doc--stack .hopn-doc-sec ul > li::before { left:14px; top:19px; }
    .hopn-doc--stack.hopn-doc[dir="rtl"] .hopn-doc-sec[data-kind="steps"] ol > li { padding:14px 58px 14px 16px; }
    .hopn-doc--stack h3, .hopn-doc--stack h4 { color:var(--d-ink); margin:18px 0 8px; font-size:16px; }
    .hopn-doc h3, .hopn-doc h4 { color:var(--d-ink); margin:20px 0 8px; font-size:17px; }
    .hopn-doc blockquote { margin:16px 0; padding:12px 18px; border-inline-start:3px solid var(--d-accent); background:var(--d-tint); border-radius:0 10px 10px 0; }
    .hopn-doc table { width:100%; border-collapse:collapse; font-size:14px; } .hopn-doc th, .hopn-doc td { border:1px solid var(--d-line); padding:8px 12px; text-align:start; }
    .hopn-doc img { max-width:100%; height:auto; border-radius:12px; }
    .hopn-doc code { background:var(--d-tint); padding:2px 6px; border-radius:6px; font-size:.9em; }


    /* "Label: link" paragraphs rendered as action buttons */
    .hopn-doc-actions { display:flex; flex-direction:column; gap:12px; margin:6px 0 14px; max-width:560px; }
    .hopn-doc a.hopn-doc-action { display:flex; align-items:center; justify-content:space-between; gap:18px; padding:16px 22px; border-radius:12px; background:#245B78; color:#FFFFFF !important; font-size:15px; font-weight:700; line-height:1.4; text-decoration:none; box-shadow:0 10px 24px -14px rgba(15,34,48,.55); transition:transform .25s ease, box-shadow .25s ease, background-color .25s ease; }
    .hopn-doc a.hopn-doc-action:hover { background:#1D4D66; transform:translateY(-2px); box-shadow:0 16px 30px -14px rgba(15,34,48,.6); }
    html:root[data-theme] main .hopn-doc a.hopn-doc-action:not(#hx), html:root[data-theme] main .hopn-doc a.hopn-doc-action:not(#hx):visited, html:root[data-theme] main .hopn-doc a.hopn-doc-action:not(#hx) span { color:#FFFFFF !important; text-decoration:none !important; }
    html:root[data-theme] main .hopn-doc a.hopn-doc-action:not(#hx):hover { background:#1D4D66 !important; }
    html:root[data-theme] main .hopn-doc a.hopn-doc-action:not(#hx) { background:#245B78 !important; }
    .hopn-doc a.hopn-doc-action svg { flex:none; stroke:#FFFFFF; transition:transform .25s ease; }
    .hopn-doc a.hopn-doc-action:hover svg { transform:translateX(4px); }
    [dir="rtl"] .hopn-doc a.hopn-doc-action:hover svg, .hopn-doc[dir="rtl"] a.hopn-doc-action:hover svg { transform:scaleX(-1) translateX(4px); }

    @media (max-width:820px) {
        .hopn-doc-sec { grid-template-columns:minmax(0,1fr); gap:16px; padding:32px 0; }
        .hopn-doc-sec > h2 { position:static; }
    }
    @media (prefers-reduced-motion: reduce) { .hopn-doc-sec[data-kind="steps"] ol > li { transition:none; } .hopn-doc-sec[data-kind="steps"] ol > li:hover { transform:none; } }
</style>
@endonce
<div {{ $attributes->class(['hopn-doc', 'hopn-doc--stack' => $variant === 'stack']) }}>
    @if($doc['lead'] !== '')
        <div @class(['hopn-doc-lead' => count($doc['sections']) > 0])>{!! \App\Support\RichText::actionLinks($doc['lead']) !!}</div>
    @endif
    @foreach($doc['sections'] as $sec)
        <section class="hopn-doc-sec hopn-reveal" data-kind="{{ $sec['kind'] }}">
            <h2>{{ $sec['title'] }}</h2>
            <div class="hopn-doc-body">{!! \App\Support\RichText::actionLinks($sec['html']) !!}</div>
        </section>
    @endforeach
</div>
