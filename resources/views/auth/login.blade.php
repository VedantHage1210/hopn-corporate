<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <!-- Card Container with backdrop blur effect -->
            <div class="bg-white/98 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-8 sm:p-10">
                
                <!-- Logo Section -->
                <div class="flex flex-col items-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-500 rounded-xl flex items-center justify-center shadow-lg mb-4 transform hover:scale-105 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11l-3 3 3 3 3-3-3-3z"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Admin Portal</h1>
                    <p class="text-sm font-semibold text-slate-500 mt-2 uppercase tracking-wider">HOPn Enterprise Dashboard</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-slate-700 font-semibold text-sm uppercase tracking-wider" />
                        <x-text-input 
                            id="email" 
                            class="block mt-2 w-full px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200"
                            placeholder="you@company.com"
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm font-medium" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-700 font-semibold text-sm uppercase tracking-wider" />
                        <x-text-input 
                            id="password" 
                            class="block mt-2 w-full px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-lg text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200"
                            placeholder="••••••••"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password" 
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm font-medium" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="w-5 h-5 rounded-lg border-2 border-slate-200 text-blue-600 bg-slate-50 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer transition-colors duration-200 accent-blue-600" 
                            name="remember"
                        >
                        <label for="remember_me" class="ms-3 text-sm font-medium text-slate-600 cursor-pointer hover:text-slate-700 transition-colors">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Forgot Password & Login Button -->
                    <div class="flex items-center justify-between pt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200 underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-primary-button class="ms-auto px-8 py-3 bg-gradient-to-r from-blue-700 to-blue-600 hover:from-blue-800 hover:to-blue-700 text-white font-bold uppercase tracking-wider rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-500/50">
                            {{ __('Sign In') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
