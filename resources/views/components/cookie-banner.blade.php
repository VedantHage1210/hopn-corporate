<div id="cookie-banner" class="fixed bottom-4 left-1/2 z-40 hidden w-[94%] max-w-3xl -translate-x-1/2 rounded-lg border border-slate-700 bg-slate-900 p-4 shadow-xl">
    <p class="text-sm text-slate-300">We use essential cookies to provide and improve services. By continuing, you agree to our cookie policy.</p>
    <div class="mt-3 flex justify-end">
        <button id="cookie-accept" class="btn-primary text-sm">Accept</button>
    </div>
</div>
<script>
    (function () {
        if (localStorage.getItem('hopn_cookie_consent')) return;
        const banner = document.getElementById('cookie-banner');
        const accept = document.getElementById('cookie-accept');
        if (!banner || !accept) return;
        banner.classList.remove('hidden');
        accept.addEventListener('click', function () {
            localStorage.setItem('hopn_cookie_consent', '1');
            banner.classList.add('hidden');
        });
    })();
</script>
