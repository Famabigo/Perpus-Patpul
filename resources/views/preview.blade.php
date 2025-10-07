<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan SMK 40</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        .feature-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #F3E8FF;
            color: #6B46C1;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            background: #6B46C1;
            color: #F3E8FF;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-purple-50 to-white min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-white/90 backdrop-blur-lg border-b border-purple-100 shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto">
                        <span class="ml-3 text-xl font-bold bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent">
                            Perpustakaan SMK 40
                        </span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg 
                              hover:bg-purple-700 transition-all duration-300 shadow-md hover:shadow-lg
                              hover:shadow-purple-300/50 active:bg-purple-800">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative isolate pt-14">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-purple-500 to-purple-300 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>
        
        <div class="py-24 sm:py-32 lg:pb-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 mx-auto max-w-2xl text-center lg:text-left">
                        <h1 class="text-4xl font-bold tracking-tight sm:text-6xl bg-gradient-to-r from-purple-900 to-purple-700 bg-clip-text text-transparent pb-2">
                            Selamat Datang di Perpustakaan Digital
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600">
                            Temukan berbagai koleksi buku digital kami. Baca, pinjam, dan tingkatkan pengetahuanmu dengan mudah melalui platform perpustakaan digital kami.
                        </p>
                        <div class="mt-10 flex items-center justify-center lg:justify-start gap-x-6">
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-6 py-3 bg-purple-600 text-white rounded-xl 
                                      hover:bg-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl 
                                      hover:shadow-purple-300/50 text-lg font-semibold active:bg-purple-800">
                                <i class="fas fa-book-reader mr-2"></i>
                                Mulai Membaca
                            </a>
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-6 py-3 bg-white text-purple-600 border-2 
                                      border-purple-200 rounded-xl hover:bg-purple-50 transition-all duration-300 
                                      shadow-lg hover:shadow-xl hover:shadow-purple-200/50 text-lg font-semibold">
                                <i class="fas fa-user-plus mr-2"></i>
                                Daftar
                            </a>
                        </div>
                    </div>
                    <div class="lg:w-1/2 mt-8 lg:mt-0">
                        <img src="{{ asset('images/perpusungu.jpg') }}" 
                             alt="Library Illustration" 
                             class="w-full h-auto max-w-2xl mx-auto rounded-3xl shadow-2xl
                                    transform hover:scale-105 transition-transform duration-500
                                    ring-1 ring-purple-900/5">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-purple-600 to-purple-400 opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"></div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-gradient-to-b from-white to-purple-50/50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-purple-900 sm:text-4xl">Fitur Unggulan</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Nikmati kemudahan dan kenyamanan dalam mengakses perpustakaan digital kami
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-3">
                    <div class="feature-card group relative bg-white/50 backdrop-blur-sm p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100/30">
                        <div class="feature-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <dt class="text-xl font-semibold leading-7 text-purple-900 mb-4">
                            Pencarian Mudah
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">
                            Temukan buku yang Anda inginkan dengan cepat melalui fitur pencarian canggih kami.
                        </dd>
                    </div>
                    <div class="feature-card group relative bg-white/50 backdrop-blur-sm p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100/30">
                        <div class="feature-icon">
                            <i class="fa-solid fa-book-bookmark"></i>
                        </div>
                        <dt class="text-xl font-semibold leading-7 text-purple-900 mb-4">
                            Peminjaman Online
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">
                            Pinjam buku secara online dengan mudah dan pantau status peminjaman Anda.
                        </dd>
                    </div>
                    <div class="feature-card group relative bg-white/50 backdrop-blur-sm p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100/30">
                        <div class="feature-icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <dt class="text-xl font-semibold leading-7 text-purple-900 mb-4">
                            Akses Dimana Saja
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">
                            Akses perpustakaan digital dari perangkat apa saja, kapan saja, dan dimana saja.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-purple-900 to-purple-950 text-white mt-24">
        <div class="mx-auto max-w-7xl overflow-hidden">
            <!-- Top Wave Divider -->
            <div class="relative -mt-3">
                <svg class="w-full h-12 text-purple-900 fill-current transform rotate-180" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
                </svg>
            </div>

            <div class="px-6 py-16 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                    <!-- Brand Info -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto">
                            <span class="text-xl font-bold">Perpustakaan SMK 40</span>
                        </div>
                        <p class="text-purple-200 text-sm leading-6">
                            Memberikan akses mudah ke dunia pengetahuan melalui perpustakaan digital.
                        </p>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <h4 class="text-lg font-semibold text-white">Kontak</h4>
                        <ul class="space-y-4 text-purple-200">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt w-5 mt-1"></i>
                                <span class="ml-3">Jl. Nanas Jakarta Timur</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone w-5 mt-1"></i>
                                <span class="ml-3">(022) 123-4567</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope w-5 mt-1"></i>
                                <span class="ml-3">perpus@smk40jkt.sch.id</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Operating Hours -->
                    <div class="space-y-6">
                        <h4 class="text-lg font-semibold text-white">Jam Operasional</h4>
                        <ul class="space-y-4 text-purple-200">
                            <li class="flex justify-between">
                                <span>Senin - Jumat</span>
                                <span class="font-medium">06:30 - 15:10</span>
                            </li>
          
                            <li class="flex justify-between">
                                <span>Sabtu - Minggu</span>
                                <span class="font-medium">Tutup</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="mt-12 pt-8 border-t border-purple-800/30">
                    <p class="text-center text-sm leading-5 text-purple-300">
                        &copy; {{ date('Y') }} Perpustakaan SMK 40. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>