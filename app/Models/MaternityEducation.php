<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternityEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
        'episode',
        'created_at',
        'updated_at'
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class,'id','episode_id');
    }
}
