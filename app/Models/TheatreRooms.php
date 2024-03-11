<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheatreRooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'room',
        'status',
        'comment',
        'created_by',
        'updated_by',
    ];

    public function theatreAdminssions(){
        return $this->hasMany(TheatreAdmissions::class,'room','id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class,'id','ward_id');
    }
}
