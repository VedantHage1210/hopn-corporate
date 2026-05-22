<x-layouts.public :title="$product->title_en ?? 'Product'">
@php($lang = request()->route('lang', 'en'))
@php
    $title    = $lang === 'de' && $product->title_de   ? $product->title_de   : ($lang === 'ar' && isset($product->title_ar)   && $product->title_ar   ? $product->title_ar   : ($product->title_en   ?? ''));
    $summary  = $lang === 'de' && $product->summary_de ? $product->summary_de : ($lang === 'ar' && isset($product->summary_ar) && $product->summary_ar ? $product->summary_ar : ($product->summary_en ?? ''));
    $problem  = $lang === 'de' && $product->problem_de ? $product->problem_de : ($lang === 'ar' && isset($product->problem_ar) && $product->problem_ar ? $product->problem_ar : ($product->problem_en ?? ''));
    $solution = $lang === 'de' && $product->solution_de? $product->solution_de: ($lang === 'ar' && isset($product->solution_ar)&& $product->solution_ar? $product->solution_ar: ($product->solution_en ?? ''));
@endphp

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none;
            background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
            background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px);"></div>

        <div class="container-shell" style="position:relative; z-index:10;">
            <a href="{{ route('products.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:6px; color:#64748B; font-size:13px; text-decoration:none; margin-bottom:32px;"
               onmouseover="this.style.color='white'"
               onmouseout="this.style.color='#64748B'">
                ← Back to Products
            </a>

            <div style="display:grid; grid-template-columns:1fr auto; gap:32px; align-items:start; max-width:900px;">
                <div>
                    <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                        <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">HOPn Product</span>
                    </div>
                    <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; margin-bottom:20px;">
                        {{ $title }}
                    </h1>
                    @if($summary)
                    <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; line-height:1.7; max-width:640px;">
                        {{ $summary }}
                    </p>
                    @endif

                    <div style="display:flex; flex-wrap:wrap; gap:12px; margin-top:32px;">
                        <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                           style="display:inline-flex; align-items:center; gap:8px; padding:13px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                           onmouseover="this.style.opacity='0.88'"
                           onmouseout="this.style.opacity='1'">
                            Request Demo →
                        </a>
                        @if($product->demo_url ?? null)
                        <a href="{{ $product->demo_url }}" target="_blank"
                           style="display:inline-flex; align-items:center; gap:8px; padding:13px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:14px; font-weight:600; text-decoration:none;"
                           onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                           onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                            Live Demo
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Problem & Solution --}}
    @if($problem || $solution)
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">

                @if($problem)
                <div style="position:relative; border:1px solid rgba(239,68,68,0.2); background:#111827; border-radius:20px; padding:36px; overflow:hidden;">
                    <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,#EF4444,#F59E0B);"></div>
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:rgba(239,68,68,0.1); border:1px solid rgba(239,68,68,0.2); font-size:20px; margin-bottom:20px;">⚠️</div>
                    <h2 style="font-size:20px; font-weight:800; color:white; margin-bottom:16px;">
                        The Problem
                    </h2>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">{{ $problem }}</p>
                </div>
                @endif

                @if($solution)
                <div style="position:relative; border:1px solid rgba(16,185,129,0.2); background:#111827; border-radius:20px; padding:36px; overflow:hidden;">
                    <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,#10B981,#4F6EF7);"></div>
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:12px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); font-size:20px; margin-bottom:20px;">✅</div>
                    <h2 style="font-size:20px; font-weight:800; color:white; margin-bottom:16px;">
                        Our Solution
                    </h2>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">{{ $solution }}</p>
                </div>
                @endif

            </div>
        </div>
    </section>
    @endif

    {{-- Features --}}
    @if($product->features ?? null)
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Features</span>
                <h2 style="font-size:clamp(24px,4vw,40px); font-weight:800; color:white;">Key Features</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:16px;">
                @foreach(explode("\n", $product->features) as $feature)
                @if(trim($feature))
                <div style="border:1px solid rgba(79,110,247,0.15); background:#111827; border-radius:14px; padding:20px; display:flex; align-items:flex-start; gap:12px;">
                    <span style="color:#4F6EF7; font-size:18px; flex-shrink:0;">✦</span>
                    <span style="font-size:14px; color:#CBD5E1; line-height:1.6;">{{ trim($feature) }}</span>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Target Audience --}}
    @if($product->target_audience ?? null)
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="max-width:700px; margin:0 auto; text-align:center; border:1px solid rgba(139,92,246,0.2); background:rgba(139,92,246,0.05); border-radius:20px; padding:40px;">
                <div style="font-size:32px; margin-bottom:16px;">🎯</div>
                <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">Built For</h3>
                <p style="font-size:15px; color:#94A3B8; line-height:1.7;">{{ $product->target_audience }}</p>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(22px,3vw,34px); font-weight:800; color:white; margin-bottom:16px;">
                    Ready to Get Started?
                </h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:32px;">
                    Contact HOPn to schedule a demo or discuss how {{ $title }} can work for your organization.
                </p>
                <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                    <a href="{{ route('contact.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                       onmouseover="this.style.opacity='0.88'"
                       onmouseout="this.style.opacity='1'">
                        Contact HOPn →
                    </a>
                    <a href="{{ route('products.index', ['lang' => $lang]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;"
                       onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        ← All Products
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
