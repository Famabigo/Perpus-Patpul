<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold" style="color: var(--primary);">Selamat Datang!</h2>
        <p class="mt-2 text-sm text-gray-600">Silakan masuk ke akun Anda</p>
    </div>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6 px-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="auth-label block mb-2">{{ __('Email') }}</label>
            <input id="email" class="auth-input block w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="auth-label block mb-2">{{ __('Password') }}</label>
            <input id="password" class="auth-input block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-center mt-8">
            <button type="submit" class="auth-button px-8 py-3 rounded-lg">
                {{ __('Masuk') }} <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-primary hover:text-primary-light font-medium transition-colors">Daftar sekarang!</a>
            </p>
        </div>
    </form>
</x-guest-layout>
