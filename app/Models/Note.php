<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_id',
        'user_id',
        'comment'
    ];

    public function author() {
        return $this->belongsTo(User::class);
    }
}
