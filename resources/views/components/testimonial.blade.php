@props(['testimonial'])
@php($lang = request()->route('lang', 'en'))

<blockquote style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
            onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
            onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

    {{-- Quote icon --}}
    <svg style="width:24px; height:24px; color:rgba(79,110,247,0.4); margin-bottom:16px; flex-shrink:0;" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>

    {{-- Quote text --}}
    <p style="flex:1; font-size:14px; line-height:1.75; color:#94A3B8; font-style:italic; margin-bottom:20px;">
        "{{ $lang === 'de' && !empty($testimonial->quote_de) ? $testimonial->quote_de : $testimonial->quote_en }}"
    </p>

    {{-- Author --}}
    <footer style="display:flex; align-items:center; gap:12px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
        <div style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:50%; background:rgba(79,110,247,0.15); border:1px solid rgba(79,110,247,0.3); font-size:14px; font-weight:700; color:#818CF8; flex-shrink:0;">
            {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
        </div>
        <div>
            <p style="font-size:14px; font-weight:600; color:white; margin-bottom:2px;">{{ $testimonial->author_name }}</p>
            <p style="font-size:12px; color:#475569;">{{ $testimonial->author_role }} · {{ $testimonial->company }}</p>
        </div>
    </footer>

</blockquote>
