<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyRoomAdmimission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'medical_history','status','created_by','episode', 'admit_to','type'];

    public function episode()
{
    return $this->belongsTo(Episode::class, 'episode');
}

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function maternityAdmission(){
        return $this->belongsTo(MaternityAdmission::class);
    }
}
