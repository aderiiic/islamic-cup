<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:text-emerald-600 transition-colors">Hem</a></li>
                <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                <li><a href="{{ route('news.index') }}" class="hover:text-emerald-600 transition-colors">Nyheter</a></li>
                <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                <li class="text-gray-900 font-medium">{{ Str::limit($news->title, 50) }}</li>
            </ol>
        </nav>

        <!-- Article Header -->
        <article class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Featured Image -->
            <div class="relative h-96 overflow-hidden">
                <img src="{{ $news->featured_image }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>

                @php
                    $colors = $this->getCategoryColor($news->category);
                @endphp

                <div class="absolute bottom-6 left-6 right-6">
                    <span class="inline-block px-4 py-2 {{ $colors['bg'] }} {{ $colors['text'] }} rounded-full text-sm font-medium mb-4">
                        {{ ucfirst($news->category) }}
                    </span>
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                        {{ $news->title }}
                    </h1>
                    <div class="flex items-center space-x-4 text-white/90">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ $news->author->name }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $news->published_at->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Content -->
            <div class="p-8 md:p-12">
                <!-- Excerpt -->
                <div class="text-xl text-gray-700 font-medium leading-relaxed mb-8 pb-8 border-b border-gray-200">
                    {{ $news->excerpt }}
                </div>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Share Section -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Dela denna nyhet</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" target="_blank" class="flex items-center justify-center w-12 h-12 bg-blue-400 text-white rounded-xl hover:bg-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="mailto:?subject={{ urlencode($news->title) }}&body={{ urlencode(request()->url()) }}" class="flex items-center justify-center w-12 h-12 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related News -->
        @if($relatedNews->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Relaterade nyheter</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedNews as $related)
                        @php
                            $colors = $this->getCategoryColor($related->category);
                        @endphp
                        <a href="{{ route('news.show', $related->slug) }}" class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $related->featured_image }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute top-4 left-4 px-3 py-1 {{ $colors['bg'] }} {{ $colors['text'] }} rounded-full text-xs font-medium">
                                    {{ ucfirst($related->category) }}
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                                    {{ $related->title }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ Str::limit($related->excerpt, 80) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Back Button -->
        <div class="mt-12 text-center">
            <a href="{{ route('news.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Tillbaka till alla nyheter
            </a>
        </div>
    </div>
</div>
