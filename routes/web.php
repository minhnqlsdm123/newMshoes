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
    return view('BO._layouts.common');
});

//Route::get('/category',function () {
//   return view('BO.manage.category.allCategories');

//});

Route::get('/language/','BO\LanguageController@getListLanguages')->name('LanguageManage');
Route::any('/language/add','BO\LanguageController@addLanguage')->name('LanguageAdd');
Route::any('/language/update/{code}','BO\LanguageController@updateLanguage')->name('LanguageUpdate');
Route::post('/language/delete','BO\LanguageController@deleteLanguage')->name('LanguageDelete');

Route::get('/category/','BO\CategoryController@getListCategories')->name('CategoryManage');
Route::any('/category/add','BO\CategoryController@addCategory')->name('CategoryAdd');
Route::any('/category/update/{id_cat}','BO\CategoryController@updateCategory')->name('updateCategory');
Route::post('/category/delete','BO\CategoryController@deleteCategory')->name('CategoryDelete');

Route::get('/brand/','BO\BrandController@getListBrands')->name('BrandManage');
Route::any('/brand/add','BO\BrandController@addBrand')->name('BrandAdd');
Route::any('/brand/update/{id_brand}','BO\BrandController@updateBrand')->name('updateBrand');
Route::post('/brand/delete','BO\BrandController@deleteBrand')->name('BrandDelete');
