@php($lang = request()->route('lang', 'en'))
<x-layouts.public :title="$lang === 'ar' ? 'استفسار الشراكة' : ($lang === 'de' ? 'Partneranfrage' : 'Partner Inquiry')">
    <x-hero :title="$lang === 'ar' ? 'استفسار الشراكة' : ($lang === 'de' ? 'Partneranfrage' : 'Partner Inquiry')"
            :subtitle="$lang === 'ar' ? 'كن شريكاً لـ HOPn.' : ($lang === 'de' ? 'Werden Sie Partner von HOPn.' : 'Become a HOPn Partner.')" />
    <section class="container-shell mt-8 hopn-reveal">
        <div class="grid gap-8 lg:grid-cols-2">
            <div>
                <h2 class="mb-4 text-xl font-bold text-white">{{ $lang === 'ar' ? 'إرسال الاستفسار' : ($lang === 'de' ? 'Anfrage senden' : 'Send Inquiry') }}</h2>
                <x-forms.partner-inquiry :lang="$lang" />
            </div>
            <div class="space-y-4">
                <h2 class="text-xl font-bold text-white">{{ $lang === 'ar' ? 'أنواع الشراكة' : ($lang === 'de' ? 'Partnertypen' : 'Partner Types') }}</h2>
                <div class="card-panel p-5 transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                    <h3 class="font-semibold text-white mb-1">{{ $lang === 'ar' ? 'عميل' : ($lang === 'de' ? 'Kunde' : 'Customer') }}</h3>
                    <p class="text-sm text-slate-400">{{ $lang === 'ar' ? 'المؤسسات التي تستخدم خدمات HOPn.' : ($lang === 'de' ? 'Unternehmen die HOPn-Dienstleistungen nutzen.' : 'Organizations using HOPn services.') }}</p>
                </div>
                <div class="card-panel p-5 transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                    <h3 class="font-semibold text-white mb-1">{{ $lang === 'ar' ? 'شريك تقني' : ($lang === 'de' ? 'Technologiepartner' : 'Technology Partner') }}</h3>
                    <p class="text-sm text-slate-400">{{ $lang === 'ar' ? 'شركات التقنية المتكاملة مع HOPn.' : ($lang === 'de' ? 'Tech-Unternehmen die mit HOPn integrieren.' : 'Tech companies integrating with HOPn.') }}</p>
                </div>
                <div class="card-panel p-5 transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                    <h3 class="font-semibold text-white mb-1">{{ $lang === 'ar' ? 'شريك أكاديمي' : ($lang === 'de' ? 'Akademischer Partner' : 'Academic Partner') }}</h3>
                    <p class="text-sm text-slate-400">{{ $lang === 'ar' ? 'الجامعات ومؤسسات البحث العلمي.' : ($lang === 'de' ? 'Universitäten und Forschungseinrichtungen.' : 'Universities and research institutions.') }}</p>
                </div>
                <div class="card-panel p-5 transition-all duration-300 hover:border-indigo-500/30 hover:-translate-y-0.5">
                    <h3 class="font-semibold text-white mb-1">{{ $lang === 'ar' ? 'شريك تنفيذ' : ($lang === 'de' ? 'Lieferpartner' : 'Delivery Partner') }}</h3>
                    <p class="text-sm text-slate-400">{{ $lang === 'ar' ? 'وكالات تقدم حلول HOPn.' : ($lang === 'de' ? 'Agenturen die HOPn-Lösungen liefern.' : 'Agencies delivering HOPn solutions.') }}</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
