<x-layouts.public :title="$product->title_en ?? 'Product'">
<?php $lang = request()->route('lang', 'en'); ?>

    {{-- Hover Effect CSS --}}
    <style>
        .product-hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease !important;
        }
        .product-hover-card:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 12px 24px rgba(79, 110, 247, 0.15) !important;
            border-color: rgba(79, 110, 247, 0.4) !important;
        }
        .hopn-back-link { transition:color 0.25s ease; }
        .hopn-back-link:hover { color:white; }
        .hopn-opacity-btn { transition:opacity 0.25s ease; }
        .hopn-opacity-btn:hover { opacity:0.88; }
        .hopn-pill-hover { transition:background 0.25s ease; }
        .hopn-pill-hover:hover { background:rgba(79,110,247,0.15); }
        .hopn-related-card { transition:border-color 0.3s ease, background 0.3s ease; }
        .hopn-related-card:hover { border-color:rgba(79,110,247,0.3); background:#141D2E; }
    </style>

    {{-- Hero --}}
    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        @if(!empty($product->hero_image_url))
        <div style="position:absolute; inset:0; background:url('{{ $product->hero_image_url }}') center/cover no-repeat; opacity:0.15;"></div>
        @endif
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10;">
            <a href="{{ route('products.index', ['lang' => $lang]) }}" class="hopn-back-link"
               style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#64748B; text-decoration:none; margin-bottom:24px;">
                ← @if($lang === 'ar') العودة @elseif($lang === 'de') Zurück @else Back to Products @endif
            </a>
            @if(!empty($product->tagline_en))
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:4px 14px; margin-bottom:20px; margin-left:12px;">
                <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#818CF8;">
                    @if($lang === 'de' && !empty($product->tagline_de)) {{ $product->tagline_de }}
                    @elseif($lang === 'ar' && !empty($product->tagline_ar)) {{ $product->tagline_ar }}
                    @else {{ $product->tagline_en }}
                    @endif
                </span>
            </div>
            @endif
            <h1 style="font-size:clamp(28px,5vw,52px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 0 20px;">
                @if($lang === 'de' && !empty($product->title_de)) {{ $product->title_de }}
                @elseif($lang === 'ar' && !empty($product->title_ar)) {{ $product->title_ar }}
                @else {{ $product->title_en }}
                @endif
            </h1>
            @if(!empty($product->summary_en))
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:640px; line-height:1.7; margin-bottom:32px;">
                @if($lang === 'de' && !empty($product->summary_de)) {{ $product->summary_de }}
                @elseif($lang === 'ar' && !empty($product->summary_ar)) {{ $product->summary_ar }}
                @else {{ $product->summary_en }}
                @endif
            </p>
            @endif
            <div style="display:flex; flex-wrap:wrap; gap:12px;">
                @if(!empty($product->cta_url))
                <a href="{{ $product->cta_url }}" class="hopn-opacity-btn"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                    {{ $product->cta_label_en ?? 'Get Started' }} →
                </a>
                @endif
                <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hopn-opacity-btn"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt @else Contact Us @endif
                </a>
            </div>
        </div>
    </section>

    {{-- Problem & Solution --}}
    @if(!empty($product->problem_en) || !empty($product->solution_en))
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                @if(!empty($product->problem_en))
                <div class="product-hover-card" style="border:1px solid rgba(239,68,68,0.2); background:#111827; border-radius:16px; padding:32px;">
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:10px; background:rgba(239,68,68,0.1); font-size:18px; margin-bottom:16px;">⚠️</div>
                    <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                        @if($lang === 'ar') المشكلة @elseif($lang === 'de') Problem @else The Problem @endif
                    </h3>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">
                        @if($lang === 'de' && !empty($product->problem_de)) {{ $product->problem_de }}
                        @elseif($lang === 'ar' && !empty($product->problem_ar)) {{ $product->problem_ar }}
                        @else {{ $product->problem_en }}
                        @endif
                    </p>
                </div>
                @endif
                @if(!empty($product->solution_en))
                <div class="product-hover-card" style="border:1px solid rgba(16,185,129,0.2); background:#111827; border-radius:16px; padding:32px;">
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:10px; background:rgba(16,185,129,0.1); font-size:18px; margin-bottom:16px;">✅</div>
                    <h3 style="font-size:18px; font-weight:700; color:white; margin-bottom:12px;">
                        @if($lang === 'ar') الحل @elseif($lang === 'de') Lösung @else Our Solution @endif
                    </h3>
                    <p style="font-size:15px; color:#94A3B8; line-height:1.8;">
                        @if($lang === 'de' && !empty($product->solution_de)) {{ $product->solution_de }}
                        @elseif($lang === 'ar' && !empty($product->solution_ar)) {{ $product->solution_ar }}
                        @else {{ $product->solution_en }}
                        @endif
                    </p>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Features --}}
    @if(!empty($product->features_en))
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Features</span>
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                    @if($lang === 'ar') المميزات @elseif($lang === 'de') Funktionen @else Key Features @endif
                </h2>
            </div>
            <?php
                $features = $product->features_en;
                if ($lang === 'de' && !empty($product->features_de)) $features = $product->features_de;
                if ($lang === 'ar' && !empty($product->features_ar)) $features = $product->features_ar;
                $featureList = array_filter(explode("\n", $features ?? ''));
            ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach($featureList as $feature)
                <div class="product-hover-card" style="border:1px solid rgba(79,110,247,0.2); background:#111827; border-radius:14px; padding:20px; display:flex; align-items:flex-start; gap:12px;">
                    <span style="color:#4F6EF7; font-size:18px; flex-shrink:0;">✦</span>
                    <span style="font-size:14px; color:#CBD5E1; line-height:1.6;">{{ trim($feature) }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Use Cases --}}
    @if(!empty($product->use_cases_en))
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#8B5CF6; margin-bottom:12px;">Use Cases</span>
                <h2 style="font-size:clamp(24px,4vw,36px); font-weight:800; color:white;">
                    @if($lang === 'ar') حالات الاستخدام @elseif($lang === 'de') Anwendungsfälle @else Use Cases @endif
                </h2>
            </div>
            <?php
                $useCases = $product->use_cases_en;
                if ($lang === 'de' && !empty($product->use_cases_de)) $useCases = $product->use_cases_de;
                if ($lang === 'ar' && !empty($product->use_cases_ar)) $useCases = $product->use_cases_ar;
                $useCaseList = array_filter(explode("\n", $useCases ?? ''));
            ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach($useCaseList as $useCase)
                <div class="product-hover-card" style="border:1px solid rgba(139,92,246,0.2); background:#111827; border-radius:14px; padding:20px; display:flex; align-items:flex-start; gap:12px;">
                    <span style="color:#8B5CF6; font-size:18px; flex-shrink:0;">→</span>
                    <span style="font-size:14px; color:#CBD5E1; line-height:1.6;">{{ trim($useCase) }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Industries --}}
    @if(!empty($product->industry_ids))
    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell">
            <h2 style="font-size:20px; font-weight:700; color:white; margin-bottom:24px; text-align:center;">
                @if($lang === 'ar') الصناعات @elseif($lang === 'de') Branchen @else Industries @endif
            </h2>
            <?php
                $productIndustries = \App\Models\Industry::whereIn('id', $product->industry_ids ?? [])->get();
            ?>
            <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
                @foreach($productIndustries as $industry)
                <a href="{{ route('industries.show', ['lang' => $lang, 'slug' => $industry->slug]) }}" class="hopn-pill-hover"
                   style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:999px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); color:#818CF8; font-size:13px; font-weight:600; text-decoration:none;">
                    {{ $industry->icon ?? '🏭' }} {{ $industry->name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Related Services --}}
    @if(!empty($product->service_ids))
    <section style="padding:60px 0; background:#080D1A;">
        <div class="container-shell">
            <h2 style="font-size:20px; font-weight:700; color:white; margin-bottom:24px; text-align:center;">
                @if($lang === 'ar') الخدمات ذات الصلة @elseif($lang === 'de') Verwandte Leistungen @else Related Services @endif
            </h2>
            <?php
                $relatedServices = \App\Models\Service::whereIn('id', $product->service_ids ?? [])->where('is_published', true)->get();
            ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach($relatedServices as $service)
                <a href="{{ route('services.show', ['lang' => $lang, 'slug' => $service->slug]) }}" class="hopn-related-card"
                   style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:14px; padding:20px; text-decoration:none;">
                    <h3 style="font-size:15px; font-weight:700; color:white; margin-bottom:8px;">{{ $service->name }}</h3>
                    @if(!empty($service->summary))
                    <p style="font-size:13px; color:#64748B; line-height:1.6;">{{ Str::limit($service->summary, 80) }}</p>
                    @endif
                    <span style="display:inline-block; margin-top:10px; font-size:12px; color:#818CF8; font-weight:600;">Learn more →</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(22px,4vw,32px); font-weight:800; color:white; margin-bottom:16px;">
                    @if($lang === 'ar') هل أنت مهتم؟ @elseif($lang === 'de') Interesse? @else Interested? @endif
                </h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:28px;">
                    @if($lang === 'ar') تواصل مع فريقنا لمعرفة المزيد.
                    @elseif($lang === 'de') Kontaktieren Sie unser Team für mehr Informationen.
                    @else Get in touch with our team to learn more about this product.
                    @endif
                </p>
                <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hopn-opacity-btn"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                    @if($lang === 'ar') تواصل معنا @elseif($lang === 'de') Kontakt @else Get in Touch → @endif
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>