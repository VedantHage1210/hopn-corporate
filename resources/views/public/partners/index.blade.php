@php
$lang = request()->route('lang', 'en');
$categoryLabels = [
    'customer'     => $lang==='ar'?'عملاء المؤسسات':($lang==='de'?'Unternehmenskunden':'Enterprise Customers'),
    'partner'      => $lang==='ar'?'شركاء التكنولوجيا':($lang==='de'?'Technologiepartner':'Technology Partners'),
    'tech_partner' => $lang==='ar'?'شركاء التكنولوجيا':($lang==='de'?'Technologiepartner':'Technology Partners'),
    'investor'     => $lang==='ar'?'المستثمرون والصناديق':($lang==='de'?'Investoren & Fonds':'Investors & Funds'),
    'startup'      => $lang==='ar'?'الشركات الناشئة':($lang==='de'?'Startups':'Startups'),
    'university'   => $lang==='ar'?'الشركاء الأكاديميون':($lang==='de'?'Akademische Partner':'Academic Partners'),
    'academic'     => $lang==='ar'?'الشركاء الأكاديميون':($lang==='de'?'Akademische Partner':'Academic Partners'),
    'research'     => $lang==='ar'?'شركاء البحث':($lang==='de'?'Forschungspartner':'Research Partners'),
    'delivery'     => $lang==='ar'?'شركاء التوصيل':($lang==='de'?'Lieferpartner':'Delivery Partners'),
];
$categoryColors = [
    'customer'     => '#4F6EF7',
    'partner'      => '#10B981',
    'tech_partner' => '#10B981',
    'investor'     => '#F59E0B',
    'startup'      => '#8B5CF6',
    'university'   => '#06B6D4',
    'academic'     => '#06B6D4',
    'research'     => '#EF4444',
    'delivery'     => '#F97316',
];
@endphp
<x-layouts.public :title="$lang==='ar'?'الشركاء والعملاء':($lang==='de'?'Partner & Kunden':'Partners & Clients')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.3); background:rgba(16,185,129,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#10B981; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981;">Partners & Clients</span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,64px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">شركاؤنا</span>
                <span style="color:#8FB8CC;"> وعملاؤنا</span>
            @elseif($lang==='de')
                <span style="color:white;">Unsere Partner</span>
                <span style="color:#8FB8CC;"> & Kunden</span>
            @else
                <span style="color:white;">Our Partners</span>
                <span style="color:#8FB8CC;"> & Clients</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto; line-height:1.7;">
            @if($lang==='ar') المؤسسات والجهات التي تعمل معها HOPn.
            @elseif($lang==='de') Organisationen und Institutionen, mit denen HOPn zusammenarbeitet.
            @else Organisations and institutions HOPn works with. @endif
        </p>
    </div>
</section>

{{-- GROUPED PARTNERS --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($partners->count() > 0)
            @foreach($partners->groupBy('type') as $category => $items)
            @php $catColor = '#8FB8CC'; @endphp
            <div style="margin-bottom:64px;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:28px;">
                    <div style="height:2px; width:32px; background:{{ $catColor }};"></div>
                    <span style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; color:{{ $catColor }};">
                        {{ $categoryLabels[$category] ?? ucfirst($category) }}
                    </span>
                    <div style="height:1px; flex:1; background:rgba(255,255,255,0.05);"></div>
                    <span style="font-size:12px; color:#64748B; font-weight:600;">{{ $items->count() }} {{ $items->count()===1?'partner':'partners' }}</span>
                </div>
                <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(230px,1fr)); gap:16px;">
                    @foreach($items as $item)
                    <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:14px; padding:24px 16px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:10px; text-align:center; transition:all 0.25s;">
                        @if($item->logo)
                        <div style="height:84px; width:100%; display:flex; align-items:center; justify-content:center;">
                            <img loading="lazy" decoding="async" src="{{ $item->logo }}" alt="{{ $item->name }}"
                                 style="max-height:84px; max-width:100%; width:auto; height:auto; object-fit:contain;">
                        </div>
                        @endif
                        <div style="font-size:15px; font-weight:700; color:#E2E8F0;">{{ $item->name }}</div>
                        @php
                            $desc = $lang==='ar' && $item->description_ar ? $item->description_ar : ($lang==='de' && $item->description_de ? $item->description_de : ($item->description_en ?? null));
                        @endphp
                        @if($desc)
                        <div style="font-size:12px; color:#CBD5E1; line-height:1.5; max-width:170px;">{{ Str::limit($desc, 70) }}</div>
                        @endif
                        @if($item->url)
                        <a href="{{ $item->url }}" target="_blank"
                           class="hopn-link-fade-in" style="font-size:11px; color:{{ $catColor }}; text-decoration:none; opacity:0.7;">
                            @if($lang==='ar') زيارة @elseif($lang==='de') Besuchen @else Visit @endif →
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            @if($partners->hasPages())
            <div style="display:flex; justify-content:center; margin-top:40px;">{{ $partners->links() }}</div>
            @endif
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') الشركاء قادمون قريباً @elseif($lang==='de') Partner folgen in Kürze @else Partners Coming Soon @endif
            </h3>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; position:relative; overflow:hidden;">
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(26px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد أن تصبح شريكاً؟ @elseif($lang==='de') Partner werden? @else Become a Partner? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') انضم إلى شبكة HOPn المتنامية من شركاء المؤسسات والمبتكرين.
            @elseif($lang==='de') Treten Sie HOPns wachsendem Netzwerk aus Unternehmenspartnern bei.
            @else Join HOPn's growing network of enterprise partners and innovators. @endif
        </p>
        <a href="{{ route('partner-inquiry.index', ['lang'=>$lang]) }}"
           class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#10B981; color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
            @if($lang==='ar') استفسار شراكة @elseif($lang==='de') Partneranfrage @else Partner Inquiry @endif →
        </a>
    </div>
</section>

</x-layouts.public>
