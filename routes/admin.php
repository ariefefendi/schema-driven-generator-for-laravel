<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\BusesController;
use App\Http\Controllers\Api\MenuController;

// Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        
        Route::get('/api/menu', [MenuController::class, 'index']);
        
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index']);
        });
        
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index']);
            Route::post('getDataAll', [UsersController::class, 'getDataAll']);
            Route::get('GetDataSelect', [UsersController::class, 'getDataSelect']);
            Route::post('insert', [UsersController::class, 'insert']);
            Route::post('update', [UsersController::class, 'update']);
            Route::delete('delete', [UsersController::class, 'destroy']);
        });

        Route::prefix('buses')->group(function () {
            Route::get('/', [BusesController::class, 'index']);
            Route::post('getDataAll', [BusesController::class, 'getDataAll']);
            Route::get('GetDataSelect', [BusesController::class, 'getDataSelect']);
            Route::post('insert', [BusesController::class, 'insert']);
            Route::post('update', [BusesController::class, 'update']);
            Route::delete('delete', [BusesController::class, 'destroy']);
        });

    
        
        Route::prefix('import')->group(function () {
            Route::post('/csv', [ImportController::class, 'importCsv']);
        });
         
        
});