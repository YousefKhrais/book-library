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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Dashboard\DashboardController@index')->name('admin.dashboard');

        Route::prefix('/book')->group(function () {
            Route::get('/', 'Dashboard\BooksController@index')->name('admin.book.index');
            Route::get('/create', 'Dashboard\BooksController@create')->name('admin.book.create');
            Route::get('/edit/{id}', 'Dashboard\BooksController@edit');
            Route::post('/store', 'Dashboard\BooksController@store')->name('admin.book.store');
            Route::post('/update/{id}', 'Dashboard\BooksController@update');
            Route::post('/delete/{id}', 'Dashboard\BooksController@delete');
        });

        Route::prefix('/author')->group(function () {
            Route::get('/', 'Dashboard\AuthorsController@index')->name('admin.author.index');
            Route::get('/create', 'Dashboard\AuthorsController@create')->name('admin.author.create');
            Route::get('/edit/{id}', 'Dashboard\AuthorsController@edit');
            Route::get('/show/{id}', 'Dashboard\AuthorsController@show');
            Route::post('/store', 'Dashboard\AuthorsController@store')->name('admin.author.store');
            Route::post('/update/{id}', 'Dashboard\AuthorsController@update');
            Route::post('/delete/{id}', 'Dashboard\AuthorsController@delete');
        });

        Route::prefix('/publisher')->group(function () {
            Route::get('/', 'Dashboard\PublishersController@index')->name('admin.publisher.index');
            Route::get('/create', 'Dashboard\PublishersController@create')->name('admin.publisher.create');
            Route::get('/edit/{id}', 'Dashboard\PublishersController@edit');
            Route::get('/show/{id}', 'Dashboard\PublishersController@show');
            Route::post('/store', 'Dashboard\PublishersController@store')->name('admin.publisher.store');
            Route::post('/update/{id}', 'Dashboard\PublishersController@update');
            Route::post('/delete/{id}', 'Dashboard\PublishersController@delete');
        });

        Route::prefix('/category')->group(function () {
            Route::get('/', 'Dashboard\CategoryController@index')->name('admin.category.index');
            Route::get('/create', 'Dashboard\CategoryController@create')->name('admin.category.create');
            Route::get('/edit/{id}', 'Dashboard\CategoryController@edit');
            Route::get('/show/{id}', 'Dashboard\CategoryController@show');
            Route::post('/store', 'Dashboard\CategoryController@store')->name('admin.category.store');
            Route::post('/update/{id}', 'Dashboard\CategoryController@update');
            Route::post('/delete/{id}', 'Dashboard\CategoryController@delete');
        });
    });
});
