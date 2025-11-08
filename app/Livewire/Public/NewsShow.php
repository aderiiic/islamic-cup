<?php

namespace App\Livewire\Public;

use App\Models\News;
use Livewire\Component;

class NewsShow extends Component
{
    public News $news;

    public function mount($slug)
    {
        $this->news = News::published()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        // Hämta relaterade nyheter
        $relatedNews = News::published()
            ->where('id', '!=', $this->news->id)
            ->where('category', $this->news->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('livewire.public.news-show', [
            'relatedNews' => $relatedNews,
        ])->layout('layouts.app');
    }

    public function getCategoryColor($category)
    {
        return match($category) {
            'anmalan' => ['text' => 'text-emerald-600', 'bg' => 'bg-emerald-100'],
            'datum' => ['text' => 'text-yellow-600', 'bg' => 'bg-yellow-100'],
            'höjdpunkter' => ['text' => 'text-emerald-600', 'bg' => 'bg-emerald-100'],
            default => ['text' => 'text-gray-600', 'bg' => 'bg-gray-100'],
        };
    }
}
