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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->index();
            $table->foreignId('season_id')->constrained('seasons');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->unique(['key', 'season_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
