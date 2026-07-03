<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::view('/dummy-app', 'dummy-map');

require __DIR__.'/admin.php';
require __DIR__.'/operator.php';
require __DIR__.'/user.php';
require __DIR__.'/driver.php';
