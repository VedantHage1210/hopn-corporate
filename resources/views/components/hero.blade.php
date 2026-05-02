@props(['title' => 'Enterprise Solutions', 'subtitle' => null, 'cta' => null, 'ctaUrl' => null])
<section class="container-shell">
    <div class="card-panel p-8 md:p-12">
        <p class="text-sm uppercase tracking-wide text-indigo-300">HOPn Corporate</p>
        <h1 class="mt-3 text-3xl font-extrabold text-white md:text-5xl">{{ $title }}</h1>
        @if($subtitle)
            <p class="mt-4 max-w-3xl text-slate-300">{{ $subtitle }}</p>
        @endif
        @if($cta && $ctaUrl)
            <a class="btn-primary mt-6" href="{{ $ctaUrl }}">{{ $cta }}</a>
        @endif
    </div>
</section>
