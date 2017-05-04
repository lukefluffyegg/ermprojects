<?php
Auth::routes();

//Route::get('ermprojects-admin', 'Auth\LoginController@showLoginForm')->name('login');

// Admin Routes GET
Route::get('dashboard', 'AdminController@index')->name('dashboard');
Route::get('entires', 'AdminController@entires')->name('entires');
Route::get('categories', 'AdminController@categories')->name('categories');
Route::get('pages', 'AdminController@pages')->name('pages');

Route::get('post', 'AdminController@newEntry')->name('post');

// Admin Routes POST
Route::post('post', 'AdminController@postEntry')->name('post.entry');
Route::post('imagesupload', 'AdminController@galleryImageUpload')->name('imagesupload');


Route::group(['middleware' => ['web']], function() {
    
// Projects routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/category/{slug}', 'ProjectsController@subcategories')->name('category');
Route::get('subcategory/{subcat}', 'ProjectsController@subcategory')->name('subcategory');
Route::get('entry/{slug}', 'ProjectsController@postEntry')->name('postentry');

// Gallery Routes
Route::get('/gallery', 'GalleryController@index')->name('gallery');

});