<x-layouts.public :title="$product->title_en">
    <x-hero :title="$product->title_en" :subtitle="$product->summary_en" />
    <section class="container-shell mt-8">
        <div class="card-panel p-6 text-slate-300">
            <p><strong>Problem:</strong> {{ $product->problem_en }}</p>
            <p class="mt-4"><strong>Solution:</strong> {{ $product->solution_en }}</p>
        </div>
    </section>
</x-layouts.public>
