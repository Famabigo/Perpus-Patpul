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
            <div class="hidden sm:flex items-center gap-4">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="relative">
                        <button id="notifDropdownButton" type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-gray-600 hover:bg-purple-50 hover:text-purple-600 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-full transition-all duration-300">
                            <i class="fas fa-bell text-xl"></i>
                            @php
                            $count = \App\Models\Peminjaman::where('status', 'menunggu')->count();
                            @endphp
                            @if($count > 0)
                                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1">
                                    {{ $count }}
                                </div>
                            @endif
                        </button>
                        <div id="notifDropdownMenu" class="hidden absolute right-0 z-50 mt-2 w-80 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="px-4 py-3 text-sm text-gray-900 border-b border-gray-200">
                                <div class="font-medium">Notifikasi</div>
                            </div>
                            @foreach(\App\Models\Peminjaman::where('status', 'menunggu')->orderBy('created_at', 'desc')->limit(5)->get() as $peminjaman)
                                <a href="{{ route('admin.peminjaman.aktif') }}" class="flex px-4 py-3 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-book-reader text-purple-500 text-xl"></i>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-sm font-medium text-gray-900">Peminjaman Baru</div>
                                        <p class="text-sm text-gray-500">{{ $peminjaman->user->name }} meminjam {{ $peminjaman->book->judul }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $peminjaman->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            @endforeach
                            @if($count > 5)
                                <a href="{{ route('admin.peminjaman.aktif') }}" class="block px-4 py-2 text-sm text-center text-purple-600 hover:bg-gray-50 font-medium">
                                    Lihat semua notifikasi
                                </a>
                            @elseif($count === 0)
                                <div class="px-4 py-3 text-sm text-gray-500 text-center">
                                    Tidak ada notifikasi baru
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center transition-all duration-300">
                        <div class="px-4 py-2 rounded-lg text-gray-600 hover:text-red-600 hover:bg-red-50">
                            <i class="fa fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                        </div>
                    </button>
                </form>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const button = document.getElementById('notifDropdownButton');
                    const menu = document.getElementById('notifDropdownMenu');
                    let isOpen = false;

                    if (button && menu) {
                        button.addEventListener('click', function(e) {
                            e.stopPropagation();
                            isOpen = !isOpen;
                            menu.classList.toggle('hidden');
                        });

                        document.addEventListener('click', function(e) {
                            if (!button.contains(e.target) && !menu.contains(e.target) && !menu.classList.contains('hidden')) {
                                menu.classList.add('hidden');
                                isOpen = false;
                            }
                        });
                    }
                });
            </script>



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
