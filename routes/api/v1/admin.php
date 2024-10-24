<?php

use App\Http\Controllers\Api\V1\Admin\Auth\AuthController;
use App\Http\Controllers\Api\V1\Admin\StoryCategory\StoryCategoryController;
use App\Http\Controllers\Api\V1\Admin\StoryManagement\StoryManagementController;
use App\Http\Controllers\Api\V1\Admin\UserManagement\UserManagementController;
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

              Route::controller(UserManagementController::class)
                  ->prefix('users-management')
                  ->name('user-management.')
                  ->group(function () {
                      Route::get('/', 'index')->name('index');
                      Route::get('/{user}', 'show')->name('show');
                      Route::get('{user}/bookmarks/', 'bookmarksUser')->name('bookmarks');
                      Route::get('{user}/stories/', 'storiesUser')->name('stories');
                      Route::delete('/{user}', 'destroy')->name('destroy');
                  });

              Route::controller(StoryManagementController::class)
                  ->prefix('story-management')
                  ->name('story-management.')
                  ->group(function () {
                      Route::get('/', 'index')->name('index');
                      Route::get('/{story}', 'show')->name('show');
                      Route::delete('/{story}', 'destroy')->name('destroy');
                  });
           });
    });
