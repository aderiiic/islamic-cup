<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Spelare • {{ $team->name }}</h1>
            <p class="text-sm text-gray-500">{{ $team->organization }}</p>
        </div>
        <a href="{{ route('teams.index') }}" class="text-emerald-700 hover:text-emerald-800 font-semibold">Tillbaka till mina lag</a>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Form -->
        <div class="md:col-span-1">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h2 class="font-semibold mb-4">{{ $playerId ? 'Redigera spelare' : 'Lägg till spelare' }}</h2>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Namn *</label>
                        <input type="text" wire:model="name" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">E-post</label>
                        <input type="email" wire:model="email" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Telefon</label>
                        <input type="text" wire:model="phone" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tröjnummer *</label>
                            <input type="number" min="1" max="99" wire:model="jersey_number" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            @error('jersey_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Position *</label>
                            <select wire:model="position" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                                <option value="målvakt">Målvakt</option>
                                <option value="försvarare">Försvarare</option>
                                <option value="mittfältare">Mittfältare</option>
                                <option value="anfallare">Anfallare</option>
                            </select>
                            @error('position') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Födelsedatum</label>
                        <input type="date" wire:model="birth_date" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('birth_date') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" wire:model="is_captain" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-gray-700">Gör till lagkapten</span>
                    </label>

                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl px-4 py-3 transition">
                        {{ $playerId ? 'Spara ändringar' : 'Lägg till spelare' }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Lista -->
        <div class="md:col-span-2">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="font-semibold">Spelartrupp</div>
                    <input type="text" wire:model.debounce.400ms="search" placeholder="Sök spelare"
                           class="w-64 px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>

                <div class="divide-y">
                    @foreach($players as $p)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold text-white"
                                     style="background: {{ $team->color_primary ?? '#10b981' }}">
                                    {{ $p->jersey_number }}
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">
                                        {{ $p->name }}
                                        @if($p->is_captain)
                                            <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-yellow-100 text-yellow-700">Kapten</span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ ucfirst($p->position) }}
                                        @if($p->email) • {{ $p->email }} @endif
                                        @if($p->phone) • {{ $p->phone }} @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                @unless($p->is_captain)
                                    <button wire:click="setCaptain({{ $p->id }})"
                                            class="px-3 py-2 rounded-lg border border-yellow-200 text-yellow-700 hover:bg-yellow-50 transition">Gör kapten</button>
                                @endunless
                                <button wire:click="edit({{ $p->id }})"
                                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition">Redigera</button>
                                <button wire:click="delete({{ $p->id }})"
                                        class="px-3 py-2 rounded-lg border border-red-200 text-red-700 hover:bg-red-50 transition">Ta bort</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $players->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
