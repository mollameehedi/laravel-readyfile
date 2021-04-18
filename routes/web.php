<?php

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('user/delete/{user_id}', 'HomeController@userdelete')->name('user.delete');

// Profile controller route start
Route::resource('profile','ProfileController');
Route::post('profile/name/post', 'ProfileController@profilenamechange')->name('profile.name.post');
Route::post('profile/photo/post', 'ProfileController@profilephotopost')->name('profile.photo.post');
Route::post('profile/password/post', 'ProfileController@profilepasswordpost')->name('profile.password.post');