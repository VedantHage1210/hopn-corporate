@error('turnstile')
<p role="alert" style="color:#B42318; font-size:13px; font-weight:600; margin:4px 0;">{{ $message }}</p>
@enderror
@if(config('hopn.turnstile.site_key'))
<div class="cf-turnstile" data-sitekey="{{ config('hopn.turnstile.site_key') }}" data-theme="light" style="margin:4px 0;"></div>
@once
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endonce
@endif
