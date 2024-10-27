<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'item_id',
    ];

    public function bookings()
    {
        return $this->hasMany(RadiologyBooking::class);
    }
}
