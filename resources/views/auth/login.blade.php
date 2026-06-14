<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login | HOPn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif !important; box-sizing: border-box; }
        body { margin: 0; background: #030712; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 1000px #0A0F1E inset !important;
            -webkit-text-fill-color: white !important;
            border-color: rgba(79,110,247,0.3) !important;
        }
    </style>
</head>
<body>

{{-- Background --}}
<div style="position:fixed; inset:0; background-image:linear-gradient(rgba(79,110,247,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(79,110,247,0.04) 1px, transparent 1px); background-size:60px 60px; pointer-events:none; z-index:0;"></div>
<div style="position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(79,110,247,0.08) 0%, transparent 70%); pointer-events:none; z-index:0;"></div>

<div style="position:relative; z-index:10; width:100%; max-width:440px; padding:24px;">

    {{-- Logo --}}
    <div style="text-align:center; margin-bottom:40px;">
        <a href="/" style="display:inline-flex; align-items:center; gap:10px; text-decoration:none;">
            <div style="width:44px; height:44px; border-radius:12px; background:#4F6EF7; display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:900; color:white; box-shadow:0 0 24px rgba(79,110,247,0.5);">H</div>
            <span style="font-size:22px; font-weight:800; color:white; letter-spacing:-0.5px;">HOPn</span>
        </a>
    </div>

    {{-- Card --}}
    <div style="border:1px solid rgba(255,255,255,0.08); background:rgba(10,15,30,0.9); border-radius:20px; padding:40px; position:relative; overflow:hidden; backdrop-filter:blur(20px);">
        <div style="position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,#4F6EF7,#8B5CF6,#06B6D4);"></div>

        <div style="text-align:center; margin-bottom:32px;">
            <h1 style="font-size:24px; font-weight:800; color:white; letter-spacing:-0.5px; margin:0 0 8px;">Admin Portal</h1>
            <p style="font-size:13px; color:#475569; margin:0; text-transform:uppercase; letter-spacing:0.1em; font-weight:600;">HOPn Enterprise Dashboard</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
        <div style="margin-bottom:20px; padding:12px 16px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); border-radius:10px; color:#10B981; font-size:13px;">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="display:grid; gap:18px;">

                {{-- Email --}}
                <div>
                    <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#64748B; margin-bottom:8px;">
                        Email Address
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="admin@hopn.eu"
                           style="width:100%; padding:13px 16px; background:#0A0F1E; border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; outline:none; transition:all 0.2s;"
                           onfocus="this.style.borderColor='rgba(79,110,247,0.6)'; this.style.boxShadow='0 0 0 3px rgba(79,110,247,0.1)'"
                           onblur="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.boxShadow='none'">
                    @error('email')
                    <p style="font-size:12px; color:#EF4444; margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                        <label style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#64748B;">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           style="font-size:12px; color:#818CF8; text-decoration:none; font-weight:600;"
                           onmouseover="this.style.color='white'"
                           onmouseout="this.style.color='#818CF8'">
                            Forgot password?
                        </a>
                        @endif
                    </div>
                    <div style="position:relative;">
                        <input type="password" name="password" id="password-input" required
                               placeholder="••••••••••"
                               style="width:100%; padding:13px 44px 13px 16px; background:#0A0F1E; border:1px solid rgba(255,255,255,0.08); border-radius:10px; color:white; font-size:14px; outline:none; transition:all 0.2s;"
                               onfocus="this.style.borderColor='rgba(79,110,247,0.6)'; this.style.boxShadow='0 0 0 3px rgba(79,110,247,0.1)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.boxShadow='none'">
                        <button type="button" onclick="togglePassword()"
                                style="position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; color:#475569; cursor:pointer; padding:0;"
                                onmouseover="this.style.color='white'"
                                onmouseout="this.style.color='#475569'">
                            <svg id="eye-icon" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                    <p style="font-size:12px; color:#EF4444; margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div style="display:flex; align-items:center; gap:10px;">
                    <input type="checkbox" name="remember" id="remember"
                           style="width:16px; height:16px; accent-color:#4F6EF7; cursor:pointer;">
                    <label for="remember" style="font-size:13px; color:#64748B; cursor:pointer; user-select:none;">
                        Remember me
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        style="width:100%; padding:14px; border-radius:10px; background:#4F6EF7; color:white; font-size:15px; font-weight:700; border:none; cursor:pointer; box-shadow:0 0 40px rgba(79,110,247,0.35); transition:all 0.2s; letter-spacing:0.02em;"
                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 0 60px rgba(79,110,247,0.5)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 40px rgba(79,110,247,0.35)'">
                    Sign In →
                </button>
            </div>
        </form>
    </div>

    {{-- Footer --}}
    <div style="text-align:center; margin-top:24px;">
        <a href="/" style="font-size:12px; color:#334155; text-decoration:none; transition:color 0.2s;"
           onmouseover="this.style.color='#64748B'"
           onmouseout="this.style.color='#334155'">
            ← Back to HOPn website
        </a>
    </div>
</div>

<script>
function togglePassword() {
    var input = document.getElementById('password-input');
    var icon  = document.getElementById('eye-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 4.411m0 0L21 21"/>';
    } else {
        input.type = 'password';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
    }
}
</script>

</body>
</html>
