<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScreeningRoom extends Model
{
    use HasFactory;

    protected $fillable = ['SEAT', 'ROW'];

    public $timestamps = false;

    public function seances(): HasMany {
        return $this->hasMany(Seance::class);
    }

    public function seats(): HasMany {
        return $this->hasMany(Seat::class);
    }
}
