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


// SET LANGUAGE
Route::get('change/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return Redirect::back();
});


Route::get('/', 'HomeController@index');

Route::get('search', 'HomeController@search');

Route::get('about', 'AboutController@index');

Route::get('surgery', 'SurgeryController@index');
Route::get('surgery/detail/{id}', 'SurgeryController@detail')->name('surgery.detail');

Route::get('service/category/{id}', 'ServiceController@category');
Route::get('service/detail/{id}', 'ServiceController@detail');

Route::get('product', 'ProductController@index');
Route::get('product/category/{id}', 'ProductController@category');
Route::get('product/detail/{id}', 'ProductController@detail');

Route::get('skincare', 'SkincareController@index');
Route::get('skincare/category/{id}', 'SkincareController@category');
Route::get('skincare/detail/{id}', 'SkincareController@detail')->name('skincare.detail');

Route::get('product-review', 'ProductReviewController@index');
Route::get('product-review/detail/{id}', 'ProductReviewController@detail')->name('product-review.detail');

Route::get('article', 'ArticleController@index');
Route::get('article/detail/{id}', 'ArticleController@detail')->name('article.detail');

Route::get('testimonial', 'TestimonialController@index');

Route::get('doctor/profile/{id}', 'DoctorController@profile')->name('doctor.profile');;

Route::get('promotion', 'PromotionController@index');
Route::get('promotion/detail/{id}', 'PromotionController@detail')->name('promotion.detail');

Route::get('contact', 'ContactController@index');
Route::post('contact/save', 'ContactController@save');

// BACKEND
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});