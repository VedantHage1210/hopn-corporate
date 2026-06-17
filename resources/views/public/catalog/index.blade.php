<x-layouts.public :title="$lang==='ar'?'الكتالوج':($lang==='de'?'Katalog':'Catalog')">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:50%; transform:translateX(-50%); width:600px; height:400px; background:radial-gradient(ellipse, rgba(79,110,247,0.1) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') الكتالوج @elseif($lang==='de') Katalog @else Product Catalog @endif
            </span>
        </div>
        <h1 style="font-size:clamp(32px,5vw,64px); font-weight:900; color:white; letter-spacing:-2px; margin:0 auto 20px; max-width:800px; line-height:1.1;">
            @if($lang==='ar') استكشف منتجاتنا وخدماتنا وبرامجنا
            @elseif($lang==='de') Entdecken Sie unsere Produkte, Services &amp; Programme
            @else Explore Our Products, Services &amp; Programs @endif
        </h1>
        <p style="color:#64748B; font-size:17px; max-width:560px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') كل ما تحتاجه لتحويل مؤسستك في مكان واحد
            @elseif($lang==='de') Alles was Sie für die digitale Transformation brauchen
            @else Everything you need to transform your organization, in one place @endif
        </p>

        {{-- Search --}}
        <form method="GET" action="{{ route('catalog.index', ['lang'=>$lang]) }}"
              style="max-width:600px; margin:0 auto;">
            <div style="display:flex; gap:12px;">
                <div style="flex:1; position:relative;">
                    <svg style="position:absolute; left:14px; top:50%; transform:translateY(-50%); width:18px; height:18px; color:#475569;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search }}"
                           placeholder="{{ $lang==='ar'?'ابحث في الكتالوج...':($lang==='de'?'Katalog durchsuchen...':'Search catalog...') }}"
                           style="width:100%; padding:14px 14px 14px 44px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                           onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                </div>
                <button type="submit"
                        style="padding:14px 24px; background:#4F6EF7; color:white; border:none; border-radius:10px; font-size:15px; font-weight:600; cursor:pointer; white-space:nowrap;"
                        onmouseover="this.style.opacity='0.88'"
                        onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') بحث @elseif($lang==='de') Suchen @else Search @endif
                </button>
                @if($search)
                <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
                   style="padding:14px 20px; border-radius:10px; border:1px solid rgba(255,255,255,0.1); background:rgba(255,255,255,0.04); color:#94A3B8; font-size:14px; text-decoration:none; display:inline-flex; align-items:center; white-space:nowrap;"
                   onmouseover="this.style.color='white'"
                   onmouseout="this.style.color='#94A3B8'">
                    ✕ @if($lang==='ar') مسح @elseif($lang==='de') Löschen @else Clear @endif
                </a>
                @endif
            </div>
        </form>
    </div>
</section>

{{-- Category Filters --}}
<section style="background:#030712; padding:0 0 40px; border-bottom:1px solid rgba(255,255,255,0.05);">
    <div class="container-shell">
        <div style="display:flex; flex-wrap:wrap; gap:8px; justify-content:center;">
            @php
            $tabs = [
                ['key'=>'all',      'label'=>$lang==='ar'?'الكل':($lang==='de'?'Alle':'All'),                                           'count'=>null],
                ['key'=>'products', 'label'=>$lang==='ar'?'المنتجات':($lang==='de'?'Produkte':'Products'),                              'count'=>$products->count()],
                ['key'=>'services', 'label'=>$lang==='ar'?'الخدمات':($lang==='de'?'Leistungen':'Services'),                            'count'=>$services->count()],
                ['key'=>'programs', 'label'=>$lang==='ar'?'البرامج':($lang==='de'?'Programme':'Programs'),                              'count'=>$programs->count()],
                ['key'=>'domains',  'label'=>$lang==='ar'?'مجالات الابتكار':($lang==='de'?'Innovationsdomänen':'Innovation Domains'),   'count'=>$domains->count()],
            ];
            @endphp
            @foreach($tabs as $tab)
            {{-- Search mode mein 0 count tabs hide karo, All tab hamesha dikhe --}}
            @if(!$search || $tab['key']==='all' || ($tab['count'] !== null && $tab['count'] > 0))
            <a href="{{ route('catalog.index', ['lang'=>$lang, 'category'=>$tab['key']]) }}"
               style="padding:8px 20px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; transition:all 0.2s;
               {{ $category===$tab['key'] ? 'background:#4F6EF7; color:white; border:1px solid #4F6EF7;' : 'background:rgba(255,255,255,0.04); color:#64748B; border:1px solid rgba(255,255,255,0.08);' }}">
                {{ $tab['label'] }}
                @if($tab['count'] !== null) ({{ $tab['count'] }}) @endif
            </a>
            @endif
            @endforeach
        </div>

        {{-- Search result info --}}
        @if($search)
        <div style="text-align:center; margin-top:16px; font-size:14px; color:#64748B;">
            @if($lang==='ar') نتائج البحث عن: @elseif($lang==='de') Suchergebnisse für: @else Search results for: @endif
            <span style="color:white; font-weight:600;">"{{ $search }}"</span>
        </div>
        @endif
    </div>
</section>

{{-- Results --}}
<section style="padding:60px 0; background:#050A14; min-height:60vh;">
    <div class="container-shell">

        {{-- PRODUCTS --}}
        @if(in_array($category, ['all','products']) && $products->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:32px; height:2px; background:#4F6EF7;"></div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin:0;">
                        @if($lang==='ar') المنتجات @elseif($lang==='de') Produkte @else Products @endif
                    </h2>
                    <span style="font-size:12px; color:#475569; border:1px solid rgba(255,255,255,0.08); border-radius:999px; padding:2px 10px;">{{ $products->count() }}</span>
                </div>
                <a href="{{ route('products.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#818CF8; text-decoration:none; font-weight:600;"
                   onmouseover="this.style.opacity='0.7'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($products as $product)
                @php
                    $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                    $c=$colors[$loop->index%6];
                    $title=$lang==='ar'&&$product->title_ar?$product->title_ar:($lang==='de'&&$product->title_de?$product->title_de:$product->title_en);
                    $summary=$lang==='ar'&&$product->summary_ar?$product->summary_ar:($lang==='de'&&$product->summary_de?$product->summary_de:($product->summary_en??''));
                @endphp
                <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$product->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s; position:relative; overflow:hidden;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                    <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                    <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(79,110,247,0.08); border:1px solid rgba(79,110,247,0.15); border-radius:6px; padding:3px 10px; margin-bottom:14px; width:fit-content;">
                        <span style="font-size:10px; font-weight:700; text-transform:uppercase; color:#818CF8; letter-spacing:0.08em;">
                            @if($lang==='ar') منتج @elseif($lang==='de') Produkt @else Product @endif
                        </span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:14px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:900; color:{{ $c }}; flex-shrink:0;">
                            {{ strtoupper(substr($title,0,1)) }}
                        </div>
                        <h3 style="font-size:17px; font-weight:700; color:white; margin:0;">{{ $title }}</h3>
                    </div>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1; margin-bottom:16px;">{{ Str::limit($summary,90) }}</p>
                    <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                        @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                    </span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- SERVICES --}}
        @if(in_array($category, ['all','services']) && $services->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:32px; height:2px; background:#10B981;"></div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin:0;">
                        @if($lang==='ar') الخدمات @elseif($lang==='de') Leistungen @else Services @endif
                    </h2>
                    <span style="font-size:12px; color:#475569; border:1px solid rgba(255,255,255,0.08); border-radius:999px; padding:2px 10px;">{{ $services->count() }}</span>
                </div>
                <a href="{{ route('services.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#10B981; text-decoration:none; font-weight:600;"
                   onmouseover="this.style.opacity='0.7'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($services as $service)
                @php
                    $colors=['#10B981','#4F6EF7','#8B5CF6','#F59E0B','#EF4444','#06B6D4'];
                    $c=$colors[$loop->index%6];
                    $svcTitle=$lang==='ar'&&$service->name_ar?$service->name_ar:($lang==='de'&&$service->name_de?$service->name_de:$service->name);
                    $svcSummary=$lang==='ar'&&$service->summary_ar?$service->summary_ar:($lang==='de'&&$service->summary_de?$service->summary_de:($service->summary??''));
                @endphp
                <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$service->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s; position:relative; overflow:hidden;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                    <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                    <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(16,185,129,0.08); border:1px solid rgba(16,185,129,0.15); border-radius:6px; padding:3px 10px; margin-bottom:14px; width:fit-content;">
                        <span style="font-size:10px; font-weight:700; text-transform:uppercase; color:#10B981; letter-spacing:0.08em;">
                            @if($lang==='ar') خدمة @elseif($lang==='de') Leistung @else Service @endif
                        </span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:14px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0;">
                            {{ $service->icon ?? '⚡' }}
                        </div>
                        <h3 style="font-size:17px; font-weight:700; color:white; margin:0;">{{ $svcTitle }}</h3>
                    </div>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1; margin-bottom:16px;">{{ Str::limit($svcSummary,90) }}</p>
                    <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                        @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Mehr lesen @else Learn more @endif →
                    </span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- PROGRAMS --}}
        @if(in_array($category, ['all','programs']) && $programs->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:32px; height:2px; background:#8B5CF6;"></div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin:0;">
                        @if($lang==='ar') البرامج @elseif($lang==='de') Programme @else Programs @endif
                    </h2>
                    <span style="font-size:12px; color:#475569; border:1px solid rgba(255,255,255,0.08); border-radius:999px; padding:2px 10px;">{{ $programs->count() }}</span>
                </div>
                <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#A78BFA; text-decoration:none; font-weight:600;"
                   onmouseover="this.style.opacity='0.7'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($programs as $program)
                @php
                    $colors=['#8B5CF6','#4F6EF7','#10B981','#F59E0B','#EF4444','#06B6D4'];
                    $c=$colors[$loop->index%6];
                    $pTitle=$lang==='ar'&&$program->title_ar?$program->title_ar:($lang==='de'&&$program->title_de?$program->title_de:$program->title_en);
                    $pSummary=$lang==='ar'&&$program->summary_ar?$program->summary_ar:($lang==='de'&&$program->summary_de?$program->summary_de:($program->summary_en??''));
                @endphp
                <a href="{{ route('programs.show', ['lang'=>$lang,'slug'=>$program->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s; position:relative; overflow:hidden;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                    <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>
                    <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(139,92,246,0.08); border:1px solid rgba(139,92,246,0.15); border-radius:6px; padding:3px 10px; margin-bottom:14px; width:fit-content;">
                        <span style="font-size:10px; font-weight:700; text-transform:uppercase; color:#A78BFA; letter-spacing:0.08em;">
                            @if($lang==='ar') برنامج @elseif($lang==='de') Programm @else Program @endif
                        </span>
                    </div>
                    <h3 style="font-size:17px; font-weight:700; color:white; margin:0 0 12px; line-height:1.3;">{{ $pTitle }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7; flex:1; margin-bottom:16px;">{{ Str::limit($pSummary,90) }}</p>
                    <span style="font-size:13px; font-weight:600; color:{{ $c }};">
                        @if($lang==='ar') تعرف أكثر @elseif($lang==='de') Mehr erfahren @else Learn more @endif →
                    </span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- INNOVATION DOMAINS --}}
        @if(in_array($category, ['all','domains']) && $domains->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:32px; height:2px; background:#F59E0B;"></div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin:0;">
                        @if($lang==='ar') مجالات الابتكار @elseif($lang==='de') Innovationsdomänen @else Innovation Domains @endif
                    </h2>
                    <span style="font-size:12px; color:#475569; border:1px solid rgba(255,255,255,0.08); border-radius:999px; padding:2px 10px;">{{ $domains->count() }}</span>
                </div>
                <a href="{{ route('innovation.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#F59E0B; text-decoration:none; font-weight:600;"
                   onmouseover="this.style.opacity='0.7'"
                   onmouseout="this.style.opacity='1'">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle anzeigen @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:12px;">
                @foreach($domains as $domain)
                <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$domain->slug]) }}"
                   style="display:flex; align-items:center; gap:14px; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:14px; padding:18px 20px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='rgba(245,158,11,0.3)'; this.style.background='#0D1425'; this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'; this.style.transform='translateY(0)'">
                    <span style="font-size:24px;">{{ $domain->icon ?? '🔬' }}</span>
                    <span style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $domain->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Empty State --}}
        @if($products->count()===0 && $services->count()===0 && $programs->count()===0 && $domains->count()===0)
        <div style="text-align:center; padding:80px; color:#334155;">
            <div style="font-size:48px; margin-bottom:16px;">🔍</div>
            <h3 style="font-size:20px; font-weight:700; color:#64748B; margin-bottom:8px;">
                @if($lang==='ar') لا توجد نتائج @elseif($lang==='de') Keine Ergebnisse @else No results found @endif
            </h3>
            <p style="font-size:14px; color:#334155; margin-bottom:20px;">
                @if($lang==='ar') جرب كلمات بحث مختلفة @elseif($lang==='de') Versuchen Sie andere Suchbegriffe @else Try different search terms @endif
            </p>
            <a href="{{ route('catalog.index', ['lang'=>$lang]) }}"
               style="display:inline-flex; padding:10px 24px; border-radius:8px; background:#4F6EF7; color:white; font-size:14px; font-weight:600; text-decoration:none;">
                @if($lang==='ar') مسح البحث @elseif($lang==='de') Suche löschen @else Clear search @endif
            </a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0; background:#030712; border-top:1px solid rgba(255,255,255,0.04);">
    <div class="container-shell" style="text-align:center;">
        <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') لم تجد ما تبحث عنه؟
            @elseif($lang==='de') Nicht gefunden was Sie suchen?
            @else Can't find what you're looking for? @endif
        </h2>
        <p style="color:#64748B; font-size:16px; margin-bottom:32px;">
            @if($lang==='ar') تواصل معنا وسنساعدك في إيجاد الحل المناسب
            @elseif($lang==='de') Kontaktieren Sie uns und wir helfen Ihnen
            @else Contact us and we'll help you find the right solution @endif
        </p>
        <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
           style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;"
           onmouseover="this.style.transform='translateY(-2px)'"
           onmouseout="this.style.transform='translateY(0)'">
            @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Get in Touch @endif →
        </a>
    </div>
</section>

</x-layouts.public>
