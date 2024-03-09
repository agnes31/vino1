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
        Schema::create('saq_bottles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image', 200);
            $table->string('code_saq', 50)->unique()->nullable();
            $table->string('country', 50)->nullable();
            $table->text('description', 1000)->nullable();
            $table->double('price');
            $table->string('url_saq', 200);
            $table->string('format', 50)->nullable();
            $table->timestamps();
            $table->bigInteger('type_id')->unsigned()->nullable();

            $table->foreign('types_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saq_bottles');
    }
};
