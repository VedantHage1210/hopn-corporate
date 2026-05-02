@props(['partners' => collect()])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<div class="swiper partner-swiper card-panel p-4">
    <div class="swiper-wrapper">
        @foreach($partners as $partner)
            <div class="swiper-slide flex h-20 items-center justify-center text-sm text-slate-300">{{ $partner->name }}</div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper('.partner-swiper', { slidesPerView: 2, spaceBetween: 12, loop: true, autoplay: { delay: 1500 }, breakpoints: { 768: { slidesPerView: 4 }, 1024: { slidesPerView: 6 } } });
</script>
