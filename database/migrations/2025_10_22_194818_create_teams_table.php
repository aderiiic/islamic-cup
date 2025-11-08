<?php
// database/migrations/2025_01_22_000001_create_teams_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organization'); // Moské/förening
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('color_primary')->default('#10b981'); // emerald-500
            $table->string('color_secondary')->default('#f59e0b'); // yellow-500
            $table->foreignId('owner_id')->constrained('users');
            // Viktigt: skapa endast kolumnen här, ingen FK ännu (players finns inte än vid denna migration)
            $table->unsignedBigInteger('captain_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('group_number')->nullable(); // 1-4 för grupperna
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
