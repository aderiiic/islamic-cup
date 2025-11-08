
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-6 px-4 sm:px-6 lg:px-8" x-data>
    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-1">Grupper & Schema</h1>
                <p class="text-sm text-gray-600">Hantera gruppindelning och matchschema</p>
            </div>
            <span class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold uppercase">
                Admin/Moderator
            </span>
        </div>

        <!-- Success/Error Messages -->
        @if (session()->has('success'))
            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex items-start gap-3">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="text-emerald-800 font-medium">{{ session('success') }}</p>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 flex items-start gap-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <p class="text-red-800 font-medium">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Main Grid -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Control Panel -->
            <div class="lg:col-span-1">
                <div class="space-y-6">
                    <!-- Auto Assign Groups -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Automatisk gruppindelning</h3>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Fördelar automatiskt alla lag i grupp 1-4</p>
                        <button
                            class="w-full px-4 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all shadow-sm hover:shadow-md font-medium flex items-center justify-center gap-2"
                            @click="if(confirm('Tilldela alla lag i grupper 1-4? Befintliga grupper skrivs över.')) { $wire.autoAssignGroups() }">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Tilldela grupper
                        </button>
                    </div>

                    <!-- Generate Schedule -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Generera schema</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Startdatum</label>
                                <input type="date"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                       wire:model.live="scheduled_date">
                                @error('scheduled_date') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Starttid</label>
                                    <input type="time"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                           wire:model.live="default_time">
                                    @error('default_time') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Matchlängd (min)</label>
                                    <input type="number"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                           min="20"
                                           max="120"
                                           step="5"
                                           wire:model.live="duration">
                                    @error('duration') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Plan/Plats</label>
                                <input type="text"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                       placeholder="Plan A"
                                       wire:model.live="venue">
                                @error('venue') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <button
                            class="mt-4 w-full px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all shadow-sm hover:shadow-md font-medium flex items-center justify-center gap-2"
                            @click="if(confirm('Generera gruppmatcher för alla grupper? Detta skapar automatiskt alla matchkombinationer.')) { $wire.generateGroupSchedule() }"
                            wire:loading.attr="disabled"
                            wire:target="generateGroupSchedule">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span wire:loading.remove wire:target="generateGroupSchedule">Skapa gruppmatcher</span>
                            <span wire:loading wire:target="generateGroupSchedule">Skapar...</span>
                        </button>
                    </div>

                    <!-- Manual Match Creation -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Manuell match</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Gruppnummer</label>
                                    <input type="number"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                           min="1"
                                           max="99"
                                           wire:model.live="group_number">
                                    @error('group_number') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Matchtyp</label>
                                    <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                            wire:model.live="match_type">
                                        <option value="group">Grupp</option>
                                        <option value="quarter_final">Kvartsfinal</option>
                                        <option value="semi_final">Semifinal</option>
                                        <option value="third_place">Tredjepris</option>
                                        <option value="final">Final</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 block">Hemmalag</label>
                                <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                        wire:model.live="home_team_id">
                                    <option value="">Välj lag</option>
                                    @foreach($teams as $t)
                                        <option value="{{ $t->id }}">G{{ $t->group_number ?? '?' }} – {{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('home_team_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 block">Bortalag</label>
                                <select class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                        wire:model.live="away_team_id">
                                    <option value="">Välj lag</option>
                                    @foreach($teams as $t)
                                        <option value="{{ $t->id }}">G{{ $t->group_number ?? '?' }} – {{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('away_team_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 block">Datum & tid</label>
                                <input type="datetime-local"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                       wire:model.defer="scheduled_at">
                                @error('scheduled_at') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Plan/arena</label>
                                    <input type="text"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                           placeholder="Plan A"
                                           wire:model.defer="venue">
                                </div>
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-2 block">Speltid (min)</label>
                                    <input type="number"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
                                           min="20"
                                           max="120"
                                           wire:model.defer="duration_minutes">
                                    @error('duration_minutes') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <button
                            class="mt-4 w-full px-4 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-sm hover:shadow-md font-medium flex items-center justify-center gap-2"
                            @click="if(confirm('Skapa denna match?')) { $wire.createMatch() }"
                            wire:loading.attr="disabled"
                            wire:target="createMatch">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span wire:loading.remove wire:target="createMatch">Skapa match</span>
                            <span wire:loading wire:target="createMatch">Sparar...</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Groups & Schedule Overview -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Groups Grid -->
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach([1,2,3,4] as $g)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">
                                        {{ $g }}
                                    </div>
                                    Grupp {{ $g }}
                                </h3>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-semibold">
                                    {{ isset($grouped[$g]) ? count($grouped[$g]) : 0 }}/4
                                </span>
                            </div>
                            <ul class="space-y-2">
                                @forelse(($grouped[$g] ?? collect()) as $t)
                                    <li class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-100 to-blue-100 flex items-center justify-center font-bold text-emerald-700 text-sm">
                                                {{ strtoupper(substr($t->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="font-semibold text-gray-900 text-sm">{{ $t->name }}</div>
                                                @if($t->organization)
                                                    <div class="text-xs text-gray-500">{{ $t->organization }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-500 text-center py-4">Ingen tilldelning</li>
                                @endforelse
                            </ul>
                        </div>
                    @endforeach
                </div>

                <!-- Schedule List -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6" wire:poll.5s>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Matchschema ({{ $matches->count() }})</h3>
                        </div>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            <input type="number"
                                   class="pl-10 pr-4 py-2 w-full sm:w-40 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm"
                                   placeholder="Filtrera grupp"
                                   wire:model.live="filter_group">
                        </div>
                    </div>

                    <div class="space-y-3">
                        @forelse($matches as $m)
                            <div class="group bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-xl p-4 hover:shadow-md transition-all duration-200">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-2 mb-2">
                                            <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-bold">
                                                Grupp {{ $m->group_number }}
                                            </span>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-semibold">
                                                {{ ucfirst(str_replace('_',' ', $m->match_type)) }}
                                            </span>
                                        </div>
                                        <div class="font-bold text-gray-900 mb-1">
                                            {{ $m->homeTeam->name }} <span class="text-gray-400 font-normal">vs</span> {{ $m->awayTeam->name }}
                                        </div>
                                        <div class="flex flex-wrap items-center gap-3 text-xs text-gray-600">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ optional($m->scheduled_at)->format('Y-m-d H:i') }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                {{ $m->venue }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.matches.control', $m) }}"
                                       class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-xl hover:bg-emerald-100 transition-all text-sm font-medium flex items-center justify-center gap-2 lg:opacity-0 lg:group-hover:opacity-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                        Kontrollera
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Inga matcher skapade</p>
                                <p class="text-gray-400 text-sm mt-1">Generera schema eller skapa matcher manuellt</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
