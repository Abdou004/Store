<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\informationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* 

GET : Lecture

POST : Ajouter  

PATCH : Modefication Partielle

PUT: Modefication Complete

DELETE : Supprimer
*/

    Route::resource('profiles',profileController::class);

    Route::resource('publications',PublicationController::class);


    Route::get('/',[homeController::class,'index'])->name('homepage');
    Route::get('/login',[LoginController::class,'show'])->name('login.show')->middleware('guest');
    Route::post('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
    Route::get('/lgout',[LoginController::class,'logout'])->name('login.logout')->middleware('auth');
    Route::get('informations',[informationsController::class,'index'])->name('settings.index');