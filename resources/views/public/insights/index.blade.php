<x-layouts.public :title="'Insights'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.10); filter:blur(80px);"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">Newsroom</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') أحدث الأخبار والرؤى @elseif($lang === 'de') Neuigkeiten & Einblicke @else Latest News & Insights @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') إعلانات وشراكات وتحديثات المنتجات وأنشطة البحث.
                @elseif($lang === 'de') Ankündigungen, Partnerschaften, Produktupdates und Forschungsaktivitäten.
                @else Announcements, partnerships, product updates, and research activities from HOPn.
                @endif
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($posts->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
                @foreach($posts as $post)
                <a href="{{ route('insights.show', ['lang' => $lang, 'slug' => $post->slug]) }}"
                   style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; overflow:hidden; text-decoration:none; transition:all 0.25s;"
                   onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-4px)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">

                    @if($post->cover_image)
                    <div style="height:180px; overflow:hidden;">
                        <img src="{{ Storage::url($post->cover_image) }}" alt="{{ $post->title }}"
                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                    @else
                    <div style="height:120px; background:linear-gradient(135deg, rgba(79,110,247,0.2), rgba(139,92,246,0.2)); display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:36px;">📰</span>
                    </div>
                    @endif

                    <div style="padding:24px; display:flex; flex-direction:column; flex:1; gap:12px;">
                        @if($post->category)
                        <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8; width:fit-content;">
                            {{ $post->category->name ?? 'News' }}
                        </span>
                        @endif
                        <h3 style="font-size:17px; font-weight:700; color:white; line-height:1.4; flex:1;">
                            @if($lang === 'de' && $post->title_de) {{ $post->title_de }}
                            @elseif($lang === 'ar' && $post->title_ar) {{ $post->title_ar }}
                            @else {{ $post->title }}
                            @endif
                        </h3>
                        @if($post->excerpt)
                        <p style="font-size:13px; color:#64748B; line-height:1.6;">
                            @if($lang === 'de' && $post->excerpt_de) {{ Str::limit($post->excerpt_de, 100) }}
                            @elseif($lang === 'ar' && $post->excerpt_ar) {{ Str::limit($post->excerpt_ar, 100) }}
                            @else {{ Str::limit($post->excerpt, 100) }}
                            @endif
                        </p>
                        @endif
                        <div style="display:flex; align-items:center; justify-content:space-between; margin-top:auto; padding-top:12px; border-top:1px solid rgba(255,255,255,0.05);">
                            <span style="font-size:12px; color:#475569;">
                                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d M Y') : '' }}
                            </span>
                            <span style="font-size:12px; font-weight:600; color:#818CF8;">Read more →</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @if($posts->hasPages())
            <div style="margin-top:40px; display:flex; justify-content:center;">{{ $posts->links() }}</div>
            @endif
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">📰</div>
                <p>No articles found. Add articles from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

</x-layouts.public>
