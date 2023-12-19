<?php

use App\Http\Controllers\ToDoController;
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

Route::patch('/todo', [ToDoController::class, 'update'])->name('todo.update');
Route::post('/todo', [ToDoController::class, 'store'])->name('todo.store');
Route::get('/todo/create', [ToDoController::class, 'create'])->name('todo.create');
Route::get('/', [ToDoController::class, 'show'])->name('todo.show');
