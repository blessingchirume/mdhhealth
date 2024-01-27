<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheatreAdmissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode',
        'room',
        'doctor',
        'date',
        'time_in',
        'time_out',
        'status',
        'comment',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve the episode associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function theatreRoom(){
        return $this->belongsTo(TheatreRooms::class, 'room', 'id');
    }
}
