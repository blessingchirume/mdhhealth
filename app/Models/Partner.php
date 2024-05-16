<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'acronym'
    ];

    public function packages() {
        return $this->hasMany(Package::class);
    }
}
