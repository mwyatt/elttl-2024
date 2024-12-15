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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->index();
            $table->foreignId('season_id')->constrained('seasons');
            $table->string('name_first');
            $table->string('name_last');
            $table->string('slug')->nullable();
            $table->integer('rank');
            $table->string('phone_landline')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('etta_license_number')->nullable();
            $table->foreignId('team_id')/*->constrained('teams')*/
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
        Schema::dropIfExists('players');
    }
};
