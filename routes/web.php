<?php

use App\Http\Controllers\Web\User\Auth\AuthController;
use App\Http\Controllers\Web\User\StoryManagement\StoryManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'toLogin'])->name('toLogin');
Route::get('/register', [AuthController::class, 'toRegister'])->name('toRegister');
Route::get('/register/confirm', [AuthController::class, 'confirm'])->name('confirm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::controller(StoryManagementController::class)
    ->prefix('/')
    ->group(function () {
        Route::get('', 'index')->name('story.index');
    });
