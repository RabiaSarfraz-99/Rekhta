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
        Schema::create('word_of_the_days', function (Blueprint $table) {
            $table->id();
            $table->string('engword');
            $table->string('hinword');
            $table->string('urdword');
            $table->string('meaning');
            $table->string('sher');
            $table->string('poet');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_of_the_days');
    }
};
