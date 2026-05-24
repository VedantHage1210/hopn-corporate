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
  @foreach($products as $product)
<div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; overflow:hidden; transition:all 0.25s;"
     onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'; this.querySelector('.top-line').style.opacity='1';"
     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">

    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; z-index:1;"></div>

    {{-- Hero Image --}}
    @if($product->hero_image_url)
    <div style="height:160px; overflow:hidden;">
        <img src="{{ $product->hero_image_url }}" alt="{{ $product->title_en }}"
             style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;"
             onmouseover="this.style.transform='scale(1.05)'"
             onmouseout="this.style.transform='scale(1)'">
    </div>
    @else
    <div style="height:80px; background:linear-gradient(135deg, rgba(79,110,247,0.2), rgba(139,92,246,0.2)); display:flex; align-items:center; justify-content:center;">
        <div style="display:flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:rgba(79,110,247,0.15); border:1px solid rgba(79,110,247,0.2); font-size:18px; font-weight:800; color:#818CF8;">
            {{ strtoupper(substr($lang === 'de' && $product->title_de ? $product->title_de : $product->title_en, 0, 1)) }}
        </div>
    </div>
    @endif

    <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3;">
            @if($lang === 'de' && $product->title_de) {{ $product->title_de }}
            @elseif($lang === 'ar' && $product->title_ar) {{ $product->title_ar }}
            @else {{ $product->title_en }}
            @endif
        </h3>
        <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1;">
            @if($lang === 'de' && $product->summary_de) {{ $product->summary_de }}
            @elseif($lang === 'ar' && $product->summary_ar) {{ $product->summary_ar }}
            @else {{ $product->summary_en }}
            @endif
        </p>
        @if($product->target_audience)
        <div style="margin-top:4px;">
            <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8;">
                {{ $product->target_audience }}
            </span>
        </div>
        @endif
        <a href="{{ route('products.show', ['lang' => $lang, 'slug' => $product->slug]) }}"
           style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:#818CF8; text-decoration:none; margin-top:auto;"
           onmouseover="this.style.gap='10px'"
           onmouseout="this.style.gap='6px'">
            @if($lang === 'ar') عرض المنتج @elseif($lang === 'de') Produkt ansehen @else View Product @endif
            <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</div>
@endforeach

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
