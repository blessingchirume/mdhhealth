<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MedicalAidController;
use App\Http\Controllers\PatientController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
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
        });
    });

    Route::prefix('/medicalaid')->group(function () {
        Route::get('/', [MedicalAidController::class, 'index'])->name('medicalaid.index');
        Route::post('/', [MedicalAidController::class, 'store'])->name('medicalaid.store');
    });


    Route::get(
        'tank-reading',
        function () {
            return view('layouts.tanks.readings.index');
        }
    )->name('tank.reading.index');

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
        'branch',
        [\App\Http\Controllers\BranchController::class, 'index']
    )->name('branch.index');

    Route::get(
        'branch/{id}',
        [\App\Http\Controllers\BranchController::class, 'show']
    )->name('branch.show');

    Route::get(
        'item',
        function () {
            return view('layouts.items.index');
        }
    )->name('item.index');

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
});
