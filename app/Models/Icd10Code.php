<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10Code extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description'];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function getFormattedDescriptionAttribute()
    {
        return ucfirst($this->description);
    }
}
