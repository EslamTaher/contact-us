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
    return view('user.index');
});
Route::get('/about', function () {
    return view('user.about');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => 'auth'] , function(){
    Route::get('/','DashboardController@index');
    Route::resource('/users','UsersController');
    Route::get('/messages','MessagesController@index');
});

Route::group(['namespace' => 'User'] , function(){
    Route::get('/contact' , 'ContactController@index');
    Route::post('/contact' , 'ContactController@store');

});
