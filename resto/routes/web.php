<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    //return view('welcome');
    return view('/layout/main');
	});
Route::get('/home', function () {
    //return view('welcome');
    return view('/layout/main');
	});
Route::get('/about', function () {
    //return view('welcome');
    return view('/layout/about');
	});
Route::resource('/kategori','KategoriController');
Route::get('/kategori','KategoriController@index')->name('kategori');
Route::get('/kategori_menu','KategoriController@show')->name('menu');


Route::resource('/menu','MenuController');
Route::get('/menu','MenuController@index')->name('menu');

Route::get('/pilihkategori','MenuController@index')->name('menu');



// Route::get('/home', function () {
//     //return view('welcome');
//     return view('/layout.main');
// });
Auth::routes();





// Route::get('/home', 'HomeController@index')->name('home');
