<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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


Route::get('/moviedetail/{movieId}', [MoviesController::class,'showMovieDetails']);


Route::middleware(['auth'])->group(function () {
    Route::get('/moviemanagement',[MoviesController::class,'manage']);
    Route::get('/moviemanagement/forminsertmovie',[MoviesController::class,'movieform']);
    Route::post('/moviemanagement/insert',[MoviesController::class,'insertMovie']);
    Route::get('/moviemanagement/delete/{id}', [MoviesController::class,'deleteMovie']);
    Route::get('/moviemanagement/editForm/{id}', [MoviesController::class,'editForm']);
    Route::post('/moviemanagement/update', [MoviesController::class,'update']);
});
