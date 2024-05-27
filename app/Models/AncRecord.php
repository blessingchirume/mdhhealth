<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AncRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'episde_id',
        'created_at',
        'updated_at'
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class, 'id', 'episode_id');
    }
}
