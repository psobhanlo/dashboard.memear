<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);


Route::group(['namespace' => 'Dashboard', 'middleware' => 'isAdmin'], function () {

    Route::post('update-invoice-step', 'InvoiceController@updateStep')->name('updateStep');

    Route::resource('user', 'UserController');
    Route::get('search-customer', 'UserController@search');
    Route::resource('panel', 'PanelController');
    Route::resource('invoice', 'InvoiceController');
    Route::get('search-invoice-page', 'InvoiceController@searchPage')->name('invoice.search');
    Route::get('search-invoice', 'InvoiceController@search');


});
