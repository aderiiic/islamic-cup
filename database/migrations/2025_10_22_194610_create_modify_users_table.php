<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'moderator', 'team_owner'])->default('team_owner');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->boolean('can_create_multiple_teams')->default(false);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'organization', 'can_create_multiple_teams']);
        });
    }
};
