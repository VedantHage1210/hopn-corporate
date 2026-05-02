<x-layouts.public :title="'Insights'">
    <x-hero title="Insights" subtitle="Expert commentary and implementation playbooks." />
    <section class="container-shell mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <x-blog-card :post="$post" />
        @endforeach
    </section>
    <section class="container-shell">
        <x-pagination :paginator="$posts" />
    </section>
</x-layouts.public>
