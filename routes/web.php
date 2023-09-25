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
    Route::middleware(['auth', 'admin:2'])->group(function () {
        Route::get('/moviemanagement',[MoviesController::class,'manage'])->name('manage');
        Route::get('/moviemanagement/type/{Id}', [MoviesController::class,'showType'])->name('showType');
        Route::get('/moviemanagement/forminsertmovie',[MoviesController::class,'movieform'])->name('movieform');
        Route::post('/moviemanagement/insert',[MoviesController::class,'insertMovie'])->name('insertMovie');
        Route::get('/moviemanagement/delete/{id}', [MoviesController::class,'deleteMovie'])->name('deleteMovie');
        Route::get('/moviemanagement/editForm/{id}', [MoviesController::class,'editForm'])->name('editForm');
        Route::post('/moviemanagement/update', [MoviesController::class,'update'])->name('update');
    });
});

Route::get('/moviedetail/{movieId}', [MoviesController::class,'showMovieDetails']);
Route::get('/home',[MoviesController::class,'home']);
Route::get('/type/{Id}', [MoviesController::class,'showList']);
Route::get('/category', [MoviesController::class,'category']);

