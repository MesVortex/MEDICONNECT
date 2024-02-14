<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\MedicinController;
use App\Models\Appointement;
use App\Models\Medicin;
use App\Models\Speciality;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/patient/index', function () {
        if (auth()->user()->role === 'patient') {
            return view('patient.index'); 
        }
        return redirect('/');
    })->name('patient.index');

    Route::get('/patient/doctorPage', function () {
        if (auth()->user()->role === 'patient') {
            $appointements = Appointement::with('patient')->get();
            return view('patient.doctorPage', compact('appointements')); 
        }
        return redirect('/');
    })->name('patient.doctorPage');

    Route::get('/doctor/index', function () {
        if (auth()->user()->role === 'doctor') {
            $medicins = Medicin::with('speciality')->get();
            $specialities = Speciality::all();
            return view('doctor.index', compact('medicins', 'specialities'));
        }
        return redirect('/');
    })->name('doctor.index');
    
    Route::get('/doctor/appointements', function () {
        if (auth()->user()->role === 'doctor') {
            $appointements = Appointement::with('patient')->get();
            return view('doctor.appointements', compact('appointements'));
        }
        return redirect('/');
    })->name('doctor.appointements');

    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            $specialities = Speciality::all();
            return view('admin.dashboard', compact('specialities'));
        }
        return redirect('/');
    })->name('admin.dashboard');

    Route::get('/admin/dashboard/medicin', function () {
        if (auth()->user()->role === 'admin') {
            $medicins = Medicin::with('speciality')->get();
            $specialities = Speciality::all();
            return view('admin.medicinDashboard', compact('medicins', 'specialities'));
        }
        return redirect('/');
    })->name('admin.medicinDashboard');
});


Route::post('/admin/dashboard/speciality/add', [SpecialityController::class, 'store'])->name('speciality.store');
Route::put('/admin/dashboard/{speciality}', [SpecialityController::class, 'update'])->name('speciality.update');
Route::delete('/admin/dashboard/{speciality}/delete', [SpecialityController::class, 'destroy'])->name('speciality.destroy');


Route::post('/admin/dashboard/medicin/add', [MedicinController::class, 'store'])->name('medicin.store');
Route::put('/admin/dashboard/{medicin}/update', [MedicinController::class, 'update'])->name('medicin.update');
Route::get('/admin/dashboard/{medicin}/archive', [MedicinController::class, 'archive'])->name('medicin.archive');


require __DIR__.'/auth.php';
