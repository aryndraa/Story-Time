<?php

use App\Http\Controllers\Api\V1\User\Auth\AuthController;
use App\Http\Controllers\Api\V1\User\Bookmark\BookmarkController;
use App\Http\Controllers\Api\V1\User\Profile\ProfileController;
use App\Http\Controllers\Api\V1\User\StoryManagement\StoryManagementController;
use App\Http\Controllers\Api\V1\User\UserStory\UserStoryController;
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

        Route::controller(StoryManagementController::class)
            ->prefix('story-management')
            ->name('story-management.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{story}', 'show')->name('show');
            });

        Route::middleware('auth:user')
            ->group(function () {
                Route::delete('auth/logout', [AuthController::class, 'logout'])->name('logout');
                Route::controller(ProfileController::class)
                    ->prefix('profile')
                    ->name('profile.')
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::post('/', 'update')->name('update');
                    });

                Route::controller(UserStoryController::class)
                    ->prefix('user-story')
                    ->name('user-story.')
                    ->group(function () {
                       Route::get('/my-stories', 'myStories')->name('my-story');
                       Route::get('/bookmarked-stories', 'bookmarkedStories')->name('bookmarked-stories');
                    });

                Route::controller(StoryManagementController::class)
                    ->prefix('story-management')
                    ->name('story-management.')
                    ->group(function () {
                        Route::get('/{story}', 'show')->name('show');
                        Route::post('/', 'store')->name('store');
                        Route::post('/{story}', 'update')->name('update');
                        Route::delete('/{story}', 'destroy')->name('destroy');
                    });

                Route::get('/bookmark/{story}', [BookmarkController::class, 'bookmark'])->name('bookmark');
            });
    });
