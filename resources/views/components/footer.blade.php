@php($lang = request()->route('lang', 'en'))
<footer style="background:#060B17; border-top:1px solid rgba(255,255,255,0.06); padding-top:64px;">

    {{-- Main Footer Grid --}}
    <div class="container-shell" style="padding-bottom:48px;">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:40px;">

            {{-- Brand Column --}}
            <div style="grid-column: span 2;">
                <a href="{{ route('home', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; text-decoration:none; margin-bottom:16px;">
                    <span style="display:flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:8px; background:#4F6EF7; color:white; font-size:14px; font-weight:900;">H</span>
                    <span style="font-size:18px; font-weight:700; color:white;">HOPn</span>
                </a>
                <p style="font-size:13px; color:#64748B; line-height:1.7; max-width:220px; margin-bottom:20px;">
                    European innovation hub connecting business, education, and research.
                </p>
                <div style="font-size:13px; color:#64748B; margin-bottom:8px;">
                    📧 <a href="mailto:contact@hopn.eu" style="color:#818CF8; text-decoration:none;">contact@hopn.eu</a>
                </div>
                <div style="font-size:13px; color:#64748B; margin-bottom:24px;">
                    📍 Berlin, Germany
                </div>
                {{-- Social Icons --}}
                <div style="display:flex; gap:10px;">
                    @foreach([
                        ['href' => '#', 'label' => 'LinkedIn', 'icon' => '<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/>'],
                        ['href' => '#', 'label' => 'Twitter', 'icon' => '<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>'],
                        ['href' => '#', 'label' => 'GitHub',  'icon' => '<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/>'],
                    ] as $social)
                    <a href="{{ $social['href'] }}"
                       aria-label="{{ $social['label'] }}"
                       style="display:flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.04); color:#64748B; text-decoration:none; transition:all 0.2s;"
                       onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.color='#818CF8'; this.style.background='rgba(79,110,247,0.1)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.color='#64748B'; this.style.background='rgba(255,255,255,0.04)'">
                        <svg style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            {!! $social['icon'] !!}
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Solutions --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">Solutions</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach([
                        ['route' => 'services.index',     'label' => 'Services'],
                        ['route' => 'programs.index',     'label' => 'Programs'],
                        ['route' => 'products.index',     'label' => 'Products'],
                        ['route' => 'case-studies.index', 'label' => 'Case Studies'],
                        ['route' => 'insights.index',     'label' => 'Insights'],
                        ['route' => 'training.index',     'label' => 'Training'],
                    ] as $link)
                    <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                       style="font-size:13px; color:#64748B; text-decoration:none; transition:color 0.2s;"
                       onmouseover="this.style.color='white'"
                       onmouseout="this.style.color='#64748B'">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Company --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">Company</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach([
                        ['route' => 'about',           'label' => 'About HOPn'],
                        ['route' => 'partners.index',  'label' => 'Partners'],
                        ['route' => 'careers.index',   'label' => 'Careers'],
                    ] as $link)
                    <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                       style="font-size:13px; color:#64748B; text-decoration:none; transition:color 0.2s;"
                       onmouseover="this.style.color='white'"
                       onmouseout="this.style.color='#64748B'">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Contact --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">Contact</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach([
                        ['route' => 'contact.index',        'label' => 'Contact Us'],
                        ['route' => 'partner-inquiry.index','label' => 'Partner Inquiry'],
                        ['route' => 'careers.index',        'label' => 'Apply for a Job'],
                    ] as $link)
                    <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                       style="font-size:13px; color:#64748B; text-decoration:none; transition:color 0.2s;"
                       onmouseover="this.style.color='white'"
                       onmouseout="this.style.color='#64748B'">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Legal --}}
            <div>
                <p style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#94A3B8; margin-bottom:16px;">Legal</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    @foreach([
                        ['route' => 'legal.impressum', 'label' => 'Impressum'],
                        ['route' => 'legal.privacy',   'label' => 'Privacy Policy'],
                        ['route' => 'legal.cookie',    'label' => 'Cookie Policy'],
                    ] as $link)
                    <a href="{{ route($link['route'], ['lang' => $lang]) }}"
                       style="font-size:13px; color:#64748B; text-decoration:none; transition:color 0.2s;"
                       onmouseover="this.style.color='white'"
                       onmouseout="this.style.color='#64748B'">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom Bar --}}
    <div style="border-top:1px solid rgba(255,255,255,0.05); padding:20px 0;">
        <div class="container-shell" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px;">
            <p style="font-size:12px; color:#475569;">© {{ date('Y') }} HOPn GmbH. All rights reserved.</p>
            <p style="font-size:12px; color:#334155;">Built for enterprise innovation in Europe 🇪🇺</p>
        </div>
    </div>

</footer>
