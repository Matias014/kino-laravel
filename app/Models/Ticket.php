<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id', 'voucher_id', 'PRICE', 'STATUS_OF_PAYMENT'];

    public $timestamps = false;

    public function reservation(): BelongsTo {
        return $this->belongsTo(Reservation::class);
    }

    public function voucher(): BelongsTo {
        return $this->belongsTo(Voucher::class);
    }
}
