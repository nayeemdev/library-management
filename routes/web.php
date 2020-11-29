<?php

use App\Http\Controllers\Librarian\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    //Librarian Route
    Route::group(['prefix' => 'librarian', 'middleware' => 'librarian'], function () {
        Route::get('user', [UserController::class, 'index'])->name('users.index');
        Route::post('user/change', [UserController::class, 'changeStatus'])->name('users.changeStatus');
    });

    //Users Route
    Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {
        //
    });
});

require __DIR__.'/auth.php';
