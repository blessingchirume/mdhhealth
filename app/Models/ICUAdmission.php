<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICUAdmission extends Model
{
    use HasFactory;

    protected $fillable=[
        'admission_id','comment','severity_score','created_at','updated_at'
    ];

    public function admission(){
        return $this->hasMany(EmergencyRoomAdmimission::class,'admission_id','id');
    }
}
