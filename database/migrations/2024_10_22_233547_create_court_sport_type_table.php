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
        Schema::create('court_sport_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')->references('id')->on('courts');
            $table->unsignedBigInteger('sport_type_id');
            $table->foreign('sport_type_id')->references('id')->on('sport_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_sport_type');
    }
};
