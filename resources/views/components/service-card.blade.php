@props(['service'])
@php($lang = request()->route('lang', 'en'))

<article class="hopn-lift-card" style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:8px; padding:24px; overflow:hidden;">


    <div style="width:36px; height:2px; background:#245B78; margin-bottom:20px;"></div>

    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px; line-height:1.4;">
        {{ $lang === 'ar' && !empty($service->name_ar) ? $service->name_ar : ($lang === 'de' && !empty($service->name_de) ? $service->name_de : $service->name) }}
    </h3>

    <p style="font-size:13px; color:#CBD5E1; line-height:1.7; flex:1;">
        {{ $lang === 'ar' && !empty($service->summary_ar) ? $service->summary_ar : ($lang === 'de' && !empty($service->summary_de) ? $service->summary_de : $service->summary) }}
    </p>

    @if(!empty($service->slug))
    <a href="{{ route('services.show', ['lang' => $lang, 'slug' => $service->slug]) }}"
       style="display:inline-flex; align-items:center; gap:6px; margin-top:16px; font-size:13px; font-weight:600; color:#8FB8CC; text-decoration:none;">
        {{ $lang === 'ar' ? 'اقرأ المزيد' : ($lang === 'de' ? 'Mehr lesen' : 'Read more') }}
        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
    @endif

</article>
