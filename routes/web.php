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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'HomeController@index');
// Route::get('home', 'HomeController@index')->name('home');

Route::get('product-review', 'ProductReviewController@index')->name('product-review');
Route::get('product-review/detail/{id}', 'ProductReviewController@detail')->name('product-review');

Route::get('article', 'ArticleController@index')->name('article');
Route::get('article/detail/{id}', 'ArticleController@detail');

Route::get('testimonial', 'TestimonialController@index')->name('testimonial');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/save', 'ContactController@save');