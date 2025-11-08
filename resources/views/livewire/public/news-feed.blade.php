<div>

    <section id="nyheter" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                <span class="block text-2xl md:text-3xl text-emerald-600 font-normal mb-2">
                    Håll dig uppdaterad
                </span>
                    Senaste <span class="text-emerald-600 relative inline-block">
                    Nyheterna
                    <svg class="absolute -bottom-2 left-0 w-full h-4 text-emerald-600/40" viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12 Q50 6 100 10 T200 8" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Håll dig uppdaterad med de senaste nyheterna från Islamic Cup
                </p>
            </div>

            @if($newsList->count() > 0)
                <div class="grid md:grid-cols-3 gap-8">
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
                                <!-- Gradient overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t {{ $colors['bg'] }} to-transparent"></div>

                                <!-- Category badge -->
                                <div class="absolute top-4 left-4 {{ $colors['badge'] }} backdrop-blur-sm text-white px-3 py-2 rounded-full text-sm font-medium">
                                    {{ ucfirst($news->category) }}
                                </div>

                                <!-- Date badge -->
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

                <div class="text-center mt-12">
                    <a href="{{ route('news.index') }}" class="group relative inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                        Se alla nyheter
                        <div class="absolute inset-0 bg-white/20 rounded-2xl transform scale-95 group-hover:scale-100 transition-transform opacity-0 group-hover:opacity-100"></div>
                    </a>
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Inga nyheter än</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Vi arbetar på att publicera de senaste nyheterna om Islamic Cup 2025. Håll utkik!
                    </p>
                    <a href="#kontakt" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Kontakta oss
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
