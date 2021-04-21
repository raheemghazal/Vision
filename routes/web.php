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
    return view('annotate');
});

Route::get('/annotate', 'AnnotationController@displayForm')->name('image_manage');
Route::post('/annotate', 'AnnotationController@annotateImage')->name('image_similar');

Route::get('/add_image', 'AnnotationController@addImage')->name('image.add');
Route::post('/add_image', 'AnnotationController@store_image')->name('image.store');


