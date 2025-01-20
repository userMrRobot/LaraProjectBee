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
        Schema::create('moneys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('silver')->default(0);
            $table->unsignedBigInteger('gold')->default(0);
            $table->unsignedBigInteger('rub_up')->default(0);
            $table->unsignedBigInteger('rub_down')->default(0);
            $table->unsignedBigInteger('credit_up')->default(0);
            $table->unsignedBigInteger('credit_down')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money');
    }
};
