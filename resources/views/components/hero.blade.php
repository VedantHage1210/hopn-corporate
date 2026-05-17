@props([
    'title'    => 'Connecting Business, Education & Research to Build Intelligent Digital Solutions',
    'subtitle' => 'AI · Data · Digital Twins · Robotics · Talent · Innovation Ecosystems',
    'cta'      => 'Explore Services',
    'ctaUrl'   => null,
])
@php($lang = request()->route('lang', app()->getLocale()))

<section style="position:relative; overflow:hidden; background:#0A0F1E; padding: 80px 0 100px;">

    {{-- Grid background --}}
    <div style="position:absolute; inset:0; pointer-events:none;
        background-image: linear-gradient(rgba(79,110,247,0.06) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(79,110,247,0.06) 1px, transparent 1px);
        background-size: 48px 48px;">
    </div>

    {{-- Glow blobs --}}
    <div style="position:absolute; top:-100px; left:-100px; width:400px; height:400px; border-radius:50%; background:rgba(79,110,247,0.12); filter:blur(80px); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(139,92,246,0.10); filter:blur(80px); pointer-events:none;"></div>

    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">

        {{-- Badge --}}
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(79,110,247,0.35); background:rgba(79,110,247,0.1); border-radius:999px; padding:6px 16px; margin-bottom:24px;">
            <span style="width:7px; height:7px; border-radius:50%; background:#4F6EF7; display:inline-block; animation: pulse 2s infinite;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8;">European Innovation Hub</span>
        </div>

        {{-- Headline --}}
        <h1 style="font-size:clamp(28px, 5vw, 60px); font-weight:800; line-height:1.15; letter-spacing:-0.02em; color:white; max-width:900px; margin:0 auto;">
            {{ $title }}
        </h1>

        {{-- Subtitle --}}
        @if($subtitle)
        <p style="margin-top:20px; font-size:clamp(15px, 2vw, 20px); color:#94A3B8; max-width:640px; margin-left:auto; margin-right:auto; line-height:1.6;">
            {{ $subtitle }}
        </p>
        @endif

        {{-- CTA Buttons --}}
        <div style="margin-top:36px; display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:12px;">
            @if($cta && $ctaUrl)
            <a href="{{ $ctaUrl }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3); transition:opacity 0.2s;"
               onmouseover="this.style.opacity='0.88'"
               onmouseout="this.style.opacity='1'">
                {{ $cta }}
                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            @endif

        href="{{ route('contact.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:background 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.1)'"
               onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                Book a Call
            </a>

            <a href="{{ route('products.index', ['lang' => $lang]) }}"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:background 0.2s;"
               onmouseover="this.style.background='rgba(255,255,255,0.1)'"
               onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                View Products
            </a>
        </div>

        {{-- Stats Bar --}}
        <div style="margin-top:60px; display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; max-width:700px; margin-left:auto; margin-right:auto;">
            @foreach([
                ['value' => '50+',  'label' => 'Enterprise Clients'],
                ['value' => '10+',  'label' => 'AI Products'],
                ['value' => '6',    'label' => 'Innovation Domains'],
                ['value' => 'EU',   'label' => 'Based & Trusted'],
            ] as $stat)
            <div style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.04); border-radius:12px; padding:20px 16px; backdrop-filter:blur(8px);">
                <div style="font-size:28px; font-weight:800; color:white;">{{ $stat['value'] }}</div>
                <div style="margin-top:4px; font-size:12px; color:#94A3B8;">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>

    </div>

    {{-- Bottom fade --}}
    <div style="position:absolute; bottom:0; left:0; right:0; height:80px; background:linear-gradient(to bottom, transparent, #0A0F1E); pointer-events:none;"></div>

    <style>
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>

</section>
