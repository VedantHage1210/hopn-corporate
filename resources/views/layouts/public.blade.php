<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'HOPn') . ' | HOPn' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.seo-head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('head')
    <style>
        .reveal { opacity:0; transform:translateY(24px); transition:opacity 0.6s ease,transform 0.6s ease; }
        .reveal.visible { opacity:1; transform:translateY(0); }
        [dir="rtl"] { font-family:'Noto Sans Arabic','Inter',sans-serif; }
        [dir="rtl"] .container-shell { direction:rtl; }
        [dir="rtl"] nav { direction:rtl; }
        [dir="rtl"] svg.arrow { transform:scaleX(-1); }
        [dir="rtl"] footer { direction:rtl; text-align:right; }
        [dir="rtl"] article { direction:rtl; text-align:right; }

        /* Book a Call Modal */
        #book-call-modal {
            display:none;
            position:fixed;
            inset:0;
            z-index:9999;
            background:rgba(0,0,0,0.75);
            backdrop-filter:blur(8px);
            padding:20px;
            overflow-y:auto;
        }
        #book-call-modal.active { display:flex; align-items:center; justify-content:center; }
    </style>
</head>
<body>
    <x-nav />
    <main class="min-h-[70vh]">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />

    {{-- Book a Call Modal --}}
    <div id="book-call-modal">
        <div style="width:100%; max-width:560px; background:#111827; border:1px solid rgba(79,110,247,0.2); border-radius:20px; overflow:hidden; position:relative;">

            {{-- Top bar --}}
            <div style="height:3px; background:linear-gradient(90deg, #4F6EF7, #8B5CF6);"></div>

            {{-- Header --}}
            <div style="padding:28px 32px 20px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid rgba(255,255,255,0.06);">
                <div>
                    <div style="font-size:11px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; color:#818CF8; margin-bottom:6px;">HOPn</div>
                    <h2 style="font-size:22px; font-weight:800; color:white; margin:0;">Book a Call</h2>
                </div>
                <button onclick="closeBookCall()"
                        style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); color:#64748B; cursor:pointer; font-size:18px; display:flex; align-items:center; justify-content:center; transition:all 0.2s;"
                        onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='white'"
                        onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#64748B'">×</button>
            </div>

            {{-- Form --}}
            <div style="padding:28px 32px 32px;">

                @if(session('book_call_success'))
                <div style="margin-bottom:20px; padding:14px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:8px; color:#10B981; font-size:14px; text-align:center;">
                    ✅ {{ session('book_call_success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('leads.book-call', ['lang' => app()->getLocale()]) }}">
                    @csrf
                    <div style="display:grid; gap:14px;">

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">First Name *</label>
                                <input type="text" name="first_name" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#4F6EF7'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Last Name *</label>
                                <input type="text" name="last_name" required
                                       style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                       onfocus="this.style.borderColor='#4F6EF7'"
                                       onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Email Address *</label>
                            <input type="email" name="email" required
                                   style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                   onfocus="this.style.borderColor='#4F6EF7'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Company</label>
                            <input type="text" name="company"
                                   style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;"
                                   onfocus="this.style.borderColor='#4F6EF7'"
                                   onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Topic / What would you like to discuss?</label>
                            <select name="topic"
                                    style="width:100%; padding:10px 12px; background:#1e293b; border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;">
                                <option value="">Select a topic</option>
                                <option value="ai-consulting">AI & Data Consulting</option>
                                <option value="digital-twins">Digital Twins</option>
                                <option value="robotics">Robotics & Automation</option>
                                <option value="startup">Startup Ecosystem</option>
                                <option value="investment">Investment Opportunities</option>
                                <option value="partnership">Partnership</option>
                                <option value="training">Training & Programs</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Preferred Time</label>
                            <select name="preferred_time"
                                    style="width:100%; padding:10px 12px; background:#1e293b; border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box;">
                                <option value="">Select preferred time</option>
                                <option value="morning">Morning (9:00 - 12:00 CET)</option>
                                <option value="afternoon">Afternoon (13:00 - 17:00 CET)</option>
                                <option value="evening">Evening (17:00 - 19:00 CET)</option>
                                <option value="flexible">Flexible</option>
                            </select>
                        </div>

                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#94A3B8; margin-bottom:5px;">Message (Optional)</label>
                            <textarea name="message" rows="3"
                                      style="width:100%; padding:10px 12px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; color:white; font-size:14px; box-sizing:border-box; resize:vertical;"
                                      onfocus="this.style.borderColor='#4F6EF7'"
                                      onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                        </div>

                        <div style="display:flex; align-items:flex-start; gap:10px;">
                            <input type="checkbox" name="gdpr_consent" id="gdpr_book_call" required style="margin-top:3px;">
                            <label for="gdpr_book_call" style="font-size:12px; color:#64748B; line-height:1.5;">
                                I agree to the Privacy Policy and consent to being contacted. *
                            </label>
                        </div>

                        <button type="submit"
                                style="width:100%; padding:13px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:600; border:none; cursor:pointer; transition:opacity 0.2s; box-shadow:0 8px 24px rgba(79,110,247,0.3);"
                                onmouseover="this.style.opacity='0.88'"
                                onmouseout="this.style.opacity='1'">
                            Book My Call →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @stack('scripts')

    <script>
        // Book a Call Modal
        function openBookCall() {
            document.getElementById('book-call-modal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeBookCall() {
            document.getElementById('book-call-modal').classList.remove('active');
            document.body.style.overflow = '';
        }
        document.getElementById('book-call-modal').addEventListener('click', function(e) {
            if (e.target === this) closeBookCall();
        });

        // Auto open if success session
        @if(session('book_call_success'))
        document.addEventListener('DOMContentLoaded', function() {
            closeBookCall();
        });
        @endif

        // Scroll reveal
        document.addEventListener('DOMContentLoaded', function() {
            var sections = document.querySelectorAll('section');
            sections.forEach(function(el) { el.classList.add('reveal'); });
            function checkReveal() {
                sections.forEach(function(el) {
                    if (el.getBoundingClientRect().top < window.innerHeight - 80) {
                        el.classList.add('visible');
                    }
                });
            }
            checkReveal();
            window.addEventListener('scroll', checkReveal, { passive: true });
        });
    </script>
</body>
</html>
