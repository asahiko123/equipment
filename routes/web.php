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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

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
});
//開発者以上
Route::group(['prefix'=>'equipment','middleware'=>['auth','can:system-only']],function(){
   
});


// Route::group(['prefix'=>'equipment','middleware'=>'auth'],function(){
//     Route::match(['get','post'],'index','EquipmentController@index')->name('equipment.index');
//     Route::get('create','EquipmentController@create')->name('equipment.create');
//     Route::post('store','EquipmentController@store')->name('equipment.store');
//     Route::get('edit/{id}','EquipmentController@edit')->name('equipment.edit');
//     Route::post('update/{id}','EquipmentController@update')->name('equipment.update');
//     Route::post('destroy/{id}','EquipmentController@destroy')->name('equipment.destroy');
// });

// Route::resource('equipments','EquipmentController');