<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/person/todo-list/edit/{id}', [App\Http\Controllers\PersonaltodolistController::class, 'edit'])->name('edit.personal')->middleware('auth');

Route::post('/personal/todo-list', [App\Http\Controllers\PersonaltodolistController::class, 'store'])->name('personal')->middleware('auth');

Route::put('/update/todo-list/{update}', [App\Http\Controllers\PersonaltodolistController::class, 'update'])->name('update.personal')->middleware('auth');

Route::delete('todo-list/{id}', [App\Http\Controllers\PersonaltodolistController::class, 'destroy'])->name('personal.delete')->middleware('auth');

// creating a group name

Route::get('/group/name',[App\Http\Controllers\GroupnameController::class, 'create'])->name('group.create')->middleware('auth');

Route::post('/group/name',[App\Http\Controllers\GroupnameController::class, 'store'])->name('group.store')->middleware('auth');

// storing, deleting a group todo-list
Route::post('/group/todo/list',[App\Http\Controllers\GrouptodolistsController::class, 'store'])->name('grouptodo.store')->middleware('auth');

Route::get('/group/todo/edit2-0/{single}', [App\Http\Controllers\GrouptodolistsController::class, 'singleView'])->name('grouptodo.edit2-0')->middleware('auth');

Route::get('/group/todo/edit/{id}', [App\Http\Controllers\GrouptodolistsController::class, 'edit'])->name('grouptodo.edit')->middleware('auth');

Route::put('/group/todo/update/{update}',[App\Http\Controllers\GrouptodolistsController::class, 'update'])->name('grouptodo.update')->middleware('auth');

Route::put('/group-field/update/{singles}',[App\Http\Controllers\GrouptodolistsController::class, 'updateSingle'])->name('grouptodo.up')->middleware('auth');

Route::delete('/group/todo/{id}', [App\Http\Controllers\GrouptodolistsController::class, 'destroy'])->name('grouptodo.delete')->middleware('auth');


//tags create(join) 
Route::get('/join/{id}',[App\Http\Controllers\GroupnameController::class, 'join'])->name('join')->middleware('auth');