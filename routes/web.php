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

// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');

Route::get('/', function () {
    return view('welcome');
});
//全ユーザに許可

Route::group(['prefix'=>'equipment','middleware'=>['auth','can:user-higher']],function(){
    Route::get('index','EquipmentController@index')->name('equipment.index');
    Route::get('create','EquipmentController@create')->name('equipment.create');
    Route::post('store','EquipmentController@store')->name('equipment.store');
});
//管理者以上
Route::group(['prefix'=>'equipment','middleware'=>['auth','can:admin-higher']],function(){
    Route::post('index','EquipmentController@index')->name('equipment.index');
    Route::get('edit/{id}','EquipmentController@edit')->name('equipment.edit');
    Route::post('update/{id}','EquipmentController@update')->name('equipment.update');
    Route::post('destroy/{id}','EquipmentController@destroy')->name('equipment.destroy');
    Route::post('accept/{id}','EquipmentController@accept')->name('equipment.accept');
    Route::post('select/{id}','EquipmentController@select')->name('equipment.select');
    
});

Route::group(['prefix' =>'lending','middleware' =>['auth','can:admin-higher']],function(){
    Route::get('index','LendingController@index')->name('lending.index');
    Route::post('store','LendingController@store')->name('lending.store');
    Route::get('edit/{id}','LendingController@edit')->name('lending.edit');
    Route::post('destroy/{id}','LendingController@destroy')->name('lending.destroy');
    Route::post('update/{id}','LendingController@update')->name('lending.update');
});

Route::group(['prefix'=>'authorizer','middleware'=>['auth','can:admin-higher']],function(){
    Route::match(['get','post'],'index','AuthorizerController@index')->name('authorizer.index');
    Route::post('create','AuthorizerController@create')->name('authorizer.create');
    Route::post('store','AuthorizerController@store')->name('authorizer.store');
    Route::post('destroy/{id}','AuthorizerController@destroy')->name('authorizer.destroy');
});

Route::group(['prefix'=>'user','middleware'=>['auth','can:admin-higher']],function(){
    Route::match(['get','post'],'index','UserController@index')->name('user.index');
    Route::post('create','UserController@create')->name('user.create');
    Route::post('store','UserController@store')->name('user.store');
    Route::post('destroy/{id}','UserController@destroy')->name('user.destroy');
});
//開発者以上
Route::group(['prefix'=>'equipment','middleware'=>['auth','can:system-only']],function(){
   
});

