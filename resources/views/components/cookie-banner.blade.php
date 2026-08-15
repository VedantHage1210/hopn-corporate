@php($lang = request()->route('lang', 'en'))
<div id="cookie-banner" class="fixed bottom-4 left-1/2 z-40 hidden w-[94%] max-w-2xl -translate-x-1/2 rounded-lg border border-slate-700 bg-slate-900 p-5 shadow-xl" @if($lang === 'ar') dir="rtl" @endif>
    <p class="text-sm text-slate-300">
        @if($lang === 'ar') نستخدم ملفات تعريف الارتباط الضرورية لتشغيل الموقع، وملفات اختيارية لتحسين تجربتك. يمكنك قبول الكل أو رفض غير الضروري منها.
        @elseif($lang === 'de') Wir verwenden essenzielle Cookies für den Betrieb der Website und optionale Cookies zur Verbesserung Ihrer Erfahrung. Sie können alle akzeptieren oder nicht notwendige ablehnen.
        @else We use essential cookies to run this site, and optional cookies to improve your experience. You can accept all, or reject non-essential ones. @endif
        <a href="{{ route('legal.cookie', ['lang' => $lang]) }}" class="text-indigo-300 hover:underline">
            @if($lang === 'ar') اعرف المزيد @elseif($lang === 'de') Mehr erfahren @else Learn more @endif
        </a>
    </p>
    <div class="mt-4 flex flex-wrap gap-2 {{ $lang === 'ar' ? 'justify-start' : 'justify-end' }}">
        <button id="cookie-reject" type="button" class="rounded border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">
            @if($lang === 'ar') رفض @elseif($lang === 'de') Ablehnen @else Reject @endif
        </button>
        <button id="cookie-necessary" type="button" class="rounded border border-slate-700 px-4 py-2 text-sm text-slate-300 hover:bg-slate-800">
            @if($lang === 'ar') الضروري فقط @elseif($lang === 'de') Nur notwendige @else Necessary Only @endif
        </button>
        <button id="cookie-accept" type="button" class="btn-primary text-sm">
            @if($lang === 'ar') قبول الكل @elseif($lang === 'de') Alle akzeptieren @else Accept All @endif
        </button>
    </div>
</div>

<script>
(function () {
    var STORAGE_KEY = 'hopn_cookie_consent';
    var banner = document.getElementById('cookie-banner');
    if (!banner) return;

    function getConsent() {
        try { return localStorage.getItem(STORAGE_KEY); } catch (e) { return null; }
    }

    function setConsent(value) {
        try { localStorage.setItem(STORAGE_KEY, value); } catch (e) { /* storage unavailable, ignore */ }
        // Expose the choice on window so future analytics/marketing scripts can check
        // window.hopnCookieConsent before loading (e.g. only load ads/analytics if 'all').
        window.hopnCookieConsent = value;
        banner.style.display = 'none';
    }

    if (!getConsent()) {
        banner.style.display = 'block';
    } else {
        window.hopnCookieConsent = getConsent();
    }

    var acceptBtn = document.getElementById('cookie-accept');
    var necessaryBtn = document.getElementById('cookie-necessary');
    var rejectBtn = document.getElementById('cookie-reject');

    if (acceptBtn) acceptBtn.addEventListener('click', function () { setConsent('all'); });
    if (necessaryBtn) necessaryBtn.addEventListener('click', function () { setConsent('necessary'); });
    if (rejectBtn) rejectBtn.addEventListener('click', function () { setConsent('rejected'); });
})();
</script>
