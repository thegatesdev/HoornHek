<?php

use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\PrisonerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/app', function () {
    return view('app.index');
});

Route::resource('prisoners', PrisonerController::class);
Route::resource('logs', ActionLogController::class);
