<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAidPackage extends Model
{
    use HasFactory;
    
    function MedicalAid()
    {
        return $this->belongsTo(MedicalAid::class);
    }

    public function subscriber()
    {
        return $this->hasMany(PatientMedicalAidEntry::class);
    }

    function Price()
    {
        return $this->hasOne(MedicalAidPriceList::class);
    }

    public function billingGroup()
    {
        return $this->belongsTo(Group::class);
    }
}
