<x-guest-layout>
    <h2 class="text-3xl font-bold mb-6 text-center" style="color: #443627;">Daftar Akun</h2>
    
    <form method="POST" action="{{ route('register') }}" class="space-y-6 px-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="auth-label block mb-2">{{ __('Nama Lengkap') }}</label>
            <input id="name" class="auth-input block w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="auth-label block mb-2">{{ __('Email') }}</label>
            <input id="email" class="auth-input block w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="auth-label block mb-2">{{ __('Password') }}</label>
            <input id="password" class="auth-input block w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="auth-label block mb-2">{{ __('Konfirmasi Password') }}</label>
            <input id="password_confirmation" class="auth-input block w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center space-y-4 mt-6">
            <button type="submit" class="auth-button w-full px-6 py-2 rounded-lg font-medium hover:shadow-lg">
                {{ __('Daftar') }} <i class="fas fa-user-plus ml-2"></i>
            </button>
            
            <p class="text-sm" style="color: #443627;">Sudah punya akun? 
                <a class="auth-link font-medium" href="{{ route('login') }}">
                    {{ __('Masuk di sini') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
