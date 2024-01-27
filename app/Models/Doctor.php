<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'speciality',
        'phone',
        'email',
        'status',
        'created_by',
        'updated_by',
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class,'doctor_id');
    }
}
