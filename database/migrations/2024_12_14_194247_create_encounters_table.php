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
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->index();
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('player_left_id')->nullable()/*->constrained('players')*/
            ;
            $table->foreignId('player_right_id')->nullable()/*->constrained('players')*/
            ;
            $table->tinyInteger('score_left');
            $table->tinyInteger('score_right');
            $table->integer('player_left_rank_change')->nullable();
            $table->integer('player_right_rank_change')->nullable();
            $table->foreignId('fixture_id')/*->constrained('fixtures')*/
            ;
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->unique(['key', 'season_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
