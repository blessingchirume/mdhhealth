<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_id',
        'item_id',
        'qunatity'
    ];
}
