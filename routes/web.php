<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/aanbieden', [CarController::class, 'create'])->name('cars.create');
    Route::post('/kenteken-check', [CarController::class, 'checkLicensePlate'])->name('cars.checkLicensePlate');
    Route::post('/aanbieden', [CarController::class, 'store'])->name('cars.store');
    Route::get('/mijn-autos', [CarController::class, 'index'])->name('cars.index');
    Route::delete('/mijn-autos/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
});

require __DIR__.'/auth.php';
