<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});

Route::get('/dept-plans',[App\Http\Controllers\HomeController::class, 'getPlans'])->name('get_plans');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    mkdir(app_path("t/t/t"), 0777, true); 
});