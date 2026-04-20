<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HMITController;



Route::get('/',           [HMITController::class, 'home']        )->name('home');
Route::get('/tentang',    [HMITController::class, 'about']       )->name('about');
Route::get('/departemen', [HMITController::class, 'index_departments'] )->name('departments');
Route::get('/program',    [HMITController::class, 'index_programs']    )->name('programs');
Route::get('/kontak',     [HMITController::class, 'contact']     )->name('contact');
Route::post('/kontak',    [HMITController::class, 'sendContact'] )->name('contact.send');