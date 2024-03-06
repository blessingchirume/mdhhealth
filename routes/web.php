<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LaboratoryController;
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
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\SurgeryController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ICUAdmissionController;
use App\Http\Controllers\BedController;

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

    Route::prefix('/users')->group(function(){
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('/', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
        Route::post('/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::post('/{user}/delete', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
        Route::post('/{user}/assign-role', [\App\Http\Controllers\UserController::class, 'assignRole'])->name('users.role.assign');
    });

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::get('show/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.show');
    Route::post('store', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::patch('update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('destroy/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    });

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

    Route::prefix('laboratory')->group(function(){
        Route::get('/', [LaboratoryController::class, 'index'])->name('laboratory.index');
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
        Route::get('/wards', [WardController::class, 'index'])->name('designation.ward.index');
        Route::get('/wards/{ward}', [WardController::class, 'show'])->name('designation.ward.show');
        Route::get('/wards/{ward}/edit', [WardController::class, 'show'])->name('designation.ward.edit');
        Route::post('/wards', [WardController::class, 'store'])->name('designation.ward.store');
        Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/{designation}', [DesignationController::class, 'edit'])->name('designation.edit');
    });


    Route::prefix('beds')->group(function () {
        Route::post('/{ward}', [BedController::class, 'store'])->name('ward.beds.store');
        Route::get('/{bed}', [BedController::class, 'bedsShow'])->name('ward.beds.show');
        Route::get('/edit', [BedController::class, 'bedsEdit'])->name('ward.beds.edit');
        Route::post('/{bed}', [BedController::class, 'bedsUpdate'])->name('ward.beds.update');
        Route::post('/{bed}/delete', [BedController::class, 'bedsDestroy'])->name('ward.beds.delete');
    });

    Route::prefix('ward')->group(function () {
        Route::get('/', [WardController::class, 'index'])->name('ward.index');
        Route::get('/create', [WardController::class, 'create'])->name('ward.create');
        Route::post('/', [WardController::class, 'store'])->name('ward.store');
        Route::get('/{ward}', [WardController::class, 'show'])->name('ward.show');
        Route::get('/{ward}/edit', [WardController::class, 'edit'])->name('ward.edit');
        Route::post('/{ward}', [WardController::class, 'update'])->name('ward.update');
        Route::post('/{ward}/delete', [WardController::class, 'destroy'])->name('ward.delete');
        Route::post('/{ward}/restore', [WardController::class, 'restore'])->name('ward.restore');
        Route::get('/{ward}/beds', [WardController::class, 'beds'])->name('ward.beds');

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
        [\App\Http\Controllers\LabTestsController::class, 'book']
    )->name('test-booking');

    Route::get(
        'laboratory',
        [\App\Http\Controllers\LabTestsController::class, 'index']
    )->name('laboratory.index');

    Route::get(
        'laboratory/bookings',
        [LaboratoryController::class, 'show']
    )->name('laboratory.bookings');

    Route::get(
        'lab-results/{booking}',
        [TestResultsController::class, 'results']
    )->name('view-results');

    Route::get('lab-tests/conclude/{booking}',[LaboratoryController::class,'conclude'])->name('laboratory.conclude-test');

    Route::post('/lab-tests/{episode}', [\App\Http\Controllers\LabTestsController::class, 'store'])->name('lab.store');

    Route::get('/upload-test-results/{booking}', [TestResultsController::class, 'create'])->name('upload-test-results');

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
        Route::get('/', [VitalsController::class, 'index'])->name('patient.vitals.index');
        Route::get('/show/{episode}', [VitalsController::class, 'show'])->name('patient.vitals.show');
        Route::get('/record/{episode}', [VitalsController::class, 'create'])->name('patient.vitals.create');
        Route::post('/record-vitals/{episode}', [VitalsController::class, 'recordVitals'])->name('episode.record-vital');
    });
    Route::prefix('/treatment')->group(function () {
        Route::get('/show/{episode}', [TreatmentController::class, 'show'])->name('patient.treatments.view');
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


Route::prefix('/appointments')->group(function () {
    Route::get('/', [AppointmentsController::class,'index'])->name('appointments');
    Route::get('/create', [AppointmentsController::class, 'create'])->name('create-appointment');
    Route::post('/add-booking', [AppointmentsController::class, 'create'])->name('book-appointment');
    Route::get('/list', [AppointmentsController::class, 'showAppointments'])->name('show-appointments');
    Route::get('/fetch', [AppointmentsController::class, 'fetch'])->name('fetch-appointments');
    Route::get('/show/{id}', [AppointmentsController::class, 'show'])->name('show-appointment-details');
});


Route::post('/send-to-theatre', [TheatreController::class,'sendToTheatre'])->name('send-to-theatre');
Route::get('/calculate-bill/{episode}', [TheatreController::class,'calculateBill'])->name('calculate-bill');
Route::get('/theatre', [TheatreController::class,'index'])->name('theatre.index');
Route::get('/theatre/{episode}', [TheatreController::class,'show'])->name('theatre.show');
Route::get('/theatre/queue/{episode}', [TheatreController::class,'queue'])->name('theatre.queue');
Route::get('/send-to-theatre-queue', [TheatreController::class,'sendToTheatreQueue'])->name('send_to_theatre');
Route::post('/send-to-theatre-ajax', [TheatreController::class,'sendToTheatreAjax'])->name('send_to_theatre_ajax');


Route::get('/surgery/start/{id}', [SurgeryController::class, 'startSurgery'])->name('surgery_start');
Route::get('/surgery/end/{id}', [SurgeryController::class, 'endSurgery'])->name('surgery_end');


Route::prefix('/staff')->group(function () {
  Route::get('/doctors', [DoctorController::class, 'index'])->name('view-doctors');
  Route::get('/nurses', [NurseController::class, 'index'])->name('view-nurses');
});

Route::prefix('/icu')->group(function () {
   Route::get('/', [ICUAdmissionController::class, 'index'])->name('icu');
   Route::get('/admissions/{id}', [ICUAdmissionController::class, 'show'])->name('icu.show');
});
