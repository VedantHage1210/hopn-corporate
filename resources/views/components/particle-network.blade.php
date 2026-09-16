@props(['height' => '320px', 'color' => '139,92,246', 'density' => 26])
{{--
    Reusable animated node/particle network background.
    Default style pick (particle network, not wireframe) since it matches
    the HOPn triangle-node logo — swap easily by changing $color / $density,
    or drop this component entirely if wireframe is preferred instead.

    Usage: <x-particle-network height="400px" color="6,182,212" density="30" />
    Place inside a `position:relative` container and give the canvas a
    lower z-index than your foreground content (already handled below).
--}}
<div style="position:absolute; inset:0; overflow:hidden; pointer-events:none; z-index:0;">
    <canvas class="hopn-particle-net" data-color="{{ $color }}" data-density="{{ $density }}"
            style="width:100%; height:{{ $height }}; display:block;"></canvas>
</div>

@once
<script>
(function(){
    function initNet(canvas){
        var ctx = canvas.getContext('2d');
        var color = canvas.getAttribute('data-color') || '139,92,246';
        var N = parseInt(canvas.getAttribute('data-density'), 10) || 26;
        var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function resize(){
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        var pts = [];
        for (var i = 0; i < N; i++) {
            pts.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.25,
                vy: (Math.random() - 0.5) * 0.25
            });
        }

        function frame(){
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (var i = 0; i < pts.length; i++) {
                var p = pts[i];
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
            }
            for (var i = 0; i < pts.length; i++) {
                for (var j = i + 1; j < pts.length; j++) {
                    var a = pts[i], b = pts[j];
                    var d = Math.hypot(a.x - b.x, a.y - b.y);
                    if (d < 130) {
                        ctx.strokeStyle = 'rgba(' + color + ',' + ((1 - d / 130) * 0.45) + ')';
                        ctx.lineWidth = 1;
                        ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y); ctx.stroke();
                    }
                }
            }
            for (var i = 0; i < pts.length; i++) {
                ctx.fillStyle = 'rgba(' + color + ',0.8)';
                ctx.beginPath(); ctx.arc(pts[i].x, pts[i].y, 2, 0, Math.PI * 2); ctx.fill();
            }
            if (!reduceMotion) requestAnimationFrame(frame);
        }

        if (reduceMotion) {
            // Static single frame for motion-sensitive users — no animation loop.
            frame();
        } else {
            frame();
        }
    }

    document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('canvas.hopn-particle-net').forEach(initNet);
    });
})();
</script>
@endonce
