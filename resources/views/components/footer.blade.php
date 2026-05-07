<footer class="border-t border-slate-800 bg-slate-950 py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5">
            <div class="col-span-2 sm:col-span-3 md:col-span-1">
                <p class="text-base font-semibold text-white">HOPn</p>
                <p class="mt-1 text-xs text-slate-400">Enterprise-grade transformation, product, and AI programs.</p>
                <div class="mt-3 text-xs text-slate-400">
                    <p>Email: <a href="mailto:contact@hopn.eu" class="text-indigo-400 hover:text-indigo-300">contact@hopn.eu</a></p>
                    <p class="mt-1">Berlin, Germany</p>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-slate-300">Solutions</p>
                <div class="flex flex-col gap-1.5 text-xs text-slate-400">
                    <a href="{{ route('services.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Services</a>
                    <a href="{{ route('programs.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Programs</a>
                    <a href="{{ route('products.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Products</a>
                    <a href="{{ route('case-studies.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Case Studies</a>
                    <a href="{{ route('insights.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Insights</a>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-slate-300">Company</p>
                <div class="flex flex-col gap-1.5 text-xs text-slate-400">
                    <a href="{{ route('about', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">About</a>
                    <a href="{{ route('partners.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Partners</a>
                    <a href="{{ route('careers.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Careers</a>
                    <a href="{{ route('training.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Training</a>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-slate-300">Contact</p>
                <div class="flex flex-col gap-1.5 text-xs text-slate-400">
                    <a href="{{ route('contact.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Contact Us</a>
                    <a href="{{ route('partner-inquiry.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Partner Inquiry</a>
                    <a href="{{ route('careers.index', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Apply for a Job</a>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-slate-300">Legal</p>
                <div class="flex flex-col gap-1.5 text-xs text-slate-400">
                    <a href="{{ route('legal.impressum', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Impressum</a>
                    <a href="{{ route('legal.privacy', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Privacy Policy</a>
                    <a href="{{ route('legal.cookie', ['lang' => request()->route('lang', 'en')]) }}" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
        <div class="mt-6 border-t border-slate-800 pt-4 flex flex-col gap-1 sm:flex-row sm:justify-between text-xs text-slate-500">
            <p>© {{ date('Y') }} HOPn. All rights reserved.</p>
            <p>Built with ❤️ for enterprise transformation.</p>
        </div>
    </div>
</footer>
