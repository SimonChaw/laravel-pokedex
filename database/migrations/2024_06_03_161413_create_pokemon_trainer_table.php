<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_trainer', function (Blueprint $table) {
            $table->id();
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->foreign('pokemon_id')->references('id')->on('pokemon');
            $table->string('nickname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_trainer');
    }
};
