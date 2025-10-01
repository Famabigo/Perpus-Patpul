<x-app-layout>
    <div class="py-12">
        <!-- Profile Header Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-gradient-to-r from-purple-100/80 to-purple-50/80 rounded-2xl p-8 shadow-lg backdrop-blur-sm border border-purple-100/20">
                <div class="flex items-center space-x-6">
                    <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-full p-1">
                        <div class="bg-white rounded-full p-1">
                            <div class="h-24 w-24 rounded-full bg-purple-50 flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-purple-600"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">{{ Auth::user()->name }}</h1>
                        <p class="text-purple-700 mt-1">{{ Auth::user()->email }}</p>
                        <p class="text-purple-600 mt-2 text-sm">
                            <i class="fas fa-circle text-xs mr-1"></i> 
                            {{ ucfirst(Auth::user()->role) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Forms Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-purple-100">
                <div class="border-b border-purple-100/30 bg-gradient-to-r from-purple-50 to-transparent px-6 py-4">
                    <div class="flex items-center">
                        <i class="fas fa-user-circle text-purple-600 text-xl mr-3"></i>
                        <h2 class="text-xl font-semibold text-purple-900">Informasi Profil</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-purple-100">
                <div class="border-b border-purple-100/30 bg-gradient-to-r from-purple-50 to-transparent px-6 py-4">
                    <div class="flex items-center">
                        <i class="fas fa-key text-purple-600 text-xl mr-3"></i>
                        <h2 class="text-xl font-semibold text-purple-900">Ubah Password</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 border border-red-50">
                <div class="border-b border-red-100/30 bg-gradient-to-r from-red-50 to-transparent px-6 py-4">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl mr-3"></i>
                        <h2 class="text-xl font-semibold text-red-900">Hapus Akun</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dark .bg-gradient-to-r {
            background: linear-gradient(to right, rgba(107, 70, 193, 0.1), rgba(107, 70, 193, 0.05));
        }
        .dark .text-purple-900 {
            color: var(--primary-light);
        }
        .dark .text-purple-700 {
            color: var(--accent);
        }
        .dark .text-purple-600 {
            color: var(--light);
        }
        .dark .border-purple-100\/30 {
            border-color: rgba(243, 232, 255, 0.1);
        }
        .dark .from-purple-50 {
            --tw-gradient-from: rgba(107, 70, 193, 0.1);
        }
    </style>
</x-app-layout>
