@php
    $lang  = request()->route('lang', 'en');
    $title = $lang==='de' ? ($workshop->title_de ?: $workshop->title_en) : ($lang==='ar' ? ($workshop->title_ar ?: $workshop->title_en) : $workshop->title_en);
@endphp
<x-layouts.public :title="($lang==='ar'?'حجز':($lang==='de'?'Buchung':'Book')).': '.$title">

<section style="background:#030712; padding:80px 0 100px;">
    <div class="container-shell" style="max-width:640px; margin:0 auto;">
        <a href="{{ route('workshops.show', ['lang'=>$lang, 'slug'=>$workshop->slug]) }}" style="color:#94A3B8; font-size:13px; text-decoration:none;">← {{ $title }}</a>
        <h1 style="font-size:clamp(28px,4vw,40px); font-weight:900; color:white; margin:16px 0 8px;">
            @if($lang==='ar') احجز هذه الورشة @elseif($lang==='de') Diesen Workshop buchen @else Book this workshop @endif
        </h1>
        <p style="color:#94A3B8; font-size:15px; margin:0 0 32px;">
            @if($lang==='ar') سيتواصل فريقنا معك لتأكيد التفاصيل. @elseif($lang==='de') Unser Team meldet sich zur Bestätigung der Details bei dir. @else Our team will reach out to confirm the details. @endif
        </p>

        @if($errors->any())
            <div style="margin-bottom:24px; padding:16px 20px; border-radius:10px; background:rgba(244,63,94,0.1); border:1px solid rgba(244,63,94,0.3); color:#FDA4AF; font-size:14px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('workshops.book.store', ['lang'=>$lang, 'slug'=>$workshop->slug]) }}" class="card-panel" style="padding:32px; display:grid; gap:18px;">
            @csrf
            <x-turnstile />
            <div>
                <label for="hopn-name-f7b3a1" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Name *</label>
                <input id="hopn-name-f7b3a1" type="text" name="name" value="{{ old('name') }}" required
                    style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px;">
                <div>
                    <label for="hopn-email-f7b3a2" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Email *</label>
                    <input id="hopn-email-f7b3a2" type="email" name="email" value="{{ old('email') }}" required
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
                <div>
                    <label for="hopn-phone-f7b3a3" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Phone</label>
                    <input id="hopn-phone-f7b3a3" type="text" name="phone" value="{{ old('phone') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px;">
                <div>
                    <label for="hopn-company-f7b3a4" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Company</label>
                    <input id="hopn-company-f7b3a4" type="text" name="company" value="{{ old('company') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
                <div>
                    <label for="hopn-participants-f7b3a5" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Participants</label>
                    <input id="hopn-participants-f7b3a5" type="number" name="participants" min="1" value="{{ old('participants', 1) }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px;">
                <div>
                    <label for="hopn-preferred-format-f7b3a6" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Preferred format</label>
                    <select id="hopn-preferred-format-f7b3a6" name="preferred_format" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                        <option value="">—</option>
                        <option value="on_site" @selected(old('preferred_format')==='on_site')>On-site</option>
                        <option value="remote" @selected(old('preferred_format')==='remote')>Remote</option>
                        <option value="hybrid" @selected(old('preferred_format')==='hybrid')>Hybrid</option>
                    </select>
                </div>
                <div>
                    <label for="hopn-preferred-date-f7b3a7" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Preferred date</label>
                    <input id="hopn-preferred-date-f7b3a7" type="date" name="preferred_date" value="{{ old('preferred_date') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
            </div>
            <div>
                <label for="hopn-message-f7b3a8" style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Message</label>
                <textarea id="hopn-message-f7b3a8" name="message" rows="4"
                    style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">{{ old('message') }}</textarea>
            </div>
            <button type="submit"
                style="margin-top:8px; padding:14px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:700; border:none; cursor:pointer;">
                @if($lang==='ar') إرسال طلب الحجز @elseif($lang==='de') Buchungsanfrage senden @else Send booking request @endif
            </button>
        </form>
    </div>
</section>

</x-layouts.public>
