<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                <span class="block text-2xl md:text-3xl text-emerald-600 font-normal mb-2">
                    Islamic Cup
                </span>
                Alla <span class="text-emerald-600 relative inline-block">
                    Nyheter
                    <svg class="absolute -bottom-2 left-0 w-full h-4 text-emerald-600/40" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12 Q50 6 100 10 T200 8" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Följ med i allt som händer kring Islamic Cup
            </p>
        </div>

        <!-- Filter -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button wire:click="filterByCategory('all')"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedCategory === 'all' ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Alla nyheter
            </button>
            <button wire:click="filterByCategory('anmalan')"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedCategory === 'anmalan' ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Anmälan
            </button>
            <button wire:click="filterByCategory('datum')"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedCategory === 'datum' ? 'bg-yellow-500 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Datum
            </button>
            <button wire:click="filterByCategory('höjdpunkter')"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedCategory === 'höjdpunkter' ? 'bg-emerald-500 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Höjdpunkter
            </button>
            <button wire:click="filterByCategory('allmänt')"
                    class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedCategory === 'allmänt' ? 'bg-gray-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Allmänt
            </button>
        </div>

        <!-- News Grid -->
        @if($newsList->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($newsList as $news)
                    @php
                        $colors = $this->getCategoryColor($news->category);
                    @endphp

                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group transform hover:scale-105">
                        <div class="relative h-56 overflow-hidden">
                            <img
                                src="{{ $news->featured_image }}"
                                alt="{{ $news->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t {{ $colors['bg'] }} to-transparent"></div>
                            <div class="absolute top-4 left-4 {{ $colors['badge'] }} backdrop-blur-sm text-white px-3 py-2 rounded-full text-sm font-medium">
                                {{ ucfirst($news->category) }}
                            </div>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-lg text-xs font-medium">
                                {{ $news->published_at->format('d M Y') }}
                            </div>
                        </div>
                        <div class="p-6">
                            <span class="text-sm {{ $colors['text'] }} font-semibold">
                                {{ $news->published_at->translatedFormat('d F Y') }}
                            </span>
                            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 {{ $colors['hover'] }} transition-colors">
                                {{ $news->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($news->excerpt, 120) }}
                            </p>
                            <a href="{{ route('news.show', $news->slug) }}" class="{{ $colors['text'] }} font-semibold hover:{{ $colors['text'] }}/80 inline-flex items-center group/link">
                                Läs mer
                                <svg class="w-4 h-4 ml-2 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $newsList->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl">
                <svg class="mx-auto h-24 w-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Inga nyheter i denna kategori</h3>
                <p class="text-gray-600 mb-8">
                    Försök filtrera på en annan kategori eller kontakta oss för mer information.
                </p>
            </div>
        @endif
    </div>
</div>
