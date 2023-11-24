<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function chargesheet() {
        return $this->hasOne(ChargeSheet::class);
    }
    
}
