<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    public function beds()
    {
        return $this->hasMany(Bed::class, 'ward_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Designation::class);
    }
}
