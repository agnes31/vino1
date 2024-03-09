<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\WineRoomController;
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

Route::get('/cellars', function () {
    return view('cellars');
})->middleware(['auth', 'verified'])->name('cellars');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CELLIERS
Route::get('/cellars', [CellarController::class, 'index'])->name('cellars.index');
Route::get('/cellars-create', [CellarController::class, 'create'])->name('cellars.create');
Route::post('/cellars-create', [CellarController::class, 'store'])->name('cellars.store');
Route::get('/cellars/{cellar}', [CellarController::class, 'show'])->name('cellars.show');
Route::get('/cellars-edit/{cellar}', [CellarController::class, 'edit'])->name('cellars.edit');
Route::put('/cellars-edit/{cellar}', [CellarController::class, 'update']);
Route::delete('/cellars/{cellar}', [CellarController::class, 'destroy']);

// BOUTEILLES   
Route::get('/bottles', [BottleController::class, 'index'])->name('bottles.list');

// BOUTEILLES CELLIER
Route::delete('/bottlesCellar/delete', [WineRoomController::class, 'destroy']);
Route::get('/bottlesCellar/add/{cellar}', [WineRoomController::class, 'addBottleToCellar'])->name('bottlesCellar.addBottleToCellar');
Route::post('/bottlesCellar/add/{cellar}', [WineRoomController::class, 'add'])->name('bottlesCellar.add');

require __DIR__ . '/auth.php';
