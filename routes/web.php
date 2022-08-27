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


Auth::routes();
Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['verify' => true]);

Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('login'));
});

Route::group(['as' => 'user.', 'middleware' => 'auth', 'namespace' => 'User'], function(){
    Route::get('/home', 'DashboardController@index')->name('dashboard');

    Route::get('/my-assets', 'AccountController@index')->name('my-assets');

    Route::group(['as' => 'transaction.', 'prefix' => 'transactions'], function(){
        Route::get('/', 'TransactionController@index')->name('index');
        Route::get('/{uid}', 'TransactionController@show')->name('show');
        Route::get('/{uid}/pdf/', 'TransactionController@downloadPDF')->name('pdf');
        Route::post('/filter', 'TransactionController@filter')->name('filter');
        Route::get('export/{type}/{from}/to/{to}/', 'TransactionController@exportTransaction')->name('export');
    });

    Route::group(['as' => 'profile.', 'prefix' => 'my-profile'], function(){
        Route::get('/', 'ProfileController@index')->name('index');
        Route::patch('/{id}/change-password', 'ProfileController@changePassword')->name('change.password');
        Route::patch('{id}/update', 'ProfileController@update')->name('update');
    });
});
