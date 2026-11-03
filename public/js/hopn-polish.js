/* HOPn polish layer. Progressive enhancement only: never required for the site to work.
   1. Adds an image banner to listing cards that have no visible image.
   2. Adds soft animated background layers to page sections.
   3. Pointer tilt on cards (fine pointers, motion allowed).
   To use real photos later: add files to /images/photos/<key>.jpg and list the key in PHOTOS below. */
(function () {
  'use strict';
  try {
    var PHOTOS = {};          // e.g. { ai: '/images/photos/ai.jpg', research: '/images/photos/research.jpg' }
    var ART = function (key) { return PHOTOS[key] || ('/images/illustrations/' + key + '.svg'); };

    var RULES = [
      [/twin|digital/i, 'digital-twin'], [/robot|automation/i, 'robotics'],
      [/\bai\b|artificial|machine|data|intellig|llm/i, 'ai'], [/consult|strateg|govern|advis|expert/i, 'consulting'],
      [/research|science|academ|univers|institute/i, 'research'], [/talent|hiring|career|recruit|people|job/i, 'talent'],
      [/train|educat|learning|skill|workshop|course|program|academy/i, 'education'], [/startup|invest|venture|capital|fund/i, 'startups'],
      [/health|medic|pharma|care|bio/i, 'health'], [/energy|utilit|power|grid|climate/i, 'energy'],
      [/manufact|industr|engineer|factory|product/i, 'manufacturing'], [/mobil|auto|transport|logist|vehicle/i, 'mobility'],
      [/financ|bank|business|insur|enterprise/i, 'business'], [/lab|innovat|domain/i, 'lab'],
      [/event|conference|summit|webinar/i, 'events'], [/news|insight|blog|report|press|article/i, 'insights']
    ];
    var FAMILY = [
      [/\/startups/, ['startups', 'business', 'lab']], [/\/investors/, ['business', 'startups', 'consulting']],
      [/\/industries/, ['manufacturing', 'energy', 'health', 'mobility', 'business']], [/\/events/, ['events', 'education', 'talent']],
      [/\/(newsroom|insights|blog|news)/, ['insights', 'research', 'ai']], [/\/partners/, ['business', 'talent', 'research']],
      [/\/apps/, ['ai', 'digital-twin', 'robotics']], [/\/innovation/, ['lab', 'research', 'ai']],
      [/\/(programs|training|workshops)/, ['education', 'talent', 'lab']], [/\/consulting/, ['consulting', 'talent', 'business']],
      [/\/(services|solutions|catalog)/, ['ai', 'consulting', 'digital-twin', 'robotics', 'research']], [/\/research/, ['research', 'lab', 'ai']],
      [/\/careers/, ['talent', 'education', 'business']], [/\/labs/, ['lab', 'research', 'robotics']],
      [/\/case-studies/, ['business', 'manufacturing', 'ai']], [/\/products/, ['digital-twin', 'ai', 'robotics']]
    ];
    var path = location.pathname || '';
    var family = ['ai', 'research', 'digital-twin', 'consulting', 'lab', 'business'];
    FAMILY.forEach(function (f) { if (f[0].test(path)) { family = f[1]; } });
    var isPartners = /\/partners/.test(path);
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var fine = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    function pickKey(text, i) {
      for (var k = 0; k < RULES.length; k++) { if (RULES[k][0].test(text)) { return RULES[k][1]; } }
      return family[i % family.length];
    }

    /* ---------- 1. Card image banners ---------- */
    var CARD_SEL = 'main a.hopn-lift-card, main div.hopn-lift-card, main .hopn-lift-card-nobg, main .card-panel, main .hopn-service-card, main .hopn-product-card, main .hopn-industry-card, main article';
    var counter = 0;

    function hasRealMedia(card) {
      var imgs = card.querySelectorAll('img');
      for (var i = 0; i < imgs.length; i++) {
        if (imgs[i].closest('.hx-art')) { return true; }
        var r = imgs[i].getBoundingClientRect();
        if (r.width >= 110 && r.height >= 70) { return true; }
        if (isPartners) { return true; }           /* partner cards show logos: leave them */
      }
      return !!card.querySelector('video, picture, svg[width="100%"]');
    }

    function enhanceCard(card) {
      if (card.dataset.hxArt) { return; }
      card.dataset.hxArt = '1';
      if (card.closest('.hx-card, header, footer, nav, form, .hopn-homepage section.hx-hero')) { return; }
      if (!card.querySelector('h2, h3, h4')) { return; }
      var text = (card.textContent || '').replace(/\s+/g, ' ').trim();
      if (text.length < 24) { return; }
      var rect = card.getBoundingClientRect();
      if (rect.width < 200 || rect.width > 760 || rect.height < 100) { return; }
      var cs = window.getComputedStyle(card);
      if (cs.display.indexOf('grid') !== -1 || (cs.display.indexOf('flex') !== -1 && cs.flexDirection.indexOf('row') === 0)) { return; }
      if (hasRealMedia(card)) { return; }

      var heading = card.querySelector('h2, h3, h4');
      var para = card.querySelector('p');
      var key = pickKey((heading ? heading.textContent : '') + ' ' + (para ? para.textContent : ''), counter++);
      var pt = parseFloat(cs.paddingTop) || 0, pr = parseFloat(cs.paddingRight) || 0, pl = parseFloat(cs.paddingLeft) || 0;
      var art = document.createElement('div');
      art.className = 'hx-art hx-auto';
      art.setAttribute('aria-hidden', 'true');
      art.style.margin = (-pt) + 'px ' + (-pr) + 'px 20px ' + (-pl) + 'px';
      var img = document.createElement('img');
      img.src = ART(key); img.alt = ''; img.loading = 'lazy'; img.decoding = 'async';
      art.appendChild(img);
      card.insertBefore(art, card.firstChild);
      if (cs.overflow === 'visible') { card.style.overflow = 'hidden'; }
      if (cs.position === 'static') { card.style.position = 'relative'; }
      card.classList.add('hx-has-art');
    }
    function enhanceCards(root) {
      Array.prototype.forEach.call((root || document).querySelectorAll(CARD_SEL), enhanceCard);
    }

    /* ---------- 2. Section background layers ---------- */
    function enhanceSections() {
      var main = document.querySelector('main');
      if (!main) { return; }
      var secs = Array.prototype.filter.call(main.querySelectorAll('section'), function (s) {
        return !s.parentElement.closest('section') && !s.closest('.hx-card');
      });
      secs.forEach(function (s, i) {
        if (s.dataset.hxFx) { return; }
        s.dataset.hxFx = '1';
        var hero = (i === 0);
        s.classList.add('hx-host');
        if (hero) { s.classList.add('hx-hero2'); }
        if (!s.classList.contains('hx-hero')) { s.setAttribute('data-hx-tint', String(i % 4)); }
        var fx = document.createElement('div');
        fx.className = 'hx-fx' + (hero ? ' hx-strong' : '');
        fx.setAttribute('aria-hidden', 'true');
        fx.innerHTML = '<i></i><i></i><i></i>';
        s.insertBefore(fx, s.firstChild);
      });
    }

    /* ---------- 3. Pointer tilt ---------- */
    function bindTilt() {
      if (!fine || reduce) { return; }
      var hero = document.querySelector('.hx-hero');
      var stage = document.querySelector('.hx-stage');
      if (hero && stage) {
        var frame = null, tx = 0, ty = 0;
        hero.addEventListener('pointermove', function (e) {
          var r = hero.getBoundingClientRect();
          tx = ((e.clientX - r.left) / r.width - 0.5) * 16;
          ty = ((e.clientY - r.top) / r.height - 0.5) * -12;
          if (frame) { return; }
          frame = requestAnimationFrame(function () {
            stage.style.setProperty('--hx-rx', tx.toFixed(2) + 'deg');
            stage.style.setProperty('--hx-ry', ty.toFixed(2) + 'deg');
            frame = null;
          });
        }, { passive: true });
        hero.addEventListener('pointerleave', function () {
          stage.style.setProperty('--hx-rx', '0deg'); stage.style.setProperty('--hx-ry', '0deg');
        });
      }
      Array.prototype.forEach.call(document.querySelectorAll('.hx-card'), function (card) {
        var raf = null;
        card.addEventListener('pointerenter', function () { card.classList.add('hx-tilt'); });
        card.addEventListener('pointermove', function (e) {
          if (raf) { return; }
          raf = requestAnimationFrame(function () {
            var r = card.getBoundingClientRect();
            var px = (e.clientX - r.left) / r.width, py = (e.clientY - r.top) / r.height;
            card.style.setProperty('--hx-tx', ((0.5 - py) * 7).toFixed(2) + 'deg');
            card.style.setProperty('--hx-ty', ((px - 0.5) * 7).toFixed(2) + 'deg');
            card.style.setProperty('--hx-mx', (px * 100).toFixed(1) + '%');
            card.style.setProperty('--hx-my', (py * 100).toFixed(1) + '%');
            raf = null;
          });
        }, { passive: true });
        card.addEventListener('pointerleave', function () {
          card.classList.remove('hx-tilt'); card.style.removeProperty('--hx-tx'); card.style.removeProperty('--hx-ty');
        });
      });
    }

    function run() {
      try { enhanceSections(); } catch (e) {}
      try { enhanceCards(document); } catch (e) {}
      try { bindTilt(); } catch (e) {}
      /* pick up cards added later (filters, pagination, async content) */
      if (window.MutationObserver) {
        var t = null;
        new MutationObserver(function () {
          if (t) { return; }
          t = setTimeout(function () { t = null; try { enhanceCards(document); } catch (e) {} }, 150);
        }).observe(document.querySelector('main') || document.body, { childList: true, subtree: true });
      }
    }
    if (document.readyState !== 'loading') { run(); } else { document.addEventListener('DOMContentLoaded', run); }
  } catch (err) { /* decoration must never break the page */ }
}());
