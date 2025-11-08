
<div>
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Hantera nyheter</h2>
                <p class="text-gray-600 mt-1">Skapa och hantera nyheter för Islamic Cup</p>
            </div>
            <button wire:click="openModal" class="px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-lg flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Skapa nyhet</span>
            </button>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl">
            {{ session('message') }}
        </div>
    @endif

    <!-- Lista med nyheter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Författare</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Åtgärder</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($newsList as $news)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                <img class="h-12 w-12 rounded-lg object-cover" src="{{ $news->featured_image }}" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $news->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($news->excerpt, 50) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($news->category === 'anmalan') bg-emerald-100 text-emerald-800
                                @elseif($news->category === 'datum') bg-yellow-100 text-yellow-800
                                @elseif($news->category === 'höjdpunkter') bg-blue-100 text-blue-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($news->category) }}
                            </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $news->author->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($news->is_published)
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Publicerad</span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">Utkast</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $news->created_at->format('Y-m-d') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="togglePublished({{ $news->id }})" class="text-blue-600 hover:text-blue-900 mr-3">
                            @if($news->is_published)
                                Avpublicera
                            @else
                                Publicera
                            @endif
                        </button>
                        <button wire:click="edit({{ $news->id }})" class="text-emerald-600 hover:text-emerald-900 mr-3">Redigera</button>
                        <button wire:click="delete({{ $news->id }})" onclick="return confirm('Är du säker?')" class="text-red-600 hover:text-red-900">Radera</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                        <p class="text-lg font-medium">Inga nyheter än</p>
                        <p class="text-sm mt-1">Kom igång genom att skapa din första nyhet</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $newsList->links() }}
    </div>

    <!-- Modal för skapa/redigera -->
    @if($showModal)
        <div class="fixed inset-0 z-[9999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

            <!-- Modal panel -->
            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl transform transition-all" @click.stop>
                    <div class="px-6 py-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">
                                {{ $editingId ? 'Redigera nyhet' : 'Skapa ny nyhet' }}
                            </h3>
                            <button wire:click="closeModal" class="text-gray-400 hover:text-gray-500 transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <form wire:submit.prevent="save" class="space-y-6">
                            <!-- Titel -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Titel *</label>
                                <input type="text" wire:model="title" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                                <select wire:model="category" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                    <option value="anmalan">Anmälan</option>
                                    <option value="datum">Datum</option>
                                    <option value="höjdpunkter">Höjdpunkter</option>
                                    <option value="allmänt">Allmänt</option>
                                </select>
                                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Kort beskrivning -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kort beskrivning *</label>
                                <textarea wire:model="excerpt" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                                @error('excerpt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Innehåll -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Innehåll *</label>
                                <textarea wire:model="content" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Checkboxes -->
                            <div class="flex items-center space-x-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="is_featured" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <span class="ml-2 text-sm text-gray-700">Utvalda nyheter</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="is_published" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <span class="ml-2 text-sm text-gray-700">Publicera direkt</span>
                                </label>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-3 pt-4 border-t">
                                <button type="button" wire:click="closeModal" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all">
                                    Avbryt
                                </button>
                                <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all shadow-lg">
                                    {{ $editingId ? 'Uppdatera' : 'Skapa nyhet' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
