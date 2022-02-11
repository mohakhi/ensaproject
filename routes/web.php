<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/create', 'CategoryController@add_category_form')->name('category.add')->middleware('auth');
Route::post('/category', 'CategoryController@submit_category_data')->name('category.save')->middleware('auth');
Route::get('/category', 'CategoryController@fetch_all_category')->name('category.list');


Route::get('/post/create', 'PostController@add_post_form')->name('post.add')->middleware('auth');
Route::post('/post', 'PostController@submit_post_data')->name('post.save')->middleware('auth');
Route::get('/', 'PostController@fetch_all_post')->name('post.list');
Route::get('/post/{post}', 'PostController@view_single_post')->name('post.view');

Route::post('/', 'PostController@add_comment')->name('post.saveComment');

Route::get('/google-bar-chart', 'CategoryController@chart_category')->middleware('auth');
Route::get('/google-bar-chart-post', 'CategoryController@chart_posts')->middleware('auth');

Route::get('/profile', function () {
    return view("Profile.profile");
})->middleware('auth');
