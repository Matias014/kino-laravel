<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['screening_room_id', 'ROW', 'SEAT_IN_ROW', 'VIP'];

    public $timestamps = false;

    public function reservation_seats(): HasMany {
        return $this->hasMany(ReservationSeat::class);
    }

    public function screening_room(): BelongsTo {
        return $this->belongsTo(ScreeningRoom::class);
    }
}
