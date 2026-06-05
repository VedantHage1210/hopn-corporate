<x-layouts.public :title="'Catalog — HOPn'">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:24px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                @if($lang==='ar') كتالوج HOPn @elseif($lang==='de') HOPn Katalog @else HOPn Catalog @endif
            </span>
        </div>
        <h1 style="font-size:clamp(32px,5vw,64px); font-weight:900; color:white; letter-spacing:-2px; margin-bottom:20px;">
            @if($lang==='ar') استكشف جميع حلولنا @elseif($lang==='de') Alle Lösungen entdecken @else Explore All Solutions @endif
        </h1>
        <p style="color:#64748B; font-size:18px; max-width:540px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') منتجات وخدمات وبرامج ومجالات ابتكار في مكان واحد
            @elseif($lang==='de') Produkte, Dienstleistungen, Programme und Innovationsdomänen an einem Ort
            @else Products, services, programs, and innovation domains — all in one place @endif
        </p>

        {{-- Search --}}
        <form method="GET" style="display:flex; gap:10px; justify-content:center; max-width:500px; margin:0 auto;">
            <input type="text" name="search" value="{{ $search }}"
                   placeholder="{{ $lang==='ar'?'ابحث...':($lang==='de'?'Suchen...':'Search...') }}"
                   style="flex:1; padding:12px 20px; border-radius:10px; border:1px solid rgba(255,255,255,0.1); background:rgba(255,255,255,0.05); color:white; font-size:15px; outline:none;">
            <button type="submit"
                    style="padding:12px 24px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer;">
                @if($lang==='ar') بحث @elseif($lang==='de') Suchen @else Search @endif
            </button>
        </form>
    </div>
</section>

{{-- Filter Tabs --}}
<section style="background:#030712; padding:0 0 40px; position:sticky; top:56px; z-index:40; border-bottom:1px solid rgba(255,255,255,0.05);">
    <div class="container-shell">
        <div style="display:flex; gap:8px; overflow-x:auto; padding:16px 0;">
            @foreach([
                ['key'=>'all',    'en'=>'All',              'de'=>'Alle',          'ar'=>'الكل'],
                ['key'=>'products','en'=>'Products ('.$products->count().')','de'=>'Produkte ('.$products->count().')','ar'=>'المنتجات ('.$products->count().')'],
                ['key'=>'services','en'=>'Services ('.$services->count().')','de'=>'Leistungen ('.$services->count().')','ar'=>'الخدمات ('.$services->count().')'],
                ['key'=>'programs','en'=>'Programs ('.$programs->count().')','de'=>'Programme ('.$programs->count().')','ar'=>'البرامج ('.$programs->count().')'],
                ['key'=>'domains', 'en'=>'Innovation ('.$domains->count().')','de'=>'Innovation ('.$domains->count().')','ar'=>'الابتكار ('.$domains->count().')'],
            ] as $tab)
            <a href="?category={{ $tab['key'] }}@if($search)&search={{ $search }}@endif"
               style="display:inline-flex; align-items:center; white-space:nowrap; padding:8px 18px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; transition:all 0.2s;
               {{ $category === $tab['key'] ? 'background:#4F6EF7; color:white;' : 'border:1px solid rgba(255,255,255,0.1); color:#64748B;' }}"
               onmouseover="{{ $category !== $tab['key'] ? "this.style.borderColor='rgba(79,110,247,0.4)'; this.style.color='white'" : '' }}"
               onmouseout="{{ $category !== $tab['key'] ? "this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='#64748B'" : '' }}">
                {{ $tab[$lang] ?? $tab['en'] }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:60px 0 100px; background:#030712;">
    <div class="container-shell">

        {{-- Products --}}
        @if($category === 'all' || $category === 'products')
        @if($products->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <h2 style="font-size:24px; font-weight:800; color:white;">
                    @if($lang==='ar') المنتجات @elseif($lang==='de') Produkte @else Products @endif
                </h2>
                <a href="{{ route('products.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#818CF8; text-decoration:none;">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($products as $item)
                @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6];
                $title=$lang==='ar'&&$item->title_ar?$item->title_ar:($lang==='de'&&$item->title_de?$item->title_de:$item->title_en);
                $summary=$lang==='ar'&&$item->summary_ar?$item->summary_ar:($lang==='de'&&$item->summary_de?$item->summary_de:$item->summary_en);
                @endphp
                <a href="{{ route('products.show', ['lang'=>$lang,'slug'=>$item->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                        <div style="width:36px; height:36px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:900; color:{{ $c }};">
                            {{ strtoupper(substr($title,0,1)) }}
                        </div>
                        <span style="font-size:11px; font-weight:700; padding:2px 8px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20;">
                            @if($lang==='ar') منتج @elseif($lang==='de') Produkt @else Product @endif
                        </span>
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $title }}</h3>
                    <p style="font-size:13px; color:#475569; line-height:1.6; flex:1;">{{ Str::limit($summary,80) }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        @endif

        {{-- Services --}}
        @if($category === 'all' || $category === 'services')
        @if($services->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <h2 style="font-size:24px; font-weight:800; color:white;">
                    @if($lang==='ar') الخدمات @elseif($lang==='de') Leistungen @else Services @endif
                </h2>
                <a href="{{ route('services.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#818CF8; text-decoration:none;">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($services as $item)
                @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
                <a href="{{ route('services.show', ['lang'=>$lang,'slug'=>$item->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                        <div style="font-size:24px;">{{ $item->icon ?? '⚡' }}</div>
                        <span style="font-size:11px; font-weight:700; padding:2px 8px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20;">
                            @if($lang==='ar') خدمة @elseif($lang==='de') Leistung @else Service @endif
                        </span>
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item->title }}</h3>
                    <p style="font-size:13px; color:#475569; line-height:1.6; flex:1;">{{ Str::limit($item->summary ?? $item->description ?? '',80) }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        @endif

        {{-- Programs --}}
        @if($category === 'all' || $category === 'programs')
        @if($programs->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <h2 style="font-size:24px; font-weight:800; color:white;">
                    @if($lang==='ar') البرامج @elseif($lang==='de') Programme @else Programs @endif
                </h2>
                <a href="{{ route('programs.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#818CF8; text-decoration:none;">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @foreach($programs as $item)
                @php $colors=['#10B981','#4F6EF7','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
                <a href="{{ route('programs.show', ['lang'=>$lang,'slug'=>$item->slug]) }}"
                   style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.transform='translateY(-3px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)'">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                        <div style="font-size:24px;">{{ $item->icon ?? '🎯' }}</div>
                        <span style="font-size:11px; font-weight:700; padding:2px 8px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20;">
                            @if($lang==='ar') برنامج @elseif($lang==='de') Programm @else Program @endif
                        </span>
                    </div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item->title }}</h3>
                    <p style="font-size:13px; color:#475569; line-height:1.6; flex:1;">{{ Str::limit($item->summary ?? $item->description ?? '',80) }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        @endif

        {{-- Innovation Domains --}}
        @if($category === 'all' || $category === 'domains')
        @if($domains->count() > 0)
        <div style="margin-bottom:64px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
                <h2 style="font-size:24px; font-weight:800; color:white;">
                    @if($lang==='ar') مجالات الابتكار @elseif($lang==='de') Innovationsdomänen @else Innovation Domains @endif
                </h2>
                <a href="{{ route('innovation.index', ['lang'=>$lang]) }}"
                   style="font-size:13px; color:#818CF8; text-decoration:none;">
                    @if($lang==='ar') عرض الكل @elseif($lang==='de') Alle @else View all @endif →
                </a>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); gap:16px;">
                @foreach($domains as $item)
                @php $colors=['#8B5CF6','#4F6EF7','#10B981','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
                <a href="{{ route('innovation.show', ['lang'=>$lang,'slug'=>$item->slug]) }}"
                   style="display:flex; align-items:center; gap:14px; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:20px; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $c }}30'; this.style.background='#0D1425'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'; this.style.background='#0A0F1E'">
                    <span style="font-size:28px;">{{ $item->icon ?? '🔬' }}</span>
                    <div>
                        <div style="font-size:15px; font-weight:700; color:white; margin-bottom:4px;">{{ $item->name }}</div>
                        <div style="font-size:11px; font-weight:700; padding:2px 8px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20; display:inline-block;">
                            @if($lang==='ar') ابتكار @elseif($lang==='de') Innovation @else Innovation @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        @endif

        {{-- Empty state --}}
        @if($products->count() === 0 && $services->count() === 0 && $programs->count() === 0 && $domains->count() === 0)
        <div style="text-align:center; padding:80px; color:#334155;">
            <div style="font-size:48px; margin-bottom:16px;">🔍</div>
            <p style="font-size:18px;">
                @if($lang==='ar') لا توجد نتائج @elseif($lang==='de') Keine Ergebnisse @else No results found @endif
            </p>
        </div>
        @endif

    </div>
</section>

</x-layouts.public>
