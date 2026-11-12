@props(['seed' => 'hopn', 'height' => 190, 'radius' => 10])
@php
    // Deterministic brand-blue artwork (network / contours / chart) used when a card has no uploaded image.
    $caHash  = crc32((string) $seed);
    $caState = $caHash ?: 1;
    $caRnd   = function () use (&$caState) {
        $caState = ($caState * 1103515245 + 12345) & 0x7fffffff;

        return $caState / 0x7fffffff;
    };
    $caVariant = $caHash % 3;
    $caId      = 'ca' . dechex($caHash);
    $caShapes  = '';

    if ($caVariant === 0) {
        // Network graph
        $caNodes = [];
        for ($i = 0; $i < 10; $i++) {
            $caNodes[] = [round(24 + $caRnd() * 352), round(20 + $caRnd() * 150)];
        }
        $caCount = count($caNodes);
        for ($i = 0; $i < $caCount; $i++) {
            for ($j = $i + 1; $j < $caCount; $j++) {
                $caD = hypot($caNodes[$i][0] - $caNodes[$j][0], $caNodes[$i][1] - $caNodes[$j][1]);
                if ($caD < 140) {
                    $caShapes .= '<line x1="' . $caNodes[$i][0] . '" y1="' . $caNodes[$i][1] . '" x2="' . $caNodes[$j][0] . '" y2="' . $caNodes[$j][1]
                        . '" stroke="#9FE0F2" stroke-opacity="' . round(0.55 - $caD / 300, 2) . '" stroke-width="1"/>';
                }
            }
        }
        foreach ($caNodes as $caK => $caN) {
            $caR = 3 + ($caK % 3) * 1.5;
            $caShapes .= '<circle cx="' . $caN[0] . '" cy="' . $caN[1] . '" r="' . $caR . '" fill="#9FE0F2" fill-opacity="0.9"/>';
            if ($caK % 4 === 0) {
                $caShapes .= '<circle cx="' . $caN[0] . '" cy="' . $caN[1] . '" r="' . ($caR + 8) . '" fill="none" stroke="#9FE0F2" stroke-opacity="0.35"/>';
            }
        }
    } elseif ($caVariant === 1) {
        // Flowing contour lines
        for ($i = 0; $i < 7; $i++) {
            $caY = 22 + $i * 24 + round($caRnd() * 10);
            $caA = round($caRnd() * 60 - 30);
            $caB = round($caRnd() * 50 - 25);
            $caShapes .= '<path d="M-10 ' . $caY . ' C 90 ' . ($caY + $caA) . ' 170 ' . ($caY - $caA) . ' 260 ' . ($caY + $caB) . ' S 380 ' . ($caY - $caB) . ' 410 ' . $caY
                . '" fill="none" stroke="#9FE0F2" stroke-opacity="' . round(0.16 + $i * 0.06, 2) . '" stroke-width="1.3"/>';
        }
        $caShapes .= '<circle cx="' . round(60 + $caRnd() * 280) . '" cy="' . round(50 + $caRnd() * 90) . '" r="5" fill="#FFFFFF" fill-opacity="0.9"/>';
    } else {
        // Data chart
        for ($i = 1; $i <= 4; $i++) {
            $caShapes .= '<line x1="0" y1="' . ($i * 38) . '" x2="400" y2="' . ($i * 38) . '" stroke="#9FE0F2" stroke-opacity="0.12"/>';
        }
        $caPts = [];
        $caYv  = 140;
        for ($i = 0; $i < 9; $i++) {
            $caYv = max(30, min(160, $caYv - 8 + round($caRnd() * 30 - 12)));
            $caPts[] = [round(10 + $i * 47.5), $caYv];
        }
        $caLine = '';
        foreach ($caPts as $caP) {
            $caLine .= $caP[0] . ',' . $caP[1] . ' ';
        }
        $caShapes .= '<polygon points="10,190 ' . $caLine . '390,190" fill="#9FE0F2" fill-opacity="0.12"/>';
        $caShapes .= '<polyline points="' . trim($caLine) . '" fill="none" stroke="#9FE0F2" stroke-width="2" stroke-linejoin="round"/>';
        foreach ($caPts as $caP) {
            $caShapes .= '<circle cx="' . $caP[0] . '" cy="' . $caP[1] . '" r="3.5" fill="#FFFFFF"/>';
        }
    }
@endphp
<div aria-hidden="true" {{ $attributes->except('style') }} style="height:{{ (int) $height }}px; border-radius:{{ (int) $radius }}px; overflow:hidden; background:#0B3549; {{ $attributes->get('style') }}">
    <svg viewBox="0 0 400 190" preserveAspectRatio="xMidYMid slice" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" style="display:block;">
        <defs>
            <linearGradient id="{{ $caId }}" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#061A27"/>
                <stop offset="1" stop-color="#1D5C7B"/>
            </linearGradient>
        </defs>
        <rect width="400" height="190" fill="url(#{{ $caId }})"/>
        {!! $caShapes !!}
    </svg>
</div>
