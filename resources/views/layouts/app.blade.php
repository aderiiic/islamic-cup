<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Islamic Cup 2025 - Förena Muslimer Genom Idrott')</title>
    <meta name="description" content="@yield('description', 'Islamic Cup är en årlig futsal-turnering som förenar muslimer och moskéer i Sverige genom idrott, föreläsningar och familjeaktiviteter.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased">
<!-- Navigation -->
<nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <svg class="w-10 h-10 text-emerald-600" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="18" stroke="currentColor" stroke-width="2"/>
                    <path d="M20 8L23.09 16.18L32 17.27L26 23.14L27.18 32L20 28.18L12.82 32L14 23.14L8 17.27L16.91 16.18L20 8Z" fill="currentColor"/>
                </svg>
                <div class="flex flex-col">
                    <span class="text-xl font-bold text-emerald-600">Islamic Cup</span>
                    <span class="text-xs text-gray-600">2025</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Hem</a>
                <a href="#om" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Om Oss</a>
                <a href="#turnering" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Turnering</a>
                <a href="#aktiviteter" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Aktiviteter</a>
                <a href="#nyheter" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Nyheter</a>
                <a href="#kontakt" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Kontakt</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-full font-medium hover:bg-emerald-700 transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors">Logga in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-full font-medium hover:bg-emerald-700 transition-colors">
                                Registrera
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden border-t border-gray-200 bg-white">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ url('/') }}" class="block text-gray-700 hover:text-emerald-600 font-medium">Hem</a>
            <a href="#om" class="block text-gray-700 hover:text-emerald-600 font-medium">Om Oss</a>
            <a href="#turnering" class="block text-gray-700 hover:text-emerald-600 font-medium">Turnering</a>
            <a href="#aktiviteter" class="block text-gray-700 hover:text-emerald-600 font-medium">Aktiviteter</a>
            <a href="#nyheter" class="block text-gray-700 hover:text-emerald-600 font-medium">Nyheter</a>
            <a href="#kontakt" class="block text-gray-700 hover:text-emerald-600 font-medium">Kontakt</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="block px-6 py-2 bg-emerald-600 text-white rounded-full font-medium text-center">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-emerald-600 font-medium">Logga in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-6 py-2 bg-emerald-600 text-white rounded-full font-medium text-center">
                            Registrera
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-20">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <svg class="w-10 h-10 text-emerald-400" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="18" stroke="currentColor" stroke-width="2"/>
                        <path d="M20 8L23.09 16.18L32 17.27L26 23.14L27.18 32L20 28.18L12.82 32L14 23.14L8 17.27L16.91 16.18L20 8Z" fill="currentColor"/>
                    </svg>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-emerald-400">Islamic Cup</span>
                        <span class="text-xs text-gray-400">2025</span>
                    </div>
                </div>
                <p class="text-gray-400 mb-4">
                    Förena muslimer och moskéer genom idrott, föreläsningar och familjeaktiviteter.
                    En årlig futsal-turnering som samlar gemenskapen.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-emerald-400">Snabblänkar</h3>
                <ul class="space-y-2">
                    <li><a href="#om" class="text-gray-400 hover:text-emerald-400 transition-colors">Om Oss</a></li>
                    <li><a href="#turnering" class="text-gray-400 hover:text-emerald-400 transition-colors">Turnering</a></li>
                    <li><a href="#aktiviteter" class="text-gray-400 hover:text-emerald-400 transition-colors">Aktiviteter</a></li>
                    <li><a href="#nyheter" class="text-gray-400 hover:text-emerald-400 transition-colors">Nyheter</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-emerald-400">Kontakt</h3>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>info@islamiccup.se</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Sverige</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Islamic Cup. Alla rättigheter förbehållna.</p>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
