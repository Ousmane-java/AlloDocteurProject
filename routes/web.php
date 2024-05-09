<?php

use App\Http\Controllers\HopitalController;
use App\Http\Controllers\RVController;
use Illuminate\Support\Facades\Auth;
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
    return view('accueil');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::get('/reservationrv',[RVController::class,'index'])->name('rv');
use App\Http\Controllers\HomeController;

Route::get('/localites/{specialite}', [HomeController::class, 'getLocalitesBySpecialite']);
Route::get('/medecins/{localite}', [HomeController::class, 'getMedecinsByLocalite']);



// Route::get('/appointment/form', [App\Http\Controllers\HomeController::class, 'showAppointmentForm'])->name('showAppointmentForm');


