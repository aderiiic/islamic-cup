<?php
// database/migrations/2025_01_22_000006_create_match_subscriptions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('match_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->boolean('email_notifications')->default(true);
            $table->boolean('sms_notifications')->default(false);
            $table->timestamps();

            $table->unique(['match_id', 'email']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('match_subscriptions');
    }
};
