<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10CodeAssign extends Model
{
    use HasFactory;

    protected $fillable = ['episode_id', 'code'];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

}
