@php $lang = request()->route('lang', 'en'); @endphp
<div>
    <form id="hopn-newsletter-form" method="POST" action="{{ route('newsletter.subscribe', ['lang' => $lang]) }}" style="display:flex; gap:10px; flex-wrap:wrap;">
        @csrf
        <label for="hopn-newsletter-email" class="sr-only">
            {{ $lang==='ar' ? 'البريد الإلكتروني للاشتراك في النشرة' : ($lang==='de' ? 'E-Mail für Newsletter-Anmeldung' : 'Email address for newsletter signup') }}
        </label>
        <input type="email" id="hopn-newsletter-email" name="email" required placeholder="your@email.com"
            style="flex:1; min-width:220px; padding:12px 16px; border-radius:10px; border:1px solid rgba(139,92,246,0.4); background:transparent; color:white; font-size:14px;">
        <button type="submit" id="hopn-newsletter-submit"
            style="display:inline-flex; align-items:center; gap:8px; padding:12px 22px; border-radius:10px; background:#8B5CF6; color:white; font-size:14px; font-weight:700; border:none; cursor:pointer; white-space:nowrap;">
            @if($lang==='ar') اشترك @elseif($lang==='de') Abonnieren @else Subscribe @endif →
        </button>
    </form>
    <div id="hopn-newsletter-inline-error" style="display:none; margin-top:10px; font-size:13px; color:#FDA4AF;"></div>
</div>

@once
<div id="hopn-toast-root" style="position:fixed; top:24px; right:24px; z-index:9999; display:flex; flex-direction:column; gap:10px; pointer-events:none;"></div>
<script>
window.hopnShowToast = function (message, type) {
    var root = document.getElementById('hopn-toast-root');
    if (!root) return;
    var toast = document.createElement('div');
    var bg = type === 'error' ? 'rgba(244,63,94,0.95)' : 'rgba(16,185,129,0.95)';
    toast.style.cssText = 'pointer-events:auto; background:' + bg + '; color:white; padding:14px 20px; border-radius:10px; font-size:14px; font-weight:600; box-shadow:0 10px 30px rgba(0,0,0,0.35); max-width:320px; opacity:0; transform:translateY(-10px); transition:opacity .25s ease, transform .25s ease;';
    toast.textContent = message;
    root.appendChild(toast);
    requestAnimationFrame(function () {
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
    });
    setTimeout(function () {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(-10px)';
        setTimeout(function () { toast.remove(); }, 250);
    }, 4000);
};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#hopn-newsletter-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var email = form.querySelector('input[name="email"]');
            var errorBox = form.parentElement.querySelector('#hopn-newsletter-inline-error');
            var token = form.querySelector('input[name="_token"]').value;
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ email: email.value })
            }).then(function (res) {
                return res.json().then(function (data) { return { ok: res.ok, data: data }; });
            }).then(function (result) {
                if (result.ok) {
                    if (errorBox) errorBox.style.display = 'none';
                    email.value = '';
                    window.hopnShowToast('Subscribed! Thank you for subscribing.', 'success');
                } else {
                    var msg = (result.data.errors && result.data.errors.email && result.data.errors.email[0]) || 'Something went wrong — please try again.';
                    if (errorBox) { errorBox.textContent = msg; errorBox.style.display = 'block'; }
                }
            }).catch(function () {
                if (errorBox) { errorBox.textContent = 'Network error — please try again.'; errorBox.style.display = 'block'; }
            });
        });
    });

    var flash = document.getElementById('hopn-flash-status');
    if (flash && flash.dataset.message) {
        window.hopnShowToast(flash.dataset.message, flash.dataset.type || 'success');
    }
});
</script>
@endonce
