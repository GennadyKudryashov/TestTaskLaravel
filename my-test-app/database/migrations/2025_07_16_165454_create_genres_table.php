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
        Schema::create('genres', function (Blueprint $table) {
           // $table->id();
            $table->uuid('id');
            $table->string('name',250);
            $table->timestamps();
        });

        Schema::create('genre_films', function (Blueprint $table) {
            $table->id();
            $table->uuid('film_id');
            $table->uuid('genre_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
        Schema::dropIfExists('genre_films');
    }
};
