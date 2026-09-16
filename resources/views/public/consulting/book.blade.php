@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'Book '.$expert->name">

<section style="background:#030712; padding:80px 0 100px;">
    <div class="container-shell" style="max-width:620px; margin:0 auto;">
        <a href="{{ route('consulting.expert', ['lang'=>$lang, 'id'=>$expert->id]) }}" style="color:#94A3B8; font-size:13px; text-decoration:none;">← {{ $expert->name }}</a>
        <h1 style="font-size:clamp(26px,4vw,38px); font-weight:900; color:white; margin:16px 0 32px;">
            @if($lang==='ar') احجز مكالمة مع {{ $expert->name }} @elseif($lang==='de') Anruf mit {{ $expert->name }} buchen @else Book a call with {{ $expert->name }} @endif
        </h1>

        @if($errors->any())
            <div style="margin-bottom:24px; padding:16px 20px; border-radius:10px; background:rgba(244,63,94,0.1); border:1px solid rgba(244,63,94,0.3); color:#FDA4AF; font-size:14px;">
                <ul style="margin:0; padding-left:18px;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('consulting.book.store', ['lang'=>$lang, 'id'=>$expert->id]) }}" class="card-panel" style="padding:32px; display:grid; gap:18px;">
            @csrf
            @if($packages->count())
            <div>
                <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Package</label>
                <select name="consulting_package_id" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                    <option value="">—</option>
                    @foreach($packages as $pkg)
                        <option value="{{ $pkg->id }}">{{ $lang==='de' ? ($pkg->name_de ?: $pkg->name_en) : ($lang==='ar' ? ($pkg->name_ar ?: $pkg->name_en) : $pkg->name_en) }} ({{ $pkg->duration_minutes }} min)</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div>
                <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px;">
                <div>
                    <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:14px;">
                <div>
                    <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Company</label>
                    <input type="text" name="company" value="{{ old('company') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Preferred date</label>
                    <input type="date" name="preferred_date" value="{{ old('preferred_date') }}"
                        style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
                </div>
            </div>
            <div>
                <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Preferred time slot</label>
                <input type="text" name="preferred_time_slot" value="{{ old('preferred_time_slot') }}" placeholder="e.g. Tue 14:00–15:00 CET"
                    style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">
            </div>
            <div>
                <label style="display:block; font-size:13px; color:#CBD5E1; margin-bottom:6px;">Message</label>
                <textarea name="message" rows="4" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid rgba(148,163,184,0.25); background:#0B1120; color:white; font-size:14px;">{{ old('message') }}</textarea>
            </div>
            <button type="submit" style="margin-top:8px; padding:14px; border-radius:10px; background:#10B981; color:#022C22; font-size:15px; font-weight:700; border:none; cursor:pointer;">
                @if($lang==='ar') إرسال طلب الحجز @elseif($lang==='de') Buchungsanfrage senden @else Send booking request @endif
            </button>
        </form>
    </div>
</section>

</x-layouts.public>
