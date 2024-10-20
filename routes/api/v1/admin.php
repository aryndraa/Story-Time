<?php

use App\Http\Controllers\Api\V1\Admin\Auth\AuthController;
use App\Http\Controllers\Api\V1\Admin\CategoryStory\StoryCategoryController;
use App\Models\StoryCategory;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/admin')
    ->name('admin.')
    ->group(function () {
       Route::controller(AuthController::class)
           ->prefix('auth')
           ->name('auth.')
           ->group(function () {
              Route::post('/login', 'login')->name('login');
           });

       Route::middleware('auth:admin')
           ->group(function () {
              Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

              Route::controller(StoryCategoryController::class)
                  ->prefix('story-categories')
                  ->name('story-categories.')
                  ->group(function () {
                     Route::get('/', 'index')->name('index');
                     Route::post('', 'store')->name('store');
                     Route::patch('/{category}', 'update')->name('update');
                     Route::delete('/{category}', 'destroy')->name('destroy');
                  });
           });
    });
