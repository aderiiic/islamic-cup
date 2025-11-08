<!-- resources/views/livewire/public/home-feed.blade.php -->
<div wire:poll.5s>
    <!-- Modal (styrd av Livewire-state) -->
    <div id="tableModal"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 {{ $openTableModal ? 'flex' : 'hidden' }} items-center justify-center p-4"
         wire:key="table-modal">
        <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="sticky top-0 bg-gradient-to-r from-emerald-600 to-emerald-700 p-6 text-white rounded-t-3xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-1">Komplett Tabellställning</h3>
                        <p class="text-emerald-100">Islamic Cup • Alla grupper</p>
                    </div>
                    <button type="button" wire:click="closeModal" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-2xl flex items-center justify-center transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Grupp tabs -->
                <div class="flex space-x-2 mb-8 bg-gray-100 rounded-2xl p-2">
                    @foreach([1=>'Grupp A',2=>'Grupp B',3=>'Grupp C',4=>'Grupp D'] as $g => $label)
                        <button type="button" wire:click="setGroup({{ $g }})" wire:key="grp-tab-{{ $g }}"
                                class="flex-1 py-3 px-4 {{ ((int)$selectedGroup === (int)$g) ? 'bg-emerald-600 text-white' : 'hover:bg-gray-200' }} rounded-xl font-semibold transition-all">
                            {{ $label }}
                        </button>
                    @endforeach
                    <button type="button" class="flex-1 py-3 px-4 hover:bg-gray-200 rounded-xl font-semibold transition-all" disabled>Slutspel</button>
                </div>

                <!-- Tabell -->
                @php $rows = $tables[$selectedGroup] ?? []; @endphp
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-2 text-sm font-semibold text-gray-600">Pos</th>
                            <th class="text-left py-4 px-2 text-sm font-semibold text-gray-600">Lag</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">S</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">V</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">O</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">F</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">GM</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">IM</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">MS</th>
                            <th class="text-center py-4 px-2 text-sm font-semibold text-gray-600">P</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($rows as $idx => $row)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-2">
                                    <div class="w-8 h-8 {{ $idx===0?'bg-yellow-500':'bg-gray-400' }} text-white rounded-full flex items-center justify-center font-bold text-sm">{{ $idx+1 }}</div>
                                </td>
                                <td class="py-4 px-2">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl"></div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $row['team']->name }}</div>
                                            <div class="text-xs text-gray-600">{{ $row['team']->organization }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center py-4 px-2 font-medium">{{ $row['played'] }}</td>
                                <td class="text-center py-4 px-2 font-medium text-green-600">{{ $row['won'] }}</td>
                                <td class="text-center py-4 px-2 font-medium">{{ $row['drawn'] }}</td>
                                <td class="text-center py-4 px-2 font-medium text-red-600">{{ $row['lost'] }}</td>
                                <td class="text-center py-4 px-2 font-medium">{{ $row['gf'] }}</td>
                                <td class="text-center py-4 px-2 font-medium">{{ $row['ga'] }}</td>
                                <td class="text-center py-4 px-2 font-medium {{ $row['gd']>=0 ? 'text-green-600':'text-red-600' }}">{{ $row['gd']>=0?'+':'' }}{{ $row['gd'] }}</td>
                                <td class="text-center py-4 px-2 font-bold text-emerald-600">{{ $row['pts'] }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="10" class="py-6 text-center text-gray-500">Ingen data för gruppen ännu.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Skytteliga & Fair Play -->
                <div class="mt-8 grid md:grid-cols-2 gap-8">
                    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-6">
                        <h4 class="font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                            </svg>
                            Skytteliga
                        </h4>
                        <div class="space-y-3">
                            @foreach($topScorers as $rank => $p)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 {{ $rank===0?'bg-yellow-500':'bg-gray-400' }} text-white rounded-full flex items-center justify-center font-bold text-xs">{{ $rank+1 }}</div>
                                        <span class="text-sm font-medium">{{ $p->name }}</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-bold {{ $rank===0?'text-yellow-600':'text-gray-600' }}">{{ $p->goals_count }} mål</div>
                                        <div class="text-xs text-gray-600">{{ $p->team?->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6">
                        <h4 class="font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Fair Play
                        </h4>
                        <div class="space-y-3">
                            @foreach($fairPlay as $t)
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">{{ $t->name }}</span>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex">
                                            @for($i=0;$i<($t->yellow_count ?? 0);$i++)
                                                <div class="w-2 h-4 bg-yellow-400 mr-1"></div>
                                            @endfor
                                            @for($i=0;$i<($t->red_count ?? 0);$i++)
                                                <div class="w-2 h-4 bg-red-500 mr-1"></div>
                                            @endfor
                                        </div>
                                        <span class="text-xs text-gray-600">{{ ($t->yellow_count ?? 0)+($t->red_count ?? 0) }} kort</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Live Resultat & Tabellställning -->
    <section class="py-16 bg-gradient-to-br from-slate-800 via-gray-900 to-slate-900 text-white relative overflow-hidden" wire:poll.5s>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-12 gap-8">
                <!-- Vänster: Live -->
                <div class="lg:col-span-7">
                    @forelse($liveMatches as $m)
                        @php
                            $isLive = $m->status === 'live';
                            $serverMinute = (int) $m->display_minute;
                        @endphp
                        <div class="bg-white/5 backdrop-blur-sm rounded-3xl shadow-2xl p-8 mb-8 border border-white/10 relative overflow-hidden"
                             wire:key="live-card-{{ $m->id }}"
                             x-data="{ minute: {{ (int) $serverMinute }}, running: {{ $isLive ? 'true' : 'false' }}, iid: null }"
                             x-init="if(running && !iid){ iid=setInterval(()=>{ minute++ }, 60000) }"
                             x-effect="if(!running && iid){ clearInterval(iid); iid = null }">
                            <div class="absolute top-0 right-0 bg-gradient-to-l from-red-500 to-red-600 text-white px-6 py-2 rounded-bl-2xl flex items-center space-x-2 z-10">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                <span class="font-bold text-sm">LIVE</span>
                            </div>

                            <div class="flex items-center justify-between mb-8 relative z-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white capitalize">{{ str_replace('_',' ', $m->match_type) }}</h3>
                                    <p class="text-gray-300 text-sm">{{ $m->venue }} • {{ optional($m->scheduled_at)->format('H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-red-400"><span x-text="minute"></span>'</div>
                                    <div class="text-xs text-gray-400">{{ $m->status === 'half_time' ? 'Halvtid' : ($isLive ? 'Pågår' : ucfirst($m->status)) }}</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-center space-x-8 mb-8 relative z-10">
                                <div class="text-center flex-1">
                                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mx-auto mb-4"></div>
                                    <h4 class="font-bold text-lg text-white mb-1">{{ $m->homeTeam->name }}</h4>
                                    <p class="text-sm text-gray-300">{{ $m->homeTeam->organization }}</p>
                                </div>
                                <div class="text-center">
                                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-8 py-4 rounded-2xl border border-emerald-400/20">
                                        <div class="text-4xl font-bold">{{ $m->home_score }} - {{ $m->away_score }}</div>
                                    </div>
                                    <div class="flex items-center justify-center space-x-2 mt-3 text-xs text-gray-400">
                                        <span>HT: {{ $m->home_score_ht }}-{{ $m->away_score_ht }}</span>
                                    </div>
                                </div>
                                <div class="text-center flex-1">
                                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl mx-auto mb-4"></div>
                                    <h4 class="font-bold text-lg text-white mb-1">{{ $m->awayTeam->name }}</h4>
                                    <p class="text-sm text-gray-300">{{ $m->awayTeam->organization }}</p>
                                </div>
                            </div>

                            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 relative z-10">
                                <h5 class="font-semibold text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Senaste händelser
                                </h5>
                                <div class="space-y-3">
                                    @foreach($m->events()->latest()->limit(5)->get() as $ev)
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center text-xs font-bold
                                                    @if($ev->event_type==='goal') bg-green-500/20 text-green-300
                                                    @elseif($ev->event_type==='yellow_card') bg-yellow-500/20 text-yellow-300
                                                    @elseif($ev->event_type==='red_card') bg-red-500/20 text-red-300
                                                    @else bg-white/10 text-gray-200 @endif">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                        @if($ev->event_type==='goal') <circle cx="12" cy="12" r="10"/>
                                                        @elseif($ev->event_type==='yellow_card' || $ev->event_type==='red_card') <rect x="7" y="4" width="10" height="16" rx="2"/>
                                                        @else <path d="M12 2l4 8-4 12-4-12z"/> @endif
                                                    </svg>
                                                </div>
                                                <span class="text-sm text-gray-200">
                                                    <strong class="text-white">{{ $ev->player?->name ?? $ev->team->name }}</strong>
                                                    <span class="text-gray-400">({{ $ev->team->name }})</span>
                                                </span>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-300">{{ $ev->minute }}'</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white/5 backdrop-blur-sm rounded-3xl shadow-2xl p-8 mb-8 border border-white/10">
                            <div class="text-gray-300">Ingen match live just nu.</div>
                        </div>
                    @endforelse

                    <!-- Kommande matcher -->
                    <div class="bg-white/5 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-white/10">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-white flex items-center">
                                <svg class="w-6 h-6 mr-3 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Kommande matcher
                            </h3>
                            <span class="text-sm text-gray-400">{{ now()->format('Y-m-d') }}</span>
                        </div>

                        <div class="space-y-4">
                            @forelse($upcoming as $m)
                                <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl hover:bg-white/10 transition-colors border border-white/5">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-center">
                                            <div class="text-sm font-semibold text-white">{{ optional($m->scheduled_at)->format('H:i') }}</div>
                                            <div class="text-xs text-gray-400">{{ $m->venue }}</div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg"></div>
                                                <span class="font-medium text-sm text-gray-200">{{ $m->homeTeam->name }}</span>
                                            </div>
                                            <span class="text-gray-500">vs</span>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg"></div>
                                                <span class="font-medium text-sm text-gray-200">{{ $m->awayTeam->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full font-medium border border-blue-400/30">
                                        {{ ucfirst(str_replace('_',' ', $m->match_type)) }}
                                    </div>
                                </div>
                            @empty
                                <div class="text-sm text-gray-400">Inga kommande matcher.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Höger: Tabell + knapp -->
                <div class="lg:col-span-5">
                    <div class="bg-white/5 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/10 overflow-hidden sticky top-8">
                        <div class="p-6">
                            <div class="flex space-x-2 mb-4 bg-gray-800/30 rounded-xl p-2">
                                @foreach([1=>'A',2=>'B',3=>'C',4=>'D'] as $g => $label)
                                    <button type="button" wire:click="setGroup({{ $g }})" wire:key="grp-mini-{{ $g }}"
                                            class="flex-1 py-2 px-3 rounded-lg font-semibold transition-all
            {{ ((int)$selectedGroup === (int)$g) ? 'bg-emerald-600 text-white' : 'hover:bg-gray-700 text-gray-200' }}">
                                        Grupp {{ $label }}
                                    </button>
                                @endforeach
                            </div>

                            @php $rows = $tables[$selectedGroup] ?? []; @endphp
                            <div class="space-y-3">
                                @foreach($rows as $idx => $row)
                                    <div class="flex items-center justify-between p-4
                                        {{ $idx===0 ? 'bg-gradient-to-r from-yellow-500/20 to-yellow-400/10 border border-yellow-400/30' : 'bg-white/5 border border-white/10' }}
                                        rounded-2xl">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-8 h-8 {{ $idx===0?'bg-yellow-500':'bg-gray-600' }} text-white rounded-full flex items-center justify-center font-bold text-sm shadow-lg">
                                                {{ $idx+1 }}
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg"></div>
                                                <div>
                                                    <div class="font-semibold text-white text-sm">{{ $row['team']->name }}</div>
                                                    <div class="text-xs text-gray-300">{{ $row['team']->organization }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="font-bold text-white">{{ $row['pts'] }}p</div>
                                            <div class="text-xs text-gray-400">
                                                {{ $row['played'] }}S {{ $row['won'] }}V {{ $row['drawn'] }}O {{ $row['lost'] }}F •
                                                {{ $row['gf'] }}-{{ $row['ga'] }} ({{ $row['gd'] >=0 ? '+' : '' }}{{ $row['gd'] }})
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(empty($rows))
                                    <div class="text-sm text-gray-400">Ingen data för gruppen ännu.</div>
                                @endif
                            </div>

                            <div class="mt-6">
                                <button type="button" wire:click="openModal"
                                        class="group relative w-full px-6 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-xl flex items-center justify-center border border-emerald-500/20">
                                    <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    Se hela tabellen & statistik
                                </button>
                            </div>

                            <!-- Mini statistik -->
                            <div class="mt-6 grid grid-cols-3 gap-4 text-center">
                                <div class="bg-emerald-500/20 rounded-xl p-3 border border-emerald-400/30">
                                    <div class="text-lg font-bold text-emerald-400">{{ \App\Models\FootballMatch::count() }}</div>
                                    <div class="text-xs text-gray-300">Matcher</div>
                                </div>
                                <div class="bg-yellow-500/20 rounded-xl p-3 border border-yellow-400/30">
                                    <div class="text-lg font-bold text-yellow-400">{{ \App\Models\MatchEvent::where('event_type','goal')->count() }}</div>
                                    <div class="text-xs text-gray-300">Mål</div>
                                </div>
                                <div class="bg-blue-500/20 rounded-xl p-3 border border-blue-400/30">
                                    <div class="text-lg font-bold text-blue-400">{{ \App\Models\Team::count() }}</div>
                                    <div class="text-xs text-gray-300">Lag</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- grid -->
            </div> <!-- container -->
        </div>
    </section>
</div>
