<x-layouts.public :title="$caseStudy->title_en">
    <x-hero :title="$caseStudy->title_en" :subtitle="$caseStudy->industry" />
    
    <section class="container-shell mt-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-6">
                @if($caseStudy->image_url)
                    <img src="{{ $caseStudy->image_url }}" alt="{{ $caseStudy->title_en }}" class="w-full rounded-2xl shadow-lg border border-slate-800">
                @endif
                
                <div class="card-panel p-6 bg-[#0B1120] border border-slate-800 rounded-2xl">
                    <h4 class="text-indigo-400 font-bold mb-4">Project Details</h4>
                    <p class="text-slate-400 text-sm"><strong>Client:</strong> {{ $caseStudy->client_name_en }}</p>
                    
                   {{-- Dynamic Industries --}}
@if($caseStudy->industries && $caseStudy->industries->count() > 0)
    <p class="text-slate-400 text-sm mt-2">
        <strong>Industries:</strong> 
        @foreach($caseStudy->industries as $industry)
            <span class="inline-block bg-slate-800 rounded px-2 py-1 text-xs text-slate-300 mr-1">
                {{ $industry->name }}
            </span>
        @endforeach
    </p>
@endif

{{-- Dynamic Services --}}
@if($caseStudy->services && $caseStudy->services->count() > 0)
    <p class="text-slate-400 text-sm mt-2">
        <strong>Services:</strong> 
        @foreach($caseStudy->services as $service)
            <span class="inline-block bg-indigo-900/30 rounded px-2 py-1 text-xs text-indigo-300 mr-1">
                {{ $service->name }}
            </span>
        @endforeach
    </p>
@endif
                    
                    @if($caseStudy->pdf_url)
                        <a href="{{ $caseStudy->pdf_url }}" target="_blank" class="mt-6 block w-full py-3 text-center bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                            Download PDF Report
                        </a>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="card-panel p-8 text-slate-300 bg-[#0B1120] border border-slate-800 rounded-2xl">
                    <h3 class="text-xl font-bold text-indigo-400">Challenge</h3>
                    <p class="mt-2 leading-relaxed">{{ $caseStudy->challenge_en }}</p>

                    <h3 class="text-xl font-bold text-indigo-400 mt-6">Solution</h3>
                    <p class="mt-2 leading-relaxed">{{ $caseStudy->solution_en }}</p>

                    <h3 class="text-xl font-bold text-indigo-400 mt-6">Outcomes & Metrics</h3>
                    <p class="mt-2 leading-relaxed">{{ $caseStudy->outcomes_en }}</p>
                    
                    @if(!empty($caseStudy->metrics))
                        <div class="mt-6 p-4 bg-indigo-900/20 border-l-4 border-indigo-500 rounded">
                            <p class="font-semibold text-white">{{ $caseStudy->metrics }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
