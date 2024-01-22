<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCategory;

class Tests extends Model
{
    use HasFactory;
    protected $fillable=[
        'category',
        'name',
        'slug',
        'description'
    ];

    public function category($id)
    {
      $testCategory = TestCategory::find($id);
    
      if (! $testCategory) {
        return false;
      }
    
      $this->category($testCategory)->associate();
      return true;
    }
    
    public function testCategory()
    {
        return $this->belongsTo('App\Models\TestCategory', 'category');
    }
}
