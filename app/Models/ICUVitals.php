<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICUVitals extends Model
{
    use HasFactory;

    protected $fillable =[
        'icu_admission_id', 'vital', 'value','created_at','updated_at'
    ];
}
