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
        Schema::create('screening_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('SEATS');
            $table->integer('ROWS');
            $table->decimal('PRICE_FOR_SEAT', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screening_rooms');
    }
};
