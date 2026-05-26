<x-layouts.public :title="'Application Status'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.35); background:rgba(245,158,11,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F59E0B; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B;">Application Tracking</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,48px); font-weight:800; color:white; line-height:1.15; margin:0 auto 20px;">
                @if($lang === 'ar') تتبع طلبك @elseif($lang === 'de') Bewerbungsstatus @else Track Your Application @endif
            </h1>
        </div>
    </section>

    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:680px; margin:0 auto;">

                {{-- Application Card --}}
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:20px; overflow:hidden; margin-bottom:24px;">
                    <div style="height:3px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6);"></div>
                    <div style="padding:32px;">
                        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
                            <div>
                                <p style="font-size:12px; color:#64748B; margin-bottom:4px;">Application ID</p>
                                <p style="font-size:20px; font-weight:800; color:#818CF8; font-family:monospace;">{{ $application->tracking_token }}</p>
                            </div>
                            @php
                                $statusColors = [
                                    'new'        => ['bg' => 'rgba(79,110,247,0.15)', 'border' => 'rgba(79,110,247,0.3)', 'color' => '#818CF8', 'label' => 'Under Review'],
                                    'reviewing'  => ['bg' => 'rgba(245,158,11,0.15)', 'border' => 'rgba(245,158,11,0.3)', 'color' => '#F59E0B', 'label' => 'Being Reviewed'],
                                    'shortlisted'=> ['bg' => 'rgba(6,182,212,0.15)',  'border' => 'rgba(6,182,212,0.3)',  'color' => '#06B6D4', 'label' => 'Shortlisted'],
                                    'interview'  => ['bg' => 'rgba(139,92,246,0.15)', 'border' => 'rgba(139,92,246,0.3)', 'color' => '#A78BFA', 'label' => 'Interview Stage'],
                                    'offered'    => ['bg' => 'rgba(16,185,129,0.15)', 'border' => 'rgba(16,185,129,0.3)', 'color' => '#10B981', 'label' => 'Offer Extended'],
                                    'hired'      => ['bg' => 'rgba(16,185,129,0.2)',  'border' => 'rgba(16,185,129,0.4)', 'color' => '#10B981', 'label' => 'Hired! 🎉'],
                                    'rejected'   => ['bg' => 'rgba(239,68,68,0.15)',  'border' => 'rgba(239,68,68,0.3)',  'color' => '#EF4444', 'label' => 'Not Selected'],
                                ];
                                $s = $statusColors[$application->status] ?? $statusColors['new'];
                            @endphp
                            <span style="font-size:13px; font-weight:700; padding:6px 16px; border-radius:999px; background:{{ $s['bg'] }}; border:1px solid {{ $s['border'] }}; color:{{ $s['color'] }};">
                                {{ $s['label'] }}
                            </span>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:4px;">Applicant</p>
                                <p style="font-size:15px; font-weight:600; color:white;">{{ $application->full_name }}</p>
                            </div>
                            <div>
                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:4px;">Position</p>
                                <p style="font-size:15px; font-weight:600; color:white;">{{ $application->job->title ?? '—' }}</p>
                            </div>
                            <div>
                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:4px;">Applied On</p>
                                <p style="font-size:15px; color:#94A3B8;">{{ $application->created_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:#475569; margin-bottom:4px;">Last Updated</p>
                                <p style="font-size:15px; color:#94A3B8;">{{ $application->updated_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Progress Steps --}}
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:20px; padding:32px; margin-bottom:24px;">
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:24px;">Application Progress</h3>
                    @php
                        $steps = [
                            ['key' => 'new',         'label' => 'Application Received', 'icon' => '📩'],
                            ['key' => 'reviewing',   'label' => 'Under Review',          'icon' => '🔍'],
                            ['key' => 'shortlisted', 'label' => 'Shortlisted',           'icon' => '⭐'],
                            ['key' => 'interview',   'label' => 'Interview',             'icon' => '🎯'],
                            ['key' => 'offered',     'label' => 'Offer',                 'icon' => '📋'],
                            ['key' => 'hired',       'label' => 'Hired',                 'icon' => '🎉'],
                        ];
                        $order = array_column($steps, 'key');
                        $currentIndex = array_search($application->status, $order);
                        if ($currentIndex === false) $currentIndex = 0;
                    @endphp
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        @foreach($steps as $i => $step)
                        @php
                            $done    = $i <= $currentIndex;
                            $active  = $i === $currentIndex;
                            $color   = $done ? '#10B981' : '#1E293B';
                            $border  = $done ? 'rgba(16,185,129,0.4)' : 'rgba(255,255,255,0.07)';
                            $txtColor = $done ? 'white' : '#475569';
                        @endphp
                        <div style="display:flex; align-items:center; gap:14px; padding:14px 16px; border-radius:10px; background:{{ $active ? 'rgba(16,185,129,0.08)' : 'rgba(255,255,255,0.02)' }}; border:1px solid {{ $border }};">
                            <div style="width:36px; height:36px; border-radius:50%; background:{{ $done ? 'rgba(16,185,129,0.2)' : 'rgba(255,255,255,0.05)' }}; border:1px solid {{ $border }}; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;">
                                @if($done) ✅ @else {{ $step['icon'] }} @endif
                            </div>
                            <div style="flex:1;">
                                <p style="font-size:14px; font-weight:{{ $active ? '700' : '500' }}; color:{{ $txtColor }};">{{ $step['label'] }}</p>
                                @if($active)
                                <p style="font-size:12px; color:#10B981; margin-top:2px;">← Current stage</p>
                                @endif
                            </div>
                            @if($done && !$active)
                            <span style="font-size:12px; color:#10B981;">✓</span>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Track Another --}}
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px;">
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:16px;">Track Another Application</h3>
                    <form method="GET" action="{{ route('careers.track', ['lang' => $lang, 'token' => '__TOKEN__']) }}"
                          onsubmit="this.action=this.action.replace('__TOKEN__', document.getElementById('track-input').value); return true;">
                        <div style="display:flex; gap:10px;">
                            <input type="text" id="track-input" placeholder="Enter your Application ID (e.g. ABCD-EFGH)"
                                   style="flex:1; padding:10px 14px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px;"
                                   onfocus="this.style.borderColor='#4F6EF7'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            <button type="submit"
                                    style="padding:10px 20px; border-radius:8px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; border:none; cursor:pointer;"
                                    onmouseover="this.style.opacity='0.88'"
                                    onmouseout="this.style.opacity='1'">
                                Track
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</x-layouts.public>
