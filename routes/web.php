<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\User\ChapterStory\ChapterStoryController;
use App\Http\Controllers\Web\User\StoryManagement\StoryManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('/')
    ->group(function () {
        Route::controller(StoryManagementController::class)
            ->group(function () {
            Route::get('/', 'index')->name('story.index');
            Route::get('/{story}/overview', 'overview')->name('story.show.overview');
            Route::get('/{story}/chapters', 'chapters')->name('story.show.chapters');
        });

        Route::middleware(['auth'])
            ->group(function () {
                Route::controller(StoryManagementController::class)
                    ->name('story.')
                    ->group(function () {
                        Route::post('/bookmark', 'bookmark')->name('bookmark');
                        Route::post('/like', 'like')->name('like');
                    });

                Route::controller(ChapterStoryController::class)
                    ->name('chapter.')
                    ->group(function () {
                        Route::get('/{story}/chapters/{chapter}', 'show')->name('show');
                    });


                Route::get('account-management', [AuthController::class, 'toAccount'])->name('toAccount');
                Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            });
    });

Auth::routes();


Route::get('/login', [LoginController::class, 'toLogin'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'toRegister'])->name('toRegister')->middleware('guest');
Route::get('/register/confirm', [RegisterController::class, 'confirm'])->name('confirm')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
