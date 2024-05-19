<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = ['film_id', 'screening_room_id', 'worker_id', 'technology_id', 'promotion_id', 'START_TIME', 'END_TIME'];

    public $timestamps = false;

    public function worker(): BelongsTo {
        return $this->belongsTo(Worker::class);
    }

    public function technology(): BelongsTo {
        return $this->belongsTo(Technology::class);
    }

    public function promotion(): BelongsTo {
        return $this->belongsTo(Promotion::class);
    }

    public function film(): BelongsTo {
        return $this->belongsTo(Film::class);
    }

    public function screeningRoom(): BelongsTo {
        return $this->belongsTo(ScreeningRoom::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}
