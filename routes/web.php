<?php

use App\Livewire\Admin\Matches\MatchControl;
use App\Livewire\Admin\Teams\ManageTeams;
use App\Livewire\Admin\Tournament\GroupAndSchedule;
use App\Livewire\Auth\LoginForm;
use App\Livewire\Auth\RegisterForm;
use App\Livewire\Public\MatchTicker;
use App\Livewire\Team\Players\ManagePlayers;
use Illuminate\Support\Facades\Route;
use App\Livewire\Team\ListTeams;
use App\Livewire\Team\EditTeam;
use App\Livewire\Team\CreateTeam;
use App\Livewire\Admin\Users\ManageUsers;
use App\Livewire\Dashboard\Home as DashboardHome;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', LoginForm::class)->name('login');
//Route::get('/register', RegisterForm::class)->name('register');

// Publika
Route::get('/match/{match}', \App\Livewire\Public\MatchTicker::class)->name('match.ticker');
Route::get('/nyheter', \App\Livewire\Public\NewsIndex::class)->name('news.index');
Route::get('/nyheter/{slug}', \App\Livewire\Public\NewsShow::class)->name('news.show');

// Skyddade rutter
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', DashboardHome::class)->name('dashboard');

    Route::get('/admin/news', \App\Livewire\Admin\News\ManageNews::class)
        ->name('admin.news');

    // Teamowner: lag & spelare
    Route::middleware('can:team')->group(function () {
        Route::get('/teams', \App\Livewire\Team\ListTeams::class)->name('teams.index');
        Route::get('/teams/create', \App\Livewire\Team\CreateTeam::class)->name('teams.create');
        Route::get('/teams/{team}/edit', \App\Livewire\Team\EditTeam::class)->name('teams.edit');
        Route::get('/teams/{team}/players', ManagePlayers::class)->name('players.index');
    });

    // Admin/mod: turnering, matcher, användare
    Route::middleware('can:moderate')->group(function () {
        Route::get('/admin/tournament', GroupAndSchedule::class)->name('admin.tournament');
        Route::get('/admin/matches/{match}', MatchControl::class)->name('admin.matches.control');
        Route::get('/admin/users', ManageUsers::class)->name('admin.users');
        Route::get('/admin/teams', ManageTeams::class)->name('admin.teams');
    });
});
