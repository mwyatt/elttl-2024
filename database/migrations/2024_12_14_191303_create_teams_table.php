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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->index();
            $table->foreignId('season_id')->constrained('seasons');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->tinyInteger('home_weekday');

            // @todo add foreign key constraints /*->constrained('players')*/
            $table->foreignId('secretary_id');
            $table->foreignId('venue_id')->constrained('venues');
            $table->foreignId('division_id')/*->constrained('divisions')*/
            ;
            $table->timestamps();
            $table->unique(['key', 'season_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
