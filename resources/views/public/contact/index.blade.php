@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'تواصل معنا':($lang==='de'?'Kontakt':'Contact')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(79,110,247,0.10) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block; box-shadow:0 0 8px #4F6EF7;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">Contact HOPn</span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar') <span style="color:white;">تواصل</span> <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">معنا</span>
            @elseif($lang==='de') <span style="color:white;">Kontakt</span> <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">aufnehmen</span>
            @else <span style="color:white;">Get in</span> <span style="background:linear-gradient(135deg,#4F6EF7,#8B5CF6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Touch</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto; line-height:1.7;">
            @if($lang==='ar') نحن هنا للإجابة على استفساراتك ومناقشة فرص التعاون.
            @elseif($lang==='de') Wir freuen uns, von Ihnen zu hören.
            @else We would love to hear from you. Reach out for partnerships, projects, or inquiries. @endif
        </p>
    </div>
</section>

{{-- CONTACT CONTENT --}}
<section style="padding:80px 0 100px; background:#050A14;">
    <div class="container-shell">

        {{-- Contact Info Cards --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:16px; margin-bottom:60px;">
            @php
            $infos=[
                ['icon'=>'📧','color'=>'#4F6EF7','en'=>'Email','de'=>'E-Mail','ar'=>'البريد الإلكتروني','value'=>'contact@hopn.eu','link'=>'mailto:contact@hopn.eu'],
                ['icon'=>'📍','color'=>'#10B981','en'=>'Location','de'=>'Standort','ar'=>'الموقع','value'=>'Berlin, Germany','link'=>null],
                ['icon'=>'💼','color'=>'#8B5CF6','en'=>'Partnerships','de'=>'Partnerschaften','ar'=>'الشراكات','value'=>'Partner Inquiry','link'=>route('partner-inquiry.index',['lang'=>$lang])],
                ['icon'=>'🚀','color'=>'#F59E0B','en'=>'Startups','de'=>'Startups','ar'=>'الشركات الناشئة','value'=>'Apply Now','link'=>route('startups.index',['lang'=>$lang])],
            ];
            @endphp
            @foreach($infos as $info)
            <div class="hopn-lift-card-nobg" style="border:1px solid {{ $info['color'] }}20; background:#0A0F1E; border-radius:14px; padding:24px; text-align:center; transition:all 0.25s; position:relative; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $info['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $info['color'] }}15; border:1px solid {{ $info['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin:0 auto 16px;">{{ $info['icon'] }}</div>
                <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#94A3B8; margin-bottom:8px;">{{ $info[$lang] ?? $info['en'] }}</div>
                @if($info['link'])
                <a href="{{ $info['link'] }}" style="font-size:14px; font-weight:600; color:{{ $info['color'] }}; text-decoration:none;">{{ $info['value'] }} →</a>
                @else
                <div style="font-size:14px; color:#CBD5E1;">{{ $info['value'] }}</div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Forms Grid --}}
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            {{-- Contact Form --}}
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; padding:36px; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#4F6EF7,#8B5CF6);"></div>
                <h2 style="font-size:22px; font-weight:800; color:white; margin-bottom:8px; letter-spacing:-0.5px;">
                    @if($lang==='ar') أرسل رسالة @elseif($lang==='de') Nachricht senden @else Send a Message @endif
                </h2>
                <p style="font-size:13px; color:#94A3B8; margin-bottom:28px; line-height:1.6;">
                    @if($lang==='ar') للاستفسارات العامة والتعاون @elseif($lang==='de') Für allgemeine Anfragen und Zusammenarbeit @else For general inquiries and collaboration @endif
                </p>
                <x-forms.contact :lang="$lang" />
            </div>

            {{-- Proposal Form --}}
            <div style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; padding:36px; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#10B981,#4F6EF7);"></div>
                <h2 style="font-size:22px; font-weight:800; color:white; margin-bottom:8px; letter-spacing:-0.5px;">
                    @if($lang==='ar') طلب عرض @elseif($lang==='de') Angebot anfordern @else Request a Proposal @endif
                </h2>
                <p style="font-size:13px; color:#94A3B8; margin-bottom:28px; line-height:1.6;">
                    @if($lang==='ar') لمناقشة مشروع محدد أو خدمة @elseif($lang==='de') Für ein konkretes Projekt oder eine Dienstleistung @else For a specific project or service discussion @endif
                </p>
                <x-forms.proposal :lang="$lang" />
            </div>
        </div>
    </div>
</section>

</x-layouts.public>
