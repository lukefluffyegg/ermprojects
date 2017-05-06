<?php
Auth::routes();

//Route::get('ermprojects-admin', 'Auth\LoginController@showLoginForm')->name('login');

// Admin Routes GET
Route::get('dashboard', 'AdminController@index')->name('dashboard');
Route::get('entires', 'AdminController@entires')->name('entires');
Route::get('categories', 'AdminController@categories')->name('categories');
Route::get('new/category', 'AdminController@newCategory')->name('new.category');
Route::get('edit/category/{id}', 'AdminController@editCategory')->name('edit.category');
Route::get('pages', 'AdminController@pages')->name('pages');
Route::get('post', 'AdminController@newEntry')->name('post');
Route::get('editpost/{id}', 'AdminController@editPost')->name('edit.post');
Route::get('deletepost/{id}', 'AdminController@PostDelete')->name('deletepost');

// Admin Routes POST
Route::post('post', 'AdminController@postEntry')->name('post.entry');
Route::post('postedit/{id}', 'AdminController@editPost')->name('post.edit');
Route::post('imagesupload', 'AdminController@galleryImageUpload')->name('imagesupload');
Route::post('postcategory', 'AdminController@postCategory')->name('post.category');
Route::post('updatecategory/{id}', 'AdminController@updateCategory')->name('category.edit');


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