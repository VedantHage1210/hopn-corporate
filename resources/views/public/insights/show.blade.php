<x-layouts.public :title="$post->title">
    <x-hero :title="$post->title" :subtitle="$post->excerpt" />
    <section class="container-shell mt-8">
        <article class="card-panel p-6 text-slate-300">
            {!! nl2br(e($post->content)) !!}
        </article>
    </section>
</x-layouts.public>
