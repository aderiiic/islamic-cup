<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Matchkontroll</h1>
                    <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                        <span class="font-semibold">{{ $match->homeTeam->name }}</span>
                        <span class="text-gray-400">vs</span>
                        <span class="font-semibold">{{ $match->awayTeam->name }}</span>
                        <span class="text-gray-400">•</span>
                        <span>{{ optional($match->scheduled_at)->format('Y-m-d H:i') }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold uppercase">
                        {{ $match->status }}
                    </span>
                </div>
            </div>

            <!-- Match Controls -->
            <div class="mt-6 flex flex-wrap gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all duration-200 shadow-sm hover:shadow-md font-medium"
                    @click="if(confirm('Är du säker på att du vill starta matchen?')) { $wire.start() }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Starta match
                </button>

                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-amber-500 text-white rounded-xl hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md font-medium"
                    @click="if(confirm('Markera halvtid?')) { $wire.pause() }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Halvtid
                </button>

                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md font-medium"
                    @click="if(confirm('Återuppta matchen?')) { $wire.resume() }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Återuppta
                </button>

                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-200 shadow-sm hover:shadow-md font-medium"
                    @click="if(confirm('Är du säker på att du vill avsluta matchen?')) { $wire.finish() }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Avsluta match
                </button>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Event Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">
                            {{ $editingEventId ? 'Redigera händelse' : 'Ny händelse' }}
                        </h2>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Typ av händelse</label>
                            <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" wire:model="event_type">
                                <option value="goal">⚽ Mål</option>
                                <option value="assist">🎯 Assist</option>
                                <option value="yellow_card">🟨 Gult kort</option>
                                <option value="red_card">🟥 Rött kort</option>
                                <option value="send_off">❌ Utvisning</option>
                                <option value="motm">⭐ Matchens spelare</option>
                            </select>
                            @error('event_type') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Minut</label>
                            <input type="number"
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                   wire:model="minute"
                                   placeholder="{{ $match->current_minute ?? 0 }}">
                            @error('minute') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lag</label>
                            <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" wire:model="team_id">
                                @foreach($teams as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('team_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Spelare (valfritt)</label>
                            <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all" wire:model="player_id">
                                <option value="">-- Välj spelare --</option>
                                @foreach($players as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->team->name }})</option>
                                @endforeach
                            </select>
                            @error('player_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Beskrivning</label>
                            <textarea
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all resize-none"
                                wire:model="description"
                                rows="3"
                                placeholder="Valfritt..."></textarea>
                        </div>

                        <div class="flex gap-3 pt-4">
                            @if($editingEventId)
                                <button
                                    class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-medium"
                                    @click="if(confirm('Avbryta redigering?')) { $wire.resetForm() }">
                                    Avbryt
                                </button>
                                <button
                                    class="flex-1 px-4 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-sm hover:shadow-md font-medium"
                                    @click="if(confirm('Spara ändringar?')) { $wire.updateEvent() }">
                                    Uppdatera
                                </button>
                            @else
                                <button
                                    class="w-full px-4 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-sm hover:shadow-md font-medium"
                                    @click="$wire.addEvent()">
                                    Lägg till händelse
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6" wire:poll.3s>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Matchhändelser</h2>
                    </div>

                    <div class="space-y-3">
                        @forelse($match->events()->latest()->get() as $ev)
                            <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-xl p-4 hover:shadow-md transition-all duration-200">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                    <div class="flex items-start gap-3 flex-1">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center font-bold text-emerald-700">
                                            {{ $ev->minute }}'
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                                <span class="font-semibold text-gray-900 text-sm uppercase">
                                                    {{ str_replace('_',' ', $ev->event_type) }}
                                                </span>
                                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">
                                                    {{ $ev->team->name }}
                                                </span>
                                            </div>
                                            @if($ev->player)
                                                <p class="text-sm text-gray-700 font-medium">{{ $ev->player->name }}</p>
                                            @endif
                                            @if($ev->description)
                                                <p class="text-xs text-gray-500 mt-1">{{ $ev->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all text-sm font-medium"
                                            @click="$wire.editEvent({{ $ev->id }})">
                                            Redigera
                                        </button>
                                        <button
                                            class="px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-all text-sm font-medium"
                                            @click.prevent="if(confirm('Är du säker på att du vill radera denna händelse?')) { $wire.deleteEvent({{ $ev->id }}) }">
                                            Radera
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Inga händelser ännu</p>
                                <p class="text-gray-400 text-xs mt-1">Lägg till första händelsen ovan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
