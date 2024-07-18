<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ResearchDocumentController;

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

// Route::get('/users', [UserController::class, 'index']);

// Route::get('/reviews',[ReviewsController::class,'index']);
// Route::get('/authors',[AuthorController::class,'index']);
// Route::get('/research-documents', [ResearchDocumentController::class,'index']);

// Department Routes
Route::resource('/departments', DepartmentController::class);
Route::resource('/users',UserController::class);




