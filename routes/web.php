<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class,'index'])->name('tasks');

Route::post('/create', [TaskController::class,'create'])->name('create');
Route::get('/delete/{id}', [TaskController::class,'delete'])->name('delete');
Route::get('/complete/{id}', [TaskController::class,'complete'])->name('complete');