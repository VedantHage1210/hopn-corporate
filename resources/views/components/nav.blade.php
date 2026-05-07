@php($lang = request()->route('lang', app()->getLocale()))
<header class="sticky top-0 z-50 border-b border-slate-800 bg-slate-950/95 backdrop-blur">
    <div class="container-shell flex h-16 items-center justify-between px-4">
        <a href="{{ route('home', ['lang' => $lang]) }}" class="text-lg font-bold text-white">HOPn</a>
        <nav class="hidden gap-5 text-sm text-slate-300 md:flex">
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Leistungen' : 'Services' }}</a>
            <a href="{{ route('programs.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Programme' : 'Programs' }}</a>
            <a href="{{ route('products.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Produkte' : 'Products' }}</a>
            <a href="{{ route('insights.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Einblicke' : 'Insights' }}</a>
            <a href="{{ route('training.index', ['lang' => $lang]) }}" class="hover:text-white">Training</a>
            <a href="{{ route('partners.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Partner' : 'Partners' }}</a>
            <a href="{{ route('careers.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Karriere' : 'Careers' }}</a>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="hover:text-white">{{ $lang === 'de' ? 'Kontakt' : 'Contact' }}</a>
        </nav>
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-1 text-xs">
                <a href="{{ preg_replace('#^/(en|de)#', '/en', request()->getPathInfo()) }}" class="rounded px-2 py-1 {{ $lang === 'en' ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:text-white' }}">EN</a>
                <a href="{{ preg_replace('#^/(en|de)#', '/de', request()->getPathInfo()) }}" class="rounded px-2 py-1 {{ $lang === 'de' ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:text-white' }}">DE</a>
            </div>
          <button id="mobile-menu-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 focus:outline-none z-50 rounded-lg border-2 border-indigo-500 bg-indigo-600/20" aria-label="Toggle menu">
    <span class="block w-5 h-0.5 bg-indigo-300 transition-all duration-300" id="bar1"></span>
    <span class="block w-5 h-0.5 bg-indigo-300 transition-all duration-300" id="bar2"></span>
    <span class="block w-5 h-0.5 bg-indigo-300 transition-all duration-300" id="bar3"></span>
</button>
        </div>
    </div>
    <div id="mobile-menu" class="md:hidden border-t border-slate-800 bg-slate-950" style="display:none;">
        <nav class="flex flex-col px-4 py-4 gap-1 text-sm text-slate-300">
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Leistungen' : 'Services' }}</a>
            <a href="{{ route('programs.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Programme' : 'Programs' }}</a>
            <a href="{{ route('products.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Produkte' : 'Products' }}</a>
            <a href="{{ route('insights.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Einblicke' : 'Insights' }}</a>
            <a href="{{ route('training.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">Training</a>
            <a href="{{ route('partners.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Partner' : 'Partners' }}</a>
            <a href="{{ route('careers.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition border-b border-slate-800">{{ $lang === 'de' ? 'Karriere' : 'Careers' }}</a>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="py-3 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Kontakt' : 'Contact' }}</a>
        </nav>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btn = document.getElementById('mobile-menu-btn');
        var menu = document.getElementById('mobile-menu');
        var bar1 = document.getElementById('bar1');
        var bar2 = document.getElementById('bar2');
        var bar3 = document.getElementById('bar3');
        var isOpen = false;
        if (btn && menu) {
            btn.addEventListener('click', function() {
                isOpen = !isOpen;
                menu.style.display = isOpen ? 'block' : 'none';
                if (isOpen) {
                    bar1.style.transform = 'translateY(8px) rotate(45deg)';
                    bar2.style.opacity = '0';
                    bar3.style.transform = 'translateY(-8px) rotate(-45deg)';
                } else {
                    bar1.style.transform = '';
                    bar2.style.opacity = '1';
                    bar3.style.transform = '';
                }
            });
        }
    });
</script>
