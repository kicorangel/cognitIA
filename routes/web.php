<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CognitiveHatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ThinkingRoleController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store')
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store')
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/cognitive-hat', [CognitiveHatController::class, 'index'])
        ->name('cognitive-hat.index');

    Route::post('/cognitive-hat/analyze', [CognitiveHatController::class, 'analyze'])
        ->name('cognitive-hat.analyze');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('thinking-roles', ThinkingRoleController::class)
            ->except(['show']);
    });
});

Route::get('/up', function () {
    return response('OK', 200);
});