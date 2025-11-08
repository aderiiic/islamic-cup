@extends('layouts.app')

@section('title', 'Islamic Cup 2025 - Förena Muslimer Genom Idrott')
@section('description', 'Islamic Cup är en årlig futsal-turnering som förenar muslimer och moskéer i Sverige genom idrott, föreläsningar och familjeaktiviteter.')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-screen min-h-[700px] flex items-center justify-center overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 z-0">
            <!-- Primary Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900"></div>

            <!-- Geometric Shapes -->
            <div class="absolute top-10 right-10 w-32 h-32 border-2 border-yellow-400/20 rotate-45 animate-pulse"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-yellow-400/10 rounded-full animate-bounce"></div>
            <div class="absolute top-1/3 left-10 w-16 h-16 border border-emerald-400/30 rounded-full"></div>
            <div class="absolute bottom-1/3 right-20 w-20 h-20 bg-gradient-to-br from-emerald-600/20 to-teal-600/20 transform rotate-12"></div>

            <!-- Islamic Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="islamicPattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                            <polygon points="50,15 60,35 40,35" fill="currentColor"/>
                            <polygon points="50,85 40,65 60,65" fill="currentColor"/>
                            <polygon points="15,50 35,40 35,60" fill="currentColor"/>
                            <polygon points="85,50 65,60 65,40" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#islamicPattern)" class="text-yellow-400"/>
                </svg>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-8 items-center min-h-[500px]">

                <!-- Left Column - Main Content -->
                <div class="lg:col-span-7 text-left lg:text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 bg-yellow-400/10 backdrop-blur-sm border border-yellow-400/20 rounded-full px-4 py-2 mb-6">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                        <span class="text-yellow-400 text-sm font-medium">Årlig tradition sedan 2016</span>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-6 leading-tight">
                        <span class="">Islamic</span>
                        <span class="text-yellow-400 relative">
                        Cup
                        <svg class="absolute -bottom-2 left-0 w-full h-4 text-yellow-400/30" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 15 Q50 5 100 10 T200 8" stroke="currentColor" stroke-width="3" fill="none"/>
                        </svg>
                    </span>
                        <span class="block text-2xl sm:text-3xl lg:text-4xl text-emerald-300 font-normal mt-2">
                        2025
                    </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg sm:text-xl text-emerald-100/90 mb-8 max-w-2xl leading-relaxed">
                        En unik plattform där
                        <span class="text-yellow-400 font-semibold">futsal</span>,
                        <span class="text-yellow-400 font-semibold">föreläsningar</span> och
                        <span class="text-yellow-400 font-semibold">gemenskap</span>
                        förenar muslimer från hela Sverige
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <a href="#turnering" class="group relative inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Anmäl ditt lag
                            <div class="absolute inset-0 bg-white/20 rounded-xl transform scale-95 group-hover:scale-100 transition-transform opacity-0 group-hover:opacity-100"></div>
                        </a>
                        <a href="#om" class="group inline-flex items-center justify-center px-8 py-4 bg-white/5 backdrop-blur-sm hover:bg-white/10 text-white font-semibold rounded-xl transition-all duration-300 border border-white/20 hover:border-white/40">
                            Upptäck mer
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Stats Preview -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-yellow-400">16</div>
                            <div class="text-sm text-emerald-200">Lag</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-yellow-400">150+</div>
                            <div class="text-sm text-emerald-200">Spelare</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-yellow-400">500+</div>
                            <div class="text-sm text-emerald-200">Besökare</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Visual Element -->
                <div class="lg:col-span-5 flex justify-center lg:justify-end">
                    <div class="relative">
                        <!-- Video Container -->
                        <div class="relative w-80 h-80 lg:w-96 lg:h-96">

                            <!-- Decorative rotating border -->
                            <div class="absolute inset-0 rounded-3xl border-4 border-dashed border-yellow-400/20 animate-spin-slow"></div>

                            <!-- Main video container -->
                            <div class="absolute inset-4 bg-gradient-to-br from-emerald-900/90 to-teal-900/90 backdrop-blur-sm rounded-2xl border border-emerald-400/20 overflow-hidden shadow-2xl">

                                <!-- TikTok Video Link -->
                                <a href="https://www.tiktok.com/@ihsan_aktivitetscenter/video/7568546705415720214"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="relative w-full h-full group block">

                                    <!-- Video Thumbnail/Placeholder -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-800 to-emerald-900 flex items-center justify-center">
                                        <div class="text-center">
                                            <!-- Play Button -->
                                            <div class="w-20 h-20 lg:w-24 lg:h-24 bg-gradient-to-r from-pink-500 via-red-500 to-purple-500 rounded-full flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform shadow-lg">
                                                <svg class="w-8 h-8 lg:w-10 lg:h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>

                                            <!-- Video Title -->
                                            <h4 class="text-white font-bold text-lg lg:text-xl mb-2">Islamic Cup 2025</h4>
                                            <p class="text-emerald-200 text-sm lg:text-base">Inbjudan till turneringen</p>

                                            <!-- Duration badge -->
                                            <div class="absolute bottom-4 right-4 bg-black/80 text-white text-xs px-2 py-1 rounded">
                                                TikTok
                                            </div>
                                        </div>

                                        <!-- TikTok Logo -->
                                        <div class="absolute top-4 left-4 flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-br from-cyan-400 via-pink-500 to-purple-500 rounded-sm flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                                </svg>
                                            </div>
                                            <span class="text-white text-xs font-medium">TikTok</span>
                                        </div>

                                        <!-- Islamic Cup Branding -->
                                        <div class="absolute bottom-4 left-4 flex items-center space-x-2">
                                            <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-emerald-900" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z"/>
                                                </svg>
                                            </div>
                                            <span class="text-emerald-200 text-xs font-medium">Islamic Cup</span>
                                        </div>

                                        <!-- Hover overlay -->
                                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        <!-- Click to view text -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="bg-black/80 text-white px-4 py-2 rounded-lg text-sm font-medium">
                                                Klicka för att se på TikTok
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Floating decorative elements -->
                            <div class="absolute -top-4 -right-4 w-8 h-8 bg-pink-500/20 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                            <div class="absolute -bottom-6 -left-6 w-12 h-12 border-2 border-yellow-400/40 rounded-full animate-pulse"></div>
                            <div class="absolute top-1/2 -right-8 w-6 h-6 bg-emerald-400/30 rotate-45 animate-float"></div>

                            <!-- Orbiting elements -->
                            <div class="absolute inset-0 animate-spin-reverse pointer-events-none">
                                <div class="absolute top-12 left-1/2 w-3 h-3 bg-pink-400/60 rounded-full transform -translate-x-1/2"></div>
                                <div class="absolute bottom-12 left-1/2 w-2 h-2 bg-yellow-400/60 rounded-full transform -translate-x-1/2"></div>
                                <div class="absolute left-12 top-1/2 w-2 h-2 bg-emerald-400/60 rounded-full transform -translate-y-1/2"></div>
                                <div class="absolute right-12 top-1/2 w-3 h-3 bg-purple-400/40 rounded-full transform -translate-y-1/2"></div>
                            </div>
                        </div>

                        <!-- Video Stats/Info -->
                        <div class="absolute -bottom-8 left-4 right-4 bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20">
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center space-x-4 text-emerald-200">
                    <span class="flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                        <span>Se på TikTok</span>
                    </span>
                                </div>
                                <div class="text-emerald-300 text-xs">
                                    @ihsan_aktivitetscenter
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator - Nu korrekt placerad -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30">
            <div class="flex flex-col items-center animate-bounce">
                <span class="text-white/70 text-sm mb-2 hidden sm:block">Scrolla ner</span>
                <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                </div>
                <svg class="w-4 h-4 text-white/50 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Live Resultat & Tabellställning Section -->
    @livewire('public.home-feed')

    <!-- Om Oss Section -->
    <section id="om" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 opacity-5">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="mosque-pattern" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
                        <path d="M40 10 L50 25 L30 25 Z M20 30 L60 30 L60 60 L20 60 Z M35 35 L45 35 L45 55 L35 55 Z"
                              fill="currentColor" class="text-emerald-600"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#mosque-pattern)"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

            <!-- Header med personlig touch -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center space-x-3 mb-6">
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                </div>

                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    <span class="block text-2xl md:text-3xl text-emerald-600 font-normal mb-2">Vår berättelse</span>
                    Mer än bara
                    <span class="relative inline-block">
                    <span class="text-yellow-500">fotboll</span>
                    <svg class="absolute -bottom-2 left-0 w-full h-3 text-yellow-400/30" viewBox="0 0 100 10">
                        <path d="M0 8 Q25 2 50 6 T100 4" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                </span>
                </h2>

                <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Vi byggde något vackert tillsammans - en plats där
                    <span class="text-emerald-600 font-semibold">tro</span>,
                    <span class="text-emerald-600 font-semibold">glädje</span> och
                    <span class="text-emerald-600 font-semibold">gemenskap</span> möts
                </p>
            </div>

            <!-- Main Story Layout -->
            <div class="grid lg:grid-cols-12 gap-12 items-center mb-20">

                <!-- Vänster kolumn - Vår berättelse -->
                <div class="lg:col-span-7 space-y-8">

                    <!-- Hur det började -->
                    <div class="relative">
                        <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-emerald-600 to-yellow-400 rounded-full"></div>
                        <div class="pl-8">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Hur allt började</h3>
                            </div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                2016 hade vi en <span class="text-emerald-600 font-semibold">dröm</span> - att samla våra bröder och systrar från olika moskéer.
                                Inte bara för att tävla, utan för att <span class="text-yellow-600 font-semibold">lära känna varandra</span>,
                                skratta tillsammans och stärka våra band som en ummah.
                            </p>
                        </div>
                    </div>

                    <!-- Vad vi upptäckte -->
                    <div class="relative">
                        <div class="pl-8">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Vad vi upptäckte</h3>
                            </div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Varje år växer vi inte bara i antal, utan i <span class="text-emerald-600 font-semibold">kärlek</span>.
                                Barn som kommer första gången hittar sina <span class="text-yellow-600 font-semibold">bästa vänner</span>.
                                Föräldrar upptäcker att vi alla delar samma <span class="text-emerald-600 font-semibold">värderingar</span>
                                och <span class="text-yellow-600 font-semibold">drömmar</span> för våra familjer.
                            </p>
                        </div>
                    </div>

                    <!-- Vår vision framåt -->
                    <div class="relative">
                        <div class="pl-8">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">Vår vision framåt</h3>
                            </div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Islamic Cup är idag <span class="text-emerald-600 font-semibold">mer än ett evenemang</span> -
                                det är en <span class="text-yellow-600 font-semibold">familj</span> som återförenas varje år.
                                En plats där <span class="text-emerald-600 font-semibold">islamiska värderingar</span> lever i varje leende,
                                varje kramar efter matchen, varje dua vi delar.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Höger kolumn - Visuell representation -->
                <div class="lg:col-span-5">
                    <div class="relative">

                        <!-- Huvudcirkel med hjärta -->
                        <div class="relative w-80 h-80 mx-auto">

                            <!-- Bakgrundscirkel -->
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-100 via-yellow-50 to-emerald-100 rounded-full"></div>

                            <!-- Inre cirkel -->
                            <div class="absolute inset-8 bg-white rounded-full shadow-lg border-4 border-emerald-200/50 flex items-center justify-center">

                                <!-- Hjärta i mitten -->
                                <div class="text-center">
                                    <svg class="w-20 h-20 text-emerald-600 mx-auto mb-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M21.02 12.06c-.34 6.4-5.9 7.94-9.02 7.94s-8.68-1.54-9.02-7.94c-.28-5.26 3.04-9.06 7.68-9.06 2.44 0 4.16.96 5.34 2.5 1.18-1.54 2.9-2.5 5.34-2.5 4.64 0 7.96 3.8 7.68 9.06z"/>
                                        <circle cx="12" cy="12" r="1.5" fill="white"/>
                                    </svg>
                                    <p class="text-emerald-600 font-bold text-lg">Vårt hjärta</p>
                                    <p class="text-gray-600 text-sm">Gemenskap genom tro</p>
                                </div>
                            </div>

                            <!-- Orbiterande element med islamiska symboler -->
                            <div class="absolute inset-0 animate-spin-very-slow">
                                <!-- Moské -->
                                <div class="absolute top-4 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2L14 8L12 6L10 8L12 2ZM6 10H18V20H14V16H10V20H6V10ZM8 12V14H10V12H8ZM14 12V14H16V12H14Z"/>
                                    </svg>
                                </div>

                                <!-- Fotboll -->
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                </div>

                                <!-- Bok -->
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4z"/>
                                    </svg>
                                </div>

                                <!-- Familj -->
                                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.5 8H17c-.8 0-1.5.7-1.5 1.5v9c0 .8.7 1.5 1.5 1.5s1.5-.7 1.5-1.5V15h1v7h4zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zm1.5 1h-2C10.67 12.5 10 13.17 10 14v8h1.5v7h2v-7H15v-8c0-.83-.67-1.5-1.5-1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9.5C9 8.67 8.33 8 7.5 8S6 8.67 6 9.5V22h3z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Pulsande cirklar som indikerar gemenskap -->
                            <div class="absolute inset-0 rounded-full border-2 border-emerald-300/30 animate-ping"></div>
                            <div class="absolute inset-4 rounded-full border-2 border-yellow-300/30 animate-ping" style="animation-delay: 0.5s;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Turnering Section -->

    <!-- Turnering Section -->
    <section id="turnering" class="py-20 bg-gradient-to-br from-emerald-900 via-emerald-800 to-emerald-700 text-white relative overflow-hidden">

        <!-- Subtle Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="soccer-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="30" cy="30" r="20" fill="none" stroke="currentColor" stroke-width="1"/>
                        <path d="M30 15 L35 25 L25 25 Z" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#soccer-pattern)" class="text-yellow-400"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <!-- Decorative elements -->
                <div class="inline-flex items-center space-x-3 mb-6">
                    <div class="w-12 h-0.5 bg-yellow-400"></div>
                    <div class="w-3 h-3 bg-emerald-300 rounded-full"></div>
                    <div class="w-12 h-0.5 bg-yellow-400"></div>
                </div>

                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                <span class="block text-2xl md:text-3xl text-emerald-200 font-normal mb-2">
                    Årets höjdpunkt
                </span>
                    Futsal
                    <span class="text-yellow-400 relative inline-block">
                    Turnering
                    <svg class="absolute -bottom-2 left-0 w-full h-4 text-yellow-400/40" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 15 Q50 8 100 12 T200 10" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </span>
                </h2>

                <p class="text-xl md:text-2xl text-emerald-100/90 max-w-4xl mx-auto leading-relaxed">
                    En spännande tävling mellan lag från olika
                    <span class="text-yellow-400 font-semibold">masajid</span> och
                    <span class="text-yellow-400 font-semibold">föreningar</span>
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Vänster kolumn - Info -->
                <div class="order-2 lg:order-1">
                    <div class="inline-flex items-center space-x-2 bg-yellow-400/10 backdrop-blur-sm border border-yellow-400/20 rounded-full px-4 py-2 mb-8">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                        <span class="text-yellow-400 text-sm font-medium">Anmälan öppnar snart</span>
                    </div>

                    <h3 class="text-3xl lg:text-4xl font-bold mb-8 text-emerald-100">
                        Bli en del av <span class="text-yellow-400">familjen</span>
                    </h3>

                    <div class="space-y-8">
                        <div class="group flex items-start space-x-4 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                                <svg class="w-7 h-7 text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-2 text-emerald-100">Datum & Tid</h4>
                                <p class="text-emerald-200/80 leading-relaxed">
                                    <span class="text-yellow-400 font-semibold">24-25 december 2025</span>
                                    i Uddevalla - två dagars spänning och gemenskap
                                </p>
                            </div>
                        </div>

                        <div class="group flex items-start space-x-4 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                                <svg class="w-7 h-7 text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-2 text-emerald-100">Plats</h4>
                                <p class="text-emerald-200/80 leading-relaxed">
                                    <span class="text-yellow-400 font-semibold">Uddevalla</span>
                                    - Modern futsal-arena med faciliteter för hela familjen
                                </p>
                            </div>
                        </div>

                        <div class="group flex items-start space-x-4 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                                <svg class="w-7 h-7 text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-2 text-emerald-100">Deltagare</h4>
                                <p class="text-emerald-200/80 leading-relaxed">
                                    <span class="text-yellow-400 font-semibold">16 lag</span> från olika föreningar med
                                    <span class="text-yellow-400 font-semibold">över 150 spelare</span>
                                </p>
                            </div>
                        </div>

                        <div class="group flex items-start space-x-4 p-4 rounded-xl hover:bg-white/5 transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                                <svg class="w-7 h-7 text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-2 text-emerald-100">Format</h4>
                                <p class="text-emerald-200/80 leading-relaxed">
                                    <span class="text-yellow-400 font-semibold">Gruppspel</span> (10 min) följt av
                                    <span class="text-yellow-400 font-semibold">slutspel</span> (15 min)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Höger kolumn - Bild -->
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                    <div class="relative">

                        <!-- Main Image Container -->
                        <div class="relative w-96 h-96 lg:w-[450px] lg:h-[450px]">

                            <!-- Rotating decorative border -->
                            <div class="absolute inset-0 rounded-3xl border-4 border-dashed border-yellow-400/30 animate-spin-slow"></div>

                            <!-- Image container with gradient frame -->
                            <div class="absolute inset-4 bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-2xl p-1 transform rotate-2 hover:rotate-0 transition-transform duration-500 shadow-2xl">
                                <div class="h-full bg-white rounded-xl overflow-hidden">
                                    <img
                                        src="https://images.unsplash.com/photo-1577223625816-7546f13df25d?w=500&h=500&fit=crop&crop=center"
                                        alt="Futsal spelare i aktion"
                                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-700"
                                        loading="lazy"
                                    >

                                    <!-- Overlay with Islamic Cup logo -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 via-transparent to-transparent flex items-end p-6">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-emerald-900" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-white font-bold">Islamic Cup</div>
                                                <div class="text-emerald-200 text-sm">2025</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating decorative elements -->
                            <div class="absolute -top-4 -right-4 w-8 h-8 bg-yellow-400/60 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                            <div class="absolute -bottom-6 -left-6 w-12 h-12 border-2 border-emerald-300/40 rounded-full animate-pulse"></div>
                            <div class="absolute top-1/2 -right-8 w-6 h-6 bg-emerald-400/40 rotate-45" style="animation: float 3s ease-in-out infinite;"></div>

                            <!-- Orbiting elements -->
                            <div class="absolute inset-0 animate-spin-reverse">
                                <div class="absolute top-12 left-1/2 w-3 h-3 bg-yellow-400/80 rounded-full transform -translate-x-1/2"></div>
                                <div class="absolute bottom-12 left-1/2 w-2 h-2 bg-emerald-400/80 rounded-full transform -translate-x-1/2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom stats bar -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 group-hover:scale-110 transition-transform">16</div>
                    <div class="text-emerald-200 mt-2">Anmälda lag</div>
                </div>
                <div class="group">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 group-hover:scale-110 transition-transform">150+</div>
                    <div class="text-emerald-200 mt-2">Aktiva spelare</div>
                </div>
                <div class="group">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 group-hover:scale-110 transition-transform">500+</div>
                    <div class="text-emerald-200 mt-2">Besökare</div>
                </div>
                <div class="group">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 group-hover:scale-110 transition-transform">∞</div>
                    <div class="text-emerald-200 mt-2">Minnen</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Aktiviteter Section -->
    <section id="aktiviteter" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <!-- Subtle background pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="activity-pattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                        <circle cx="50" cy="25" r="8" fill="currentColor"/>
                        <circle cx="25" cy="75" r="6" fill="currentColor"/>
                        <circle cx="75" cy="75" r="7" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#activity-pattern)" class="text-emerald-600"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-20">
                <!-- Decorative elements -->
                <div class="inline-flex items-center space-x-3 mb-6">
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                </div>

                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                <span class="block text-2xl md:text-3xl text-emerald-600 font-normal mb-2">
                    För hela familjen
                </span>
                    Familje<span class="text-emerald-600 relative inline-block">
                    aktiviteter
                    <svg class="absolute -bottom-2 left-0 w-full h-4 text-emerald-600/40" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12 Q50 6 100 10 T200 8" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </span>
                </h2>

                <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Något för alla i familjen - från <span class="text-emerald-600 font-semibold">barn</span> till <span class="text-emerald-600 font-semibold">vuxna</span>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Activity 1 - Familjeaktiviteter -->
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="https://isc-uddevalla.se/wp-content/uploads/2025/11/2150456199.jpg"
                            alt="Familjer som samlas och umgås tillsammans"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                        >
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/60 via-transparent to-transparent"></div>

                        <!-- Category badge -->
                        <div class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                            Familjeaktiviteter
                        </div>

                        <!-- Decorative icon overlay -->
                        <div class="absolute bottom-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">Aktiviteter för familjen</h3>
                        <p class="text-gray-600 leading-relaxed">Roliga aktiviteter och gemenskap för hela familjen att njuta av tillsammans</p>
                    </div>
                </div>

                <!-- Activity 2 - Barnaktiviteter -->
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="https://isc-uddevalla.se/wp-content/uploads/2025/11/504.jpg"
                            alt="Barn som leker och har roligt med aktiviteter"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                        >
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-yellow-600/60 via-transparent to-transparent"></div>

                        <!-- Category badge -->
                        <div class="absolute top-4 left-4 bg-yellow-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                            Barnaktiviteter
                        </div>

                        <!-- Decorative icon overlay -->
                        <div class="absolute bottom-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition-colors">Roliga Barnaktiviteter</h3>
                        <p class="text-gray-600 leading-relaxed">Lekar, tävlingar och kreativa aktiviteter som får de yngsta att skratta och lära</p>
                    </div>
                </div>

                <!-- Activity 3 - Mat & Catering -->
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400&h=300&fit=crop&crop=center"
                            alt="Vackert upplagd halalmat och måltider"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                        >
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-800/60 via-transparent to-transparent"></div>

                        <!-- Category badge -->
                        <div class="absolute top-4 left-4 bg-emerald-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                            Mat & Catering
                        </div>

                        <!-- Decorative icon overlay -->
                        <div class="absolute bottom-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">Halalmat & Förfriskningar</h3>
                        <p class="text-gray-600 leading-relaxed">Utsökt halalmat och läskande drycker för alla deltagare och familjer</p>
                    </div>
                </div>

                <!-- Activity 4 - Föreläsningar -->
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="https://isc-uddevalla.se/wp-content/uploads/2025/06/approved-quran-pictures-ozjai2fivjmwyaru.jpg"
                            alt="Islamisk föreläsning och kunskap"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                        >
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-yellow-700/60 via-transparent to-transparent"></div>

                        <!-- Category badge -->
                        <div class="absolute top-4 left-4 bg-yellow-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                            Föreläsningar
                        </div>

                        <!-- Decorative icon overlay -->
                        <div class="absolute bottom-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition-colors">Inspirerande Föreläsningar</h3>
                        <p class="text-gray-600 leading-relaxed">Kunniga föreläsare delar värdefull kunskap om Islam, familjeliv och samhälle</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Senaste Nyheter Section -->
    @livewire('public.news-feed')

    <!-- Statistik Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-800 to-emerald-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold text-yellow-400 mb-2">9+</div>
                    <div class="text-xl text-emerald-100">År av tradition</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-yellow-400 mb-2">16</div>
                    <div class="text-xl text-emerald-100">Deltagande lag</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-yellow-400 mb-2">150+</div>
                    <div class="text-xl text-emerald-100">Aktiva spelare</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-yellow-400 mb-2">500+</div>
                    <div class="text-xl text-emerald-100">Besökare</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Sponsorer Section -->
    <section id="sponsorer" class="py-20 bg-gradient-to-br from-gray-50 via-white to-emerald-50/30 relative overflow-hidden">
        <!-- Decorative background pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="sponsor-pattern" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                        <circle cx="60" cy="30" r="12" fill="currentColor"/>
                        <rect x="45" y="75" width="30" height="30" rx="6" fill="currentColor"/>
                        <path d="M30 90 L90 90" stroke="currentColor" stroke-width="2"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#sponsor-pattern)" class="text-emerald-600"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- Header -->
            <div class="text-center mb-16">
                <!-- Decorative elements -->
                <div class="inline-flex items-center space-x-3 mb-6">
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                    <div class="w-12 h-0.5 bg-emerald-600"></div>
                </div>

                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                <span class="block text-2xl md:text-3xl text-emerald-600 font-normal mb-2">
                    Tack för ert stöd
                </span>
                    Våra <span class="text-emerald-600 relative inline-block">
                    Sponsorer
                    <svg class="absolute -bottom-2 left-0 w-full h-4 text-emerald-600/40" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12 Q50 6 100 10 T200 8" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </span>
                </h2>

                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Islamic Cup möjliggörs tack vare generöst stöd från våra fantastiska sponsorer
                </p>
            </div>

            <!-- Huvudsponsorer -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Huvudsponsorer</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Sponsor 1 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-32">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Islamic Cup"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Sponsor 2 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-32">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Sponsor 2"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Sponsor 3 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-32">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Sponsor 3"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                        </div>
                    </a>
                </div>
            </div>

            <!-- Partnersponsorer -->
            <div class="mb-16">
                <h3 class="text-xl font-bold text-gray-900 text-center mb-8">Partners</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    <!-- Partner 1 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 1"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Partner 2 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 2"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Partner 3 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 3"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Partner 4 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 4"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Partner 5 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 5"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>

                    <!-- Partner 6 -->
                    <a href="https://isc-uddevalla.se" target="_blank" rel="noopener noreferrer"
                       class="group bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                        <div class="flex items-center justify-center h-20">
                            <img src="https://isc-uddevalla.se/wp-content/uploads/2025/11/logo-islamic-cup-transparent.png"
                                 alt="Partner 6"
                                 class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('styles')
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spin-reverse {
            from {
                transform: rotate(360deg);
            }
            to {
                transform: rotate(0deg);
            }
        }

        @keyframes spin-very-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(45deg);
            }
            50% {
                transform: translateY(-10px) rotate(45deg);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        .animate-spin-reverse {
            animation: spin-reverse 15s linear infinite;
        }

        .animate-spin-very-slow {
            animation: spin-very-slow 30s linear infinite;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Responsive text scaling */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 2.5rem;
                line-height: 1.1;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function playVideo(element) {
            const thumbnail = element.querySelector('.absolute.inset-0.bg-gradient-to-br');
            const iframe = element.querySelector('iframe');

            // Fade out thumbnail
            thumbnail.style.transition = 'opacity 0.3s ease-out';
            thumbnail.style.opacity = '0';

            setTimeout(() => {
                // Hide thumbnail and show video
                thumbnail.style.display = 'none';
                iframe.classList.remove('hidden');
                iframe.classList.add('animate-fade-in');
            }, 300);
        }

        // Table Modal Functions
        function openTableModal() {
            const modal = document.getElementById('tableModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';

            // Add fade in animation
            setTimeout(() => {
                modal.querySelector('div').style.transform = 'scale(1)';
                modal.querySelector('div').style.opacity = '1';
            }, 10);
        }

        function closeTableModal() {
            const modal = document.getElementById('tableModal');
            modal.querySelector('div').style.transform = 'scale(0.95)';
            modal.querySelector('div').style.opacity = '0';

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }, 200);
        }

        // Close modal on outside click
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('tableModal');
            if (e.target === modal) {
                closeTableModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeTableModal();
            }
        });
    </script>
@endpush
