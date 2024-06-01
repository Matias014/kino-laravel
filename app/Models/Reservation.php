<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['seance_id', 'user_id'];

    public $timestamps = false;

    public function reservationSeats(): HasMany {
        return $this->hasMany(ReservationSeat::class);
    }

    public function reservationProducts(): HasMany {
        return $this->hasMany(ReservationProduct::class);
    }

    public function tickets(): HasMany {
        return $this->hasMany(Ticket::class);
    }

    public function seance(): BelongsTo {
        return $this->belongsTo(Seance::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
