<?php

use App\Models\Product;
use App\Models\Reservation;
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
        Schema::create('reservation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('PRODUCT_ID');
            // $table->unsignedBigInteger('RESERVATION_ID');
            // $table->primary(['PRODUCT_ID', 'RESERVATION_ID'])->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_products');
    }
};
