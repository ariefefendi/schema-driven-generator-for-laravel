<?php 

use Illuminate\Support\Facades\Route;

public function boot(): void
{
    parent::boot();

    Route::prefix('api')
        ->middleware('api')
        ->group(function () {
            foreach (glob(base_path('routes/crud/*.php')) as $file) {
                require $file;
            }
        });
}