<x-layouts.public :title="$job->title">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(245,158,11,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.35); background:rgba(245,158,11,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F59E0B; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B;">Open Position</span>
            </div>
            <h1 style="font-size:clamp(24px,5vw,48px); font-weight:800; color:white; line-height:1.15; margin:0 auto 16px;">{{ $job->title }}</h1>
            <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center; margin-top:16px;">
                @if($job->location)
                <span style="font-size:13px; color:#94A3B8;">📍 {{ $job->location }}</span>
                @endif
                @if($job->type)
                <span style="font-size:13px; color:#94A3B8;">💼 {{ ucfirst($job->type) }}</span>
                @endif
                @if($job->department)
                <span style="font-size:13px; color:#94A3B8;">🏢 {{ $job->department }}</span>
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
                        <div style="font-size:16px; font-weight:700; color:#10B981; margin-bottom:8px;">✅ Application Submitted!</div>
                        <p style="font-size:14px; color:#94A3B8; margin-bottom:8px;">Your Application ID:</p>
                        <p style="font-size:20px; font-weight:800; color:#10B981; font-family:monospace; margin-bottom:12px;">{{ session('tracking_token') }}</p>
                        <p style="font-size:12px; color:#64748B; margin-bottom:12px;">Save this ID to track your application status.</p>
                        <a href="{{ route('careers.track', ['lang' => $lang, 'token' => session('tracking_token')]) }}"
                           style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; background:#10B981; color:white; font-size:13px; font-weight:600; text-decoration:none;">
                            Track My Application →
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
                            {{ $lang === 'de' ? 'Stellenbeschreibung' : 'Job Description' }}
                        </h2>
                        <div style="font-size:14px; color:#94A3B8; line-height:1.8;">
                            {!! nl2br(e($lang === 'de' && $job->description_de ? $job->description_de : $job->description)) !!}
                        </div>
                    </div>

                    {{-- Requirements --}}
                    @if($job->requirements || $job->requirements_de)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px;">
                        <h2 style="font-size:17px; font-weight:700; color:white; margin-bottom:16px;">
                            {{ $lang === 'de' ? 'Anforderungen' : 'Requirements' }}
                        </h2>
                        <div style="font-size:14px; color:#94A3B8; line-height:1.8;">
                            {!! nl2br(e($lang === 'de' && $job->requirements_de ? $job->requirements_de : $job->requirements)) !!}
                        </div>
                    </div>
                    @endif

                    {{-- Benefits --}}
                    @if($job->benefits || $job->benefits_de)
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px;">
                        <h2 style="font-size:17px; font-weight:700; color:white; margin-bottom:16px;">
                            {{ $lang === 'de' ? 'Vorteile' : 'Benefits' }}
                        </h2>
                        <div style="font-size:14px; color:#94A3B8; line-height:1.8;">
                            {!! nl2br(e($lang === 'de' && $job->benefits_de ? $job->benefits_de : $job->benefits)) !!}
                        </div>
                    </div>
                    @endif

                    {{-- Meta --}}
                    <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px; display:flex; flex-wrap:wrap; gap:12px;">
                        @if($job->location)
                        <span style="font-size:12px; color:#64748B;">📍 {{ $job->location }}</span>
                        @endif
                        @if($job->type)
                        <span style="font-size:12px; color:#64748B;">💼 {{ ucfirst($job->type) }}</span>
                        @endif
                        @if($job->department)
                        <span style="font-size:12px; color:#64748B;">🏢 {{ $job->department }}</span>
                        @endif
                        @if($job->close_date)
                        <span style="font-size:12px; color:#64748B;">📅 {{ $lang === 'de' ? 'Bewerbungsschluss' : 'Closes' }}: {{ \Carbon\Carbon::parse($job->close_date)->format('d M Y') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Right: Application Form --}}
                <div style="border:1px solid rgba(79,110,247,0.2); background:#111827; border-radius:16px; padding:28px; position:sticky; top:80px;">
                    <h2 style="font-size:18px; font-weight:700; color:white; margin-bottom:20px;">
                        {{ $lang === 'de' ? 'Jetzt bewerben' : 'Apply Now' }}
                    </h2>
                    <x-forms.apply :job="$job" :lang="$lang" />
                </div>

            </div>
        </div>
    </section>

</x-layouts.public>
