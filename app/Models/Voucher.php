<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['NAME', 'DISCOUNT', 'PRICE'];

    public $timestamps = false;

    public function reservation(): HasMany {
        return $this->hasMany(Ticket::class);
    }
}
