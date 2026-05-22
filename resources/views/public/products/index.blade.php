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

    <style>
        .pc0 .pb{background:#4F6EF7}.pc0 .pi{background:rgba(79,110,247,0.1);border:1px solid rgba(79,110,247,0.3);color:#4F6EF7}.pc0 .pl{color:#4F6EF7}
        .pc1 .pb{background:#10B981}.pc1 .pi{background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);color:#10B981}.pc1 .pl{color:#10B981}
        .pc2 .pb{background:#8B5CF6}.pc2 .pi{background:rgba(139,92,246,0.1);border:1px solid rgba(139,92,246,0.3);color:#8B5CF6}.pc2 .pl{color:#8B5CF6}
        .pc3 .pb{background:#F59E0B}.pc3 .pi{background:rgba(245,158,11,0.1);border:1px solid rgba(245,158,11,0.3);color:#F59E0B}.pc3 .pl{color:#F59E0B}
        .pc4 .pb{background:#EF4444}.pc4 .pi{background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);color:#EF4444}.pc4 .pl{color:#EF4444}
        .pc5 .pb{background:#06B6D4}.pc5 .pi{background:rgba(6,182,212,0.1);border:1px solid rgba(6,182,212,0.3);color:#06B6D4}.pc5 .pl{color:#06B6D4}
        .pcard{transition:all 0.25s}
        .pcard:hover{background:#141D2E !important;transform:translateY(-4px)}
    </style>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">

            @forelse($products as $product)

            @php
                $idx = $loop->index % 6;
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

            @if($loop->first)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
            @endif

                <div class="pcard pc{{ $idx }}"
                     style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px; overflow:hidden;">

                    <div class="pb" style="position:absolute; top:0; left:0; right:0; height:3px; border-radius:16px 16px 0 0;"></div>

                    <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                        <div class="pi" style="width:48px; height:48px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:800; flex-shrink:0;">
                            {{ $initial }}
                        </div>
                        <h3 style="font-size:18px; font-weight:700; color:white; line-height:1.3;">{{ $ptitle }}</h3>
                    </div>

                    <p style="font-size:14px; color:#64748B; line-height:1.7; flex:1; margin-bottom:20px;">{{ Str::limit($psummary, 120) }}</p>

                    <div style="padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
                        <a href="{{ route('products.show', ['lang' => $lang, 'slug' => $product->slug]) }}"
                           class="pl"
                           style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; text-decoration:none;">
                            View Product →
                        </a>
                    </div>
                </div>

            @if($loop->last)
            </div>

            @if($products->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">
                {{ $products->links() }}
            </div>
            @endif

            @endif

            @empty

            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">📦</div>
                <p style="font-size:16px;">No products found. Add products from the admin panel.</p>
            </div>

            @endforelse

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
