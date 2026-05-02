@props(['title' => 'Ready to scale?', 'buttonText' => 'Contact us', 'buttonUrl' => null])
<section class="container-shell">
    <div class="card-panel flex flex-col items-start justify-between gap-4 p-8 md:flex-row md:items-center">
        <h3 class="text-2xl font-bold text-white">{{ $title }}</h3>
        <a href="{{ $buttonUrl ?? route('contact.index', ['lang' => request()->route('lang', 'en')]) }}" class="btn-primary">{{ $buttonText }}</a>
    </div>
</section>
