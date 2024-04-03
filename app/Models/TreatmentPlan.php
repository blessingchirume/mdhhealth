<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentPlan extends Model
{
    use HasFactory;
    protected $fillable =[
        'episode_id','medication','dosage','frequency','duration','instructions', 'item_id'
    ];

    public function items() {
        return $this->belongsTo(Item::class);
    }
}
