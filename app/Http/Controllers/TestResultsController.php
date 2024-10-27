<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests;
use App\Models\Episode;
use App\Models\TestCategory;
use App\Models\LabTests;
use App\Models\LabBooking;
use Illuminate\Support\Facades\Auth;
use Exception;

class TestResultsController extends Controller
{
    public function create(LabBooking $booking)
    {
        $bookedLabTests = [];
        $labtests = LabBooking::with('tests')->where('id', $booking->id)->first();

        foreach ($labtests->tests as $labtest) {
            $testname = Tests::find($labtest->test);
            $category = TestCategory::find($testname->category);

            $categoryName = $category->name;

            if (!isset($setCategory) || $setCategory !== $categoryName) {
                $bookedLabTests[$categoryName] = [
                    'category' => $categoryName,
                    'tests' => [],
                ];
            }

            $bookedLabTests[$categoryName]['tests'][] = [
                'name' => $testname->name,
                'slug' => $testname->slug,
                'id' => $labtest->id,
                'result' => $labtest->result ?? null,
                'comment' => $labtest->comment ?? null
            ];

            $setCategory = $categoryName;
        }

        $bookedTests = $this->arrayToObject($bookedLabTests);

        $age = PatientController::calculateAge($booking->episode->patient->dob);
        return view('layouts.laboratory.add-results', compact('booking', 'bookedTests', 'age'));
    }
    public function addResults(Request $request)
    {
        $selectedTests = $request->input('test_results');

        // Add the result to the selected tests
        try {
            //update LabBooking set status In Progress
            $booking = LabBooking::find($request->input('booking_id'));
            $booking->status = 'In-Progress';
            $booking->save();

            foreach ($selectedTests as $testId => $resultData) {
                $test = LabTests::find($testId);
                $test->result = $resultData['result'];
                $test->comment = $resultData['comment'];
                $test->status = 'Completed';
                $test->uploaded_by = Auth::user()->id;
                $test->save();
            }
            return redirect()->back()->with('success', 'Test Results Uploaded successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Tests Booking: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An Error occurred while adding test results. Please Notify Systems Administrator For Assistance.');
        }
    }

    public function results(LabBooking $booking)
    {
        // Fetch test results for the episode
        $testResults = LabTests::where('booking', $booking->id)
            ->join('tests', 'lab_tests.test', '=', 'tests.id')
            ->select('lab_tests.*', 'tests.name')
            ->get();
        $age = PatientController::calculateAge($booking->episode->patient->dob);
        return view('layouts.laboratory.view-results', compact('booking', 'testResults', 'age'));
    }
    private function arrayToObject($array)
    {
        $object = new \stdClass();

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $object->$key = $this->arrayToObject($value); // Recursively convert nested arrays to objects
            } else {
                $object->$key = $value;
            }
        }

        return $object;
    }
}
