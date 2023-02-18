<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTodoListController;
use App\Http\Controllers\TodoListController;
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

Route::get('todolist', [TodoListController::class, 'index']);

Route::get('todolist/get', [ApiTodoListController::class, 'getList']);
Route::post('todolist/create', [ApiTodoListController::class, 'postList']);
Route::post('todolist/update', [ApiTodoListController::class, 'postUpdate']);
Route::post('todolist/delete', [ApiTodoListController::class, 'postDelete']);
