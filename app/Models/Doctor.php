<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

  protected $table = 'users';

    public function appointments(){
        return $this->hasMany(Appointment::class,'doctor_id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public function designations(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
    
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public static function getDoctors()
{
    return self::with('role', 'designations', 'branch')->whereHas('role', function ($query) {
        $query->where('name', 'Doctor');
    })->get();
}
}
