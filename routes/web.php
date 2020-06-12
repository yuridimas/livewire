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
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/home', 'home-index')
        ->name('home');
    Route::livewire('/users', 'user-index')
        ->name('user.index');
    Route::livewire('/user/create', 'user-create')
        ->name('user.create');
    Route::livewire('/user/{id}/edit', 'user-edit')
        ->name('user.edit');
    Route::livewire('/user/update/{id}', 'user-edit')
        ->name('user.update');
    Route::livewire('/user/delete/{id}', 'user-index')
        ->name('user.delete');
});
