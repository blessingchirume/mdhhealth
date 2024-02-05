<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICUAdmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_id',
        'comment',
        'severity_score',
        'created_at',
        'updated_at'
    ];
    const STATUSES = [
        'active' => 'Active',
        'discharged' => 'Discharged',
        'transfered' => 'Transfered'
    ];

    public function admission()
    {
        return $this->belongsTo(EmergencyRoomAdmimission::class);
    }

}
