@props(['lang' => 'en'])
<form action="{{ route('leads.proposal', ['lang' => $lang]) }}" method="POST" class="space-y-4">
    @csrf
    <input type="text" name="honeypot" style="display:none">
    @if(session('proposal_status'))
        <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('proposal_status') }}</div>
    @endif
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
        <input type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email Address') }} *</label>
        <input type="email" name="email" value="{{ old('email') }}" required
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الشركة' : ($lang === 'de' ? 'Unternehmen' : 'Company') }} *</label>
        <input type="text" name="company" value="{{ old('company') }}" required
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الخدمة المطلوبة' : ($lang === 'de' ? 'Gewünschte Leistung' : 'Service of Interest') }}</label>
        <input type="text" name="service_interest" value="{{ old('service_interest') }}" dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الميزانية المتوقعة' : ($lang === 'de' ? 'Budgetrahmen' : 'Budget Range') }}</label>
        <select name="budget_range" class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            <option value="">{{ $lang === 'ar' ? 'اختر نطاقاً' : ($lang === 'de' ? 'Bitte wählen' : 'Select range') }}</option>
            <option value="< 10k">{{ $lang === 'ar' ? 'أقل من 10,000 يورو' : 'Under €10,000' }}</option>
            <option value="10k-50k">€10,000 - €50,000</option>
            <option value="50k-100k">€50,000 - €100,000</option>
            <option value="> 100k">{{ $lang === 'ar' ? 'أكثر من 100,000 يورو' : 'Over €100,000' }}</option>
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الرسالة' : ($lang === 'de' ? 'Nachricht' : 'Message') }} *</label>
        <textarea name="message" rows="4" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}"
            class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white focus:border-indigo-500 focus:outline-none">{{ old('message') }}</textarea>
    </div>
    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
    <div class="flex items-start gap-2">
        <input type="checkbox" name="gdpr" id="gdpr_proposal" value="1" class="mt-1" required>
        <label for="gdpr_proposal" class="text-xs text-slate-400">{{ $lang === 'ar' ? 'أوافق على سياسة الخصوصية.' : ($lang === 'de' ? 'Ich stimme der Datenschutzerklärung zu.' : 'I agree to the Privacy Policy.') }}</label>
    </div>
    <button type="submit" class="btn-primary w-full">{{ $lang === 'ar' ? 'طلب عرض سعر' : ($lang === 'de' ? 'Angebot anfordern' : 'Request Proposal') }}</button>
</form>
