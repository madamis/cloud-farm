<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\FarmTypeActivityController;
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

Route::get('/sendMail', [\App\Http\Controllers\EmailController::class, 'sendEmail']);

Route::get('/dashboard', [FarmingController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin/')->group(function (){
        Route::prefix('farm_types')->group(function(){
            Route::get('/', [FarmTypeController::class, 'index'])->name('admin.farm_type.index');
            Route::get('/take/{farmType}', [FarmTypeController::class, 'take'])->name('admin.farm_type.take');
            Route::get('/{farmType}', [FarmTypeController::class, 'show'])->name('admin.farm_type.show');
            Route::get('/edit/{farmType}', [FarmTypeController::class, 'edit'])->name('admin.farm_type.edit');
            Route::get('/activities/{farmType}', [FarmTypeController::class, 'activities'])->name('admin.farm_type.activities');
            Route::get('/activities/take/{farmTypeActivity}', [FarmTypeController::class, 'takeFarmTypeActivity'])->name('admin.farm_type.take.activities');
            Route::delete('/activities/{farmTypeActivity}', [FarmTypeController::class, 'deleteFarmTypeActivity'])->name('admin.farm_type.delete.activities');
            Route::post('/activities/{farmType}', [FarmTypeController::class, 'postFarmActivity'])->name('admin.farm_type.post_farm_activity');
            Route::put('/{farmType}', [FarmTypeController::class, 'update'])->name('admin.farm_type.update');
            Route::delete('/{farmType}', [FarmTypeController::class, 'destroy'])->name('admin.farm_type.delete');
            Route::post('/', [FarmTypeController::class, 'store'])->name('admin.farm_type.store');
        });

        Route::prefix('farms')->group(function(){
            Route::get('/', [FarmController::class, 'index'])->name('admin.farm.index');
            Route::get('/take/{farm}', [FarmController::class, 'take'])->name('admin.farm.take');
            Route::get('/{farm}', [FarmController::class, 'show'])->name('admin.farm.show');
            Route::get('/edit/{farm}', [FarmController::class, 'edit'])->name('admin.farm.edit');
            Route::put('/{farm}', [FarmController::class, 'update'])->name('admin.farm.update');
            Route::delete('/{farm}', [FarmController::class, 'destroy'])->name('admin.farm.delete');
            Route::post('/', [FarmController::class, 'store'])->name('admin.farm.store');
        });

        Route::prefix('activities')->group(function (){
            Route::get('/', [ActivityController::class, 'index'])->name('admin.activity.index');
            Route::get('/take/{activity}', [ActivityController::class, 'take'])->name('admin.activity.take');
            Route::get('/{activity}', [ActivityController::class, 'show'])->name('admin.activity.show');
            Route::get('/edit/{activity}', [ActivityController::class, 'edit'])->name('admin.activity.edit');
            Route::put('/{activity}', [ActivityController::class, 'update'])->name('admin.activity.update');
            Route::delete('/{activity}', [ActivityController::class, 'destroy'])->name('admin.activity.delete');
            Route::post('/', [ActivityController::class, 'store'])->name('admin.activity.store');
        });

        Route::prefix('farm-type-activities')->group(function(){
            Route::put('/move', [FarmTypeActivityController::class, 'move'])->name('farm.type.activities.move');
        });
    });
});

require __DIR__.'/auth.php';
