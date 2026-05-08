@props(['caseStudy'])
@php($lang = request()->route('lang', 'en'))

@php
$title     = $lang === 'de' && !empty($caseStudy->title_de)     ? $caseStudy->title_de     : $caseStudy->title;
$challenge = $lang === 'de' && !empty($caseStudy->challenge_de) ? $caseStudy->challenge_de : ($caseStudy->challenge ?? '');
$result    = $caseStudy->result ?? $caseStudy->outcome ?? null;
@endphp

<article style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
         onmouseover="this.style.borderColor='rgba(139,92,246,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
         onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

    {{-- Top accent line --}}
    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #8B5CF6, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

    {{-- Industry Badge --}}
    @if(!empty($caseStudy->industry))
    <div style="margin-bottom:16px;">
        <span style="display:inline-flex; align-items:center; padding:3px 10px; border-radius:999px; background:rgba(139,92,246,0.1); border:1px solid rgba(139,92,246,0.25); font-size:11px; font-weight:600; color:#A78BFA; letter-spacing:0.05em;">
            {{ $caseStudy->industry }}
        </span>
    </div>
    @endif

    {{-- Title --}}
    <h3 style="font-size:15px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">
        {{ $title }}
    </h3>

    {{-- Challenge --}}
    @if($challenge)
    <div style="margin-bottom:12px;">
        <span style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#475569;">Challenge</span>
        <p style="font-size:13px; color:#64748B; line-height:1.6; margin-top:4px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
            {{ $challenge }}
        </p>
    </div>
    @endif

    {{-- Result/Metric --}}
    @if($result)
    <div style="margin-bottom:16px; padding:10px 14px; background:rgba(139,92,246,0.06); border:1px solid rgba(139,92,246,0.15); border-radius:8px;">
        <span style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#7C3AED;">Result</span>
        <p style="font-size:13px; color:#C4B5FD; margin-top:3px; line-height:1.5;">{{ $result }}</p>
    </div>
    @endif

    <div style="flex:1;"></div>

    {{-- CTA --}}
    @if(!empty($caseStudy->slug))
    <a href="{{ route('case-studies.show', ['lang' => $lang, 'slug' => $caseStudy->slug]) }}"
       style="display:inline-flex; align-items:center; gap:6px; margin-top:16px; font-size:13px; font-weight:600; color:#A78BFA; text-decoration:none; transition:gap 0.2s;"
       onmouseover="this.style.gap='10px'"
       onmouseout="this.style.gap='6px'">
        {{ $lang === 'de' ? 'Fallstudie lesen' : 'Read case study' }}
        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
    @endif

</article>
