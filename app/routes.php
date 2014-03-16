<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// index
Route::get('/{page?}', 'GalleryController@index')->where('page', '[0-9]+');

// gallery route
Route::get('/gallery', 'GalleryController@gallery');
Route::post('/gallery', array('before' => 'csrf', 'uses' => 'GalleryController@search'));

// insert process
Route::get('/insert/{per_page?}/{pages?}', 'FlickrController@insert')
  ->where(array('pages' => '[0-9]+', 'per_page' => '[0-9]+'));