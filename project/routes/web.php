<?php

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
    return redirect('admin');
});
Route::get('/home', function () {
    return redirect('admin');
});


Route::get('image/{filename}', 'ImageController@show')->name('image.show');

Auth::routes();

//Rotas autenticadas
Route::group(['middleware' => 'auth'], function () {

    //Rotas que começam com admin
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'HomeController@index')->name('home');

        //Rotas de Pessoas
        Route::get('/customer', 'CustomerController@index')->name('customer.index');
        Route::get('/customer/new', 'CustomerController@insert')->name('customer.insert');
        Route::post('/customer', 'CustomerController@create')->name('customer.create');
        Route::get('/customer/{id}', 'CustomerController@show')->name('customer.show');
        Route::delete('/customer/{id}', 'CustomerController@delete')->name('customer.delete');
        Route::get('/customer/{id}/edit', 'CustomerController@update')->name('customer.update');
        Route::put('/customer/{id}', 'CustomerController@save')->name('customer.save');
        Route::put('/customer/change_status/{id}', 'CustomerController@changeStatus')->name('customer.change_status');

        //Rotas para upload do avatar
        Route::get('/avatar', 'AvatarController@upload')->name('customer.avatar.upload');
        Route::post('/avatar/{id}', 'AvatarController@store')->name('customer.avatar.store');
    });
});
