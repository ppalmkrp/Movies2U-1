<?php

use App\Http\Controllers\EmployeeController;
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
        Route::get('/moviemanagementEmp',[EmployeeController::class,'ManageEmp'])->name('ManageEmp');
        Route::get('/moviemanagement/type/{Id}', [MoviesController::class,'showType'])->name('showType');
        Route::get('/moviemanagementEmp/movie/{Id}', [EmployeeController::class,'filterEmp'])->name('filterEmp');
        Route::get('/moviemanagement/forminsertmovie',[MoviesController::class,'movieform'])->name('movieform');
        Route::get('/moviemanagementEmp/forminsertEmp',[EmployeeController::class,'InsertEmpForm'])->name('InsertEmpForm');
        Route::post('/moviemanagement/insert',[MoviesController::class,'insertMovie'])->name('insertMovie');
        Route::post('/moviemanagementEmp/insertEmp',[EmployeeController::class,'AddEmp'])->name('AddEmp');
        Route::get('/moviemanagement/delete/{id}', [MoviesController::class,'deleteMovie'])->name('deleteMovie');
        Route::get('/moviemanagementEmp/deleteEmp/{emp_id}',[EmployeeController::class,'deleteEmployee'])->name('deleteEmployee');
        Route::get('/moviemanagement/editForm/{id}', [MoviesController::class,'editForm'])->name('editForm');
        Route::get('/moviemanagementEmp/editEmpForm/{id}', [EmployeeController::class,'EditEmpForm'])->name('EditEmpForm');
        Route::post('/moviemanagement/update', [MoviesController::class,'update'])->name('update');
        Route::post('/moviemanagementEmp/updateEmp', [EmployeeController::class,'EditEmp'])->name('EditEmp');
    });
});

Route::get('/moviedetail/{movieId}', [MoviesController::class,'showMovieDetails']);
Route::get('/home',[MoviesController::class,'home']);
Route::get('/type/{Id}', [MoviesController::class,'showList']);
Route::get('/category', [MoviesController::class,'category']);

