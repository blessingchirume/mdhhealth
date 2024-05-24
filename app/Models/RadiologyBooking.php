<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyBooking extends Model
{
    use HasFactory;

    protected $fillable=[
        'scan_category_id',
        'episode_id',
        'status'
    ];

    public function scans()
    {
        return $this->hasMany(ScanCategory::class,'id' ,'scan_category_id');
    }

    public function episode()
    {
        return $this->hasOne(Episode::class,'id','episode_id');
    }
}
