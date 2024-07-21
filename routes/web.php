<?php

use Illuminate\Support\Facades\Http;
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



Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin\Auth',], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin_login');
    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout')->name('admin_logout');
    Route::get('/user-lock-screen/{user_name}', 'userLockController@__invoke');
});




Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin', 'prefix' => 'Dashboard'], function () {
    /***** Dashboard *****/
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('Admin-Dashboard');

    Route::get('/Log', 'App\Http\Controllers\Admin\DashboardController@logs')->name('Log.index');

    /***** profile *****/
    Route::get('/profile', 'ProfileController@profile')->name('My-Profile');
    Route::post('/Update-profile', 'ProfileController@save_profile')->name('UpdateProfile');
    Route::get('/Profile-Password', 'ProfileController@change_password')->name('GetPassword');
    Route::post('/update_password', 'ProfileController@password_save')->name('UpdatePassword');

    /***** admins *****/
    Route::resource('admins', 'AdminController');
    Route::get('admins/edit_password/{id}', 'AdminController@change_password');
    Route::post('admins/save_password/{id}', 'AdminController@password_save');
    Route::get('not_authorized', 'AdminController@not_authorized');
    Route::get('delete_admin', 'AdminController@delete_admin');

});
