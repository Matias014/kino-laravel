<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationProduct extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id', 'product_id'];

    public $timestamps = false;

    public $incrementing = false; // Dodaj to, aby wyłączyć automatyczne zwiększanie wartości ID

    protected $primaryKey = null; // Dodaj to, aby wskazać, że nie ma pojedynczego klucza głównego

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function reservation(): BelongsTo {
        return $this->belongsTo(Reservation::class);
    }
}
