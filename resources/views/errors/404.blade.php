@php $lang = request()->route('lang', 'en'); @endphp
<!DOCTYPE html>
<html lang="{{ $lang }}" @if($lang === 'ar') dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — @if($lang==='ar') الصفحة غير موجودة @elseif($lang==='de') Seite nicht gefunden @else Page Not Found @endif | HOPn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if($lang === 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>* { font-family: 'Cairo', sans-serif !important; }</style>
    @else
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>* { font-family: 'Inter', sans-serif !important; }</style>
    @endif
    <style>
        body { margin:0; background:#030712; color:white; }
        .container { max-width:1200px; margin:0 auto; padding:0 24px; }
    </style>
</head>
<body>
    <div style="min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center; position:relative; overflow:hidden; background:#030712;">

        {{-- Background --}}
        <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none;"></div>

        <div style="position:relative; z-index:10; text-align:center; padding:40px 24px;">

            {{-- 404 Number --}}
            <div style="font-size:clamp(120px,20vw,200px); font-weight:900; line-height:1; letter-spacing:-8px; margin-bottom:0; background:linear-gradient(135deg,rgba(79,110,247,0.3),rgba(139,92,246,0.2)); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">
                404
            </div>

            {{-- HOPn Logo --}}
            <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin-bottom:32px;">
                <div style="width:36px; height:36px; border-radius:10px; background:#4F6EF7; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:white;">H</div>
                <span style="font-size:22px; font-weight:700; color:white;">HOPn</span>
            </div>

            <h1 style="font-size:clamp(24px,4vw,48px); font-weight:800; color:white; letter-spacing:-1px; margin-bottom:16px;">
                @if($lang==='ar') عذراً، الصفحة غير موجودة
                @elseif($lang==='de') Seite nicht gefunden
                @else Page Not Found @endif
            </h1>

            <p style="font-size:17px; color:#64748B; max-width:500px; margin:0 auto 48px; line-height:1.7;">
                @if($lang==='ar') الصفحة التي تبحث عنها غير موجودة أو تم نقلها.
                @elseif($lang==='de') Die gesuchte Seite existiert nicht oder wurde verschoben.
                @else The page you are looking for doesn't exist or has been moved. @endif
            </p>

            {{-- Actions --}}
            <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:64px;">
                <a href="/{{ $lang ?? 'en' }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(79,110,247,0.3); transition:all 0.2s;"
                   onmouseover="this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.transform='translateY(0)'">
                    @if($lang==='ar') العودة للرئيسية @elseif($lang==='de') Zur Startseite @else Go Home @endif
                </a>
                <a href="/{{ $lang ?? 'en' }}/contact"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.background='rgba(255,255,255,0.08)'"
                   onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                    @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt @else Contact Us @endif
                </a>
            </div>

            {{-- Quick Links --}}
            <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                @foreach([
                    ['en'=>'Services','de'=>'Leistungen','ar'=>'الخدمات','url'=>'/services'],
                    ['en'=>'Products','de'=>'Produkte','ar'=>'المنتجات','url'=>'/products'],
                    ['en'=>'About','de'=>'Über Uns','ar'=>'من نحن','url'=>'/about'],
                    ['en'=>'Careers','de'=>'Karriere','ar'=>'وظائف','url'=>'/careers'],
                    ['en'=>'Events','de'=>'Events','ar'=>'الفعاليات','url'=>'/events'],
                ] as $link)
                <a href="/{{ $lang ?? 'en' }}{{ $link['url'] }}"
                   style="padding:8px 16px; border-radius:8px; font-size:13px; font-weight:600; color:#475569; border:1px solid rgba(255,255,255,0.06); text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.color='white'; this.style.borderColor='rgba(255,255,255,0.2)'"
                   onmouseout="this.style.color='#475569'; this.style.borderColor='rgba(255,255,255,0.06)'">
                    {{ $link[$lang ?? 'en'] ?? $link['en'] }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
