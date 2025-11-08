<?php
// database/migrations/2025_01_22_000002_create_players_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            // Teams-tabellen finns redan, så denna FK är säker här
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->enum('position', ['målvakt', 'försvarare', 'mittfältare', 'anfallare']);
            $table->integer('jersey_number');
            $table->date('birth_date')->nullable();
            $table->boolean('is_captain')->default(false);
            $table->timestamps();

            $table->unique(['team_id', 'jersey_number']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};
