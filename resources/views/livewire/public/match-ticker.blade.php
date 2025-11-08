<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10" wire:poll.3s>
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div class="text-center flex-1">
                <div class="text-xs text-gray-500">{{ $match->homeTeam->organization }}</div>
                <div class="text-lg font-semibold text-gray-900">{{ $match->homeTeam->name }}</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-gray-500">{{ strtoupper($match->status) }}</div>
                <div class="text-3xl font-bold text-gray-900">{{ $match->home_score }} - {{ $match->away_score }}</div>
                <div class="text-xs text-gray-500">{{ $match->current_minute }}’</div>
            </div>
            <div class="text-center flex-1">
                <div class="text-xs text-gray-500">{{ $match->awayTeam->organization }}</div>
                <div class="text-lg font-semibold text-gray-900">{{ $match->awayTeam->name }}</div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="font-semibold mb-3">Händelser</h3>
            <div class="space-y-2">
                @forelse($match->events as $e)
                    <div class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                        <div class="text-sm">
                            <span class="font-semibold">{{ $e->minute }}’</span>
                            <span class="ml-2">{{ $e->event_type === 'goal' ? 'Mål' : ($e->event_type === 'yellow_card' ? 'Gult kort' : ($e->event_type === 'red_card' ? 'Rött kort' : 'Byte')) }}</span>
                            @if($e->player) — <span class="text-gray-700">{{ $e->player->name }}</span> @endif
                            <span class="text-gray-500">({{ $e->team->name }})</span>
                        </div>
                    </div>
                @empty
                    <div class="text-sm text-gray-500">Inga händelser ännu.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
