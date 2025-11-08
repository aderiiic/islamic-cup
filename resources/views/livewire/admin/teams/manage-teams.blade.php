<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-6 px-4 sm:px-6 lg:px-8" x-data>
    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-1">Hantera lag</h1>
                <p class="text-sm text-gray-600">Administrera alla lag i turneringen</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text"
                           class="pl-10 pr-4 py-2.5 w-full sm:w-64 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                           placeholder="Sök lag..."
                           wire:model.debounce.400ms="search">
                </div>
                <button
                    class="px-4 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-sm hover:shadow-md font-medium"
                    @click="$wire.resetForm()">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nytt lag
                    </span>
                </button>
            </div>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex items-start gap-3">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="text-emerald-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Main Grid -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Form Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $teamId ? 'Redigera lag' : 'Skapa nytt lag' }}</h2>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lagnamn *</label>
                            <input type="text"
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                   placeholder="Ex: Al-Nour FC"
                                   wire:model.defer="name">
                            @error('name') <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Organisation</label>
                            <input type="text"
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                   placeholder="Ex: Islamiska Föreningen"
                                   wire:model.defer="organization">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Beskrivning</label>
                            <textarea
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all resize-none"
                                rows="3"
                                placeholder="Beskriv laget..."
                                wire:model.defer="description"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Primär färg</label>
                                <input type="text"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                       placeholder="#00AA88"
                                       wire:model.defer="color_primary">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Sekundär färg</label>
                                <input type="text"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                       placeholder="#222222"
                                       wire:model.defer="color_secondary">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lagägare</label>
                            <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" wire:model.defer="owner_id">
                                <option value="">— Ingen ägare —</option>
                                @foreach($owners as $o)
                                    <option value="{{ $o->id }}">{{ $o->name }} ({{ $o->email }})</option>
                                @endforeach
                            </select>
                            @error('owner_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Gruppnummer</label>
                                <input type="number"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                       min="1"
                                       max="99"
                                       placeholder="1-99"
                                       wire:model.defer="group_number">
                                @error('group_number') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" wire:model.defer="status">
                                    <option value="approved">✓ Godkänd</option>
                                    <option value="pending">⏳ Avvaktar</option>
                                    <option value="rejected">✗ Avslagen</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button
                                class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-medium"
                                @click="if(confirm('Rensa formuläret?')) { $wire.resetForm() }">
                                Rensa
                            </button>
                            <button
                                class="flex-1 px-4 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-sm hover:shadow-md font-medium"
                                @click="if(confirm('{{ $teamId ? 'Spara ändringar?' : 'Skapa nytt lag?' }}')) { $wire.save() }">
                                {{ $teamId ? 'Uppdatera' : 'Skapa lag' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teams List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Alla lag ({{ $teams->total() }})</h2>
                    </div>

                    <div class="space-y-3">
                        @forelse($teams as $t)
                            <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-xl p-4 hover:shadow-md transition-all duration-200">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                    <div class="flex items-start gap-4 flex-1 min-w-0">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-100 to-blue-100 flex items-center justify-center font-bold text-emerald-700">
                                            {{ strtoupper(substr($t->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                                <h3 class="font-bold text-gray-900">{{ $t->name }}</h3>
                                                @if($t->organization)
                                                    <span class="text-sm text-gray-500">({{ $t->organization }})</span>
                                                @endif
                                            </div>
                                            <div class="flex flex-wrap items-center gap-3 text-xs text-gray-600">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                                    </svg>
                                                    Grupp {{ $t->group_number ?? '-' }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    {{ optional($t->owner)->name ?? 'Ingen ägare' }}
                                                </span>
                                                <span class="px-2 py-0.5 rounded-full font-medium
                                                    @if($t->status === 'approved') bg-emerald-100 text-emerald-700
                                                    @elseif($t->status === 'pending') bg-amber-100 text-amber-700
                                                    @else bg-red-100 text-red-700
                                                    @endif">
                                                    {{ ucfirst($t->status ?? 'approved') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('players.index', $t) }}"
                                           class="px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 transition-all text-sm font-medium">
                                            Spelare
                                        </a>
                                        <button
                                            class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all text-sm font-medium"
                                            @click="$wire.edit({{ $t->id }})">
                                            Redigera
                                        </button>
                                        <button
                                            class="px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-all text-sm font-medium"
                                            @click.prevent="if(confirm('Är du säker på att du vill radera {{ $t->name }}? Detta kan inte ångras.')) { $wire.delete({{ $t->id }}) }">
                                            Radera
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Inga lag hittades</p>
                                <p class="text-gray-400 text-sm mt-1">Skapa ditt första lag för att komma igång</p>
                            </div>
                        @endforelse
                    </div>

                    @if($teams->hasPages())
                        <div class="mt-6 pt-6 border-t">
                            {{ $teams->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
