<x-layouts.public :title="'Products'">
@php($lang = request()->route('lang', 'en'))

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">Our Platforms</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') منتجات HOPn الرقمية
                @elseif($lang === 'de') HOPn Produkte
                @else HOPn Products
                @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') منصات ذكية مبنية لمستقبل الأعمال والتعليم.
                @elseif($lang === 'de') Intelligente Plattformen für die Zukunft von Business und Bildung.
                @else Intelligent platforms built for the future of business and education.
                @endif
            </p>
        </div>
    </section>

    {{-- Products Grid --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($products->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
                @foreach($products as $product)
                @php
                    $title   = $lang === 'de' && $product->title_de   ? $product->title_de   : ($lang === 'ar' && $product->title_ar   ? $product->title_ar   : $product->title_en);
                    $summary = $lang === 'de' && $product->summary_de ? $product->summary_de : ($lang === 'ar' && $product->summary_ar ? $product->summary_ar : $product->summary_en);
                    $colors  = ['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                    $color   = $colors[$loop->index % count($colors)];
                @endphp
                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='{{ $color }}40'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:3px; background:{{ $color }}; opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>

                    {{-- Icon + Title --}}
                    <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; background:{{ $color }}20; border:1px solid {{ $color }}40; font-size:20px; font-weight:800; color:{{ $color }}; flex-shrink:0;">
                            {{ strtoupper(substr($title, 0, 1)) }}
                        </div>
                        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3;">{{ $title }}</h3>
                    </div>

                    {{-- Summary --}}
                    <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1;">{{ $summary }}</p>

                    {{-- Tags --}}
                    @if($product->target_audience)
                    <div style="margin-top:16px; margin-bottom:16px;">
                        <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $color }}10; border:1px solid {{ $color }}30; color:{{ $color }};">
                            {{ $product->target_audience }}
                        </span>
                    </div>
                    @endif

                    {{-- CTA --}}
                    <a href="{{ route('products.show', ['lang' => $lang, 'slug' => $product->slug]) }}"
                       style="display:inline-flex; align-items:center; gap:6px; margin-top:auto; font-size:13px; font-weight:600; color:{{ $color }}; text-decoration:none; transition:gap 0.2s;"
                       onmouseover="this.style.gap='10px'"
                       onmouseout="this.style.gap='6px'">
                        @if($lang === 'ar') عرض المنتج
                        @elseif($lang === 'de') Produkt ansehen
                        @else View Product
                        @endif
                        <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">
                {{ $products->links() }}
            </div>
            @endif

            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">📦</div>
                <p style="font-size:16px;">No products found. Add products from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل تريد معرفة المزيد؟
                    @elseif($lang === 'de') Möchten Sie mehr erfahren?
                    @else Want to Learn More?
                    @endif
                </h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    @if($lang === 'ar') تواصل مع فريق HOPn لمناقشة المنتج المناسب لك.
                    @elseif($lang === 'de') Kontaktieren Sie das HOPn-Team, um das richtige Produkt zu finden.
                    @else Get in touch with HOPn to find the right product for your needs.
                    @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt aufnehmen @else Contact HOPn @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
