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

Route::prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    Route::prefix('/book')->group(function () {
        Route::get('/', 'BooksController@index')->name('admin.book.index');
        Route::get('/create', 'BooksController@create')->name('admin.book.create');
        Route::get('/edit/{id}', 'BooksController@edit');
        Route::post('/store', 'BooksController@store')->name('admin.book.store');
        Route::post('/update/{id}', 'BooksController@update');
        Route::post('/delete/{id}', 'BooksController@delete');
    });

    Route::prefix('/author')->group(function () {
        Route::get('/', 'AuthorsController@index')->name('admin.author.index');
        Route::get('/create', 'AuthorsController@create')->name('admin.author.create');
        Route::get('/edit/{id}', 'AuthorsController@edit');
        Route::post('/store', 'AuthorsController@store')->name('admin.author.store');
        Route::post('/update/{id}', 'AuthorsController@update');
        Route::post('/delete/{id}', 'AuthorsController@delete');
    });

    Route::prefix('/publisher')->group(function () {
        Route::get('/', 'PublishersController@index')->name('admin.publisher.index');
        Route::get('/create', 'PublishersController@create')->name('admin.publisher.create');
        Route::get('/edit/{id}', 'PublishersController@edit');
        Route::post('/store', 'PublishersController@store')->name('admin.publisher.store');
        Route::post('/update/{id}', 'PublishersController@update');
        Route::post('/delete/{id}', 'PublishersController@delete');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::post('/delete/{id}', 'CategoryController@delete');
    });
});
