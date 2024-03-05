<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabBooking extends Model
{
    use HasFactory;

    protected $fillable=[
        'episode_id',
        'status'
    ];

    public function tests()
    {
        return $this->hasMany(LabTests::class,'booking');
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
