
@extends('layouts.app')

@section('title', 'Islamic Cup 2025 - Schema & Information | Uddevalla')
@section('description', 'Komplett schema och information för Islamic Cup 2025 i Uddevalla. Se alla matcher, tider och aktiviteter för turneringen 24-25 december.')

@section('content')
    <!-- Islamic geometric pattern background -->
    <div class="fixed inset-0 opacity-[0.03] pointer-events-none z-0">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="islamic-pattern" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
                    <circle cx="40" cy="40" r="20" fill="none" stroke="currentColor" stroke-width="1"/>
                    <circle cx="40" cy="40" r="12" fill="none" stroke="currentColor" stroke-width="1"/>
                    <path d="M40 20L50 40L40 60L30 40Z" fill="currentColor" opacity="0.3"/>
                    <path d="M20 40L40 50L60 40L40 30Z" fill="currentColor" opacity="0.3"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#islamic-pattern)" class="text-emerald-600"/>
        </svg>
    </div>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-br from-emerald-50 via-white to-yellow-50 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-20 right-10 w-64 h-64 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Icon -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-3xl shadow-xl mb-8 transform hover:rotate-6 transition-transform">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                Islamic Cup <span class="bg-gradient-to-r from-emerald-600 to-emerald-700 bg-clip-text text-transparent">2025</span>
            </h1>
            <p class="text-2xl md:text-3xl font-semibold text-emerald-600 mb-8">Schema & Information</p>

            <div class="max-w-3xl mx-auto">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">
                    Välkommen till årets mest efterlängtade evenemang – Islamic Cup 2025 i Uddevalla!
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Här hittar du hela turneringsschemat, aktiviteterna och alla tider för helgens matcher och evenemang.
                    Kom och upplev gemenskap, glädje och sport i en inspirerande miljö.
                </p>
            </div>

            <!-- Quick Stats -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">2</div>
                    <div class="text-sm text-gray-600 font-medium">Dagar</div>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">16</div>
                    <div class="text-sm text-gray-600 font-medium">Lag</div>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">30+</div>
                    <div class="text-sm text-gray-600 font-medium">Matcher</div>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">24-25</div>
                    <div class="text-sm text-gray-600 font-medium">December</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="relative py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Schema för Islamic Cup 2025
                </h2>
                <p class="mb-3 text-gray-600 text-xl">
                    Schemat är preliminärt och kan komma att ändras
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-yellow-400 mx-auto rounded-full"></div>
            </div>

            <!-- Day 1: Förberedelsedagen (23 december) -->
            <div class="mb-16">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 md:p-12 shadow-xl border border-gray-200">
                    <!-- Date Badge -->
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-gray-600 to-gray-700 text-white rounded-2xl px-6 py-3 shadow-lg">
                                <div class="text-sm font-semibold">Dag 1</div>
                                <div class="text-2xl font-bold">23 Dec</div>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900">Förberedelsedagen</h3>
                                <p class="text-gray-600 mt-1">Setup och logistik</p>
                            </div>
                        </div>
                    </div>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Arrangörer och volontärer anländer dagen innan turneringen för att förbereda allt på plats.
                        </p>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-200 mb-6">
                            <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Förberedelser inkluderar:
                            </h4>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-emerald-500 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    <span>Ställa i ordning teknik och ljud</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-emerald-500 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    <span>Inreda salen, hänga upp sponsorvägg och affischer</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-emerald-500 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                    <span>Förbereda pressrum, läkarbord och annan logistik</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl p-6">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-emerald-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-emerald-900 mb-1">Tips för lagen</p>
                                    <p class="text-emerald-800">Lag som anländer redan på kvällen undviker stress och är utvilade inför turneringen!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 2: Turneringsdagen (24 december) -->
            <div class="mb-16">
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-3xl p-8 md:p-12 shadow-xl border border-emerald-200">
                    <!-- Date Badge -->
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-2xl px-6 py-3 shadow-lg">
                                <div class="text-sm font-semibold">Dag 2</div>
                                <div class="text-2xl font-bold">24 Dec</div>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900">Turneringsdagen</h3>
                                <p class="text-emerald-700 mt-1 font-semibold">Första dagen - Gruppspel</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="space-y-6">
                        <!-- Morning Activities -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">Efter Fajr</h4>
                                        <span class="text-sm font-semibold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">Påminnelse</span>
                                    </div>
                                    <p class="text-gray-700">Påminnelse med Ahmad Siddiq</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">08:00 – 09:00</h4>
                                        <span class="text-sm font-semibold text-yellow-600 bg-yellow-100 px-3 py-1 rounded-full">Frukost</span>
                                    </div>
                                    <p class="text-gray-700">Lagen anländer & frukost</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">09:00 – 10:00</h4>
                                        <span class="text-sm font-semibold text-pink-600 bg-pink-100 px-3 py-1 rounded-full">Fotografering</span>
                                    </div>
                                    <p class="text-gray-700">Fotografering av lag och volontärer</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">10:00 – 11:00</h4>
                                        <span class="text-sm font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Öppning</span>
                                    </div>
                                    <p class="text-gray-700">Öppningstal & genomgång av regler</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tournament Start -->
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-bold mb-1">11:00 – Turneringen startar!</h4>
                                    <p class="text-emerald-100">Låt spelen börja</p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 1 -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">1</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 1</h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">11:00 – 11:10</span>
                                    <span class="text-emerald-600 font-semibold">A1 – A2</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">11:20 – 11:30</span>
                                    <span class="text-emerald-600 font-semibold">B1 – B2</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">11:40 – 11:50</span>
                                    <span class="text-emerald-600 font-semibold">C1 – C2</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">12:00 – 12:10</span>
                                    <span class="text-emerald-600 font-semibold">D1 – D2</span>
                                </div>
                            </div>
                        </div>

                        <!-- Prayer Break -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">12:20 – 12:40</h4>
                                    <p class="text-purple-100">Salat Al Duhur & Al Aser</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kids Match -->
                        <div class="bg-gradient-to-r from-orange-400 to-orange-500 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">12:40 – 13:00</h4>
                                    <p class="text-orange-100">Barnmatch med pris till vinnarna</p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 2 -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">2</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 2</h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">13:00 – 13:10</span>
                                    <span class="text-emerald-600 font-semibold">A3 – A4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">13:20 – 13:30</span>
                                    <span class="text-emerald-600 font-semibold">B3 – B4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">13:40 – 13:50</span>
                                    <span class="text-emerald-600 font-semibold">C3 – C4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">14:00 – 14:10</span>
                                    <span class="text-emerald-600 font-semibold">D3 – D4</span>
                                </div>
                            </div>
                        </div>

                        <!-- Lunch -->
                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-2xl p-6 shadow-lg text-gray-900">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/30 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">13:00 – 14:15</h4>
                                    <p class="text-gray-800">Första matbeställning</p>
                                </div>
                            </div>
                        </div>

                        <!-- Business Presentation -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-200">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">14:15 – 14:30</h4>
                                    <p class="text-gray-700">Företagspresentation <span class="text-sm text-gray-500">(valfritt)</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 3 -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">3</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 3</h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">14:30 – 14:40</span>
                                    <span class="text-emerald-600 font-semibold">A1 – A3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">14:50 – 15:00</span>
                                    <span class="text-emerald-600 font-semibold">B1 – B3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">15:10 – 15:20</span>
                                    <span class="text-emerald-600 font-semibold">C1 – C3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">15:30 – 15:40</span>
                                    <span class="text-emerald-600 font-semibold">D1 – D3</span>
                                </div>
                            </div>
                        </div>

                        <!-- Maghrib Prayer -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">15:40 – 16:00</h4>
                                    <p class="text-purple-100">Maghrib</p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 4, 5, 6 - Condensed for space -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">4</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 4</h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">16:00 – 16:10</span>
                                    <span class="text-emerald-600 font-semibold">A2 – A4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">16:20 – 16:30</span>
                                    <span class="text-emerald-600 font-semibold">B2 – B4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">16:40 – 16:50</span>
                                    <span class="text-emerald-600 font-semibold">C2 – C4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">17:00 – 17:10</span>
                                    <span class="text-emerald-600 font-semibold">D2 – D4</span>
                                </div>
                            </div>
                        </div>

                        <!-- Gaza Talk -->
                        <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">17:10 – 17:20</h4>
                                    <p class="text-red-100">Tal om insamling för Gaza</p>
                                </div>
                            </div>
                        </div>

                        <!-- Business Presentation 2 -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-200">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">17:20 – 17:30</h4>
                                    <p class="text-gray-700">Företagspresentation</p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 5 -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">5</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 5</h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">17:30 – 17:40</span>
                                    <span class="text-emerald-600 font-semibold">A1 – A4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">17:50 – 18:00</span>
                                    <span class="text-emerald-600 font-semibold">B1 – B4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">18:10 – 18:20</span>
                                    <span class="text-emerald-600 font-semibold">C1 – C4</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">18:30 – 18:40</span>
                                    <span class="text-emerald-600 font-semibold">D1 – D4</span>
                                </div>
                            </div>
                        </div>

                        <!-- Kids Activity -->
                        <div class="bg-gradient-to-r from-orange-400 to-orange-500 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">18:40 – 19:00</h4>
                                    <p class="text-orange-100">Barnaktivitet</p>
                                </div>
                            </div>
                        </div>

                        <!-- Omgång 6 (Final Round) -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-emerald-200">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <span class="text-emerald-700 font-bold text-lg">6</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">Omgång 6 <span class="text-emerald-600">(Sista)</span></h4>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">19:00 – 19:10</span>
                                    <span class="text-emerald-600 font-semibold">A2 – A3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">19:20 – 19:30</span>
                                    <span class="text-emerald-600 font-semibold">B2 – B3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">19:40 – 19:50</span>
                                    <span class="text-emerald-600 font-semibold">C2 – C3</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-700 font-medium">20:00 – 20:10</span>
                                    <span class="text-emerald-600 font-semibold">D2 – D3</span>
                                </div>
                            </div>
                        </div>

                        <!-- Day End -->
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 shadow-lg text-white text-center">
                            <svg class="w-12 h-12 text-yellow-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <h4 class="text-xl font-bold mb-1">Första dagen avslutas</h4>
                            <p class="text-gray-300">Vila gott inför morgondagens slutspel</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 3: Second Tournament Day (25 december) -->
            <div class="mb-16">
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-3xl p-8 md:p-12 shadow-xl border border-yellow-200">
                    <!-- Date Badge -->
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-gray-900 rounded-2xl px-6 py-3 shadow-lg">
                                <div class="text-sm font-semibold">Dag 3</div>
                                <div class="text-2xl font-bold">25 Dec</div>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900">Andra turneringsdagen</h3>
                                <p class="text-yellow-700 mt-1 font-semibold">Slutspel & Final</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="space-y-6">
                        <!-- Morning -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-yellow-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">Efter Fajr</h4>
                                        <span class="text-sm font-semibold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">Påminnelse</span>
                                    </div>
                                    <p class="text-gray-700">Påminnelse med Ahmad Siddiq</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-yellow-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">08:00 – 09:00</h4>
                                        <span class="text-sm font-semibold text-yellow-600 bg-yellow-100 px-3 py-1 rounded-full">Frukost</span>
                                    </div>
                                    <p class="text-gray-700">Frukost</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md border border-yellow-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-lg font-bold text-gray-900">09:00 – 11:00</h4>
                                        <span class="text-sm font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Uppvärmning</span>
                                    </div>
                                    <p class="text-gray-700">Förberedelse & uppvärmning</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quarterfinals -->
                        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold">Kvartsfinaler</h4>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">11:00 – 11:15</span>
                                    <span class="font-semibold text-yellow-300">A1 vs B2</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">11:25 – 11:40</span>
                                    <span class="font-semibold text-yellow-300">C1 vs D2</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">11:50 – 12:05</span>
                                    <span class="font-semibold text-yellow-300">B1 vs A2</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">12:15 – 12:30</span>
                                    <span class="font-semibold text-yellow-300">D1 vs C2</span>
                                </div>
                            </div>
                        </div>

                        <!-- Prayer Break -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">12:30 – 12:55</h4>
                                    <p class="text-purple-100">Salat Al Duhr & Al Aser</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kids Competition -->
                        <div class="bg-gradient-to-r from-orange-400 to-orange-500 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">12:55 – 13:15</h4>
                                    <p class="text-orange-100">Barnens tävling</p>
                                </div>
                            </div>
                        </div>

                        <!-- Semifinals -->
                        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-2xl p-6 shadow-lg text-gray-900">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-white/30 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold">Semifinaler</h4>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-white/50 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">13:15 – 13:30</span>
                                    <span class="font-semibold">Vinnare QF1 vs QF2</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-white/50 backdrop-blur-sm rounded-lg">
                                    <span class="font-medium">14:05 – 14:20</span>
                                    <span class="font-semibold">Vinnare QF3 vs QF4</span>
                                </div>
                            </div>
                        </div>

                        <!-- Lunch -->
                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-2xl p-6 shadow-lg text-gray-900">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/30 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">13:00 – 14:15</h4>
                                    <p class="text-gray-800">Lunch</p>
                                </div>
                            </div>
                        </div>

                        <!-- Business Presentation -->
                        <div class="bg-white rounded-2xl p-6 shadow-md border border-yellow-200">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">13:30 – 14:00</h4>
                                    <p class="text-gray-700">Företagspresentation</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bronze Match -->
                        <div class="bg-gradient-to-r from-orange-600 to-orange-700 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-bold mb-1">14:30 – Bronsmatch</h4>
                                    <p class="text-orange-100">Kamp om tredjeplats</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kids Mini Final -->
                        <div class="bg-gradient-to-r from-pink-400 to-pink-500 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">14:45 – 15:00</h4>
                                    <p class="text-pink-100">Barnens mini-final</p>
                                </div>
                            </div>
                        </div>

                        <!-- THE FINAL -->
                        <div class="bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-3xl p-8 shadow-2xl text-gray-900 border-4 border-yellow-600">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/30 backdrop-blur-sm rounded-2xl mb-4 mx-auto">
                                    <svg class="w-12 h-12 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <h4 class="text-4xl font-bold mb-2">15:10 – 15:40</h4>
                                <p class="text-3xl font-bold mb-2">FINAL</p>
                                <p class="text-lg font-semibold text-gray-800">Två halvlekar (10+10 minuter)</p>
                            </div>
                        </div>

                        <!-- Maghrib Prayer -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 shadow-lg text-white">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold mb-1">15:40 – 16:05</h4>
                                    <p class="text-purple-100">Maghrib</p>
                                </div>
                            </div>
                        </div>

                        <!-- Award Ceremony -->
                        <div class="bg-gradient-to-br from-emerald-600 via-emerald-700 to-emerald-800 rounded-3xl p-8 shadow-2xl text-white">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <svg class="w-10 h-10 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-bold mb-1">16:00 – 16:30</h4>
                                    <p class="text-xl font-semibold text-emerald-100">Prisutdelning, fotografering och tacktal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="relative py-20 bg-gradient-to-br from-emerald-600 via-emerald-700 to-emerald-800 text-white overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="cta-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="30" cy="30" r="15" fill="none" stroke="white" stroke-width="1"/>
                        <path d="M30 15L35 30L30 45L25 30Z" fill="white" opacity="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#cta-pattern)"/>
            </svg>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Redo att delta?
            </h2>
            <p class="text-xl text-emerald-100 mb-10">
                Anmäl ditt lag nu och var en del av denna fantastiska upplevelse!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/') }}#turnering" class="inline-flex items-center justify-center px-8 py-4 bg-white text-emerald-700 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Anmäl ditt lag
                </a>
                <a href="mailto:info@islamiccup.se" class="inline-flex items-center justify-center px-8 py-4 bg-emerald-800/50 backdrop-blur-sm text-white border-2 border-white/30 rounded-2xl font-bold text-lg hover:bg-emerald-800/70 transition-all">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Kontakta oss
                </a>
            </div>
        </div>
    </section>
@endsection
