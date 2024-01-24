<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MedicalAidController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VitalsController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\TestResultsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ObservationsController;
use App\Models\Designation;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmergencyRoomAdmissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();


Route::middleware('auth')->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('tank', [\App\Http\Controllers\TankController::class, 'index'])->name('tank.index');
    Route::get('tank/{tank}', [\App\Http\Controllers\TankController::class, 'show'])->name('tank.show');
    Route::get('patient', function () {
        return view('layouts.patients.index');
    })->name('patient.index');


    Route::prefix('/patient')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
        Route::get('/edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::post('/', [PatientController::class, 'store'])->name('patient.store');
        Route::post('/update/{patient}', [PatientController::class, 'update'])->name('patient.update');
        Route::get('/show/{patient}', [PatientController::class, 'show'])->name('patient.show');
        Route::prefix('/episode')->group(function () {
            Route::post('/{patient}', [EpisodeController::class, 'store'])->name('patient.episode.store');
            Route::get('/show/{episode}', [EpisodeController::class, 'show'])->name('patient.episode.show');
            Route::post('/create-note/{episode}', [EpisodeController::class, 'createNote'])->name('episode.create-note');
            Route::post('/create-item/{episode}', [EpisodeController::class, 'createItem'])->name('episode.create-item');
            Route::post('/create-vital/{episode}', [EpisodeController::class, 'createVital'])->name('episode.create-vital');
            Route::get('/create-chargesheet/{episode}', [EpisodeController::class, 'createChargesheet'])->name('episode.create-chargesheet');
            Route::post('/create-payment/{episode}', [EpisodeController::class, 'payment'])->name('episode.create-payment');
        });
        Route::prefix('/episode')->group(function () {
            Route::post('/{patient}', [EpisodeController::class, 'store'])->name('patient.episode.store');
            Route::get('/show/{episode}', [EpisodeController::class, 'show'])->name('patient.episode.show');
            Route::post('/create-note/{episode}', [EpisodeController::class, 'createNote'])->name('episode.create-note');
            Route::post('/create-item/{episode}', [EpisodeController::class, 'createItem'])->name('episode.create-item');
            Route::post('/create-vital/{episode}', [EpisodeController::class, 'createVital'])->name('episode.create-vital');
            Route::get('/create-chargesheet/{episode}', [EpisodeController::class, 'createChargesheet'])->name('episode.create-chargesheet');
            Route::post('/create-payment/{episode}', [EpisodeController::class, 'payment'])->name('episode.create-payment');
        });
    });

    Route::prefix('/medicalaid')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('medicalaid.index');
        Route::get('/{partner}', [PartnerController::class, 'show'])->name('medicalaid.show');
        Route::post('/associate-package/{partner}', [PartnerController::class, 'associatePackage'])->name('medicalaid.associate-package');
        Route::post('/', [PartnerController::class, 'store'])->name('medicalaid.store');
        Route::post('/{partner}', [PartnerController::class, 'update'])->name('medicalaid.update');
    });

    Route::prefix('/designation')->group(function () {
        Route::get('/', [DesignationController::class, 'index'])->name('designation.index');
        Route::post('/', [DesignationController::class, 'store'])->name('designation.store');
    });

    Route::prefix('/payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
        Route::post('/', [PaymentController::class, 'store'])->name('payment.store');
    });

    Route::prefix('/role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/{role}', [RoleController::class, 'show'])->name('role.show');
        Route::post('/', [RoleController::class, 'store'])->name('role.store');
        Route::post('/delete/{role}', [RoleController::class, 'destrole'])->name('role.deslete');
        Route::post('/{role}', [RoleController::class, 'update'])->name('role.update');
        Route::post('/permission/{role}', [RoleController::class, 'givePermission'])->name('role.give-permission');
        Route::post('/revoke-permission/{role}/{permission}', [RoleController::class, 'revokePermission'])->name('role.revoke-permission');
    });

    Route::prefix('/currency')->group(function () {
        Route::get('/', [CurrencyController::class, 'index'])->name('currency.index');
    });

    Route::get(
        'pump-reading',
        function () {
            return view('layouts.pumps.readings.index');
        }
    )->name('pump.reading.index');

    Route::get(
        'pump',
        function () {
            return view('layouts.pumps.index');
        }
    )->name('pump.index');

    Route::get(
        'test-booking/{episode}',
        [\App\Http\Controllers\LabTestsController::class, 'index']
    )->name('lab-tests.create');

    Route::get(
        'lab-results/{episode}',
        [\App\Http\Controllers\TestResultsController::class, 'results']
    )->name('view-results');

    Route::post('/lab-tests/{episode}', [\App\Http\Controllers\LabTestsController::class, 'store'])->name('lab.store');

    Route::get('/upload-test-results/{episode}', [TestResultsController::class, 'index'])->name('upload-test-results');

    Route::post('/save-test-results', [TestResultsController::class, 'addResults'])->name('save-test-results');


    Route::get(
        'branch',
        [\App\Http\Controllers\BranchController::class, 'index']
    )->name('departments.index');

    Route::get(
        'branch/{id}',
        [\App\Http\Controllers\BranchController::class, 'show']
    )->name('branch.show');

    Route::prefix('/item')->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('item.index');
        Route::post('/create-price-list', [ItemController::class, 'generatePriceList'])->name('item.create-price-list');
        Route::get('/{item}', [ItemController::class, 'show'])->name('item.show');
    });
    Route::get(
        'reciept',
        function () {
            return view('layouts.reciepts.index');
        }
    )->name('reciept.index');
    Route::get(
        'reciept',
        function () {
            return view('layouts.reciepts.index');
        }
    )->name('reciept.index');


    Route::prefix('/vitals')->group(function () {
        Route::get('/show/{episode}', [VitalsController::class, 'show'])->name('patient.vitals.show');
        Route::post('/record-vitals/{episode}', [VitalsController::class, 'recordVitals'])->name('episode.record-vital');
    });
    Route::prefix('/treatment')->group(function () {
        Route::get('/show/{episode}', [TreatmentController::class, 'show'])->name('patient.vitals.show');
        Route::post('/administer-treatment/{episode}', [TreatmentController::class, 'recordTreatment'])->name('administer-treatment');

    });
    Route::prefix('/observation')->group(function () {
        Route::get('/{episode}', [TreatmentController::class, 'observation'])->name('doctors.observation');
        Route::post('/{episode}/observations', [ObservationsController::class, 'recordObservations'])->name('create-patient-notes');
        Route::post('/{episode}/icd10-codes', [ObservationsController::class, 'assignIcd10Codes'])->name('assign-icd10-codes');
        Route::post('/{episode}/treatment-plan', [TreatmentController::class, 'createTreatmentPlan'])->name('create-treatment-plan');
    });

Route::get('/patient/emergency/create', [EmergencyRoomAdmissionsController::class, 'create'])->name('emergency-room-admissions.create');
Route::post('/emergency-room-admissions', [EmergencyRoomAdmissionsController::class, 'store'])->name('emergency-room-admissions.store');
});
Route::get('/patient/emergency/list', [EmergencyRoomAdmissionsController::class,'listPatients'])->name('emergency-room-patients.list');
