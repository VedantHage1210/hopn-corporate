/* HOPn motion layer: scroll progress, staggered reveals, count-up numbers. No dependencies. */
(function () {
  'use strict';
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function progress() {
    if (reduce) return;
    var bar = document.createElement('div');
    bar.className = 'hopn-progress';
    bar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(bar);
    var ticking = false;
    function update() {
      var h = document.documentElement;
      var max = h.scrollHeight - h.clientHeight;
      bar.style.transform = 'scaleX(' + (max > 0 ? Math.min(1, h.scrollTop / max) : 0) + ')';
      ticking = false;
    }
    window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(update); } }, { passive: true });
    update();
  }

  // Siblings that reveal together get a small cascade (max 6 steps)
  function stagger() {
    var groups = new Map();
    document.querySelectorAll('main .hopn-reveal').forEach(function (el) {
      var p = el.parentElement; if (!p) return;
      if (!groups.has(p)) groups.set(p, []);
      groups.get(p).push(el);
    });
    groups.forEach(function (els) {
      if (els.length < 2) return;
      els.forEach(function (el, i) { el.style.setProperty('--hopn-i', Math.min(i, 5)); });
    });
  }

  // Numbers like "10", "45+", "2.5M" count up once when scrolled into view
  function countUp() {
    if (reduce || !('IntersectionObserver' in window)) return;
    var nodes = document.querySelectorAll('.hx-stats b, [data-count]');
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        io.unobserve(e.target);
        var el = e.target, txt = el.textContent.trim();
        var m = txt.match(/^([^\d]*)(\d+(?:[.,]\d+)?)(.*)$/);
        if (!m) return;
        var target = parseFloat(m[2].replace(',', '.')), dec = (m[2].split(/[.,]/)[1] || '').length;
        var start = null, dur = 1100;
        function step(t) {
          if (start === null) start = t;
          var k = Math.min(1, (t - start) / dur), eased = 1 - Math.pow(1 - k, 3);
          el.textContent = m[1] + (target * eased).toFixed(dec) + m[3];
          if (k < 1) requestAnimationFrame(step); else el.textContent = txt;
        }
        requestAnimationFrame(step);
      });
    }, { threshold: 0.6 });
    nodes.forEach(function (n) { io.observe(n); });
  }

  // Page heroes (every page except the homepage, which has its own) get drifting contour lines + a one-time entrance
  function heroes() {
    if (reduce || document.querySelector('.hopn-homepage')) return;
    var hero = document.querySelector('main > section, main section.hopn-hero');
    if (!hero || hero.querySelector('.hopn-contours, .hx-bgvideo, .hx-fx')) return;
    var cs = getComputedStyle(hero);
    if (cs.position === 'static') hero.style.position = 'relative';
    hero.style.overflow = 'hidden';
    hero.style.isolation = 'isolate';
    var art = document.createElement('div');
    art.className = 'hopn-contours'; art.setAttribute('aria-hidden', 'true');
    hero.insertBefore(art, hero.firstChild);
    var shell = hero.querySelector('.container-shell');
    if (shell && !shell.classList.contains('hopn-enter') && !shell.classList.contains('hopn-reveal')) shell.classList.add('hopn-enter');
  }

  // Cards that do not reveal yet get the same soft scroll-in as the rest
  function cards() {
    document.querySelectorAll('main .card-panel, main .hopn-lift-card, main .hopn-field-card, main .rs-item').forEach(function (el) {
      if (el.classList.contains('hopn-reveal') || el.closest('.hopn-reveal') || el.closest('.hopn-enter')) return;
      el.classList.add('hopn-reveal');
    });
  }

  // Numbered steps: the connecting line fills as the reader scrolls through the list
  function stepLines() {
    var lists = document.querySelectorAll('.hopn-doc-sec[data-kind="steps"] ol');
    if (!lists.length) return;
    function upd() {
      var vh = window.innerHeight || 800;
      lists.forEach(function (ol) {
        var r = ol.getBoundingClientRect();
        var p = (vh * 0.72 - r.top) / Math.max(r.height, 1);
        ol.style.setProperty('--p', Math.max(0, Math.min(1, p)).toFixed(3));
      });
    }
    var t = false;
    window.addEventListener('scroll', function () { if (!t) { t = true; requestAnimationFrame(function () { upd(); t = false; }); } }, { passive: true });
    upd();
  }

  function init() { try { heroes(); cards(); progress(); stagger(); countUp(); stepLines(); } catch (e) {} }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
