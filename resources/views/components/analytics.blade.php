@php($plausibleDomain = config('hopn.analytics.plausible_domain'))
@if($plausibleDomain)
{{-- Privacy-friendly analytics (Plausible). Loads only after the visitor accepts analytics in the cookie banner. --}}
<script>
(function () {
    var loaded = false;
    window.plausible = window.plausible || function () { (window.plausible.q = window.plausible.q || []).push(arguments); };

    function consent() { try { return localStorage.getItem('hopn_cookie_consent'); } catch (e) { return null; } }
    function load() {
        if (loaded) return;
        loaded = true;
        var s = document.createElement('script');
        s.defer = true;
        s.setAttribute('data-domain', @json($plausibleDomain));
        s.src = @json(config('hopn.analytics.plausible_script'));
        document.head.appendChild(s);
    }
    function track(name, props) {
        if (!loaded) return;
        window.plausible(name, props ? { props: props } : undefined);
    }

    if (consent() === 'all') load();
    document.addEventListener('hopn:consent', function (e) {
        if (e.detail === 'all') { load(); }
        else if (loaded) { window.location.reload(); }   // consent withdrawn: reload without the script
    });

    // Events: book-call clicks, form submissions, deck requests, PDF downloads
    document.addEventListener('click', function (e) {
        var a = e.target.closest ? e.target.closest('a') : null;
        if (!a) return;
        var href = a.getAttribute('href') || '';
        if (a.hasAttribute('data-hopn-event')) { track(a.getAttribute('data-hopn-event')); }
        else if (href.indexOf('meet.ebada.de') !== -1) { track('Book Call'); }
        else if (/\.pdf($|\?)/i.test(href)) { track('PDF Download', { file: href.split('/').pop().split('?')[0] }); }
    });
    document.addEventListener('submit', function (e) {
        var f = e.target, action = (f && f.getAttribute && f.getAttribute('action')) || '';
        if (!action || (f.getAttribute('method') || '').toLowerCase() !== 'post') return;
        var path = action.replace(/^https?:\/\/[^/]+/, '').replace(/^\/(en|de|ar)/, '');
        track(path.indexOf('request-deck') !== -1 ? 'Deck Request' : 'Form Submit', { form: path });
    });
})();
</script>
@endif
