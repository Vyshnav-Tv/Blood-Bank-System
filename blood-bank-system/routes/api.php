<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodBagController;

Route::post(
    '/register',
    [AuthController::class, 'register']
);


Route::post(
    '/login',
    [AuthController::class, 'login']
)
    ->middleware('throttle:login');




Route::middleware('auth:sanctum')
    ->group(function () {

        Route::post(
            '/logout',
            [AuthController::class, 'logout']
        );
    });


Route::middleware([
    'auth:sanctum',
    'role:admin'
])->group(function () {

Route::post(
    'blood_bag',
    [BloodBagController::class, 'store']
);

Route::put(
    'blood_bag/{id}',
    [BloodBagController::class, 'update']
);

Route::delete(
    'blood_bag/{id}',
    [BloodBagController::class, 'destroy']
);

Route::get(
    'blood_bags',
    [BloodBagController::class, 'index']
);

Route::get(
    'blood_bag/{id}',
    [BloodBagController::class, 'show']
);


});
