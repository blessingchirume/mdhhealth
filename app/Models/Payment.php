<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_id',
        'amount',
        'balance',
        'date'
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
