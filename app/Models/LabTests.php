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

function getCategoryForTest($testId) {
    // Implement logic to retrieve the category ID for the given test ID
            $test = Tests::find($testId);

            if (!$test) {
                throw new Exception("Test not found");
            }
            $categoryId = $test->category;

            $category = TestCategory::where('id', $categoryId)->first();

            if (!$category) {
                throw new Exception("Category not found");
            }

            return $category->id;
        }


        function getTestName($testId) {
            // Implement logic to retrieve the test name for the given test ID
            return Tests::find($testId)->name;
        }
}
