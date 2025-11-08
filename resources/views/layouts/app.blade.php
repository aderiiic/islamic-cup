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
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased">
<!-- Navigation -->

<!-- Navigation -->
<nav x-data="{ mobileMenuOpen: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
     :class="scrolled ? 'bg-white/98 backdrop-blur-lg shadow-xl border-b border-emerald-100/50' : 'bg-white/95 backdrop-blur-sm shadow-sm'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <!-- Elegant top border -->
    <div class="h-1 bg-gradient-to-r from-transparent via-emerald-400 to-yellow-400 opacity-80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            <!-- Enhanced Logo with Islamic elements -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                     alt="Islamic Cup Logo"
                     class="h-12 w-auto transition-transform group-hover:scale-105">
            </a>

            <!-- Enhanced Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="{{ url('/') }}" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Hem</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <a href="#om" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Om Oss</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <a href="#turnering" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Turnering</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <a href="#aktiviteter" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Aktiviteter</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <a href="#nyheter" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Nyheter</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <a href="#kontakt" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                    <span class="relative z-10">Kontakt</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                </a>

                <!-- Divider with Islamic pattern -->
                <div class="mx-4 h-8 w-px bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="group relative px-6 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl ml-4">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <span>Dashboard</span>
                            </span>
                            <div class="absolute inset-0 bg-white/20 rounded-2xl scale-90 group-hover:scale-100 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                            <span class="relative z-10">Logga in</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="group relative px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl ml-4">
                                <span class="relative z-10 flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    <span>Registrera</span>
                                </span>
                                <div class="absolute inset-0 bg-white/30 rounded-2xl scale-90 group-hover:scale-100 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Enhanced Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden group relative p-3 rounded-2xl bg-gray-50/50 hover:bg-emerald-50/70 border border-gray-200/50 hover:border-emerald-200/50 transition-all duration-300">
                <!-- Background glow effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500/20 to-yellow-400/20 rounded-2xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <!-- Hamburger icon with smooth animation -->
                <div class="relative w-6 h-6 flex flex-col justify-center items-center">
                    <span x-show="!mobileMenuOpen"
                          x-transition:enter="transition ease-out duration-200"
                          x-transition:enter-start="opacity-0 rotate-180"
                          x-transition:enter-end="opacity-100 rotate-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 rotate-0"
                          x-transition:leave-end="opacity-0 rotate-180"
                          class="absolute">
                        <svg class="w-6 h-6 text-gray-600 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </span>

                    <span x-show="mobileMenuOpen"
                          x-transition:enter="transition ease-out duration-200"
                          x-transition:enter-start="opacity-0 rotate-180"
                          x-transition:enter-end="opacity-100 rotate-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 rotate-0"
                          x-transition:leave-end="opacity-0 rotate-180"
                          class="absolute">
                        <svg class="w-6 h-6 text-gray-600 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </span>
                </div>
            </button>
        </div>
    </div>

    <!-- Enhanced Mobile Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="lg:hidden border-t border-gradient-to-r from-emerald-200/30 via-emerald-300/50 to-yellow-200/30 bg-white/98 backdrop-blur-lg">

        <!-- Islamic geometric pattern background -->
        <div class="absolute inset-0 opacity-5">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="mobile-nav-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="1"/>
                        <path d="M20 12L22 18L16 18L20 12Z" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#mobile-nav-pattern)" class="text-emerald-600"/>
            </svg>
        </div>

        <div class="relative px-4 py-8 space-y-2">
            <!-- Navigation links with enhanced styling -->
            <a href="{{ url('/') }}" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Hem</span>
            </a>

            <a href="#om" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Om Oss</span>
            </a>

            <a href="#turnering" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Turnering</span>
            </a>

            <a href="#aktiviteter" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Aktiviteter</span>
            </a>

            <a href="#nyheter" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Nyheter</span>
            </a>

            <a href="#kontakt" class="group flex items-center space-x-3 px-4 py-4 text-gray-700 hover:text-emerald-600 font-medium rounded-2xl hover:bg-emerald-50/50 transition-all duration-300">
                <div class="w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span>Kontakt</span>
            </a>

            <!-- Elegant divider -->
            <div class="flex items-center py-4">
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                <div class="px-4">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
            </div>

            <!-- Auth buttons -->
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="group flex items-center justify-center space-x-2 px-6 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group relative px-4 py-2 text-gray-700 hover:text-emerald-600 font-medium transition-all duration-300 rounded-xl hover:bg-emerald-50/50">
                        <span class="relative z-10">Logga in</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-emerald-600/10 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="group flex items-center justify-center space-x-2 px-6 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg mt-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            <span>Registrera</span>
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
    {{ $slot ?? '' }}
</main>

<!-- Footer -->
<footer class="bg-gradient-to-br from-gray-900 via-emerald-900 to-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Logo & Tagline -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center space-x-3 group mb-4">
                <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                     alt="Islamic Cup Logo"
                     class="h-16 w-auto group-hover:scale-105 transition-transform">
            </a>
            <p class="text-emerald-200 text-lg italic">
                "Förena muslimer genom idrott och gemenskap"
            </p>
        </div>

        <!-- Links -->
        <div class="flex flex-wrap justify-center gap-8 mb-8 text-sm">
            <a href="#om" class="text-gray-300 hover:text-emerald-400 transition-colors">Om Oss</a>
            <a href="#turnering" class="text-gray-300 hover:text-emerald-400 transition-colors">Turnering</a>
            <a href="#aktiviteter" class="text-gray-300 hover:text-emerald-400 transition-colors">Aktiviteter</a>
            <a href="#nyheter" class="text-gray-300 hover:text-emerald-400 transition-colors">Nyheter</a>
            <a href="#sponsorer" class="text-gray-300 hover:text-emerald-400 transition-colors">Sponsorer</a>
            <a href="mailto:info@islamiccup.se" class="text-gray-300 hover:text-emerald-400 transition-colors">Kontakt</a>
        </div>

        <!-- Social Media -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-emerald-500 rounded-full flex items-center justify-center transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-pink-500 rounded-full flex items-center justify-center transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.739.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.750-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z"/>
                </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-red-500 rounded-full flex items-center justify-center transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-700/50 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} Islamic Cup. <span class="text-emerald-400">Skapad med kärlek</span> för vår ummah.</p>
            <div class="flex items-center space-x-6 mt-4 md:mt-0">
                <span>Sedan 2016</span>
                <span>•</span>
                <span>8+ år av gemenskap</span>
            </div>
        </div>
    </div>
</footer>
@livewireScripts

@stack('scripts')
</body>
</html>
