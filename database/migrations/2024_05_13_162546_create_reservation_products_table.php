<?php

use App\Models\Product;
use App\Models\Reservation;
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
        Schema::create('reservation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('PRODUCT_ID');
            // $table->unsignedBigInteger('RESERVATION_ID');
            // $table->primary(['PRODUCT_ID', 'RESERVATION_ID'])->onDelete('cascade');
        });

        // Create trigger
        DB::statement('
            CREATE OR REPLACE TRIGGER trg_check_duplicate_reservation_product
            BEFORE INSERT OR UPDATE ON reservation_products
            FOR EACH ROW
            DECLARE
                PRAGMA AUTONOMOUS_TRANSACTION;
                v_count NUMBER;
            BEGIN
            -- Sprawdzenie, czy istnieje już rezerwacja z tym samym produktem
            IF :NEW.id IS NULL THEN
                -- Dla nowych rekordów (INSERT)
                SELECT COUNT(*)
                INTO v_count
                FROM reservation_products
                WHERE product_id = :NEW.product_id
                AND reservation_id = :NEW.reservation_id;
            ELSE
                -- Dla aktualizacji istniejących rekordów (UPDATE)
                SELECT COUNT(*)
                INTO v_count
                FROM reservation_products
                WHERE product_id = :NEW.product_id
                AND reservation_id = :NEW.reservation_id
                AND id != :NEW.id;
            END IF;

            -- Jeśli istnieje, zgłoszenie wyjątku
            IF v_count > 0 THEN
                RAISE_APPLICATION_ERROR(-20001, \'Produkt już zarezerwowany dla tej rezerwacji.\');
            END IF;

            -- Zakończ transakcję
            COMMIT;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_products');

        // Drop trigger
        DB::statement('DROP TRIGGER trg_check_duplicate_reservation_product');
    }
};
