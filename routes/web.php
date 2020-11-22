<?php

use Illuminate\Routing\RouteGroup;
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

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::post('profile', 'ProfileController@update')->name('profile.update');

    //Librarian Route
    Route::group(['prefix' => 'librarian', 'middleware' => 'librarian'], function () {
        Route::get('user', 'Librarian\UserController@index')->name('users.index');
        Route::get('user/change/{status}/{id}', 'Librarian\UserController@changeStatus')->name('users.changeStatus');
    });

    //Users Route
    Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {

    });
});

require __DIR__.'/auth.php';
