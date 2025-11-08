<?php

namespace App\Livewire\Public;

use App\Models\News;
use Livewire\Component;

class NewsFeed extends Component
{
    public function render()
    {
        // Hämta de 3 senaste publicerade nyheterna
        $news = News::published()
            ->with('author')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('livewire.public.news-feed', [
            'newsList' => $news,
        ]);
    }

    public function getCategoryColor($category)
    {
        return match($category) {
            'anmalan' => [
                'bg' => 'from-emerald-900/70 via-emerald-700/20',
                'badge' => 'bg-emerald-600/90',
                'text' => 'text-emerald-600',
                'hover' => 'group-hover:text-emerald-600',
            ],
            'datum' => [
                'bg' => 'from-yellow-900/70 via-yellow-600/20',
                'badge' => 'bg-yellow-500/90',
                'text' => 'text-yellow-600',
                'hover' => 'group-hover:text-yellow-600',
            ],
            'höjdpunkter' => [
                'bg' => 'from-emerald-900/70 via-emerald-700/20',
                'badge' => 'bg-emerald-500/90',
                'text' => 'text-emerald-600',
                'hover' => 'group-hover:text-emerald-600',
            ],
            default => [
                'bg' => 'from-gray-900/70 via-gray-700/20',
                'badge' => 'bg-gray-500/90',
                'text' => 'text-gray-600',
                'hover' => 'group-hover:text-gray-600',
            ],
        };
    }
}
