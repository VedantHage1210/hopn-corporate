@php
    $csTitle      = $lang === 'ar' && $caseStudy->title_ar ? $caseStudy->title_ar : ($lang === 'de' && $caseStudy->title_de ? $caseStudy->title_de : $caseStudy->title_en);
    $csClientName = $lang === 'ar' && $caseStudy->client_name_ar ? $caseStudy->client_name_ar : ($lang === 'de' && $caseStudy->client_name_de ? $caseStudy->client_name_de : $caseStudy->client_name_en);
    $csChallenge  = $lang === 'ar' && $caseStudy->challenge_ar ? $caseStudy->challenge_ar : ($lang === 'de' && $caseStudy->challenge_de ? $caseStudy->challenge_de : $caseStudy->challenge_en);
    $csSolution   = $lang === 'ar' && $caseStudy->solution_ar ? $caseStudy->solution_ar : ($lang === 'de' && $caseStudy->solution_de ? $caseStudy->solution_de : $caseStudy->solution_en);
    $csOutcomes   = $lang === 'ar' && $caseStudy->outcomes_ar ? $caseStudy->outcomes_ar : ($lang === 'de' && $caseStudy->outcomes_de ? $caseStudy->outcomes_de : $caseStudy->outcomes_en);
@endphp
<x-layouts.public :title="$csTitle">
    <x-hero :title="$csTitle" :subtitle="$caseStudy->industry" />

    <section class="container-shell mt-8 hopn-reveal">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-6">
                @if($caseStudy->image_url)
                    <img loading="lazy" decoding="async" src="{{ $caseStudy->image_url }}" alt="{{ $csTitle }}" class="w-full rounded-2xl shadow-lg border border-slate-800 transition-transform duration-300 hover:scale-[1.02]">
                @endif

                <div class="card-panel p-6 bg-[#0B1120] border border-slate-800 rounded-2xl transition-all duration-300 hover:border-indigo-500/30" @if($lang === 'ar') dir="rtl" @endif>
                    <h4 class="text-indigo-400 font-bold mb-4">
                        @if($lang === 'ar') تفاصيل المشروع @elseif($lang === 'de') Projektdetails @else Project Details @endif
                    </h4>
                    <p class="text-slate-400 text-sm">
                        <strong>@if($lang === 'ar') العميل: @elseif($lang === 'de') Kunde: @else Client: @endif</strong> {{ $csClientName }}
                    </p>

                    {{-- Dynamic Industries --}}
                    @if($caseStudy->industries && $caseStudy->industries->count() > 0)
                    <p class="text-slate-400 text-sm mt-2">
                        <strong>@if($lang === 'ar') القطاعات: @elseif($lang === 'de') Branchen: @else Industries: @endif</strong>
                        @foreach($caseStudy->industries as $industry)
                            @php
                                $indName = $lang === 'ar' && !empty($industry->name_ar) ? $industry->name_ar : ($lang === 'de' && !empty($industry->name_de) ? $industry->name_de : $industry->name);
                            @endphp
                            <span class="inline-block bg-slate-800 rounded px-2 py-1 text-xs text-slate-300 mr-1">
                                {{ $indName }}
                            </span>
                        @endforeach
                    </p>
                    @endif

                    {{-- Dynamic Services --}}
                    @if($caseStudy->services && $caseStudy->services->count() > 0)
                    <p class="text-slate-400 text-sm mt-2">
                        <strong>@if($lang === 'ar') الخدمات: @elseif($lang === 'de') Leistungen: @else Services: @endif</strong>
                        @foreach($caseStudy->services as $service)
                            @php
                                $svcName = $lang === 'ar' && !empty($service->name_ar) ? $service->name_ar : ($lang === 'de' && !empty($service->name_de) ? $service->name_de : $service->name);
                            @endphp
                            <span class="inline-block bg-indigo-900/30 rounded px-2 py-1 text-xs text-indigo-300 mr-1">
                                {{ $svcName }}
                            </span>
                        @endforeach
                    </p>
                    @endif

                    @if($caseStudy->pdf_url)
                        <a href="{{ $caseStudy->pdf_url }}" target="_blank" class="mt-6 block w-full py-3 text-center bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-500/30">
                            @if($lang === 'ar') تحميل تقرير PDF @elseif($lang === 'de') PDF-Bericht herunterladen @else Download PDF Report @endif
                        </a>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6 hopn-reveal">
                <div class="card-panel p-8 text-slate-300 bg-[#0B1120] border border-slate-800 rounded-2xl" @if($lang === 'ar') dir="rtl" @endif>
                    <h3 class="text-xl font-bold text-indigo-400">@if($lang === 'ar') التحدي @elseif($lang === 'de') Herausforderung @else Challenge @endif</h3>
                    <p class="mt-2 leading-relaxed">{{ $csChallenge }}</p>

                    <h3 class="text-xl font-bold text-indigo-400 mt-6">@if($lang === 'ar') الحل @elseif($lang === 'de') Lösung @else Solution @endif</h3>
                    <p class="mt-2 leading-relaxed">{{ $csSolution }}</p>

                    <h3 class="text-xl font-bold text-indigo-400 mt-6">@if($lang === 'ar') النتائج والمؤشرات @elseif($lang === 'de') Ergebnisse & Kennzahlen @else Outcomes & Metrics @endif</h3>
                    <p class="mt-2 leading-relaxed">{{ $csOutcomes }}</p>

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
