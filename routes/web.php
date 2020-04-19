<?php

use Illuminate\Support\Facades\Route;
use App\User;
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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/miperfil/{id}', 'HomeController@show');
Route::get('/grades/{id}', 'HomeController@grades');
Route::get('material', 'HomeController@material')->name('material');


Route::get('contacto', 'ContactUSController@contactUS')->name('contacto');
Route::post('contacto', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);


Route::middleware(['admin'])->group(function () {
	Route::resource('admintareas', 'TareaController');
	Route::resource('adminusuarios', 'UserController');

});
Route::resource('entrega', 'EntregaController');

Route::resource('usuariosimg', 'UserImgController');





