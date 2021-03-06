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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    //Events
    Route::post('events/search', 'EventController@search')->name('events.search');
    Route::get('events/search', 'EventController@search')->name('events.search');

    //Routes for import/export csv on Event controller
    Route::post('events/file-import', 'EventController@fileImport')->name('events.file-import');
    Route::get('events/file-export', 'EventController@fileExport')->name('events.file-export');

    //invite
    Route::get('events/invite/{id}', 'EventController@invite')->name('events.invite');;
    
    //Events
    Route::resource('events', 'EventController');

    //Mails
    Route::resource('emails', 'EventMailController');

    //Users
    Route::resource('users', 'UserController');


});


