@props(['caseStudy'])
@php
    $lang = request()->route('lang', 'en');
    $suffix = ($lang === 'ar') ? '_ar' : (($lang === 'de') ? '_de' : '_en');
    $title = $caseStudy->{'title' . $suffix} ?? $caseStudy->title_en;
@endphp

<article style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px;">
    @if(!empty($caseStudy->image_url))
    <div style="height:150px; overflow:hidden; border-radius:12px; margin-bottom:16px;">
        <img src="{{ $caseStudy->image_url }}" alt="{{ $title }}" style="width:100%; height:100%; object-fit:cover;">
    </div>
    @endif

    <h3 style="font-size:15px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px;">{{ $title }}</h3>

    <a href="{{ route('case-studies.show', ['lang' => $lang, 'slug' => $caseStudy->slug]) }}"
       style="margin-top:16px; font-size:13px; font-weight:600; color:#A78BFA; text-decoration:none;">
        Read case study →
    </a>
</article>
