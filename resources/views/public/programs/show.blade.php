<x-layouts.public :title="$program->title_en">
    <x-hero :title="$program->title_en" :subtitle="$program->summary_en" />
    <section class="container-shell mt-8">
        <div class="card-panel p-6 text-slate-300">
            <p><strong>Audience:</strong> {{ $program->audience_en }}</p>
            <p class="mt-2"><strong>Duration:</strong> {{ $program->duration_weeks }} weeks</p>
        </div>
    </section>
</x-layouts.public>
