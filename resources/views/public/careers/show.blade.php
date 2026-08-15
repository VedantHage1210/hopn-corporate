@php
    $lang = request()->route('lang', 'en');
    $jobTitle = $lang === 'ar' && $job->title_ar ? $job->title_ar : ($lang === 'de' && $job->title_de ? $job->title_de : $job->title);
@endphp
<x-layouts.public :title="$jobTitle">

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(245,158,11,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.35); background:rgba(245,158,11,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F59E0B; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B;">
                    @if($lang === 'ar') منصب شاغر @elseif($lang === 'de') Offene Stelle @else Open Position @endif
                </span>
            </div>
            <h1 style="font-size:clamp(24px,5vw,48px); font-weight:800; color:white; line-height:1.15; margin:0 auto 16px;">{{ $jobTitle }}</h1>
            <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center; margin-top:16px;">
                @if($job->location)
                <span style="font-size:13px; color:#CBD5E1;">📍 {{ $job->location }}</span>
                @endif
                @if($job->type)
                <span style="font-size:13px; color:#CBD5E1;">💼 {{ ucfirst($job->type) }}</span>
                @endif
                @if($job->department)
                <span style="font-size:13px; color:#CBD5E1;">🏢 {{ $job->department }}</span>
                @endif
            </div>
        </div>
    </section>

    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:32px; align-items:start;">

                {{-- Left: Job Details --}}
                <div style="display:flex; flex-direction:column; gap:20px;">

                    {{-- Tracking success --}}
                    @if(session('tracking_token'))
                    <div style="padding:20px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:12px;">
                        <div style="font-size:16px; font-weight:700; color:#10B981; margin-bottom:8px;">
                            ✅ @if($lang === 'ar') تم إرسال الطلب! @elseif($lang === 'de') Bewerbung eingereicht! @else Application Submitted! @endif
                        </div>
                        <p style="font-size:14px; color:#CBD5E1; margin-bottom:8px;">
                            @if($lang === 'ar') رقم طلبك: @elseif($lang === 'de') Ihre Bewerbungs-ID: @else Your Application ID: @endif
                        </p>
                        <p style="font-size:20px; font-weight:800; color:#10B981; font-family:monospace; margin-bottom:12px;">{{ session('tracking_token') }}</p>
                        <p style="font-size:12px; color:#CBD5E1; margin-bottom:12px;">
                            @if($lang === 'ar') احفظ هذا الرقم لتتبع حالة طلبك. @elseif($lang === 'de') Speichern Sie diese ID, um Ihren Bewerbungsstatus zu verfolgen. @else Save this ID to track your application status. @endif
                        </p>
                       <a href="{{ route('careers.track', ['lang' => $lang, 'token' => session('tracking_token')]) }}"
                           style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; background:#10B981; color:white; font-size:13px; font-weight:600; text-decoration:none;">
                            @if($lang === 'ar') تتبع طلبي @elseif($lang === 'de') Meine Bewerbung verfolgen @else Track My Application @endif →
                        </a>
                    </div>
                    @endif

                    @if(session('status') && !session('tracking_token'))
                    <div style="padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px;">
                        ✅ {{ session('status') }}
                    </div>
                    @endif

                    {{-- Description --}}
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px;">
                        <h2 style="font-size:17px; font-weight:700; color:white; margin-bottom:16px;">
                            @if($lang === 'ar') الوصف الوظيفي @elseif($lang === 'de') Stellenbeschreibung @else Job Description @endif
                        </h2>
                        <div style="font-size:14px; color:#CBD5E1; line-height:1.8;" @if($lang === 'ar') dir="rtl" @endif>
                            @if($lang === 'ar' && $job->description_ar)
                                {!! nl2br(e($job->description_ar)) !!}
                            @elseif($lang === 'de' && $job->description_de)
                                {!! nl2br(e($job->description_de)) !!}
                            @else
                                {!! nl2br(e($job->description)) !!}
                            @endif
                        </div>
                    </div>

                    {{-- Requirements --}}
                    @if($job->requirements || $job->requirements_de || $job->requirements_ar)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px;">
                        <h2 style="font-size:17px; font-weight:700; color:white; margin-bottom:16px;">
                            @if($lang === 'ar') المتطلبات @elseif($lang === 'de') Anforderungen @else Requirements @endif
                        </h2>
                        <div style="font-size:14px; color:#CBD5E1; line-height:1.8;" @if($lang === 'ar') dir="rtl" @endif>
                            @if($lang === 'ar' && $job->requirements_ar)
                                {!! nl2br(e($job->requirements_ar)) !!}
                            @elseif($lang === 'de' && $job->requirements_de)
                                {!! nl2br(e($job->requirements_de)) !!}
                            @else
                                {!! nl2br(e($job->requirements)) !!}
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Benefits --}}
                    @if($job->benefits || $job->benefits_de || $job->benefits_ar)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px;">
                        <h2 style="font-size:17px; font-weight:700; color:white; margin-bottom:16px;">
                            @if($lang === 'ar') المزايا @elseif($lang === 'de') Vorteile @else Benefits @endif
                        </h2>
                        <div style="font-size:14px; color:#CBD5E1; line-height:1.8;" @if($lang === 'ar') dir="rtl" @endif>
                            @if($lang === 'ar' && $job->benefits_ar)
                                {!! nl2br(e($job->benefits_ar)) !!}
                            @elseif($lang === 'de' && $job->benefits_de)
                                {!! nl2br(e($job->benefits_de)) !!}
                            @else
                                {!! nl2br(e($job->benefits)) !!}
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Meta --}}
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px; display:flex; flex-wrap:wrap; gap:12px;">
                        @if($job->location)
                        <span style="font-size:12px; color:#CBD5E1;">📍 {{ $job->location }}</span>
                        @endif
                        @if($job->type)
                        <span style="font-size:12px; color:#CBD5E1;">💼 {{ ucfirst($job->type) }}</span>
                        @endif
                        @if($job->department)
                        <span style="font-size:12px; color:#CBD5E1;">🏢 {{ $job->department }}</span>
                        @endif
                        @if($job->close_date)
                        <span style="font-size:12px; color:#CBD5E1;">📅 @if($lang === 'ar') يغلق في @elseif($lang === 'de') Bewerbungsschluss @else Closes @endif: {{ \Carbon\Carbon::parse($job->close_date)->format('d M Y') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Right: Application Form --}}
                <div style="border:1px solid rgba(79,110,247,0.2); background:#111827; border-radius:16px; padding:28px; position:sticky; top:80px;">
                    <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:20px;">
                        @if($lang === 'ar') قدم الآن @elseif($lang === 'de') Jetzt bewerben @else Apply Now @endif
                    </h2>
                    <x-forms.apply :job="$job" :lang="$lang" />
                </div>

            </div>
        </div>
    </section>

</x-layouts.public>
