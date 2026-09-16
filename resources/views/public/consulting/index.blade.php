@php $lang = request()->route('lang', 'en'); @endphp
<x-layouts.public :title="'Consulting'">

<section style="position:relative; overflow:hidden; background:#030712; padding:80px 0 60px;">
    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; text-align:center;">
        <span style="font-size:11px; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; color:#10B981;">
            @if($lang==='ar') الاستشارات @elseif($lang==='de') Beratung @else Consulting @endif
        </span>
        <h1 style="font-size:clamp(32px,5vw,56px); font-weight:900; color:white; margin:16px 0 20px;">
            @if($lang==='ar') احجز خبيرًا @elseif($lang==='de') Buche einen Experten @else Book an Expert @endif
        </h1>
        <p style="font-size:17px; color:#CBD5E1; max-width:620px; margin:0 auto;">
            @if($lang==='ar') الوصول إلى استراتيجيي HOPn في الذكاء الاصطناعي والتوائم الرقمية واستراتيجية المواهب.
            @elseif($lang==='de') Zugang zu HOPn-Strategen in KI, Digital Twins und Talentstrategie.
            @else Access HOPn strategists in AI, digital twins, research commercialization, and talent strategy. @endif
        </p>
    </div>
</section>

@if($categories->count())
<section style="background:#030712; padding:0 0 30px;">
    <div class="container-shell" style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
        <a href="{{ route('consulting.index', ['lang'=>$lang]) }}"
           style="padding:8px 16px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; border:1px solid {{ !request('category') ? '#10B981' : 'rgba(148,163,184,0.25)' }}; color:{{ !request('category') ? '#6EE7B7' : '#94A3B8' }};">
            @if($lang==='ar') الكل @elseif($lang==='de') Alle @else All @endif
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('consulting.index', ['lang'=>$lang, 'category'=>$cat->slug]) }}"
           style="padding:8px 16px; border-radius:999px; font-size:13px; font-weight:600; text-decoration:none; border:1px solid {{ request('category')===$cat->slug ? '#10B981' : 'rgba(148,163,184,0.25)' }}; color:{{ request('category')===$cat->slug ? '#6EE7B7' : '#94A3B8' }};">
            {{ $lang==='de' ? ($cat->name_de ?: $cat->name_en) : ($lang==='ar' ? ($cat->name_ar ?: $cat->name_en) : $cat->name_en) }}
        </a>
        @endforeach
    </div>
</section>
@endif

<section style="background:#030712; padding:20px 0 100px;">
    <div class="container-shell">
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
            @forelse($experts as $expert)
            <div data-tilt class="card-panel" style="padding:26px;">
                <a href="{{ route('consulting.expert', ['lang'=>$lang, 'id'=>$expert->id]) }}" style="text-decoration:none;">
                    <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                        <div style="width:46px; height:46px; border-radius:50%; background:{{ $expert->accent_color ?? '#8B5CF6' }}22; border:1px solid {{ $expert->accent_color ?? '#8B5CF6' }}55; display:flex; align-items:center; justify-content:center; font-weight:800; color:{{ $expert->accent_color ?? '#A78BFA' }};">{{ $expert->initials }}</div>
                        <div style="flex:1;">
                            <div style="color:white; font-weight:700; font-size:15px;">{{ $expert->name }}</div>
                            <div style="color:#94A3B8; font-size:12px;">{{ $expert->specialization_en }}</div>
                        </div>
                        @if($expert->hourly_rate)
                        <div style="font-size:14px; font-weight:800; color:{{ $expert->accent_color ?? '#A78BFA' }}; white-space:nowrap;">€{{ $expert->hourly_rate }}{{ str_contains($expert->hourly_rate, '/') ? '' : '/hr' }}</div>
                        @endif
                    </div>
                    @if($expert->bio_en)
                    <p style="color:#94A3B8; font-size:13px; line-height:1.6; margin:0 0 14px;">{{ \Illuminate\Support\Str::limit($expert->bio_en, 100) }}</p>
                    @endif
                    @if($expert->tags && count($expert->tags) > 0)
                    <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:16px;">
                        @foreach($expert->tags as $tag)
                        <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $expert->accent_color ?? '#8B5CF6' }}12; border:1px solid {{ $expert->accent_color ?? '#8B5CF6' }}25; color:{{ $expert->accent_color ?? '#A78BFA' }};">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                </a>
                <a href="{{ route('consulting.book', ['lang'=>$lang, 'id'=>$expert->id]) }}"
                   style="display:block; text-align:center; padding:12px; border-radius:10px; background:#8B5CF6; color:white; font-size:14px; font-weight:700; text-decoration:none;">
                    @if($lang==='ar') احجز هذا الخبير @elseif($lang==='de') Diesen Experten buchen @else Book this expert @endif
                </a>
            </div>
            @empty
            <p style="color:#64748B; grid-column:1/-1; text-align:center; padding:40px 0;">
                @if($lang==='ar') لا يوجد خبراء حاليًا. @elseif($lang==='de') Aktuell keine Experten verfügbar. @else No experts published yet — add them from Admin → Experts. @endif
            </p>
            @endforelse
        </div>
    </div>
</section>

</x-layouts.public>
