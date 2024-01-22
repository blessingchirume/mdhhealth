<?php
namespace App\Http\Controllers;
use stdClass;
use App\Models\Tests;
use App\Models\TestCategory;
use Illuminate\Http\Request;

class LabTestsController extends Controller{
    public function index()
    {
        $categories = TestCategory::with('tests')->get();
        
        return view('layouts.lab.lab', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'tests' => 'required|array', // Ensure that 'tests' is present and is an array
            // Add more validation rules as needed
        ]);
    
        // Process and save the selected tests
        foreach ($validatedData['tests'] as $testId) {
            // Assuming you have a Test model, you can create and save the test here
            $test = new LabTests();
            $test->category_id = getCategoryForTest($testId); // You may need to define getCategoryForTest function
            $test->name = getTestName($testId); // You may need to define getTestName function
            // Add more properties as needed
            $test->save();
        }
    
        // Redirect or return a response
    }
}