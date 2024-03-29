<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalItemsCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function drugs_sundries()
    {
        return $this->hasMany(DrugsAndSundries::class,'medical_categories_id');
    }
}
