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

Route::get('/', 'WelcomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/attractions/create',
            'AtrractionsController@create')
            ->name('attractions.create')
            ->middleware('admin');

Route::get('/bookings/{id}',
            'BookingsController@create')
            ->name('bookings.create')
            ->middleware('tourist');

Route::post('bookings', 'BookingsController@store')
            ->name('bookings.store')
            ->middleware('tourist');

Route::post('attractions', 'AtrractionsController@store')
            ->name('attractions.store')->middleware('admin');

Route::get('/admin/create', 'AdminController@create')
            ->name('admin.create')->middleware('admin');
Route::post('/admin', 'AdminController@strore')
            ->name('admin.store')->middleware('admin');
Route::get('/admins', 'AdminController@index')
            ->name('admins.all')->middleware('admin');

Route::get('/guides/create', 'GuideController@create')
            ->name('guides.create')->middleware('admin');

 Route::post('/guides', 'GuideController@store')
            ->name('guides.store')->middleware('admin');

Route::get('/guides', 'GuideController@index')
            ->name('guides.store')->middleware('admin');

Route::get('/bookings/pay/{id}', 'BookingsController@pay')
        ->name('bookings.pay')->middleware('tourist');

Route::get('/bookings/map/{id}', 'AtrractionsController@map')
            ->name('bookings.map');

Route::get('/bookings/assign/{id}', 'BookingsController@assign')
            ->name('bookings.assign');
