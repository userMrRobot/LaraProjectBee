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
        Schema::table('bees', function (Blueprint $table) {
            $table->unsignedTinyInteger('max_bee_1')->default(0);
            $table->unsignedTinyInteger('max_bee_2')->default(0);
            $table->unsignedTinyInteger('max_bee_3')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bees', function (Blueprint $table) {
            $table->dropColumn('max_bee_1');
            $table->dropColumn('max_bee_2');
            $table->dropColumn('max_bee_3');
        });
    }
};
