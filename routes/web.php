<?php

use App\Http\Controllers\RVController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
})->name('accueil');

route::get('login', [HomeController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/localites/{specialite}', [HomeController::class, 'getLocalitesBySpecialite']);
Route::get('/medecins/{localite}', [HomeController::class, 'getMedecinsByLocalite']);

Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');

Route::get('/liste_rendez_vous', [HomeController::class, 'listeRendezVous'])->name('liste_rv');

Route::post('/update_rendez_vous/{id}', [HomeController::class, 'updateRendezVous'])->name('update_rv');

Route::get('/rendezvous/{id}/edit', [HomeController::class, 'editRendezVous'])->name('rendezvous.edit');
Route::put('/rendezvous/{id}', [HomeController::class, 'updateRendezVous'])->name('rendezvous.update');

Route::match(['get', 'post'], '/liste_rendez_vous', [HomeController::class, 'listeRendezVous'])->name('liste_rv');
Route::delete('/delete_rendez_vous/{id}', [HomeController::class, 'deleteRendezVous'])->name('delete_rv');

// Route::get('/download-pdf/{id}', [HomeController::class, 'downloadPDF'])->name('download-pdf');












// Route::get('/appointment/form', [App\Http\Controllers\HomeController::class, 'showAppointmentForm'])->name('showAppointmentForm');


