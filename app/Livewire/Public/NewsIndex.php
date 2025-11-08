<?php

namespace App\Livewire\Public;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

    public $selectedCategory = 'all';

    public function render()
    {
        $query = News::published()->with('author')->latest('published_at');

        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        return view('livewire.public.news-index', [
            'newsList' => $query->paginate(9),
        ])->layout('layouts.app');
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage();
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
