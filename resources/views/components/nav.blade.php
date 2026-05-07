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
        <div style="display:flex;align-items:center;gap:12px;">
            <div style="display:flex;align-items:center;gap:4px;font-size:12px;">
                <a href="{{ preg_replace('#^/(en|de)#', '/en', request()->getPathInfo()) }}" style="padding:2px 8px;border-radius:4px;{{ $lang === 'en' ? 'background:#4f46e5;color:white;' : 'color:#94a3b8;' }}">EN</a>
                <a href="{{ preg_replace('#^/(en|de)#', '/de', request()->getPathInfo()) }}" style="padding:2px 8px;border-radius:4px;{{ $lang === 'de' ? 'background:#4f46e5;color:white;' : 'color:#94a3b8;' }}">DE</a>
            </div>
            <button id="mobile-menu-btn" style="display:flex;flex-direction:column;justify-content:center;align-items:center;width:40px;height:40px;gap:6px;background:#1e293b;border:2px solid #4f46e5;border-radius:8px;cursor:pointer;" aria-label="Toggle menu">
                <span style="display:block;width:20px;height:2px;background:#818cf8;transition:all 0.3s;" id="bar1"></span>
                <span style="display:block;width:20px;height:2px;background:#818cf8;transition:all 0.3s;" id="bar2"></span>
                <span style="display:block;width:20px;height:2px;background:#818cf8;transition:all 0.3s;" id="bar3"></span>
            </button>
        </div>
    </div>
    <div id="mobile-menu" style="display:none;border-top:1px solid #1e293b;background:#020617;">
        <nav style="display:flex;flex-direction:column;padding:16px;gap:4px;font-size:14px;">
            <a href="{{ route('services.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Leistungen' : 'Services' }}</a>
            <a href="{{ route('programs.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Programme' : 'Programs' }}</a>
            <a href="{{ route('products.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Produkte' : 'Products' }}</a>
            <a href="{{ route('insights.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Einblicke' : 'Insights' }}</a>
            <a href="{{ route('training.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">Training</a>
            <a href="{{ route('partners.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Partner' : 'Partners' }}</a>
            <a href="{{ route('careers.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;border-bottom:1px solid #1e293b;">{{ $lang === 'de' ? 'Karriere' : 'Careers' }}</a>
            <a href="{{ route('contact.index', ['lang' => $lang]) }}" style="padding:12px;border-radius:8px;color:#94a3b8;text-decoration:none;">{{ $lang === 'de' ? 'Kontakt' : 'Contact' }}</a>
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
