@props(['partners' => collect()])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="swiper partner-swiper"
     style="width:100%; padding:8px 0; overflow:hidden;">
    <div class="swiper-wrapper" style="align-items:center;">
        @foreach($partners as $partner)
        <div class="swiper-slide" style="display:flex; align-items:center; justify-content:center;">
            <div style="display:flex; align-items:center; justify-content:center; height:64px; padding:0 24px; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.03); border-radius:12px; transition:all 0.3s; cursor:default;"
                 onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='rgba(79,110,247,0.06)'"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='rgba(255,255,255,0.03)'">
                @if(!empty($partner->logo_url))
                    <img src="{{ $partner->logo_url }}"
                         alt="{{ $partner->name }}"
                         style="max-height:32px; max-width:120px; object-fit:contain; filter:grayscale(100%) brightness(0.7); transition:filter 0.3s;"
                         onmouseover="this.style.filter='grayscale(0%) brightness(1)'"
                         onmouseout="this.style.filter='grayscale(100%) brightness(0.7)'">
                @else
                    <span style="font-size:13px; font-weight:600; color:#475569; white-space:nowrap; transition:color 0.3s;"
                          onmouseover="this.style.color='#94A3B8'"
                          onmouseout="this.style.color='#475569'">
                        {{ $partner->name }}
                    </span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper('.partner-swiper', {
        slidesPerView: 2,
        spaceBetween: 16,
        loop: true,
        speed: 3000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        freeMode: true,
        breakpoints: {
            640:  { slidesPerView: 3, spaceBetween: 16 },
            768:  { slidesPerView: 4, spaceBetween: 20 },
            1024: { slidesPerView: 6, spaceBetween: 24 },
        }
    });
</script>
