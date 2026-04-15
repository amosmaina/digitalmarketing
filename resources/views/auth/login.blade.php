@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center pt-32 pb-20 relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold font-serif mb-4">Welcome Back</h1>
                <p class="text-gray-400">Login to access the admin portal</p>
            </div>

            <div class="glass p-8 md:p-10 rounded-[2.5rem] shadow-2xl border border-white/10">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-400 mb-2 ml-1">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </span>
                            <input id="email" type="email" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-12 pr-4 focus:outline-none focus:border-indigo-600 transition @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@company.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2 ml-1">
                            <label for="password" class="block text-sm font-bold text-gray-400">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs text-indigo-400 hover:text-indigo-300 transition" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input id="password" type="password" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-12 pr-4 focus:outline-none focus:border-indigo-600 transition @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center ml-1">
                        <input class="w-4 h-4 rounded bg-white/5 border-white/10 text-indigo-600 focus:ring-indigo-600 focus:ring-offset-gray-950 transition" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="ml-2 text-sm text-gray-400" for="remember">
                            Keep me logged in
                        </label>
                    </div>

                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 rounded-2xl font-bold text-white transition transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-indigo-600/20">
                        Sign In
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">Need help? <a href="#contact" class="text-indigo-400 hover:text-indigo-300 font-bold">Contact Support</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
