@once
<style>
    .rs-sec { --rs-card:#0A0F1E; --rs-line:rgba(143,184,204,.22); --rs-ink:#FFFFFF; --rs-muted:#CBD5E1; --rs-soft:#94A3B8; --rs-accent:#9FE0F2; --rs-chip-bg:rgba(143,184,204,.12); --rs-chip-line:rgba(143,184,204,.3);
        background:#050A14; }
    html[data-theme="light"] .rs-sec { --rs-card:#FFFFFF; --rs-line:#D3DEE2; --rs-ink:#0F2230; --rs-muted:#43515F; --rs-soft:#5A6B79; --rs-accent:#245B78; --rs-chip-bg:#E6F0F4; --rs-chip-line:#BFD6DF;
        background:transparent; }
    .rs-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(min(100%,340px),1fr)); gap:22px; max-width:1040px; margin:0 auto; }
    .rs-item { display:flex; flex-direction:column; border:1px solid var(--rs-line); background:var(--rs-card); border-radius:16px; padding:16px; text-decoration:none; transition:transform .35s cubic-bezier(.16,1,.3,1), border-color .3s ease, box-shadow .35s ease; }
    html[data-theme="light"] .rs-item { box-shadow:0 1px 2px rgba(15,34,48,.05), 0 16px 34px -24px rgba(15,34,48,.28); }
    .rs-item:hover { transform:translateY(-4px); border-color:#8FB8CC; }
    .rs-media { width:100%; height:190px; object-fit:cover; border-radius:10px; display:block; margin-bottom:18px; }
    .rs-chip { align-self:flex-start; display:inline-block; font-size:10.5px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--rs-accent); background:var(--rs-chip-bg); border:1px solid var(--rs-chip-line); border-radius:999px; padding:3px 11px; margin-bottom:12px; }
    .rs-title { font-size:18px; font-weight:700; line-height:1.35; color:var(--rs-ink); margin:0 0 6px; }
    .rs-meta { font-size:12.5px; color:var(--rs-soft); margin:0 0 12px; }
    .rs-text { font-size:14px; line-height:1.7; color:var(--rs-muted); margin:0 0 14px; display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden; }
    .rs-more { margin-top:auto; padding-top:8px; font-size:13.5px; font-weight:700; color:var(--rs-accent); }
    .rs-h2 { font-size:clamp(20px,3vw,28px); font-weight:800; color:var(--rs-ink); margin:0 0 32px; text-align:center; }
    .rs-empty { color:var(--rs-soft); font-size:15px; text-align:center; margin:0; }
    .rs-partner { font-size:14px; font-weight:600; color:var(--rs-muted); text-decoration:none; }

    /* detail page */
    .rs-back { display:inline-block; font-size:13.5px; font-weight:600; color:var(--rs-soft); text-decoration:none; }
    .rs-back:hover { color:var(--rs-accent); }
    .rs-hero-media { width:100%; max-height:430px; height:auto; object-fit:cover; border-radius:16px; margin:28px 0; display:block; }
    .rs-project { color:var(--rs-accent); font-size:11.5px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; margin-bottom:14px; }
    .rs-h1 { color:var(--rs-ink); font-size:clamp(30px,5vw,54px); line-height:1.12; letter-spacing:-.02em; margin:0 0 18px; font-weight:800; }
    .rs-byline { color:var(--rs-soft); font-size:14px; margin:0; }
    .rs-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:34px; }
    html:root[data-theme] main .rs-btn:not(#hx) { display:inline-flex; align-items:center; padding:12px 22px; border-radius:10px; font-weight:700; font-size:14px; text-decoration:none; background:#245B78 !important; color:#FFFFFF !important; border:1.5px solid #245B78; transition:transform .25s ease, background .25s ease; }
    html:root[data-theme] main .rs-btn:not(#hx):hover { background:#1D4D66 !important; transform:translateY(-2px); }
    html:root[data-theme="light"] main .rs-btn--ghost:not(#hx) { background:#FFFFFF !important; color:#245B78 !important; border-color:#245B78; }
    html:root[data-theme="dark"] main .rs-btn--ghost:not(#hx) { background:transparent !important; color:#FFFFFF !important; border-color:rgba(159,224,242,.6); }
    html:root[data-theme="light"] main .rs-btn--ghost:not(#hx):hover { background:#E6F0F4 !important; }
    html:root[data-theme="dark"] main .rs-btn--ghost:not(#hx):hover { background:rgba(159,224,242,.12) !important; }
    @media (prefers-reduced-motion: reduce) { .rs-item { transition:none; } .rs-item:hover { transform:none; } }
</style>
@endonce
