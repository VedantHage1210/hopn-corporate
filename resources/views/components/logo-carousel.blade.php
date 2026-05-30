@props(['partners' => collect()])

@php
    $allItems = $partners->count() > 0 ? $partners : collect();
@endphp

@if($allItems->count() > 0)
<div style="position:relative; overflow:hidden;">
    <div style="position:absolute; left:0; top:0; bottom:0; width:80px; background:linear-gradient(90deg, #0A0F1E, transparent); z-index:2; pointer-events:none;"></div>
    <div style="position:absolute; right:0; top:0; bottom:0; width:80px; background:linear-gradient(270deg, #0A0F1E, transparent); z-index:2; pointer-events:none;"></div>

    <div class="logo-track" style="display:flex; gap:32px; align-items:center; animation:logoScroll 30s linear infinite;">
        @foreach($allItems as $item)
        <div style="flex-shrink:0; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px 24px; display:flex; align-items:center; justify-content:center; min-width:140px; height:64px; transition:all 0.25s;"
             onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'"
             onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
            @if(isset($item->logo_url) && $item->logo_url)
            <img src="{{ $item->logo_url }}" alt="{{ $item->name }}"
                 style="height:32px; width:auto; max-width:120px; object-fit:contain; filter:brightness(0.7) grayscale(0.3);"
                 onmouseover="this.style.filter='brightness(1) grayscale(0)'"
                 onmouseout="this.style.filter='brightness(0.7) grayscale(0.3)'">
            @else
            <span style="font-size:13px; font-weight:700; color:#64748B; white-space:nowrap;">{{ $item->name }}</span>
            @endif
        </div>
        @endforeach

        @foreach($allItems as $item)
        <div style="flex-shrink:0; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:12px; padding:16px 24px; display:flex; align-items:center; justify-content:center; min-width:140px; height:64px;"
             onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'"
             onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
           @if(isset($item->logo) && $item->logo)
<img src="{{ $item->logo }}"
                 style="height:32px; width:auto; max-width:120px; object-fit:contain; filter:brightness(0.7) grayscale(0.3);"
                 onmouseover="this.style.filter='brightness(1) grayscale(0)'"
                 onmouseout="this.style.filter='brightness(0.7) grayscale(0.3)'">
            @else
            <span style="font-size:13px; font-weight:700; color:#64748B; white-space:nowrap;">{{ $item->name }}</span>
            @endif
        </div>
        @endforeach
    </div>
</div>

<style>
@keyframes logoScroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.logo-track:hover { animation-play-state: paused; }
</style>
@endif
