<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Användare</h1>
        <span class="text-sm text-gray-500">Endast admin</span>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Form -->
        <div class="md:col-span-1">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h2 class="font-semibold mb-4">{{ $userId ? 'Redigera användare' : 'Skapa användare' }}</h2>
                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Namn</label>
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
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Organisation</label>
                        <input type="text" wire:model="organization" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('organization') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Roll</label>
                        <select wire:model="role" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            <option value="team_owner">Lagägare</option>
                            <option value="moderator">Moderator</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Lösenord {{ $userId ? '(lämna tomt för att behålla)' : '' }}</label>
                        <input type="password" wire:model="password" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl px-4 py-3 transition">
                        {{ $userId ? 'Spara ändringar' : 'Skapa användare' }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Lista -->
        <div class="md:col-span-2">
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="font-semibold">Alla användare</div>
                    <input type="text" wire:model.debounce.400ms="search" placeholder="Sök namn / e-post / organisation"
                           class="w-64 px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                </div>

                <div class="divide-y">
                    @foreach($users as $u)
                        <div class="py-4 flex items-center justify-between">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $u->name }}</div>
                                <div class="text-sm text-gray-600">{{ $u->email }}</div>
                                <div class="text-xs mt-1">
                                    <span class="px-2 py-0.5 rounded-full
                                        @if($u->role==='admin') bg-red-100 text-red-700
                                        @elseif($u->role==='moderator') bg-blue-100 text-blue-700
                                        @else bg-emerald-100 text-emerald-700 @endif">
                                        {{ ucfirst($u->role) }}
                                    </span>
                                    @if($u->organization)
                                        <span class="ml-2 text-gray-500">{{ $u->organization }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button wire:click="edit({{ $u->id }})"
                                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition">Redigera</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
