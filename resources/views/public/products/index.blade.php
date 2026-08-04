@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'المنتجات':($lang==='de'?'Produkte':'Products')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(139,92,246,0.10) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#8B5CF6; display:inline-block; box-shadow:0 0 8px #8B5CF6;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#A78BFA;">
                @if($lang==='ar') منصاتنا @elseif($lang==='de') Unsere Plattformen @else Our Platforms @endif
            </span>
        </div>
        <h1 style="font-size:clamp(36px,6vw,72px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">منتجات</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> HOPn الرقمية</span>
            @elseif($lang==='de')
                <span style="color:white;">HOPn</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> Produkte</span>
            @else
                <span style="color:white;">HOPn</span>
                <span style="background:linear-gradient(135deg,#8B5CF6,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;"> Products</span>
            @endif
        </h1>
        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') منصات ذكية مبنية لمستقبل الأعمال والتعليم.
            @elseif($lang==='de') Intelligente Plattformen für die Zukunft von Business und Bildung.
            @else Intelligent platforms built for the future of business and education. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}" class="hopn-btn-outline-purple"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(139,92,246,0.3); background:rgba(139,92,246,0.06); color:#A78BFA; font-size:15px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') عرض الكتالوج @elseif($lang==='de') Katalog @else View Catalog @endif
            </a>
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-lift-btn"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#8B5CF6; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(139,92,246,0.4);">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt @else Get in Touch @endif →
            </a>
        </div>
    </div>
</section>

{{-- PRODUCTS GRID --}}
<section style="padding:60px 0 100px; background:#050A14;">
    <div class="container-shell">
        @if($products->count() > 0)
        <div class="hopn-reveal" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:20px;">
            @foreach($products as $product)
            @php $colors=['#8B5CF6','#4F6EF7','#10B981','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; $title=$lang==='de'&&$product->title_de?$product->title_de:($lang==='ar'&&$product->title_ar?$product->title_ar:$product->title_en); $summary=$lang==='de'&&$product->summary_de?$product->summary_de:($lang==='ar'&&$product->summary_ar?$product->summary_ar:$product->summary_en); @endphp
            <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}" class="hopn-lift-card"
               style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:20px; overflow:hidden; text-decoration:none; position:relative;">

                {{-- Image or gradient --}}
                @if($product->hero_image_url)
                <div style="height:180px; overflow:hidden; position:relative;">
                    <img src="{{ $product->hero_image_url }}" alt="{{ $title }}"
                         style="width:100%; height:100%; object-fit:cover;">
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 50%, rgba(10,15,30,0.8));"></div>
                </div>
                @else
                <div style="height:100px; background:linear-gradient(135deg,{{ $c }}20,{{ $c }}05); display:flex; align-items:center; justify-content:center; border-bottom:1px solid rgba(255,255,255,0.04); position:relative;">
                    <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,{{ $c }},transparent);"></div>
                    <div style="width:48px; height:48px; border-radius:14px; background:{{ $c }}20; border:1px solid {{ $c }}40; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:900; color:{{ $c }};">
                        {{ strtoupper(substr($title,0,1)) }}
                    </div>
                </div>
                @endif

                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
                    @if($product->target_audience)
                    <span style="display:inline-block; font-size:10px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; border:1px solid {{ $c }}30; color:{{ $c }}; width:fit-content; text-transform:uppercase; letter-spacing:0.06em;">
                        {{ $product->target_audience }}
                    </span>
                    @endif
                    <h3 style="font-size:20px; font-weight:800; color:white; line-height:1.3; letter-spacing:-0.5px; margin:0;">{{ $title }}</h3>
                    <p style="font-size:14px; color:#CBD5E1; line-height:1.7; flex:1; margin:0;">{{ Str::limit($summary,110) }}</p>
                    <div style="display:flex; align-items:center; justify-content:space-between; padding-top:16px; border-top:1px solid rgba(255,255,255,0.05); margin-top:auto;">
                        <span style="font-size:13px; font-weight:600; color:{{ $c }}; display:flex; align-items:center; gap:6px;">
                            @if($lang==='ar') عرض المنتج @elseif($lang==='de') Produkt ansehen @else View Product @endif
                            <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @if($products->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">{{ $products->links() }}</div>
        @endif
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div style="font-size:48px; margin-bottom:16px;">📦</div>
            <p style="font-size:16px; color:#94A3B8;">
                @if($lang==='ar') لا توجد منتجات حالياً @elseif($lang==='de') Keine Produkte gefunden @else No products found @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:400px; background:radial-gradient(ellipse, rgba(139,92,246,0.07) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل تريد معرفة المزيد؟ @elseif($lang==='de') Möchten Sie mehr erfahren? @else Want to Learn More? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق HOPn لمناقشة المنتج المناسب لك.
            @elseif($lang==='de') Kontaktieren Sie das HOPn-Team für das richtige Produkt.
            @else Get in touch with HOPn to find the right product for your needs. @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}" class="hopn-lift-btn"
           style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#8B5CF6; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(139,92,246,0.3);">
            @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Contact HOPn @endif →
        </a>
    </div>
</section>

</x-layouts.public>
