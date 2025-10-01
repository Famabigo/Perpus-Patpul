<section>
    <header>
        <p class="text-sm text-purple-700 dark:text-purple-400">
            {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="relative">
            <x-input-label for="current_password" :value="__('Password Saat Ini')" class="text-purple-900 dark:text-purple-400" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-purple-500"></i>
                </div>
                <x-text-input id="current_password" name="current_password" type="password"
                    class="mt-1 block w-full pl-10 focus:border-purple-500 focus:ring-purple-500"
                    autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="relative">
            <x-input-label for="password" :value="__('Password Baru')" class="text-purple-900 dark:text-purple-400" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-key text-purple-500"></i>
                </div>
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full pl-10 focus:border-purple-500 focus:ring-purple-500"
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="relative">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-purple-900 dark:text-purple-400" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-check-circle text-purple-500"></i>
                </div>
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full pl-10 focus:border-purple-500 focus:ring-purple-500"
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 flex items-center">
                <i class="fas fa-save mr-2"></i>
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 dark:text-green-400 flex items-center"
                >
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ __('Tersimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>
