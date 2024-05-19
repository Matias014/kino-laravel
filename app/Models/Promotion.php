<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['DISCOUNT', 'START_TIME', 'END_TIME'];

    public $timestamps = false;

    public function seances(): HasMany {
        return $this->hasMany(Seance::class);
    }
}
