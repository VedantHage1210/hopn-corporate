@props(['job', 'lang' => 'en'])
<form action="{{ route('careers.apply', ['lang' => $lang, 'slug' => $job->slug]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="text" name="honeypot" style="display:none">
    @if(session('status'))
        <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
        <input type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email') }} *</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الهاتف' : ($lang === 'de' ? 'Telefon' : 'Phone') }}</label>
        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'خطاب التقديم' : ($lang === 'de' ? 'Anschreiben' : 'Cover Letter') }}</label>
        <textarea name="cover_letter" rows="4" dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('cover_letter') }}</textarea>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'السيرة الذاتية' : ($lang === 'de' ? 'Lebenslauf' : 'CV / Resume') }} * <span class="text-xs text-slate-400">(PDF, DOC, DOCX)</span></label>
        <input type="file" name="cv" accept=".pdf,.doc,.docx" required class="w-full rounded border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
        @error('cv')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>
    <div class="flex items-start gap-2">
        <input type="checkbox" name="gdpr" id="gdpr_apply" value="1" class="mt-1" required>
        <label for="gdpr_apply" class="text-xs text-slate-400">{{ $lang === 'ar' ? 'أوافق على سياسة الخصوصية.' : ($lang === 'de' ? 'Ich stimme der Datenschutzerklärung zu.' : 'I agree to the Privacy Policy.') }}</label>
    </div>
    @error('gdpr')<p class="text-xs text-rose-300">{{ $message }}</p>@enderror
    <button type="submit" class="btn-primary w-full">{{ $lang === 'ar' ? 'إرسال الطلب' : ($lang === 'de' ? 'Bewerbung absenden' : 'Submit Application') }}</button>
</form>
