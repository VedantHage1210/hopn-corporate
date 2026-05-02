<x-layouts.public :title="$service->name ?? 'Service'">
    <x-hero :title="$service->name ?? 'Service'" :subtitle="$service->summary ?? null" />
    <section class="container-shell mt-8">
        <div class="card-panel p-6 text-slate-300">
            {{ $service->body ?? 'Details will be published soon.' }}
        </div>
    </section>
</x-layouts.public>
