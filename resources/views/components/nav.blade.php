@php($lang = request()->route('lang', app()->getLocale()))
<header class="sticky top-0 z-30 border-b border-slate-800 bg-hopn-primary/95 backdrop-blur">
    <div class="container-shell flex h-16 items-center justify-between">
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
                <a href="{{ preg_replace('#^/(en|de)#', '/en', request()->getPathInfo()) }}" class="rounded px-2 py-1 {{ $lang === 'en' ? 'bg-hopn-accent text-white' : 'text-slate-300 hover:text-white' }}">EN</a>
                <a href="{{ preg_replace('#^/(en|de)#', '/de', request()->getPathInfo()) }}" class="rounded px-2 py-1 {{ $lang === 'de' ? 'bg-hopn-accent text-white' : 'text-slate-300 hover:text-white' }}">DE</a>
            </div>
            <button id="mobile-menu-btn" class="flex md:hidden flex-col justify-center items-center w-8 h-8 gap-1.5 focus:outline-none" aria-label="Toggle menu">
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar1"></span>
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar2"></span>
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar3"></span>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800 bg-slate-950">
        <nav class="flex flex-col px-4 py-4 gap-1 text-sm text-slate-300">
            <a href="{{ route('services.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Leistungen' : 'Services' }}</a>
            <a href="{{ route('programs.index', ['lang' => $lang]) }}" class="hover:text-white py-2 px-3 rounded-lg hover:bg-slate-800 transition">{{ $lang === 'de' ? 'Programme' : 'Programs' }}</a>
            <a href="{{ route('products.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Produkte' : 'Products' }}</a>
            <a href="{{ route('insights.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Einblicke' : 'Insights' }}</a>
            <a href="{{ route('training.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">Training</a>
            <a href="{{ route('partners.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Partner' : 'Partners' }}</a>
            <a href="{{ route('careers.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Karriere' : 'Careers' }}</a>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}" class="py-2 px-3 rounded-lg hover:bg-slate-800 hover:text-white transition">{{ $lang === 'de' ? 'Kontakt' : 'Contact' }}</a>
        </nav>
    </div>
</header>
<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const bar1 = document.getElementById('bar1');
    const bar2 = document.getElementById('bar2');
    const bar3 = document.getElementById('bar3');
    let open = false;
    btn.addEventListener('click', () => {
        open = !open;
        menu.classList.toggle('hidden', !open);
        if (open) {
            bar1.style.transform = 'translateY(8px) rotate(45deg)';
            bar2.style.opacity = '0';
            bar3.style.transform = 'translateY(-8px) rotate(-45deg)';
        } else {
            bar1.style.transform = '';
            bar2.style.opacity = '1';
            bar3.style.transform = '';
        }
    });
</script>
