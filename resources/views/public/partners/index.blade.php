<x-layouts.public :title="'Partners'">
@php($lang = request()->route('lang', 'en'))

    <section style="position:relative; overflow:hidden; background:#0A0F1E; padding:80px 0 100px;">
        <div style="position:absolute; inset:0; pointer-events:none; background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px); background-size: 48px 48px;"></div>
        <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
            <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.35); background:rgba(16,185,129,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#10B981; display:inline-block;"></span>
                <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981;">Partners & Clients</span>
            </div>
            <h1 style="font-size:clamp(28px,5vw,56px); font-weight:800; color:white; line-height:1.15; max-width:800px; margin:0 auto 20px;">
                @if($lang === 'ar') شركاؤنا وعملاؤنا @elseif($lang === 'de') Unsere Partner & Kunden @else Our Partners & Clients @endif
            </h1>
            <p style="font-size:clamp(15px,2vw,18px); color:#94A3B8; max-width:600px; margin:0 auto; line-height:1.7;">
                @if($lang === 'ar') موثوق به من قبل المنظمات الرائدة في جميع الصناعات.
                @elseif($lang === 'de') Vertrauen führender Organisationen aus allen Branchen.
                @else Trusted by leading organisations across industries worldwide.
                @endif
            </p>
        </div>
    </section>

    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            @if($partners->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px;">
                @foreach($partners as $partner)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:28px 20px; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:12px; text-align:center; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.3)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    @if($partner->logo_url)
                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                         style="height:48px; width:auto; object-fit:contain; filter:brightness(0.8) grayscale(0.3);"
                         onmouseover="this.style.filter='brightness(1) grayscale(0)'"
                         onmouseout="this.style.filter='brightness(0.8) grayscale(0.3)'">
                    @else
                    <div style="width:56px; height:56px; border-radius:14px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:800; color:#10B981;">
                        {{ strtoupper(substr($partner->name, 0, 2)) }}
                    </div>
                    @endif
                    <div style="font-size:14px; font-weight:600; color:#CBD5E1;">{{ $partner->name }}</div>
                    @if($partner->category)
                    <span style="font-size:11px; font-weight:600; padding:2px 8px; border-radius:999px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); color:#10B981;">
                        {{ ucfirst($partner->category) }}
                    </span>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:80px; color:#64748B;">
                <div style="font-size:48px; margin-bottom:16px;">🤝</div>
                <p>No partners found. Add partners from the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    <section style="padding:60px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:600px; margin:0 auto; border:1px solid rgba(16,185,129,0.2); background:rgba(16,185,129,0.05); border-radius:24px; padding:48px 32px;">
                <h2 style="font-size:28px; font-weight:800; color:white; margin-bottom:16px;">Become a Partner</h2>
                <p style="color:#94A3B8; font-size:15px; line-height:1.7; margin-bottom:28px;">Join HOPn's growing network of enterprise partners and innovators.</p>
                <a href="{{ route('partner-inquiry.index', ['lang' => $lang]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; background:#10B981; color:white; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                    Partner Inquiry →
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
