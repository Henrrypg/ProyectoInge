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

/*Route::get('/', function () {
    return view('/categoria');
});*/



Route::resource('/','ArticulosController');



Route::resource('payment','PaymentController');
Route::get('cart/add/{articulos}',[
  'as'=> 'categoria-show',
  'uses' => 'CartController@add'
]);

Route::get('cart/show',[
  'as'=> 'cart-show',
  'uses' => 'CartController@show'
]);


Route::get('cart/delete/{articulos}',[
  'as'=> 'cart-delete',
  'uses' => 'CartController@delete'
]);


Route::get('articulos/destroy/{articulos}',[
  'as'=> 'articulos-destroy',
  'uses' => 'ArticulosController@destroy'
]);

Route::get('Orden/finalizar',[
  'as'=> 'Orden-finish',
  'uses' => 'OrdenController@finalizar'
]);

Route::get('articulos/id/{id}/{estrellas}/{orden}',[
  'as'=> 'art-estrellas',
  'uses' => 'ArticulosController@estrellas'
]);

Route::get('cart/id/{id}/{cantidad}',[
  'as'=> 'cart-cantidad',
  'uses' => 'CartController@cantidad'
]);

Route::get('cart/trash',[
  'as'=> 'cart-trash',
  'uses' => 'CartController@trash'
]);

Route::get('articulos/alterno/{namee}/{check?}',[
  'as'=> 'articulos-alterno',
  'uses' => 'ArticulosController@alterno'
]);

Route::resource('/articulos','ArticulosController');

Route::get('/welcome', 'PaymentController@index');
Route::get('/user', 'ArticulosController@user');
Route::get('/ordenes', 'OrdenController@index');
Route::get('/articulos', 'ArticulosController@index')->name('articulos');

Route::get('/logout', 'Auth\LoginController@logout'); 


Auth::routes();





