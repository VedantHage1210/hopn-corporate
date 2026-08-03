@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="$lang==='ar'?'المقالات والرؤى':($lang==='de'?'Einblicke & Artikel':'Insights & Articles')">

{{-- HERO --}}
<section style="position:relative; overflow:hidden; background:#030712; padding:60px 0 40px;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-100px; left:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10;">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:40px;">
            <div>
                <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.3); background:rgba(79,110,247,0.08); border-radius:999px; padding:6px 18px; margin-bottom:20px;">
                    <span style="width:6px; height:6px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                    <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#818CF8;">
                        @if($lang==='ar') المقالات والرؤى @elseif($lang==='de') Einblicke @else Insights @endif
                    </span>
                </div>
                <h1 style="font-size:clamp(28px,5vw,52px); font-weight:900; color:white; letter-spacing:-2px; margin:0; line-height:1.1;">
                    @if($lang==='ar') أفكار وأبحاث وتحليلات @elseif($lang==='de') Gedanken, Forschung &amp; Analysen @else Thoughts, Research &amp; Analysis @endif
                </h1>
                <p style="font-size:16px; color:#94A3B8; margin-top:12px; max-width:500px; line-height:1.7;">
                    @if($lang==='ar') مقالات متعمقة ورؤى تقنية وأبحاث ابتكار من فريق HOPn.
                    @elseif($lang==='de') Tiefgehende Artikel, technische Einblicke und Innovationsforschung vom HOPn-Team.
                    @else In-depth articles, technical insights, and innovation research from the HOPn team. @endif
                </p>
            </div>
            {{-- Search --}}
            <form method="GET" action="{{ route('insights.index', ['lang'=>$lang]) }}" style="display:flex; gap:10px;">
                <div style="position:relative;">
                    <svg style="position:absolute; left:12px; top:50%; transform:translateY(-50%); width:16px; height:16px; color:#64748B;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                           placeholder="{{ $lang==='ar'?'بحث...':($lang==='de'?'Suchen...':'Search articles...') }}"
                           style="padding:10px 12px 10px 36px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; width:200px; outline:none;"
                           onfocus="this.style.borderColor='rgba(79,110,247,0.5)'"
                           onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                </div>
                <button type="submit" style="padding:10px 20px; background:#4F6EF7; color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer;">
                    @if($lang==='ar') بحث @elseif($lang==='de') Suchen @else Search @endif
                </button>
            </form>
        </div>

        {{-- Category Tabs --}}
        @if(isset($categories) && $categories->count() > 0)
        <div style="display:flex; flex-wrap:wrap; gap:8px; border-bottom:1px solid rgba(255,255,255,0.06); padding-bottom:0;">
            <a href="{{ route('insights.index', ['lang'=>$lang]) }}"
               style="padding:10px 18px; font-size:13px; font-weight:600; text-decoration:none; border-bottom:2px solid {{ !isset($category)||!$category||$category==='all'?'#4F6EF7':'transparent' }}; color:{{ !isset($category)||!$category||$category==='all'?'white':'#94A3B8' }}; transition:all 0.2s; margin-bottom:-1px;">
                @if($lang==='ar') الكل @elseif($lang==='de') Alle @else All @endif
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('insights.index', ['lang'=>$lang, 'category'=>$cat->slug]) }}"
               class="hopn-link-accent" style="padding:10px 18px; font-size:13px; font-weight:600; text-decoration:none; border-bottom:2px solid {{ isset($category)&&$category===$cat->slug?'#4F6EF7':'transparent' }}; color:{{ isset($category)&&$category===$cat->slug?'white':'#94A3B8' }}; transition:all 0.2s; margin-bottom:-1px; white-space:nowrap;">
                {{ $cat->name }}
                @if($cat->posts_count > 0)
                <span style="font-size:11px; opacity:0.6;">({{ $cat->posts_count }})</span>
                @endif
            </a>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- FEATURED --}}
@if(isset($featured) && $featured && (!isset($category)||!$category||$category==='all') && empty($search))
<section style="padding:40px 0 0; background:#030712;">
    <div class="container-shell">
        <a href="{{ route('insights.show', ['lang'=>$lang,'slug'=>$featured->slug]) }}"
           class="hopn-lift-btn" style="display:grid; grid-template-columns:1fr 1fr; gap:0; border:1px solid rgba(255,255,255,0.07); background:#0A0F1E; border-radius:20px; overflow:hidden; text-decoration:none; transition:all 0.3s;">
            <div style="position:relative; min-height:280px; background:linear-gradient(135deg,rgba(79,110,247,0.15),rgba(139,92,246,0.15)); display:flex; align-items:center; justify-content:center; overflow:hidden;">
                @if($featured->featured_image_path)
                <img src="{{ $featured->featured_image_path }}" alt="{{ $featured->title }}"
                     style="width:100%; height:100%; object-fit:cover; position:absolute; inset:0;">
                @else
                <span style="font-size:64px;">✍️</span>
                @endif
                <div style="position:absolute; top:16px; left:16px;">
                    <span style="font-size:11px; font-weight:700; padding:4px 12px; border-radius:999px; background:rgba(79,110,247,0.9); color:white; text-transform:uppercase;">
                        @if($lang==='ar') مميز @elseif($lang==='de') Featured @else Featured @endif
                    </span>
                </div>
            </div>
            <div style="padding:40px; display:flex; flex-direction:column; justify-content:center; gap:16px;">
                @if($featured->category)
                <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8; width:fit-content;">
                    {{ $featured->category->name }}
                </span>
                @endif
                <h2 style="font-size:clamp(20px,3vw,28px); font-weight:800; color:white; line-height:1.3; margin:0;">
                    @if($lang==='de'&&$featured->title_de) {{ $featured->title_de }}
                    @elseif($lang==='ar'&&$featured->title_ar) {{ $featured->title_ar }}
                    @else {{ $featured->title }} @endif
                </h2>
                @if($featured->excerpt)
                <p style="font-size:15px; color:#94A3B8; line-height:1.7; margin:0;">{{ Str::limit($featured->excerpt,150) }}</p>
                @endif
                <div style="display:flex; align-items:center; gap:16px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.06);">
                    <span style="font-size:13px; color:#64748B;">{{ $featured->published_at?->format('d M Y') }}</span>
                    <span style="font-size:13px; font-weight:600; color:#4F6EF7;">
                        @if($lang==='ar') اقرأ المزيد @elseif($lang==='de') Lesen @else Read more @endif →
                    </span>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

{{-- POSTS GRID --}}
<section style="padding:40px 0 100px; background:#030712;">
    <div class="container-shell">

        @if(!empty($search))
        <div style="margin-bottom:24px; color:#94A3B8; font-size:14px;">
            @if($lang==='ar') نتائج: @elseif($lang==='de') Ergebnisse für: @else Results for: @endif
            <span style="color:white; font-weight:600;">"{{ $search }}"</span>
            <a href="{{ route('insights.index', ['lang'=>$lang]) }}" style="margin-left:12px; color:#EF4444; font-size:12px;">✕ Clear</a>
        </div>
        @endif

        @if($posts->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:20px;">
            @foreach($posts as $post)
            @php $colors=['#4F6EF7','#10B981','#8B5CF6','#F59E0B','#EF4444','#06B6D4']; $c=$colors[$loop->index%6]; @endphp
            <a href="{{ route('insights.show', ['lang'=>$lang,'slug'=>$post->slug]) }}"
               class="hopn-lift-card" style="display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; overflow:hidden; text-decoration:none; transition:all 0.25s;">
                @if($post->featured_image_path)
                <div style="height:180px; overflow:hidden;">
                    <img src="{{ $post->featured_image_path }}" alt="{{ $post->title }}"
                         class="hopn-lift-btn" style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;">
                </div>
                @else
                <div style="height:100px; background:linear-gradient(135deg,{{ $c }}20,{{ $c }}05); display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:32px;">✍️</span>
                </div>
                @endif
                <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
                    @if($post->category)
                    <span style="display:inline-block; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $c }}15; border:1px solid {{ $c }}30; color:{{ $c }}; width:fit-content;">
                        {{ $post->category->name }}
                    </span>
                    @endif
                    <h3 style="font-size:17px; font-weight:700; color:white; line-height:1.4; flex:1; margin:0;">
                        @if($lang==='de'&&$post->title_de) {{ $post->title_de }}
                        @elseif($lang==='ar'&&$post->title_ar) {{ $post->title_ar }}
                        @else {{ $post->title }} @endif
                    </h3>
                    @if($post->excerpt)
                    <p style="font-size:13px; color:#94A3B8; line-height:1.6; margin:0;">{{ Str::limit($post->excerpt,90) }}</p>
                    @endif
                    <div style="display:flex; align-items:center; justify-content:space-between; padding-top:12px; border-top:1px solid rgba(255,255,255,0.05);">
                        <span style="font-size:12px; color:#475569;">{{ $post->published_at?->format('d M Y') }}</span>
                        <span style="font-size:12px; font-weight:600; color:{{ $c }};">
                            @if($lang==='ar') اقرأ @elseif($lang==='de') Lesen @else Read @endif →
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @if($posts->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">{{ $posts->links() }}</div>
        @endif
        @else
        <div style="text-align:center; padding:80px; color:#475569;">
            <div style="font-size:48px; margin-bottom:16px;">✍️</div>
            <h3 style="font-size:20px; font-weight:700; color:#64748B; margin-bottom:8px;">
                @if($lang==='ar') لا توجد مقالات @elseif($lang==='de') Keine Artikel @else No articles found @endif
            </h3>
        </div>
        @endif
    </div>
</section>

</x-layouts.public>
