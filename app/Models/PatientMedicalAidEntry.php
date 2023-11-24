<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalAidEntry extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'patient_id',
        'policy_number',
        'member_name',
        'package_id'
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function medicalaidpackage() {
        return $this->belongsTo(MedicalAidPackage::class, 'medical_aid_package_id', 'id');
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }
}
