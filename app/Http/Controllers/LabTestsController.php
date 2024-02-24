<?php
namespace App\Http\Controllers;

use stdClass;
use App\Models\LabTests;
use App\Models\TestCategory;
use Illuminate\Http\Request;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Exception;
use Log;

class LabTestsController extends Controller
{
    public function book(Episode $episode)
    {
        $categories = TestCategory::with('tests')->get();
        $age = PatientController::calculateAge($episode->patient->dob);

        return view('layouts.laboratory.lab-booking', compact('categories', 'episode', 'age'));
    }

    public function index(){
        $episodes = Episode::with('labTests')->get();
        return view('layouts.laboratory.index', compact('episodes'));
    }

    public function store(Request $request, Episode $episode)
    {
        $validatedData = $request->validate([
            'tests' => 'required|array',
        ]);

        try {
            foreach ($validatedData['tests'] as $testId) {
                $test = new LabTests();
                $test->category_id = $test->getCategoryForTest($testId);
                $test->episode = $episode->id;
                $test->refered_by = Auth::user()->id;
                $test->test = $testId;
                $test->status = 'Pending';
                $test->save();
            }
            logger()->info('Tests Booking created successfully.');
            return redirect()->back()->with('success', 'Tests Booking created successfully.');
        } catch (Exception $e) {
            logger()->error('An Error occurred while creating a new Tests Booking: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'An Error occurred while creating a new Tests Booking. Please Notify Systems Administrator For Assistance.');
        }
    }
}
