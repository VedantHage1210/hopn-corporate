<x-layouts.public :title="$lang==='ar'?'المستثمرون والصناديق':($lang==='de'?'Investoren & Fonds':'Investors & Funds')">
@php $lang = request()->route('lang', 'en'); @endphp

{{-- Hero --}}
<section style="position:relative; overflow:hidden; background:#030712; min-height:80vh; display:flex; align-items:center;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(16,185,129,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(16,185,129,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:-200px; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(16,185,129,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.06) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="container-shell hopn-reveal" style="position:relative; z-index:10; padding:80px 0; text-align:center;">
        <div style="display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(16,185,129,0.3); background:rgba(16,185,129,0.08); border-radius:999px; padding:6px 18px; margin-bottom:32px;">
            <span style="width:6px; height:6px; border-radius:50%; background:#10B981; display:inline-block; box-shadow:0 0 8px #10B981;"></span>
            <span style="font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981;">
                @if($lang==='ar') شبكة المستثمرين @elseif($lang==='de') Investorennetzwerk @else Investor Network @endif
            </span>
        </div>

        <h1 style="font-size:clamp(36px,6vw,76px); font-weight:900; color:white; line-height:1.05; letter-spacing:-2px; margin:0 auto 24px; max-width:900px;">
            @if($lang==='ar')
                <span style="color:white;">استثمر في</span><br>
                <span style="background:linear-gradient(135deg,#10B981,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">مستقبل الابتكار</span>
            @elseif($lang==='de')
                <span style="color:white;">Investieren Sie in die</span><br>
                <span style="background:linear-gradient(135deg,#10B981,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Zukunft der Innovation</span>
            @else
                <span style="color:white;">Invest in the</span><br>
                <span style="background:linear-gradient(135deg,#10B981,#4F6EF7,#06B6D4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Future of Innovation</span>
            @endif
        </h1>

        <p style="font-size:clamp(16px,2vw,20px); color:#CBD5E1; max-width:600px; margin:0 auto 48px; line-height:1.7;">
            @if($lang==='ar') HOPn يربط المستثمرين بأفضل الشركات الناشئة في مجال التكنولوجيا العميقة عبر أوروبا ومنطقة الشرق الأوسط.
            @elseif($lang==='de') HOPn verbindet Investoren mit den besten Deep-Tech-Startups in Europa und der MENA-Region.
            @else HOPn connects investors with the best deep-tech startups and innovation projects across Europe and MENA. @endif
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:64px;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 0 40px rgba(16,185,129,0.4); transition:all 0.2s;">
                @if($lang==='ar') تواصل مع فريق الاستثمار @elseif($lang==='de') Investor Relations kontaktieren @else Contact Investor Relations @endif →
            </a>
            <a href="#investors"
               class="hopn-bg-brighten" style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:15px; font-weight:600; text-decoration:none; transition:all 0.2s;">
                @if($lang==='ar') عرض الشبكة @elseif($lang==='de') Netzwerk ansehen @else View Network @endif
            </a>
        </div>

        {{-- Stats --}}
        <div style="display:flex; flex-wrap:wrap; gap:0; justify-content:center; border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.02); border-radius:16px; max-width:700px; margin:0 auto; overflow:hidden;">
            @foreach([
                ['num'=>'€50M+','en'=>'Capital Network',     'de'=>'Kapitalnetzwerk',    'ar'=>'شبكة رأس المال'],
                ['num'=>'30+',  'en'=>'VC Partners',         'de'=>'VC-Partner',         'ar'=>'شركاء VC'],
                ['num'=>'6',    'en'=>'Investment Domains',  'de'=>'Investitionsbereiche','ar'=>'مجالات الاستثمار'],
                ['num'=>'EU',   'en'=>'& MENA Reach',        'de'=>'& MENA Reichweite',  'ar'=>'وامتداد MENA'],
            ] as $stat)
            <div style="flex:1; min-width:140px; padding:24px 16px; text-align:center; border-right:1px solid rgba(255,255,255,0.05);">
                <div style="font-size:26px; font-weight:900; color:white; letter-spacing:-1px;">{{ $stat['num'] }}</div>
                <div style="font-size:11px; color:#94A3B8; margin-top:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">{{ $stat[$lang] ?? $stat['en'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Why Invest --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') لماذا HOPn @elseif($lang==='de') Warum HOPn @else Why HOPn @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') لماذا الاستثمار مع HOPn @elseif($lang==='de') Warum mit HOPn investieren @else Why Invest with HOPn @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:16px;">
            @php
            $reasons = [
                ['icon'=>'🎯','color'=>'#10B981',
                 'en'=>'Curated Deal Flow','de'=>'Kuratierter Deal Flow','ar'=>'تدفق صفقات منتقى',
                 'desc_en'=>'Access pre-vetted startups across AI, robotics, data, and deep-tech verticals.',
                 'desc_de'=>'Zugang zu vorgeprüften Startups in KI, Robotik, Daten und Deep-Tech.',
                 'desc_ar'=>'الوصول إلى شركات ناشئة تم التحقق منها مسبقاً في مجالات الذكاء الاصطناعي والروبوتيكا.'],
                ['icon'=>'🌍','color'=>'#4F6EF7',
                 'en'=>'European Market Access','de'=>'Europäischer Marktzugang','ar'=>'الوصول للسوق الأوروبي',
                 'desc_en'=>'HOPn operates across Germany, EU, and MENA with strong local networks.',
                 'desc_de'=>'HOPn ist in Deutschland, der EU und MENA mit starken lokalen Netzwerken tätig.',
                 'desc_ar'=>'HOPn تعمل في ألمانيا والاتحاد الأوروبي ومنطقة الشرق الأوسط.'],
                ['icon'=>'🔬','color'=>'#8B5CF6',
                 'en'=>'Deep Tech Focus','de'=>'Deep-Tech-Fokus','ar'=>'التركيز على التكنولوجيا العميقة',
                 'desc_en'=>'Specialized in AI, robotics, digital twins, and data platforms.',
                 'desc_de'=>'Spezialisiert auf KI, Robotik, digitale Zwillinge und Datenplattformen.',
                 'desc_ar'=>'متخصص في الذكاء الاصطناعي والروبوتيكا والتوائم الرقمية.'],
                ['icon'=>'🤝','color'=>'#F59E0B',
                 'en'=>'Strategic Co-Investment','de'=>'Strategische Koinvestition','ar'=>'الاستثمار المشترك الاستراتيجي',
                 'desc_en'=>'HOPn co-invests alongside partners to align interests and accelerate growth.',
                 'desc_de'=>'HOPn investiert gemeinsam mit Partnern, um Interessen auszurichten.',
                 'desc_ar'=>'HOPn تستثمر جنباً إلى جنب مع الشركاء لمواءمة المصالح.'],
                ['icon'=>'📊','color'=>'#06B6D4',
                 'en'=>'Portfolio Support','de'=>'Portfolio-Unterstützung','ar'=>'دعم المحفظة الاستثمارية',
                 'desc_en'=>'Full operational and technical support for portfolio companies.',
                 'desc_de'=>'Vollständige operative und technische Unterstützung für Portfoliounternehmen.',
                 'desc_ar'=>'دعم تشغيلي وتقني كامل لشركات المحفظة.'],
                ['icon'=>'⚡','color'=>'#EF4444',
                 'en'=>'Fast Execution','de'=>'Schnelle Umsetzung','ar'=>'التنفيذ السريع',
                 'desc_en'=>'HOPn moves fast — from deal sourcing to closing with minimal friction.',
                 'desc_de'=>'HOPn handelt schnell — von der Deal-Suche bis zum Abschluss.',
                 'desc_ar'=>'HOPn تتحرك بسرعة من إيجاد الصفقة إلى إغلاقها.'],
            ];
            @endphp
            @foreach($reasons as $item)
            <div class="hopn-lift-card" style="position:relative; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $item['color'] }}50,transparent);"></div>
                <div style="width:48px; height:48px; border-radius:12px; background:{{ $item['color'] }}15; border:1px solid {{ $item['color'] }}30; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:10px;">{{ $item[$lang] ?? $item['en'] }}</h3>
                <p style="font-size:13px; color:#94A3B8; line-height:1.7;">{{ $item['desc_'.$lang] ?? $item['desc_en'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Investors Network --}}
<section id="investors" style="padding:100px 0; background:#030712;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') شبكتنا @elseif($lang==='de') Unser Netzwerk @else Our Network @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') المستثمرون والصناديق @elseif($lang==='de') Investoren & Fonds @else Investors & Funds @endif
            </h2>
        </div>

        @if($investors->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
            @foreach($investors as $investor)
            @php
                $colors=['#10B981','#4F6EF7','#8B5CF6','#F59E0B','#06B6D4','#EF4444']; $c=$colors[$loop->index%6];
                $iName = $lang==='ar' && $investor->name_ar ? $investor->name_ar : ($lang==='de' && $investor->name_de ? $investor->name_de : $investor->name);
            @endphp
            <div class="hopn-lift-card" style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:16px; padding:28px; transition:all 0.25s; overflow:hidden;">
                <div style="position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,{{ $c }}50,transparent);"></div>

                <div style="display:flex; align-items:center; gap:14px; margin-bottom:16px;">
                    @if($investor->logo)
                    <img loading="lazy" decoding="async" src="{{ $investor->logo }}" alt="{{ $iName }}"
                         style="width:44px; height:44px; border-radius:10px; object-fit:contain; background:rgba(255,255,255,0.05); padding:4px; border:1px solid rgba(255,255,255,0.08); flex-shrink:0;">
                    @else
                    <div style="width:44px; height:44px; border-radius:10px; background:{{ $c }}15; border:1px solid {{ $c }}30; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:{{ $c }}; flex-shrink:0;">
                        {{ strtoupper(substr($iName,0,1)) }}
                    </div>
                    @endif
                    <div>
                        <h3 style="font-size:16px; font-weight:700; color:white; margin:0;">{{ $iName }}</h3>
                        @if($investor->type)
                        <span style="font-size:11px; color:#94A3B8;">{{ ucfirst($investor->type) }}</span>
                        @endif
                    </div>
                </div>

                @if($investor->description)
                @php
                    $desc = $lang==='ar'&&$investor->description_ar ? $investor->description_ar
                          : ($lang==='de'&&$investor->description_de ? $investor->description_de
                          : $investor->description);
                @endphp
                <p style="font-size:13px; color:#CBD5E1; line-height:1.7; flex:1; margin-bottom:16px;">{{ Str::limit($desc,110) }}</p>
                @endif

                <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:12px;">
                    @if($investor->region)
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:{{ $c }}10; color:{{ $c }}; border:1px solid {{ $c }}20;">
                        📍 {{ $investor->region }}
                    </span>
                    @endif
                    @if($investor->focus)
                    @php $focus = $lang==='ar'&&$investor->focus_ar ? $investor->focus_ar : ($lang==='de'&&$investor->focus_de ? $investor->focus_de : $investor->focus); @endphp
                    <span style="font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); color:#818CF8; border:1px solid rgba(79,110,247,0.2);">
                        🎯 {{ Str::limit($focus,30) }}
                    </span>
                    @endif
                </div>

                @if($investor->website)
                <a href="{{ $investor->website }}" target="_blank"
                   class="hopn-link-fade" style="font-size:13px; font-weight:600; color:{{ $c }}; text-decoration:none;">
                    @if($lang==='ar') زيارة الموقع @elseif($lang==='de') Website besuchen @else Visit Website @endif →
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:80px; color:#64748B;">
            <div style="font-size:48px; margin-bottom:16px;">💰</div>
            <h3 style="font-size:20px; font-weight:700; color:#94A3B8; margin-bottom:8px;">
                @if($lang==='ar') المستثمرون قادمون قريباً @elseif($lang==='de') Investoren folgen in Kürze @else Investors Coming Soon @endif
            </h3>
            <p style="font-size:14px; color:#64748B;">
                @if($lang==='ar') أضف المستثمرين من لوحة الإدارة @elseif($lang==='de') Investoren über das Admin-Panel hinzufügen @else Add investors from the admin panel @endif
            </p>
        </div>
        @endif
    </div>
</section>

{{-- Investment Areas --}}
<section style="padding:100px 0; background:#050A14;">
    <div class="container-shell">
        <div style="text-align:center; margin-bottom:64px;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#10B981; margin-bottom:16px;">
                @if($lang==='ar') مجالات التركيز @elseif($lang==='de') Schwerpunktbereiche @else Focus Areas @endif
            </span>
            <h2 style="font-size:clamp(28px,4vw,52px); font-weight:800; color:white; letter-spacing:-1px;">
                @if($lang==='ar') مجالات الاستثمار @elseif($lang==='de') Investitionsbereiche @else Investment Areas @endif
            </h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:12px;">
            @php
            $areas = [
                ['icon'=>'🤖','en'=>'Artificial Intelligence','de'=>'Künstliche Intelligenz','ar'=>'الذكاء الاصطناعي','color'=>'#4F6EF7'],
                ['icon'=>'🦾','en'=>'Robotics & Automation','de'=>'Robotik & Automatisierung','ar'=>'الروبوتيكا والأتمتة','color'=>'#8B5CF6'],
                ['icon'=>'📊','en'=>'Data Platforms','de'=>'Datenplattformen','ar'=>'منصات البيانات','color'=>'#06B6D4'],
                ['icon'=>'🏭','en'=>'Digital Twins','de'=>'Digitale Zwillinge','ar'=>'التوائم الرقمية','color'=>'#10B981'],
                ['icon'=>'🏥','en'=>'Healthcare Tech','de'=>'Gesundheitstechnologie','ar'=>'تكنولوجيا الصحة','color'=>'#EF4444'],
                ['icon'=>'🎓','en'=>'EdTech','de'=>'EdTech','ar'=>'تكنولوجيا التعليم','color'=>'#F59E0B'],
                ['icon'=>'💳','en'=>'FinTech','de'=>'FinTech','ar'=>'التكنولوجيا المالية','color'=>'#10B981'],
                ['icon'=>'🚚','en'=>'Logistics & Supply Chain','de'=>'Logistik & Lieferkette','ar'=>'اللوجستيات وسلسلة الإمداد','color'=>'#4F6EF7'],
            ];
            @endphp
            @foreach($areas as $area)
            <div class="hopn-lift-card" style="border:1px solid rgba(255,255,255,0.06); background:#0A0F1E; border-radius:14px; padding:24px 16px; text-align:center; transition:all 0.25s; cursor:default;">
                <div style="font-size:28px; margin-bottom:10px;">{{ $area['icon'] }}</div>
                <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $area[$lang] ?? $area['en'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:100px 0; background:#030712; position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(16,185,129,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(16,185,129,0.03) 1px, transparent 1px); background-size:60px 60px; pointer-events:none;"></div>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:600px; height:300px; background:radial-gradient(ellipse, rgba(16,185,129,0.08) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="container-shell" style="position:relative; z-index:10; text-align:center;">
        <h2 style="font-size:clamp(28px,4vw,52px); font-weight:900; color:white; letter-spacing:-1px; margin-bottom:16px;">
            @if($lang==='ar') هل أنت مستعد للاستثمار؟ @elseif($lang==='de') Bereit zu investieren? @else Ready to Invest? @endif
        </h2>
        <p style="color:#CBD5E1; font-size:17px; max-width:500px; margin:0 auto 40px; line-height:1.7;">
            @if($lang==='ar') تواصل مع فريق علاقات المستثمرين في HOPn اليوم.
            @elseif($lang==='de') Kontaktieren Sie unser Investor-Relations-Team noch heute.
            @else Get in touch with the HOPn investor relations team today. @endif
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:14px; justify-content:center;">
            <a href="{{ route('contact.index', ['lang'=>$lang]) }}"
               class="hopn-lift-btn" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; background:#10B981; color:white; font-size:16px; font-weight:700; text-decoration:none; box-shadow:0 0 40px rgba(16,185,129,0.3); transition:all 0.2s;">
                @if($lang==='ar') تواصل معنا @elseif($lang==='de') Kontakt aufnehmen @else Contact Investor Relations @endif →
            </a>
            <a href="{{ route('startups.index', ['lang'=>$lang]) }}"
               class="hopn-bg-brighten" style="display:inline-flex; align-items:center; gap:8px; padding:16px 36px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.04); color:white; font-size:16px; font-weight:700; text-decoration:none; transition:all 0.2s;">
                @if($lang==='ar') عرض الشركات الناشئة @elseif($lang==='de') Startups ansehen @else View Startups @endif
            </a>
        </div>
    </div>
</section>

</x-layouts.public>