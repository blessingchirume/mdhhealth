<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiology extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function bookings()
    {
        return $this->belongsTo(RadiologyBooking::class);
    }
}
