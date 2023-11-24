<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAid extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_code',
        'provider_name'
    ];

    function packages() {
        return $this->hasMany(MedicalAidPackage::class);
    }
}
