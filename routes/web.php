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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'FrontController@index');
Route::get('/news', 'FrontController@news');
Route::get('/news_info/{news_id}', 'FrontController@news_info');
Route::get('/contact_us', 'FrontController@contact_us');
Route::post('/contact_us_table', 'FrontController@contact_us_table');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('news', 'NewsController@index');
    Route::get('news/create','NewsController@create');
    Route::post('news/store','NewsController@store');
    Route::get('news/edit/{news_id}','NewsController@edit');
    Route::post('news/update/{news_id}','NewsController@update');
    Route::get('news/destroy/{news_id}','NewsController@destroy');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('product', 'ProductController@index');
    Route::get('product/create','ProductController@create');
    Route::post('product/store','ProductController@store');
    Route::get('product/edit/{news_id}','ProductController@edit');
    Route::post('product/update/{news_id}','ProductController@update');
    Route::get('product/destroy/{news_id}','ProductController@destroy');
});
