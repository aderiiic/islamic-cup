<div>
    <div class="min-h-screen bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-yellow-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="hidden lg:block">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 text-white">
                        <h1 class="text-3xl font-bold mb-2">Skapa konto</h1>
                        <p class="text-emerald-200">Gå med i Islamic Cup</p>
                        <ul class="mt-6 space-y-3 text-emerald-100">
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Registrera lag och hantera spelare</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Få uppdateringar och notiser</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="mt-1 w-2 h-2 rounded-full bg-yellow-400"></span>
                                <span>Delta i turneringen 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="bg-white rounded-3xl shadow-2xl border border-emerald-100/60 overflow-hidden">
                        <div class="relative p-8 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white">
                            <div class="relative z-10">
                                <h2 class="text-2xl font-bold">Registrera</h2>
                                <p class="text-emerald-100">Skapa ditt konto</p>
                            </div>
                        </div>

                        <div class="p-8">
                            <form wire:submit="register" class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Namn</label>
                                    <input type="text" id="name" wire:model="name"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('name') border-red-500 @enderror"
                                           placeholder="Ditt namn">
                                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">E-post</label>
                                    <input type="email" id="email" wire:model="email"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('email') border-red-500 @enderror"
                                           placeholder="din@email.com">
                                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="organization" class="block text-sm font-semibold text-gray-700 mb-2">Moské/Förening</label>
                                    <input type="text" id="organization" wire:model="organization"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('organization') border-red-500 @enderror"
                                           placeholder="Din organisation">
                                    @error('organization') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Telefon (valfritt)</label>
                                    <input type="text" id="phone" wire:model="phone"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('phone') border-red-500 @enderror"
                                           placeholder="+46 ...">
                                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Lösenord</label>
                                        <input type="password" id="password" wire:model="password"
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all @error('password') border-red-500 @enderror"
                                               placeholder="••••••••">
                                        @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Bekräfta lösenord</label>
                                        <input type="password" id="password_confirmation" wire:model="password_confirmation"
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                               placeholder="••••••••">
                                    </div>
                                </div>

                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                    <span wire:loading.remove>Skapa konto</span>
                                    <span wire:loading>Skapar konto...</span>
                                </button>
                            </form>

                            <div class="mt-6 text-center">
                                <span class="text-gray-600">Har du redan ett konto?</span>
                                <a href="{{ route('login') }}" class="ml-2 text-emerald-600 hover:text-emerald-700 font-semibold">Logga in</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center text-emerald-100 text-sm">
                        Frågor? Kontakta oss på info@islamiccup.se
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
