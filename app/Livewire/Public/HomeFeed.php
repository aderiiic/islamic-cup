<?php

namespace App\Livewire\Public;

use App\Models\FootballMatch;
use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class HomeFeed extends Component
{
    public $selectedGroup = 1;
    public $openTableModal = false;

    public function openModal(): void { $this->openTableModal = true; }
    public function closeModal(): void { $this->openTableModal = false; }
    public function setGroup(int $group): void { $this->selectedGroup = $group; }

    protected function computeTableForGroup(int $group): array
    {
        $teams = Team::where('group_number', $group)->get();
        $rows = [];
        foreach ($teams as $team) {
            $finished = FootballMatch::with(['homeTeam','awayTeam'])
                ->where(fn($q) => $q->where('home_team_id', $team->id)->orWhere('away_team_id', $team->id))
                ->where('status', 'finished')->get();

            $played=$won=$drawn=$lost=$gf=$ga=$pts=0;
            foreach ($finished as $m) {
                $played++;
                $isHome = $m->home_team_id === $team->id;
                $tgf = $isHome ? $m->home_score : $m->away_score;
                $tga = $isHome ? $m->away_score : $m->home_score;
                $gf += $tgf; $ga += $tga;
                if ($tgf > $tga) { $won++; $pts+=3; }
                elseif ($tgf < $tga) { $lost++; }
                else { $drawn++; $pts+=1; }
            }

            $rows[] = ['team'=>$team,'played'=>$played,'won'=>$won,'drawn'=>$drawn,'lost'=>$lost,'gf'=>$gf,'ga'=>$ga,'gd'=>$gf-$ga,'pts'=>$pts];
        }

        usort($rows, fn($a,$b) => [$b['pts'],$b['gd'],$b['gf'],$a['team']->name] <=> [$a['pts'],$a['gd'],$a['gf'],$b['team']->name]);
        return $rows;
    }

    protected function computeTopScorers(int $limit = 10)
    {
        return Player::with('team')
            ->withCount(['matchEvents as goals_count' => fn($q) => $q->where('event_type','goal')])
            ->orderByDesc('goals_count')->orderBy('name')->limit($limit)->get();
    }

    protected function computeFairPlay(int $limit = 10)
    {
        return Team::withCount([
            'matchEvents as yellow_count' => fn($q) => $q->where('event_type','yellow_card'),
            'matchEvents as red_count' => fn($q) => $q->where('event_type','red_card'),
        ])->get()
            ->map(function($t){ $t->fair_points = ($t->yellow_count ?? 0) + 3*($t->red_count ?? 0); return $t; })
            ->sortBy('fair_points')->take($limit)->values();
    }

    public function render()
    {
        $liveMatches = FootballMatch::with(['homeTeam','awayTeam','events.player','events.team'])
            ->where('status', 'live')->orderBy('scheduled_at')->get();


        $liveMatches = FootballMatch::with(['homeTeam','awayTeam','events.player','events.team'])
            ->where('status', 'live')->orderBy('scheduled_at')->get();

        foreach ($liveMatches as $lm) {
            $lm->syncCurrentMinuteFromStart();
        }

        $upcoming = FootballMatch::with(['homeTeam','awayTeam'])
            ->where('status', 'scheduled')->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at')->limit(6)->get();

        $tables = [
            1 => $this->computeTableForGroup(1),
            2 => $this->computeTableForGroup(2),
            3 => $this->computeTableForGroup(3),
            4 => $this->computeTableForGroup(4),
        ];

        $topScorers = $this->computeTopScorers(10);
        $fairPlay = $this->computeFairPlay(10);

        return view('livewire.public.home-feed', compact('liveMatches','upcoming','tables','topScorers','fairPlay'));
    }
}
