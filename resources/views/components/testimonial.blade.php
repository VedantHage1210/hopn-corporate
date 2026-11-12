@props(['testimonial'])
@php($lang = request()->route('lang', 'en'))
<blockquote class="hopn-lift-card" style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:8px; padding:0; transition:border-color 0.2s; overflow:hidden;">
    @if(!empty($testimonial->avatar))
    <div style="height:180px; overflow:hidden; background:#EEF3F5;">
        <img loading="lazy" decoding="async" src="{{ $testimonial->avatar }}" alt="{{ $testimonial->author_name }}" style="width:100%; height:100%; object-fit:cover; display:block;">
    </div>
    @endif
    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">

    {{-- Quote icon --}}
    <svg style="width:24px; height:24px; color:rgba(143,184,204,0.4); margin-bottom:16px; flex-shrink:0;" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>

    {{-- Quote text --}}
    <p style="flex:1; font-size:14px; line-height:1.75; color:#CBD5E1; font-style:italic; margin-bottom:20px;">
        "{{ $lang === 'ar' && !empty($testimonial->quote_ar) ? $testimonial->quote_ar : ($lang === 'de' && !empty($testimonial->quote_de) ? $testimonial->quote_de : $testimonial->quote_en) }}"
    </p>

    {{-- Author --}}
    <div style="display:flex; align-items:center; gap:12px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
        @if(!empty($testimonial->avatar))
              <img loading="lazy" decoding="async" src="{{ $testimonial->avatar }}" alt="{{ $testimonial->author_name }}"
                  style="width:56px; height:56px; border-radius:50%; object-fit:cover; flex-shrink:0; border:2px solid #D7DEE3;">
        @else
            <div style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:50%; background:rgba(143,184,204,0.15); border:1px solid rgba(143,184,204,0.3); font-size:14px; font-weight:700; color:#8FB8CC; flex-shrink:0;">
                {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
            </div>
        @endif
        <div>
            <p style="font-size:14px; font-weight:600; color:white; margin-bottom:2px;">{{ $testimonial->author_name }}</p>
            <p style="font-size:12px; color:#94A3B8;">{{ $testimonial->author_role }} · {{ $testimonial->company }}</p>
        </div>
    </div>
    </div>
</blockquote>
