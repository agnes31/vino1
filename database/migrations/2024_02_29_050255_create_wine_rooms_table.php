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
        Schema::create('wine_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->timestamps();
            $table->bigInteger('cellar_id')->unsigned()->nullable();
            $table->bigInteger('saq_bottle_id')->unsigned()->nullable();

            $table->foreign('cellar_id')->references('id')->on('cellars');
            $table->foreign('saq_bottle_id')->references('id')->on('saq_bottles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_rooms');
    }
};
