<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Välkommen {{ auth()->user()->name }} 👋</h1>
            <p class="text-sm text-gray-600">Snabb översikt över dina aktiviteter</p>
        </div>
    </div>

    <!-- Widgets -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Kommande matcher -->
        <div class="lg:col-span-2 bg-white border border-gray-200 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold">Kommande matcher</h2>
                <span class="text-xs text-gray-500">{{ count($upcoming) }}</span>
            </div>
            <div class="divide-y">
                @forelse($upcoming as $m)
                    <div class="py-3 flex items-center justify-between">
                        <div class="text-sm">
                            <div class="font-semibold text-gray-900">
                                {{ $m->homeTeam->name }} <span class="text-gray-400">vs</span> {{ $m->awayTeam->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $m->scheduled_at?->format('Y-m-d H:i') }} • {{ $m->venue }} • Grupp {{ $m->group_number ?? '-' }}
                            </div>
                        </div>
                        @can('manage-matches')
                            <a href="{{ route('admin.matches.control', $m->id) }}"
                               class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 text-sm">
                                Kontroll
                            </a>
                        @endcan
                    </div>
                @empty
                    <div class="py-6 text-sm text-gray-500">Inga kommande matcher.</div>
                @endforelse
            </div>
        </div>

        <!-- Mina lag -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold">Mina lag</h2>
                @if(auth()->user()->isTeamOwner())
                    <a href="{{ route('teams.create') }}" class="text-emerald-700 hover:text-emerald-800 text-sm font-semibold">Skapa lag</a>
                @endif
            </div>
            <div class="space-y-3">
                @forelse($myTeams as $t)
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="font-semibold text-gray-900">{{ $t->name }}</div>
                            <div class="text-xs text-gray-500">{{ $t->organization }}</div>
                        </div>
                        <a href="{{ route('players.index', $t->id) }}"
                           class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs hover:bg-emerald-700">Spelare</a>
                    </div>
                @empty
                    <div class="text-sm text-gray-500">Inga lag ännu.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Senaste händelser -->
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold">Senaste händelser</h2>
            <span class="text-xs text-gray-500">{{ count($recentEvents) }}</span>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @forelse($recentEvents as $e)
                <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">
                    <div class="text-sm">
                        <span class="px-2 py-0.5 rounded-full text-xs
                            @if($e->event_type==='goal') bg-emerald-100 text-emerald-700
                            @elseif($e->event_type==='yellow_card') bg-yellow-100 text-yellow-700
                            @elseif($e->event_type==='red_card') bg-red-100 text-red-700
                            @else bg-blue-100 text-blue-700 @endif">
                            {{ $e->event_type === 'goal' ? 'Mål' : ($e->event_type === 'yellow_card' ? 'Gult kort' : ($e->event_type === 'red_card' ? 'Rött kort' : 'Byte')) }}
                        </span>
                        <span class="ml-2 text-gray-700">
                            @if($e->player) {{ $e->player->name }} @endif
                            <span class="text-gray-500">({{ $e->team->name }})</span>
                        </span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                        {{ $e->minute }}’ • {{ $e->match->homeTeam->name }} vs {{ $e->match->awayTeam->name }}
                    </div>
                    @if($e->description)
                        <div class="text-xs text-gray-600 mt-1">{{ $e->description }}</div>
                    @endif
                </div>
            @empty
                <div class="text-sm text-gray-500">Inga händelser ännu.</div>
            @endforelse
        </div>
    </div>
</div>
