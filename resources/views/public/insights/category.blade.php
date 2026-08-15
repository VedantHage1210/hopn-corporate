@php
    $catName = $lang === 'ar' && $category->name_ar ? $category->name_ar : ($lang === 'de' && $category->name_de ? $category->name_de : $category->name);
    $catDesc = $lang === 'ar' && $category->description_ar ? $category->description_ar : ($lang === 'de' && $category->description_de ? $category->description_de : $category->description);
@endphp
<x-layouts.public :title="$catName">
    <x-hero :title="$catName" :subtitle="$catDesc" />
    <section class="container-shell mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3 hopn-reveal">
        @forelse($posts as $post)
            <x-blog-card :post="$post" />
        @empty
        <div class="md:col-span-2 lg:col-span-3 text-center py-16 text-slate-400">
            @if($lang === 'ar') لا توجد مقالات في هذا القسم حالياً @elseif($lang === 'de') Noch keine Artikel in dieser Kategorie @else No articles in this category yet @endif
        </div>
        @endforelse
    </section>
    <section class="container-shell">
        <x-pagination :paginator="$posts" />
    </section>
</x-layouts.public>
