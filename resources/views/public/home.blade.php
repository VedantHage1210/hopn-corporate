<x-layouts.public :title="'Home'">
    <x-hero title="Enterprise consulting, products, and training for measurable growth." subtitle="HOPn helps teams modernize operations, launch digital products, and scale AI delivery." cta="Request Proposal" :cta-url="route('contact.index', ['lang' => request()->route('lang', 'en')])" />

    <section class="container-shell mt-10">
        <h2 class="text-2xl font-bold text-white">Core Services</h2>
        <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </section>

    <section class="container-shell mt-10">
        <h2 class="text-2xl font-bold text-white">Featured Case Studies</h2>
        <div class="mt-4 grid gap-4 md:grid-cols-3">
            @foreach($caseStudies as $caseStudy)
                <x-case-study-card :case-study="$caseStudy" />
            @endforeach
        </div>
    </section>

    <section class="container-shell mt-10">
        <h2 class="text-2xl font-bold text-white">Partners</h2>
        <div class="mt-4">
            <x-logo-carousel :partners="$partners" />
        </div>
    </section>

    <section class="container-shell mt-10">
        <h2 class="text-2xl font-bold text-white">Testimonials</h2>
        <div class="mt-4 grid gap-4 md:grid-cols-2">
            @foreach($testimonials as $testimonial)
                <x-testimonial :testimonial="$testimonial" />
            @endforeach
        </div>
    </section>

    <div class="mt-10">
        <x-cta-block title="Ready to discuss your transformation roadmap?" button-text="Contact HOPn" />
    </div>
</x-layouts.public>
