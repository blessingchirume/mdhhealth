<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCategory;
use App\Models\Tests;
use Exception;

class LabTests extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'test',
        'episode_id',
        'result',
        'test_date',
        'test_time',
        'comment',
        'status',
        'uploaded_by',
        'refered_by',
    ];

    public function test()
    {
        return $this->belongsTo(Tests::class, 'test');
    }

    public function category()
    {
        return $this->belongsTo(TestCategory::class, 'category_id');
    }

    public function getCategoryForTest($testId)
    {
        // Implement logic to retrieve the category ID for the given test ID
        $test = Tests::find($testId);

        if (!$test) {
            throw new Exception("Test not found");
        }

        return $test->category;
    }

    public function getTestName($testId)
    {
        // Implement logic to retrieve the test name for the given test ID
        $test = Tests::find($testId);
        if ($test) {
            return $test->name;
        }
        throw new Exception("Test not found");
    }
}
