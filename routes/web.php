<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::Class,'index'])->name('index');

Route::get('/adminpage',[HomeController::Class,'page'])->name('page')->middleware(['auth','admin']);

/* Acciones del Admin */
Route::get('/addEmployee',[EmpleadoController::Class,'create'])->name('admin.create')->middleware(['auth','admin']);
Route::post('/storeEmployee',[EmpleadoController::Class,'store'])->name('admin.store')->middleware(['auth','admin']);
Route::get('/editEmployee/{id}',[EmpleadoController::Class,'edit'])->name('admin.edit')->middleware(['auth','admin']);
Route::post('/updateEmployee/{id}',[EmpleadoController::Class,'update'])->name('admin.update')->middleware(['auth','admin']);
Route::post('/destroyEmployee/{id}',[EmpleadoController::Class,'destroy'])->name('admin.destroy')->middleware(['auth','admin']);