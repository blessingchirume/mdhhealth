<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function drugs_sundries()
    {
        return $this->hasMany(DrugsAndSundries::class, 'id','drug_sundry_id');
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
