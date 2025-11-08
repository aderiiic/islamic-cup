<div>
    {{-- resources/views/livewire/auth/login-form.blade.php --}}
    <div class="min-h-screen bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 relative overflow-hidden">
        <!-- dekor -->
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-yellow-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <!-- Intro (vänster) -->
                <div class="hidden lg:block">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 text-white">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-xl">
                                <svg class="w-8 h-8 text-white" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20" r="16" stroke="currentColor" stroke-width="2"/>
                                    <path d="M20 8L23.09 16.18L32 17.27L26 23.14L27.18 32L20 28.18L12.82 32L14 23.14L8 17.27L16.91 16.18L20 8Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">Islamic Cup 2025</h1>
                                <p class="text-emerald-200">Förena muslimer genom idrott</p>
                            </div>
                        </div>

                        <ul class="space-y-4 text-emerald-100">
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Hantera lag, spelare och matcher</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Livepoäng och händelser i realtid</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Påminnelser innan matchstart</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Form (höger) -->
                <div>
                    <div class="bg-white rounded-3xl shadow-2xl border border-emerald-100/60 overflow-hidden">
                        <!-- Header -->
                        <div class="relative p-8 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white">
                            <div class="absolute inset-0 opacity-20">
                                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <pattern id="login-pattern" x="0" y="0" width="140" height="140" patternUnits="userSpaceOnUse">
                                            <circle cx="70" cy="70" r="50" fill="none" stroke="currentColor" stroke-width="1"/>
                                            <path d="M70 35 L78 55 H62 Z" fill="currentColor"/>
                                        </pattern>
                                    </defs>
                                    <rect width="100%" height="100%" fill="url(#login-pattern)" class="text-white"></rect>
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <h2 class="text-2xl font-bold">Logga in</h2>
                                <p class="text-emerald-100">Välkommen tillbaka</p>
                            </div>
                        </div>

                        <!-- Form -->
                        <div class="p-8">
                            <form wire:submit="login" class="space-y-6">
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">E-post</label>
                                    <input type="email"
                                           id="email"
                                           wire:model="email"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('email') border-red-500 @enderror"
                                           placeholder="din@email.com">
                                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Lösenord</label>
                                    <input type="password"
                                           id="password"
                                           wire:model="password"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('password') border-red-500 @enderror"
                                           placeholder="••••••••">
                                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="flex items-center justify-between">
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="remember" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                        <span class="ml-2 text-sm text-gray-600">Kom ihåg mig</span>
                                    </label>
                                    <a href="#" class="text-sm text-emerald-600 hover:text-emerald-700">Glömt lösenord?</a>
                                </div>

                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                    <span wire:loading.remove>Logga in</span>
                                    <span wire:loading>Loggar in...</span>
                                </button>
                            </form>

                            <div class="mt-6 text-center">
                                <span class="text-gray-600">Har du inget konto? Synd...</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center text-emerald-100 text-sm">
                        Behöver du hjälp? Synd...
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
