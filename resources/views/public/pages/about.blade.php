<x-layouts.public :title="'About'">
    <x-hero :title="$page->title ?? 'About HOPn'" :subtitle="$page->excerpt ?? 'We build enterprise-grade digital outcomes with speed and discipline.'" />
    <section class="container-shell mt-8">
        <div class="card-panel p-6 text-slate-300">
            @if($page && $page->blocks->count())
                @foreach($page->blocks as $block)
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-white">{{ $block->title }}</h3>
                        <p class="mt-2">{{ is_array($block->content) ? ($block->content['text'] ?? json_encode($block->content)) : $block->content }}</p>
                    </div>
                @endforeach
            @else
                <p>HOPn is a multidisciplinary corporate partner for consulting, products, and capability building.</p>
            @endif
        </div>
    </section>
</x-layouts.public>
