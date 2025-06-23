<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('sidebar', function () {
    return view('sidebar');
});

Route::get('test', [TestController::class, 'index'])->name('test');