<?php

use App\Models\Film;
use App\Models\Promotion;
use App\Models\ScreeningRoom;
use App\Models\Technology;
use App\Models\Worker;
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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Film::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(ScreeningRoom::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Worker::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Technology::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Promotion::class)->constrained()->onDelete('cascade');
            $table->timestamp('START_TIME');
            $table->timestamp('END_TIME');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
