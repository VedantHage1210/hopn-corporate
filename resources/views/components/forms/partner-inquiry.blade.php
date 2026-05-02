@props(['lang' => 'en'])
<form method="POST" action="{{ route('leads.partner', ['lang' => $lang]) }}" class="space-y-4">
    @csrf
    <input type="text" name="honeypot" style="display:none">
    <input type="hidden" name="utm_source" value="{{ request('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ request('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ request('utm_campaign') }}">

    @if(session('status'))
        <div class="rounded-lg bg-green-900/40 border border-green-700 px-4 py-3 text-sm text-green-300">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'de' ? 'Vollständiger Name' : 'Full Name' }} <span class="text-rose-400">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'de' ? 'E-Mail-Adresse' : 'Email Address' }} <span class="text-rose-400">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'de' ? 'Unternehmen' : 'Company' }} <span class="text-rose-400">*</span></label>
            <input type="text" name="company" value="{{ old('company') }}" required
                class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
            @error('company')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'de' ? 'Partnertyp' : 'Partner Type' }}</label>
            <select name="partner_type" class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                <option value="">{{ $lang === 'de' ? 'Bitte wählen' : 'Select type' }}</option>
                <option value="customer" @selected(old('partner_type') === 'customer')>{{ $lang === 'de' ? 'Kunde' : 'Customer' }}</option>
                <option value="tech_partner" @selected(old('partner_type') === 'tech_partner')>{{ $lang === 'de' ? 'Technologiepartner' : 'Technology Partner' }}</option>
                <option value="academic" @selected(old('partner_type') === 'academic')>{{ $lang === 'de' ? 'Akademischer Partner' : 'Academic Partner' }}</option>
                <option value="delivery" @selected(old('partner_type') === 'delivery')>{{ $lang === 'de' ? 'Lieferpartner' : 'Delivery Partner' }}</option>
            </select>
            @error('partner_type')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-200">{{ $lang === 'de' ? 'Nachricht' : 'Message' }} <span class="text-rose-400">*</span></label>
        <textarea name="message" rows="5" required
            class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">{{ old('message') }}</textarea>
        @error('message')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-start gap-2">
        <input type="checkbox" name="gdpr" id="gdpr_partner" value="1" class="mt-1" required>
        <label for="gdpr_partner" class="text-xs text-slate-400">
            {{ $lang === 'de' ? 'Ich stimme der Datenschutzerklärung zu.' : 'I agree to the Privacy Policy.' }}
            <a href="{{ route('legal.privacy', ['lang' => $lang]) }}" class="text-indigo-300 hover:underline" target="_blank">
                {{ $lang === 'de' ? 'Datenschutzerklärung' : 'Privacy Policy' }}
            </a>
        </label>
    </div>
    @error('gdpr')<p class="text-xs text-rose-300">{{ $message }}</p>@enderror

    <button type="submit" class="btn-primary w-full">
        {{ $lang === 'de' ? 'Anfrage absenden' : 'Send Inquiry' }}
    </button>
</form>
