<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Mina lag</h1>
        <a href="{{ route('teams.create') }}"
           class="inline-flex items-center px-5 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">
            Skapa nytt lag
        </a>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        @forelse($teams as $team)
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-xl bg-gray-100 flex items-center justify-center overflow-hidden"
                         style="border:3px solid {{ $team['color_primary'] ?? '#10b981' }}">
                        @if(!empty($team['logo_path']))
                            <img src="{{ asset('storage/'.$team['logo_path']) }}" class="w-full h-full object-cover" alt="logo">
                        @else
                            <div class="w-6 h-6 rounded-full" style="background: {{ $team['color_secondary'] ?? '#f59e0b' }}"></div>
                        @endif
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">{{ $team['name'] }}</div>
                        <div class="text-sm text-gray-500">{{ $team['organization'] }}</div>
                        <div class="text-xs mt-1">
                            <span class="px-2 py-0.5 rounded-full
                                @if($team['status']==='approved') bg-emerald-100 text-emerald-700
                                @elseif($team['status']==='rejected') bg-red-100 text-red-700
                                @else bg-yellow-100 text-yellow-700 @endif">
                                {{ ucfirst($team['status']) }}
                            </span>
                            @if($team['group_number'])
                                <span class="ml-2 px-2 py-0.5 rounded-full bg-blue-100 text-blue-700">Grupp {{ $team['group_number'] }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('teams.edit', $team['id']) }}"
                       class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition">Redigera</a>
                    <a href="{{ route('players.index', $team['id']) }}"
                       class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition">Spelare</a>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center">
                    <p class="text-gray-600">Du har inga lag ännu.</p>
                    <a href="{{ route('teams.create') }}" class="inline-flex mt-4 px-5 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition">Skapa ditt första lag</a>
                </div>
            </div>
        @endforelse
    </div>
</div>
