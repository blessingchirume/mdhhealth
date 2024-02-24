<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function designations()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public static function getNurses()
    {
        try {
            return self::with('role', 'designations', 'branch')->whereHas('role', function ($query) {
                $query->where('name', 'Nurse')
                    ->orWhere('name', 'Sister');
            })->get();
        } catch (\Exception $e) {
            
            return $e;
        }
    }

}