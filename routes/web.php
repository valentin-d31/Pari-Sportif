<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
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

// Authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Afficher les matchs pour un utilisateur
Route::get('/', 'MatchController@index')->name('pari.index');
Route::get('/index', 'MatchController@index')->name('pari.index');
Route::get('/paris/{match}', 'MatchController@show')->name('pari.show');

//Route Crud Administrateur
Route::get('admin', 'AdminController@index')->name('admin.index');
Route::get('admin/create', 'AdminController@create')->name('admin.create');
Route::post('admin', 'AdminController@store')->name('admin.store');
Route::get('admin/{match}', 'AdminController@show')->name('admin.show');
Route::get('admin/{match}/edit', 'AdminController@edit')->name('admin.edit');
Route::patch('admin/{match}', 'AdminController@update')->name('admin.update');
Route::delete('admin/{match}', 'AdminController@destroy')->name('admin.destroy');