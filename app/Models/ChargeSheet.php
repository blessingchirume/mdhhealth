<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeSheet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items() {
        return $this->belongsToMany(Item::class, 'chargesheet_items', 'charge_sheet_id', 'item_id');
    }

    public function episode(){
        return $this->belongsToMany(Episode::class);
    }

    public function chargesheetitems() {
        return $this->hasMany(ChargesheetItem::class);
    }
}
