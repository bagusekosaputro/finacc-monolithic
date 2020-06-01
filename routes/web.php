<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookKeepingController;
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

Route::get('/', 'AuthController@index')->name('login');

Route::get('/about', function () {
    return view('main.about');
});

Route::get('register', 'AuthController@registration');
Route::post('register', 'AuthController@create');
Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@doLogin');
Route::get('dashboard', 'MenuController@dashboard');
Route::get('logout', 'AuthController@logout');
Route::get('profile/{id}', 'MenuController@userProfile')->middleware('auth');
Route::get('transaction/{id}', 'MenuController@bookKeeping')->middleware('auth');
Route::post('transaction/create', 'BookKeepingController@saveTransaction')->middleware('auth');
Route::get('profile/{id}', 'UserController@profile')->middleware('auth')->name('profile');
Route::post('profile/update/{id}', 'UserController@doUpdateProfile')->middleware('auth');
Route::post('profile/change-password/{id}', 'UserController@changePassword')->middleware('auth');