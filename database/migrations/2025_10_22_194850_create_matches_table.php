<?php
// database/migrations/2025_01_22_000003_create_matches_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->constrained('teams');
            $table->foreignId('away_team_id')->constrained('teams');
            $table->integer('group_number')->nullable(); // null för slutspel
            $table->enum('match_type', ['group', 'quarter_final', 'semi_final', 'final', 'third_place']);
            $table->datetime('scheduled_at');
            $table->string('venue')->default('Plan A');
            $table->integer('duration_minutes')->default(40); // 2x20 minuter futsal

            // Match status och resultat
            $table->enum('status', ['scheduled', 'live', 'half_time', 'finished', 'cancelled'])->default('scheduled');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->integer('home_score_ht')->default(0); // halvtid
            $table->integer('away_score_ht')->default(0);

            // Live match data
            $table->timestamp('started_at')->nullable();
            $table->timestamp('half_time_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->integer('current_minute')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
