<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->index();
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('team_left_id')/*->constrained('teams')*/
            ;
            $table->foreignId('team_right_id')/*->constrained('teams')*/
            ;
            $table->timestamp('fulfilled_at')->nullable();
            $table->timestamps();
            $table->unique(['key', 'season_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
