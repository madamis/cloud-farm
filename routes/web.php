<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\FarmTypeController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
});

Route::get('/dashboard', [FarmingController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin/')->group(function (){
        Route::prefix('farm_types')->group(function(){
            Route::get('/', [FarmTypeController::class, 'index'])->name('admin.farm_type.index');
            Route::post('/', [FarmTypeController::class, 'store'])->name('admin.farm_type.store');
        });

        Route::prefix('farm')->group(function(){
            Route::get('/', [FarmController::class, 'index'])->name('admin.farm.index');
        });
        Route::prefix('activities')->group(function (){
            Route::get('/', [ActivityController::class, 'index'])->name('admin.activity.index');
        });
    });
});

require __DIR__.'/auth.php';
