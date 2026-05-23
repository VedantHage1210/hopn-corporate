<x-layouts.public :title="'Careers'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(245,158,11,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(245,158,11,0.35); background:rgba(245,158,11,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F59E0B; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B;">Join Our Team</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') وظائف في HOPn @elseif($lang === 'de') Karriere bei HOPn @else Careers at HOPn @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') انضم إلى فريقنا من خبراء الذكاء الاصطناعي والبيانات والابتكار.
                @elseif($lang === 'de') Werden Sie Teil unseres Teams aus KI-, Daten- und Innovationsexperten.
                @else Join our team of AI, data, robotics, and innovation experts building the future.
                @endif
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">Open Positions</span>
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                    @if($lang === 'ar') الوظائف المتاحة @elseif($lang === 'de') Offene Stellen @else Open Positions @endif
                </h2>
            </div>

            @forelse($jobs as $job)
            <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:14px; padding:20px 24px; margin-bottom:12px; transition:all 0.25s;"
                 onmouseover="this.style.borderColor='rgba(245,158,11,0.3)'; this.style.background='#141D2E'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:6px;">{{ $job->title }}</h3>
                    <div style="display:flex; flex-wrap:wrap; gap:8px; align-items:center;">
                        @if($job->location)
                        <span style="font-size:12px; color:#64748B;">📍 {{ $job->location }}</span>
                        @endif
                        @if($job->type)
                        <span style="font-size:11px; font-weight:600; padding:2px 10px; border-radius:999px; background:rgba(245,158,11,0.1); border:1px solid rgba(245,158,11,0.2); color:#F59E0B;">
                            {{ ucfirst($job->type) }}
                        </span>
                        @endif
                        @if($job->department)
                        <span style="font-size:11px; font-weight:600; padding:2px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8;">
                            {{ $job->department }}
                        </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('careers.show', ['lang' => $lang, 'slug' => $job->slug]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:10px 20px; border-radius:8px; background:#F59E0B; color:white; font-size:13px; font-weight:600; text-decoration:none; white-space:nowrap; flex-shrink:0;"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تقدم الآن @elseif($lang === 'de') Jetzt bewerben @else Apply Now @endif →
                </a>
            </div>
            @empty
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">💼</div>
                <p style="font-size:16px;">
                    @if($lang === 'ar') لا توجد وظائف متاحة حالياً.
                    @elseif($lang === 'de') Derzeit keine offenen Stellen.
                    @else No open positions at this time. Check back soon!
                    @endif
                </p>
            </div>
            @endforelse

            @if($jobs->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">{{ $jobs->links() }}</div>
            @endif
        </div>
    </section>

    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(245,158,11,0.2); background:rgba(245,158,11,0.05); border-radius:24px; padding:48px 32px;">
                <h2 style="font-size:28px; font-weight:800; color:white; margin-bottom:16px;">Don't See Your Role?</h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:28px;">Send us your CV and we'll keep you in mind for future opportunities.</p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#F59E0B; color:white; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    Send Your CV →
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
