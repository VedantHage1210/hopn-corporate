<x-layouts.public :title="$post->title">
    <x-hero :title="$post->title" :subtitle="$post->excerpt" />
    <section class="container-shell mt-8 hopn-reveal">
        <article class="card-panel p-6 md:p-10 text-slate-300 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </article>
    </section>
</x-layouts.public>