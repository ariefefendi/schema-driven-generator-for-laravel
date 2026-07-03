<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MapController;


// role for selected
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/search-location-start', [MapController::class,'searchNodeStart']);
Route::get('/search-location-end', [MapController::class,'searchNodeEnd']);