<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKeen extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'next_of_keen_name',
        'next_of_keen_surname',
        'next_of_keen_phone',
        'next_of_keen_gender',
        'next_of_keen_national_id',
        'next_of_keen_address',
        'next_of_keen_relationship'
    ];

    public function patient() {
        return $this->belongsTo(patient::class);
    }
}
