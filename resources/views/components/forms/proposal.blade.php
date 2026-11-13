@props(['lang' => 'en'])
<style>
    .hopn-consent-label { font-size:12.5px; line-height:1.5; color:#94A3B8; }
    .hopn-consent-label a { color:#9FE0F2; text-decoration:underline; text-underline-offset:2px; font-weight:600; }
    html[data-theme="light"] .hopn-consent-label { color:#43515F; }
    html[data-theme="light"] .hopn-consent-label a { color:#245B78; }
    .hopn-consent-box { width:16px; height:16px; accent-color:#245B78; flex:none; }
</style>
<form action="{{ route('leads.proposal', ['lang' => $lang]) }}" method="POST" class="space-y-4">
    @csrf
    <x-turnstile />
    <input type="text" name="honeypot" style="display:none">
    @if(session('proposal_status'))
        <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('proposal_status') }}</div>
    @endif
    <div>
        <label for="hopn-name-0cf6d1" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
        <input id="hopn-name-0cf6d1" type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label for="hopn-email-0cf6d2" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email Address') }} *</label>
        <input id="hopn-email-0cf6d2" type="email" name="email" value="{{ old('email') }}" required
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label for="hopn-company-0cf6d3" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الشركة' : ($lang === 'de' ? 'Unternehmen' : 'Company') }} *</label>
        <input id="hopn-company-0cf6d3" type="text" name="company" value="{{ old('company') }}" required
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label for="hopn-service-interest-0cf6d4" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الخدمة المطلوبة' : ($lang === 'de' ? 'Gewünschte Leistung' : 'Service of Interest') }}</label>
        <input id="hopn-service-interest-0cf6d4" type="text" name="service_interest" value="{{ old('service_interest') }}" dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label for="hopn-budget-range-0cf6d5" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الميزانية المتوقعة' : ($lang === 'de' ? 'Budgetrahmen' : 'Budget Range') }}</label>
        <select id="hopn-budget-range-0cf6d5" name="budget_range" class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            <option value="">{{ $lang === 'ar' ? 'اختر نطاقاً' : ($lang === 'de' ? 'Bitte wählen' : 'Select range') }}</option>
            <option value="under-10k">{{ $lang === 'ar' ? 'أقل من 10,000 يورو' : ($lang === 'de' ? 'Unter 10.000 €' : 'Under €10,000') }}</option>
            <option value="10k-50k">€10,000 - €50,000</option>
            <option value="50k-100k">€50,000 - €100,000</option>
            <option value="over-100k">{{ $lang === 'ar' ? 'أكثر من 100,000 يورو' : ($lang === 'de' ? 'Über 100.000 €' : 'Over €100,000') }}</option>
        </select>
    </div>
    <div>
        <label for="hopn-message-0cf6d6" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الرسالة' : ($lang === 'de' ? 'Nachricht' : 'Message') }} *</label>
        <textarea id="hopn-message-0cf6d6" name="message" rows="4" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">{{ old('message') }}</textarea>
    </div>
    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
    <div class="flex items-start gap-2">
        <input type="checkbox" name="gdpr" id="gdpr_proposal" value="1" class="hopn-consent-box mt-1" required @checked(old('gdpr'))>
        <label for="gdpr_proposal" class="hopn-consent-label">
            @if($lang === 'ar') أوافق على <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">سياسة الخصوصية</a>.
            @elseif($lang === 'de') Ich stimme der <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">Datenschutzerklärung</a> zu.
            @else I agree to the <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener">Privacy Policy</a>.
            @endif
        </label>
    </div>
    @error('gdpr')<p class="text-xs text-rose-300">{{ $message }}</p>@enderror
    <button type="submit" class="btn-primary w-full">{{ $lang === 'ar' ? 'طلب عرض سعر' : ($lang === 'de' ? 'Angebot anfordern' : 'Request Proposal') }}</button>
</form>
