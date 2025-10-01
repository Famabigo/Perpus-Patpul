<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-purple-100 dark:border-purple-900 sticky top-0 z-50 shadow-md backdrop-blur-sm bg-white/90">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24 items-center" style="min-height:5.5rem;">
            <div class="flex items-center">
                <!-- Custom Logo -->
                <div class="shrink-0 flex items-center">
                    <div class="p-2 mr-4">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto" />
                    </div>
                    <span class="font-bold text-lg text-primary" style="letter-spacing:1px;">Perpustakaan SMKN 40 Jakarta</span>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <div class="px-4 py-2 transition-all duration-300 hover:bg-purple-50 hover:text-purple-700 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-purple-100 text-purple-700' : 'text-gray-600' }}">
                            <i class="fas fa-home mr-2"></i>{{ __('Dashboard') }}
                        </div>
                    </x-nav-link>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        <div class="px-4 py-2 transition-all duration-300 hover:bg-purple-50 hover:text-purple-700 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-purple-100 text-purple-700' : 'text-gray-600' }}">
                            <i class="fa fa-user mr-2"></i>{{ __('Profile') }}
                        </div>
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden sm:flex items-center">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center transition-all duration-300">
                        <div class="px-4 py-2 rounded-lg text-gray-600 hover:text-red-600 hover:bg-red-50">
                            <i class="fa fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                        </div>
                    </button>
                </form>
            </div>



            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-purple-600 hover:text-purple-800 hover:bg-purple-50 focus:outline-none transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-gray-800 border-t border-purple-100 dark:border-purple-900">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-600 hover:text-purple-700 hover:bg-purple-50">
                <i class="fas fa-home mr-2"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-purple-100 dark:border-purple-900">
            <div class="px-4">
                <div class="font-medium text-base text-purple-900 dark:text-purple-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-600 hover:text-purple-700 hover:bg-purple-50">
                    <i class="fa fa-user mr-2"></i>{{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-red-600 hover:text-red-700 hover:bg-red-50">
                        <i class="fa fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
