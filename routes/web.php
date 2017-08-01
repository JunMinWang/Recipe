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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'recipe'], function() {
	Route::get('show/{id}', 'RecipeController@getRecipe')->name('getRecipe');
    Route::get('/create', 'RecipeController@getCreateRecipe')->name('getCreateRecipe');
    Route::post('/create', 'RecipeController@postCreateRecipe')->name('postCreateRecipe');
    Route::get('/modify/{id}', 'RecipeController@getModifyRecipe')->name('getModifyRecipe');
    Route::post('/modify', 'RecipeController@postModifyRecipe')->name('postModifyRecipe');
    Route::get('/remove/{id}', 'RecipeController@getRemoveRecipe')->name('getRemoveRecipe');
});
