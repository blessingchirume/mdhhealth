<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function chargesheet()
    {
        return $this->belongsToMany(ChargeSheet::class, 'episode_items', 'item_id', 'episode_id');
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'episode_items', 'item_id', 'episode_id')->withPivot('quantity');
    }

    public function group() {
        return $this->belongsTo(ItemGroup::class, 'item_group_id', 'id');
    }

    public function packages() {
        return $this->hasMany(PriceGroup::class);
    }
}

