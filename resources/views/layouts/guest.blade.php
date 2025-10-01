<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .auth-card {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border-radius: 16px;
                box-shadow: 0 8px 32px var(--shadow);
                border: 1px solid rgba(159, 122, 234, 0.2);
                border-top: 4px solid var(--primary);
            }
            .auth-button {
                background: var(--primary);
                color: white;
                transition: all 0.3s ease;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .auth-button:hover {
                background: var(--primary-light);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(107, 70, 193, 0.2);
            }
            .auth-input {
                border: 2px solid var(--accent);
                border-radius: 12px;
                padding: 0.75rem 1rem;
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.9);
            }
            .auth-input:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 4px var(--shadow);
                outline: none;
            }
            .auth-label {
                color: var(--dark);
                font-weight: 500;
            }
            .auth-link {
                color: #D98324;
                transition: all 0.2s ease;
            }
            .auth-link:hover {
                color: #c47520;
            }
            .pattern-bg {
                background-color: #EFDCAB;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d98324' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background: var(--bg-gradient)">
            <div class="flex items-center gap-6 transform hover:scale-105 transition-transform duration-300">
                <a href="/">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-24 drop-shadow-lg">
                </a>
                <div class="text-left">
                    <h1 class="text-3xl font-bold text-primary leading-tight">Perpustakaan SMKN40</h1>
                    <p class="text-base text-gray-600 mt-1">Manjur, Mandiri dan Jujur</p>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 auth-card overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
