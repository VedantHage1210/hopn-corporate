<x-layouts.public :title="$caseStudy->title_en">
    <x-hero :title="$caseStudy->title_en" :subtitle="$caseStudy->industry" />
    <section class="container-shell mt-8">
        <div class="card-panel p-6 text-slate-300">
            <p><strong>Challenge:</strong> {{ $caseStudy->challenge_en }}</p>
            <p class="mt-4"><strong>Solution:</strong> {{ $caseStudy->solution_en }}</p>
            <p class="mt-4"><strong>Outcomes:</strong> {{ $caseStudy->outcomes_en }}</p>
        </div>
    </section>
</x-layouts.public>
