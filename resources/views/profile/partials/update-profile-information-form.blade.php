<section>
    <header>
        <p class="text-sm text-purple-700 dark:text-purple-400">
            {{ __("Update informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="relative">
            <x-input-label for="name" :value="__('Nama')" class="text-purple-900 dark:text-purple-400" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-purple-500"></i>
                </div>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full pl-10 focus:border-purple-500 focus:ring-purple-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="relative">
            <x-input-label for="email" :value="__('Email')" class="text-purple-900 dark:text-purple-400" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-purple-500"></i>
                </div>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full pl-10 focus:border-purple-500 focus:ring-purple-500" :value="old('email', $user->email)" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-purple-50 rounded-lg border border-purple-200">
                    <p class="text-sm text-purple-800 dark:text-purple-200 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2 text-purple-500"></i>
                        {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="ml-2 text-purple-600 hover:text-purple-800 dark:hover:text-purple-300 underline text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 dark:focus:ring-offset-gray-800">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600 dark:text-green-400 flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 flex items-center">
                <i class="fas fa-save mr-2"></i>
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'profile-updated')
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
