<?php

use App\Models\User;
use App\Models\Seance;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Seance::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            // $table->timestamps(); // Ensure timestamps are included
        });

        // // Create sequence
        // DB::statement('
        //     CREATE SEQUENCE RESERVATION_SEQ
        //     START WITH 1
        //     INCREMENT BY 1
        //     NOCACHE
        // ');

        // // Create trigger
        // DB::statement('
        //     CREATE OR REPLACE TRIGGER RESERVATION_BEFORE_INSERT
        //     BEFORE INSERT ON reservations
        //     FOR EACH ROW
        //     BEGIN
        //       IF :NEW.id IS NULL THEN
        //         SELECT RESERVATION_SEQ.NEXTVAL
        //         INTO :NEW.id
        //         FROM dual;
        //       END IF;
        //     END;
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');

        // // Drop trigger
        // DB::statement('DROP TRIGGER RESERVATION_BEFORE_INSERT');

        // // // Drop sequence
        // DB::statement('DROP SEQUENCE RESERVATION_SEQ');
    }
};
