<x-layouts.public :title="'Products'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image:linear-gradient(rgba(79,110,247,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(79,110,247,0.06) 1px,transparent 1px); background-size:48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">Our Platforms</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">HOPn Products</h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                Intelligent platforms built for the future of business and education.
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">

            @if($products->count() > 0)

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">

                @foreach($products as $product)
                @php
                    $idx          = $loop->index % 6;
                    $topColors    = ['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                    $borderColors = ['rgba(79,110,247,0.3)','rgba(16,185,129,0.3)','rgba(139,92,246,0.3)','rgba(245,158,11,0.3)','rgba(239,68,68,0.3)','rgba(6,182,212,0.3)'];
                    $bgColors     = ['rgba(79,110,247,0.1)','rgba(16,185,129,0.1)','rgba(139,92,246,0.1)','rgba(245,158,11,0.1)','rgba(239,68,68,0.1)','rgba(6,182,212,0.1)'];
                    $topColor     = $topColors[$idx];
                    $borderColor  = $borderColors[$idx];
                    $bgColor      = $bgColors[$idx];
                    $textColor    = $topColor;

                    if ($lang === 'de' && $product->title_de) {
                        $ptitle = $product->title_de;
                    } elseif ($lang === 'ar' && !empty($product->title_ar)) {
                        $ptitle = $product->title_ar;
                    } else {
                        $ptitle = $product->title_en ?? '';
                    }

                    if ($lang === 'de' && $product->summary_de) {
                        $psummary = $product->summary_de;
                    } elseif ($lang === 'ar' && !empty($product->summary_ar)) {
                        $psummary = $product->summary_ar;
                    } else {
                        $psummary = $product->summary_en ?? '';
                    }

                    $initial = strtoupper(substr($ptitle, 0, 1));
                @endphp

                <div style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='{{ $borderColor }}'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">

                    <div style="position:absolute; top:0; left:0; right:0; height:3px; background:{{ $topColor }}; border-radius:16px 16px 0 0;"></div>

                    <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                        <div style="width:48px; height:48px; border-radius:12px; background:{{ $bgColor }}; border:1px solid {{ $borderColor }}; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:800; color:{{ $textColor }}; flex-shrink:0;">
                            {{ $initial }}
                        </div>
                        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3;">{{ $ptitle }}</h3>
                    </div>

                    <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($psummary, 120) }}</p>

                    <div style="padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
                        <a href="{{ route('products.show', ['lang' => $lang, 'slug' => $product->slug]) }}"
                           style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $textColor }}; text-decoration:none;">
                            View Product →
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

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

    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white; margin-bottom:16px;">Want to Learn More?</h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">
                    Get in touch with HOPn to find the right product for your needs.
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    Contact HOPn →
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
