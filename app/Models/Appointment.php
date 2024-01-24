<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'time',
        'status',
        'patient_id',
        'doctor_id',
        'created_by'
    ];
}
