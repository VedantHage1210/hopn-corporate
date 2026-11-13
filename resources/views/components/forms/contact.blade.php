@props(['lang' => 'en'])
<style>
    .hopn-consent-label { font-size:12.5px; line-height:1.5; color:#94A3B8; }
    .hopn-consent-label a { color:#9FE0F2; text-decoration:underline; text-underline-offset:2px; font-weight:600; }
    html[data-theme="light"] .hopn-consent-label { color:#43515F; }
    html[data-theme="light"] .hopn-consent-label a { color:#245B78; }
    .hopn-consent-box { width:16px; height:16px; accent-color:#245B78; flex:none; }
</style>
<form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="POST" class="space-y-4">
    @csrf
    <x-turnstile />
    <input type="text" name="honeypot" style="display:none">
    @if(session('contact_status'))
        <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('contact_status') }}</div>
    @endif
    <div>
        <label for="hopn-name-1d8271" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
        <input id="hopn-name-1d8271" type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
        @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="hopn-email-1d8272" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email Address') }} *</label>
        <input id="hopn-email-1d8272" type="email" name="email" value="{{ old('email') }}" required
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
        @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="hopn-phone-1d8273" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الهاتف' : ($lang === 'de' ? 'Telefon' : 'Phone') }}</label>
        <input id="hopn-phone-1d8273" type="text" name="phone" value="{{ old('phone') }}" pattern="[0-9+\-\s()]*" inputmode="tel" title="{{ $lang === 'ar' ? 'يُسمح فقط بالأرقام والمسافات و + و - و ()' : ($lang === 'de' ? 'Nur Zahlen, Leerzeichen, +, - und () sind erlaubt.' : 'Only numbers, spaces, +, -, and () are allowed.') }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
        @error('phone')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="hopn-company-1d8274" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الشركة' : ($lang === 'de' ? 'Unternehmen' : 'Company') }}</label>
        <input id="hopn-company-1d8274" type="text" name="company" value="{{ old('company') }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label for="hopn-message-1d8275" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الرسالة' : ($lang === 'de' ? 'Nachricht' : 'Message') }} *</label>
        <textarea id="hopn-message-1d8275" name="message" rows="4" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">{{ old('message') }}</textarea>
        @error('message')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
    <div class="flex items-start gap-2">
        <input type="checkbox" name="gdpr" id="gdpr_contact" value="1" class="hopn-consent-box mt-1" required @checked(old('gdpr'))>
        <label for="gdpr_contact" class="hopn-consent-label">
            @if($lang === 'ar') أوافق على <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">سياسة الخصوصية</a> وعلى التواصل معي.
            @elseif($lang === 'de') Ich stimme der <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">Datenschutzerklärung</a> zu.
            @else I agree to the <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">Privacy Policy</a> and consent to being contacted.
            @endif
        </label>
    </div>
    @error('gdpr')<p class="text-xs text-rose-300">{{ $message }}</p>@enderror
    <button type="submit" class="btn-primary w-full">{{ $lang === 'ar' ? 'إرسال الرسالة' : ($lang === 'de' ? 'Nachricht senden' : 'Send Message') }}</button>
</form>
