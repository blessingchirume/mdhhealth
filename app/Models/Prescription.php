<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prescription_items()
    {
        return $this->hasMany(PrescriptionItem::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
