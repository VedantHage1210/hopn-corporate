@props(['service'])
@php($lang = request()->route('lang', 'en'))

@php
$icons = [
    'consulting'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
    'ai'           => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
    'data'         => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2 1 3 3 3h10c2 0 3-1 3-3V7M4 7c0-2 1-3 3-3h10c2 0 3 1 3 3M4 7h16M9 11h6M9 15h4"/>',
    'analytics'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>',
    'digital-twin' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>',
    'robotics'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
    'training'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
    'hiring'       => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>',
    'default'      => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
];

$slug = $service->slug ?? '';
$iconKey = 'default';
foreach(array_keys($icons) as $key) {
    if(str_contains($slug, $key)) { $iconKey = $key; break; }
}
$iconSvg = $icons[$iconKey];

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
            {!! $iconSvg !!}
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
