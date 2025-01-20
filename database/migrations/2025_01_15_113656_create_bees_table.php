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
        Schema::create('bees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bee_1')->default(0);
            $table->unsignedBigInteger('bee_2')->default(0);
            $table->unsignedBigInteger('bee_3')->default(0);
            $table->unsignedBigInteger('med')->default(0);
            $table->unsignedBigInteger('med_all')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bees');
    }
};
