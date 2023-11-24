<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function subscriber()
    {
        return $this->hasMany(PatientMedicalAidEntry::class);
    }

    public function entries()
    {
        return $this->hasMany(PatientMedicalAidEntry::class);
    }
}
