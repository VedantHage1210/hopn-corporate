@once
<style>
    /* Shared people-card design (same language as the homepage team cards): contour lines, round photo, lift on hover */
    .hopn-pgrid { display:grid; grid-template-columns:repeat(auto-fill,minmax(min(100%,250px),1fr)); gap:18px; }
    .hopn-pleaders { display:flex; flex-wrap:wrap; justify-content:center; gap:22px; max-width:820px; margin:0 auto; }
    .hopn-person { --p-line:rgba(143,184,204,.24); --p-bg:rgba(255,255,255,.04); --p-ring:rgba(143,184,204,.22); --p-ink:#F1F5F9; --p-muted:#CBD5E1; --p-role:#8FB8CC; --p-link:#9FE0F2; --p-tag:#9FE0F2; --p-tagbg:rgba(143,184,204,.14); --p-photo-line:rgba(159,224,242,.55);
        box-sizing:border-box; position:relative; overflow:hidden; display:flex; flex-direction:column; min-width:0; padding:26px; border-radius:18px; text-align:start;
        border:1px solid var(--p-line); background:var(--p-bg); transition:transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
    html[data-theme="light"] .hopn-person { --p-line:#D3DEE2; --p-bg:#FFFFFF; --p-ring:#B9CBD2; --p-ink:#0F2230; --p-muted:#43515F; --p-role:#245B78; --p-link:#245B78; --p-tag:#245B78; --p-tagbg:#E6F0F4; --p-photo-line:#9FB5C0;
        box-shadow:0 1px 2px rgba(15,34,48,.05), 0 14px 30px -24px rgba(15,34,48,.3); }
    .hopn-person::before, .hopn-person::after { content:""; position:absolute; pointer-events:none; border:1px solid var(--p-ring); border-radius:50%; opacity:.6; }
    .hopn-person::before { --r:-18deg; width:150%; height:86%; left:-25%; top:8%; transform:rotate(var(--r)); animation:hopnPeopleDrift 18s ease-in-out infinite; }
    .hopn-person::after  { --r:26deg;  width:125%; height:110%; left:-12%; top:-8%; transform:rotate(var(--r)); animation:hopnPeopleDrift 23s ease-in-out infinite reverse; }
    @keyframes hopnPeopleDrift { 0%,100% { transform:translate3d(0,0,0) rotate(var(--r)); } 50% { transform:translate3d(12px,-8px,0) rotate(calc(var(--r) + 2.5deg)); } }
    .hopn-person:hover { transform:translateY(-4px); border-color:#8FB8CC; box-shadow:0 18px 34px -18px rgba(11,53,73,.45); }
    .hopn-person > * { position:relative; z-index:1; }
    .hopn-person-photo { width:96px; height:96px; border-radius:50%; object-fit:cover; object-position:50% 20%; border:2px solid var(--p-photo-line); display:flex; align-items:center; justify-content:center; margin-bottom:18px; background:linear-gradient(160deg,#0B3549,#245B78); color:#fff; font-size:32px; font-weight:800; flex:none; overflow:hidden; }
    img.hopn-person-photo { display:block; }
    .hopn-person-tag { align-self:flex-start; font-size:11px; font-weight:700; letter-spacing:.06em; color:var(--p-tag); background:var(--p-tagbg); border-radius:999px; padding:3px 11px; margin-bottom:10px; }
    .hopn-person-name { font-size:18px; font-weight:800; letter-spacing:-.01em; line-height:1.25; color:var(--p-ink); margin:0 0 6px; }
    .hopn-person-role { font-size:13.5px; font-weight:600; line-height:1.5; color:var(--p-role); margin:0 0 10px; }
    .hopn-person-bio { font-size:13.5px; line-height:1.65; color:var(--p-muted); margin:0 0 14px; display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden; }
    .hopn-person-link { margin-top:auto; display:inline-flex; align-items:center; gap:7px; font-size:13px; font-weight:700; color:var(--p-link) !important; text-decoration:none; }
    .hopn-person-link svg { width:15px; height:15px; }
    .hopn-person-link:hover { text-decoration:underline; }

    /* Founder / co-founder variant: a little larger, same design */
    .hopn-person--lead { flex:0 1 380px; padding:32px 30px; }
    .hopn-person--lead .hopn-person-photo { width:128px; height:128px; font-size:44px; border-width:3px; box-shadow:0 0 0 6px var(--p-tagbg); }
    .hopn-person--lead .hopn-person-name { font-size:22px; }
    .hopn-person--lead .hopn-person-role { font-size:14.5px; }
    .hopn-person--lead .hopn-person-bio { font-size:14.5px; -webkit-line-clamp:6; }
    @media (max-width:820px) { .hopn-person--lead { flex-basis:100%; max-width:440px; } }
    @media (prefers-reduced-motion: reduce) { .hopn-person, .hopn-person::before, .hopn-person::after { animation:none; transition:none; } .hopn-person:hover { transform:none; } }
</style>
@endonce
