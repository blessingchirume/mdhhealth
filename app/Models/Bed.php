<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    use HasFactory;

    protected $fillable=[
        'ward_id',
        'name',
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

}
