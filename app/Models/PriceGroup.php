<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'package_id',
        'price'
    ];

    public function package() {
        return $this->belongsTo(Package::class);
    }
}
