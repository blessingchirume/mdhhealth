<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargesheetItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'charge_sheet_id',
        'quantity',
    ];
}
