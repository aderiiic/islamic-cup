<?php

namespace App\Livewire\Public;

use App\Models\FootballMatch;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class MatchTicker extends Component
{
    public FootballMatch $match;

    public function mount(FootballMatch $match): void
    {
        $this->match = $match->load(['homeTeam','awayTeam','events' => function($q){
            $q->latest('minute')->latest('id');
        }]);
    }

    public function refresh(): void
    {
        $this->match->refresh()->load(['homeTeam','awayTeam','events' => function($q){
            $q->latest('minute')->latest('id');
        }]);
    }

    public function render()
    {
        return view('livewire.public.match-ticker');
    }
}
