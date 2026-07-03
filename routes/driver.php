<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\BusSchedulesController;

// Driver
Route::middleware(['auth', 'role:driver'])
    ->prefix('driver')
    ->group(function () {
    
        Route::prefix('bus-schedules')->group(function () {
            Route::get('/', [BusSchedulesController::class, 'index']);
            Route::post('getDataAll', [BusSchedulesController::class, 'getDataAll']);
            Route::get('GetDataSelect', [BusSchedulesController::class, 'getDataSelect']);
            Route::post('insert', [BusSchedulesController::class, 'insert']);
            Route::post('update', [BusSchedulesController::class, 'update']);
            Route::delete('delete', [BusSchedulesController::class, 'destroy']);
        });
        
        Route::get('/api/menu', [MenuController::class, 'index']);
        
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index']);
        });
    
});