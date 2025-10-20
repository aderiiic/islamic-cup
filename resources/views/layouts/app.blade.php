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

<!-- Footer -->
<footer class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-emerald-900 to-gray-900">
    <!-- Elegant Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="mosque-footer-pattern" x="0" y="0" width="150" height="150" patternUnits="userSpaceOnUse">
                    <!-- Mosque silhouette -->
                    <g fill="currentColor" class="text-emerald-400">
                        <path d="M75 30L85 50H65L75 30Z"/>
                        <rect x="55" y="50" width="40" height="40"/>
                        <rect x="68" y="55" width="14" height="30"/>
                        <circle cx="45" cy="65" r="3"/>
                        <circle cx="105" cy="65" r="3"/>
                        <!-- Stars -->
                        <path d="M30 100L33 108L25 108L30 100Z"/>
                        <path d="M120 40L123 48L115 48L120 40Z"/>
                        <circle cx="40" cy="120" r="2"/>
                        <circle cx="110" cy="110" r="2"/>
                    </g>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#mosque-footer-pattern)"/>
        </svg>
    </div>

    <!-- Glowing orbs for ambient lighting -->
    <div class="absolute top-20 left-1/4 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-1/4 w-40 h-40 bg-yellow-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">

        <!-- Header Section med personlig touch -->
        <div class="text-center mb-16">
            <!-- Islamic Cup Logo med elegant stil -->
            <div class="flex justify-center items-center mb-8">
                <div class="relative">
                    <!-- Bakgrundsglöd -->
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-yellow-400/20 blur-xl rounded-full scale-150"></div>

                    <!-- Logo container -->
                    <div class="relative flex items-center space-x-4 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl px-8 py-4">
                        <svg class="w-12 h-12 text-emerald-400" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="18" stroke="currentColor" stroke-width="2"/>
                            <path d="M20 8L23.09 16.18L32 17.27L26 23.14L27.18 32L20 28.18L12.82 32L14 23.14L8 17.27L16.91 16.18L20 8Z" fill="currentColor"/>
                        </svg>
                        <div>
                            <div class="text-3xl font-bold text-emerald-300">Islamic Cup</div>
                            <div class="text-yellow-400 font-semibold">2025</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inspirerande citat -->
            <div class="max-w-4xl mx-auto mb-12">
                <blockquote class="relative">
                    <!-- Dekorativa citattecken -->
                    <div class="absolute -top-6 -left-4 text-6xl text-emerald-400/30 font-serif">"</div>
                    <div class="absolute -bottom-12 -right-4 text-6xl text-emerald-400/30 font-serif rotate-180">"</div>

                    <p class="text-xl md:text-2xl text-emerald-100 font-light italic leading-relaxed px-8">
                        Tillsammans skapar vi något vackert - där tro förenar hjärtan,
                        idrott bygger vänskap och gemenskap ger mening åt våra liv.
                    </p>

                    <!-- Signatur -->
                    <footer class="mt-8 text-yellow-400 font-semibold">
                        - Islamic Cup Familjen
                    </footer>
                </blockquote>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="grid lg:grid-cols-12 gap-12 mb-12">

            <!-- Vänster sektion - Om oss (mer personlig) -->
            <div class="lg:col-span-6 space-y-8">
                <div>
                    <h3 class="text-2xl font-bold text-emerald-300 mb-6 flex items-center">
                        <div class="w-1 h-8 bg-gradient-to-b from-emerald-400 to-yellow-400 rounded-full mr-4"></div>
                        Vår berättelse
                    </h3>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        Sedan 2016 har Islamic Cup varit mer än en turnering - vi är en
                        <span class="text-emerald-400 font-semibold">familj som växer</span> varje år.
                        Här träffas <span class="text-yellow-400 font-semibold">moskéer</span>,
                        <span class="text-yellow-400 font-semibold">vänner</span> och
                        <span class="text-yellow-400 font-semibold">nya bekantskaper</span>
                        i en atmosfär fylld av glädje och islamiska värderingar.
                    </p>
                </div>

                <!-- Våra värderingar -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="group flex items-start space-x-3 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                        <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-emerald-300 font-semibold mb-1">Gemenskap</h4>
                            <p class="text-gray-400 text-sm">Förenar muslimer från hela Sverige</p>
                        </div>
                    </div>

                    <div class="group flex items-start space-x-3 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-yellow-300 font-semibold mb-1">Glädje</h4>
                            <p class="text-gray-400 text-sm">Skapar minnesrika stunder</p>
                        </div>
                    </div>

                    <div class="group flex items-start space-x-3 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                        <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-emerald-300 font-semibold mb-1">Lärdom</h4>
                            <p class="text-gray-400 text-sm">Värdefulla föreläsningar</p>
                        </div>
                    </div>

                    <div class="group flex items-start space-x-3 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-yellow-300 font-semibold mb-1">Passion</h4>
                            <p class="text-gray-400 text-sm">Kärlek för idrott och tävling</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mitten och höger sektion -->
            <div class="lg:col-span-6 grid md:grid-cols-2 gap-8">

                <!-- Snabblänkar -->
                <div>
                    <h3 class="text-xl font-bold text-emerald-300 mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-emerald-400 to-yellow-400 rounded-full mr-3"></div>
                        Utforska
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#om" class="group flex items-center text-gray-300 hover:text-emerald-400 transition-all duration-300">
                                <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Vår historia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#turnering" class="group flex items-center text-gray-300 hover:text-yellow-400 transition-all duration-300">
                                <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Futsal-turnering</span>
                            </a>
                        </li>
                        <li>
                            <a href="#aktiviteter" class="group flex items-center text-gray-300 hover:text-emerald-400 transition-all duration-300">
                                <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Familjeaktiviteter</span>
                            </a>
                        </li>
                        <li>
                            <a href="#nyheter" class="group flex items-center text-gray-300 hover:text-yellow-400 transition-all duration-300">
                                <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Senaste nytt</span>
                            </a>
                        </li>
                        <li>
                            <a href="#kontakt" class="group flex items-center text-gray-300 hover:text-emerald-400 transition-all duration-300">
                                <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Kontakta oss</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kontakt & Community -->
                <div>
                    <h3 class="text-xl font-bold text-emerald-300 mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-emerald-400 to-yellow-400 rounded-full mr-3"></div>
                        Kontakt
                    </h3>
                    <div class="space-y-6">
                        <!-- E-post -->
                        <div class="group">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="text-gray-200">E-post</span>
                            </div>
                            <a href="mailto:info@islamiccup.se" class="text-emerald-400 hover:text-emerald-300 transition-colors font-medium block ml-11">
                                info@islamiccup.se
                            </a>
                        </div>

                        <!-- Plats -->
                        <div class="group">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <span class="text-gray-200">Vi finns i</span>
                            </div>
                            <span class="text-yellow-400 font-medium block ml-11">Hela Sverige</span>
                        </div>

                        <!-- Följ oss -->
                        <div>
                            <p class="text-gray-300 mb-4 text-sm">Bli en del av vår community:</p>
                            <div class="flex space-x-3">
                                <a href="#" class="group w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center hover:bg-blue-500/30 transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="group w-10 h-10 bg-pink-500/20 rounded-xl flex items-center justify-center hover:bg-pink-500/30 transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5 text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.739.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.750-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z"/>
                                    </svg>
                                </a>
                                <a href="#" class="group w-10 h-10 bg-red-500/20 rounded-xl flex items-center justify-center hover:bg-red-500/30 transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom section med personal touch -->
        <div class="border-t border-gray-700/50 pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0">

                <!-- Copyright med personlig touch -->
                <div class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6 text-center lg:text-left">
                    <p class="text-gray-400">
                        &copy; {{ date('Y') }} Islamic Cup.
                        <span class="text-emerald-400">Skapad med kärlek</span> för vår ummah.
                    </p>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Sedan 2016</span>
                        <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                        <span>8+ år av gemenskap</span>
                    </div>
                </div>

                <!-- Mini stats med hjärt-touch -->
                <div class="flex items-center space-x-8 text-sm">
                    <div class="flex items-center space-x-2 text-gray-400">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span><span class="text-emerald-400 font-semibold">500+</span> spelare</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-400">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z"/>
                        </svg>
                        <span><span class="text-yellow-400 font-semibold">50+</span> lag</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-400">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><span class="text-emerald-400 font-semibold">2K+</span> leenden</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elegant bottom border -->
    <div class="h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent"></div>
</footer>

@stack('scripts')
</body>
</html>
