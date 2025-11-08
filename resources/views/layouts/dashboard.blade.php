
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard • Islamic Cup')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
<div x-data="{ open: false }" class="min-h-screen">

    <!-- Desktop Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-40 w-72 bg-white border-r border-gray-200 hidden lg:flex flex-col shadow-sm">
        <div class="px-6 py-5 border-b border-gray-100">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="16" stroke="currentColor" stroke-width="2"/>
                        <path d="M20 8L23.09 16.18L32 17.27L26 23.14L27.18 32L20 28.18L12.82 32L14 23.14L8 17.27L16.91 16.18L20 8Z" fill="currentColor"/>
                    </svg>
                </div>
                <div>
                    <div class="font-bold text-lg text-gray-900">Islamic Cup</div>
                    <div class="text-xs text-gray-500">Turneringshantering</div>
                </div>
            </a>
        </div>

        <nav class="px-3 py-4 flex-1 overflow-y-auto">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3">Översikt</div>
            <a href="{{ route('dashboard') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all mb-1">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M3 12l9-9 9 9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('teams.index') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all mb-1">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Mina lag
            </a>
            @if(auth()->user()?->isTeamOwner())
                <a href="{{ route('teams.create') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all mb-1">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Skapa lag
                </a>
            @endif

            @if(auth()->user()?->canManageMatches())
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mt-6 mb-3">Turnering</div>
                <a href="{{ route('admin.tournament') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all mb-1">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke-width="2"/>
                        <path d="M16 2v4M8 2v4M3 10h18" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Grupper & Schema
                </a>
                <a href="{{ route('admin.teams') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all mb-1">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="9" cy="7" r="4" stroke-width="2"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87" stroke-width="2" stroke-linecap="round"/>
                        <path d="M16 3.13a4 4 0 010 7.75" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Hantera lag
                </a>
                <a href="{{ route('admin.news') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all mb-1">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                    </svg>
                    Nyheter
                </a>
            @endif

            @if(auth()->user()?->isAdmin() || auth()->user()?->isModerator())
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mt-6 mb-3">Administration</div>
                <a href="{{ route('admin.users') }}" class="group flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition-all mb-1">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Användare
                </a>
            @endif
        </nav>

        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-blue-500 text-white flex items-center justify-center font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'IC', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="font-semibold text-gray-900 text-sm truncate">{{ auth()->user()->name ?? '' }}</div>
                    <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" onsubmit="return confirm('Vill du logga ut?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-3 py-2 bg-red-50 text-red-700 rounded-xl hover:bg-red-100 transition-all text-sm font-medium flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logga ut
                </button>
            </form>
        </div>
    </aside>

    <!-- Mobile sidebar -->
    <div class="lg:hidden">
        <div class="fixed inset-0 z-40 bg-gray-900 bg-opacity-50" x-show="open" x-transition.opacity @click="open = false" x-cloak></div>
        <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 transform transition-transform shadow-2xl"
               :class="open ? 'translate-x-0' : '-translate-x-full'" x-cloak>
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <div class="font-bold text-lg">Islamic Cup</div>
                <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors" @click="open = false">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
            <nav class="px-3 py-4 h-[calc(100vh-140px)] overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Dashboard</a>
                <a href="{{ route('teams.index') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Mina lag</a>
                @if(auth()->user()?->isTeamOwner())
                    <a href="{{ route('teams.create') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Skapa lag</a>
                @endif
                @if(auth()->user()?->canManageMatches())
                    <a href="{{ route('admin.tournament') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Grupper & Schema</a>
                    <a href="{{ route('admin.teams') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Hantera lag</a>
                @endif
                @if(auth()->user()?->isAdmin() || auth()->user()?->isModerator())
                    <a href="{{ route('admin.users') }}" class="block px-3 py-2.5 rounded-xl text-gray-700 hover:bg-gray-100 mb-1">Användare</a>
                @endif
            </nav>
        </aside>
    </div>

    <!-- Main -->
    <div class="lg:pl-72">
        <!-- Topbar -->
        <header class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-b border-gray-200 shadow-sm">
            <div class="px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <button class="lg:hidden p-2 rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors" @click="open = true">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-sm text-gray-600 hidden sm:block font-medium">{{ auth()->user()->name ?? '' }}</div>
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-500 to-blue-500 text-white flex items-center justify-center font-bold text-sm shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'IC', 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        <main class="p-4 sm:p-6 lg:p-8">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
</div>

@livewireScripts
@stack('scripts')
</body>
</html>
