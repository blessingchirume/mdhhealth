<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCategory;

class Tests extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'name',
        'slug',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(TestCategory::class, 'category');
    }

    // Additional methods and logic can be added here
}

