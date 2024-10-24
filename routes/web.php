<?php

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

// controller
use App\Http\Controllers\ComicController;

Route::get('/', function () {
    return view('welcome');
});

// creazione le rotte per le crud
Route::resource('comics', ComicController::class);
