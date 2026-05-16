<x-layouts.public :title="'Home'">

    {{-- 1. Hero --}}
    <x-hero
        title="Connecting Business, Education & Research to Build Intelligent Digital Solutions"
        subtitle="AI · Data · Digital Twins · Robotics · Talent · Innovation Ecosystems"
        cta="Explore Services"
        :cta-url="route('services.index', ['lang' => request()->route('lang', 'en')])" />

    {{-- 2. Innovation Ecosystem --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell" style="text-align:center;">
            <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">One Hub for Innovation</span>
            <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white; margin-bottom:16px;">Where Business, Education & Research Connect</h2>
            <p style="color:#94A3B8; max-width:560px; margin:0 auto 48px; font-size:16px; line-height:1.7;">HOPn is the bridge between enterprises, universities, startups, and investors — creating a complete innovation ecosystem.</p>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:16px; max-width:900px; margin:0 auto;">
                @foreach([
                    ['icon' => '🏢', 'label' => 'Business',    'desc' => 'Enterprise clients & consulting'],
                    ['icon' => '🎓', 'label' => 'Education',   'desc' => 'Universities & training programs'],
                    ['icon' => '🔬', 'label' => 'Research',    'desc' => 'R&D labs & innovation centers'],
                    ['icon' => '🚀', 'label' => 'Startups',    'desc' => 'Venture building & ecosystems'],
                    ['icon' => '💰', 'label' => 'Investors',   'desc' => 'Funds & strategic partnerships'],
                ] as $item)
                <div style="border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:16px; padding:24px 16px;"
                     onmouseover="this.style.background='rgba(79,110,247,0.1)'; this.style.borderColor='rgba(79,110,247,0.4)'"
                     onmouseout="this.style.background='rgba(79,110,247,0.05)'; this.style.borderColor='rgba(79,110,247,0.2)'">
                    <div style="font-size:28px; margin-bottom:10px;">{{ $item['icon'] }}</div>
                    <div style="font-size:15px; font-weight:700; color:white; margin-bottom:6px;">{{ $item['label'] }}</div>
                    <div style="font-size:12px; color:#94A3B8; line-height:1.5;">{{ $item['desc'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Core Services --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">What We Do</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Core Services</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>
            <div style="text-align:center; margin-top:36px;">
                <a href="{{ route('services.index', ['lang' => request()->route('lang', 'en')]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.4); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.background='rgba(79,110,247,0.1)'"
                   onmouseout="this.style.background='transparent'">
                    View All Services →
                </a>
            </div>
        </div>
    </section>

    {{-- 4. HOPn Products --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Our Platforms</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">HOPn Products</h2>
                <p style="color:#94A3B8; max-width:500px; margin:12px auto 0; font-size:16px;">Intelligent platforms built for the future of business and education.</p>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px;">
                @foreach([
                    ['name' => 'Praktix',   'desc' => 'Practical skills platform connecting talent with enterprise training programs.', 'users' => 'Enterprises, Trainers', 'color' => '#4F6EF7'],
                    ['name' => 'FintEch',   'desc' => 'Financial technology platform for modern banking and fintech innovation.', 'users' => 'Banks, Fintechs', 'color' => '#10B981'],
                    ['name' => 'AI Pass',   'desc' => 'AI certification and credentialing platform for professionals and organizations.', 'users' => 'Professionals, Teams', 'color' => '#8B5CF6'],
                    ['name' => 'Sovra AI',  'desc' => 'Enterprise AI orchestration platform for intelligent automation and workflows.', 'users' => 'Enterprises, CTOs', 'color' => '#F59E0B'],
                    ['name' => 'Sportify',  'desc' => 'Sports data and analytics platform for clubs, athletes, and federations.', 'users' => 'Sports Orgs, Clubs', 'color' => '#EF4444'],
                    ['name' => 'EduBridge', 'desc' => 'Education-industry bridge connecting universities with enterprise partners.', 'users' => 'Universities, Employers', 'color' => '#06B6D4'],
                ] as $product)
                <div style="border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.2s; display:flex; flex-direction:column; gap:12px;"
                     onmouseover="this.style.borderColor='rgba(79,110,247,0.3)'; this.style.background='#141D2E'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:{{ $product['color'] }}20; border:1px solid {{ $product['color'] }}40; display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:800; color:{{ $product['color'] }};">
                            {{ substr($product['name'], 0, 1) }}
                        </div>
                        <div style="font-size:17px; font-weight:700; color:white;">{{ $product['name'] }}</div>
                    </div>
                    <p style="font-size:13px; color:#94A3B8; line-height:1.6; flex:1;">{{ $product['desc'] }}</p>
                    <div style="font-size:11px; color:#64748B; padding:4px 10px; background:rgba(255,255,255,0.04); border-radius:6px; display:inline-block;">{{ $product['users'] }}</div>
                    <a href="{{ route('products.index', ['lang' => request()->route('lang', 'en')]) }}"
                       style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $product['color'] }}; text-decoration:none; margin-top:4px;">
                        Learn More →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Industries --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Industries</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Industries We Serve</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:12px;">
                @foreach([
                    ['icon' => '🚗', 'name' => 'Automotive'],
                    ['icon' => '🏥', 'name' => 'Healthcare'],
                    ['icon' => '🏭', 'name' => 'Manufacturing'],
                    ['icon' => '🛒', 'name' => 'E-Commerce'],
                    ['icon' => '🎓', 'name' => 'Education'],
                    ['icon' => '💳', 'name' => 'Finance'],
                    ['icon' => '🚚', 'name' => 'Logistics'],
                    ['icon' => '🔬', 'name' => 'Research'],
                ] as $industry)
                <div style="border:1px solid rgba(255,255,255,0.07); background:rgba(255,255,255,0.03); border-radius:12px; padding:20px 12px; text-align:center;"
                     onmouseover="this.style.background='rgba(79,110,247,0.08)'; this.style.borderColor='rgba(79,110,247,0.3)'"
                     onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.07)'">
                    <div style="font-size:24px; margin-bottom:8px;">{{ $industry['icon'] }}</div>
                    <div style="font-size:13px; font-weight:600; color:#CBD5E1;">{{ $industry['name'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Partners --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Trusted By</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Our Partners & Clients</h2>
            </div>
            <x-logo-carousel :partners="$partners" />
        </div>
    </section>



        {{-- 8. Events & Workshops --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#F59E0B; margin-bottom:12px;">Events & Workshops</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Upcoming Events</h2>
                <p style="color:#94A3B8; max-width:500px; margin:12px auto 0; font-size:16px;">Join our conferences, workshops, webinars, and startup events.</p>
            </div>
            @php
                $upcomingEvents = \App\Models\Event::where('is_published', true)->orderBy('date')->take(3)->get();
            @endphp
            @if($upcomingEvents->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px; margin-bottom:36px;">
                @foreach($upcomingEvents as $event)
                @php
                    $typeColors = ['conference'=>'#4F6EF7','workshop'=>'#10B981','webinar'=>'#06B6D4','hackathon'=>'#8B5CF6','startup'=>'#F59E0B','networking'=>'#EF4444','research'=>'#A855F7'];
                    $color = $typeColors[$event->type] ?? '#F59E0B';
                @endphp
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; overflow:hidden; transition:all 0.25s;"
                     onmouseover="this.style.borderColor='{{ $color }}40'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'">
                    <div style="height:3px; background:{{ $color }};"></div>
                    <div style="padding:20px; display:flex; flex-direction:column; gap:12px;">
                        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px;">
                            <span style="font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px; background:{{ $color }}20; color:{{ $color }}; border:1px solid {{ $color }}40; text-transform:uppercase;">{{ ucfirst($event->type) }}</span>
                            @if($event->date)
                            <span style="font-size:12px; color:#64748B;">📅 {{ $event->date->format('d M Y') }}</span>
                            @endif
                        </div>
                        <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4;">{{ $event->title }}</h3>
                        @if($event->location)
                        <div style="font-size:13px; color:#94A3B8;">📍 {{ $event->location }}</div>
                        @endif
                        @if($event->registration_open)
                        <a href="{{ route('events.index', ['lang' => request()->route('lang', 'en')]) }}"
                           style="display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:600; color:{{ $color }}; text-decoration:none; margin-top:4px;">
                            Register Now →
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            <div style="text-align:center;">
                <a href="{{ route('events.index', ['lang' => request()->route('lang', 'en')]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(245,158,11,0.4); color:#F59E0B; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.background='rgba(245,158,11,0.1)'"
                   onmouseout="this.style.background='transparent'">
                    View All Events →
                </a>
            </div>
        </div>
    </section>

    {{-- 9. Newsroom --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Newsroom</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Latest from HOPn</h2>
                <p style="color:#94A3B8; max-width:500px; margin:12px auto 0; font-size:16px;">Announcements, partnerships, product updates, and research activities.</p>
            </div>
            @php
                $latestPosts = \App\Models\BlogPost::latest('published_at')->take(3)->get();
            @endphp
            @if($latestPosts->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px; margin-bottom:36px;">
                @foreach($latestPosts as $post)
                <a href="{{ route('insights.show', ['lang' => request()->route('lang', 'en'), 'slug' => $post->slug]) }}"
                   style="position:relative; display:flex; flex-direction:column; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; text-decoration:none; transition:all 0.25s; overflow:hidden;"
                   onmouseover="this.style.borderColor='rgba(79,110,247,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    @if($post->category)
                    <span style="display:inline-block; font-size:11px; font-weight:600; padding:3px 10px; border-radius:999px; background:rgba(79,110,247,0.1); border:1px solid rgba(79,110,247,0.2); color:#818CF8; margin-bottom:12px; width:fit-content;">
                        {{ $post->category->name ?? 'News' }}
                    </span>
                    @endif
                    <h3 style="font-size:16px; font-weight:700; color:white; line-height:1.4; margin-bottom:10px; flex:1;">{{ $post->title }}</h3>
                    @if($post->excerpt)
                    <p style="font-size:13px; color:#64748B; line-height:1.6; margin-bottom:12px;">{{ Str::limit($post->excerpt, 100) }}</p>
                    @endif
                    <div style="font-size:12px; color:#475569;">
                        {{ $post->published_at ? $post->published_at->format('d M Y') : '' }}
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:40px; color:#64748B;">
                <p>Latest news coming soon. <a href="{{ route('insights.index', ['lang' => request()->route('lang', 'en')]) }}" style="color:#4F6EF7;">Visit Insights →</a></p>
            </div>
            @endif
            <div style="text-align:center; margin-top:12px;">
                <a href="{{ route('insights.index', ['lang' => request()->route('lang', 'en')]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:12px 28px; border-radius:10px; border:1px solid rgba(79,110,247,0.4); color:#818CF8; font-size:14px; font-weight:600; text-decoration:none;"
                   onmouseover="this.style.background='rgba(79,110,247,0.1)'"
                   onmouseout="this.style.background='transparent'">
                    View All Insights →
                </a>
            </div>
        </div>
    </section>

    {{-- 10. Talent & Hiring --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#10B981; margin-bottom:12px;">Talent & Hiring</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Build Your Dream Team</h2>
                <p style="color:#94A3B8; max-width:500px; margin:12px auto 0; font-size:16px;">Access top-tier technical talent across Europe and beyond.</p>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px; margin-bottom:48px;">
                @foreach([
                    ['icon' => '🌍', 'title' => 'Remote Teams', 'desc' => 'Fully managed remote teams of engineers, data scientists, and AI specialists.'],
                    ['icon' => '🏢', 'title' => 'Local Hiring', 'desc' => 'On-site talent placement across Germany and European markets.'],
                    ['icon' => '🤖', 'title' => 'Technical Experts', 'desc' => 'AI, data, robotics, and software engineering specialists on demand.'],
                    ['icon' => '👥', 'title' => 'Dedicated Teams', 'desc' => 'Long-term dedicated development teams embedded in your organization.'],
                ] as $item)
                <div style="position:relative; border:1px solid rgba(255,255,255,0.07); background:#111827; border-radius:16px; padding:24px; transition:all 0.25s; overflow:hidden;"
                     onmouseover="this.style.borderColor='rgba(16,185,129,0.4)'; this.style.background='#141D2E'; this.style.transform='translateY(-3px)'; this.querySelector('.top-line').style.opacity='1';"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.background='#111827'; this.style.transform='translateY(0)'; this.querySelector('.top-line').style.opacity='0';">
                    <div class="top-line" style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, #10B981, #4F6EF7); opacity:0; transition:opacity 0.25s; border-radius:16px 16px 0 0;"></div>
                    <div style="font-size:32px; margin-bottom:16px;">{{ $item['icon'] }}</div>
                    <h3 style="font-size:16px; font-weight:700; color:white; margin-bottom:8px;">{{ $item['title'] }}</h3>
                    <p style="font-size:13px; color:#64748B; line-height:1.7;">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
            <div style="text-align:center;">
                <a href="{{ route('careers.index', ['lang' => request()->route('lang', 'en')]) }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#10B981; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(16,185,129,0.3);"
                   onmouseover="this.style.opacity='0.88'"
                   onmouseout="this.style.opacity='1'">
                    View Open Positions →
                </a>
            </div>
        </div>
    </section>        




                
    {{-- 7. Case Studies --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Proof of Work</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">Featured Case Studies</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px;">
                @foreach($caseStudies as $caseStudy)
                    <x-case-study-card :case-study="$caseStudy" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Testimonials --}}
    <section style="padding:80px 0; background:#0A0F1E;">
        <div class="container-shell">
            <div style="text-align:center; margin-bottom:48px;">
                <span style="display:inline-block; font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#4F6EF7; margin-bottom:12px;">Client Voice</span>
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white;">What Our Clients Say</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px;">
                @foreach($testimonials as $testimonial)
                    <x-testimonial :testimonial="$testimonial" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- 9. Final CTA --}}
    <section style="padding:80px 0; background:#080D1A;">
        <div class="container-shell" style="text-align:center;">
            <div style="max-width:640px; margin:0 auto; border:1px solid rgba(79,110,247,0.2); background:rgba(79,110,247,0.05); border-radius:24px; padding:60px 32px;">
                <h2 style="font-size:clamp(24px,4vw,42px); font-weight:800; color:white; margin-bottom:16px;">Build the Future with HOPn</h2>
                <p style="color:#94A3B8; font-size:16px; line-height:1.7; margin-bottom:36px;">Ready to transform your organization with AI, data, and innovation? Let's talk.</p>
                <div style="display:flex; flex-wrap:wrap; gap:12px; justify-content:center;">
                    <a href="{{ route('contact.index', ['lang' => request()->route('lang', 'en')]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; text-decoration:none; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                       onmouseover="this.style.opacity='0.88'"
                       onmouseout="this.style.opacity='1'">
                        Request Proposal
                    </a>
                    <a href="{{ route('contact.index', ['lang' => request()->route('lang', 'en')]) }}"
                       style="display:inline-flex; align-items:center; gap:8px; padding:14px 32px; border-radius:10px; border:1px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.05); color:white; font-size:15px; font-weight:600; text-decoration:none;"
                       onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        Contact HOPn
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
