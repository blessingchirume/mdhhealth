<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'name'
    ];
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

    public function items() {
        return $this->hasMany(PriceGroup::class);
    }

    public function itemPrice($itemCode, $packageId) {
        return $this->hasMany(PriceGroup::class)->where(['item_id' => $itemCode, 'package_id' => $packageId])->first();
    }
}
