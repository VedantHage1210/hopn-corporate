/* HOPn polish layer. Progressive enhancement only: the site works without it.
   1. Image banners on listing cards that have no image (never repeats an image on a page).
   2. Soft animated background layers on sections.
   3. Page-specific background videos (always playing).
   4. Pointer tilt on cards (fine pointers only). */
(function () {
  'use strict';
  try {
    var path = location.pathname || '';
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var fine = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    function P(re) { return re.test(path); }

    /* ---- image library: key -> photo (everything else falls back to an illustration) ---- */
    var PHOTOS = {
      'ai': 'ai.jpg', 'consulting': 'consulting.jpg', 'business': 'business.jpg', 'education': 'education.jpg', 'research': 'research.jpg',
      'talent': 'talent.jpg', 'lab': 'innovation-lab.jpg', 'digital-twin': 'technology.jpg', 'robotics': 'technical-experts.jpg',
      'startups': 'growth.jpg', 'insights': 'tablet.jpg', 'events': 'workshop.jpg',
      'ai-robot': 'ai-robot.jpg', 'data-center': 'data-center.jpg', 'manufacturing': 'manufacturing.jpg', 'oem': 'oem.jpg'
    };
    function ART(key) { return PHOTOS[key] ? '/images/photos/' + PHOTOS[key] : '/images/illustrations/' + key + '.svg'; }

    /* ---- keyword rules (all matches are collected, first unused wins) ---- */
    var RULES = [
      [/oem|electronic|hardware|embedded|support/i, 'oem'], [/manufactur|production|machin|cnc|factory|plant/i, 'manufacturing'],
      [/data (engineering|platform|pipeline|infrastructure)|lakehouse|warehouse/i, 'data-center'], [/robot|automation/i, 'robotics'],
      [/\bai\b|artificial|machine learning|llm|intellig/i, 'ai'], [/twin|simulation/i, 'digital-twin'],
      [/consult|strateg|govern|advis|expert/i, 'consulting'], [/research|science|academ|univers|institute|publication/i, 'research'],
      [/talent|hiring|career|recruit|people|job/i, 'talent'], [/train|educat|learning|skill|workshop|course|academy/i, 'education'],
      [/startup|invest|venture|capital|fund/i, 'startups'], [/health|medic|pharma|bio/i, 'health'],
      [/energy|utilit|power|grid|climate/i, 'energy'], [/mobil|auto|transport|logist|vehicle/i, 'mobility'],
      [/financ|bank|business|insur|enterprise/i, 'business'], [/lab|innovat|domain/i, 'lab'],
      [/event|conference|summit|webinar/i, 'events'], [/news|insight|blog|report|press|article/i, 'insights']
    ];
    var FAMILY = [
      [/\/startups/, ['startups', 'business', 'lab', 'consulting']], [/\/investors/, ['business', 'startups', 'consulting', 'insights', 'research']],
      [/\/industries/, ['manufacturing', 'energy', 'health', 'mobility', 'business']], [/\/events/, ['events', 'education', 'talent']],
      [/\/(newsroom|insights|blog|news)/, ['insights', 'research', 'ai', 'business']], [/\/partners/, ['business', 'talent', 'research', 'consulting']],
      [/\/apps/, ['ai', 'digital-twin', 'robotics', 'data-center']], [/\/innovation/, ['lab', 'research', 'ai', 'robotics']],
      [/\/consulting/, ['consulting', 'talent', 'business']], [/\/(services|solutions|catalog)/, ['ai', 'consulting', 'digital-twin', 'robotics', 'research']],
      [/\/research/, ['research', 'lab', 'ai']], [/\/careers/, ['talent', 'education', 'business']], [/\/labs/, ['lab', 'research', 'robotics']],
      [/\/case-studies/, ['business', 'manufacturing', 'ai']], [/\/products/, ['digital-twin', 'ai', 'robotics', 'data-center']]
    ];
    var POOL = ['ai', 'consulting', 'business', 'education', 'research', 'talent', 'lab', 'digital-twin', 'robotics', 'startups', 'insights', 'ai-robot', 'data-center', 'manufacturing', 'oem'];

    /* ---- page-specific image sets ---- */
    var TWIN = ['twin-product', 'twin-factory', 'twin-supply', 'twin-energy', 'twin-building', 'twin-health', 'twin-simulation', 'twin-data'];
    var TWIN_RULES = [
      [/product/i, 'twin-product'], [/factory|plant|manufact|production/i, 'twin-factory'], [/supply|logist|inventory|warehouse/i, 'twin-supply'],
      [/energy|grid|utilit|power/i, 'twin-energy'], [/build|infrastructure|city|facility|construction|real estate/i, 'twin-building'],
      [/health|hospital|patient|medical/i, 'twin-health'], [/simulat|scenario|what-if|predict/i, 'twin-simulation'], [/data|platform|integration|iot/i, 'twin-data']
    ];
    var ENG_POOL = ['ai-robot', 'data-center', 'manufacturing', 'oem'];
    var ENG_RULES = [
      [/oem|electronic|hardware|embedded|support/i, 'oem'], [/manufactur|production|machin|cnc|factory/i, 'manufacturing'],
      [/data|pipeline|platform|analytics/i, 'data-center'], [/\bai\b|llm|machine learning|application|intellig/i, 'ai-robot']
    ];
    var MODE = null;
    if (P(/\/digital-twins/)) { MODE = { rules: TWIN_RULES, pool: TWIN }; }
    else if (P(/\/engineering/)) { MODE = { rules: ENG_RULES, pool: ENG_POOL }; }

    /* ---- page videos: one different clip per page ---- */
    var HERO_VIDEO = [
      [/\/digital-twins/, 'twin-data'], [/\/engineering/, 'team-whiteboard'], [/\/products/, 'product-review'], [/\/apps/, 'coworking'],
      [/\/catalog/, 'data-dashboard'], [/\/innovation/, 'office-wide'], [/\/programs/, 'lecture-hall'], [/\/training/, 'training-audience'],
      [/\/workshops/, 'workshop-seminar'], [/\/events/, 'events-conference'], [/\/startups/, 'startup-pitch'], [/\/investors/, 'investor-meeting'],
      [/\/partners/, 'partners-meeting'], [/\/research/, 'research-library'], [/\/labs/, 'research-lab'], [/\/consulting/, 'consulting-team'],
      [/\/(newsroom|insights)/, 'panel-talk'], [/\/(services|solutions)/, 'meeting-room'], [/\/case-studies/, 'meeting-room'],
      [/\/industries/, 'hero-tech'], [/\/careers/, 'talent-hiring'], [/\/(about|team)/, 'about-team']
    ];
    var NO_BANNER = P(/\/(training|programs|about|team)/);   /* these pages show only images uploaded in the admin panel */
    var isPartners = P(/\/partners/);

    /* ---- unique image selection ---- */
    var used = {};
    function take(key) { used[key] = (used[key] || 0) + 1; return key; }
    function choose(head, body) {
      var cands = [], pool = MODE ? MODE.pool : POOL, rules = MODE ? MODE.rules : RULES;
      [head, body].forEach(function (text) { rules.forEach(function (r) { if (r[0].test(text) && cands.indexOf(r[1]) === -1) { cands.push(r[1]); } }); });
      if (!MODE) { FAMILY.forEach(function (f) { if (f[0].test(path)) { f[1].forEach(function (k) { if (cands.indexOf(k) === -1) { cands.push(k); } }); } }); }
      pool.forEach(function (k) { if (cands.indexOf(k) === -1) { cands.push(k); } });
      for (var n = 0; n < cands.length; n++) { if (!used[cands[n]]) { return take(cands[n]); } }
      var best = cands[0], bc = 1e9;
      cands.forEach(function (k) { if ((used[k] || 0) < bc) { bc = used[k] || 0; best = k; } });
      return take(best);
    }

    /* ---------- 1. Card image banners ---------- */
    var CARD_SEL = 'main a.hopn-lift-card, main div.hopn-lift-card, main .hopn-lift-card-nobg, main .card-panel, main .hopn-service-card, main .hopn-product-card, main .hopn-industry-card, main article';
    var PEOPLE_RE = /\b(team|people|leadership|founders?|advisors?|board|speakers?|mentors?)\b/i;

    function isPeopleCard(card) {
      if (P(/\/team/) || card.className.indexOf('team') !== -1) { return true; }
      if (card.querySelector('a[href*="linkedin"]')) { return true; }
      var imgs = card.querySelectorAll('img');
      for (var i = 0; i < imgs.length; i++) {
        var br = window.getComputedStyle(imgs[i]).borderRadius || '';
        if (br.indexOf('50%') !== -1 || parseFloat(br) >= 40) { return true; }
      }
      var sec = card.closest('section');
      if (sec) { var h = sec.querySelector('h1, h2'); if (h && PEOPLE_RE.test(h.textContent)) { return true; } }
      return false;
    }
    function hasRealMedia(card) {
      var imgs = card.querySelectorAll('img');
      for (var i = 0; i < imgs.length; i++) {
        if (imgs[i].closest('.hx-art')) { return true; }
        var r = imgs[i].getBoundingClientRect();
        if (r.width >= 110 && r.height >= 70) { return true; }
        if (isPartners) { return true; }
      }
      return !!card.querySelector('video, picture');
    }
    function growMedia(card) {
      if (card.closest('.hx-card, .hx-talent') || card.classList.contains('hopn-strategy-card')) { return; }
      var kids = card.children;
      for (var i = 0; i < Math.min(kids.length, 2); i++) {
        var c = kids[i], im = c.tagName === 'IMG' ? c : (c.querySelector ? c.querySelector('img') : null);
        if (!im) { continue; }
        var r = c.getBoundingClientRect();
        if (r.width >= 150 && r.height >= 70 && r.height < 230) { c.style.height = '230px'; c.style.overflow = 'hidden'; if (c.tagName === 'IMG') { c.style.objectFit = 'cover'; c.style.width = '100%'; } }
        return;
      }
    }
    function markGrids() {
      Array.prototype.forEach.call(document.querySelectorAll(CARD_SEL), function (card) {
        var g = card.parentElement;
        if (!g || g.dataset.hxGrid) { return; }
        g.dataset.hxGrid = '1';
        if (g.matches('.hx-grid-2, .hx-grid-3, .hopn-strategy-grid, .hx-talent') || g.closest('.hx-hero')) { return; }
        if (window.getComputedStyle(g).display.indexOf('grid') === -1) { return; }
        var n = 0;
        Array.prototype.forEach.call(g.children, function (c) { if (c.matches(CARD_SEL)) { n++; } });
        if (n >= 3 && n !== 4) { g.classList.add('hx-grid3'); } else if (n === 4) { g.classList.add('hx-grid2x'); }
        Array.prototype.forEach.call(g.children, function (c) { if (c.matches(CARD_SEL)) { growMedia(c); } });
      });
    }
    function enhanceCard(card) {
      if (card.dataset.hxArt) { return; }
      card.dataset.hxArt = '1';
      if (NO_BANNER) { return; }
      if (card.closest('.hx-card, header, footer, nav, form, .hopn-homepage section.hx-hero')) { return; }
      if (!card.querySelector('h2, h3, h4')) { return; }
      var text = (card.textContent || '').replace(/\s+/g, ' ').trim();
      if (text.length < 24) { return; }
      var rect = card.getBoundingClientRect();
      if (rect.width < 200 || rect.width > 760 || rect.height < 100) { return; }
      var cs = window.getComputedStyle(card);
      if (cs.display.indexOf('grid') !== -1 || (cs.display.indexOf('flex') !== -1 && cs.flexDirection.indexOf('row') === 0)) { return; }
      if (isPeopleCard(card) || hasRealMedia(card)) { return; }
      var heading = card.querySelector('h2, h3, h4'), para = card.querySelector('p');
      var key = choose(heading ? heading.textContent : '', para ? para.textContent : '');
      var pt = parseFloat(cs.paddingTop) || 0, pr = parseFloat(cs.paddingRight) || 0, pl = parseFloat(cs.paddingLeft) || 0;
      var art = document.createElement('div');
      art.className = 'hx-art hx-auto'; art.setAttribute('aria-hidden', 'true');
      art.style.margin = (-pt) + 'px ' + (-pr) + 'px 20px ' + (-pl) + 'px';
      var img = document.createElement('img');
      img.src = MODE && MODE.pool === TWIN ? '/images/illustrations/' + key + '.svg' : ART(key); img.alt = ''; img.loading = 'lazy'; img.decoding = 'async';
      art.appendChild(img); card.insertBefore(art, card.firstChild);
      if (cs.overflow === 'visible') { card.style.overflow = 'hidden'; }
      if (cs.position === 'static') { card.style.position = 'relative'; }
      card.classList.add('hx-has-art');
    }
    function enhanceCards(root) { Array.prototype.forEach.call((root || document).querySelectorAll(CARD_SEL), enhanceCard); }

    /* ---------- 2. Section background layers ---------- */
    function enhanceSections() {
      var main = document.querySelector('main'); if (!main) { return; }
      var secs = Array.prototype.filter.call(main.querySelectorAll('section'), function (s) { return !s.parentElement.closest('section') && !s.closest('.hx-card'); });
      secs.forEach(function (s, i) {
        if (s.dataset.hxFx) { return; }
        s.dataset.hxFx = '1';
        var hero = (i === 0);
        s.classList.add('hx-host'); if (hero) { s.classList.add('hx-hero2'); }
        if (!s.classList.contains('hx-hero')) { s.setAttribute('data-hx-tint', String(i % 4)); }
      });
    }

    /* ---------- 3. Background videos: always play; pause button for visitors who want it ---------- */
    function enhanceVideos() {
      var secHero = document.querySelector('main .hx-hero2:not(.hx-hero)');
      if (secHero && !secHero.querySelector('.hx-bgvideo')) {
        var name = null;
        HERO_VIDEO.forEach(function (h) { if (!name && h[0].test(path)) { name = h[1]; } });
        if (!name && !P(/^\/?(en|de|ar)?\/?$/) && !P(/\/(contact|legal|dashboard|profile|careers\/track|newsletter)/)) {
          var GEN = ['meeting-room', 'office-wide', 'consulting-team', 'team-whiteboard', 'coworking', 'data-dashboard', 'partners-meeting', 'lecture-hall'];
          var hsh = 0; for (var q = 0; q < path.length; q++) { hsh = (hsh * 31 + path.charCodeAt(q)) >>> 0; }
          name = GEN[hsh % GEN.length];
        }
        if (name) {
          var v = document.createElement('video');
          v.className = 'hx-bgvideo'; v.muted = true; v.loop = true; v.playsInline = true; v.preload = 'none';
          v.setAttribute('muted', ''); v.setAttribute('playsinline', ''); v.setAttribute('aria-hidden', 'true'); v.tabIndex = -1;
          v.setAttribute('disablepictureinpicture', ''); v.poster = '/videos/' + name + '.jpg';
          v.setAttribute('data-src', '/videos/' + name + '.mp4');
          secHero.insertBefore(v, secHero.firstChild);
          var sc = document.createElement('div'); sc.className = 'hx-scrim'; sc.setAttribute('aria-hidden', 'true'); v.after(sc);
          secHero.classList.add('hx-hasvideo');
        }
      }
      /* Videos: the source is attached only when the section is near the screen, and the clip is paused when it leaves.
         At most the visible ones are decoded, so scrolling stays smooth. */
      var vids = document.querySelectorAll('video.hx-bgvideo');
      function startVideo(v) {
        if (!v.dataset.loaded) {
          var u = v.getAttribute('data-src');
          if (u) { var so = document.createElement('source'); so.src = u; so.type = 'video/mp4'; v.appendChild(so); v.load(); }
          v.dataset.loaded = '1';
        }
        v.muted = true; var p = v.play(); if (p && p.catch) { p.catch(function () {}); }
      }
      if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (es) {
          es.forEach(function (e) { if (e.isIntersecting) { startVideo(e.target); } else { e.target.pause(); } });
        }, { rootMargin: '150px 0px' });
        Array.prototype.forEach.call(vids, function (v) { io.observe(v); });
      } else { Array.prototype.forEach.call(vids, function (v, i) { if (i === 0) { startVideo(v); } }); }
    }

    /* ---------- 4. Pointer tilt ---------- */
    function bindTilt() {
      if (!fine || reduce) { return; }
      var hero = document.querySelector('.hx-hero'), stage = document.querySelector('.hx-stage');
      if (hero && stage) {
        var frame = null, tx = 0, ty = 0;
        hero.addEventListener('pointermove', function (e) {
          var r = hero.getBoundingClientRect();
          tx = ((e.clientX - r.left) / r.width - 0.5) * 16; ty = ((e.clientY - r.top) / r.height - 0.5) * -12;
          if (frame) { return; }
          frame = requestAnimationFrame(function () { stage.style.setProperty('--hx-rx', tx.toFixed(2) + 'deg'); stage.style.setProperty('--hx-ry', ty.toFixed(2) + 'deg'); frame = null; });
        }, { passive: true });
        hero.addEventListener('pointerleave', function () { stage.style.setProperty('--hx-rx', '0deg'); stage.style.setProperty('--hx-ry', '0deg'); });
      }
      Array.prototype.forEach.call(document.querySelectorAll('.hx-card'), function (card) {
        var raf = null;
        card.addEventListener('pointerenter', function () { card.classList.add('hx-tilt'); });
        card.addEventListener('pointermove', function (e) {
          if (raf) { return; }
          raf = requestAnimationFrame(function () {
            var r = card.getBoundingClientRect(), px = (e.clientX - r.left) / r.width, py = (e.clientY - r.top) / r.height;
            card.style.setProperty('--hx-tx', ((0.5 - py) * 7).toFixed(2) + 'deg'); card.style.setProperty('--hx-ty', ((px - 0.5) * 7).toFixed(2) + 'deg');
            card.style.setProperty('--hx-mx', (px * 100).toFixed(1) + '%'); card.style.setProperty('--hx-my', (py * 100).toFixed(1) + '%');
            raf = null;
          });
        }, { passive: true });
        card.addEventListener('pointerleave', function () { card.classList.remove('hx-tilt'); card.style.removeProperty('--hx-tx'); card.style.removeProperty('--hx-ty'); });
      });
    }

    /* ---------- 5. Animations only run for sections that are on screen ---------- */
    function pauseOffscreen() {
      if (!('IntersectionObserver' in window)) { return; }
      var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) { e.target.classList.toggle('hx-off', !e.isIntersecting); });
      }, { rootMargin: '120px 0px' });
      Array.prototype.forEach.call(document.querySelectorAll('main section'), function (sec) { io.observe(sec); });
    }

    function run() {
      try { var mn = document.querySelector('main'); if (mn && !document.querySelector('.hopn-homepage')) { mn.classList.add('hopn-homepage'); } } catch (e) {}
      try { enhanceSections(); } catch (e) {}
      try { enhanceVideos(); } catch (e) {}
      try { markGrids(); } catch (e) {}
      try { enhanceCards(document); } catch (e) {}
      try { bindTilt(); } catch (e) {}
      try { pauseOffscreen(); } catch (e) {}
      if (window.MutationObserver) {
        var t = null;
        new MutationObserver(function () {
          if (t) { return; }
          t = setTimeout(function () { t = null; try { enhanceCards(document); markGrids(); } catch (e) {} }, 150);
        }).observe(document.querySelector('main') || document.body, { childList: true, subtree: true });
      }
    }
    if (document.readyState !== 'loading') { run(); } else { document.addEventListener('DOMContentLoaded', run); }
  } catch (err) { /* decoration must never break the page */ }
}());
