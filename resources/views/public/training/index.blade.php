@php
    $lang = request()->route('lang', 'en');
@endphp
<x-layouts.public :title="$lang === 'ar' ? 'طلب التدريب' : ($lang === 'de' ? 'Trainingsanmeldung' : 'Training Application')">
    <x-hero :title="$lang === 'ar' ? 'طلب التدريب' : ($lang === 'de' ? 'Trainingsanmeldung' : 'Training Application')"
            :subtitle="$lang === 'ar' ? 'قدم طلبًا للانضمام إلى برامجنا التدريبية.' : ($lang === 'de' ? 'Melden Sie sich für unsere Programme an.' : 'Apply for our training programs.')" />
    <section class="container-shell mt-8 hopn-reveal">
        @if(session('status'))
            <div class="hopn-flash mb-6 rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">{{ session('status') }}</div>
        @endif
        <div class="grid gap-8 lg:grid-cols-2">
            <div>
                <h2 class="mb-4 text-xl font-bold text-white">{{ $lang === 'ar' ? 'نموذج الطلب' : ($lang === 'de' ? 'Anmeldeformular' : 'Application Form') }}</h2>
                <form action="{{ route('leads.training', ['lang' => $lang]) }}" method="POST" class="space-y-4">
                    @csrf
                    <x-turnstile />
                    <input type="text" name="honeypot" style="display:none">
                    <div>
                        <label for="hopn-name-514871" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الاسم الكامل' : ($lang === 'de' ? 'Name' : 'Full Name') }} *</label>
                        <input id="hopn-name-514871" type="text" name="name" value="{{ old('name') }}" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="hopn-email-514872" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البريد الإلكتروني' : ($lang === 'de' ? 'E-Mail' : 'Email') }} *</label>
                        <input id="hopn-email-514872" type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="hopn-phone-514873" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الهاتف' : ($lang === 'de' ? 'Telefon' : 'Phone') }}</label>
                        <input id="hopn-phone-514873" type="text" name="phone" value="{{ old('phone') }}" pattern="[0-9+\-\s()]*" inputmode="tel" title="{{ $lang === 'ar' ? 'يُسمح فقط بالأرقام والمسافات و + و - و ()' : ($lang === 'de' ? 'Nur Zahlen, Leerzeichen, +, - und () sind erlaubt.' : 'Only numbers, spaces, +, -, and () are allowed.') }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        @error('phone')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="hopn-program-of-interest-514874" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'البرنامج المهتم به' : ($lang === 'de' ? 'Interessiertes Programm' : 'Program of Interest') }}</label>
                        <select id="hopn-program-of-interest-514874" name="program_of_interest" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option value="">{{ $lang === 'ar' ? 'اختر برنامجاً' : ($lang === 'de' ? 'Bitte wählen' : 'Select program') }}</option>
                            @foreach(\App\Models\Program::where('is_published', true)->get() as $program)
                                <option value="{{ $program->slug }}">{{ $lang === 'ar' && $program->title_ar ? $program->title_ar : ($lang === 'de' && $program->title_de ? $program->title_de : $program->title_en) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="hopn-message-514875" class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'ar' ? 'الرسالة' : ($lang === 'de' ? 'Nachricht' : 'Message') }} *</label>
                        <textarea id="hopn-message-514875" name="message" rows="4" required dir="{{ $lang === 'ar' ? 'rtl' : 'ltr' }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm text-white transition-colors focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
                    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
                    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">
                    <div class="flex items-start gap-2">
                        <input type="checkbox" name="gdpr" id="gdpr_training" value="1" class="mt-1" required>
                        <label for="gdpr_training" class="text-xs text-slate-400">@if($lang === 'ar') أوافق على <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">سياسة الخصوصية</a>.
                        @elseif($lang === 'de') Ich stimme der <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Datenschutzerklärung</a> zu.
                        @else I agree to the <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" target="_blank" rel="noopener" class="hopn-consent-link">Privacy Policy</a>. @endif</label>
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
                    <div class="card-panel p-0 overflow-hidden transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                        @if($program->image_url)
                        <div style="height:180px; overflow:hidden; background:#EEF3F5;">
                            <img loading="lazy" decoding="async" src="{{ $program->image_url }}" alt="{{ $pTitle }}" style="width:100%; height:100%; display:block; object-fit:cover;">
                        </div>
                        @else
                        <div style="height:120px; background:#EEF3F5; position:relative; overflow:hidden;">
                            <div style="position:absolute; width:140%; height:100%; left:-20%; border:1px solid #B9CBD2; border-radius:50%; transform:rotate(-12deg);"></div>
                        </div>
                        @endif
                        <div class="p-5">
                        <h3 class="font-semibold text-white">{{ $pTitle }}</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ $pSummary }}</p>
                        <p class="mt-2 text-xs text-indigo-300">{{ $program->duration }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
