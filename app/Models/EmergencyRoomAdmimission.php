<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyRoomAdmimission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'medical_history','status','created_by','episode'];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
