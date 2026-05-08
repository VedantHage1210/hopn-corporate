@props(['service'])
@php($lang = request()->route('lang', 'en'))
@php
$name    = $lang === 'de' && !empty($service->name_de)    ? $service->name_de    : $service->name;
$summary = $lang === 'de' && !empty($service->summary_de) ? $service->summary_de : $service->summary;
@endphp

<article style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
         onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
         onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

    {{-- Top accent line --}}
    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

    {{-- Icon --}}
    <div style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:10px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); margin-bottom:16px;">
        <svg style="width:18px; height:18px; color:#818CF8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
    </div>

    {{-- Title --}}
    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px; line-height:1.4;">
        {{ $name }}
    </h3>

    {{-- Summary --}}
    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1;">
        {{ $summary }}
    </p>

    {{-- CTA --}}
    @if(!empty($service->slug))
    <a href="{{ route('services.show', ['lang' => $lang, 'slug' => $service->slug]) }}"
       style="display:inline-flex; align-items:center; gap:6px; margin-top:16px; font-size:13px; font-weight:600; color:#818CF8; text-decoration:none;"
       onmouseover="this.style.gap='10px'"
       onmouseout="this.style.gap='6px'">
        {{ $lang === 'de' ? 'Mehr lesen' : 'Read more' }}
        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
    @endif

</article>
