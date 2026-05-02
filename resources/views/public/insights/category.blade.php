<x-layouts.public :title="$category->name">
    <x-hero :title="$category->name" :subtitle="$category->description" />
    <section class="container-shell mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <x-blog-card :post="$post" />
        @endforeach
    </section>
    <section class="container-shell">
        <x-pagination :paginator="$posts" />
    </section>
</x-layouts.public>
