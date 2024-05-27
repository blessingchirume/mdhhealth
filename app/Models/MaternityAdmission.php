<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternityAdmission extends Model
{
    protected $table = 'maternity_admissions';
    protected $fillable = [
        'admission_id', 
        'gestational_age', 
        'estimated_delivery_date', 
        'prenatal_care_provider', 
        'status', 
        'date'];

    public function admission()
    {
        return $this->hasMany(EmergencyRoomAdmimission::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class,'id', 'episode_id');
    }
}
