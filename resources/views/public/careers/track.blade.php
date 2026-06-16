@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'تتبع طلبك':($lang==='de'?'Bewerbungsstatus':'Track Application')">

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(245,158,11,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:600px; height:400px; background:radial-gradient(ellipse, rgba(245,158,11,0.06) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.3); background:rgba(245,158,11,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#F59E0B; display:inline-block; box-shadow:0 0 8px #F59E0B;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#F59E0B;">
                @if($lang==='ar') تتبع الطلب @elseif($lang==='de') Bewerbungsverfolgung @else Application Tracking @endif
            </span>
        </div>
        <h1 style="font-size:clamp(28px,5vw,52px); font-weight:900; color:white; letter-spacing:-2px; margin:0 auto 16px;">
            @if($lang==='ar') تتبع طلبك @elseif($lang==='de') Bewerbungsstatus @else Track Your Application @endif
        </h1>
    </div>
</section>

{{-- Content --}}
<section style="padding:40px 0 100px; background:#050A14;">
    <div class="container-shell">
        <div style="max-width:700px; margin:0 auto;">

            {{-- Application Card --}}
            <div style="border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:20px; overflow:hidden; margin-bottom:20px; position:relative;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#4F6EF7,#8B5CF6,#06B6D4);"></div>
                <div style="padding:32px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
                        <div>
                            <p style="font-size:12px; color:#64748B; margin-bottom:4px; text-transform:uppercase; letter-spacing:0.08em;">Application ID</p>
                            <p style="font-size:22px; font-weight:900; color:#818CF8; font-family:monospace; letter-spacing:2px;">{{ $application->tracking_token }}</p>
                        </div>
                        @php
                        $statusMap = [
                            'new'         => ['bg'=>'rgba(79,110,247,0.15)','border'=>'rgba(79,110,247,0.3)','color'=>'#818CF8','en'=>'Under Review','de'=>'In Prüfung','ar'=>'قيد المراجعة'],
                            'reviewed'    => ['bg'=>'rgba(245,158,11,0.15)','border'=>'rgba(245,158,11,0.3)','color'=>'#F59E0B','en'=>'Being Reviewed','de'=>'Wird geprüft','ar'=>'يتم مراجعته'],
                            'reviewing'   => ['bg'=>'rgba(245,158,11,0.15)','border'=>'rgba(245,158,11,0.3)','color'=>'#F59E0B','en'=>'Being Reviewed','de'=>'Wird geprüft','ar'=>'يتم مراجعته'],
                            'shortlisted' => ['bg'=>'rgba(6,182,212,0.15)','border'=>'rgba(6,182,212,0.3)','color'=>'#06B6D4','en'=>'Shortlisted','de'=>'Vorselektiert','ar'=>'تم اختياره'],
                            'interview'   => ['bg'=>'rgba(139,92,246,0.15)','border'=>'rgba(139,92,246,0.3)','color'=>'#A78BFA','en'=>'Interview Stage','de'=>'Interviewphase','ar'=>'مرحلة المقابلة'],
                            'offered'     => ['bg'=>'rgba(16,185,129,0.15)','border'=>'rgba(16,185,129,0.3)','color'=>'#10B981','en'=>'Offer Extended','de'=>'Angebot erhalten','ar'=>'تم تقديم العرض'],
                            'hired'       => ['bg'=>'rgba(16,185,129,0.2)','border'=>'rgba(16,185,129,0.4)','color'=>'#10B981','en'=>'Hired! 🎉','de'=>'Eingestellt! 🎉','ar'=>'تم التوظيف! 🎉'],
                            'rejected'    => ['bg'=>'rgba(239,68,68,0.15)','border'=>'rgba(239,68,68,0.3)','color'=>'#EF4444','en'=>'Not Selected','de'=>'Nicht ausgewählt','ar'=>'لم يتم الاختيار'],
                        ];
                        $s = $statusMap[$application->status] ?? $statusMap['new'];
                        @endphp
                        <span style="font-size:14px; font-weight:700; padding:8px 18px; border-radius:999px; background:{{ $s['bg'] }}; border:1px solid {{ $s['border'] }}; color:{{ $s['color'] }};">
                            {{ $s[$lang] ?? $s['en'] }}
                        </span>
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#334155; margin-bottom:6px;">
                                @if($lang==='ar') المتقدم @elseif($lang==='de') Bewerber @else Applicant @endif
                            </p>
                            <p style="font-size:16px; font-weight:600; color:white; margin:0;">{{ $application->full_name }}</p>
                        </div>
                        <div>
                            <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#334155; margin-bottom:6px;">
                                @if($lang==='ar') المنصب @elseif($lang==='de') Position @else Position @endif
                            </p>
                            <p style="font-size:16px; font-weight:600; color:white; margin:0;">{{ $application->job?->title ?? '—' }}</p>
                        </div>
                        <div>
                            <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#334155; margin-bottom:6px;">
                                @if($lang==='ar') تاريخ التقديم @elseif($lang==='de') Bewerbungsdatum @else Applied On @endif
                            </p>
                            <p style="font-size:15px; color:#94A3B8; margin:0;">{{ $application->created_at->format('d M Y') }}</p>
                        </div>
                        <div>
                            <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#334155; margin-bottom:6px;">
                                @if($lang==='ar') آخر تحديث @elseif($lang==='de') Zuletzt aktualisiert @else Last Updated @endif
                            </p>
                            <p style="font-size:15px; color:#94A3B8; margin:0;">{{ $application->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Progress Steps --}}
            <div style="border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:20px; padding:32px; margin-bottom:20px;">
                <h3 style="font-size:17px; font-weight:700; color:white; margin-bottom:24px; letter-spacing:-0.5px;">
                    @if($lang==='ar') تقدم الطلب @elseif($lang==='de') Bewerbungsfortschritt @else Application Progress @endif
                </h3>
                @php
                $steps = [
                    ['key'=>'new',         'en'=>'Application Received', 'de'=>'Bewerbung eingegangen', 'ar'=>'تم استلام الطلب',    'icon'=>'📩'],
                    ['key'=>'reviewing',   'en'=>'Under Review',          'de'=>'In Prüfung',            'ar'=>'قيد المراجعة',       'icon'=>'🔍'],
                    ['key'=>'shortlisted', 'en'=>'Shortlisted',           'de'=>'Vorselektiert',         'ar'=>'تم الاختيار الأولي', 'icon'=>'⭐'],
                    ['key'=>'interview',   'en'=>'Interview',             'de'=>'Vorstellungsgespräch',  'ar'=>'المقابلة',           'icon'=>'🎯'],
                    ['key'=>'offered',     'en'=>'Offer Extended',        'de'=>'Angebot erhalten',      'ar'=>'تم تقديم العرض',     'icon'=>'📋'],
                    ['key'=>'hired',       'en'=>'Hired',                 'de'=>'Eingestellt',           'ar'=>'تم التوظيف',         'icon'=>'🎉'],
                ];
                $statusOrder = ['new','reviewed','reviewing','shortlisted','interview','offered','hired'];
                $stepKeys    = array_column($steps, 'key');
                $currentKey  = $application->status;
                // Map reviewed → reviewing for display
                if ($currentKey === 'reviewed') $currentKey = 'reviewing';
                $currentIndex = array_search($currentKey, $stepKeys);
                if ($currentIndex === false) $currentIndex = 0;
                @endphp
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach($steps as $i => $step)
                    @php
                    $done    = $i <= $currentIndex;
                    $active  = $i === $currentIndex;
                    $c       = $done ? '#10B981' : '#1E293B';
                    $border  = $done ? 'rgba(16,185,129,0.35)' : 'rgba(255,255,255,0.06)';
                    $txt     = $done ? 'white' : '#475569';
                    @endphp
                    <div style="display:flex; align-items:center; gap:14px; padding:14px 16px; border-radius:12px; background:{{ $active?'rgba(16,185,129,0.08)':'rgba(255,255,255,0.02)' }}; border:1px solid {{ $border }}; transition:all 0.2s;">
                        <div style="width:36px; height:36px; border-radius:50%; background:{{ $done?'rgba(16,185,129,0.2)':'rgba(255,255,255,0.05)' }}; border:1px solid {{ $border }}; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">
                            @if($done) ✅ @else {{ $step['icon'] }} @endif
                        </div>
                        <div style="flex:1;">
                            <p style="font-size:14px; font-weight:{{ $active?'700':'500' }}; color:{{ $txt }}; margin:0;">{{ $step[$lang] ?? $step['en'] }}</p>
                            @if($active)
                            <p style="font-size:12px; color:#10B981; margin:4px 0 0;">
                                @if($lang==='ar') ← المرحلة الحالية @elseif($lang==='de') ← Aktuelle Phase @else ← Current stage @endif
                            </p>
                            @endif
                        </div>
                        @if($done && !$active)
                        <span style="font-size:14px; color:#10B981;">✓</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Track Another --}}
            <div style="border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:16px; padding:28px;">
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:16px;">
                    @if($lang==='ar') تتبع طلب آخر @elseif($lang==='de') Andere Bewerbung verfolgen @else Track Another Application @endif
                </h3>
                <form method="GET"
                  onsubmit="event.preventDefault(); var t=document.getElementById('track-input').value.trim(); if(t){ window.location.href='/{{ $lang }}/careers/track/'+t; }"
                    <div style="display:flex; gap:10px;">
                        <input type="text" id="track-input"
                               placeholder="{{ $lang==='ar'?'أدخل معرف الطلب (مثال: ABCD-EFGH)':($lang==='de'?'Bewerbungs-ID eingeben':'Enter Application ID (e.g. ABCD-EFGH)') }}"
                               style="flex:1; padding:12px 16px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; outline:none;"
                               onfocus="this.style.borderColor='rgba(245,158,11,0.5)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                        <button type="submit"
                                style="padding:12px 24px; border-radius:10px; background:#F59E0B; color:white; font-size:14px; font-weight:700; border:none; cursor:pointer; white-space:nowrap; transition:all 0.2s;"
                                onmouseover="this.style.opacity='0.88'"
                                onmouseout="this.style.opacity='1'">
                            @if($lang==='ar') تتبع @elseif($lang==='de') Verfolgen @else Track @endif
                        </button>
                    </div>
                </form>
                <div style="margin-top:20px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.06);">
                    <a href="{{ route('careers.index', ['lang'=>$lang]) }}"
                       style="font-size:14px; color:#818CF8; text-decoration:none; display:inline-flex; align-items:center; gap:6px;"
                       onmouseover="this.style.opacity='0.7'"
                       onmouseout="this.style.opacity='1'">
                        ← @if($lang==='ar') العودة للوظائف @elseif($lang==='de') Zurück zu Jobs @else Back to Jobs @endif
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

</x-layouts.public>
