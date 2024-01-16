<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chargesheet() {
        return $this->hasOne(ChargeSheet::class);
    }

    public function vitals() {
        return $this->hasMany(Vital::class);
    }

    public function notes () {
        return $this->hasMany(Note::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'episode_items', 'episode_id', 'item_id')->withPivot('quantity');
    }

    public function patient() {
        return $this->belongsTo(patient::class);
    }

    public function icd10code()
    {
        return $this->belongsTo(Icd10Code::class);
    }
    public function designations() {
        return $this->hasMany(Designation::class);
    }
}
