<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTests extends Model
{
    use HasFactory;

    protected $fillable =[
        'category',
        'test',
        'episode',
        'result',
        'test_date',
        'test_time',
        'comment',
        'status',
        'user_id',
        'doctor_id',
        ];
}
