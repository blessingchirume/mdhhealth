<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function currencies() {
        return $this->belongsToMany(Currency::class, 'currency_groups', 'group_id', 'currency_id')->withPivot('rate');
    }
}
