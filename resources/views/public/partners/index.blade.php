<x-layouts.public :title="'Partners'">
@php
    $lang = request()->route('lang', 'en');
    $logos = \App\Models\Logo::where('visible', true)->orderBy('sort_order')->get();
    $categoryLabels = [
        'customer'   => 'Enterprise Customers',
        'partner'    => 'Technology Partners',
        'investor'   => 'Investors & Funds',
        'startup'    => 'Startups',
        'university' => 'Academic Partners',
        'research'   => 'Research Partners',
    ];
    $categoryColors = [
        'customer'   => '#4F6EF7',
        'partner'    => '#10B981',
        'investor'   => '#F59E0B',
        'startup'    => '#8B5CF6',
        'university' => '#06B6D4',
        'research'   => '#EF4444',
    ];
    $allItems = $logos->count() > 0 ? $logos : $partners;
@endphp

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.35); background:rgba(16,185,129,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#10B981; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981;">Partners & Clients</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') شركاؤنا وعملاؤنا @elseif($lang === 'de') Unsere Partner & Kunden @else Our Partners & Clients @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') موثوق به من قبل المنظمات الرائدة في جميع الصناعات.
                @elseif($lang === 'de') Vertrauen führender Organisationen aus allen Branchen.
                @else Trusted by leading organisations across industries worldwide.
                @endif
            </p>
        </div>
    </section>

    {{-- Grouped Section --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($allItems->count() > 0)
                @foreach($allItems->groupBy('category') as $category => $items)
                @php $catColor = $categoryColors[$category] ?? '#4F6EF7'; @endphp
                <div style="margin-bottom:60px;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
                        <div style="height:2px; width:32px; background:{{ $catColor }};"></div>
                        <span style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:{{ $catColor }};">
                            {{ $categoryLabels[$category] ?? ucfirst($category) }}
                        </span>
                        <div style="height:1px; flex:1; background:rgba(255,255,255,0.06);"></div>
                        <span style="font-size:12px; color:#475569;">{{ $items->count() }} {{ $items->count() === 1 ? 'partner' : 'partners' }}</span>
                    </div>
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:12px;">
                        @foreach($items as $item)
                        @php $logoUrl = $item->logo_url ?? $item->logo ?? null; @endphp
                        <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:14px; padding:24px 16px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:10px; text-align:center; transition:all 0.25s;"
                             onmouseover="this.style.borderColor='{{ $catColor }}40'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                             onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                            @if($logoUrl)
                            <img src="{{ $logoUrl }}" alt="{{ $item->name }}"
                                 style="height:40px; width:auto; max-width:120px; object-fit:contain; filter:brightness(0.75) grayscale(0.2);"
                                 onmouseover="this.style.filter='brightness(1) grayscale(0)'"
                                 onmouseout="this.style.filter='brightness(0.75) grayscale(0.2)'">
                            @else
                            <div style="width:48px; height:48px; border-radius:12px; background:{{ $catColor }}15; border:1px solid {{ $catColor }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:800; color:{{ $catColor }};">
                                {{ strtoupper(substr($item->name, 0, 2)) }}
                            </div>
                            @endif
                            <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $item->name }}</div>
                            @if($item->website ?? $item->website_url ?? null)
                            <a href="{{ $item->website ?? $item->website_url }}" target="_blank"
                               style="font-size:11px; color:{{ $catColor }}; text-decoration:none; opacity:0.7;"
                               onmouseover="this.style.opacity='1'"
                               onmouseout="this.style.opacity='0.7'">Visit →</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🤝</div>
                <p>No partners found. Add logos from Admin Panel → Logos & Partners.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(16,185,129,0.2); background:rgba(16,185,129,0.05); border-radius:24px; padding:48px 32px;">
                <h2 style="font-size:28px; font-weight:800; color:white; margin-bottom:16px;">Become a Partner</h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:28px;">Join HOPn's growing network of enterprise partners and innovators.</p>
                <a href="{{ route('partner-inquiry.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#10B981; color:white; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    Partner Inquiry →
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
