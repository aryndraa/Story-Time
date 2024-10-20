<?php

use App\Http\Controllers\Api\V1\User\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/user')
    ->name('user.')
    ->group(function () {
        Route::controller(AuthController::class)
            ->prefix('auth')
            ->name('auth.')
            ->group(function () {
                Route::post('/login', 'login')->name('login');
                Route::post('/register', 'register')->name('register');
            });

        Route::middleware('auth:user')
            ->group(function () {
                Route::delete('auth/logout', [AuthController::class, 'logout'])->name('logout');
            });
    });
