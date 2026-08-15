@php($lang = request()->route('lang', 'en'))
<x-layouts.public :title="$lang === 'ar' ? 'طلب التدريب' : ($lang === 'de' ? 'Trainingsanmeldung' : 'Training Application')">
    <x-hero :title="$lang === 'ar' ? 'طلب التدريب' : ($lang === 'de' ? 'Trainingsanmeldung' : 'Training Application')"
            :subtitle="$lang === 'ar' ? 'قدم طلبًا للانضمام إلى برامجنا التدريبية.' : ($lang === 'de' ? 'Melden Sie sich für unsere Programme an.' : 'Apply for our training programs.')" />
    <section class="container-shell mt-8 hopn-reveal">
        @if(session('status'))
            <div class="mb-6 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        <div class="grid gap-8 lg:grid-cols-2">
            <div>
                <h2 class="mb-4 text-xl font-bold text-white">{{ $lang === 'ar' ? 'نموذج الطلب' : ($lang === 'de' ? 'Anmeldeformular' : 'Application Form') }}</h2>
                <form action="{{ route('leads.training', ['lang' => $lang]) }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="honeypot" style="display:none">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email') }} *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الهاتف' : ($lang === 'de' ? 'Telefon' : 'Phone') }}</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" pattern="[0-9+\-\s()]*" inputmode="tel" title="{{ $lang === 'ar' ? 'يُسمح فقط بالأرقام والمسافات و + و - و ()' : ($lang === 'de' ? 'Nur Zahlen, Leerzeichen, +, - und () sind erlaubt.' : 'Only numbers, spaces, +, -, and () are allowed.') }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('phone')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البرنامج المهتم به' : ($lang === 'de' ? 'Interessiertes Programm' : 'Program of Interest') }}</label>
                        <select name="program_of_interest" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option value="">{{ $lang === 'ar' ? 'اختر برنامجاً' : ($lang === 'de' ? 'Bitte wählen' : 'Select program') }}</option>
                            @foreach(\App\Models\Program::where('is_published', true)->get() as $program)
                                <option value="{{ $program->slug }}">{{ $lang === 'ar' && $program->title_ar ? $program->title_ar : ($lang === 'de' && $program->title_de ? $program->title_de : $program->title_en) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الرسالة' : ($lang === 'de' ? 'Nachricht' : 'Message') }} *</label>
                        <textarea name="message" rows="4" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                    <div class="flex items-start gap-2">
                        <input type="checkbox" name="gdpr" id="gdpr_training" value="1" class="mt-1" required>
                        <label for="gdpr_training" class="text-xs text-slate-400">{{ $lang === 'ar' ? 'أوافق على سياسة الخصوصية.' : ($lang === 'de' ? 'Ich stimme der Datenschutzerklärung zu.' : 'I agree to the Privacy Policy.') }}</label>
                    </div>
                    @error('gdpr')<p class="text-xs text-rose-300">{{ $message }}</p>@enderror
                    <button type="submit" class="btn-primary w-full transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-500/30">{{ $lang === 'ar' ? 'إرسال الطلب' : ($lang === 'de' ? 'Bewerbung absenden' : 'Submit Application') }}</button>
                </form>
            </div>
            <div class="space-y-4">
                <h2 class="text-xl font-bold text-white">{{ $lang === 'ar' ? 'برامجنا' : ($lang === 'de' ? 'Unsere Programme' : 'Our Programs') }}</h2>
                @foreach(\App\Models\Program::where('is_published', true)->get() as $program)
                    @php
                        $pTitle = $lang === 'ar' && $program->title_ar ? $program->title_ar : ($lang === 'de' && $program->title_de ? $program->title_de : $program->title_en);
                        $pSummary = $lang === 'ar' && $program->summary_ar ? $program->summary_ar : ($lang === 'de' && $program->summary_de ? $program->summary_de : $program->summary_en);
                    @endphp
                    <div class="card-panel p-4 transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                        <h3 class="font-semibold text-white">{{ $pTitle }}</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ $pSummary }}</p>
                        <p class="mt-2 text-xs text-indigo-300">{{ $program->duration }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
