<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[

        'start_time',
        'end_time',
        'status',
        'patient_id',
        'booking_comment',
        'doctor_id',
        'created_by'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
