<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function episodes() {
        return $this->hasMany(Episode::class);
    }

    public function medicalaid() {
        return $this->hasOne(PatientMedicalAidEntry::class);
    }

    public function nextofkeen() {
        return $this->hasOne(NextOfKeen::class);
    }

    public function acruals() {
        return $this->episodes()->where('amount_due', '>', 0);
    }

    public function guarantor() {
        return $this->hasOne(Gurantor::class);
    }
}
